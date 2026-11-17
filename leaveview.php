<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Leave Management Portal</title>
    <!-- Google Fonts for Ultra Modern Typography -->
    <link rel="preconnect" href="https://googleapis.com">
    <link rel="preconnect" href="https://gstatic.com" crossorigin>
    <link href="https://googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        /* Premium Corporate Dark UI Color Palette */
        :root {
            --body-bg: #090d16;
            --surface-bg: rgba(255, 255, 255, 0.03);
            --surface-border: rgba(255, 255, 255, 0.08);
            --text-primary: #f8fafc;
            --text-secondary: #94a3b8;
            --brand-gradient: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
            
            /* Status Colors */
            --pending-color: #fbbf24;
            --pending-bg: rgba(251, 191, 36, 0.1);
            --success-color: #10b981;
            --success-bg: rgba(16, 185, 129, 0.1);
            --danger-color: #ef4444;
            --danger-bg: rgba(239, 68, 68, 0.1);
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
            padding: 40px 20px;
            position: relative;
            overflow-x: hidden;
        }

        /* Ambient Glowing Background Orbs */
        body::before, body::after {
            content: '';
            position: absolute;
            width: 400px;
            height: 400px;
            border-radius: 50%;
            background: var(--brand-gradient);
            filter: blur(160px);
            opacity: 0.12;
            z-index: -1;
        }
        body::before { top: -5%; right: -5%; }
        body::after { bottom: -5%; left: -5%; }

        /* Main Dashboard Frame */
        .dashboard-wrapper {
            max-width: 1100px;
            margin: 0 auto;
            background: var(--surface-bg);
            backdrop-filter: blur(25px);
            -webkit-backdrop-filter: blur(25px);
            border: 1px solid var(--surface-border);
            border-radius: 24px;
            padding: 40px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.6);
            animation: slideUp 0.6s cubic-bezier(0.16, 1, 0.3, 1);
        }

        @keyframes slideUp {
            from { opacity: 0; transform: translateY(15px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Header Layout */
        .dashboard-header {
            margin-bottom: 36px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid var(--surface-border);
            padding-bottom: 24px;
        }

        .dashboard-header h2 {
            font-size: 26px;
            font-weight: 700;
            background: linear-gradient(120deg, #fff 50%, #a78bfa 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .dashboard-header p {
            font-size: 14px;
            color: var(--text-secondary);
            margin-top: 4px;
        }

        /* High-End Clean Table Metrics */
        .table-responsive {
            overflow-x: auto;
            width: 100%;
        }

        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 12px; /* Row spacing layout effect */
            text-align: left;
        }

        th {
            padding: 16px 20px;
            color: var(--text-secondary);
            font-size: 13px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.75px;
        }

        tr.request-row {
            background: rgba(255, 255, 255, 0.02);
            transition: all 0.25s ease;
        }

        tr.request-row:hover {
            background: rgba(255, 255, 255, 0.05);
            transform: scale(1.005);
        }

        td {
            padding: 18px 20px;
            font-size: 15px;
            border-top: 1px solid var(--surface-border);
            border-bottom: 1px solid var(--surface-border);
            color: #e2e8f0;
        }

        /* Fixing Border Radius for Isolated Row Spacing */
        td:first-child {
            border-left: 1px solid var(--surface-border);
            border-top-left-radius: 12px;
            border-bottom-left-radius: 12px;
            font-weight: 600;
            color: #fff;
        }

        td:last-child {
            border-right: 1px solid var(--surface-border);
            border-top-right-radius: 12px;
            border-bottom-right-radius: 12px;
        }

        .emp-meta {
            font-size: 12px;
            color: var(--text-secondary);
            margin-top: 4px;
            display: block;
        }

        /* Premium Floating Badges */
        .status-badge {
            display: inline-flex;
            align-items: center;
            padding: 6px 14px;
            border-radius: 50px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: 0.3px;
        }

        .badge-pending { color: var(--pending-color); background: var(--pending-bg); border: 1px solid rgba(251, 191, 36, 0.2); }
        .badge-approved { color: var(--success-color); background: var(--success-bg); border: 1px solid rgba(16, 185, 129, 0.2); }
        .badge-rejected { color: var(--danger-color); background: var(--danger-bg); border: 1px solid rgba(239, 68, 68, 0.2); }

        /* Dynamic Control Action Buttons */
        .action-actions-cluster {
            display: flex;
            gap: 10px;
        }

        .btn-action {
            padding: 8px 16px;
            border: none;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        a.btn-action {
            display: inline-block;
            text-decoration: none;
        }

        .btn-accept {
            background-color: var(--success-color);
            color: #fff;
            box-shadow: 0 4px 15px rgba(16, 185, 129, 0.2);
        }

        .btn-accept:hover {
            filter: brightness(1.15);
            box-shadow: 0 6px 20px rgba(16, 185, 129, 0.4);
            transform: translateY(-1px);
        }

        .btn-reject {
            background-color: rgba(259, 68, 68, 0.1);
            color: var(--danger-color);
            border: 1px solid rgba(239, 68, 68, 0.2);
        }

        .btn-reject:hover {
            background-color: var(--danger-color);
            color: #fff;
            box-shadow: 0 6px 20px rgba(239, 68, 68, 0.3);
            transform: translateY(-1px);
        }

        .action-done {
            font-size: 13px;
            color: var(--text-secondary);
            font-style: italic;
        }

        .no-records {
            text-align: center;
            color: var(--text-secondary);
            padding: 40px !important;
            font-style: italic;
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
    <a href="admin3.php" class="site-back-btn">&larr; Back</a>
    <span class="site-topbar-title">Employee Record Management System</span>
</div>

<?php
// 1. Database connect
$conn = mysqli_connect("localhost", "root", "", "employee");
if (!$conn) {
    die("DB Connection Failed: " . mysqli_connect_error());
}

// 2. Ella leave requests um vaanguradhu (latest first)
$result = mysqli_query($conn, "SELECT * FROM leave_requests ORDER BY created_at DESC");
?>

<div class="dashboard-wrapper">
    <div class="dashboard-header">
        <div>
            <h2>Leave & Permission Approval Control</h2>
            <p>Review, authorize, or decline employee-submitted shift logs.</p>
        </div>
    </div>

    <!-- Responsive Layout Table Grid -->
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>Employee Details</th>
                    <th>Classification</th>
                    <th>Timeline Period</th>
                    <th>Justification Statement</th>
                    <th>Current Status</th>
                    <th>Management Authorization</th>
                </tr>
            </thead>
            <tbody id="adminTableContent">
                <?php if (mysqli_num_rows($result) === 0): ?>
                    <tr>
                        <td colspan="6" class="no-records">No leave requests submitted yet.</td>
                    </tr>
                <?php else: ?>
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <?php
                            // Status badge oda class map pannuradhu
                            $statusClass = 'badge-pending';
                            if ($row['status'] === 'Approved') $statusClass = 'badge-approved';
                            if ($row['status'] === 'Rejected') $statusClass = 'badge-rejected';

                            $fromDate = date('d M Y', strtotime($row['from_date']));
                            $toDate   = date('d M Y', strtotime($row['to_date']));
                        ?>
                        <tr class="request-row" id="row-<?php echo $row['id']; ?>">
                            <td>
                                <?php echo htmlspecialchars($row['emp_name']); ?>
                                <span class="emp-meta"><?php echo htmlspecialchars($row['emp_id']); ?> • <?php echo htmlspecialchars($row['dept']); ?></span>
                            </td>
                            <td><?php echo htmlspecialchars($row['leave_category']); ?></td>
                            <td><?php echo $fromDate; ?> - <?php echo $toDate; ?></td>
                            <td><?php echo htmlspecialchars($row['justification']); ?></td>
                            <td><span class="status-badge <?php echo $statusClass; ?>"><?php echo htmlspecialchars($row['status']); ?></span></td>
                            <td>
                                <?php if ($row['status'] === 'Pending'): ?>
                                    <div class="action-actions-cluster">
                                        <a class="btn-action btn-accept" href="leave_action.php?id=<?php echo $row['id']; ?>&status=Approved">Accept</a>
                                        <a class="btn-action btn-reject" href="leave_action.php?id=<?php echo $row['id']; ?>&status=Rejected">Reject</a>
                                    </div>
                                <?php else: ?>
                                    <span class="action-done">Action taken: <?php echo htmlspecialchars($row['status']); ?></span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php mysqli_close($conn); ?>

</body>
</html>
