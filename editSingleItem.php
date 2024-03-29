<?php
$conn = mysqli_connect("localhost", "root","", "restate");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Project test</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" href="Css-file/styles.css">
        <link rel="icon" href="images/web-icon.png">

        <!-- Google fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200&family=Unbounded:wght@300&display=swap" rel="stylesheet">
        
    </head>
    <body>
        <nav class="navbar sticky-top navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <img src="images/logo-text.png" alt="Logo" class="logo-text">
                <!--Here The notes 1-->
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.html">Home</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link active" href="item.php">Items profile</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="about.html">About us</a>
                        </li>
                    </ul>
                </div>
                <div class="admin-button">
                    <a href="adminLogin.html" class="btn btn-primary" role="button" data-bs-toggle="button">Admin</a>
                </div>
            </div>
        </nav>
        <!-- NavBar Closed-->

        <!-- Edit Single Items Cards-->
        <div class="item-mid-container">
                <!-------------------------------------------here---------------------------------------->
                <div class="edit-single-container">
                    <?php
                    //get The item IDD
                    $itemID=$_POST['ID'];
                    
                    $i = 1;
                    $rows = mysqli_query($conn, "SELECT * FROM item WHERE ID='$itemID' ORDER BY id DESC")
                    ?>
                    <?php foreach ($rows as $row) : ?>
                    <div class="card edit-single">
                      <img src="images/<?php echo $row["logo"]; ?>" width = 100% height = 200px title="<?php echo $row['logo']; ?>">
                      <div class="card-body">
                        <form action="alterItem.php" method="POST" class="edit-element-form">
                            <input type="text" name="newName" placeholder="Enter new Name" class="edit-single-input">
                            <div class="form-underline"></div>
                            <br>
                            <input type="text" name="newDes" placeholder="Enter new Description" class="edit-single-input">
                            <div class="form-underline"></div>
                            <input type="text" hidden value="<?php echo $row["ID"]; ?>" name="ID">
                            <button type="submit" class="edit-single-btn-item" >Submit edit</button>
                        </form>
                      </div>
                    </div>
                    <?php endforeach; ?>
                    
                </div>
      
    
    <br>
              <!-------------------------------------------here---------------------------------------->
        </div>
    </body>

    <!-- Bootstrap footer-->
    <footer class="bg-dark text-center text-white">
        <!-- Grid container -->
        <div class="container p-4 pb-0">
          <!-- Section: Form -->
          <section class="">
            <form action="">
              <!--Grid row-->
              <div class="row d-flex justify-content-center">
                <!--Grid column-->
                <div class="col-auto">
                  <p class="pt-2">
                    <strong>Sign up for our newsletter</strong>
                  </p>
                </div>
                <!--Grid column-->
      
                <!--Grid column-->
                <div class="col-md-5 col-12">
                  <!-- Email input -->
                  <div class="form-outline form-white mb-4">
                    <input type="email" id="form5Example29" class="form-control" placeholder="name@xyz.com">
                  </div>
                </div>
                <!--Grid column-->
      
                <!--Grid column-->
                <div class="col-auto">
                  <!-- Submit button -->
                  <button type="submit" class="btn btn-outline-light mb-4">
                    Subscribe
                  </button>
                </div>
                <!--Grid column-->
              </div>
              <!--Grid row-->
            </form>
          </section>
          <!-- Section: Form -->
        </div>
        <!-- Grid container -->
      
        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: #a8a29f;">
          © 2023 Copyright:
          <a class="text-white" href="">Re-State.com</a>
        </div>
        
      </footer>
</html>