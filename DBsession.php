<?php 

session_start(); 

//establish connection 
$conn = mysqli_connect("localhost", "root","", "restate");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['username']) && isset($_POST['password'])) {
    
    //A method for valdating data enterd
    function validate($data){

       $data = trim($data);

       $data = stripslashes($data);

       $data = htmlspecialchars($data);

       return $data;

    }//end of the method

    //validaing username and password
    $username = validate($_POST['username']);
    $password = validate($_POST['password']);


    //checking if username and password field are filled
    if (empty($username)) {

        header("Location: index.php?error=User Name is required");

        exit();

    }else if(empty($password)){

        header("Location: index.php?error=Password is required");

        exit();

    }else{

        //query for fetching the data
        $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);

            if ($row['username'] === $username && $row['password'] === $password) {

                echo "Logged in!";

                include('adminPanel.html');

                exit();

            }else{

                include('FaildToSign.html');

                exit();

            }

        }else{

            include('faild.html');

            exit();

        }

    }

}else{

    header("Location: index.php");

    exit();

}

?>