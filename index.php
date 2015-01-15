<?php
define( "TEMPO_MAIN_PROGRAM", true );
#echo "fixme: api calls to db on prod aren't returning any data, but no errors";

include( '_functions.php' );

$base_url = getCurrentUri();
$routes = array();
$routes = explode('/', $base_url);
foreach($routes as $route) {
    if(trim($route) != '') {
        array_push($routes, $route);
    }
}

# what are we doing?
switch( $routes[1] ) {
    case "api":
        include( "_api.php" );
        exit;
        break;

    case "logout":
        $user = new Chainiac_User($db);
        $user->stopSession();
        $page = "dash";
        break;

    case "sign_in":
        sign_in(
            trim(strip_tags($_POST['inputEmail'])),
            $_POST['inputPassword']
        );
        break;

    case "sign_up":
        //FIXME: check for proper email
        $data = array(
            "inputName" => trim(strip_tags(ucwords($_POST['inputName']))),
            "inputEmail" => trim(strip_tags($_POST['inputEmail'])),
            "inputPassword" => $_POST['inputPassword'],
            "inputWeight" => trim(strip_tags($_POST['inputWeight'])),
            "input5s" => trim(strip_tags($_POST['input5s'])),
            "input1m" => trim(strip_tags($_POST['input1m'])),
            "input5m" => trim(strip_tags($_POST['input5m'])),
            "input20m" => trim(strip_tags($_POST['input20m']))
        );

        // validation check #1: are all fields filled out?
        $count_empty = 0;
        foreach( $data as $k => $v ) {
            if( strlen($v) == 0 ) $count_empty++;
        }
        if( $count_empty > 0 ) {
            echo "You didn't fill something out";
            die;
        }

        // validation check #2: does this user exist already?
        $user = new Chainiac_User($db);
        $user->getInfo($data["inputEmail"]);

        if( !empty($user->info) ) {
            die( "This athlete already has an account" );
        }

        // so far so good, proceed
        //$key = Chainiac_User::generateApiKey();
        $try_creating = $user->registerAccount($data);
        if( $try_creating === false ) {
            echo "Error, could not create account :/";
            die;
        }

        // log user in
        $user->startSession();

        header("Location:" . TEMPO_URL . "/dash");

        break;

    case "update_user":
        //FIXME: check for proper email
        $data = array(
            "inputName" => trim(strip_tags(ucwords($_POST['inputName']))),
            "inputEmail" => trim(strip_tags($_POST['inputEmail'])),
            "inputWeight" => trim(strip_tags($_POST['inputWeight'])),
            "input5s" => trim(strip_tags($_POST['input5s'])),
            "input1m" => trim(strip_tags($_POST['input1m'])),
            "input5m" => trim(strip_tags($_POST['input5m'])),
            "input20m" => trim(strip_tags($_POST['input20m']))
        );

        // validation check #1: are all fields filled out?
        $count_empty = 0;
        foreach( $data as $k => $v ) {
            if( strlen($v) == 0 ) $count_empty++;
        }
        if( $count_empty > 0 ) {
            echo "You didn't fill something out";
            die;
        }

        // validation check #2: does this user exist already?
        $user = new Chainiac_User($db);
        $user->getInfo($data["inputEmail"]);

        if( !empty($user->info) ) {
            die( "This athlete already has an account" );
        }

        // so far so good, proceed
        //$key = Chainiac_User::generateApiKey();
        $try_creating = $user->registerAccount($data);
        if( $try_creating === false ) {
            echo "Error, could not create account :/";
            die;
        }

        // log user in
        $user->startSession();

        header("Location:" . TEMPO_URL . "/dash");
        break;
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

  <? } else if ($routes[1] == "account") { ?>

    <div class="col-sm-4">
      <!-- account settings -->
      <div class="row" id="account">
        <h3>Your Account</h3>
        <p id="library_explanation">Edit your account information and profile data.</p>

        <form class="form-horizontal" id="update_user_form" name="update_user" action="<? echo TEMPO_URL ?>/update_user" method="post">
          <? require ('_user_form.php'); ?>
          <button type="submit" id="signup_form_submit" class="btn btn-primary pull-right">Update My Profile</button>
        </form>
      </div>
    </div>

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
