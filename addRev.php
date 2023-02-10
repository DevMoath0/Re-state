<?php 
    $conn = mysqli_connect("localhost", "root","", "restate");


    //Check connection with the datbase
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }


    $name=$_POST['name'];
    $com=$_POST['com'];
    $rate=$_POST['rate'];
    $item_id=$_POST['ID'];

    $sql = "INSERT INTO review (name,body,item_id,rating) VALUES('$name','$com','$item_id','$rate')";
    if (mysqli_query($conn, $sql)) {
        include('singleItem.php');
    } else {
        include('faild.html');
    }

 ?>