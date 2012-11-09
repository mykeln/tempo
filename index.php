<?php include '_header.php'; ?>


<!-- Main hero unit for a primary marketing message or call to action
<div class="alert alert-info">
  <b>Tempo</b> looks at historical workout data and extrapolates to determine future workouts. The goal is to achieve 90% of what a coach does. The inherent flaw: dynamically changing plans based on results.
</div>
-->


<!-- today's workout -->
<div id="workout" class="row">
  <h1>Today's Workout <small id="week_num"></small></h1>
<a id="thisyearonly" class="btn btn-mini" href="">this year only</a>
</div>


<div class="span12">
  <div class="activities">

  </div>

  <div class="weeks">

  </div>
</div>

<hr class="soften">


<!-- calendar -->
<div id="calendar" class="row">
  <h1>Calendar <small>rundown of workout history at-a-glance</small></h1>
  <a id="thisweekonly" class="btn btn-mini" href="">this week only</a>
  <h3>Weekly Breakdown</h3>

  <span class="label label-offseason">Chill</span>
  <span class="label label-sharpen">Sharpening</span>
  <span class="label label-racing">Racing Season</span>
  <span class="label label-peak">Peak Week(s)</span>
  <span class="label label-base">Base</span>



    <table class="table table-condensed">
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

<hr class="soften">


<!-- fitness -->
<div id="fitness" class="row">
  <h1>Fitness <small>current fitness level for mykel nahorniak</small></h1>

  <h3>Power Profile <a href="#" rel="tooltip" title="based on 145lbs (65.77kg)">?</a></h3>


    <table class="table table-striped" data-table="google-analytics">
      <thead>
        <th>Interval</th>
        <th>Power</th>
        <th>w/Kg
      </thead>
      <tbody>
      <tr id="s1">
        <td>1s</td>
        <td>1502</td>
        <td class="wkg">22.83</td>
      </tr>
      <tr id="s5">
        <td>5s</td>
        <td>1390</td>
        <td class="wkg">21.13</td>
      </tr>
      <tr id="s30">
        <td>30s</td>
        <td>908</td>
        <td class="wkg">13.80</td>
      </tr>
      <tr id="m1">
        <td>1m</td>
        <td>550</td>
        <td class="wkg">8.36</td>
      </tr>
      <tr id="m3">
        <td>3m</td>
        <td>400</td>
        <td class="wkg">6.08</td>
      </tr>
      <tr id="m5">
        <td>5m</td>
        <td>380</td>
        <td class="wkg">5.77</td>
      </tr>
      <tr id="m10">
        <td>10m</td>
        <td>303</td>
        <td class="wkg">4.60</td>
      </tr>
      <tr id="m20">
        <td>20m</td>
        <td>290</td>
        <td class="wkg">4.40</td>
      </tr>
      <tr id="m60">
        <td>FTP</td>
        <td>280</td>
        <td class="wkg">4.25</td>
      <tr>
      <tr id="bp">
        <td>Balance Point</td>
        <td>245</td>
        <td class="wkg">3.72</td>
      </tr>
      </tbody>
    </table>

</div>


<? include '_footer.php'; ?>
