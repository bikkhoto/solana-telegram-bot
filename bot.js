require('dotenv').config();
const TelegramBot = require('node-telegram-bot-api');
const { Connection, Keypair, PublicKey, VersionedTransaction, LAMPORTS_PER_SOL } = require('@solana/web3.js');
const axios = require('axios');

// Validate environment variables
if (!process.env.TELEGRAM_BOT_TOKEN) {
  console.error('Error: TELEGRAM_BOT_TOKEN is not set in .env file');
  process.exit(1);
}

if (!process.env.SOLANA_RPC_URL) {
  console.error('Error: SOLANA_RPC_URL is not set in .env file');
  process.exit(1);
}

if (!process.env.WALLET_SECRET) {
  console.error('Error: WALLET_SECRET is not set in .env file');
  process.exit(1);
}

// Initialize Telegram Bot
const bot = new TelegramBot(process.env.TELEGRAM_BOT_TOKEN, { polling: true });

// Initialize Solana connection
const connection = new Connection(process.env.SOLANA_RPC_URL, 'confirmed');

// Initialize wallet from secret key
let wallet;
try {
  const secretKey = Uint8Array.from(JSON.parse(process.env.WALLET_SECRET));
  wallet = Keypair.fromSecretKey(secretKey);
  console.log('Bot wallet address:', wallet.publicKey.toString());
} catch (error) {
  console.error('Error: Invalid WALLET_SECRET format. Must be a JSON array of 64 numbers.');
  process.exit(1);
}

// Jupiter API endpoint
const JUPITER_API_URL = 'https://quote-api.jup.ag/v6';

// /start command handler
bot.onText(/\/start/, (msg) => {
  const chatId = msg.chat.id;
  const welcomeMessage = `
🚀 *Welcome to Solana DEX Trading Bot!*

This bot allows you to trade on Solana DEX using Jupiter Aggregator.

*Available Commands:*

/balance - Check your wallet address and SOL balance

/swap <amount> <from_mint> <to_mint> - Swap tokens
  Example: \`/swap 0.1 So11111111111111111111111111111111111111112 EPjFWdd5AufqSSqeM2qN1xzybapC8G4wEGGkZwyTDt1v\`

⚠️ *Security Warning:*
This bot uses the wallet configured on the server. Make sure you understand the risks and only use test wallets with small amounts.

Need help? Check the documentation for token mint addresses and more information.
  `;
  
  bot.sendMessage(chatId, welcomeMessage, { parse_mode: 'Markdown' });
});

// /balance command handler
bot.onText(/\/balance/, async (msg) => {
  const chatId = msg.chat.id;
  
  try {
    const balance = await connection.getBalance(wallet.publicKey);
    const solBalance = balance / LAMPORTS_PER_SOL;
    
    const message = `
💰 *Wallet Information*

Address: \`${wallet.publicKey.toString()}\`
Balance: *${solBalance.toFixed(6)} SOL*

View on Solscan: [Click here](https://solscan.io/account/${wallet.publicKey.toString()})
    `;
    
    bot.sendMessage(chatId, message, { parse_mode: 'Markdown', disable_web_page_preview: true });
  } catch (error) {
    console.error('Balance check error:', error);
    bot.sendMessage(chatId, '❌ Error checking balance. Please try again later.');
  }
});

