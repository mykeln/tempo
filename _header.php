<?
  // getting requested page
  $page = $_GET['p'];

  // if none is set, go to the user dashboard
  if (!($page)) {
    $page = "dash";
  }
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>Welluride - Get faster, quicker</title>

  <meta name="description" content="Welluride is an automated cycling coach designed to use your power data as a guide to minimize weaknesses while keeping strengths at their peak. Workouts are created on the fly and take seasonality, your power profile, and other factors into account.">
  <meta name="author" content="Mykel Nahorniak">

  <!-- display defaults -->
  <meta name="viewport" id="vp" content="initial-scale=1.0,user-scalable=no,maximum-scale=1" media="(device-height: 568px)" />
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <meta name="apple-mobile-web-app-status-bar-style" content="black" />

  <!-- mobile assets -->
  <? include '_mobile_icons.php' ?>

  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!-- Override -->
  <link href="css/base.css" rel="stylesheet">

  <!-- form stuff -->
  <link rel="stylesheet" type="text/css" href="css/component.css" />
  <link rel="stylesheet" type="text/css" href="css/datepicker3.css" />


   <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

  <!-- scripts -->
  <script src="js/bootstrap.min.js"></script>
  <script src="js/modernizr.custom.js"></script>
  <script src="js/libs/date.js"></script>
  <script src="js/libs/jquery.columnmanager.min.js"></script>
  <script src="js/libs/fastclick.js"></script>
  <script src="js/libs/bootstrap-datepicker.js"></script>
  <script src="js/classie.js"></script>

  <!-- welluride logic -->
  <script src="js/script.js"></script>

  <!-- hacks for faster responsiveness on mobile -->
  <script type="text/javascript">
    window.addEventListener('load', function() {
      new FastClick(document.body);
    }, false);
  </script>

  <!-- hacks to keep links within the app -->
  <script>(function(a,b,c){if(c in b&&b[c]){var d,e=a.location,f=/^(a|html)$/i;a.addEventListener("click",function(a){d=a.target;while(!f.test(d.nodeName))d=d.parentNode;"href"in d&&(d.href.indexOf("http")||~d.href.indexOf(e.host))&&(a.preventDefault(),e.href=d.href)},!1)}})(document,window.navigator,"standalone")</script>


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body>

  <!-- Static navbar -->
  <div class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Welluride</a>
      </div>
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li <? if ($page == "dash") { ?>class="active"<? } ?>><a href="/">Dashboard</a></li>
          <li <? if ($page == "today") { ?>class="active"<? } ?>><a href="/?p=today">Today</a></li>
          <li <? if ($page == "calendar") { ?>class="active"<? } ?>><a href="/?p=calendar">Calendar</a></li>
          <li <? if ($page == "library") { ?>class="active"<? } ?>><a href="/?p=library">Library</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Me <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="#">Invite Friends</a></li>
              <li><a href="#">My Profile</a></li>
              <li class="divider"></li>
              <li><a href="#">My Account</a></li>
              <li><a href="#">Settings</a></li>
            </ul>
          </li>
          <li class="upload_button"><button type="button" class="btn btn-sm btn-success">Upload Ride</button></li>
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </div>
  <div class="container">
    <div class="col-sm-12">
      <div class="row">
        <ol class="breadcrumb">
          <li><a href="/">Home</a></li>
          <li class="active">
            <? if ($page == "dash") { ?>Dashboard<? } ?>
            <? if ($page == "today") { ?>Today<? } ?>
            <? if ($page == "calendar") { ?>Calendar<? } ?>
            <? if ($page == "library") { ?>Library<? } ?>
          </li>

        </ol>
      </div>
    </div>
  </div>
