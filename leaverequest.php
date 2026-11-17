<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Leave Portal</title>
    <!-- Google Fonts for Ultra Modern Typography -->
    <link rel="preconnect" href="https://googleapis.com">
    <link rel="preconnect" href="https://gstatic.com" crossorigin>
    <link href="https://googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        /* Modern Premium Corporate Color Palette */
        :root {
            --brand-gradient: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
            --body-bg: #090d16;
            --surface-bg: rgba(255, 255, 255, 0.03);
            --surface-border: rgba(255, 255, 255, 0.08);
            --input-bg: rgba(255, 255, 255, 0.05);
            --text-primary: #f8fafc;
            --text-secondary: #94a3b8;
            --accent-glow: rgba(124, 58, 237, 0.3);
            --success-glow: #10b981;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        body {
            background-color: var(--body-bg);
            color: var(--text-primary);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px 20px;
            position: relative;
            overflow-x: hidden;
        }

        /* Futuristic Background Glowing Orbs */
        body::before, body::after {
            content: '';
            position: absolute;
            width: 400px;
            height: 400px;
            border-radius: 50%;
            background: var(--brand-gradient);
            filter: blur(150px);
            opacity: 0.15;
            z-index: -1;
        }
        body::before { top: -10%; left: -10%; }
        body::after { bottom: -10%; right: -10%; }

        /* Glassmorphism Main Card Container */
        .portal-card {
            background: var(--surface-bg);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid var(--surface-border);
            padding: 48px;
            border-radius: 24px;
            width: 100%;
            max-width: 700px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            animation: fadeIn 0.6s cubic-bezier(0.16, 1, 0.3, 1);
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .portal-header {
            margin-bottom: 36px;
        }

        .portal-header h2 {
            font-size: 28px;
            font-weight: 700;
            letter-spacing: -0.5px;
            background: linear-gradient(120deg, #fff 40%, #a78bfa 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 8px;
        }

        .portal-header p {
            font-size: 14px;
            color: var(--text-secondary);
        }

        /* Form Grid Mechanics */
        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 24px;
            margin-bottom: 24px;
        }

        @media (max-width: 600px) {
            .form-row { grid-template-columns: 1fr; gap: 20px; }
            .portal-card { padding: 24px; }
        }

        .field-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
            position: relative;
        }

        .full-span {
            grid-column: span 2;
        }

        @media (max-width: 600px) {
            .full-span { grid-column: span 1; }
        }

        label {
            font-size: 13px;
            font-weight: 600;
            color: #cbd5e1;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* High-End Dark UI Input Elements */
        input[type="text"],
        input[type="date"],
        select,
        textarea {
            width: 100%;
            padding: 14px 18px;
            background: var(--input-bg);
            border: 1px solid var(--surface-border);
            border-radius: 12px;
            font-size: 15px;
            color: var(--text-primary);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* Custom styling override for date picker icon color icon */
        input[type="date"]::-webkit-calendar-picker-indicator {
            filter: invert(1);
            opacity: 0.5;
            cursor: pointer;
        }

        /* Dropdown options wrapper styling */
        select option {
            background-color: #111827;
            color: var(--text-primary);
        }

        /* Input Interactions and Micro-animations */
        input:focus, select:focus, textarea:focus {
            outline: none;
            border-color: #818cf8;
            background: rgba(255, 255, 255, 0.07);
            box-shadow: 0 0 20px var(--accent-glow), inset 0 0 0 1px rgba(129, 140, 248, 0.2);
        }

        textarea {
            resize: none;
            min-height: 120px;
        }

        .context-note {
            font-size: 12px;
            color: var(--text-secondary);
            margin-top: 6px;
        }

        /* Luxury Interactive Glow Button */
        .action-wrapper {
            margin-top: 40px;
        }

        .submit-trigger {
            width: 100%;
            padding: 16px;
            background: var(--brand-gradient);
            color: #fff;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 700;
            cursor: pointer;
            letter-spacing: 0.5px;
            box-shadow: 0 8px 30px rgba(124, 58, 237, 0.3);
            transition: all 0.3s ease;
        }

        .submit-trigger:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 40px rgba(124, 58, 237, 0.5);
            filter: brightness(1.1);
        }

        .submit-trigger:active {
            transform: translateY(1px);
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
            background: rgba(9, 13, 22, 0.85);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--surface-border);
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
            color: var(--text-primary);
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
            color: var(--text-secondary);
            text-transform: uppercase;
        }
        body { padding-top: 90px; }
    </style>
</head>
<body>

<div class="site-topbar">
    <a href="userdashboard.php" class="site-back-btn">&larr; Back</a>
    <span class="site-topbar-title">Employee Record Management System</span>
</div>

<div class="portal-card">
    <div class="portal-header">
        <h2>Request Leave / Permission</h2>
        <p>Submit your application details below. Approvals will update on your employee feed dashboard.</p>
        <?php if (isset($_GET['status']) && $_GET['status'] === 'success'): ?>
            <p style="color:#10b981; margin-top:10px; font-weight:600;">✓ Your leave request has been submitted successfully. Waiting for admin approval.</p>
        <?php endif; ?>
    </div>

    <form action="leave_submit.php" method="POST">
        <!-- Section 1 -->
        <div class="form-row">
            <div class="field-group">
                <label for="empId">Employee ID</label>
                <input type="text" id="empId" name="empId" required placeholder="Ex: EMP-9042">
            </div>
            
            <div class="field-group">
                <label for="empName">Full Name</label>
                <input type="text" id="empName" name="empName" required placeholder="John Doe">
            </div>
        </div>

        <!-- Section 2 -->
        <div class="form-row">
            <div class="field-group">
                <label for="dept">Department</label>
                <select id="dept" name="dept" required>
                    <option value="" disabled selected>Choose Department</option>
                    <option value="Engineering">Engineering Team</option>
                    <option value="Design">UI/UX Design Studio</option>
                    <option value="Operations">Operations Management</option>
                </select>
            </div>

            <div class="field-group">
                <label for="leaveCategory">Leave Classification</label>
                <select id="leaveCategory" name="leaveCategory" required>
                    <option value="" disabled selected>Select Category</option>
                    <option value="Casual">Casual Leave</option>
                    <option value="Medical">Medical / Emergency</option>
                    <option value="Permission">Short Permission (Hourly)</option>
                </select>
            </div>
        </div>

        <!-- Section 3 -->
        <div class="form-row">
            <div class="field-group">
                <label for="from">Start Date</label>
                <input type="date" id="from" name="from" required>
            </div>

            <div class="field-group">
                <label for="to">End Date</label>
                <input type="date" id="to" name="to" required>
                <span class="context-note">Set identical dates for single-day logs.</span>
            </div>
        </div>

        <!-- Section 4 -->
        <div class="field-group full-span">
            <label for="justification">Justification / Reason</label>
            <textarea id="justification" name="justification" required placeholder="State your reason clearly for immediate admin review..."></textarea>
        </div>

        <!-- Submission Trigger -->
        <div class="action-wrapper">
            <button type="submit" class="submit-trigger">Transmit Request</button>
        </div>
    </form>
</div>

</body>
</html>
