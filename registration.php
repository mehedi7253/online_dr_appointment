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

    $username = $_POST["name"];
	$address = $_POST["address"];
    $email    = $_POST["email"];
    $phone    = $_POST["phone"];
    $password = $_POST["password"];

    // Validate user input (example)
    if (empty($username) || empty($address) || empty($email) || empty($phone) || empty($password) ) {
        echo "<script>window.location.href = 'reg.html';</script>";
        exit;
    }

    $hash = hash('sha256', $password);

    $sql ="INSERT INTO users (name, address, email, phone, password) VALUES ('$username','$address', '$email','$phone', '$hash')";
    $res = mysqli_query($connect, $sql);

    if ($res) {
        // return location
        echo "<script>window.location.href = 'login.html';</script>";
    } else {
        echo "Error:";
    }
    
?>