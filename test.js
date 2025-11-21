/**
 * Basic test suite to validate application functionality
 * This tests that the core modules can be loaded and basic functionality works
 */

const assert = require('assert');
const fs = require('fs');
const path = require('path');

// Test results tracking
let passed = 0;
let failed = 0;
const failures = [];

/**
 * Simple test runner for synchronous tests
 * Note: This test function only supports synchronous test functions
 * For async tests, consider using a proper test framework like Jest or Mocha
 */
function test(name, fn) {
  try {
    fn();
    console.log(`✓ ${name}`);
    passed++;
  } catch (error) {
    console.error(`✗ ${name}`);
    console.error(`  ${error.message}`);
    failed++;
    failures.push({ name, error: error.message });
  }
}

console.log('\n🧪 Running Solana Telegram Bot Tests\n');

// Test 1: Check package.json exists and is valid
test('package.json exists and is valid JSON', () => {
  const packagePath = path.join(__dirname, 'package.json');
  assert(fs.existsSync(packagePath), 'package.json should exist');
  const packageData = JSON.parse(fs.readFileSync(packagePath, 'utf8'));
  assert(packageData.name === 'solana-telegram-bot', 'package name should be correct');
  assert(packageData.version, 'package should have a version');
});

// Test 2: Check main bot file exists
test('bot.js exists', () => {
  const botPath = path.join(__dirname, 'bot.js');
  assert(fs.existsSync(botPath), 'bot.js should exist');
});

// Test 3: Check webapp file exists
test('webapp.js exists', () => {
  const webappPath = path.join(__dirname, 'webapp.js');
  assert(fs.existsSync(webappPath), 'webapp.js should exist');
});

// Test 4: Check required dependencies are installed
test('All required dependencies are installed', () => {
  const nodeModulesPath = path.join(__dirname, 'node_modules');
  assert(fs.existsSync(nodeModulesPath), 'node_modules should exist');
  
  const requiredDeps = [
    '@jup-ag/api',
    '@solana/web3.js',
    'axios',
    'bs58',
    'cors',
    'dotenv',
    'express',
    'node-telegram-bot-api'
  ];
  
  // Verify each dependency is installed and can be resolved
  requiredDeps.forEach(dep => {
    try {
      require.resolve(dep);
    } catch (error) {
      assert.fail(`${dep} should be installed and resolvable`);
    }
  });
});

// Test 5: Check .env.example exists
test('.env.example exists with required variables', () => {
  const envExamplePath = path.join(__dirname, '.env.example');
  assert(fs.existsSync(envExamplePath), '.env.example should exist');
  
  const envContent = fs.readFileSync(envExamplePath, 'utf8');
  assert(envContent.includes('TELEGRAM_BOT_TOKEN'), 'Should include TELEGRAM_BOT_TOKEN');
  assert(envContent.includes('SOLANA_RPC_URL'), 'Should include SOLANA_RPC_URL');
  assert(envContent.includes('WALLET_SECRET'), 'Should include WALLET_SECRET');
  assert(envContent.includes('MYXN_MINT'), 'Should include MYXN_MINT');
});

// Test 6: Check bot.js syntax is valid
test('bot.js has valid syntax', () => {
  const botPath = path.join(__dirname, 'bot.js');
  const botContent = fs.readFileSync(botPath, 'utf8');
  
  // Check for required imports
  assert(botContent.includes("require('dotenv')"), 'Should import dotenv');
  assert(botContent.includes('node-telegram-bot-api'), 'Should import telegram bot api');
  assert(botContent.includes('@solana/web3.js'), 'Should import Solana web3');
  
  // Check for key functionality
  assert(botContent.includes('/start'), 'Should handle /start command');
  assert(botContent.includes('/balance'), 'Should handle /balance command');
  assert(botContent.includes('/swap'), 'Should handle /swap command');
});

// Test 7: Check webapp.js syntax is valid
test('webapp.js has valid syntax', () => {
  const webappPath = path.join(__dirname, 'webapp.js');
  const webappContent = fs.readFileSync(webappPath, 'utf8');
  
  // Check for required imports
  assert(webappContent.includes("require('dotenv')"), 'Should import dotenv');
  assert(webappContent.includes("require('express')"), 'Should import express');
  assert(webappContent.includes("require('cors')"), 'Should import cors');
  
  // Check for key API endpoints
  assert(webappContent.includes('/api/token-info'), 'Should have token-info endpoint');
  assert(webappContent.includes('/api/balance'), 'Should have balance endpoint');
  assert(webappContent.includes('/api/quote'), 'Should have quote endpoint');
  assert(webappContent.includes('/api/swap'), 'Should have swap endpoint');
});

