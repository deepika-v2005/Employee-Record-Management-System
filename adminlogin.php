<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin console - login</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tabler-icons/2.44.0/iconfont/tabler-icons.min.css">
<style>
  * {
    box-sizing: border-box;
  }

  body {
    margin: 0;
    min-height: 100vh;
    background: #100E0C;
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 24px;
  }

  .login-card {
    width: 100%;
    max-width: 400px;
    background: #1B1815;
    border-radius: 12px;
    padding: 40px 32px;
    border: 0.5px solid #3A342C;
  }

  .login-header {
    text-align: center;
    margin-bottom: 32px;
  }

  .login-icon {
    width: 52px;
    height: 52px;
    margin: 0 auto 12px;
    border-radius: 50%;
    background: #2C2620;
    border: 0.5px solid #BA7517;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .login-icon i {
    font-size: 24px;
    color: #FAC775;
  }

  .login-title {
    font-size: 22px;
    font-weight: 500;
    margin: 0 0 4px;
    color: #F3EDE3;
  }

  .login-subtitle {
    font-size: 13px;
    color: #A69C8C;
    margin: 0;
  }

  .field-label {
    font-size: 13px;
    color: #A69C8C;
    display: block;
    margin-bottom: 6px;
  }

  .field-input {
    width: 100%;
    margin-bottom: 16px;
    background: #221E19;
    border: 0.5px solid #3A342C;
    color: #F3EDE3;
    height: 40px;
    border-radius: 8px;
    padding: 0 12px;
    font-size: 14px;
    outline: none;
    transition: border-color 0.15s ease;
  }

  .field-input::placeholder {
    color: #6E6555;
  }

  .field-input:focus {
    border-color: #BA7517;
  }

  .field-row {
    text-align: right;
    margin-bottom: 24px;
  }

  .field-row a,
  .footer-note a {
    font-size: 12px;
    color: #FAC775;
    text-decoration: none;
  }

  .field-row a:hover,
  .footer-note a:hover {
    text-decoration: underline;
  }

  .submit-btn {
    width: 100%;
    background: #BA7517;
    border: 0.5px solid #854F0B;
    color: #1B1815;
    font-weight: 500;
    font-size: 14px;
    height: 42px;
    border-radius: 8px;
    cursor: pointer;
    transition: background 0.15s ease, transform 0.05s ease;
  }

  .submit-btn:hover {
    background: #D08F2A;
  }

  .submit-btn:active {
    transform: scale(0.98);
  }

  .footer-note {
    text-align: center;
    font-size: 12px;
    color: #6E6555;
    margin: 20px 0 0;
  }

  .footer-note a {
    color: #A69C8C;
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
    background: rgba(16, 14, 12, 0.9);
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
    color: #F3EDE3;
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
    color: #A69C8C;
    text-transform: uppercase;
  }
  body { padding-top: 90px; }
</style>
</head>
<body>

<div class="site-topbar">
  <a href="home.php" class="site-back-btn">&larr; Back</a>
  <span class="site-topbar-title">Employee Record Management System</span>
</div>

<form class="login-card" onsubmit="return false;">
  <div class="login-header">
    <div class="login-icon">
      <i class="ti ti-shield-lock" aria-hidden="true"></i>
    </div>
    <p class="login-title">Admin console</p>
    <p class="login-subtitle">Sign in to manage your workspace</p>
  </div>

  <label class="field-label" for="username">Username</label>
  <input class="field-input" type="text" id="username" name="username" placeholder="admin@company.com" autocomplete="username" required>

  <label class="field-label" for="password">Password</label>
  <input class="field-input" type="password" id="password" name="password" placeholder="Enter your password" autocomplete="current-password" required>

  <div class="field-row">
    <a href="#">Forgot password?</a>
  </div>

<button class="submit-btn" type="button" onclick="window.location.href='admin3.php'">Sign in</button>
<p class="footer-note">Protected access. <a href="#">Contact your administrator</a> if you're locked out.</p>
</form>

</body>
</html>
