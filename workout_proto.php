<!doctype html>
<html class="no-js" lang="en" manifest='cache.appcache'>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <link href='http://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">

  <!-- scripts -->
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

  <style type="text/css">
  .workout {
    float: left;
    border-left: 10px solid #222;
    border-right: 10px solid #222;
    margin-bottom: 40px;
  }

  h3,
  h4,
  h5,
  h6 {
    text-transform: uppercase;
    padding: 0;
    margin: 0;
    color: #efefef;
  }

  h3 {
    font: 200 80px/83px sans-serif;
  }

  h4,
  h5 {
    font: 100 20px/23px sans-serif;
  }

  h6 {
    font: 200 20px/43px sans-serif;
  }

  .int {
    width: 200px;
    height: 200px;
    background: #222;
    float: left;
    margin: 0px 10px 0px 0px;
    padding: 20px;
  }

    .int.on h5 {
      color: #A7FF92;
    }

    .int.off h5 {
      color: #FF7F7F;
    }

    .int.rest h5 {
      color: #3ea6e0;
    }

    .int h6 {
      color: #fffcab;
    }

  .math {
    font: bold 40px/200px sans-serif;
    height: 200px;
    float: left;
    color: #222;
    margin: 0px 10px 0px 0px;
  }

  .workout {
    background-color: #ccc;
    padding: 40px;
    overflow: hidden;
  }

  .row.hard,
  .row.easy {
    height: 200px;
  }

  .row.break {
    font: bold 40px/100px sans-serif;
    color: #222;
    background: #ccc;
  }

  .row.set_count {
    margin-top: 190px;

  }

  </style>
</head>
<body>


<!-- content test - sprint intervals -->
<h1>Sprint Intervals</h1>
<div class="workout">
  <div class="row hard">
    <div class="int on">
      <h3>20</h3>
      <h4>secs</h4>
      <h5>on</h5>
      <h6>1200w</h6>
    </div>
    <div class="math">
      +
    </div>
    <div class="int off">
      <h3>20</h3>
      <h4>secs</h4>
      <h5>off</h5>
      <h6>120w</h6>
    </div>
    <div class="math">
      &times;
    </div>
    <div class="int reps">
      <h3>3</h3>
      <h4>reps</h4>
    </div>
  </div>

  <div class="row break">
  +
  </div>

  <div class="row easy">
    <div class="int rest">
      <h3>5</h3>
      <h4>mins</h4>
      <h5>rest</h5>
      <h6>between sets</h6>
    </div>
  </div>
</div>

<div class="row set_count">
  <div class="math">
    &times;
  </div>
  <div class="int rest">
    <h3>3</h3>
    <h4>sets</h4>
  </div>
</div>











<!-- content test - sprint intervals -->
<h1>AC - 30s + 45s + 60s</h1>
<div class="workout">
  <div class="row hard">
    <div class="int on">
      <h3>30</h3>
      <h4>secs</h4>
      <h5>on</h5>
      <h6>480W</h6>
    </div>
  </div>

  <div class="row break">
  +
  </div>

  <div class="row easy">
    <div class="int rest">
      <h3>5</h3>
      <h4>mins</h4>
      <h5>rest</h5>
      <h6>between sets</h6>
    </div>
  </div>
</div>

<div class="row set_count">
  <div class="math">
    &times;
  </div>
  <div class="int rest">
    <h3>3</h3>
    <h4>sets</h4>
  </div>
</div>

<div class="workout">
  <div class="row hard">
    <div class="int on">
      <h3>45</h3>
      <h4>secs</h4>
      <h5>on</h5>
      <h6>500W</h6>
    </div>
  </div>

  <div class="row break">
  +
  </div>

  <div class="row easy">
    <div class="int rest">
      <h3>5</h3>
      <h4>mins</h4>
      <h5>rest</h5>
      <h6>between sets</h6>
    </div>
  </div>
</div>

<div class="row set_count">
  <div class="math">
    &times;
  </div>
  <div class="int rest">
    <h3>3</h3>
    <h4>sets</h4>
  </div>
</div>

<div class="workout">
  <div class="row hard">
    <div class="int on">
      <h3>60</h3>
      <h4>secs</h4>
      <h5>on</h5>
      <h6>550W</h6>
    </div>
  </div>

  <div class="row break">
  +
  </div>

  <div class="row easy">
    <div class="int rest">
      <h3>5</h3>
      <h4>mins</h4>
      <h5>rest</h5>
      <h6>between sets</h6>
    </div>
  </div>
</div>

<div class="row set_count">
  <div class="math">
    &times;
  </div>
  <div class="int rest">
    <h3>3</h3>
    <h4>sets</h4>
  </div>
</div>

</body>
</html>
