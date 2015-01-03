<!doctype html>
<html lang="en">
<head>

  <? include '_common_head.php'; ?>

  <!-- form stuff -->
  <link rel="stylesheet" type="text/css" href="css/datepicker3.css" />

  <!-- scripts -->
  <script src="js/modernizr.custom.js"></script>
  <script src="js/libs/date.js"></script>
  <script src="js/libs/jquery.columnmanager.min.js"></script>
  <script src="js/libs/fastclick.js"></script>
  <script src="js/libs/bootstrap-datepicker.js"></script>
  <script src="js/classie.js"></script>

  <!-- chainiac logic -->
  <script src="js/utils.js"></script>
  <script src="js/app.js"></script>


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
        <a class="navbar-brand" href="/">Chainiac</a>
      </div>
      <div class="navbar-collapse collapse">
        <? if (isset($_COOKIE['tempoAthlete'])) { ?>
          <ul class="nav navbar-nav">
            <li <? if ($routes[1] == "dash") { ?>class="active"<? } ?>><a href="/dash">Dashboard</a></li>
            <li <? if ($routes[1] == "calendar") { ?>class="active"<? } ?>><a href="/calendar">Calendar</a></li>
            <li <? if ($routes[1] == "library") { ?>class="active"<? } ?>><a href="/library">Library</a></li>
          </ul>
        <? } ?>
        <ul class="nav navbar-nav navbar-right">
          <? if (isset($_COOKIE['tempoAthlete'])) { ?>
            <li class="dropdown">
              <a href="#" id="athlete-dropdown" class="dropdown-toggle" data-toggle="dropdown">Me <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#">Invite Friends</a></li>
                <li><a href="#">My Profile</a></li>
                <li class="divider"></li>
                <li><a href="#">My Account</a></li>
                <li><a href="#">Settings</a></li>
                <li><a href="/logout">Logout</a></li>
              </ul>
            </li>
          <? } else { ?>
            <li><a href="/sign_up">Sign Up</a></li>
            <li><a href="/sign_in">Sign In</a></li>
          <? } ?>
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </div>
  <div id="content">
