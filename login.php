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
    $has = hash('sha256', $password);

    $sql = "SELECT * FROM users WHERE email ='$email' AND password = '$has'";

    $result = mysqli_query($connect, $sql);
    $row = mysqli_num_rows($result);

    // Validate user input (example)
    if (empty($email) || empty($password) ) {
        echo "<script>window.location.href = 'login.html';</script>";
        exit;
    }


    if ($row == 1){
        echo "Login Done";
        echo "<script>window.location.href = './user/main-profile.html';</script>";
    }else{
        echo "<script>window.location.href = 'login.html';</script>";
    }

    

    
?>