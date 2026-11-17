<?php
// 1. Database connect
$conn = mysqli_connect("localhost", "root", "", "employee");

if (!$conn) {
    die("DB Connection Failed: " . mysqli_connect_error());
}

// 2. URL la irundhu id and status vaanguradhu (leaveview.php Accept/Reject buttons anupurathu)
$id     = isset($_GET['id']) ? (int) $_GET['id'] : 0;
$status = isset($_GET['status']) ? $_GET['status'] : '';

// 3. Security: Approved/Rejected mattum thaan allow pannurom
$allowedStatus = ['Approved', 'Rejected'];
if ($id <= 0 || !in_array($status, $allowedStatus)) {
    die("Invalid request.");
}

// 4. Prepared statement use panni status update pannuradhu
$sql = "UPDATE leave_requests SET status = ? WHERE id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "si", $status, $id);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
mysqli_close($conn);

// 5. Admin ah leaveview.php ku thirumbi anupurom (updated list oda)
header("Location: leaveview.php");
exit();
?>
