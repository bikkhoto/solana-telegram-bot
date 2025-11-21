# cPanel Deployment Guide for $MYXN DEX Web App

This guide provides step-by-step instructions for deploying the $MYXN DEX web application on a cPanel-based hosting server.

## Prerequisites

- cPanel hosting account with Node.js support
- FTP/SFTP access credentials
- SSH access (recommended but optional)
- Domain or subdomain configured

## Quick Deployment Steps

### Step 1: Prepare Your Files

1. **Download/Clone the repository** to your local computer
2. **Configure .env file:**
   ```env
   SOLANA_RPC_URL=https://api.mainnet-beta.solana.com
   PORT=3000
   MYXN_MINT=YOUR_ACTUAL_MYXN_MINT_ADDRESS
   ```
3. **Files needed for deployment:**
   - `webapp.js`
   - `package.json`
   - `package-lock.json`
   - `.env` (configured)
   - `public/` (entire directory)
     - `index.html`
     - `app.js`

### Step 2: Upload Files to cPanel

#### Using File Manager (Easy)

1. **Login to cPanel**
2. Open **File Manager**
3. Navigate to your desired directory:
   - For main domain: `public_html/`
   - For subdomain: `public_html/subdomain/`
   - Or create: `public_html/myxn-dex/`
4. **Upload all files:**
   - Click "Upload" button
   - Select and upload all project files
   - Maintain the `public/` folder structure
5. **Set permissions:**
   - Files: 644 (rw-r--r--)
   - Directories: 755 (rwxr-xr-x)

#### Using FTP (FileZilla)

1. **Connect to your server:**
   - Host: ftp.yourdomain.com
   - Username: your cPanel username
   - Password: your cPanel password
   - Port: 21
2. **Navigate to deployment directory**
3. **Upload all files** maintaining folder structure
4. **Verify upload** - ensure `public/` folder exists with both HTML and JS files

### Step 3: Setup Node.js Application in cPanel

1. **Login to cPanel**

2. **Find "Setup Node.js App":**
   - Look in Software section
   - If not available, contact hosting provider

3. **Create Application:**
   - Click "Create Application"
   - **Node.js version:** Select latest available (16.x or higher)
   - **Application mode:** Production
   - **Application root:** `/home/yourusername/public_html/myxn-dex`
     (adjust path to where you uploaded files)
   - **Application URL:** Select your domain/subdomain
   - **Application startup file:** `webapp.js`
   - **Passenger log file:** Leave default
   
4. **Click "Create"**

### Step 4: Install Dependencies

#### Method A: Via cPanel Interface (Easiest)

1. In the Node.js App interface
2. Scroll to "Detected configuration files"
3. Click **"Run NPM Install"** button
4. Wait for installation to complete (may take 2-3 minutes)

#### Method B: Via SSH

1. **SSH into your server:**
   ```bash
   ssh username@yourdomain.com
   ```

2. **Navigate to app directory:**
   ```bash
   cd ~/public_html/myxn-dex
   ```

3. **Install dependencies:**
   ```bash
   npm install --production
   ```

### Step 5: Configure Environment Variables

#### In cPanel Interface:

1. In "Setup Node.js App" interface
2. Find "Environment variables" section
3. Add variables:
   - **Name:** `SOLANA_RPC_URL`
     **Value:** `https://api.mainnet-beta.solana.com`
   - **Name:** `PORT`
     **Value:** `3000`
   - **Name:** `MYXN_MINT`
     **Value:** `YOUR_MYXN_TOKEN_MINT_ADDRESS`

4. Click "Save"

#### Or Edit .env File:

If you uploaded `.env` file, it should contain:
```env
SOLANA_RPC_URL=https://api.mainnet-beta.solana.com
PORT=3000
MYXN_MINT=YOUR_ACTUAL_MYXN_MINT_ADDRESS
```

### Step 6: Start the Application

1. In "Setup Node.js App" interface
2. Click **"Start App"** button (or restart if already running)
3. Status should show "Running"

### Step 7: Access Your Application

Your app should now be accessible at:
- `https://yourdomain.com` (if deployed in root)
- `https://subdomain.yourdomain.com` (if using subdomain)
- `https://yourdomain.com/myxn-dex` (if in subfolder)

## Advanced Configuration

### Custom Port Configuration

If port 3000 is in use:

1. Change `PORT` in environment variables to another port (e.g., 3001)
2. Restart the application
3. You may need to configure reverse proxy (contact hosting)

### Using PM2 Process Manager (SSH Required)

For better process management:

```bash
# Install PM2 globally
npm install -g pm2

# Start application
cd ~/public_html/myxn-dex
pm2 start webapp.js --name myxn-dex

# Save PM2 configuration
pm2 save

# Setup auto-start on reboot
pm2 startup
```

**PM2 Commands:**
```bash
pm2 list              # View all processes
pm2 logs myxn-dex     # View logs
pm2 restart myxn-dex  # Restart app
pm2 stop myxn-dex     # Stop app
pm2 delete myxn-dex   # Remove from PM2
```

### SSL Certificate Setup

1. **In cPanel:**
   - Go to "SSL/TLS Status"
   - Click "Run AutoSSL" for your domain
   - Or install Let's Encrypt certificate

2. **Verify HTTPS:**
   - Visit `https://yourdomain.com`
   - Should show secure padlock icon

### Domain/Subdomain Setup

#### For Subdomain:

1. **Create Subdomain:**
   - cPanel → Domains → Subdomains
   - Create: `dex.yourdomain.com`
   - Document Root: `/public_html/myxn-dex`

