<?php
$serverName = "localhost";
$username   = "root";
$password   = "";
$dbname     = "online_appointment";

// create connection
$connect = mysqli_connect($serverName, $username, $password, $dbname);

// Check connection
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

$email    = $_POST['email'];
$password = $_POST['password'];
// $role     = $_POST['role'];
$has = hash('sha256', $password);

// Validate user input (example)
if (empty($email) || empty($password) ) {
    echo "<script>window.location.href = 'login.html';</script>";
    exit;
}

$sql = "SELECT * FROM users WHERE email ='$email' AND password = '$has'";
$res = mysqli_query($connect, $sql);
$row = $res->fetch_assoc();
$user = $row['email'];
$pass = $row['password'];
$type = $row['role'];

if ($user == $email && $pass = $password) {
    session_start();
    if($type == '0')
    {
        echo "<script>window.location.href ='superadmin/index.html';</script>";
    }else if($type == '1'){
        echo "<script>window.location.href ='user/index.html';</script>";
    }else{
        echo "<script>window.location.href ='doctor/index.html';</script>";
    }
}
?>
