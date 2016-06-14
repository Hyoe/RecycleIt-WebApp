<? session_start() ?>
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
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800&subset=latin,greek' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Istok+Web:400,700,700italic,400italic' rel='stylesheet' type='text/css'>

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

  <!-- Optional theme -->
  <link href="/bootstrap/css/bootstrap-theme.min.css" media="screen" rel="stylesheet" type="text/css">

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

<?php
  if (isset($_POST["contact-submit"])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $from = 'Recycle It! User';
    $to = 'hyolee@csumb.edu,jedunham@csumb.edu';
    $subject = 'Recycle It! Contact';

    $body = "From: $name\nEmail: $email\nMessage:\n$message";

    if (!$_POST['name']) {
      $errName = "Please enter your name";
    }

    if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
      $errEmail = "Please enter a valid email address";
    }

    if (!$_POST['message']) {
      $errMessage = "Please enter your message";
    }

    if (!$errName && !$errEmail && !$errMessage) {
      if (mail ($to, $subject, $body, $from)) {
        $result='<div class="alert alert-success">Thank you, your message was submitted.</div>';
        $_POST = array();
      }
      else {
        $result='<div class="alert alert-danger">Oops something went wrong! Please try again later.</div>';
      }
    }
  }
?>

<div id="contactPicDiv">
  <img src="/images/glassImageCut.jpg" alt="glass">
</div>

<div id="rsform" class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-login">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                                <p class="active" id="register-form-link">Contact Us</p>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form id="register-form" action="" method="post" role="form">
                                    <div class="mainMessage">
                                      <?php echo $result; ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="name" id="name" tabindex="1" class="form-control" placeholder="Name" value="<?php echo htmlspecialchars($_POST['name']); ?>">
                                        <?php echo "<p class='text-danger'>$errName</p>";?>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" id="email" tabindex="2" class="form-control" placeholder="Email Address" value="<?php echo htmlspecialchars($_POST['email']); ?>">
                                        <?php echo "<p class='text-danger'>$errEmail</p>";?>
                                    </div>
                                    <div class="form-group">
                                        <textarea placeholder="Message" name="message" rows="5" id="message" tabindex="3" class="form-control"><?php echo htmlspecialchars($_POST['message']);?></textarea>
                                        <?php echo "<p class='text-danger'>$errMessage</p>";?>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6 col-sm-offset-3">
                                                <button type="submit" name="contact-submit" id="contact-submit" tabindex="4" class="form-control btn btn-register" value="Submit"><span class="glyphicon glyphicon-envelope"></span> &nbsp; SUBMIT</button>
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

