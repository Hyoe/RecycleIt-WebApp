<?php
session_start();
?>
<?php
  if ($_SESSION['recycleitusername']) {
?>
      <nav class="navbar navbar-inverse navbar-static-top navbar-fixed-top">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar3">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/index.php"><img src="/images/logo6.svg" alt="RECYCLEIt!" height="50px" width="124px">
            </a>
          </div>
          <div id="navbar3" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right" id="menuClick">
              <li><a href="/index.php"><span class="glyphicon glyphicon-home"></span> HOME</a></li>
              <li><a href="/includes/search.php"><span class="glyphicon glyphicon-map-marker"></span> SEARCH</a></li>
              <li><a href="/includes/whyRecycle.php"><span class="glyphicon glyphicon-question-sign"></span> WHY RECYCLE?</a>
              <li><a href="/includes/learn.php"><span class="glyphicon glyphicon-leaf"></span> RECYCLING GUIDE</a></li>
              <li><a href="/includes/contact.php"><span class="glyphicon glyphicon-envelope"></span> CONTACT</a></li>
              <li><a href="/includes/logout.php"><span class="glyphicon glyphicon-log-out"></span> LOG OUT</a></li>
            </ul>
          </div>
          <!--/.nav-collapse -->
        </div>
        <!--/.container-fluid -->
      </nav>
<?php
  }
  else {
?>
      <nav class="navbar navbar-inverse navbar-static-top navbar-fixed-top">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar3">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/index.php"><img src="/images/logo6.svg" alt="RECYCLEIt!" height="50px" width="124px">
            </a>
          </div>
          <div id="navbar3" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right" id="menuClick">
              <li><a href="/index.php"><span class="glyphicon glyphicon-home"></span> HOME</a></li>
              <li><a href="/includes/search.php"><span class="glyphicon glyphicon-map-marker"></span> SEARCH</a></li>
              <li><a href="/includes/whyRecycle.php"><span class="glyphicon glyphicon-question-sign"></span> WHY RECYCLE?</a>
              <li><a href="/includes/learn.php"><span class="glyphicon glyphicon-leaf"></span> RECYCLING GUIDE</a></li>
              <li><a href="/includes/contact.php"><span class="glyphicon glyphicon-envelope"></span> CONTACT</a></li>
              <li><a href="/includes/register.php"><span class="glyphicon glyphicon-user"></span> REGISTER</a></li>
              <li><a href="/includes/login.php"><span class="glyphicon glyphicon-log-in"></span> LOGIN</a></li>
            </ul>
          </div>
          <!--/.nav-collapse -->
        </div>
        <!--/.container-fluid -->
      </nav>
<?php } ?>
