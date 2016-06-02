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
  <!--<link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">-->

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


  <title>Recycle It!</title>

</head>

<body>

<?php include(__DIR__ . "/includes/nav.php") ?>


  <!-- Header
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->

  <!-- Content
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->

  <!-- Primary Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
<div class="flexslider">
  <ul class="slides">
    <li>
      <img src="/images/cans.jpg" />
    </li>
    <li>
      <img src="/images/.png" />
    </li>
    <li>
      <img src="/images/.png" />
    </li>
    <li>
      <img src="#" />
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
      slideshowSpeed: "4000",
    });
  });
</script>

<?php include(__DIR__ . "/includes/footer.php") ?>


<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>
</html>
