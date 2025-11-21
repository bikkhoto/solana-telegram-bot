# $MYXN DEX Web Application

A modern web-based DEX (Decentralized Exchange) interface for trading $MYXN tokens on Solana, powered by Jupiter Aggregator. This is a standalone web application that can be hosted on cPanel or any Node.js hosting service.

## 🌟 Features

- 🎨 **Modern UI**: Clean, intuitive interface similar to popular DEX platforms
- 💰 **Wallet Integration**: Connect with Phantom, Solflare, and other Solana wallets
- 🔄 **Token Swaps**: Swap between SOL and $MYXN tokens
- 📊 **Real-time Quotes**: Get best rates via Jupiter Aggregator
- ⚡ **Fast Transactions**: Optimized transaction execution
- 🔒 **Non-custodial**: Users maintain full control of their funds
- 📱 **Responsive Design**: Works on desktop and mobile devices

## 🎯 Differences from Telegram Bot

| Feature | Telegram Bot | Web App |
|---------|-------------|---------|
| User Interface | Text commands | Visual interface |
| Wallet | Server-side (risky) | User's own wallet (safe) |
| Access | Via Telegram | Any web browser |
| Security | Requires server private key | Non-custodial, user-controlled |
| Deployment | Simple server | Web hosting (cPanel compatible) |

## 📋 Prerequisites

- Node.js v16 or higher
- A Solana RPC endpoint (public or private)
- $MYXN token mint address
- Web hosting with Node.js support (cPanel, VPS, etc.)

## 🚀 Installation

### 1. Clone or Download

```bash
git clone https://github.com/bikkhoto/solana-telegram-bot.git
cd solana-telegram-bot
```

### 2. Install Dependencies

```bash
npm install
```

### 3. Configure Environment

```bash
cp .env.example .env
```

Edit `.env` file:

```env
# Solana RPC URL (required)
SOLANA_RPC_URL=https://api.mainnet-beta.solana.com

# Web App Port (optional, default: 3000)
PORT=3000

# MYXN Token Mint Address (required)
MYXN_MINT=YOUR_ACTUAL_MYXN_MINT_ADDRESS_HERE
```

**Important:** Replace `YOUR_ACTUAL_MYXN_MINT_ADDRESS_HERE` with your actual $MYXN token mint address.

### 4. Start the Web App

```bash
npm run webapp
```

The app will be available at `http://localhost:3000`

## 🖥️ cPanel Deployment

### Method 1: Using Node.js App in cPanel

1. **Login to cPanel** and navigate to "Setup Node.js App"

2. **Create Application:**
   - Node.js version: 16.x or higher
   - Application mode: Production
   - Application root: `/home/username/solana-dex` (or your path)
   - Application URL: `https://yourdomain.com` or subdomain
   - Application startup file: `webapp.js`

3. **Upload Files:**
   - Upload all project files via FTP or File Manager
   - Make sure to upload:
     - `webapp.js`
     - `package.json`
     - `public/` directory with all files
     - `.env` file (configured)

4. **Install Dependencies:**
   - In cPanel Node.js interface, click "Run NPM Install"
   - Or SSH into your server and run: `npm install`

5. **Configure Environment:**
   - Set environment variables in cPanel or edit `.env` file
   - Add: `SOLANA_RPC_URL`, `PORT`, `MYXN_MINT`

6. **Start Application:**
   - Click "Start App" in cPanel Node.js interface
   - Or restart: `touch tmp/restart.txt`

### Method 2: Using Custom Port and Reverse Proxy

1. **Upload files** via FTP to your desired directory

2. **SSH into your server:**
   ```bash
   ssh username@yourdomain.com
   cd ~/solana-dex
   npm install
   ```

3. **Run with PM2** (process manager):
   ```bash
   npm install -g pm2
   pm2 start webapp.js --name solana-dex
   pm2 save
   pm2 startup
   ```

4. **Setup Reverse Proxy** in cPanel:
   - Go to "Proxy" or contact hosting support
   - Forward port 80/443 to your app's port (default: 3000)

5. **Configure SSL:**
   - Use cPanel SSL/TLS manager
   - Or use Let's Encrypt via cPanel

## 🔧 Configuration Options

### Environment Variables

```env
# Required
SOLANA_RPC_URL=https://api.mainnet-beta.solana.com
MYXN_MINT=YOUR_MYXN_TOKEN_MINT_ADDRESS

# Optional
PORT=3000  # Default: 3000
```

### RPC Endpoints

**Mainnet (Production):**
- Public: `https://api.mainnet-beta.solana.com` (rate-limited)
- Helius: `https://rpc.helius.xyz/?api-key=YOUR_KEY`
- QuickNode: `https://your-endpoint.quiknode.pro/YOUR_KEY/`
- Alchemy: `https://solana-mainnet.g.alchemy.com/v2/YOUR_KEY`

**Devnet (Testing):**
- Public: `https://api.devnet.solana.com`

### Finding Your $MYXN Token Mint

1. **If you created the token:**
   - Check your creation transaction on Solscan
   - The mint address is the token's public address

