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

    $first_name   = $_POST["first_name"];
    $last_name    = $_POST["last_name"];
    $email        = $_POST["email"];
    $phone        = $_POST["phone"];
    $address      = $_POST["address"];
    $gender       = $_POST["gender"];
    $age          = $_POST["age"];
    $problem      = $_POST["problem"];



    // Validate user input (example)
    if (empty($first_name) || empty($last_name) ||  empty($email) || empty($phone) || empty($address) || empty($gender) || empty($problem) ) {
        echo "<script>window.location.href = 'booking.html';</script>";
        exit;
    }


    $sql ="INSERT INTO bookings (first_name, last_name, email, phone, address, gender, age, problem) VALUES ('$first_name', '$last_name', '$email','$phone', '$address', '$gender', '$age', '$problem')";
    $res = mysqli_query($connect, $sql);

    if ($res) {
        // return location
        echo "<script>window.location.href = 'bkash.html';</script>";
    } else {
        echo "Error:";
    }
    
?>