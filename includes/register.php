<?php
session_start();
//require("../dbconnection/appenginedbhl.php");
//require("../dbconnection/local_db_connection.php");
?>

<?php

/*
$sql = "INSERT INTO users (username, pw, email) VALUES (:username, :pw, :email)";
$stmt = $db->prepare($sql);
$stmt->execute(array(":username"=>"hyo", ":pw"=>"hyo", ":email"=>"hyo@hyo.com"));
*/

if ($_POST) {

  //require("../dbconnection/appenginedbhl.php");
  require("../dbconnection/local_db_connection.php");
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirmPass = $_POST['confirm_password'];

  try {
    $sql = "SELECT * FROM users WHERE username = :username";
    $stmt = $db->prepare($sql);
    $stmt->execute(array(":username"=>$username));
    $usernameCount = $stmt->rowCount();

    $sql = "SELECT * FROM users WHERE email = :email";
    $stmt = $db->prepare($sql);
    $stmt->execute(array(":email"=>$email));
    $emailCount = $stmt->rowCount();

    if ($usernameCount==0 && $emailCount==0) {
      $sql = "INSERT INTO users(username, pw, email) VALUES(:username, :pw, :email)";
      $stmt = $db->prepare($sql);
      $insertUser = $stmt->execute(array(":username"=>$username, ":pw"=>hash("sha256", $password), ":email"=>$email));
    }
    if ($insertUser) {
      echo "registered";
    }
    else if ($usernameCount != 0 && $emailCount == 0) {
      echo "usernametaken"; //. $username . " username not available";
    }
    else if ($emailCount != 0 && $usernameCount == 0) {
      echo "emailtaken"; //. $email . " email address not available";
    }
    else if ($emailCount != 0 && $usernameCount != 0) {
      echo "bothgone"; //. $email . " email address not available";
    }
    else {
      echo "Database down, try again later";
    }

  }
  catch (PDOException $e) {
    echo $e->getMessage();
  }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta charset="utf-8">
  <title>Recycle It!</title>
  <meta name="Recycling" content="">
  <meta name="Recycle It!" content="">

  <!-- Mobile Specific Metas
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- FONTS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->


  <!-- CSS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <!--<link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/skeleton.css">-->
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  <link href="../css/nav.css" media="screen" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="../css/register.css">

  <!-- JS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/additional-methods.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

  <script src="../js/registration.js" type="text/javascript" ></script>

  <!-- Favicon
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="icon" type="image/png" href="/images/icon1.png">

</head>

<body>

  <!-- Nav
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->

<?php include(__DIR__ . "/nav.php") ?>


  <!-- Header
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->


  <!-- Primary Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->


<div class="signin-form">
  <div id="rsform" class="container">
    <div class="form-signin">
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <div class="panel panel-login">
            <div class="panel-heading">
              <div class="row">
                <div class="col-md-6 col-md-offset-3">
                  <p class="active" id="register-form-link">Register</p>
                </div>
              </div>
              <hr>
            </div>
              <div class="panel-body">
                <form class="form-signin" id="register-form" action="" method="post" role="form" style="display: block;">
                  <div id="error">
                    <!-- error will be showen here ! -->
                  </div>
                      <div class="form-group">
                        <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
                      </div>
                      <div class="form-group">
                        <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="">
                        <span id="check-e"></span>
                      </div>
                      <div class="form-group">
                        <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
                      </div>
                      <div class="form-group">
                        <input type="password" name="confirm_password" id="confirm_password" tabindex="2" class="form-control" placeholder="Confirm Password">
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-sm-6 col-sm-offset-3">
                            <button type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now"><span class="glyphicon glyphicon-log-in"></span> &nbsp; Create Account</button>
                          </div>
                        </div>
                      </div>
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


  <!-- Footer
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->

<?php include(__DIR__ . "/footer.php") ?>

<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>
</html>

