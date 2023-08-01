<?php
  $login=0;
  $invalid=0;


    if($_SERVER['REQUEST_METHOD']=="POST"){
        include 'connect.php';

        $username = $_POST['UserName'];
        $password = $_POST['Passwordd'];

        $sql = "Select * from registeration where UserName='$username' and Passwordd='$password'";

        $result= mysqli_query($con,$sql);
        if($result){
          $num = mysqli_num_rows($result);
          if($num >0){
            $login=1;
            session_start();
            $_SESSION['UserName']=$username;
            header('location:home.php');
          }
          else{
            $invalid=1;
          }
        }
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
   <link rel="stylesheet" href="login.cs">

    <title>Login</title>
  </head>
  <body>
 
  <?php
    if($login){
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
             <strong>Great </strong> You Are Successfully Logged in.
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
             </button>
             </div>';
    }

  ?>

    <?php
    if($invalid){
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
             <strong>Error </strong> You Are Data Is Invalid.
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
             </button>
             </div>';
    }

    ?>
 

  <div class="container mt-5">
    <h2 class="text-center">E-sports Login</h2>
    <form action="<?php $_PHP_SELF ?>" method="post">
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" id="username" name="UserName" required>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="passwordd" name="Passwordd" required>
      </div>
      <button type="submit" class="btn btn-primary">Login</button><br><br>
      <div>DON'T HAVE ACCOUNT? &nbsp; <a href="signup.php">SIGN_UP</a></div>
    </form>
  </div>


   
  </body>
</html>