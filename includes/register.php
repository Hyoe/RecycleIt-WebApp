<?php
session_start();
?>

<?php

/*
$sql = "INSERT INTO users (username, pw, email) VALUES (:username, :pw, :email)";
$stmt = $db->prepare($sql);
$stmt->execute(array(":username"=>"hyo", ":pw"=>"hyo", ":email"=>"hyo@hyo.com"));
*/

if ($_POST) {

  require("../dbconnection/appenginedbhl.php");
  //require("../dbconnection/local_db_connection.php");
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
      $_SESSION['recycleitusername'] = $username;
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
  <title>RecycleIt!</title>
  <meta name="theme-color" content="#99CC33">

  <!-- Mobile Specific Metas
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- FONTS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->

  <!-- CSS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <!-- Latest compiled and minified CSS -->
  <link href="/bootstrap/css/bootstrap.min.css" media="screen" rel="stylesheet" type="text/css">
  <link href="/css/nav.css" media="screen" rel="stylesheet" type="text/css">
  <link href="/css/register.css" media="screen" rel="stylesheet" type="text/css">
  <link href="/css/style.css" media="screen" rel="stylesheet" type="text/css">

  <!-- JS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>

  <!-- Latest compiled and minified JavaScript -->
  <script src="/bootstrap/js/bootstrap.min.js"></script>
  <script src="/js/registration.js" type="text/javascript" ></script>

  <!-- JQUERY VALIDATE CDNS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/additional-methods.min.js"></script>

  <!-- Optional theme -->
  <link href="/bootstrap/css/bootstrap-theme.min.css" media="screen" rel="stylesheet" type="text/css">

  <script src="https://use.fontawesome.com/42200448b5.js"></script>

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
<div id="registerPicDiv">
  <img src="/images/cansImageCut.jpg" alt="glass">
</div>

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

