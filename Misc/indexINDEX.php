<? session_start() ?>
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

  <!-- FONT
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800&subset=latin,greek' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>

  <!-- CSS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <!-- Latest compiled and minified CSS -->
  <link href="/bootstrap/css/bootstrap.min.css" media="screen" rel="stylesheet" type="text/css">
  <link href="/css/nav.css" media="screen" rel="stylesheet" type="text/css">
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
  <link rel="icon" type="image/png" href="images/icon1.png">

  <meta name="theme-color" content=#"99CC33" />

  <script src="/js/jquery.flexslider-min.js" type="text/javascript" defer ></script>
  <link rel="stylesheet" href="/css/flexslider.css" type="text/css" media="screen" />

  <script src="https://use.fontawesome.com/42200448b5.js"></script>
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet'  type='text/css'>

  <title>Recycle It!</title>

</head>

<?php include(__DIR__ . "/includes/nav.php") ?>

<body class="demo">

  <!-- Header
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->

  <!-- Content
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->

  <!-- Primary Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
<div id="imageNav">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div id="welcomeText">

          <div id="welcomeHeadlineText">
            <p>Welcome to RecycleIt!</p>
          </div>

            <div id="welcomeBulletText">
              <p><i class="fa fa-recycle" aria-hidden="true"></i>
              Register / login to save your favorite facilities.
              </p>
              <p><i class="fa fa-recycle" aria-hidden="true"></i>
              Locate nearby recycling centers on our search page.
              </p>
              <p><i class="fa fa-recycle" aria-hidden="true"></i>
              Update your favorites with the most current information for others to see.</p>
              <p><i class="fa fa-recycle" aria-hidden="true"></i>
              Check out our recycling guide to learn more about common household recyclables.</p>
            </div>

        </div>
      </div>
    </div>
  </div>
</div>



<!--
<nav class="navbar navbar-inverse navbar-static-top navbar-fixed-top" id="imageNav">
  <div class="container">
    <div class="navbar-header">
      <div class="textOverImages">
        <div class="row">
          <div class="col-md-12">

          <div id=welcomeTextDiv>
            <div id="welcomeHeadlineText">
              <p>Welcome to RecycleIt!</p>
            </div>

              <div id="welcomeBulletText">
                <p><i class="fa fa-recycle" aria-hidden="true"></i>
                Locate nearby recycling centers on our search page.</p>
                <p><i class="fa fa-recycle" aria-hidden="true"></i>
                Register / login to save your favorite facilities.</p>
                <p><i class="fa fa-recycle" aria-hidden="true"></i>
                Update your favorites with the most current information for others to see.</p>
                <p><i class="fa fa-recycle" aria-hidden="true"></i>
                Check out our recycling guide to learn about common household recyclables.</p>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</nav>
-->


<div class="flexslider">
  <ul class="slides">
    <li style="background-image: url(/images/glassImageTint.jpg);">
    </li>
    <li style="background-image: url(/images/plasticImageTint.jpg);">
    </li>
    <li style="background-image: url(/images/cansImageTint.jpg);">
    </li>
  </ul>
</div>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h1>

      </h1>
    </div>
  </div>
</div>



<script>
  $(window).load(function() {
    $('.flexslider').flexslider({
      animation: "fade",
      controlNav: false,
      slideshowSpeed: "5000",
      directionNav: false,
    });
  });
</script>



<?php include(__DIR__ . "/includes/footer.php") ?>


<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>
</html>
