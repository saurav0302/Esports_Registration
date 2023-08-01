<?php
    session_start();
    if(!isset($_SESSION['UserName'])){
        header('location: login.php');
    }

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="home.cs">
    <title>Welcome Page</title>
  </head>
  <body>
    <h1 class="text-center text-warning mt-5">Welcome
        <?php
        echo $_SESSION['UserName']; 
        ?>
    </h1>

    <div class="container">
        <a href="logout.php" class = "btn btn-primary mt-5">Logout</a>
    </div>
   
  </body>
</html>