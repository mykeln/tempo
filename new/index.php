<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Get faster, quicker</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Override -->
    <link href="css/base.css" rel="stylesheet">

    <!-- form stuff -->
    <link rel="stylesheet" type="text/css" href="css/component.css" />

    <script src="js/modernizr.custom.js"></script>


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
            <li class="active"><a href="#">Dashboard</a></li>
            <li><a href="#about">Today</a></li>
            <li><a href="#about">Calendar</a></li>
            <li><a href="#contact">Library</a></li>

          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Me <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li class="dropdown-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>
            <li class="upload_button"><button type="button" class="btn btn-sm btn-success">Upload Ride</button></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>


    <div class="container">
      <div class="col-sm-8">

      <div class="row">
        <ol class="breadcrumb">
          <li><a href="#">Home</a></li>
          <li class="active">Dashboard</li>
        </ol>
      </div>
      <div class="row">
        <!-- goal -->
        <h3>This Week's Goal</h3>
        <div class="progress progress-striped">
          <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"><span class="sr-only">80% Complete</span></div>
        </div>
      </div>

      <div class="row">
        <!-- today's workout -->
        <h3>Today's Workout</h3>
        <span class="label label-info">2014 season, week 18</span><h4>VO2 - 3 minutes / 90 minutes</h4>
        <div id="14" class="activity" style="display: block;"><h6>Warm Up</h6><p>5 x 1 minute of high cadence pedaling and 1 x 5 minutes of high threshold effort.</p><h6>Workout</h6><p>Complete 7 x 3 minutes in your VO2max zone with 3 minutes of recovery in between each effort. These are hard. Go as hard as you can and still finish the 3 minutes each time.</p><h6 class="activity_info">Racing Season Maintenance</h6><p>If you felt weak responding to attacks, do AC work. If you felt like you had nothing left at the end do VO2 and tempo. This choice will be automated in the future.</p><h6>Cool Down</h6><p>Easy spinning for 15 minutes. 100+ cadence</p></div>
      </div>





        </div>

        <div class="col-sm-4">

        <!-- help box -->
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title">Help</h3>
            </div>
            <div class="panel-body">
              Help One
            </div>
          </div>

          <!-- ride feed -->
          <div class="list-group">
            <a href="#" class="list-group-item list-group-item-success" title="Completed">
              <p class="list-group-item-status">COMPLETED</p>
              <h4 class="list-group-item-heading">AC - 10x30s</h4>
              <p class="list-group-item-text">NORM: 254w. ACC: 85%</p>
            </a>
            <a href="#" class="list-group-item list-group-item-success" title="Completed">
              <p>COMPLETED</p>
              <h4 class="list-group-item-heading">List group item heading</h4>
              <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
            </a>
            <a href="#" class="list-group-item list-group-item-warning" title="Not Complete">
              <h4 class="list-group-item-heading">List group item heading</h4>
              <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
            </a>
          </div>

        </div>
      </div>





<!--
        <form id="theForm" class="simform" autocomplete="off">
          <div class="simform-inner">
            <ol class="questions">
              <li>
                <span><label for="q1">What's your full name?</label></span>
                <input id="q1" name="q1" type="text"/>
              </li>
              <li>
                <span><label for="q2">What's your weight?</label></span>
                <input id="q2" name="q2" type="text"/>
              </li>
              <li>
                <span><label for="q3">What's your email address?</label></span>
                <input id="q3" name="q3" type="email"/>
              </li>
            </ol>
            <button class="submit" type="submit">Send answers</button>
            <div class="controls">
              <button class="next"></button>
              <div class="progress"></div>
              <span class="number">
                <span class="number-current"></span>
                <span class="number-total"></span>
              </span>
              <span class="error-message"></span>
            </div>
          </div>
          <span class="final-message"></span>
        </form>
-->








    </div> <!-- /container -->


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

    <script src="js/classie.js"></script>
    <script src="js/stepsForm.js"></script>
    <script>
      var theForm = document.getElementById( 'theForm' );

      new stepsForm( theForm, {
        onSubmit : function( form ) {
          // hide form
          classie.addClass( theForm.querySelector( '.simform-inner' ), 'hide' );

          /*
          form.submit()
          or
          AJAX request (maybe show loading indicator while we don't have an answer..)
          */

          // let's just simulate something...
          var messageEl = theForm.querySelector( '.final-message' );
          messageEl.innerHTML = 'Thank you! We\'ll be in touch.';
          classie.addClass( messageEl, 'show' );
        }
      } );
    </script>
  </body>
</html>