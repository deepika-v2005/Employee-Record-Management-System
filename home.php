<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Record Management System</title>
    <!-- Google Fonts FRAMEWORK -->
    <link href="https://googleapis.com" rel="stylesheet">
    
    <style>
        /* ==========================================================================
           1. MODERN ENTERPRISE DARK LAYOUT DEFINITIONS
           ========================================================================== */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            background-color: #0b0f19; /* Deep luxury dark blue base */
            color: #ffffff;
            min-height: 100vh;
            display: block; /* Strict block view to ensure visibility */
            padding: 60px 20px;
        }

        /* Ambient Lighting Background Spheres */
        body::before, body::after {
            content: "";
            position: absolute;
            border-radius: 50%;
            filter: blur(140px);
            z-index: -1;
            opacity: 0.15;
            pointer-events: none;
        }
        body::before { width: 400px; height: 400px; background: #3b82f6; top: 10%; left: 10%; }
        body::after { width: 400px; height: 400px; background: #6366f1; bottom: 10%; right: 10%; }

        /* Centralized Container Framework */
        .app-container {
            width: 100%;
            max-width: 1100px;
            margin: 0 auto;
            text-align: center;
        }

        /* Header Setup */
        .system-header { 
            margin-bottom: 50px; 
        }

        .logo-area {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: rgba(255, 255, 255, 0.05);
            padding: 8px 22px;
            border-radius: 100px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            margin-bottom: 20px;
        }
        .logo-icon { color: #3b82f6; font-weight: 700; }
        .logo-text { font-size: 0.85rem; font-weight: 700; letter-spacing: 2px; text-transform: uppercase; }

        /* MAIN HEADING requested */
        .main-title { 
            font-size: 2.6rem; 
            font-weight: 700; 
            background: linear-gradient(135deg, #ffffff 40%, #94a3b8 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            letter-spacing: -0.02em; 
            margin-bottom: 12px; 
        }
        .subtitle { 
            font-size: 1.05rem; 
            color: #94a3b8; 
            max-width: 620px; 
            margin: 0 auto;
            line-height: 1.6; 
        }

        /* ==========================================================================
           2. TWO BOX GRID SYSTEM (User Card Placed First)
           ========================================================================== */
        .modules-grid {
            display: flex;
            gap: 30px;
            justify-content: center;
            align-items: stretch;
            width: 100%;
            max-width: 960px;
            margin: 0 auto 50px auto;
            flex-wrap: wrap; /* Safe layout scaling for mobile screens */
        }

        /* Custom Box Structural Frame */
        .module-card {
            background: rgba(17, 24, 39, 0.95); /* Solid thick dark layout background */
            border: 1px solid rgba(255, 255, 255, 0.12);
            border-radius: 24px;
            padding: 40px;
            width: 440px; /* Precise desktop container block thickness */
            display: flex;
            flex-direction: column;
            text-align: left;
            position: relative;
            box-shadow: 0 20px 40px -15px rgba(0, 0, 0, 0.6);
            transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        /* Whole card is now a single clickable link - reset default anchor look */
        a.card-link {
            color: inherit;
            text-decoration: none;
            cursor: pointer;
        }

        /* Hover Interactive Micro Glow Controls */
        .module-card:hover {
            transform: translateY(-8px) scale(1.02);
            background: rgba(22, 30, 49, 0.95);
        }
        .module-card.user-box:hover { border-color: rgba(59, 130, 246, 0.5); box-shadow: 0 0 30px rgba(59, 130, 246, 0.2); }
        .module-card.admin-box:hover { border-color: rgba(99, 102, 241, 0.5); box-shadow: 0 0 30px rgba(99, 102, 241, 0.2); }

        /* Floating Badge Ribbon */
        .card-badge { 
            position: absolute; 
            top: 40px; 
            right: 40px; 
            font-size: 0.75rem; 
            font-weight: 600; 
            padding: 4px 12px; 
            border-radius: 50px; 
        }
        .user-badge { background: rgba(59, 130, 246, 0.15); color: #93c5fd; }
        .admin-badge { background: rgba(99, 102, 241, 0.15); color: #a5b4fc; }

        /* Vector Icon Enclosures */
        .icon-wrapper { 
            width: 54px; 
            height: 54px; 
            border-radius: 16px; 
            display: flex; 
            justify-content: center; 
            align-items: center; 
            margin-bottom: 24px; 
        }
        .user-icon { background: rgba(59, 130, 246, 0.12); color: #60a5fa; border: 1px solid rgba(59, 130, 246, 0.2); }
        .admin-icon { background: rgba(99, 102, 241, 0.12); color: #818cf8; border: 1px solid rgba(99, 102, 241, 0.2); }

        .module-card h2 { 
            font-size: 1.45rem; 
            font-weight: 600; 
            margin-bottom: 12px; 
        }
        .module-card p { 
            font-size: 0.95rem; 
            color: #94a3b8; 
            line-height: 1.6; 
            margin-bottom: 35px; 
            flex-grow: 1; /* Automatically forces buttons to align perfectly straight */
        }

        /* ==========================================================================
           3. INTERACTIVE CONSOLE ACCENT BUTTONS
           ========================================================================== */
        .action-btn { 
            display: flex; 
            justify-content: space-between; 
            align-items: center; 
            text-decoration: none; 
            padding: 16px 24px; 
            border-radius: 14px; 
            font-size: 0.95rem; 
            font-weight: 600; 
            transition: all 0.3s ease; 
        }
        .arrow { font-size: 1.2rem; transition: transform 0.2s ease; }
        .action-btn:hover .arrow { transform: translateX(6px); }

        /* Electric Blue Gradient User Action Accent */
        .btn-user { background: linear-gradient(135deg, #1d4ed8, #3b82f6); color: #ffffff; box-shadow: 0 4px 15px rgba(59, 130, 246, 0.3); }
        .btn-user:hover { background: linear-gradient(135deg, #1e40af, #1d4ed8); box-shadow: 0 10px 25px rgba(59, 130, 246, 0.45); }

        /* Indigo Gradient Admin Action Accent */
        .btn-admin { background: linear-gradient(135deg, #4f46e5, #6366f1); color: #ffffff; box-shadow: 0 4px 15px rgba(99, 102, 241, 0.3); }
        .btn-admin:hover { background: linear-gradient(135deg, #4338ca, #4f46e5); box-shadow: 0 10px 25px rgba(99, 102, 241, 0.45); }

        .system-footer { text-align: center; font-size: 0.8rem; color: #475569; }

        /* ==========================================================================
           4. ADAPTIVE RESPONSIVE FOR LOWER RESOLUTIONS
           ========================================================================== */
        @media (max-width: 968px) {
            .modules-grid { flex-direction: column; align-items: center; }
            .module-card { width: 100%; max-width: 440px; padding: 32px; }
            .main-title { font-size: 2.1rem; }
        }
    </style>
</head>
<body>

    <div class="app-container">
        <header class="system-header">
            <div class="logo-area">
                <span class="logo-icon">❖</span>
                <span class="logo-text">CoreHR Portal</span>
            </div>
            <!-- Main Heading Required -->
            <h1 class="main-title">Employee Record Management System</h1>
            
        </header>

        <main class="modules-grid">
            
            <!-- 1. FIRST BOX: User Module Card Element (whole card is clickable) -->
            <a href="user.php" class="module-card user-box card-link">
                <div class="icon-wrapper user-icon">
                    <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                    </svg>
                </div>
                <h2>User Module</h2>
                <p>Sign in or sign up as an employee to apply for leave and manage your profile.</p>

                <span class="action-btn btn-user">
                    <span>Launch User Interface</span>
                    <span class="arrow">→</span>
                </span>
            </a>

            <!-- 2. SECOND BOX: Admin Module Card Element (whole card is clickable) -->
            <a href="adminlogin.php" class="module-card admin-box card-link">
                <div class="icon-wrapper admin-icon">
                    <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                    </svg>
                </div>
                <h2>Admin Module</h2>
                <p>Sign in as an admin to review employee records and manage leave requests.</p>

                <span class="action-btn btn-admin">
                    <span>Launch Admin Console</span>
                    <span class="arrow">→</span>
                </span>
            </a>

        </main>

        <footer class="system-footer">
            &copy; <?php echo date("Y"); ?> Employee Record Management System. All rights reserved.
        </footer>
    </div>

</body>
</html>