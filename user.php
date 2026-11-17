<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super Modern Sign In & Sign Up Form</title>
    <style>
        /* Modern UI Reset & Fonts */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', system-ui, sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: #0f172a;
            overflow: hidden;
            position: relative;
        }

        /* Animated Background Glowing Orbs */
        body::before, body::after {
            content: '';
            position: absolute;
            width: 400px;
            height: 400px;
            border-radius: 50%;
            background: linear-gradient(45deg, #ff007f, #7928ca);
            filter: blur(120px);
            z-index: 0;
            animation: floatBG 12s infinite alternate ease-in-out;
        }

        body::after {
            background: linear-gradient(45deg, #00f2fe, #4facfe);
            top: 60%;
            left: 60%;
            animation-delay: -6s;
        }

        @keyframes floatBG {
            0% { transform: translate(0, 0) scale(1); }
            100% { transform: translate(80px, 50px) scale(1.2); }
        }

        /* Main Glassmorphism Wrapper */
        .main-box {
            position: relative;
            width: 850px;
            height: 550px;
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 24px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            z-index: 1;
        }

        /* Hidden Checkbox Controller for Screen Switching */
        #form-toggle {
            display: none;
        }

        /* Sliding Super Cover Panel */
        .sliding-panel {
            position: absolute;
            top: 0;
            left: 50%;
            width: 50%;
            height: 100%;
            background: linear-gradient(135deg, rgba(121, 40, 202, 0.8), rgba(255, 0, 127, 0.8));
            backdrop-filter: blur(10px);
            z-index: 10;
            transition: transform 0.7s cubic-bezier(0.68, -0.55, 0.265, 1.55);
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
            overflow: hidden;
        }

        .panel-content {
            position: absolute;
            text-align: center;
            padding: 0 40px;
            transition: 0.6s ease-in-out;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 20px;
        }

        .panel-content h2 {
            font-size: 2.2rem;
            font-weight: 700;
            letter-spacing: 1px;
        }

        .panel-content p {
            font-size: 0.95rem;
            opacity: 0.85;
            line-height: 1.6;
        }

        .left-content { transform: translateX(200%); }
        .right-content { transform: translateX(0); }

        /* Form Layers Layout */
        .forms-container {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
        }

        .form-block {
            width: 50%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 0 50px;
            transition: 0.6s ease-in-out;
        }

        .form-block h2 {
            font-size: 2.4rem;
            color: #fff;
            margin-bottom: 25px;
            font-weight: 600;
            background: linear-gradient(to right, #fff, #cbd5e1);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Super Glowing Input Fields */
        .input-group {
            position: relative;
            width: 100%;
            margin: 12px 0;
        }

        .input-group input {
            width: 100%;
            padding: 15px 20px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            outline: none;
            border-radius: 12px;
            color: #fff;
            font-size: 0.95rem;
            transition: 0.3s;
        }

        .input-group input:focus {
            background: rgba(255, 255, 255, 0.08);
            border-color: #00f2fe;
            box-shadow: 0 0 15px rgba(0, 242, 254, 0.2);
        }

        .input-group input::placeholder {
            color: rgba(255, 255, 255, 0.4);
        }

        .forgot-link {
            color: rgba(255, 255, 255, 0.5);
            font-size: 0.85rem;
            text-decoration: none;
            align-self: flex-start;
            margin: 5px 0 20px 5px;
            transition: 0.3s;
        }

        .forgot-link:hover {
            color: #00f2fe;
        }

        /* Premium Buttons Styling */
        .super-btn {
            padding: 12px 45px;
            border: none;
            border-radius: 12px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: 0.4s ease;
            letter-spacing: 0.5px;
        }

        .action-btn {
            background: linear-gradient(90deg, #00f2fe, #4facfe);
            color: #0f172a;
            box-shadow: 0 8px 20px rgba(0, 242, 254, 0.3);
            width: 100%;
            text-align: center;
            text-decoration: none;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .action-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 25px rgba(0, 242, 254, 0.5);
        }

        .switch-btn {
            background: transparent;
            border: 2px solid #fff;
            color: #fff;
            margin-top: 10px;
        }

        .switch-btn:hover {
            background: #fff;
            color: #7928ca;
            box-shadow: 0 8px 20px rgba(255, 255, 255, 0.2);
        }

        /* Super CSS Transition Control Logic */
        #form-toggle:checked ~ .sliding-panel {
            transform: translateX(-100%);
            background: linear-gradient(135deg, rgba(0, 242, 254, 0.8), rgba(79, 70, 229, 0.8));
        }

        #form-toggle:checked ~ .sliding-panel .left-content {
            transform: translateX(0);
        }

        #form-toggle:checked ~ .sliding-panel .right-content {
            transform: translateX(-200%);
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
            background: rgba(15, 23, 42, 0.85);
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
    </style>
</head>
<body>

    <div class="site-topbar">
        <a href="home.php" class="site-back-btn">&larr; Back</a>
        <span class="site-topbar-title">Employee Record Management System</span>
    </div>

    <div class="main-box">
        <!-- Hidden input controller -->
        <input type="checkbox" id="form-toggle">
        
        <!-- Sliding Panel Overlays -->
        <div class="sliding-panel">
            <div class="panel-content left-content">
                <h2>Welcome Back!</h2>
                <p>Keep connected with us by logging in with your personal info.</p>
                <label for="form-toggle" class="super-btn switch-btn">Sign In</label>
            </div>
            <div class="panel-content right-content">
                <h2>Create Account!</h2>
                <p>Enter your details and start your premium journey with us.</p>
                <label for="form-toggle" class="super-btn switch-btn">Sign Up</label>
            </div>
        </div>

        <!-- Forms System Layout -->
        <div class="forms-container">
            <!-- Sign In Interface -->
           
            <form class="form-block" action="userdashboard.php" method="GET">
                <h2>Sign In</h2>
                <div class="input-group">
                    <input type="email" placeholder="Email Address" required>
                </div>
                <div class="input-group">
                    <input type="password" placeholder="Password" required>
                </div>
                <a href="#" class="forgot-link">Forgot password?</a>
                
                
                <button type="submit" class="super-btn action-btn">Login</button>
            </form>

            <!-- Sign Up Interface -->
            <form class="form-block" action="register.php" method="POST">
                <h2>Sign Up</h2>
                <div class="input-group">
                    <input type="text" name="fullname" placeholder="Full Name" required>
                </div>
                <div class="input-group">
                    <input type="email" name="email" placeholder="Email Address" required>
                </div>
                <div class="input-group">
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <button type="submit" class="super-btn action-btn">Sign Up</button>
            </form>
        </div>
    </div>

</body>
</html>
