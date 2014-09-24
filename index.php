<?
  // getting requested page
  $page = $_GET['p'];

  // if none is set, go to the user dashboard
  if (!($page)) {
    $page = "dash";
  }

  // getting requested user
  $user = $_GET['u'];

  // if no user is defined in the parameter, set it to myke
  if (!(isset($_COOKIE['tempoAthlete']))) {
    if (!($user)) {
      $user = "myke";
    }

    // setting the user cookie (for access later in JS, etc.)
    setcookie("tempoAthlete", $user, time()+3600000);
    $_COOKIE["tempoAthlete"] = $user;
  }


  // if no user is set, show the splash screen
  if (!(isset($_COOKIE['tempoAthlete']))) {
    # show sales/signup page
    # include 'splash_index.php';
    include '_header.php';
  } else {
    include '_header.php';
    # don't put curly brace here. it's at the bottom of the index. basically saying if a user exists, show the full stuff



?>

<input type="hidden" name="user" value="myke">

<div class="container">
  <? if ($page == "dash") { ?>
    <div class="col-sm-8">

      <!-- bottle
      <div class="row" id="bottle">
        <div class="bottle_top mouth"></div>
        <div class="bottle_top cap"></div>
        <div class="bottle_mid initial">How it works</div>
        <div class="bottle_mid transition"></div>
        <div class="bottle_mid content_one">Proven workouts</div>
        <div class="bottle_mid content_two">Adaptive training plans</div>
        <div class="bottle_mid content_three">Coach intelligence</div>
        <div class="bottle_mid transition"></div>
        <div class="bottle_bot"></div>
      </div>
    -->

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

  <? } else if ($page == "calendar") { ?>

    <div class="col-sm-12">
      <!-- calendar -->
      <div class="row" id="calendar">
        <h3>Calendar of Activities</h3>
        <span class="label label-off">Time Off</span>
        <span class="label label-default">Base Training</span>
        <span class="label label-warning">Sharpening</span>
        <span class="label label-success">Racing Season</span>
        <span class="label label-danger">Peak Week</span>

        <div class="table-responsive">
        <table id="full_schedule" class="table">
          <thead>
            <!--<th>Type</th>-->
            <th>Week</th>
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

  <? } else if ($page == "library") { ?>

    <div class="col-sm-12">
      <!-- workout library -->
      <div class="row" id="library">
        <h3>Workout Library <small></small></h3>
        <p id="library_explanation">The full library of workouts your training plans are based on.</p>
        <ul class="nav nav-tabs" role="tablist">
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
              Workout Type <span class="caret"></span>
            </a>
            <ul class="dropdown-menu" role="menu">
              <li><a class="library_select" id="all" href="#">All</a></li>
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
            </ul>
          </li>
        </ul>
        <div id="workout_library"></div>
      </div>
    </div> <!-- end 12 column -->

  <? } ?>

  <? if (($page == "dash") || ($page == "today")){ ?>
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

<!-- user setup
<div id="setup" class="row">
  <h1>Set Up Your Profile <small>help Chainiac create an ideal training plan for you</small></h1>

  <form class="form-horizontal">
    <div class="control-group">
      <label class="control-label" for="inputName">Full Name</label>
      <div class="controls">
        <input type="text" id="inputName" placeholder="Mykel Nahorniak">
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="inputEmail">Email</label>
      <div class="controls">
        <input type="text" id="inputEmail" placeholder="myname@chainiac.com">
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="inputWeight">Weight (lbs)</label>
      <div class="controls">
        <input type="text" id="inputWeight" placeholder="145">
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="inputPeak">Peak Week <a href="#" rel="tooltip" title="During the year, what week is your 'A' race, or when would you like to peak? Weeks run from 1-53">?</a></label>
      <div class="controls">
        <input type="text" id="inputPeak" placeholder="26">
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="inputTime">Hours per week available <a href="#" rel="tooltip" title="How many hours per week do you think you can dedicate to training?">?</a></label>
      <div class="controls">
        <input type="text" id="inputTime" placeholder="8">
      </div>
    </div>
    <div class="control-group">
      <div class="controls">
        <label class="checkbox">
          <input type="checkbox" id="havepowermeter"> I have a power meter <a href="#" rel="tooltip" title="PowerTap, Quarq, etc.">?</a>
        </label>
      </div>
    </div>
-->
  <!-- power test results -->
  <!-- make it so these can dynamically pop up when needed
  <div id="powerbests">
    <div class="control-group" id="s5">
      <label class="control-label" for="input5s">5-Second Power</label>
      <div class="controls">
        <input type="text" id="input5s" placeholder="1390">
      </div>
    </div>
    <div class="control-group" id="m1">
      <label class="control-label" for="input1m">1-Minute Power</label>
      <div class="controls">
        <input type="text" id="input1m" placeholder="550">
      </div>
    </div>
    <div class="control-group" id="m5">
      <label class="control-label" for="input5m">5-Minute Power</label>
      <div class="controls">
        <input type="text" id="input5m" placeholder="380">
      </div>
    </div>
    <div class="control-group" id="m20">
      <label class="control-label" for="input20m">20-Minute Power</label>
      <div class="controls">
        <input type="text" id="input20m" placeholder="290">
      </div>
    </div>
  </div>

    <button type="submit" class="btn">Create my training plan</button>

  </form>

</div>
-->


<? include '_footer.php'; ?>
<? } ?>
