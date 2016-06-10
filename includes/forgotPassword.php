<?php
session_start();
  if ($_SESSION['recycleitusername']) {
    header("Location: ../index.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta charset="utf-8">
  <title>RecycleIt!</title>
  <meta name="theme-color" content="#009900">

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
  <script src="/js/login.js" type="text/javascript" ></script>

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
<!--
<div id="loginPicDiv">
  <img src="/images/plasticImageCut.jpg" alt="glass">
</div>
-->


<?php

if (isset($_POST["email"])) {
  require("../dbconnection/appenginedbhl.php");
  //require("../dbconnection/local_db_connection.php");

  $email = $_POST['email'];

  $status = "OK";
  $msg= "";
  $result = "";


  if (!$email || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  //if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
    $msg = "Please enter a valid email address";
    $status= "NOTOK";
  }

  if ($status == "OK") {
      $sql = "SELECT username, email
              FROM users
              WHERE email = :email";
        $stmt = $db -> prepare($sql);
        $stmt -> execute(array(":email"=>$email));
        $row = $stmt->fetchAll();
        $record = $stmt->rowCount();

    if ($record <= 0) {
      $result = '<div class="alert alert-danger">' . $email . ' is not registered.</div>';
    } else {

        foreach ($row as $v) {
          $emailInDB = $v['email'];
          $username = $v['username'];
        }

        $tm = time() - 86400;

        $sql = "SELECT username
                FROM forgot_pass
                WHERE username = :username
                AND status = :pending";
            $stmt = $db -> prepare($sql);
            $stmt -> execute(array(":username"=>$username, ":pending"=>"pending"));
            $row = $stmt->fetchAll();
            $recordForgot = $stmt -> rowCount();

        if ($recordForgot > 0) {
          $result = '<div class="alert alert-warning">Your password reset key has already been sent to: '. $emailInDB . '  check your inbox or spam folder.</div>';
        } else {

        function random_generator($digits){
        srand ((double) microtime() * 10000000);
        //Array of alphabets
        $input = array ("A", "B", "C", "D", "E","F","G","H","I","J","K","L","M","N","O","P","Q",
        "R","S","T","U","V","W","X","Y","Z");

        $random_generator="";// Initialize the string to store random numbers
        for($i=1;$i<$digits+1;$i++){ // Loop the number of times of required digits

          if(rand(1,2) == 1){// to decide the digit should be numeric or alphabet
          // Add one random alphabet
            $rand_index = array_rand($input);
            $random_generator .=$input[$rand_index]; // One char is added
          } else {
              // Add one numeric digit between 1 and 10
              $random_generator .=rand(1,10); // one number is added
          } // end of if else
        } // end of for loop
        return $random_generator;
        } // end of function

        $key = random_generator(10);
        $key = hash("sha256", $key);
        $tm = time();

          $sql = "INSERT INTO forgot_pass(username, ekey, time, status) VALUES(:username, :ekey, :time, :status)";
          $stmt = $db->prepare($sql);
          $insertUser = $stmt->execute(array(":username"=>$username, ":ekey"=>$key, ":time"=>$tm, ":status"=>"pending"));

          $site_url = "http://www.recycleit.site/includes/resetPassword.php?ek=".$key."&username=".$username;

          $to = $emailInDB;
          $subject = 'Password Reset';
          $message = "Request to reset password for: " .$username. "\n\nTo reset your password, please visit the link below.\n\n<a href='".$site_url."'>".$site_url."</a>\n\nThank you,\n\nTeam RecycleIt!";
          $headers  = 'MIME-Version: 1.0' . "\r\n";
          $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
          $headers .= "From: passwords@recycleit-web.appspotmail.com";

          if (mail($to, $subject, $message, $headers)) {
            $result = '<div class="alert alert-success">Your password reset key was successfully sent to: '. $emailInDB . '  check your inbox or spam folder.</div>';
          } else {
            $result='<div class="alert alert-danger">Oops something went wrong! Please try again later.</div>';
          }
        }
      }
    }
}
?>
<div id="rsform" class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
              <div class="mainMessage">
                <?php echo $result; ?>
              </div>
                <div class="panel panel-login">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                                <p class="active" id="register-form-link">Forgot Password?</p>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form id="" action="" method="post" role="form">
                                    <div class="form-group">
                                        <input type="email" name="email" id="email" tabindex="2" class="form-control" placeholder="Email Address" value="<?php echo htmlspecialchars($_POST['email']); ?>">
                                        <?php echo "<p class='text-danger'>$msg</p>";?>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6 col-sm-offset-3">
                                                <button type="submit" name="email-submit" id="email-submit" tabindex="4" class="form-control btn btn-register" value="Submit"><span class="glyphicon glyphicon-envelope"></span> &nbsp; SUBMIT</button>
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