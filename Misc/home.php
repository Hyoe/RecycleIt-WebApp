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
  <link rel="icon" type="image/png" href="/images/icon1.png">



<script type="text/javascript" src="http://davidstutz.github.io/bootstrap-multiselect/dist/js/bootstrap-multiselect.js"></script>
<link rel="stylesheet" href="http://davidstutz.github.io/bootstrap-multiselect/dist/css/bootstrap-multiselect.css" type="text/css"/>


</head>

<body>

<!-- Initialize the plugin: -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#mType').multiselect();
    });
</script>

  <!-- Header
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->

  <!-- Primary Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->


  <div class="container-fluid">
    <div class="panel panel-default">
      <div class="panel-heading"><?php echo $_SESSION['recycleitusername']?>'s favorites & comments page</div>
        <div class="table-responsive">
          <table class="table" id="tableAjax">
          <tr>
          <td>
          <select id='mType' multiple='multiple' ><option value='Aluminum'>Aluminum</option><option value='Steel'>Steel</option><option value='Copper'>Copper</option><option value='Plastic'>Plastic</option><option value='Glass'>Glass</option><option value='Paper'>Paper</option><option value='Electronics'>Electronics</option><option value='Household Hazardous Waste'>Household Hazardous Waste</option></select>

          </td>
          </tr>

        </table>
      </div>
    </div>
  </div>



<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>
</html

  <!-- Primary Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->

  <div class="container">
    <div class="row">
      <div class="one-half column" style="margin-top: 2%">
        <h4>Home Page</h4>
        <p></p>
      </div>
    </div>
  </div>

  <!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
