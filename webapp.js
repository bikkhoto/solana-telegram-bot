require('dotenv').config();
const express = require('express');
const cors = require('cors');
const { Connection, Keypair, PublicKey, VersionedTransaction, LAMPORTS_PER_SOL } = require('@solana/web3.js');
const axios = require('axios');
const path = require('path');

const app = express();
const PORT = process.env.PORT || 3000;

// Middleware
app.use(cors());
app.use(express.json());
app.use(express.static('public'));

// Initialize Solana connection
const connection = new Connection(process.env.SOLANA_RPC_URL || 'https://api.mainnet-beta.solana.com', 'confirmed');

// Jupiter API endpoint
const JUPITER_API_URL = 'https://quote-api.jup.ag/v6';

// MYXN token mint - MUST be configured in environment
if (!process.env.MYXN_MINT) {
  console.error('ERROR: MYXN_MINT environment variable is required');
  console.error('Please set MYXN_MINT in your .env file to your token\'s mint address');
  process.exit(1);
}
const MYXN_MINT = process.env.MYXN_MINT;

// API Routes

// Get token info
app.get('/api/token-info', async (req, res) => {
  try {
    res.json({
      myxnMint: MYXN_MINT,
      solMint: 'So11111111111111111111111111111111111111112',
      rpcUrl: process.env.SOLANA_RPC_URL || 'https://api.mainnet-beta.solana.com'
    });
  } catch (error) {
    console.error('Error getting token info:', error);
    res.status(500).json({ error: 'Failed to get token info' });
  }
});

// Get balance for a wallet address
app.post('/api/balance', async (req, res) => {
  try {
    const { walletAddress } = req.body;
    
    if (!walletAddress) {
      return res.status(400).json({ error: 'Wallet address is required' });
    }

    const pubkey = new PublicKey(walletAddress);
    const balance = await connection.getBalance(pubkey);
    const solBalance = balance / LAMPORTS_PER_SOL;

    res.json({
      walletAddress,
      balance: solBalance,
      lamports: balance
    });
  } catch (error) {
    console.error('Error checking balance:', error);
    res.status(500).json({ error: 'Failed to check balance' });
  }
});

// Get swap quote
app.post('/api/quote', async (req, res) => {
  try {
    const { inputMint, outputMint, amount, slippageBps } = req.body;

    if (!inputMint || !outputMint || !amount) {
      return res.status(400).json({ error: 'Missing required parameters' });
    }

    const quoteResponse = await axios.get(`${JUPITER_API_URL}/quote`, {
      params: {
        inputMint,
        outputMint,
        amount,
        slippageBps: slippageBps || 50
      }
    });

    res.json(quoteResponse.data);
  } catch (error) {
    console.error('Error getting quote:', error);
    res.status(500).json({ 
      error: 'Failed to get quote',
      details: error.response?.data || error.message 
    });
  }
});

// Get swap transaction (returns serialized transaction for client to sign)
app.post('/api/swap', async (req, res) => {
  try {
    const { quoteResponse, userPublicKey } = req.body;

    if (!quoteResponse || !userPublicKey) {
      return res.status(400).json({ error: 'Missing required parameters' });
    }

    const swapResponse = await axios.post(`${JUPITER_API_URL}/swap`, {
      quoteResponse,
      userPublicKey,
      wrapAndUnwrapSol: true,
      dynamicComputeUnitLimit: true,
      prioritizationFeeLamports: 'auto'
    });

    res.json({
      swapTransaction: swapResponse.data.swapTransaction,
      lastValidBlockHeight: swapResponse.data.lastValidBlockHeight
    });
  } catch (error) {
    console.error('Error getting swap transaction:', error);
    res.status(500).json({ 
      error: 'Failed to create swap transaction',
      details: error.response?.data || error.message 
    });
  }
});

// Send transaction
app.post('/api/send-transaction', async (req, res) => {
  try {
    const { signedTransaction } = req.body;

    if (!signedTransaction) {
      return res.status(400).json({ error: 'Signed transaction is required' });
    }

    const rawTransaction = Buffer.from(signedTransaction, 'base64');
    const txid = await connection.sendRawTransaction(rawTransaction, {
      skipPreflight: false,
      maxRetries: 5,
      preflightCommitment: 'confirmed'
    });

    res.json({
      signature: txid,
      explorerUrl: `https://solscan.io/tx/${txid}`
    });
  } catch (error) {
    console.error('Error sending transaction:', error);
    res.status(500).json({ 
      error: 'Failed to send transaction',
      details: error.message 
    });
  }
});

// Get transaction status
app.get('/api/transaction/:signature', async (req, res) => {
  try {
    const { signature } = req.params;
    
    const status = await connection.getSignatureStatus(signature);
    
    res.json({
      signature,
      status: status.value,
      explorerUrl: `https://solscan.io/tx/${signature}`
    });
  } catch (error) {
    console.error('Error getting transaction status:', error);
    res.status(500).json({ error: 'Failed to get transaction status' });
  }
});

// Health check
app.get('/api/health', (req, res) => {
  res.json({ status: 'ok', timestamp: new Date().toISOString() });
});

// Serve frontend for all non-API routes
app.get('/', (req, res) => {
  res.sendFile(path.join(__dirname, 'public', 'index.html'));
});

// Start server
app.listen(PORT, () => {
  console.log(`🚀 Solana DEX Web App running on http://localhost:${PORT}`);
  console.log(`📊 Jupiter API: ${JUPITER_API_URL}`);
  console.log(`🔗 Solana RPC: ${process.env.SOLANA_RPC_URL || 'https://api.mainnet-beta.solana.com'}`);
  console.log(`💎 MYXN Token: ${MYXN_MINT}`);
});

// Graceful shutdown
process.on('SIGINT', () => {
  console.log('\nShutting down server...');
  process.exit(0);
});

process.on('SIGTERM', () => {
  console.log('\nShutting down server...');
  process.exit(0);
});
