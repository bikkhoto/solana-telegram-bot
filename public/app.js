// Solana Web3.js
const { Connection, PublicKey, Transaction, VersionedTransaction } = solanaWeb3;

// Application State
let walletAddress = null;
let connection = null;
let fromTokenMint = 'So11111111111111111111111111111111111111112'; // SOL
let toTokenMint = null; // Will be set from API
let currentQuote = null;
let slippageBps = 50; // 0.5%

// Initialize
document.addEventListener('DOMContentLoaded', async () => {
    await initializeApp();
    setupEventListeners();
});

async function initializeApp() {
    try {
        // Get token info from API
        const response = await fetch('/api/token-info');
        const data = await response.json();
        toTokenMint = data.myxnMint;
        
        // Initialize connection
        connection = new Connection(data.rpcUrl, 'confirmed');
        
        console.log('App initialized with MYXN mint:', toTokenMint);
    } catch (error) {
        console.error('Failed to initialize app:', error);
        showStatus('Failed to initialize app. Please refresh the page.', 'error');
    }
}

function setupEventListeners() {
    // Wallet connection
    document.getElementById('connectWallet').addEventListener('click', connectWallet);
    
    // Swap direction
    document.getElementById('swapDirection').addEventListener('click', swapTokenDirection);
    
    // Amount input - get quote when amount changes
    document.getElementById('fromAmount').addEventListener('input', debounce(getQuote, 500));
    
    // Slippage buttons
    document.querySelectorAll('.slippage-btn').forEach(btn => {
        btn.addEventListener('click', (e) => {
            document.querySelectorAll('.slippage-btn').forEach(b => b.classList.remove('active'));
            e.target.classList.add('active');
            slippageBps = parseInt(e.target.dataset.slippage);
            getQuote(); // Refresh quote with new slippage
        });
    });
    
    // Swap button
    document.getElementById('swapButton').addEventListener('click', executeSwap);
}

// Wallet Connection
async function connectWallet() {
    const button = document.getElementById('connectWallet');
    
    try {
        // Check if Phantom or Solflare is installed
        if (!window.solana) {
            showStatus('Please install Phantom, Solflare, or another Solana wallet extension.', 'error');
            window.open('https://phantom.app/', '_blank');
            return;
        }
        
        button.disabled = true;
        button.innerHTML = '<span class="loading"></span> Connecting...';
        
        // Connect to wallet
        const response = await window.solana.connect();
        walletAddress = response.publicKey.toString();
        
        // Update UI
        document.getElementById('walletAddress').textContent = walletAddress;
        document.getElementById('walletInfo').style.display = 'block';
        button.textContent = 'Connected ✓';
        button.style.background = '#28a745';
        
        // Enable swap button
        document.getElementById('swapButton').disabled = false;
        document.getElementById('swapButton').textContent = 'Get Quote';
        
        // Load balance
        await updateBalance();
        
        showStatus('Wallet connected successfully!', 'success');
        
        // Listen for wallet changes
        window.solana.on('accountChanged', (publicKey) => {
            if (publicKey) {
                walletAddress = publicKey.toString();
                document.getElementById('walletAddress').textContent = walletAddress;
                updateBalance();
            } else {
                disconnectWallet();
            }
        });
        
    } catch (error) {
        console.error('Failed to connect wallet:', error);
        showStatus('Failed to connect wallet. Please try again.', 'error');
        button.disabled = false;
        button.textContent = 'Connect Wallet';
    }
}

function disconnectWallet() {
    walletAddress = null;
    document.getElementById('walletInfo').style.display = 'none';
    document.getElementById('connectWallet').textContent = 'Connect Wallet';
    document.getElementById('connectWallet').style.background = '';
    document.getElementById('swapButton').disabled = true;
    document.getElementById('swapButton').textContent = 'Connect Wallet to Swap';
}

