<?php 
    $conn = mysqli_connect("localhost", "root","", "restate");


    //Check connection with the datbase
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $ID=$_POST['ID'];

$sql = "DELETE FROM item WHERE ID='$ID'";

    if (mysqli_query($conn, $sql)) {
        include('delItem.php');
    } else {
        include('faild.html');
    }

 ?>