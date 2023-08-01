<?php
  $user=0;
  $success=0;


    if($_SERVER['REQUEST_METHOD']=="POST"){
        include 'connect.php';

        $username = $_POST['UserName'];
        $email = $_POST['Email'];
        $country = $_POST['Country_Region'];
        $dob = $_POST['DateOfBirth'];
        $gamingPlatform = $_POST['GamingPlatform'];
        $preferredGames = $_POST['PreferredEsportsGames'];
        $gamingExperience = $_POST['GamingExperience'];
        $gamingID = $_POST['GamingID_Tag'];
        $password = $_POST['Passwordd'];

      

        $sql = "Select * from registeration where UserName='$username'";

        $result= mysqli_query($con,$sql);
        if($result){
          $num = mysqli_num_rows($result);
          if($num >0){
           // echo "user alreay Exist..!";
           $user=1;
          }
          else{
            $sql = "INSERT INTO registeration (UserName, Email, DateOfBirth, Country_Region, PreferredEsportsGames, GamingPlatform, GamingID_Tag, GamingExperience, Passwordd) 
       
            VALUES ('$username', '$email', '$dob', '$country', '$preferredGames', '$gamingPlatform', '$gamingID', '$gamingExperience', '$password')";
    
            if (mysqli_query($con, $sql)) {
           
                //echo "Sign Up Successfully.....!!";
                $success=1;
                header('location:home.php');
            } else {
            
                die(mysqli_query($con));
            }
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

    <link rel="stylesheet" href="signup.css">
    <title>Sign Up</title>
  </head>
  <body>

  <?php
    if($user){
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
             <strong>Oh No Sorry </strong> User Already Exist.
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
             </button>
             </div>';
    }

  ?>

<?php
    if($success){
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Great </strong> You Are Successfully Signed Up.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>';
    }

  ?>

  <div class="container mt-5">
    <h2 class="text-center">E-sports Sign-up Registration</h2>
    <form action="<?php $_PHP_SELF ?>" method="post">
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" id="username" name="UserName" required>
      </div>

      <div class="form-group">
        <label for="email">Email Address</label>
        <input type="email" class="form-control" id="email" name="Email" required>
      </div>

      <div class="form-group">
        <label for="dob">Date of Birth</label>
        <input type="date" class="form-control" id="dob" name="DateOfBirth" required>
      </div>

      <div class="form-group">
        <label for="country">Country/Region</label>
        <input type="text" class="form-control" id="country" name="Country_Region" required>
      </div>

      <div class="form-group">
        <label for="preferredGames">Preferred E-sports Games</label>
        <select class="form-control" id="preferredGames" name="PreferredEsportsGames" required>
          <option value="">Select a game</option>
          <option value="Bgmi">Bgmi</option>
          <option value="Valorant">Valorant</option>
          <option value="Overwatch">Overwatch</option>
          <option value="Fortnite">Fortnite</option>
          <!-- Add more options as needed -->
        </select>
      </div>

      <div class="form-group">
        <label for="gamingPlatform">Gaming Platform</label>
        <select class="form-control" id="gamingPlatform" name="GamingPlatform" required>
          <option value="">Select a platform</option>
          <option value="pc">PC</option>
          <option value="console">Console</option>
          <option value="mobile">Mobile</option>
        </select>
      </div>

      <div class="form-group">
        <label for="gamingID">Gaming ID/Tag</label>
        <input type="text" class="form-control" id="gamingID" name="GamingID_Tag" required>
      </div>

      <div class="form-group">
        <label for="gamingExperience">Gaming Experience</label>
        <select class="form-control" id="gamingExperience" name="GamingExperience" required>
          <option value="">Select your experience level</option>
          <option value="beginner">Beginner</option>
          <option value="intermediate">Intermediate</option>
          <option value="advanced">Advanced</option>
        </select>
      </div>

      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="passwordd" name="Passwordd" required>
      </div>

      <button type="submit" class="btn btn-primary">Sign Up</button>

    </form>
  </div>
  </body>
</html>