async function updateBalance() {
    if (!walletAddress) return;
    
    try {
        const response = await fetch('/api/balance', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ walletAddress })
        });
        
        const data = await response.json();
        document.getElementById('walletBalance').textContent = data.balance.toFixed(4);
        document.getElementById('fromBalance').textContent = data.balance.toFixed(4);
        
    } catch (error) {
        console.error('Failed to update balance:', error);
    }
}

// Swap Direction
function swapTokenDirection() {
    // Swap the tokens
    [fromTokenMint, toTokenMint] = [toTokenMint, fromTokenMint];
    
    // Update UI
    const fromToken = document.getElementById('fromToken');
    const toToken = document.getElementById('toToken');
    const fromTokenHTML = fromToken.innerHTML;
    fromToken.innerHTML = toToken.innerHTML;
    toToken.innerHTML = fromTokenHTML;
    
    // Clear amounts and quote
    document.getElementById('fromAmount').value = '';
    document.getElementById('toAmount').value = '';
    document.getElementById('quoteSection').classList.remove('show');
    currentQuote = null;
}

// Get Quote
async function getQuote() {
    const fromAmount = parseFloat(document.getElementById('fromAmount').value);
    
    if (!fromAmount || fromAmount <= 0) {
        document.getElementById('toAmount').value = '';
        document.getElementById('quoteSection').classList.remove('show');
        document.getElementById('swapButton').textContent = 'Get Quote';
        document.getElementById('swapButton').disabled = !walletAddress;
        return;
    }
    
    if (!walletAddress) {
        showStatus('Please connect your wallet first', 'error');
        return;
    }
    
    try {
        document.getElementById('swapButton').disabled = true;
        document.getElementById('swapButton').innerHTML = '<span class="loading"></span> Getting Quote...';
        
        // Convert amount to smallest unit (lamports for SOL = 9 decimals)
        // NOTE: Most Solana tokens use 9 decimals. For tokens with different decimals,
        // fetch token metadata or make this configurable
        const decimals = 9; // Default: 9 decimals (SOL standard)
        const amountInSmallestUnit = Math.floor(fromAmount * Math.pow(10, decimals));
        
        const response = await fetch('/api/quote', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({
                inputMint: fromTokenMint,
                outputMint: toTokenMint,
                amount: amountInSmallestUnit,
                slippageBps
            })
        });
        
        if (!response.ok) {
            throw new Error('Failed to get quote');
        }
        
        const quote = await response.json();
        currentQuote = quote;
        
        // Calculate output amount
        // NOTE: Using 9 decimals as default. For custom tokens with different decimals,
        // this should be fetched from token metadata
        const outputDecimals = 9; // Default: 9 decimals
        const outputAmount = quote.outAmount / Math.pow(10, outputDecimals);
        
        // Update UI
        document.getElementById('toAmount').value = outputAmount.toFixed(6);
        
        // Show quote details
        const rate = outputAmount / fromAmount;
        document.getElementById('quoteRate').textContent = `1 = ${rate.toFixed(6)}`;
        document.getElementById('priceImpact').textContent = quote.priceImpactPct 
            ? `${quote.priceImpactPct.toFixed(2)}%` 
            : 'N/A';
        
        const minReceived = outputAmount * (1 - slippageBps / 10000);
        document.getElementById('minReceived').textContent = minReceived.toFixed(6);
        
        document.getElementById('quoteSection').classList.add('show');
        document.getElementById('swapButton').textContent = 'Swap';
        document.getElementById('swapButton').disabled = false;
        
    } catch (error) {
        console.error('Error getting quote:', error);
        showStatus('Failed to get quote. Please try again.', 'error');
        document.getElementById('swapButton').textContent = 'Get Quote';
        document.getElementById('swapButton').disabled = false;
    }
}

