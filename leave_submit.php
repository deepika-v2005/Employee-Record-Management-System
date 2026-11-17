<?php
// 1. Database connect
$conn = mysqli_connect("localhost", "root", "", "employee");

if (!$conn) {
    die("DB Connection Failed: " . mysqli_connect_error());
}

// 2. Form data vaanguradhu
$empId         = $_POST['empId'];
$empName       = $_POST['empName'];
$dept          = $_POST['dept'];
$leaveCategory = $_POST['leaveCategory'];
$from          = $_POST['from'];
$to            = $_POST['to'];
$justification = $_POST['justification'];

// 3. Prepared statement use panni leave_requests table la insert (status default 'Pending')
$sql = "INSERT INTO leave_requests (emp_id, emp_name, dept, leave_category, from_date, to_date, justification, status)
        VALUES (?, ?, ?, ?, ?, ?, ?, 'Pending')";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "sssssss", $empId, $empName, $dept, $leaveCategory, $from, $to, $justification);

if (mysqli_stmt_execute($stmt)) {
    // Success -> employee ah leaverequest.php ku thirumbi anupurom (success message oda)
    header("Location: leaverequest.php?status=success");
    exit();
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
