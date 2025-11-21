<?php header("Content-Type: text/html; charset=utf-8"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="openai-domain-verification" content="dv-QHb0Ph0nZDQ3fFInGfP8HaLG" />
    <meta name="facebook-domain-verification" content="l4cne9g5tshvb2zk4awtvnsy19vllz" />
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-KVWK4RJ2QN"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'G-KVWK4RJ2QN');
    </script>
    <meta name="google-site-verification" content="your-verification-code" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>MyXen Foundation – Building a Decentralized Tomorrow</title>
    <meta name="description" content="MyXen Foundation - Official Master Development & Vision Document. Pre-Sale starting November 12, 2025.">
    <meta property="og:title" content="MyXen Foundation – Building a Decentralized Tomorrow">
    <meta property="og:description" content="Official Master Development & Vision Document. Pre-Sale starting November 12, 2025.">
    <meta property="og:image" content="https://myxenpay.finance/og/og-home.jpg">
    <meta property="og:url" content="https://myxenpay.finance/">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="MyXen Foundation – Building a Decentralized Tomorrow">
    <meta name="twitter:description" content="Global Crypto Payments with VISA cards, QR payments & student rewards on Solana">
    <meta name="twitter:image" content="https://myxenpay.finance/og/og-home.jpg">
    
    <!-- SEO & Sitemap -->
    <link rel="canonical" href="https://www.myxenpay.finance/" />
    <link rel="sitemap" type="application/xml" href="/sitemap.xml">
    
    <!-- Preload critical resources -->
    <link rel="preload" href="myxenpay-logo-light.png" as="image">
    <link rel="preload" href="myxenpay-logo-dark.png" as="image">
    
    <!-- Structured Data for SEO -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Organization",
        "name": "MyXen Foundation",
        "url": "https://www.myxenpay.finance/",
        "logo": "https://www.myxenpay.finance/myxenpay-logo-light.png",
        "description": "Building a Decentralized Tomorrow, Responsibly and Transparently",
        "sameAs": [
        "https://x.com/myxenpay",
        "https://t.me/myxenpay"
        ]
    }
    </script>
    
    <style>
        /* CSS Variables for Theme */
        :root {
        --bg: #ffffff;
        --text: #111111;
        --card-bg: rgba(255, 255, 255, 0.7);
        --border: rgba(0, 0, 0, 0.05);
        --primary: #007AFF;
        --secondary: #30D158;
        --accent: #FF9F0A;
        --header-bg: rgba(255, 255, 255, 0.8);
        --shadow: 0 8px 32px rgba(0, 0, 0, 0.08);
        --glass-bg: rgba(255, 255, 255, 0.25);
        --glass-border: rgba(255, 255, 255, 0.18);
        --section-spacing: clamp(3rem, 8vw, 6rem);
        }

        [data-theme="dark"] {
        --bg: #000000;
        --text: #f5f5f7;
        --card-bg: rgba(30, 30, 30, 0.7);
        --border: rgba(255, 255, 255, 0.05);
        --primary: #0A84FF;
        --secondary: #32D74B;
        --accent: #FF9F0A;
        --header-bg: rgba(0, 0, 0, 0.8);
        --shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
        --glass-bg: rgba(0, 0, 0, 0.25);
        --glass-border: rgba(255, 255, 255, 0.1);
        }

        /* Reset and Base Styles */
        * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        }

        html {
        -webkit-text-size-adjust: 100%;
        scroll-behavior: smooth;
        font-size: 16px;
        }

        body {
        background: var(--bg);
        color: var(--text);
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
        line-height: 1.6;
        overflow-x: hidden;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        transition: background-color 0.3s ease, color 0.3s ease;
        }

        /* Presale Table Styles */
        .presale-table {
        width: 100%;
        max-width: 800px;
        margin: 2rem auto;
        border-collapse: collapse;
        background: var(--glass-bg);
        backdrop-filter: blur(20px);
        border-radius: 16px;
        overflow: hidden;
        border: 1px solid var(--glass-border);
        }

        .presale-table th,
        .presale-table td {
        padding: 1rem 1.5rem;
        text-align: left;
        border-bottom: 1px solid var(--border);
        }

        .presale-table th {
        background: var(--primary);
        color: white;
        font-weight: 600;
        font-size: 0.9rem;
        }

        .presale-table tr:last-child td {
        border-bottom: none;
        }

        .presale-table tr:hover {
        background: var(--glass-bg);
        }

        /* Social Share Buttons */
        .social-share {
        display: flex;
        gap: 0.75rem;
        justify-content: center;
        flex-wrap: wrap;
        margin: 2rem 0;
        }

        .social-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 44px;
        height: 44px;
        border-radius: 12px;
        background: var(--glass-bg);
        backdrop-filter: blur(20px);
        border: 1px solid var(--glass-border);
        cursor: pointer;
        transition: all 0.3s ease;
        font-size: 1.25rem;
        text-decoration: none;
        color: var(--text);
        }

        .social-btn:hover {
        transform: translateY(-2px);
        box-shadow: var(--shadow);
        }

        .social-btn.twitter:hover { background: #1DA1F2; color: white; }
        .social-btn.telegram:hover { background: #0088CC; color: white; }
        .social-btn.whatsapp:hover { background: #25D366; color: white; }
        .social-btn.linkedin:hover { background: #0077B5; color: white; }
        .social-btn.facebook:hover { background: #4267B2; color: white; }
        .social-btn.reddit:hover { background: #FF4500; color: white; }
        .social-btn.copy:hover { background: var(--primary); color: white; }

        .share-text {
        text-align: center;
        margin-bottom: 1rem;
        font-weight: 600;
        color: var(--primary);
        }

        .share-toast {
        position: fixed;
        bottom: 2rem;
        left: 50%;
        transform: translateX(-50%) translateY(100px);
        background: var(--secondary);
        color: black;
        padding: 1rem 1.5rem;
        border-radius: 12px;
        font-weight: 600;
        box-shadow: var(--shadow);
        z-index: 10000;
        opacity: 0;
        transition: all 0.3s ease;
        }

        .share-toast.show {
        transform: translateX(-50%) translateY(0);
        opacity: 1;
        }

        /* Verified Badges */
        .verified-badges {
        display: flex;
        flex-direction: column;
        gap: 1rem;
        margin: 2rem 0;
        align-items: center;
        }

        .badge {
        background: var(--secondary);
        color: black;
        padding: 0.5rem 1rem;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        width: fit-content;
        }

        .badge.solana { background: #9945FF; color: white; }
        .badge.gdpr { background: #059669; color: white; }
        .badge.safe { background: #60a5fa; color: white; }
        .badge.ssl { background: #00d664; color: white; }
        .badge.visa { background: #1a1f71; color: white; }
        .badge.solana-pay { background: linear-gradient(45deg, #9945FF, #14F195); color: white; }
        .badge.secure-payment { background: #dc2626; color: white; }

        .company-registration {
        text-align: center;
        margin: 1.5rem 0;
        padding: 1rem;
        background: var(--glass-bg);
        border-radius: 12px;
        border: 1px solid var(--glass-border);
        }

        .company-registration p {
        margin: 0;
        font-size: 0.9rem;
        opacity: 0.8;
        }

        /* Mobile Navigation Toggle */
        .mobile-nav-toggle {
        display: none;
        background: none;
        border: none;
        width: 44px;
        height: 44px;
        cursor: pointer;
        z-index: 1001;
        position: relative;
        align-items: center;
        justify-content: center;
        }

        .mobile-nav-toggle span {
        display: block;
        width: 22px;
        height: 2px;
        background: var(--text);
        transition: all 0.3s ease;
        position: relative;
        }

        .mobile-nav-toggle span::before,
        .mobile-nav-toggle span::after {
        content: '';
        position: absolute;
        width: 22px;
        height: 2px;
        background: var(--text);
        transition: all 0.3s ease;
        }

        .mobile-nav-toggle span::before {
        top: -6px;
        }

        .mobile-nav-toggle span::after {
        top: 6px;
        }

        .mobile-nav-toggle.active span {
        background: transparent;
        }

        .mobile-nav-toggle.active span::before {
        transform: rotate(45deg) translate(4px, 4px);
        }

        .mobile-nav-toggle.active span::after {
        transform: rotate(-45deg) translate(4px, -4px);
        }

        /* Header Styles */
        .site-header {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 1000;
        background: var(--header-bg);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border-bottom: 1px solid var(--border);
        transition: background-color 0.3s ease, border-color 0.3s ease;
        }

        .header-container {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0.75rem 1rem;
        max-width: 1440px;
        margin: 0 auto;
        }

        .logo {
        height: 32px;
        width: auto;
        transition: transform 0.3s ease;
        }

        .logo:hover {
        transform: scale(1.05);
        }

        /* Desktop Navigation */
        .desktop-nav {
        display: flex;
        gap: 2rem;
        align-items: center;
        }

        .desktop-nav a {
        color: var(--text);
        text-decoration: none;
        font-weight: 500;
        font-size: 0.95rem;
        transition: color 0.3s ease;
        opacity: 0.8;
        }

        .desktop-nav a:hover,
        .desktop-nav a.active {
        color: var(--primary);
        opacity: 1;
        }

        .header-actions {
        display: flex;
        gap: 0.75rem;
        align-items: center;
        }

        .theme-btn, .connect-btn {
        background: none;
        border: 1px solid var(--border);
        width: 40px;
        height: 40px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        font-size: 16px;
        transition: all 0.3s ease;
        }

        .theme-btn:hover, .connect-btn:hover {
        transform: translateY(-1px);
        box-shadow: var(--shadow);
        }

        .connect-btn {
        background: var(--primary);
        color: white;
        border: none;
        width: auto;
        padding: 0 1rem;
        font-weight: 600;
        font-size: 0.9rem;
        }

        .connect-btn.connected {
        background: var(--secondary);
        }

        /* Mobile Navigation */
        .mobile-nav {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: var(--header-bg);
        backdrop-filter: blur(30px);
        -webkit-backdrop-filter: blur(30px);
        z-index: 999;
        transform: translateX(-100%);
        transition: transform 0.4s cubic-bezier(0.23, 1, 0.32, 1);
        padding: 5rem 2rem 2rem;
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
        }

        .mobile-nav.active {
        transform: translateX(0);
        }

        .mobile-nav a {
        color: var(--text);
        text-decoration: none;
        font-weight: 500;
        font-size: 1.25rem;
        padding: 1rem 0;
        border-bottom: 1px solid var(--border);
        transition: color 0.3s ease;
        opacity: 0.8;
        }

        .mobile-nav a:hover,
        .mobile-nav a.active {
        color: var(--primary);
        opacity: 1;
        }

        /* Hero Section - Apple Style */
        .hero {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        padding: 6rem 1rem 4rem;
        position: relative;
        overflow: hidden;
        }

        .hero::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: radial-gradient(ellipse at center, transparent 0%, var(--bg) 70%);
        z-index: -1;
        }

        .hero-content {
        max-width: 800px;
        margin: 0 auto;
        }

        .hero h1 {
        font-size: clamp(2.5rem, 5vw, 4rem);
        font-weight: 700;
        line-height: 1.1;
        margin-bottom: 1.5rem;
        background: linear-gradient(135deg, var(--primary) 0%, var(--accent) 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        letter-spacing: -0.02em;
        }

        .hero p {
        font-size: clamp(1.125rem, 2.5vw, 1.5rem);
        line-height: 1.4;
        margin-bottom: 2.5rem;
        opacity: 0.8;
        font-weight: 400;
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
        }

        .hero-actions {
        display: flex;
        gap: 1rem;
        justify-content: center;
        flex-wrap: wrap;
        }

        .btn {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 1rem 2rem;
        border-radius: 12px;
        text-decoration: none;
        font-weight: 600;
        font-size: 1rem;
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
        }

        .btn-primary {
        background: var(--primary);
        color: white;
        }

        .btn-primary:hover {
        background: var(--secondary);
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        }

        .btn-secondary {
        background: transparent;
        color: var(--primary);
        border: 2px solid var(--primary);
        }

        .btn-secondary:hover {
        background: var(--primary);
        color: white;
        transform: translateY(-2px);
        }

        /* Countdown Section */
        .countdown-section {
        padding: 4rem 1rem;
        text-align: center;
        background: var(--glass-bg);
        backdrop-filter: blur(20px);
        margin: 2rem auto;
        border-radius: 24px;
        max-width: 800px;
        border: 1px solid var(--glass-border);
        }

        .countdown-label {
        font-size: 1.5rem;
        margin-bottom: 2rem;
        color: var(--primary);
        font-weight: 700;
        }

        .countdown-timer {
        display: flex;
        justify-content: center;
        gap: 1.5rem;
        flex-wrap: wrap;
        margin: 2rem 0;
        }

        .countdown-item {
        text-align: center;
        }

        .countdown-number {
        font-size: clamp(2rem, 5vw, 3rem);
        font-weight: 700;
        background: linear-gradient(135deg, var(--primary), var(--secondary));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        display: block;
        line-height: 1;
        }

        .countdown-unit {
        font-size: 0.9rem;
        color: var(--text);
        opacity: 0.7;
        margin-top: 0.5rem;
        font-weight: 500;
        }

        /* Notify Section */
        .notify-section {
        background: var(--glass-bg);
        backdrop-filter: blur(20px);
        border: 1px solid var(--glass-border);
        border-radius: 20px;
        padding: 2rem;
        margin: 2rem auto;
        max-width: 500px;
        text-align: center;
        }

        .notify-section p {
        margin-bottom: 1.5rem;
        font-size: 1.1rem;
        color: var(--text);
        }

        .notify-form {
        display: flex;
        flex-direction: column;
        gap: 1rem;
        max-width: 400px;
        margin: 0 auto;
        }

        .form-input {
        padding: 1rem 1.25rem;
        border: 1px solid var(--border);
        border-radius: 12px;
        background: transparent;
        color: var(--text);
        font-size: 1rem;
        transition: all 0.3s ease;
        }

        .form-input:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(0, 122, 255, 0.1);
        }

        /* Features Section */
        .section {
        padding: var(--section-spacing) 1rem;
        }

        .section-header {
        text-align: center;
        margin-bottom: 4rem;
        }

        .section-title {
        font-size: clamp(2rem, 4vw, 3rem);
        font-weight: 700;
        background: linear-gradient(135deg, var(--primary), var(--accent));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin-bottom: 1rem;
        letter-spacing: -0.02em;
        }

        .section-subtitle {
        font-size: 1.25rem;
        opacity: 0.7;
        max-width: 600px;
        margin: 0 auto;
        }

        .features-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 2rem;
        max-width: 1200px;
        margin: 0 auto;
        }

        .feature-card {
        background: var(--glass-bg);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border: 1px solid var(--glass-border);
        border-radius: 24px;
        padding: 2.5rem 2rem;
        text-align: center;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
        }

        .feature-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, var(--primary), var(--secondary));
        transform: scaleX(0);
        transition: transform 0.3s ease;
        }

        .feature-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }

        .feature-card:hover::before {
        transform: scaleX(1);
        }

        .feature-icon {
        font-size: 3rem;
        margin-bottom: 1.5rem;
        display: block;
        transition: transform 0.3s ease;
        }

        .feature-card:hover .feature-icon {
        transform: scale(1.1);
        }

        .feature-title {
        font-size: 1.5rem;
        margin-bottom: 1rem;
        color: var(--primary);
        font-weight: 700;
        }

        .feature-description {
        color: var(--text);
        opacity: 0.8;
        margin-bottom: 1.5rem;
        line-height: 1.6;
        font-size: 1rem;
        }

        .feature-link {
        color: var(--primary);
        text-decoration: none;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.3s ease;
        }

        .feature-link:hover {
        color: var(--accent);
        transform: translateX(5px);
        }

        /* Footer */
        footer {
        background: var(--glass-bg);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border-top: 1px solid var(--border);
        padding: 4rem 1rem 2rem;
        margin-top: 4rem;
        }

        .footer-content {
        max-width: 1200px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 1fr;
        gap: 3rem;
        text-align: center;
        }

        .footer-section h3 {
        margin-bottom: 1.5rem;
        color: var(--primary);
        font-size: 1.25rem;
        }

        .footer-links {
        list-style: none;
        display: inline-block;
        text-align: left;
        }

        .footer-links li {
        margin-bottom: 0.75rem;
        }

        .footer-links a {
        color: var(--text);
        text-decoration: none;
        opacity: 0.8;
        transition: all 0.3s ease;
        font-size: 1rem;
        }

        .footer-links a:hover {
        opacity: 1;
        color: var(--primary);
        transform: translateX(5px);
        }

        .copyright {
        text-align: center;
        margin-top: 3rem;
        padding-top: 2rem;
        border-top: 1px solid var(--border);
        opacity: 0.7;
        font-size: 0.9rem;
        }

        /* Animations */
        @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
        }

        .fade-in-up {
        animation: fadeInUp 0.8s ease both;
        }

        /* Responsive Design */
        @media (min-width: 768px) {
        .header-container {
            padding: 1rem 2rem;
        }
        
        .logo {
            height: 40px;
        }
        
        .hero {
            padding: 8rem 2rem 6rem;
        }
        
        .features-grid {
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2.5rem;
        }
        
        .footer-content {
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }
        
        .verified-badges {
            flex-direction: row;
            justify-content: center;
            flex-wrap: wrap;
        }
        
        .notify-form {
            flex-direction: row;
        }
        }

        @media (max-width: 767px) {
        .mobile-nav-toggle {
            display: flex;
        }
        
        .desktop-nav {
            display: none;
        }
        
        .hero-actions {
            flex-direction: column;
            align-items: center;
        }
        
        .btn {
            width: 100%;
            max-width: 280px;
            justify-content: center;
        }
        
        .presale-table {
            font-size: 0.8rem;
        }
        
        .presale-table th,
        .presale-table td {
            padding: 0.5rem 0.75rem;
        }
        }

        /* Loading Animation */
        .loading {
        display: inline-block;
        width: 20px;
        height: 20px;
        border: 3px solid rgba(255,255,255,.3);
        border-radius: 50%;
        border-top-color: #fff;
        animation: spin 1s ease-in-out infinite;
        }

        @keyframes spin {
        to { transform: rotate(360deg); }
        }

        /* Safe area for notch devices */
        @supports(padding: max(0px)) {
        body, .header-container, .section {
            padding-left: max(1rem, env(safe-area-inset-left));
            padding-right: max(1rem, env(safe-area-inset-right));
        }
        
        .hero {
            padding-top: max(6rem, env(safe-area-inset-top));
        }
        }
    </style>
</head>
<body>
    <!-- Site Header -->
    <header class="site-header">
        <div class="header-container">
        <!-- Logo -->
        <a href="index.php">
            <img id="theme-logo" src="myxenpay-logo-light.png" alt="MyXen Foundation" class="logo">
        </a>

        <!-- Mobile Navigation Toggle -->
        <button class="mobile-nav-toggle" id="mobile-nav-toggle">
            <span></span>
        </button>

        <!-- Desktop Navigation -->
        <nav class="desktop-nav">
            <a href="tokenomics.php">Tokenomics</a>
            <a href="whitepaper.php">Whitepaper</a>
            <a href="presale.php">Pre-Sale</a>
            <a href="student-rewards.php">Student Rewards</a>
            <a href="developers.php">Developers</a>
            <a href="merchants.php">For Businesses</a>
        </nav>

        <!-- Header Actions -->
        <div class="header-actions">
            <button id="theme-toggle" class="theme-btn">☀️</button>
            <button id="connect-btn" class="connect-btn">Connect Wallet</button>
        </div>
        </div>
    </header>

    <!-- Mobile Navigation -->
    <nav class="mobile-nav" id="mobile-nav">
        <a href="tokenomics.php">Tokenomics</a>
        <a href="whitepaper.php">Whitepaper</a>
        <a href="presale.php">Pre-Sale</a>
        <a href="student-rewards.php">Student Rewards</a>
        <a href="developers.php">Developers</a>
        <a href="merchants.php">For Businesses</a>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content fade-in-up">
        <h1>Building a Decentralized Tomorrow</h1>
        <p>MyXen Foundation - Official Master Development & Vision Document. Pre-Sale starting November 12, 2025.</p>
        
        <!-- Social Share Buttons in Hero -->
        <div class="social-share">
            <div class="share-text">Share MyXen Foundation</div>
            <button class="social-btn twitter" title="Share on Twitter">🐦</button>
            <button class="social-btn telegram" title="Share on Telegram">📢</button>
            <button class="social-btn whatsapp" title="Share on WhatsApp">💬</button>
            <button class="social-btn linkedin" title="Share on LinkedIn">💼</button>
            <button class="social-btn facebook" title="Share on Facebook">📘</button>
            <button class="social-btn reddit" title="Share on Reddit">🤖</button>
            <button class="social-btn copy" title="Copy link">🔗</button>
        </div>
        
        <div class="hero-actions">
            <a href="presale.php" class="btn btn-primary">
            Join Pre-Sale
            </a>
            <a href="whitepaper.php" class="btn btn-secondary">
            Read Whitepaper
            </a>
        </div>
        </div>
    </section>

    <!-- Countdown Section -->
    <section class="countdown-section fade-in-up">
        <div class="countdown-label">Pre-Sale Starting November 12, 2025</div>
        <div class="countdown-timer" id="countdown">
        <div class="countdown-item">
            <span class="countdown-number" id="days">00</span>
            <span class="countdown-unit">Days</span>
        </div>
        <div class="countdown-item">
            <span class="countdown-number" id="hours">00</span>
            <span class="countdown-unit">Hours</span>
        </div>
        <div class="countdown-item">
            <span class="countdown-number" id="minutes">00</span>
            <span class="countdown-unit">Minutes</span>
        </div>
        <div class="countdown-item">
            <span class="countdown-number" id="seconds">00</span>
            <span class="countdown-unit">Seconds</span>
        </div>
        </div>
        
        <div class="notify-section">
        <p>Get notified when our Pre-Sale goes live</p>
        <form class="notify-form" id="launch-notify-form">
            <input type="email" class="form-input" placeholder="your@email.com" required />
            <button type="submit" class="btn btn-primary">Notify Me</button>
        </form>
        </div>
    </section>

    <!-- Pre-Sale Phases -->
    <section class="section">
        <div class="section-header">
        <h2 class="section-title">Pre-Sale Phases</h2>
        <p class="section-subtitle">6 phases with increasing price - Starting November 12, 2025</p>
        </div>
        
        <table class="presale-table">
        <thead>
            <tr>
            <th>Phase</th>
            <th>Range (MYXN)</th>
            <th>Price (USD)</th>
            <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <td>Phase 1</td>
            <td>0–25M</td>
            <td>$0.0001</td>
            <td><span class="phase-badge">Upcoming</span></td>
            </tr>
            <tr>
            <td>Phase 2</td>
            <td>25M–100M</td>
            <td>$0.0005</td>
            <td><span class="phase-badge">Upcoming</span></td>
            </tr>
            <tr>
            <td>Phase 3</td>
            <td>100M–150M</td>
            <td>$0.001</td>
            <td><span class="phase-badge">Upcoming</span></td>
            </tr>
            <tr>
            <td>Phase 4</td>
            <td>150M–200M</td>
            <td>$0.002</td>
            <td><span class="phase-badge">Upcoming</span></td>
            </tr>
            <tr>
            <td>Phase 5</td>
            <td>200M–250M</td>
            <td>$0.003</td>
            <td><span class="phase-badge">Upcoming</span></td>
            </tr>
            <tr>
            <td>Phase 6</td>
            <td>250M–300M</td>
            <td>$0.005</td>
            <td><span class="phase-badge">Upcoming</span></td>
            </tr>
        </tbody>
        </table>
    </section>

    <!-- Core Features -->
    <section class="section">
        <div class="section-header">
        <h2 class="section-title">MyXen Ecosystem</h2>
        <p class="section-subtitle">Comprehensive suite of decentralized applications</p>
        </div>
        <div class="features-grid">
        <div class="feature-card fade-in-up">
            <div class="feature-icon">💳</div>
            <h3 class="feature-title">MyXenPay</h3>
            <p class="feature-description">Main Utility Token for payments, QR codes, merchant solutions, and student tuition fees.</p>
            <a href="myxenpay.php" class="feature-link">Learn more →</a>
        </div>
        <div class="feature-card fade-in-up">
            <div class="feature-icon">🚀</div>
            <h3 class="feature-title">MyXen Meme</h3>
            <p class="feature-description">Fuel of MyXen Ecosystem - Community engagement and marketing platform.</p>
            <a href="myxen-meme.php" class="feature-link">Learn more →</a>
        </div>
        <div class="feature-card fade-in-up">
            <div class="feature-icon">🌍</div>
            <h3 class="feature-title">MyXen.Life</h3>
            <p class="feature-description">3 Zero Idea implementation - Sustainable and impactful global initiatives.</p>
            <a href="myxen-life.php" class="feature-link">Learn more →</a>
        </div>
        <div class="feature-card fade-in-up">
            <div class="feature-icon">🎓</div>
            <h3 class="feature-title">MyXen.University</h3>
            <p class="feature-description">Dedicated platform for universities - Student verification and educational payments.</p>
            <a href="myxen-university.php" class="feature-link">Learn more →</a>
        </div>
        <div class="feature-card fade-in-up">
            <div class="feature-icon">⚡</div>
            <h3 class="feature-title">MyXen.CEO</h3>
            <p class="feature-description">Full admin control system for the entire MyXen ecosystem management.</p>
            <a href="myxen-ceo.php" class="feature-link">Learn more →</a>
        </div>
        <div class="feature-card fade-in-up">
            <div class="feature-icon">✈️</div>
            <h3 class="feature-title">MyXen.Travel</h3>
            <p class="feature-description">Book flights and hotels with crypto - Travel made simple with blockchain.</p>
            <a href="myxen-travel.php" class="feature-link">Learn more →</a>
        </div>
        </div>
    </section>

    <!-- Additional Ecosystem Products -->
    <section class="section">
        <div class="section-header">
        <h2 class="section-title">Complete Ecosystem</h2>
        <p class="section-subtitle">Everything you need in one unified platform</p>
        </div>
        <div class="features-grid">
        <div class="feature-card fade-in-up">
            <div class="feature-icon">🛠️</div>
            <h3 class="feature-title">MyXen.Work</h3>
            <p class="feature-description">Decentralized freelancing platform - Work globally, get paid instantly.</p>
            <a href="myxen-work.php" class="feature-link">Learn more →</a>
        </div>
        <div class="feature-card fade-in-up">
            <div class="feature-icon">📧</div>
            <h3 class="feature-title">MyXen.Mail</h3>
            <p class="feature-description">Decentralized email platform - Secure communication for the ecosystem.</p>
            <a href="myxen-mail.php" class="feature-link">Learn more →</a>
        </div>
        <div class="feature-card fade-in-up">
            <div class="feature-icon">💬</div>
            <h3 class="feature-title">MyXen.Social</h3>
            <p class="feature-description">Content publishing platform - Create, share, and get rewarded.</p>
            <a href="myxen-social.php" class="feature-link">Learn more →</a>
        </div>
        <div class="feature-card fade-in-up">
            <div class="feature-icon">🛒</div>
            <h3 class="feature-title">MyXen.Store</h3>
            <p class="feature-description">Simple UI/UX e-commerce system - Buy and sell with crypto.</p>
            <a href="myxen-store.php" class="feature-link">Learn more →</a>
        </div>
        <div class="feature-card fade-in-up">
            <div class="feature-icon">🔒</div>
            <h3 class="feature-title">MyXen.Locker</h3>
            <p class="feature-description">Secure token locking and vesting management system.</p>
            <a href="myxen-locker.php" class="feature-link">Learn more →</a>
        </div>
        <div class="feature-card fade-in-up">
            <div class="feature-icon">💰</div>
            <h3 class="feature-title">MyXen.Payroll</h3>
            <p class="feature-description">Enterprise-grade payroll system - Streamlined payment processing.</p>
            <a href="myxen-payroll.php" class="feature-link">Learn more →</a>
        </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="footer-content">
        <div class="footer-section">
            <h3>MyXen Foundation</h3>
            <p>Building a Decentralized Tomorrow, Responsibly and Transparently</p>
            
            <!-- Company Registration -->
            <div class="company-registration">
            <p>🏢 <strong>UK Registered Company</strong><br>Registration Number: °°°°°°</p>
            <p>📧 contact@myxenpay.finance<br>☎️ +1 (786) 509-7729</p>
            </div>
        </div>
        
        <div class="footer-section">
            <h3>Connect</h3>
            <ul class="footer-links">
            <li><a href="https://x.com/myxenpay" target="_blank">Twitter / X</a></li>
            <li><a href="https://t.me/myxenpay" target="_blank">Telegram</a></li>
            <li><a href="https://www.facebook.com/myxen.foundation/" target="_blank">Facebook</a></li>
            <li><a href="https://www.instagram.com/myxenp_inc/" target="_blank">Instagram</a></li>
            <li><a href="mailto:support@myxenpay.finance">Email Support</a></li>
            <li><a href="https://github.com/bikkhoto/myxenpay.finance" target="_blank">GitHub</a></li>
            </ul>
            <div style="background: var(--card-bg); border: 1px solid var(--border); padding: 15px; border-radius: 8px; margin-top: 15px;">
            <p style="margin: 0; font-size: 0.9rem; color: var(--text);">🚀 <strong>Pre-Sale Starting:</strong> November 12, 2025</p>
            </div>
        </div>
        </div>
        
        <!-- Updated Verified Badges -->
        <div class="verified-badges">
        <span class="badge solana">✅ Verified by Solana</span>
        <span class="badge solana-pay">⚡ Solana Pay Verified</span>
        <span class="badge gdpr">🔒 GDPR Compliant</span>
        <span class="badge ssl">🔐 SSL SECURED</span>
        <span class="badge visa">💳 VISA Verified</span>
        <span class="badge secure-payment">🛡️ Secure Payment</span>
        </div>
        
        <div class="copyright">
        <p>© 2025 MyXen Foundation LTD. All rights reserved. Building a decentralized tomorrow, responsibly and transparently.</p>
        </div>
    </footer>

    <!-- Share Toast Notification -->
    <div id="share-toast" class="share-toast">Link copied to clipboard!</div>

    <script>
        // Anti-scrape
        document.addEventListener('contextmenu', e => e.preventDefault());
        document.addEventListener('selectstart', e => e.preventDefault());

        // Global state
        let walletConnected = false;
        let walletAddress = null;

        // Theme Management
        function initTheme() {
        const saved = localStorage.getItem('theme');
        const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
        
        if (saved === 'dark' || (!saved && prefersDark)) {
            document.body.setAttribute('data-theme', 'dark');
            document.getElementById('theme-logo').src = 'myxenpay-logo-dark.png';
            document.getElementById('theme-toggle').textContent = '🌙';
        } else {
            document.body.setAttribute('data-theme', 'light');
            document.getElementById('theme-logo').src = 'myxenpay-logo-light.png';
            document.getElementById('theme-toggle').textContent = '☀️';
        }
        }

        // Mobile Navigation
        function initMobileNav() {
        const mobileNavToggle = document.getElementById('mobile-nav-toggle');
        const mobileNav = document.getElementById('mobile-nav');
        
        if (mobileNavToggle && mobileNav) {
            mobileNavToggle.addEventListener('click', () => {
            mobileNavToggle.classList.toggle('active');
            mobileNav.classList.toggle('active');
            document.body.style.overflow = mobileNav.classList.contains('active') ? 'hidden' : '';
            });

            // Close mobile nav when clicking on links
            mobileNav.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                mobileNavToggle.classList.remove('active');
                mobileNav.classList.remove('active');
                document.body.style.overflow = '';
            });
            });
        }
        }

        // Theme Toggle
        function initThemeToggle() {
        const themeToggle = document.getElementById('theme-toggle');
        if (themeToggle) {
            themeToggle.addEventListener('click', () => {
            const current = document.body.getAttribute('data-theme');
            const newTheme = current === 'dark' ? 'light' : 'dark';
            
            document.body.setAttribute('data-theme', newTheme);
            localStorage.setItem('theme', newTheme);
            
            // Update logo
            const logo = document.getElementById('theme-logo');
            if (logo) {
            logo.src = newTheme === 'dark' ? 'myxenpay-logo-dark.png' : 'myxenpay-logo-light.png';
            }
            
            // Update button text
            themeToggle.textContent = newTheme === 'dark' ? '🌙' : '☀️';
            });
        }
        }

        // Wallet Connection
        async function connectWallet() {
        const provider = window.solana || window.phantom?.solana;
        const connectBtn = document.getElementById('connect-btn');
        
        if (!provider) {
            alert('Please install Phantom or Backpack wallet.');
            return;
        }
        
        // If already connected, disconnect
        if (walletConnected) {
            try {
            if (provider.disconnect) {
                await provider.disconnect();
            }
            walletConnected = false;
            walletAddress = null;
            connectBtn.textContent = 'Connect Wallet';
            connectBtn.classList.remove('connected');
            return;
            } catch (error) {
            // Silent disconnect error handling
            }
        }
        
        // Connect wallet
        const originalText = connectBtn.textContent;
        connectBtn.innerHTML = '<div class="loading"></div>';
        connectBtn.disabled = true;
        
        try {
            const response = await provider.connect();
            walletConnected = true;
            walletAddress = response.publicKey.toString();
            
            const truncatedAddress = walletAddress.substring(0, 4) + '...' + walletAddress.substring(walletAddress.length - 4);
            connectBtn.textContent = `Disconnect ${truncatedAddress}`;
            connectBtn.classList.add('connected');
            connectBtn.disabled = false;
            
        } catch (err) {
            connectBtn.textContent = 'Failed - Retry';
            connectBtn.disabled = false;
            setTimeout(() => {
            connectBtn.textContent = originalText;
            }, 3000);
        }
        }

        // Countdown Timer - Updated to November12, 2025 EST
        const PRESALE_DATE = new Date('November 12, 2025 12:00:00 EST').getTime();
        function updateCountdown() {
        const now = new Date().getTime();
        const diff = PRESALE_DATE - now;
        
        if (diff <= 0) {
            document.getElementById('countdown').innerHTML = '<div class="countdown-number" style="color:var(--secondary);font-size:3rem;">PRE-SALE LIVE!</div>';
            document.querySelector('.notify-section').style.display = 'none';
            return;
        }
        
        const days = Math.floor(diff / (1000 * 60 * 60 * 24));
        const hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((diff % (1000 * 60)) / 1000);
        
        const daysEl = document.getElementById('days');
        const hoursEl = document.getElementById('hours');
        const minutesEl = document.getElementById('minutes');
        const secondsEl = document.getElementById('seconds');
        
        if (daysEl) daysEl.textContent = String(days).padStart(2, '0');
        if (hoursEl) hoursEl.textContent = String(hours).padStart(2, '0');
        if (minutesEl) minutesEl.textContent = String(minutes).padStart(2, '0');
        if (secondsEl) secondsEl.textContent = String(seconds).padStart(2, '0');
        }

        // Waitlist Form
        function initWaitlistForm() {
        const form = document.getElementById('launch-notify-form');
        if (form) {
            form.addEventListener('submit', async (e) => {
            e.preventDefault();
            const email = e.target.querySelector('input').value;
            const button = e.target.querySelector('button');
            
            if (!email || !email.includes('@')) {
                alert('Please enter a valid email address.');
                return;
            }
            
            const originalText = button.textContent;
            button.innerHTML = '<div class="loading"></div>';
            button.disabled = true;
            
            try {
                // Simulate API call
                await new Promise(resolve => setTimeout(resolve, 1000));
                alert('Successfully subscribed to pre-sale notifications!');
                e.target.reset();
            } catch (err) {
                alert('Failed to subscribe. Please try again later.');
            } finally {
                button.textContent = originalText;
                button.disabled = false;
            }
            });
        }
        }

        // Social Share Functions
        function showToast(message) {
        const toast = document.getElementById('share-toast');
        if (toast) {
            toast.textContent = message;
            toast.classList.add('show');
            setTimeout(() => {
            toast.classList.remove('show');
            }, 3000);
        }
        }

        function shareOnTwitter() {
        const url = encodeURIComponent(window.location.href);
        const text = encodeURIComponent("🚀 MyXen Foundation - Building a Decentralized Tomorrow! \n\n🏛️ Official Master Development & Vision Document\n💎 Pre-Sale starting November 12, 2025\n🌍 Comprehensive ecosystem on Solana\n\n#MyXenFoundation #DeFi #Crypto #Solana #PreSale");
        window.open(`https://twitter.com/intent/tweet?text=${text}&url=${url}`, '_blank', 'width=600,height=400');
        }

        function shareOnTelegram() {
        const url = encodeURIComponent(window.location.href);
        const text = encodeURIComponent("🚀 MyXen Foundation - Building a Decentralized Tomorrow\n🏛️ Official Master Development & Vision Document\n💎 Pre-Sale starting November 12, 2025\n🌍 Comprehensive ecosystem on Solana");
        window.open(`https://t.me/share/url?url=${url}&text=${text}`, '_blank', 'width=600,height=400');
        }

        function shareOnWhatsApp() {
        const url = encodeURIComponent(window.location.href);
        const text = encodeURIComponent("Check out MyXen Foundation - Building a Decentralized Tomorrow! Official Master Development & Vision Document. Pre-Sale starting November 12, 2025.");
        window.open(`https://wa.me/?text=${text}%20${url}`, '_blank', 'width=600,height=400');
        }

        function shareOnLinkedIn() {
        const url = encodeURIComponent(window.location.href);
        const title = encodeURIComponent("MyXen Foundation - Building a Decentralized Tomorrow");
        const summary = encodeURIComponent("Official Master Development & Vision Document. Pre-Sale starting November 12, 2025. Comprehensive ecosystem on Solana.");
        window.open(`https://www.linkedin.com/sharing/share-offsite/?url=${url}&title=${title}&summary=${summary}`, '_blank', 'width=600,height=400');
        }

        function shareOnFacebook() {
        const url = encodeURIComponent(window.location.href);
        window.open(`https://www.facebook.com/sharer/sharer.php?u=${url}`, '_blank', 'width=600,height=400');
        }

        function shareOnReddit() {
        const url = encodeURIComponent(window.location.href);
        const title = encodeURIComponent("MyXen Foundation - Building a Decentralized Tomorrow");
        window.open(`https://reddit.com/submit?url=${url}&title=${title}`, '_blank', 'width=600,height=400');
        }

        function copyToClipboard() {
        const url = window.location.href;
        navigator.clipboard.writeText(url).then(() => {
            showToast('Link copied to clipboard!');
        }).catch(err => {
            showToast('Failed to copy link');
        });
        }

        // Initialize Social Share Buttons
        function initSocialShare() {
        document.addEventListener('DOMContentLoaded', () => {
            const socialButtons = document.querySelectorAll('.social-btn');
            socialButtons.forEach(btn => {
            if (btn.classList.contains('twitter')) {
                btn.addEventListener('click', shareOnTwitter);
            } else if (btn.classList.contains('telegram')) {
                btn.addEventListener('click', shareOnTelegram);
            } else if (btn.classList.contains('whatsapp')) {
                btn.addEventListener('click', shareOnWhatsApp);
            } else if (btn.classList.contains('linkedin')) {
                btn.addEventListener('click', shareOnLinkedIn);
            } else if (btn.classList.contains('facebook')) {
                btn.addEventListener('click', shareOnFacebook);
            } else if (btn.classList.contains('reddit')) {
                btn.addEventListener('click', shareOnReddit);
            } else if (btn.classList.contains('copy')) {
                btn.addEventListener('click', copyToClipboard);
            }
            });
        });
        }

        // Initialize everything when DOM is loaded
        document.addEventListener('DOMContentLoaded', () => {
        initTheme();
        initMobileNav();
        initThemeToggle();
        initWaitlistForm();
        initSocialShare();
        
        // Initialize wallet connection
        const connectBtn = document.getElementById('connect-btn');
        if (connectBtn) {
            connectBtn.addEventListener('click', connectWallet);
        }
        
        // Start countdown
        setInterval(updateCountdown, 1000);
        updateCountdown();
        
        // Initialize animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.animationDelay = '0s';
                entry.target.classList.add('fade-in-up');
                observer.unobserve(entry.target);
            }
            });
        }, observerOptions);

        const animatableElements = document.querySelectorAll('.feature-card, .tokenomics-card');
        animatableElements.forEach(el => {
            observer.observe(el);
        });
        });
    </script>
</body>
</html>