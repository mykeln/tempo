<!doctype html>
<html class="no-js" lang="en" manifest='cache.appcache'>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>Tempo</title>
  <meta name="description" content="Tempo is made for cyclists who use power meters. It's an automated coach designed to use your power data as a guide to minimize weaknesses while keeping strengths at their peak. Workouts are created on the fly and take seasonality, your power profile, and other factors into account.">
  <meta name="author" content="Mykel Nahorniak">

  <!-- display defaults -->
  <meta name="viewport" id="vp" content="initial-scale=1.0,user-scalable=no,maximum-scale=1" media="(device-height: 568px)" />
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <meta name="apple-mobile-web-app-status-bar-style" content="black" />

  <!-- icons -->
  <link rel="shortcut icon" href="touch-icon-iphone.png">

  <!-- splashes -->
  <!-- iPhone -->
  <link rel="apple-touch-icon-precomposed" href="touch-icon-iphone.png" />
  <link href="Default.png" media="(device-width: 320px) and (device-height: 480px) and (-webkit-device-pixel-ratio: 1)" rel="apple-touch-startup-image">

  <!-- iPhone (Retina) -->
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="touch-icon-iphone4.png" />
  <link href="Default@2x.png" media="(device-width: 320px) and (device-height: 480px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image">

  <!-- iPhone 5 -->
  <link href="Default5@2x.png" media="(device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image">

  <!-- iPad -->
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="touch-icon-ipad.png" />
  <link href="DefaultiPadPortrait.png" media="(device-width: 768px) and (device-height: 1024px) and (orientation: portrait) and (-webkit-device-pixel-ratio: 1)" rel="apple-touch-startup-image">
  <link href="DefaultiPadLandscape.png" media="(device-width: 768px) and (device-height: 1024px) and (orientation: landscape) and (-webkit-device-pixel-ratio: 1)" rel="apple-touch-startup-image">

  <!-- iPad (Retina) -->
  <!--<link rel="apple-touch-icon-precomposed" sizes="144x144" href="touch-icon-iphone4.png" />-->
  <link href="DefaultiPadPortrait@2x.png" media="(device-width: 768px) and (device-height: 1024px) and (orientation: portrait) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image">
  <link href="DefaultiPadLandscape@2x.png" media="(device-width: 768px) and (device-height: 1024px) and (orientation: landscape) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image">

  <!-- styles -->
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">

  <!-- scripts -->
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
  <script src="js/libs/jquery-1.7.2.min.js"></script>
  <script src="js/libs/date.js"></script>
  <script src="js/libs/jquery.columnmanager.min.js"></script>
  <script src="js/libs/fastclick.js"></script>

  <!-- tempo logic -->
  <script src="js/script.js"></script>

  <!-- hacks for faster responsiveness on mobile -->
  <script type="text/javascript">
    window.addEventListener('load', function() {
      new FastClick(document.body);
    }, false);

    $(function(){
      if ( ("standalone" in window.navigator) && !window.navigator.standalone ) {
        $(".container").toggle();
        $("#homescreen_note").toggle();
      }
    });
  </script>
