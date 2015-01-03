<?
  include '_functions.php';

  $base_url = getCurrentUri();
  $routes = array();
  $routes = explode('/', $base_url);
  foreach($routes as $route) {
    if(trim($route) != '') {
      array_push($routes, $route);
    }
  }

  if ($routes[1] == "api") {
    include '_api.php';
    exit;
  }

  // if requesting to switch the user, delete the cookie, then set the page to dash
  if ($routes[1] == "logout") {
    setcookie('tempoAthlete', '', time() - 4600000, "/");
    unset($_COOKIE["tempoAthlete"]);

    $page = "dash";
  }

  if($routes[1] == "sign_in") {
    $inputEmail = trim(strip_tags($_POST['inputEmail']));
    $inputPassword  = sha1(sha1($_POST['inputPassword']).sha1($config['salt']));

    sign_in($inputEmail,$inputPassword);
  }

  if($routes[1] == "sign_up") {
    $inputName      = trim(strip_tags($_POST['inputName']));

    //TODO: check for proper email
    $inputEmail     = trim(strip_tags($_POST['inputEmail']));

    // if user doesn't already exist
    $result = db_query("SELECT `email` FROM `athletes` WHERE email='" . $inputEmail . "'");
    if(!(mysqli_num_rows($result))) {

      // password handling
      $inputPassword = sha1(sha1($_POST['inputPassword']).sha1($config['salt']));

      // double check that all these are just numbers
      // strip out any non-ints
      $inputWeight   = trim(strip_tags($_POST['inputWeight']));
      $input5s  = trim(strip_tags($_POST['input5s']));
      $input1m  = trim(strip_tags($_POST['input1m']));
      $input5m  = trim(strip_tags($_POST['input5m']));
      $input20m = trim(strip_tags($_POST['input20m']));

      if (!empty($inputName)&&
        !empty($inputEmail) &&
        !empty($inputPassword) &&
        !empty($inputWeight) &&
        !empty($input5s) &&
        !empty($input1m) &&
        !empty($input5m) &&
        !empty($input20m)) {

        // generate user's API key
        $key = generateApiKey();

        // An insertion query. $result will be `true` if successful
        $result = db_query("INSERT INTO athletes VALUES('',NOW(),NOW(),'$inputEmail','$inputPassword','$key','$inputName',$inputWeight,000,$input5s,000,$input1m,$input5m,000,$input20m,000);");
        if($result === false) {
            echo 'There was an error creating the your profile.';
        } else {
          sign_in($inputEmail,$inputPassword);
        }
      } else { // if some values were empty
        echo "You didn't fill something out";
      }
    } else { // if user already exists
      echo "This athlete already has an account";
    }
  }

  // if no user cookie is set, show the splash screen
  if (!(isset($_COOKIE['tempoAthlete']))) {
    # show sales/signup page
    include '_header.php';
    include '_user_setup.php';
  } else {
    include '_header.php';
    include '_breadcrumb.php';
    # don't put curly brace here. it's at the bottom of the index. basically saying if a user exists, show the full stuff


    // if no route is set, go to the user dashboard
    if($routes[1] == "") {
      $routes[1] = "dash";
    }

?>

<div class="container">
  <? if ($routes[1] == "dash") { ?>
    <div class="col-sm-8">
      <!-- this week's progress -->
      <div class="row" id="progress">
        <h3>This Week's Progress</h3>
        <div class="progress progress-striped">
          <div id="week_progress" class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"><span class="sr-only">80% Complete</span></div>
        </div>
      </div>

      <!-- today's workout -->
      <div class="row" id="workout">
        <h3>Today's Workout</h3>
      </div>
      <!--
      <div class="row">
        <a id="thisyearonly" class="btn btn-default btn-xs" href="">toggle previous years</a>
      </div>-->

      <!-- fitness -->
      <div class="row" id="fitness">
        <h3>Fitness Profile</h3>
        <div id="score">

        </div>
      </div>
    </div> <!-- end 8 column -->

  <? } else if ($routes[1] == "calendar") { ?>
    <script type="text/javascript">


    </script>

    <div class="col-sm-12">
      <!-- calendar -->
      <div class="row" id="calendar">
        <h3>This Week's Schedule</h3>
        <h5>Week </h5>
        <span class="label label-off">Time Off</span>
        <span class="label label-default">Base Training</span>
        <span class="label label-warning">Sharpening</span>
        <span class="label label-success">Racing Season</span>
        <span class="label label-danger">Peak Week</span>

        <div class="table-responsive">
        <table id="full_schedule" class="table">
          <thead>
            <th>Year</th>
            <th>Mon</th>
            <th>Tue</th>
            <th>Wed</th>
            <th>Thu</th>
            <th>Fri</th>
            <th>Sat</th>
            <th>Sun</th>
          </thead>
          <tbody id="schedules">

          </tbody>
        </table>
        </div>
      </div>
      <div class="row">
        <a id="thisweekonly" class="btn btn-default btn-xs" href="">toggle full calendar</a>
      </div>
    </div> <!-- end 12 column -->

  <? } else if ($routes[1] == "library") { ?>

    <div class="col-sm-12">
      <!-- workout library -->
      <div class="row" id="library">
        <h3>Workout Library <small></small></h3>
        <p id="library_explanation">The full library of workouts your training plans are based on.</p>

        <!-- library filter -->
        <div id="library_filter" class="btn-group">
          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
            Filter <span class="caret"></span>
          </button>
          <ul class="dropdown-menu" role="menu">
            <li><a class="library_select" id="all" href="#">Show All</a></li>
            <li class="divider"></li>
            <li><a class="library_select" id="easy" href="#">Z1 - Active Recovery</a></li>
            <li><a class="library_select" id="endurance" href="#">Z2 - Endurance</a></li>
            <li><a class="library_select" id="tempo" href="#">Z3 - Tempo</a></li>
            <li><a class="library_select" id="ftp sweetspot" href="#">Z4 - Lactate Threshold (FTP)</a></li>
            <li><a class="library_select" id="vo2" href="#">Z5 - VO2 Max</a></li>
            <li><a class="library_select" id="ac bursts" href="#">Z6 - Anaerobic Capacity (AC)</a></li>
            <li><a class="library_select" id="sprints " href="#">Z7 - Neuromuscular Power (Sprints)</a></li>
            <li><a class="library_select" id="race" href="#">Race</a></li>
            <li><a class="library_select" id="test" href="#">Power Tests</a></li>
            <li><a class="library_select" id="strength" href="#">Weights</a></li>
            <li><a class="library_select" id="run" href="#">Running</a></li>
            <li><a class="library_select" id="misc stretch" href="#">Misc</a></li>
            <li class="divider"></li>
            <li><a class="duration_select" data-duration="30" href="#"><= 30 Minutes</a></li>
            <li><a class="duration_select" data-duration="60" href="#"><= 60 Minutes</a></li>
            <li><a class="duration_select" data-duration="90" href="#"><= 90 Minutes</a></li>
            <li><a class="duration_select" data-duration="120" href="#"><= 120 Minutes</a></li>
            <li><a class="duration_select" data-duration="121" href="#">> 120 Minutes</a></li>
          </ul>
        </div>

        <div id="workout_library"></div>
      </div>
    </div> <!-- end 12 column -->

  <? } ?>

  <? if (($routes[1] == "dash") || ($routes[1] == "today")){ ?>
    <div class="col-sm-4">
      <div class="datepicker"></div>

      <!-- recent activities
      <h4>Recent Activities</h4>
      <div class="list-group">
        <a href="#" class="list-group-item">
        <span class="glyphicon glyphicon-star-empty"></span>
        Easy or Off
        <span class="badge">Friday</span>
        </a>

        <a href="#" class="list-group-item">
        <span class="glyphicon glyphicon-star"></span>
        AC - 1 Minute Intervals
        <span class="badge">Thursday</span>
        </a>

        <a href="#" class="list-group-item">
        <span class="glyphicon glyphicon-star"></span>
        VO2 - 3 Minute Intervals
        <span class="badge">Wednesday</span>
        </a>
      </div>
      -->

      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Feedback</h3>
        </div>
        <div class="panel-body">
          This is alpha software. Please send feedback <a href="https://docs.google.com/a/localist.com/forms/d/1xoRyeMs1LusEplGp7-Dtnr_3sxblo1vsLwW43gmjdHw/viewform">here</a>.</p>
        </div>
      </div>
    </div>
  <? } ?>
</div>

<? include '_footer.php'; ?>
<? } // this is the end of the !(isset($_COOKIE['tempoAthlete']) if ?>
