<?php include '_header.php'; ?>

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
  <h1>Today's Workout <small id="week_num"></small><small></h1>

</div>
<a id="thisyearonly" href="">previous years</a>

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

  <a id="thisweekonly" class="btn btn-mini" href="">workout history</a>


</div>

<hr class="soften">


<!-- fitness -->
<div id="fitness" class="row">
  <h1>Fitness <small>current fitness level for <b id="athlete_name"></b></small></h1>

  <div class="span6">
    <h3>Power Profile <a href="#" rel="tooltip" title="based on your entered weight">?</a></h3>
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

<? include '_footer.php'; ?>