</head>
<body>
<div class="container">

  <!-- user setup
  <div id="setup" class="row">
    <h1>Set Up Your Profile <small>help Tempo create an ideal training plan for you</small></h1>

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
          <input type="text" id="inputEmail" placeholder="myname@tempoemail.com">
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

  <!-- today's workout -->
  <div id="workout" class="row">
    <h1>TEMPO <badge>WEEK 23</badge></h1>
  </div>

  <div class="row">
    <a id="thisyearonly" class="btn btn-default btn-xs" href="">toggle previous years</a>
  </div>

  <!-- calendar -->
  <div id="calendar" class="row">
    <h2>Calendar <small>workout history</small></h2>

    <span class="label label-default">Chill</span>
    <span class="label label-warning">Sharpening</span>
    <span class="label label-success">Racing Season</span>
    <span class="label label-danger">Peak Week</span>

    <div class="table-responsive">
    <table id="full_schedule" class="table">
      <thead>
        <th>Type</th>
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


  <!-- workout library -->
  <div id="library" class="row">
    <h2>Workout Library</h2>

    <p id="library_explanation">Lots of workouts to show. Tap the toggle button below to read the full library.</p>

    <div id="workout_library">

    </div>

  </div>

  <div class="row">
    <a id="full_library" class="btn btn-default btn-xs" href="">toggle full library</a>
  </div>


  <!-- fitness -->
  <div id="fitness" class="row">
    <h2>Fitness <small id="athlete_name"></small></h2>

    <div class="span6 table-responsive">
      <h3>Power Profile</h3>
      <table class="table table-striped">
        <thead>
          <th>Interval</th>
          <th>Power</th>
          <th>w/Kg</th>
        </thead>
        <tbody id="profile">

        </tbody>
      </table>
    </div>

    <div class="span6 table-responsive">
      <h3>Power Class</h3>
      <table class="table table-condensed">
        <thead>
          <th>Class</th>
          <th>5s</th>
          <th>1m</th>
          <th>5m</th>
          <th>20m</th>
        </thead>
        <tbody id="powerclass">
          <tr><td>World Class</td><td>23.50</td><td>11.50</td><td>7.80</td><td>6.66</td></tr>
          <tr><td>World Class</td><td>23.16</td><td>11.35</td><td>7.67</td><td>6.54</td></tr>
          <tr><td>World Class</td><td>22.82</td><td>11.20</td><td>7.52</td><td>6.42</td></tr>
          <tr><td>World Class</td><td>22.48</td><td>11.05</td><td>7.38</td><td>6.30</td></tr>
          <tr><td>World Class / Div I/II Pro</td><td>22.14</td><td>10.90</td><td>7.24</td><td>6.18</td></tr>
          <tr><td>World Class / Div I/II Pro</td><td>21.80</td><td>10.75</td><td>7.10</td><td>6.06</td></tr>
          <tr><td>World Class / Div I/II Pro</td><td>21.46</td><td>10.60</td><td>6.96</td><td>5.94</td></tr>
          <tr><td>World Class / Div I/II Pro</td><td>21.12</td><td>10.45</td><td>6.82</td><td>5.82</td></tr>
          <tr><td><b>World Class / Div I/II Pro / Div III Pro</b></td><td>20.78</td><td>10.30</td><td>6.68</td><td>5.70</td></tr>
          <tr><td>Div I/II Pro / Div III Pro</td><td>20.44</td><td>10.15</td><td>6.54</td><td>5.58</td></tr>
          <tr><td>Div I/II Pro / Div III Pro</td><td>20.10</td><td>10.00</td><td>6.40</td><td>5.46</td></tr>
          <tr><td>Div I/II Pro / Div III Pro</td><td>19.76</td><td>9.85</td><td>6.26</td><td>5.34</td></tr>
          <tr><td><b>Div I/II Pro / Div III Pro / CAT1</b></td><td>19.42</td><td>9.70</td><td>6.12</td><td>5.22</td></tr>
          <tr><td>Div III Pro / CAT1</td><td>19.08</td><td>9.55</td><td>5.98</td><td>5.10</td></tr>
          <tr><td>Div III Pro / CAT1</td><td>18.74</td><td>9.40</td><td>5.84</td><td>4.98</td></tr>
          <tr><td>Div III Pro / CAT1</td><td>18.40</td><td>9.25</td><td>5.70</td><td>4.86</td></tr>
          <tr><td><b>Div III Pro / CAT1 / CAT2</b></td><td>18.06</td><td>9.10</td><td>5.56</td><td>4.74</td></tr>
          <tr><td>CAT1 / CAT2</td><td>17.72</td><td>8.95</td><td>5.42</td><td>4.62</td></tr>
          <tr><td>CAT1 / CAT2</td><td>17.38</td><td>8.80</td><td>5.28</td><td>4.50</td></tr>
          <tr><td>CAT1 / CAT2</td><td>17.04</td><td>8.65</td><td>5.14</td><td>4.38</td></tr>
          <tr><td><b>CAT1 / CAT2 / CAT3</b></td><td>16.70</td><td>8.50</td><td>5.00</td><td>4.26</td></tr>
          <tr><td>CAT2 / CAT3</td><td>16.36</td><td>8.35</td><td>4.86</td><td>4.14</td></tr>
          <tr><td>CAT2 / CAT3</td><td>16.02</td><td>8.20</td><td>4.72</td><td>4.02</td></tr>
          <tr><td>CAT2 / CAT3</td><td>15.68</td><td>8.05</td><td>4.58</td><td>3.90</td></tr>
          <tr><td><b>CAT2 / CAT3 / CAT4</b></td><td>15.34</td><td>7.90</td><td>4.44</td><td>3.78</td></tr>
          <tr><td>CAT3 / CAT4</td><td>15.00</td><td>7.75</td><td>4.30</td><td>3.66</td></tr>
          <tr><td>CAT3 / CAT4</td><td>14.66</td><td>7.60</td><td>4.16</td><td>3.54</td></tr>
          <tr><td>CAT3 / CAT4</td><td>14.32</td><td>7.45</td><td>4.02</td><td>3.42</td></tr>
          <tr><td><b>CAT3 / CAT4 / CAT5</b></td><td>13.98</td><td>7.30</td><td>3.88</td><td>3.30</td></tr>
          <tr><td>CAT4 / CAT5</td><td>13.64</td><td>7.15</td><td>3.74</td><td>3.18</td></tr>
          <tr><td>CAT4 / CAT5</td><td>13.30</td><td>7.00</td><td>3.60</td><td>3.06</td></tr>
          <tr><td>CAT4 / CAT5</td><td>12.96</td><td>6.85</td><td>3.44</td><td>2.94</td></tr>
          <tr><td><b>CAT4 / CAT5</b></td><td>12.62</td><td>6.70</td><td>3.30</td><td>2.82</td></tr>
          <tr><td>CAT5</td><td>12.28</td><td>6.55</td><td>3.16</td><td>2.70</td></tr>
          <tr><td>CAT5</td><td>11.94</td><td>6.40</td><td>3.02</td><td>2.58</td></tr>
          <tr><td>CAT5</td><td>11.60</td><td>6.25</td><td>2.88</td><td>2.46</td></tr>
          <tr><td><b>CAT5</b></td><td>11.26</td><td>6.10</td><td>2.74</td><td>2.34</td></tr>
        </tbody>
      </table>
    </div>
  </div>
</div> <!-- /container -->

<div id="homescreen_note">
  <div id="workout" class="row">
    <h1>Tempo <small>for competitive cyclists</small></h1>
  </div>

  <h2><span><b>Tempo</b> is made for cyclists who use power meters. It's an automated coach designed to use your power data as a guide to minimize weaknesses while keeping strengths at their peak. Workouts are created on the fly and take seasonality, your power profile, and other factors into account.</span></h2>

  <div id="homescreen_bottom">
    <h3>Add Tempo to your home screen</h3>
    <p>&darr;</p>
  </div>
</div>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-39725016-1', 'herokuapp.com');
  ga('send', 'pageview');

</script>

</body>
</html>
