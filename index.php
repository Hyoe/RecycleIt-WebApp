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
  <script src="https://use.fontawesome.com/42200448b5.js"></script>

  <!-- CSS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <!-- Latest compiled and minified CSS -->
  <link href="/bootstrap/css/bootstrap.min.css" media="screen" rel="stylesheet" type="text/css">
  <link href="/css/nav.css" media="screen" rel="stylesheet" type="text/css">
  <link href="/css/style.css" media="screen" rel="stylesheet" type="text/css">
  <link href="/css/kburns.css" media="screen" rel="stylesheet" type="text/css">

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

</head>

<?php include(__DIR__ . "/includes/nav.php") ?>

<body>

  <!-- Header
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->

  <!-- Content
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->

  <!-- Primary Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->

<div class="imageNav imageTint">
<div class="divBlur">
  <div class="container">
    <div class="row welcomeBG">
      <div class="col-md-10 col-md-offset-1">
        <div id="welcomeText">

          <div id="welcomeHeadlineText">
            <p>RecycleIt!</p>
          </div>

          <div id="welcomeBulletText">
              <p><i class="fa fa-recycle" aria-hidden="true"></i>
              Find recycling centers nationwide.
              </p>
              <p><i class="fa fa-recycle" aria-hidden="true"></i>
              Save and update your favorite facilities.
              </p>
              <p><i class="fa fa-recycle" aria-hidden="true"></i>
              Get updated information from other users.</p>
              <p><i class="fa fa-recycle" aria-hidden="true"></i>
              Learn more about recycling.</p>
            </div>

            <!--

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

            -->
            <br />
            <div id="tips">
              Tips:
            </div>

            <div id="tipsList">
              <ul>
                <li>Go to the Search page to locate places and see your favorites.</li>
                <li>Begin typing search criteria and select from the available options to set the map at your desired location.</li>
                <li>Press the “Search” button to show recycling centers in your selected area.</li>
              </ul>
            </div>

        </div>
      </div>
    </div>
    </div>
  </div>
</div>


<div class="slideshow">
  <div class="slideshow-image" style="background-image: url('/images/glassImage.jpg')"></div>
  <div class="slideshow-image" style="background-image: url('/images/cansImageBlur.jpg')"></div>
  <div class="slideshow-image" style="background-image: url('/images/plasticImageBlur.jpg')"></div>
</div>


<?php include(__DIR__ . "/includes/footer.php") ?>


<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>
</html>