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

<div id="loginPicDiv">
  <img src="/images/plasticImageCut.jpg" alt="plastic">
</div>


<?php
require("../dbconnection/appenginedbhl.php");
//require("../dbconnection/local_db_connection.php");

$ek = $_GET['ek'];
$username = $_GET['username'];
$result = "";
$tm = time()-86400;

$sql = "SELECT username
              FROM forgot_pass
              WHERE ekey = :ekey
              AND username = :username
              AND status = :status";
        $stmt = $db -> prepare($sql);
        $stmt -> execute(array(":ekey"=>$ek, ":username"=>$username, ":status"=>"pending"));
        $row = $stmt->fetchAll();
        $record = $stmt->rowCount();

if ($record <> 1) {
  $result = '<div class="alert alert-danger">Invalid or expired activation key. Send forgot password against after 24 Hours</div>';
} else {
    $ek=$_POST['ek'];
    $todo=$_POST['todo'];
    $password=$_POST['password'];
    $password2=$_POST['confirm-password'];

    if (isset($todo) && $todo == "new-password") {
      $status = "OK";
      $msg = "";
      $msgPass2 = "";

      if (strlen($password) < 3) {
        $msg = "Password must have a minimum of 3 characters";
        $status = "NOTOK";
      }

      if ($password <> $password2) {
        $msgPass2 = "Passwords do not match!";
        $status = "NOTOK";
      }

      if ($status == "OK") {
        $updatedPassword = hash("sha256", $password);
        $sql = "UPDATE users
                SET pw = :pw
                WHERE username = :username";
        $stmt = $db -> prepare($sql);
        $stmt -> execute(array(":pw"=>$updatedPassword, ":username"=>$username));
        $recordUpdate = $stmt->rowCount();

          if ($recordUpdate > 0) {
            $sql = "UPDATE forgot_pass
                    SET status = :status
                    WHERE username = :username";
            $stmt = $db -> prepare($sql);
            $stmt -> execute(array(":username"=>$username, ":status"=>"complete"));
            $result = '<div class="alert alert-success">Password successfully updated.</div>';
          }
          else {
            $result = '<div class="alert alert-danger">Previous password cannot be used, try again, or email site Admin.</div>';
          }
      }
    }
?>
    <div id="rsform" class="container">
      <div class="form-signin">
        <div class="row">
          <div class="col-md-6 col-md-offset-3">
            <div class="mainMessage">
                  <?php echo $result; ?>
            </div>
            <div class="panel panel-login">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-md-6 col-md-offset-3">
                    <p class="active" id="register-form-link">Change Password</p>
                  </div>
                </div>
                <hr>
              </div>
                <div class="panel-body">
                  <form class="form-signin" id="" action="" method="post" role="form" style="display: block;">
                    <div id="error">
                      <!-- error will be showen here ! -->
                    </div>
                        <input type=hidden name=todo value=new-password>
                        <input type="hidden" name="ek" value="<?php echo htmlspecialchars($ek); ?>">
                        <input type="hidden" name="username" value="<?php echo htmlspecialchars($username); ?>">
                        <div class="form-group">
                          <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="New Password">
                          <?php echo "<p class='text-danger'>$msg</p>";?>
                        </div>
                        <div class="form-group">
                          <input type="password" name="confirm-password" id="confirm-password" tabindex="2" class="form-control" placeholder="Re-enter New Password">
                          <?php echo "<p class='text-danger'>$msgPass2</p>";?>
                        </div>
                        <div class="form-group">
                          <div class="row">
                            <div class="col-sm-6 col-sm-offset-3">
                              <button type="submit" name="pass-submit" id="pass-submit" tabindex="4" class="form-control btn btn-register" value="Change Password"><span class="glyphicon glyphicon-save"></span> &nbsp; Change Password</button>
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
<?php
}
?>

<!-- Footer
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->

<?php include(__DIR__ . "/footer.php") ?>

<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>
</html>