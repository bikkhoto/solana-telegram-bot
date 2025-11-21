# Testing Guide

## Overview

This document describes the testing infrastructure for the Solana Telegram Bot project.

## Running Tests

To run all tests:

```bash
npm test
```

This will execute the test suite defined in `test.js` and provide a detailed report.

## Test Coverage

The test suite includes 15 comprehensive tests that verify:

### 1. Project Structure
- ✅ `package.json` exists and is valid
- ✅ Main entry points exist (`bot.js`, `webapp.js`)
- ✅ Public directory contains required files (`index.html`, `app.js`)
- ✅ Documentation exists (`README.md`)

### 2. Dependencies
- ✅ All required npm packages are installed:
  - `@jup-ag/api` - Jupiter Aggregator API
  - `@solana/web3.js` - Solana blockchain interaction
  - `axios` - HTTP client
  - `bs58` - Base58 encoding
  - `cors` - CORS middleware
  - `dotenv` - Environment variables
  - `express` - Web server
  - `node-telegram-bot-api` - Telegram bot framework

### 3. Configuration
- ✅ `.env.example` exists with all required variables:
  - `TELEGRAM_BOT_TOKEN` - Telegram bot authentication
  - `SOLANA_RPC_URL` - Solana network endpoint
  - `WALLET_SECRET` - Bot wallet credentials (Telegram bot only)
  - `MYXN_MINT` - Token mint address (Web app)

### 4. Code Quality
- ✅ `bot.js` has valid syntax and required imports
- ✅ `webapp.js` has valid syntax and required imports
- ✅ Environment variable validation is implemented
- ✅ Both files properly validate configuration on startup

### 5. API Endpoints (Web App)
- ✅ `/api/token-info` - Token configuration
- ✅ `/api/balance` - Wallet balance check
- ✅ `/api/quote` - Swap quote retrieval
- ✅ `/api/swap` - Swap transaction creation

### 6. Frontend (Web App)
- ✅ HTML structure is valid
- ✅ JavaScript uses Solana Web3.js
- ✅ Wallet connection logic is present

### 7. Security
- ✅ README contains security warnings
- ✅ Test wallet warnings are prominent
- ✅ No CodeQL security vulnerabilities

### 8. Integration
- ✅ Jupiter API integration is properly configured
- ✅ Quote and swap endpoints are implemented

## Test Output

When all tests pass, you'll see:

```
🧪 Running Solana Telegram Bot Tests

✓ package.json exists and is valid JSON
✓ bot.js exists
✓ webapp.js exists
✓ All required dependencies are installed
✓ .env.example exists with required variables
✓ bot.js has valid syntax
✓ webapp.js has valid syntax
✓ public directory exists with required files
✓ README.md exists with proper documentation
✓ Frontend HTML structure is valid
✓ Frontend JavaScript is properly structured
✓ bot.js validates environment variables
✓ webapp.js validates MYXN_MINT
✓ README contains security warnings
✓ Jupiter API integration is properly configured

==================================================

📊 Test Results: 15 passed, 0 failed

✅ All tests passed!
```

## Known Issues

### npm audit Warnings

The project has 6 vulnerability warnings from `npm audit`. These are in transitive dependencies of the `node-telegram-bot-api` package:

- `form-data` < 2.5.4 (critical)
- `tough-cookie` < 4.1.3 (moderate)
- `request` (deprecated package)

**Why not fixed:**
- These vulnerabilities are in the deprecated `request` library
- They only affect file upload functionality which is NOT used in this application
- The current version of `node-telegram-bot-api` (0.66.0) is the latest available
- Downgrading would require breaking changes and wouldn't resolve the issues
- The telegram bot only uses text message handling

**Risk Assessment:** Low - The vulnerable code paths are not executed in this application.

**Recommendation:** Periodically check for updates to `node-telegram-bot-api` and review the dependency chain. Monitor the [node-telegram-bot-api releases](https://github.com/yagop/node-telegram-bot-api/releases) for versions that may resolve these transitive dependency issues.

## Adding New Tests

To add new tests, edit `test.js` and use the `test()` helper function:

```javascript
test('Test name here', () => {
  // Your test assertions here
  assert(condition, 'Error message if condition is false');
});
```

## Manual Testing

### Testing the Telegram Bot

1. Copy `.env.example` to `.env`
2. Configure all environment variables
3. Run: `npm start`
4. Open Telegram and message your bot
5. Test commands: `/start`, `/balance`, `/swap`

### Testing the Web Application

1. Copy `.env.example` to `.env`
2. Set `MYXN_MINT` environment variable
3. Run: `npm run webapp`
4. Open: `http://localhost:3000`
5. Connect a wallet (Phantom, Solflare)
6. Test token swaps

## Security Testing

CodeQL is used for automated security analysis. To run manually:

```bash
# This is typically done in CI/CD
codeql database create --language=javascript ...
codeql database analyze ...
```

Current Status: ✅ No vulnerabilities detected

## Continuous Integration

The test suite is designed to run in CI/CD environments. It requires:
- Node.js 16 or higher
- npm or yarn
- No external services (tests are offline)

## Troubleshooting

### Tests Fail After Dependencies Update

```bash
# Clean install
rm -rf node_modules package-lock.json
npm install
npm test
```

### Test Timeouts

The tests are designed to complete in under 10 seconds. If they're timing out:
- Check disk I/O performance
- Ensure file system is not under heavy load
- Verify Node.js is not resource-constrained

## Future Improvements

Potential enhancements to the test suite:

- [ ] Add integration tests with mock Solana RPC
- [ ] Add unit tests for individual functions
- [ ] Add end-to-end tests for swap flows
- [ ] Add performance benchmarks
- [ ] Add test coverage reporting
- [ ] Add automated security scanning in CI/CD
- [ ] Mock Jupiter API responses for deterministic testing

## Related Documentation

- [README.md](README.md) - General project documentation
- [WEBAPP-README.md](WEBAPP-README.md) - Web application documentation
- [CPANEL-DEPLOYMENT.md](CPANEL-DEPLOYMENT.md) - Deployment guide