// /swap command handler
bot.onText(/\/swap (.+)/, async (msg, match) => {
  const chatId = msg.chat.id;
  const args = match[1].trim().split(/\s+/);
  
  // Validate arguments
  if (args.length !== 3) {
    bot.sendMessage(chatId, `
❌ *Invalid usage*

Usage: \`/swap <amount> <from_mint> <to_mint>\`

Example:
\`/swap 0.1 So11111111111111111111111111111111111111112 EPjFWdd5AufqSSqeM2qN1xzybapC8G4wEGGkZwyTDt1v\`

Common Token Mints:
• SOL: \`So11111111111111111111111111111111111111112\`
• USDC: \`EPjFWdd5AufqSSqeM2qN1xzybapC8G4wEGGkZwyTDt1v\`
    `, { parse_mode: 'Markdown' });
    return;
  }
  
  const [amountStr, fromMint, toMint] = args;
  const amount = parseFloat(amountStr);
  
  // Validate amount
  if (isNaN(amount) || amount <= 0) {
    bot.sendMessage(chatId, '❌ Invalid amount. Please provide a positive number.');
    return;
  }
  
  // Validate mint addresses
  try {
    new PublicKey(fromMint);
    new PublicKey(toMint);
  } catch (error) {
    bot.sendMessage(chatId, '❌ Invalid token mint address. Please check your input.');
    return;
  }
  
  bot.sendMessage(chatId, '🔄 Processing swap request... Please wait.');
  
  try {
    // Get token decimals for input token
    let inputDecimals = 9; // Default for SOL
    if (fromMint !== 'So11111111111111111111111111111111111111112') {
      try {
        const mintInfo = await connection.getParsedAccountInfo(new PublicKey(fromMint));
        if (mintInfo.value && mintInfo.value.data.parsed) {
          inputDecimals = mintInfo.value.data.parsed.info.decimals;
        }
      } catch (e) {
        console.log('Using default decimals');
      }
    }
    
    // Convert amount to lamports/smallest unit
    const amountInSmallestUnit = Math.floor(amount * Math.pow(10, inputDecimals));
    
    // Step 1: Get quote from Jupiter
    const quoteResponse = await axios.get(`${JUPITER_API_URL}/quote`, {
      params: {
        inputMint: fromMint,
        outputMint: toMint,
        amount: amountInSmallestUnit,
        slippageBps: 50 // 0.5% slippage
      }
    });
    
    if (!quoteResponse.data) {
      bot.sendMessage(chatId, '❌ Failed to get swap quote. Please try again.');
      return;
    }
    
    const quote = quoteResponse.data;
    
    // Calculate output amount for display
    let outputDecimals = 9;
    if (toMint !== 'So11111111111111111111111111111111111111112') {
      try {
        const mintInfo = await connection.getParsedAccountInfo(new PublicKey(toMint));
        if (mintInfo.value && mintInfo.value.data.parsed) {
          outputDecimals = mintInfo.value.data.parsed.info.decimals;
        }
      } catch (e) {
        console.log('Using default decimals for output');
      }
    }
    
    const outputAmount = quote.outAmount / Math.pow(10, outputDecimals);
    
    bot.sendMessage(chatId, `
📊 *Quote Received*

You will receive approximately: *${outputAmount.toFixed(6)}* tokens
Price impact: ${quote.priceImpactPct ? quote.priceImpactPct.toFixed(2) + '%' : 'N/A'}

Executing swap...
    `, { parse_mode: 'Markdown' });
    
    // Step 2: Get swap transaction
    const swapResponse = await axios.post(`${JUPITER_API_URL}/swap`, {
      quoteResponse: quote,
      userPublicKey: wallet.publicKey.toString(),
      wrapAndUnwrapSol: true,
      dynamicComputeUnitLimit: true,
      prioritizationFeeLamports: 'auto'
    });
    
    if (!swapResponse.data || !swapResponse.data.swapTransaction) {
      bot.sendMessage(chatId, '❌ Failed to create swap transaction. Please try again.');
      return;
    }
    
    // Step 3: Deserialize and sign transaction
    const swapTransactionBuf = Buffer.from(swapResponse.data.swapTransaction, 'base64');
    const transaction = VersionedTransaction.deserialize(swapTransactionBuf);
    
    // Sign the transaction
    transaction.sign([wallet]);
    
    // Step 4: Send transaction
    const rawTransaction = transaction.serialize();
    const txid = await connection.sendRawTransaction(rawTransaction, {
      skipPreflight: true,
      maxRetries: 3
    });
    
    // Wait for confirmation
    bot.sendMessage(chatId, `
⏳ *Transaction Sent*

Transaction ID: \`${txid}\`

Waiting for confirmation...
    `, { parse_mode: 'Markdown' });
    
    const confirmation = await connection.confirmTransaction(txid, 'confirmed');
    
    if (confirmation.value.err) {
      bot.sendMessage(chatId, `
❌ *Transaction Failed*

Transaction ID: \`${txid}\`

View on Solscan: [Click here](https://solscan.io/tx/${txid})

Error: ${JSON.stringify(confirmation.value.err)}
      `, { parse_mode: 'Markdown', disable_web_page_preview: true });
    } else {
      bot.sendMessage(chatId, `
✅ *Swap Successful!*

Swapped: *${amount}* tokens
Received: *${outputAmount.toFixed(6)}* tokens

Transaction ID: \`${txid}\`

View on Solscan: [Click here](https://solscan.io/tx/${txid})
      `, { parse_mode: 'Markdown', disable_web_page_preview: true });
    }
    
  } catch (error) {
    console.error('Swap error:', error);
    
    let errorMessage = '❌ An error occurred during the swap. ';
    
    if (error.response) {
      errorMessage += `\n\nAPI Error: ${error.response.data?.error || error.message}`;
    } else if (error.message) {
      errorMessage += `\n\nError: ${error.message}`;
    }
    
    errorMessage += '\n\nPlease check:\n';
    errorMessage += '• Wallet has sufficient balance\n';
    errorMessage += '• Token mint addresses are correct\n';
    errorMessage += '• Network connection is stable';
    
    bot.sendMessage(chatId, errorMessage);
  }
});

// Error handling for bot
bot.on('polling_error', (error) => {
  console.error('Polling error:', error);
});

// Graceful shutdown
process.on('SIGINT', () => {
  console.log('\nShutting down bot...');
  bot.stopPolling();
  process.exit(0);
});

process.on('SIGTERM', () => {
  console.log('\nShutting down bot...');
  bot.stopPolling();
  process.exit(0);
});

console.log('Bot is running...');
console.log('Wallet address:', wallet.publicKey.toString());
console.log('Press Ctrl+C to stop');