2. **Configure Node.js App:**
   - Application URL: `dex.yourdomain.com`
   - Application root: `/home/username/public_html/myxn-dex`

## Troubleshooting

### Application Won't Start

**Check Node.js version:**
- cPanel requires Node.js 16.x or higher
- Contact host if version too old

**Check file paths:**
- Ensure `webapp.js` is in Application root
- Verify `public/` folder exists with files

**Check permissions:**
```bash
chmod 755 ~/public_html/myxn-dex
chmod 644 ~/public_html/myxn-dex/webapp.js
chmod 755 ~/public_html/myxn-dex/public
chmod 644 ~/public_html/myxn-dex/public/*
```

### Dependencies Won't Install

**If "Run NPM Install" fails:**
1. Check error logs in cPanel
2. Try via SSH: `npm install --production`
3. Check disk space: `df -h`
4. Check Node.js compatibility

**Memory issues:**
- Contact hosting to increase memory limits
- Or use `npm install --production` to skip dev dependencies

### Can't Access the Website

**Check DNS:**
- Domain may take 24-48 hours to propagate
- Test with: `ping yourdomain.com`

**Check Application Status:**
- In cPanel Node.js interface
- Should show "Running"
- If stopped, click "Start App"

**Check Port:**
- Ensure app is listening on correct port
- Verify reverse proxy configuration

**Check Firewall:**
- Some hosts block certain ports
- Contact hosting support

### Wallet Connection Issues

**Browser console errors:**
- Open browser DevTools (F12)
- Check Console tab for errors
- Ensure Solana wallet extension installed

**HTTPS required:**
- Wallet extensions require HTTPS
- Install SSL certificate if not present

**CORS errors:**
- Check `webapp.js` CORS configuration
- Ensure `cors` package is installed

### RPC Connection Issues

**Test RPC endpoint:**
```bash
curl https://api.mainnet-beta.solana.com -X POST -H "Content-Type: application/json" -d '
  {"jsonrpc":"2.0","id":1,"method":"getHealth"}
'
```

**Use better RPC:**
- Public endpoint may be rate-limited
- Consider Helius, QuickNode, or Alchemy

### Transaction Failures

**Common causes:**
- Insufficient SOL for fees
- High slippage needed
- Network congestion
- Token account doesn't exist

**Solutions:**
- Ensure wallet has SOL for fees (0.001-0.01 SOL)
- Increase slippage tolerance
- Try again during off-peak hours

## Monitoring and Logs

### View Application Logs

**In cPanel:**
- Setup Node.js App → View logs
- Shows startup and error logs

**Via SSH:**
```bash
# Passenger logs
tail -f ~/public_html/myxn-dex/passenger.log

# PM2 logs (if using PM2)
pm2 logs myxn-dex

# Error logs
tail -f ~/logs/error_log
```

### Monitor Performance

**Check CPU/Memory:**
- cPanel → Metrics → Resource Usage
- Monitor for high usage

**Check Requests:**
- cPanel → Metrics → Visitors
- Monitor traffic patterns

## Updating the Application

### Update Code Files

1. **Download latest version** to local computer
2. **Backup current files:**
   ```bash
   cd ~/public_html
   tar -czf myxn-dex-backup-$(date +%Y%m%d).tar.gz myxn-dex/
   ```
3. **Upload new files** via FTP/File Manager
4. **Update dependencies** via "Run NPM Install"
5. **Restart application** in cPanel

### Update Dependencies

**Via SSH:**
```bash
cd ~/public_html/myxn-dex
npm update
npm audit fix
```

**Restart app:**
- cPanel: Click "Restart" in Node.js interface
- PM2: `pm2 restart myxn-dex`

## Security Best Practices

1. **Keep updated:**
   - Regularly update Node.js packages
   - Update cPanel when available

2. **Secure .env:**
   - Never commit to Git
   - Permissions: `chmod 600 .env`

3. **Use HTTPS:**
   - Always enable SSL
   - Force HTTPS redirect

4. **Monitor logs:**
   - Check for suspicious activity
   - Set up alerts for errors

5. **Backup regularly:**
   - Backup files and database
   - Test restore procedure

## Support Resources

- **cPanel Documentation:** [docs.cpanel.net](https://docs.cpanel.net)
- **Node.js in cPanel:** Contact your hosting provider
- **Solana Documentation:** [docs.solana.com](https://docs.solana.com)
- **Jupiter API:** [station.jup.ag/docs](https://station.jup.ag/docs)

## Hosting Provider Recommendations

cPanel hosts with Node.js support:
- **A2 Hosting** - Good Node.js support
- **Hostinger** - Supports Node.js apps
- **SiteGround** - Node.js available on higher plans
- **InMotion** - Full Node.js support

**Check with your host:**
- Node.js version available (need 16+)
- Long-running process support
- WebSocket support (if needed)
- Resource limits (RAM, CPU)

---

## Checklist

Before going live:

- [ ] All files uploaded correctly
- [ ] `.env` configured with correct values
- [ ] Dependencies installed successfully
- [ ] Application starts without errors
- [ ] SSL certificate installed
- [ ] Domain/subdomain pointing correctly
- [ ] Can connect wallet successfully
- [ ] Test swap with small amount
- [ ] RPC endpoint responding
- [ ] Logs show no errors

---

**Need help?** Check the WEBAPP-README.md for more details or contact your hosting support for cPanel-specific issues.