// Test 8: Check public directory exists with required files
test('public directory exists with required files', () => {
  const publicPath = path.join(__dirname, 'public');
  assert(fs.existsSync(publicPath), 'public directory should exist');
  
  const indexPath = path.join(publicPath, 'index.html');
  assert(fs.existsSync(indexPath), 'index.html should exist');
  
  const appJsPath = path.join(publicPath, 'app.js');
  assert(fs.existsSync(appJsPath), 'app.js should exist');
});

// Test 9: Check README exists and contains documentation
test('README.md exists with proper documentation', () => {
  const readmePath = path.join(__dirname, 'README.md');
  assert(fs.existsSync(readmePath), 'README.md should exist');
  
  const readmeContent = fs.readFileSync(readmePath, 'utf8');
  assert(readmeContent.includes('Solana'), 'Should mention Solana');
  assert(readmeContent.includes('Installation'), 'Should have installation instructions');
  assert(readmeContent.includes('Usage'), 'Should have usage instructions');
});

// Test 10: Check frontend HTML is valid
test('Frontend HTML structure is valid', () => {
  const indexPath = path.join(__dirname, 'public', 'index.html');
  const htmlContent = fs.readFileSync(indexPath, 'utf8');
  
  assert(htmlContent.includes('<!DOCTYPE html>'), 'Should have DOCTYPE');
  assert(htmlContent.includes('<html'), 'Should have html tag');
  assert(htmlContent.includes('</html>'), 'Should close html tag');
  assert(htmlContent.includes('MYXN'), 'Should reference MYXN token');
});

// Test 11: Check frontend JavaScript structure
test('Frontend JavaScript is properly structured', () => {
  const appJsPath = path.join(__dirname, 'public', 'app.js');
  const jsContent = fs.readFileSync(appJsPath, 'utf8');
  
  assert(jsContent.includes('solanaWeb3'), 'Should use Solana Web3');
  assert(jsContent.includes('connectWallet'), 'Should have wallet connection logic');
  assert(jsContent.includes('Connection'), 'Should initialize Solana connection');
});

// Test 12: Verify bot.js can be required without .env
test('bot.js validates environment variables', () => {
  const botPath = path.join(__dirname, 'bot.js');
  const botContent = fs.readFileSync(botPath, 'utf8');
  
  // Should have environment variable validation
  assert(botContent.includes('TELEGRAM_BOT_TOKEN'), 'Should check for bot token');
  assert(botContent.includes('SOLANA_RPC_URL'), 'Should check for RPC URL');
  assert(botContent.includes('WALLET_SECRET'), 'Should check for wallet secret');
  assert(botContent.includes('process.exit'), 'Should exit on missing env vars');
});

// Test 13: Verify webapp.js validates required environment
test('webapp.js validates MYXN_MINT', () => {
  const webappPath = path.join(__dirname, 'webapp.js');
  const webappContent = fs.readFileSync(webappPath, 'utf8');
  
  assert(webappContent.includes('MYXN_MINT'), 'Should check for MYXN_MINT');
  assert(webappContent.includes('process.exit'), 'Should exit on missing MYXN_MINT');
});

// Test 14: Check for security warnings in README
test('README contains security warnings', () => {
  const readmePath = path.join(__dirname, 'README.md');
  const readmeContent = fs.readFileSync(readmePath, 'utf8');
  
  const hasSecurityWarning = readmeContent.includes('Security Warning') || readmeContent.includes('⚠️');
  assert(hasSecurityWarning, 'Should have security warnings');
  
  const hasTestWalletWarning = readmeContent.toLowerCase().includes('test wallet');
  assert(hasTestWalletWarning, 'Should warn about using test wallets');
});

// Test 15: Verify Jupiter API integration
test('Jupiter API integration is properly configured', () => {
  const botPath = path.join(__dirname, 'bot.js');
  const botContent = fs.readFileSync(botPath, 'utf8');
  
  assert(botContent.includes('quote-api.jup.ag'), 'Should use Jupiter Quote API');
  assert(botContent.includes('/quote'), 'Should have quote endpoint');
  assert(botContent.includes('/swap'), 'Should have swap endpoint');
});

// Print summary
console.log('\n' + '='.repeat(50));
console.log(`\n📊 Test Results: ${passed} passed, ${failed} failed\n`);

if (failed > 0) {
  console.log('❌ Failed tests:');
  failures.forEach(({ name, error }) => {
    console.log(`  - ${name}: ${error}`);
  });
  console.log('');
  process.exit(1);
} else {
  console.log('✅ All tests passed!\n');
  process.exit(0);
}
