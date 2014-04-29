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
      <div class="row">
        <div class="col-sm-8">
        <h1>Join Welluride</h1>
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
            </ol><!-- /questions -->
            <button class="submit" type="submit">Send answers</button>
            <div class="controls">
              <button class="next"></button>
              <div class="progress"></div>
              <span class="number">
                <span class="number-current"></span>
                <span class="number-total"></span>
              </span>
              <span class="error-message"></span>
            </div><!-- / controls -->
          </div><!-- /simform-inner -->
          <span class="final-message"></span>
        </form><!-- /simform -->



        </div>

        <div class="col-sm-4">

        <h4>This Week's Goal</h4>
        <div class="progress">
          <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"><span class="sr-only">60% Complete</span></div>
        </div>

          <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title">Help</h3>
            </div>
            <div class="panel-body">
              Help One
            </div>
          </div>

          <div class="list-group">
            <a href="#" class="list-group-item">
              <h4 class="list-group-item-heading">AC - 10x30s</h4>
              <p class="list-group-item-text">NORM: 254w. ACC: 85%</p>
            </a>
            <a href="#" class="list-group-item">
              <h4 class="list-group-item-heading">List group item heading</h4>
              <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
            </a>
            <a href="#" class="list-group-item">
              <h4 class="list-group-item-heading">List group item heading</h4>
              <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
            </a>
          </div>

        </div>
      </div>

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