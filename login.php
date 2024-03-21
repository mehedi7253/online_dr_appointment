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
    $role     = $_POST['role'];
    $has = hash('sha256', $password);

    $sql = "SELECT * FROM users WHERE email ='$email' AND password = '$has' AND role = '$role'";

    $result = mysqli_query($connect, $sql);
    $row = mysqli_num_rows($result);

    // Validate user input (example)
    // if (empty($email) || empty($password) ) {
    //     echo "<script>window.location.href = 'login.html';</script>";
    //     exit;
    // }


    if ($row['role'] == '0'){
        echo "Login Done";
        echo "<script>window.location.href = './superadmin/index.html';</script>";
    }else{
        echo "<script>window.location.href = 'login.html';</script>";
    }

    

    
?>