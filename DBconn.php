<?php

    //assigin variables from the HTML page values
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];




    //Create connection with DB name and conecction type of access
    $conn = mysqli_connect("localhost", "root","", "restate");


    //Check connection with the datbase
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    else{
        $sql = "INSERT INTO admin(username,email,password) VALUES('$username','$email','$password')";
    }

    if (mysqli_query($conn, $sql)) {
        include('SignupSuccess.html');
    } else {
        include('FaildToSign.html');
    }

    $conn->close();
?>