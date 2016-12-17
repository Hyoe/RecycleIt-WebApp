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

  <!-- FONT
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800&subset=latin,greek' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Istok+Web:400,700,700italic,400italic' rel='stylesheet' type='text/css'>
  <script src="https://use.fontawesome.com/42200448b5.js"></script>

  <!-- CSS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <!-- Latest compiled and minified CSS -->
  <link href="/bootstrap/css/bootstrap.min.css" media="screen" rel="stylesheet" type="text/css">
  <link href="/css/flexslider.css" media="screen" rel="stylesheet" type="text/css">
  <link href="/css/nav.css" media="screen" rel="stylesheet" type="text/css">
  <link href="/css/style.css" media="screen" rel="stylesheet" type="text/css">
  <link href="/css/kburns.css" media="screen" rel="stylesheet" type="text/css">

  <!-- JS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
  <link href='https://fonts.googleapis.com/css?family=Istok+Web:400,700,700italic,400italic' rel='stylesheet' type='text/css'>

  <!-- Latest compiled and minified JavaScript -->
  <script src="/bootstrap/js/bootstrap.min.js"></script>

  <!-- Optional theme -->
  <link href="/bootstrap/css/bootstrap-theme.min.css" media="screen" rel="stylesheet" type="text/css">
  <script src="/js/jquery.flexslider-min.js"></script>

  <!-- Favicon
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="icon" type="image/png" href="images/icon1.png">

</head>

<?php include(__DIR__ . "/includes/nav.php") ?>

<body>

  <!-- Header
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->

  <!-- Content
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->

  <!-- Primary Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->

<div class="flexslider">
  <ul class="slides">
    <li>
      <img src="/images/map.png" />
      <p class="flex-caption"><i class="fa fa-search" aria-hidden="true"></i>&nbsp;&nbsp;Find recycling centers nationwide.</p>
    </li>
    <li>
      <img src="/images/glassImage320.jpg" />
      <p class="flex-caption"><i class="fa fa-star" aria-hidden="true"></i>&nbsp;&nbsp;Save and update your favorite facilities.</p>
    </li>
    <li>
      <img src="/images/cansImage320.jpg" />
      <p class="flex-caption"><i class="fa fa-info-circle" aria-hidden="true"></i>&nbsp;&nbsp;Get updated information from other users.</p>
    </li>
    <li>
      <img src="/images/plasticImage320.jpg" />
      <p class="flex-caption"><i class="fa fa-leanpub" aria-hidden="true"></i>&nbsp;&nbsp;Learn more about recycling.</p>
    </li>
  </ul>
</div>

<div class="banner">
  <div class="logo">
    <img src="/images/logo6.svg" alt="" width="240px">
  </div>
  <div id="welcomeText">
    <div id="welcomeHeadlineText">
      <p>Your one stop hub for all your recycling needs.</p>
    </div>
  </div>
</div>


<div class="container">
  <div class="welcomeBG">
    <div class="row">
      <div class="col-md-12">

        <div id="welcomeBulletText">
          <p><i class="fa fa-recycle" aria-hidden="true"></i>
          Find recycling centers nationwide.
          <i class="fa fa-recycle" aria-hidden="true"></i>
          Save and update your favorite facilities.
          </p>
          <p><i class="fa fa-recycle" aria-hidden="true"></i>
          Get updated information from other users.
          <i class="fa fa-recycle" aria-hidden="true"></i>
          Learn more about recycling.</p>
        </div>

          <div class="aboutUs">
            <p>RecycleIt! is a website and companion mobile Android app that integrates with the Google Maps and Places API in combination with a custom database to list recycling centers by their location and provide key information such as which materials they accept.</p>

            <p>RecycleIt! will encourage people to recycle and can provide those who already make an effort to collect money for their recyclable goods with a user-friendly resource. The overall purpose is to prevent recyclable materials from being thrown in the garbage. Right now, many people recycle at their homes through their city’s waste management utility services. Recycle It! will allow them to benefit monetarily if they choose to take their items to a recycling center. They can also take items such as certain kinds of plastics, batteries, light bulbs, electronics, and construction materials that are not typically accepted by home waste management companies to recycling centers that will accept such items. In this way, items that many people dispose of to landfills are more likely to be recycled.</p>

            <p>RecycleIt! and keep our planet healthy.</p>
        </div>

        <br />
        <div id="tips">
          Tips for using the website:
        </div>

        <div id="tipsList">
          <ul>
            <li>Go to the Search page to locate places and see your favorites.</li>
            <li>Begin typing search criteria and click from the available options to set the map at your desired location.</li>
            <li>Press the “Search” button to show recycling centers in your selected area.</li>
          </ul>
        </div>

      </div>
    </div>
  </div>
</div>


<script>
$(window).load(function() {
  $('.flexslider').flexslider({
    animation: "fade",
    slideshowSpeed: 3500,
    controlNav: false,
    directionNav: false,
  });
});
</script>

<?php include(__DIR__ . "/includes/footer.php") ?>


<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>
</html>