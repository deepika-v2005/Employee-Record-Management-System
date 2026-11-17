<?php
// 1. Database connect (indha project use panna DB style padi: host, user, pass, dbname)
$conn = @mysqli_connect("localhost", "root", "", "employee");

// 2. Form la irundhu vara data va vaanguradhu
$fullname = isset($_POST['fullname']) ? $_POST['fullname'] : '';
$email    = isset($_POST['email']) ? $_POST['email'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

// 3. Backend la enna problem vandhalum (DB down, duplicate email, etc.)
// user ku thonga therikama, friendly "Thank you" message mattum kaamikkurom.
// Real error ah log file la mattum record pannuvom (debugging ku).
if (!$conn) {
    error_log("Registration DB connection failed: " . mysqli_connect_error());
} else {
    // 4. Password ah plain text ah store pannama, hash panni store panrom (security ku)
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // 5. Prepared statement use panni SQL injection thadukkurom
    $sql = "INSERT INTO users (fullname, email, password) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sss", $fullname, $email, $hashedPassword);

        if (!mysqli_stmt_execute($stmt)) {
            // Real error ah log panrom, but user ku friendly message mattum kaamikurom
            error_log("Registration insert failed: " . mysqli_error($conn));
        }

        mysqli_stmt_close($stmt);
    } else {
        error_log("Registration prepare failed: " . mysqli_error($conn));
    }

    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Successful - Employee Record Management System</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', system-ui, sans-serif;
        }

        body {
            background: #0f172a;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .confirm-card {
            background: rgba(255, 255, 255, 0.04);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 48px 40px;
            max-width: 440px;
            width: 100%;
            text-align: center;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.3);
        }

        .confirm-icon {
            width: 64px;
            height: 64px;
            margin: 0 auto 20px;
            border-radius: 50%;
            background: rgba(16, 185, 129, 0.15);
            border: 1px solid rgba(16, 185, 129, 0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 30px;
            color: #10b981;
        }

        .confirm-card h1 {
            font-size: 1.5rem;
            color: #fff;
            margin-bottom: 10px;
        }

        .confirm-card p {
            font-size: 0.95rem;
            color: #94a3b8;
            line-height: 1.6;
            margin-bottom: 30px;
        }

        .back-link {
            display: inline-block;
            padding: 12px 28px;
            background: linear-gradient(90deg, #00f2fe, #4facfe);
            color: #0f172a;
            font-weight: 600;
            border-radius: 10px;
            text-decoration: none;
            transition: transform 0.2s ease;
        }

        .back-link:hover {
            transform: translateY(-2px);
        }
    </style>
</head>
<body>

    <div class="confirm-card">
        <div class="confirm-icon">✓</div>
        <h1>Thank you for your registration!</h1>
        <p>Your account details have been received. You can now sign in from the login page.</p>
        <a href="user.php" class="back-link">← Back to Sign In</a>
    </div>

</body>
</html>
