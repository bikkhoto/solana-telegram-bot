# Solana Telegram DEX Trading Bot

A Telegram bot for trading on Solana DEX using Jupiter Aggregator. This bot allows you to check your wallet balance and swap tokens directly through Telegram commands.

## ⚠️ Security Warning

**IMPORTANT: This bot uses a wallet with private keys stored on the server. For your safety:**

- ⚠️ **ONLY use TEST wallets with this bot**
- ⚠️ **NEVER use your main wallet or wallets with significant funds**
- ⚠️ **The private key is stored in plain text in the .env file**
- ⚠️ **Anyone with access to your server can access the wallet**
- ⚠️ **This is intended for testing and educational purposes only**

## Features

- 💰 **Balance Check**: View your wallet address and SOL balance
- 🔄 **Token Swap**: Execute token swaps using Jupiter Aggregator for best prices
- 📊 **Quote Display**: See swap quotes before execution
- 🔗 **Transaction Links**: Direct links to Solscan for transaction details
- ⚡ **Error Handling**: Comprehensive error messages and usage guidance

## Prerequisites

- Node.js (v16 or higher)
- npm or yarn
- A Telegram Bot Token (from @BotFather)
- A Solana wallet (for testing only!)
- Solana RPC endpoint (public or private)

## Installation

1. **Clone the repository:**
   ```bash
   git clone https://github.com/bikkhoto/solana-telegram-bot.git
   cd solana-telegram-bot
   ```

2. **Install dependencies:**
   ```bash
   npm install
   ```

3. **Configure environment variables:**
   ```bash
   cp .env.example .env
   ```
   
   Edit `.env` and add your configuration (see Configuration section below).

## Configuration

### 1. Get a Telegram Bot Token

1. Open Telegram and search for `@BotFather`
2. Send `/newbot` command
3. Follow the instructions to create your bot
4. Copy the bot token provided by BotFather
5. Paste it in your `.env` file as `TELEGRAM_BOT_TOKEN`

### 2. Set up Solana RPC URL

You can use public RPC endpoints or get a dedicated one from providers:

**Public Endpoints:**
- Mainnet: `https://api.mainnet-beta.solana.com`
- Devnet: `https://api.devnet.solana.com` (recommended for testing)

**Dedicated RPC Providers (for better performance):**
- [Helius](https://helius.dev/)
- [QuickNode](https://www.quicknode.com/)
- [Alchemy](https://www.alchemy.com/)

### 3. Create a Test Wallet

**Using Solana CLI:**
```bash
solana-keygen new --outfile test-wallet.json
```

**Get the secret key as a JSON array:**
```bash
cat test-wallet.json
```

Copy the array of 64 numbers and paste it in your `.env` file as `WALLET_SECRET`.

**Alternative - Generate wallet with Node.js:**
```javascript
const { Keypair } = require('@solana/web3.js');
const wallet = Keypair.generate();
console.log(JSON.stringify(Array.from(wallet.secretKey)));
```

### 4. Fund Your Test Wallet

**For Devnet (free test SOL):**
```bash
solana airdrop 2 <YOUR_WALLET_ADDRESS> --url devnet
```

Or use the [Solana Faucet](https://faucet.solana.com/)

**For Mainnet:**
Transfer a small amount of SOL to your test wallet (only what you're willing to lose for testing).

### 5. Get Token Mint Addresses

Common token mint addresses:

**Devnet:**
- SOL (wrapped): `So11111111111111111111111111111111111111112`
- USDC (devnet): Check [Solana Token List](https://github.com/solana-labs/token-list)

**Mainnet:**
- SOL (wrapped): `So11111111111111111111111111111111111111112`
- USDC: `EPjFWdd5AufqSSqeM2qN1xzybapC8G4wEGGkZwyTDt1v`
- USDT: `Es9vMFrzaCERmJfrF4H2FYD4KCoNkY11McCe8BenwNYB`

Find more tokens on:
- [Jupiter Token List](https://station.jup.ag/docs/token-list/token-list-api)
- [Solana Token List](https://github.com/solana-labs/token-list)

## Usage

### Start the Bot

```bash
npm start
```

You should see:
```
Bot is running...
Wallet address: <YOUR_WALLET_ADDRESS>
Press Ctrl+C to stop
```

### Telegram Commands

1. **Start the bot:**
   ```
   /start
   ```
   Displays welcome message and available commands.

2. **Check balance:**
   ```
   /balance
   ```
   Shows your wallet address, SOL balance, and a link to view on Solscan.

3. **Swap tokens:**
   ```
   /swap <amount> <from_mint> <to_mint>
   ```
   
   **Example - Swap 0.1 SOL to USDC:**
   ```
   /swap 0.1 So11111111111111111111111111111111111111112 EPjFWdd5AufqSSqeM2qN1xzybapC8G4wEGGkZwyTDt1v
   ```
   
   The bot will:
   - Get a quote from Jupiter Aggregator
   - Show expected output amount and price impact
   - Execute the swap
   - Provide a Solscan link to view the transaction

## Environment Variables

Your `.env` file should contain:

```env
# Telegram Bot Token from @BotFather
TELEGRAM_BOT_TOKEN=your_bot_token_here

# Solana RPC URL
SOLANA_RPC_URL=https://api.devnet.solana.com

# Wallet Secret Key (JSON array of 64 numbers)
WALLET_SECRET=[1,2,3,...,64]
```

## Troubleshooting

### Common Issues

1. **"Invalid WALLET_SECRET format"**
   - Make sure your wallet secret is a JSON array of exactly 64 numbers
   - No spaces or formatting issues
   - Must be enclosed in square brackets

2. **"Failed to get swap quote"**
   - Check that token mint addresses are correct
   - Ensure there's sufficient liquidity for the token pair
   - Verify your RPC endpoint is working

3. **"Insufficient balance"**
   - Make sure your wallet has enough SOL for the swap
   - Remember to account for transaction fees (~0.001 SOL)
   - Fund your wallet using the methods described above

4. **Bot not responding**
   - Check that the bot is running (`npm start`)
   - Verify your TELEGRAM_BOT_TOKEN is correct
   - Check your internet connection

5. **Transaction failed**
   - Check the Solscan link for details
   - May need to increase slippage tolerance
   - Ensure wallet has enough SOL for fees

## Development

### Project Structure

```
solana-telegram-bot/
├── bot.js              # Main bot logic
├── package.json        # Dependencies and scripts
├── .env.example        # Environment variables template
├── .env               # Your actual environment variables (not in git)
├── .gitignore         # Git ignore rules
└── README.md          # This file
```

### Dependencies

- `node-telegram-bot-api`: Telegram Bot API wrapper
- `@solana/web3.js`: Solana blockchain interaction
- `@jup-ag/api`: Jupiter Aggregator API client
- `dotenv`: Environment variable management
- `axios`: HTTP client for API requests
- `bs58`: Base58 encoding/decoding

## License

ISC

## Disclaimer

This software is provided "as is", without warranty of any kind. Use at your own risk. The authors are not responsible for any losses or damages resulting from the use of this bot.

**Remember: Only use test wallets with small amounts for testing purposes!**
