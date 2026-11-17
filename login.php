<?php
$conn = mysqli_connect("localhost","root","","employee");

if(!$conn){
    die("DB Connection Failed");
}

$username = $_POST['username'];
$password = $_POST['password'];

/* 1. database-ல் check */
$sql = "SELECT * FROM login WHERE username='$username' AND password='$password'";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) > 0){

    // already exists → login success
    header("Location: records.html");
    exit();

} else {

    
    $insert = "INSERT INTO login(username,password) VALUES('$username','$password')";
    mysqli_query($conn,$insert);

    // then go to records page
    header("Location: records.html");
    exit();
}

mysqli_close($conn);
?>