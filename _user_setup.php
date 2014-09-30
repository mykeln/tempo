<div class="container">
  <div class="col-sm-6">
    <!-- user setup -->
    <h2>Sign Up</h2>

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

      <!-- power test results -->
      <!-- make it so these can dynamically pop up when needed-->
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
      <button type="submit" class="btn">Build My Plan</button>
    </form>
  </div>
  <div class="col-sm-6">
    <h2>Sign In</h2>
    <form class="form-horizontal" name="signin" action="?p=sign_in" method="post">
      <div class="control-group">
        <label class="control-label" for="inviteCode">Invite Code</label>
        <div class="controls">
          <input type="text" id="inviteCode" name="inviteCode" placeholder="myke">
        </div>
      </div>
      <button type="submit" class="btn">Sign In</button>

    </form>

  </div>
</div>