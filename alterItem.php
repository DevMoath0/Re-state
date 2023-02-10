<?php 
    $conn = mysqli_connect("localhost", "root","", "restate");


    //Check connection with the datbase
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $newName=$_POST['newName'];
    $newDes=$_POST['newDes'];
    $ID=$_POST['ID'];

$sql = "UPDATE item SET name='$newName', description='$newDes' WHERE ID='$ID'";

    if (mysqli_query($conn, $sql)) {
        include('editItem.php');
    } else {
        include('FaildToSign.html');
    }

 ?>