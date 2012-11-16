<?php include '_header.php'; ?>


<!-- Main hero unit for a primary marketing message or call to action
<div class="alert alert-info">
  <b>Tempo</b> looks at historical workout data and extrapolates to determine future workouts. The goal is to achieve 90% of what a coach does. The inherent flaw: dynamically changing plans based on results.
</div>
-->


<!-- today's workout -->
<div id="workout" class="row">
  <h1>Today's Workout <small id="week_num"></small></h1>
<a id="thisyearonly" class="btn btn-mini" href="">previous years</a>
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
  <a id="thisweekonly" class="btn btn-mini" href="">workout history</a>
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

  <div class="span6">
    <h3>Power Profile <a href="#" rel="tooltip" title="based on 145lbs (65.77kg)">?</a></h3>
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

  <div class="span6">
    <h3>Power Class <a href="#" rel="tooltip" title="based on standard power profile chart by Coggan">?</a></h3>
    <table class="table">
      <thead>
        <th>Class</th>
        <th>5s</th>
        <th>1m</th>
        <th>5m</th>
        <th>20m</th>
      </thead>
      <tbody id="profile">
<tr><td>World Class</td><td>23.50</td><td>11.50</td><td>7.80</td><td>6.66</td></tr>
<tr><td>World Class</td><td>23.16</td><td>11.35</td><td>7.67</td><td>6.54</td></tr>
<tr><td>World Class</td><td>22.82</td><td>11.20</td><td>7.52</td><td>6.42</td></tr>
<tr><td>World Class</td><td>22.48</td><td>11.05</td><td>7.38</td><td>6.30</td></tr>
<tr><td>World Class / Div I/II Pro</td><td>22.14</td><td>10.90</td><td>7.24</td><td>6.18</td></tr>
<tr><td>World Class / Div I/II Pro</td><td>21.80</td><td>10.75</td><td>7.10</td><td>6.06</td></tr>
<tr><td>World Class / Div I/II Pro</td><td>21.46</td><td>10.60</td><td>6.96</td><td>5.94</td></tr>
<tr><td>World Class / Div I/II Pro</td><td>21.12</td><td>10.45</td><td>6.82</td><td>5.82</td></tr>
<tr><td>World Class / Div I/II Pro / Div III Pro</td><td>20.78</td><td>10.30</td><td>6.68</td><td>5.70</td></tr>
<tr><td>Div I/II Pro / Div III Pro</td><td>20.44</td><td>10.15</td><td>6.54</td><td>5.58</td></tr>
<tr><td>Div I/II Pro / Div III Pro</td><td>20.10</td><td>10.00</td><td>6.40</td><td>5.46</td></tr>
<tr><td>Div I/II Pro / Div III Pro</td><td>19.76</td><td>9.85</td><td>6.26</td><td>5.34</td></tr>
<tr><td>Div I/II Pro / Div III Pro / CAT1</td><td>19.42</td><td>9.70</td><td>6.12</td><td>5.22</td></tr>
<tr><td>Div III Pro / CAT1</td><td>19.08</td><td>9.55</td><td>5.98</td><td>5.10</td></tr>
<tr><td>Div III Pro / CAT1</td><td>18.74</td><td>9.40</td><td>5.84</td><td>4.98</td></tr>
<tr><td>Div III Pro / CAT1</td><td>18.40</td><td>9.25</td><td>5.70</td><td>4.86</td></tr>
<tr><td>Div III Pro / CAT1 / CAT2</td><td>18.06</td><td>9.10</td><td>5.56</td><td>4.74</td></tr>
<tr><td>CAT1 / CAT2</td><td>17.72</td><td>8.95</td><td>5.42</td><td>4.62</td></tr>
<tr><td>CAT1 / CAT2</td><td>17.38</td><td>8.80</td><td>5.28</td><td>4.50</td></tr>
<tr><td>CAT1 / CAT2</td><td>17.04</td><td>8.65</td><td>5.14</td><td>4.38</td></tr>
<tr><td>CAT1 / CAT2 / CAT3</td><td>16.70</td><td>8.50</td><td>5.00</td><td>4.26</td></tr>
<tr><td>CAT2 / CAT3</td><td>16.36</td><td>8.35</td><td>4.86</td><td>4.14</td></tr>
<tr><td>CAT2 / CAT3</td><td>16.02</td><td>8.20</td><td>4.72</td><td>4.02</td></tr>
<tr><td>CAT2 / CAT3</td><td>15.68</td><td>8.05</td><td>4.58</td><td>3.90</td></tr>
<tr><td>CAT2 / CAT3 / CAT4</td><td>15.34</td><td>7.90</td><td>4.44</td><td>3.78</td></tr>
<tr><td>CAT3 / CAT4</td><td>15.00</td><td>7.75</td><td>4.30</td><td>3.66</td></tr>
<tr><td>CAT3 / CAT4</td><td>14.66</td><td>7.60</td><td>4.16</td><td>3.54</td></tr>
<tr><td>CAT3 / CAT4</td><td>14.32</td><td>7.45</td><td>4.02</td><td>3.42</td></tr>
<tr><td>CAT3 / CAT4 / CAT5</td><td>13.98</td><td>7.30</td><td>3.88</td><td>3.30</td></tr>
<tr><td>CAT4 / CAT5</td><td>13.64</td><td>7.15</td><td>3.74</td><td>3.18</td></tr>
<tr><td>CAT4 / CAT5</td><td>13.30</td><td>7.00</td><td>3.60</td><td>3.06</td></tr>
<tr><td>CAT4 / CAT5</td><td>12.96</td><td>6.85</td><td>3.44</td><td>2.94</td></tr>
<tr><td>CAT4 / CAT5</td><td>12.62</td><td>6.70</td><td>3.30</td><td>2.82</td></tr>
<tr><td>CAT5</td><td>12.28</td><td>6.55</td><td>3.16</td><td>2.70</td></tr>
<tr><td>CAT5</td><td>11.94</td><td>6.40</td><td>3.02</td><td>2.58</td></tr>
<tr><td>CAT5</td><td>11.60</td><td>6.25</td><td>2.88</td><td>2.46</td></tr>
<tr><td>CAT5</td><td>11.26</td><td>6.10</td><td>2.74</td><td>2.34</td></tr>
      </tbody>
    </table>

  </div>
</div>

<? include '_footer.php'; ?>
