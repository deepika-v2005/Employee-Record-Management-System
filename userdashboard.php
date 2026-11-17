<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Operations Center - Premium Executive Suite</title>
    <!-- Ultra Modern Typography Framework Mapping -->
    <link rel="preconnect" href="https://googleapis.com">
    <link rel="preconnect" href="https://gstatic.com" crossorigin>
    <link href="https://googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        /* Luxury Tech Accent Color Palette Matrix Architecture */
        :root {
            --bg-canvas: #060913;
            --bg-surface: rgba(13, 20, 38, 0.45);
            --surface-border: rgba(255, 255, 255, 0.06);
            --brand-gradient: linear-gradient(135deg, #6366f1 0%, #a855f7 50%, #ec4899 100%);
            --brand-primary: #6366f1;
            --text-heading: #f8fafc;
            --text-muted: #94a3b8;
            --glow-color: rgba(99, 102, 241, 0.15);
            --radius-xl: 32px;
            --transition-fluid: all 0.5s cubic-bezier(0.16, 1, 0.3, 1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        body {
            background-color: var(--bg-canvas);
            color: var(--text-heading);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 2rem 1.5rem;
            position: relative;
            overflow: hidden;
        }

        /* Ambient Dynamic Light Flares on Canvas */
        body::before, body::after {
            content: '';
            position: absolute;
            width: 450px;
            height: 450px;
            border-radius: 50%;
            background: var(--brand-gradient);
            filter: blur(140px);
            opacity: 0.12;
            z-index: -1;
        }
        body::before { top: -10%; left: -5%; }
        body::after { bottom: -10%; right: -5%; }

        /* Workspace Wrapper Architecture Layout */
        .workspace-wrapper {
            width: 100%;
            max-width: 850px;
            animation: slideFadeUp 0.8s cubic-bezier(0.16, 1, 0.3, 1);
        }

        @keyframes slideFadeUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Typography Header Block Layout */
        .workspace-header-block {
            text-align: center;
            margin-bottom: 4rem;
        }

        .workspace-title-text {
            font-size: 3.25rem;
            font-weight: 800;
            letter-spacing: -0.04em;
            background: linear-gradient(120deg, #ffffff 40%, #c084fc 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 0.75rem;
        }

        .workspace-subtitle-text {
            font-size: 1.1rem;
            color: var(--text-muted);
            font-weight: 500;
            letter-spacing: 0.01em;
        }

        /* Responsive Matrix Grid Layout Configuration */
        .modules-navigation-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 2.5rem;
        }

        @media (max-width: 650px) {
            .modules-navigation-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }
        }

        /* Premium Glassmorphic Card Engine Interface */
        .module-interactive-card {
            background: var(--bg-surface);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid var(--surface-border);
            padding: 4.5rem 2rem;
            border-radius: var(--radius-xl);
            cursor: pointer;
            text-align: center;
            transition: var(--transition-fluid);
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        /* Liquid Neon Tracking Underlay Effect */
        .module-interactive-card::before {
            content: '';
            position: absolute;
            inset: 0;
            background: var(--brand-gradient);
            opacity: 0;
            transition: var(--transition-fluid);
            z-index: 1;
        }

        /* Interactive Hover Response Matrix */
        .module-interactive-card:hover {
            transform: translateY(-10px) scale(1.02);
            border-color: rgba(168, 85, 247, 0.4);
            box-shadow: 0 30px 60px -15px rgba(0, 0, 0, 0.8), 0 0 50px var(--glow-color);
        }

        .module-interactive-card:hover::before {
            opacity: 0.04; /* Ultra smooth backdrop tint illumination */
        }

        /* Iconic Micro-Animation Layer Components */
        .card-icon-frame {
            font-size: 4rem;
            margin-bottom: 1.75rem;
            display: inline-block;
            transition: all 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
            filter: drop-shadow(0 10px 15px rgba(0, 0, 0, 0.3));
            z-index: 2;
        }

        .module-interactive-card:hover .card-icon-frame {
            transform: scale(1.18) rotate(4deg);
        }

        /* High-End Clean Contrast Typography Texts */
        .card-title-text {
            font-size: 1.55rem;
            font-weight: 700;
            letter-spacing: -0.02em;
            color: var(--text-heading);
            transition: var(--transition-fluid);
            z-index: 2;
        }

        .module-interactive-card:hover .card-title-text {
            background: linear-gradient(90deg, #6366f1, #ec4899);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Active Physical Press Matrix Layer Feedback */
        .module-interactive-card:active {
            transform: translateY(-4px) scale(0.99);
            box-shadow: 0 15px 30px -10px rgba(0, 0, 0, 0.8);
        }

        .site-topbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 14px 24px;
            background: rgba(6, 9, 19, 0.85);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(255,255,255,0.08);
            box-sizing: border-box;
            z-index: 1000;
        }
        .site-back-btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 8px 16px;
            background: rgba(255,255,255,0.06);
            border: 1px solid rgba(255,255,255,0.12);
            border-radius: 10px;
            color: #f8fafc;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.2s ease;
        }
        .site-back-btn:hover {
            background: rgba(255,255,255,0.12);
        }
        .site-topbar-title {
            font-size: 13px;
            font-weight: 700;
            letter-spacing: 0.5px;
            color: #94a3b8;
            text-transform: uppercase;
        }
        body { padding-top: 90px; }
    </style>
</head>
<body>

    <div class="site-topbar">
        <a href="user.php" class="site-back-btn">&larr; Back</a>
        <span class="site-topbar-title">Employee Record Management System</span>
    </div>

    <div class="workspace-wrapper">
        
        <!-- Standard Target Heading Structural Definition -->
        <div class="workspace-header-block">
            <h1 class="workspace-title-text">User Dashboard</h1>
            <p class="workspace-subtitle-text">Manage workforce metadata matrix and authorize structural permissions</p>
        </div>

        <!-- Core 2 Clickable Cards Structural Layout Components -->
        <div class="modules-navigation-grid">
            
            <!-- Module Card 1: Employee Records -->
            <div class="module-interactive-card" onclick="triggerAdminAction('records')">
                <span class="card-icon-frame">📊</span>
                <h2 class="card-title-text">view/edit</h2>
            </div>
            
            <!-- Module Card 2: Leave Management -->
            <div class="module-interactive-card" onclick="triggerAdminAction('management')">
                <span class="card-icon-frame">✍️</span>
                <h2 class="card-title-text">Leave Request</h2>
            </div>

        </div>

    </div>

    <script>
        // Administration module interactive redirection handlers
        function triggerAdminAction(adminModuleKey) {
            if(adminModuleKey === 'records') {
                // Direct seamless redirection trigger path to viewedit.php target
                window.location.href = "viewedit.php";
            } else if(adminModuleKey === 'management') {
                // Redirects directly to the leave request submission portal
                window.location.href = "leaverequest.php";
            }
        }
    </script>
</body>
</html>