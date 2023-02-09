<?php

$conn = mysqli_connect("localhost", "root","", "restate");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST["submit"])){
  $name = $_POST["name"];
  if($_FILES["logo"]["error"] == 4){
    echo
    "<script> alert('Image Does Not Exist'); </script>"
    ;
  }
  else{
    $fileName = $_FILES["logo"]["name"];
    $fileSize = $_FILES["logo"]["size"];
    $tmpName = $_FILES["logo"]["tmp_name"];

    $validImageExtension = ['jpg', 'jpeg', 'png'];
    $imageExtension = explode('.', $fileName);
    $imageExtension = strtolower(end($imageExtension));
    if ( !in_array($imageExtension, $validImageExtension) ){
      echo
      "
      <script>
        alert('Invalid Image Extension');
      </script>
      ";
    }
    else if($fileSize > 1000000){
      echo
      "
      <script>
        alert('Image Size Is Too Large');
      </script>
      ";
    }
    else{
      $newImageName = uniqid();
      $newImageName .= '.' . $imageExtension;

      move_uploaded_file($tmpName, 'images/' . $newImageName);
      $query = "INSERT INTO item VALUES('','$name','$newImageName','','')";
      mysqli_query($conn, $query);
      echo
      "
      <script>
        alert('Successfully Added');
        document.location.href = 'data.php';
      </script>
      ";
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Upload Image File</title>
  </head>
  <body>
    <form class="" action="" method="post" autocomplete="off" enctype="multipart/form-data">
      <label for="name">Name : </label>
      <input type="text" name="name" id = "name" required value=""> <br>
      <label for="logo">logo : </label>
      <input type="file" name="logo" id = "logo" accept=".jpg, .jpeg, .png" value=""> <br> <br>
      <button type = "submit" name = "submit">Submit</button>
    </form>
    <br>
  </body>
</html>