// Execute Swap
async function executeSwap() {
    if (!currentQuote) {
        await getQuote();
        return;
    }
    
    if (!walletAddress || !window.solana) {
        showStatus('Please connect your wallet first', 'error');
        return;
    }
    
    const button = document.getElementById('swapButton');
    button.disabled = true;
    button.innerHTML = '<span class="loading"></span> Preparing Transaction...';
    
    try {
        // Step 1: Get swap transaction from backend
        showStatus('Creating swap transaction...', 'info');
        
        const swapResponse = await fetch('/api/swap', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({
                quoteResponse: currentQuote,
                userPublicKey: walletAddress
            })
        });
        
        if (!swapResponse.ok) {
            throw new Error('Failed to create swap transaction');
        }
        
        const { swapTransaction } = await swapResponse.json();
        
        // Step 2: Deserialize and sign transaction
        showStatus('Please approve the transaction in your wallet...', 'info');
        button.innerHTML = '<span class="loading"></span> Waiting for Approval...';
        
        const swapTransactionBuf = Buffer.from(swapTransaction, 'base64');
        const transaction = VersionedTransaction.deserialize(swapTransactionBuf);
        
        // Sign transaction with wallet
        const signedTransaction = await window.solana.signTransaction(transaction);
        
        // Step 3: Send transaction
        showStatus('Sending transaction...', 'info');
        button.innerHTML = '<span class="loading"></span> Sending...';
        
        const serializedTransaction = Buffer.from(signedTransaction.serialize()).toString('base64');
        
        const sendResponse = await fetch('/api/send-transaction', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({
                signedTransaction: serializedTransaction
            })
        });
        
        if (!sendResponse.ok) {
            throw new Error('Failed to send transaction');
        }
        
        const { signature, explorerUrl } = await sendResponse.json();
        
        // Step 4: Wait for confirmation
        showStatus('Confirming transaction...', 'info');
        button.innerHTML = '<span class="loading"></span> Confirming...';
        
        await waitForConfirmation(signature);
        
        // Success!
        const successMsg = document.getElementById('statusMessage');
        successMsg.innerHTML = `
            ✅ Swap successful!<br>
            <a href="${explorerUrl}" target="_blank" class="explorer-link">View on Solscan →</a>
        `;
        successMsg.className = 'status-message success show';
        
        // Reset form
        document.getElementById('fromAmount').value = '';
        document.getElementById('toAmount').value = '';
        document.getElementById('quoteSection').classList.remove('show');
        currentQuote = null;
        
        // Update balance
        await updateBalance();
        
        button.textContent = 'Get Quote';
        button.disabled = false;
        
    } catch (error) {
        console.error('Swap error:', error);
        showStatus(`Swap failed: ${error.message}`, 'error');
        button.textContent = 'Swap';
        button.disabled = false;
    }
}

async function waitForConfirmation(signature) {
    const maxAttempts = 30;
    let attempts = 0;
    
    while (attempts < maxAttempts) {
        try {
            const response = await fetch(`/api/transaction/${signature}`);
            const data = await response.json();
            
            if (data.status && data.status.confirmationStatus) {
                if (data.status.confirmationStatus === 'confirmed' || 
                    data.status.confirmationStatus === 'finalized') {
                    return;
                }
                
                if (data.status.err) {
                    throw new Error('Transaction failed');
                }
            }
            
            await new Promise(resolve => setTimeout(resolve, 2000));
            attempts++;
        } catch (error) {
            console.error('Error checking confirmation:', error);
            await new Promise(resolve => setTimeout(resolve, 2000));
            attempts++;
        }
    }
    
    throw new Error('Transaction confirmation timeout');
}

// Utility Functions
function showStatus(message, type) {
    const statusEl = document.getElementById('statusMessage');
    statusEl.textContent = message;
    statusEl.className = `status-message ${type} show`;
    
    if (type === 'success' || type === 'error') {
        setTimeout(() => {
            statusEl.classList.remove('show');
        }, 5000);
    }
}

function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

// Buffer polyfill for browser
if (typeof Buffer === 'undefined') {
    window.Buffer = {
        from: (arr, encoding) => {
            if (encoding === 'base64') {
                const binaryString = atob(arr);
                const bytes = new Uint8Array(binaryString.length);
                for (let i = 0; i < binaryString.length; i++) {
                    bytes[i] = binaryString.charCodeAt(i);
                }
                return bytes;
            }
            return new Uint8Array(arr);
        }
    };
}