2. **If it's an existing token:**
   - Search for $MYXN on Solscan.io
   - Copy the "Token Address" from the token page

3. **Example format:**
   ```
   EPjFWdd5AufqSSqeM2qN1xzybapC8G4wEGGkZwyTDt1v
   ```

## 💡 Usage

### For End Users

1. **Visit your website** (e.g., `https://yourdomain.com`)

2. **Connect Wallet:**
   - Click "Connect Wallet"
   - Choose your Solana wallet (Phantom, Solflare, etc.)
   - Approve the connection

3. **Enter Swap Details:**
   - Enter amount you want to swap
   - Choose slippage tolerance (0.5% recommended)
   - Click "Get Quote" to see expected output

4. **Execute Swap:**
   - Review the quote details
   - Click "Swap"
   - Approve transaction in your wallet
   - Wait for confirmation

5. **View Transaction:**
   - Click on the Solscan link to view details
   - Transaction history is in your wallet

### Slippage Settings

- **0.1%**: Best for large, liquid pairs (may fail in volatile markets)
- **0.5%**: Recommended for most swaps
- **1%**: For less liquid pairs or volatile markets
- **3%**: For new/very low liquidity tokens

## 🔒 Security Best Practices

### For Operators

1. **Environment Security:**
   - Never commit `.env` file to Git
   - Use strong RPC endpoints (not public for production)
   - Keep dependencies updated

2. **Server Security:**
   - Enable HTTPS/SSL
   - Use firewall rules
   - Regular security updates
   - Monitor logs for suspicious activity

3. **API Security:**
   - Rate limit API endpoints
   - Validate all inputs
   - Use CORS properly

### For Users

1. **Wallet Safety:**
   - Only use official wallet extensions
   - Never share your seed phrase
   - Always verify transaction details before signing
   - Use hardware wallets for large amounts

2. **Trading Safety:**
   - Start with small amounts to test
   - Check slippage settings
   - Verify token addresses
   - Be aware of price impact

## 🎨 Customization

### Branding

Edit `public/index.html`:
- Change title: `<title>Your Brand</title>`
- Update header: `<h1>💎 Your Brand</h1>`
- Modify colors in `<style>` section

### Token Support

To support multiple tokens:
1. Edit `webapp.js` - add token list endpoint
2. Edit `public/app.js` - add token selector UI
3. Update token dropdown in HTML

### Styling

All CSS is in `public/index.html` in the `<style>` tag. Customize:
- Colors: Change gradient colors
- Fonts: Update `font-family`
- Layout: Modify container sizes
- Responsive: Adjust media queries

## 📊 API Endpoints

The web app provides these REST API endpoints:

| Endpoint | Method | Description |
|----------|--------|-------------|
| `/api/token-info` | GET | Get token configuration |
| `/api/balance` | POST | Check wallet balance |
| `/api/quote` | POST | Get swap quote |
| `/api/swap` | POST | Get swap transaction |
| `/api/send-transaction` | POST | Broadcast transaction |
| `/api/transaction/:sig` | GET | Check transaction status |
| `/api/health` | GET | Health check |

## 🐛 Troubleshooting

### App won't start

```bash
# Check Node.js version
node --version  # Should be v16+

# Check for errors
npm run webapp

# Check port availability
netstat -an | grep 3000
```

### Wallet won't connect

- Install Phantom or Solflare extension
- Refresh the page
- Clear browser cache
- Try different browser

### Quote fails

- Check RPC endpoint is working
- Verify MYXN mint address is correct
- Check network (mainnet vs devnet)
- Ensure sufficient liquidity exists

### Transaction fails

- Check wallet has enough SOL for fees (~0.001 SOL)
- Increase slippage tolerance
- Try smaller amount
- Check token account exists

### cPanel Issues

- Verify Node.js is enabled
- Check file permissions (755 for directories, 644 for files)
- Review cPanel error logs
- Contact hosting support if Node.js not available

## 🔄 Updates and Maintenance

### Updating the App

```bash
git pull origin main
npm install
npm run webapp
```

### Updating Dependencies

```bash
npm update
npm audit fix
```

### Monitoring

Use PM2 for process monitoring:
```bash
pm2 status
pm2 logs solana-dex
pm2 restart solana-dex
```

## 📝 Comparison with Axiom.trade

Your app includes similar features to Axiom.trade:
- ✅ Jupiter Aggregator integration
- ✅ Real-time quotes
- ✅ Wallet connection
- ✅ Modern UI
- ✅ Transaction tracking

Key differences:
- Focused specifically on $MYXN token
- Simpler, more targeted interface
- Easier to customize and deploy
- Open source and self-hosted

## 🆘 Support

For issues or questions:
1. Check the troubleshooting section
2. Review server logs
3. Test with devnet first
4. Contact your hosting provider for server issues

## 📄 License

ISC

## ⚠️ Disclaimer

This software is provided "as is", without warranty of any kind. Trading cryptocurrencies carries risk. Always verify transactions before confirming. The developers are not responsible for any losses incurred while using this software.

---

**Built with:** Solana Web3.js, Jupiter Aggregator, Express.js
**For:** $MYXN Token Community
