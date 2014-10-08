<div class="container">
  <div class="col-sm-4">
    <!-- user setup -->
    <div class="row">
      <h2>Sign Up</h2>
      <form class="form-horizontal" id="signup_form" name="signup" action="/sign_up" method="post">
        <div class="form-group">
          <label class="control-label" for="inputName">Full Name</label>
          <div class="controls">
            <input class="form-control" type="text" name="inputName" id="inputName">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label" for="inputEmail">Email</label>
          <div class="controls">
            <input class="form-control" type="email" name="inputEmail" id="inputEmail">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label" for="inputPassword">Password</label>
          <div class="controls">
            <input class="form-control" type="text" name="inputPassword" id="inputPassword">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label" for="inputWeight">Weight (lbs)</label>
          <div class="controls">
            <input class="form-control" type="text" name="inputWeight" id="inputWeight" maxlength="3" placeholder="145">
          </div>
        </div>
        <!-- power test results -->
        <!-- make it so these can dynamically pop up when needed-->
        <div class="form-group" id="s5">
          <label class="control-label" for="input5s">5-Second Power</label>
          <div class="controls">
            <input class="form-control" type="text" name="input5s" id="input5s" maxlength="4" placeholder="1390">
          </div>
        </div>
        <div class="form-group" id="m1">
          <label class="control-label" for="input1m">1-Minute Power</label>
          <div class="controls">
            <input class="form-control" type="text" name="input1m" id="input1m" maxlength="3" placeholder="550">
          </div>
        </div>
        <div class="form-group" id="m5">
          <label class="control-label" for="input5m">5-Minute Power</label>
          <div class="controls">
            <input class="form-control" type="text" name="input5m" id="input5m" maxlength="3" placeholder="380">
          </div>
        </div>
        <div class="form-group" id="m20">
          <label class="control-label" for="input20m">20-Minute Power</label>
          <div class="controls">
            <input class="form-control" type="text" name="input20m" id="input20m" maxlength="3" placeholder="290">
          </div>
        </div>
        <!--
        <div class="form-group">
          <label class="control-label" for="inputPeak">Peak Week <a href="#" rel="tooltip" title="During the year, what week is your 'A' race, or when would you like to peak? Weeks run from 1-53">?</a></label>
          <div class="controls">
            <input class="form-control" type="text" id="inputPeak" placeholder="26">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label" for="inputTime">Hours per week available <a href="#" rel="tooltip" title="How many hours per week do you think you can dedicate to training?">?</a></label>
          <div class="controls">
            <input class="form-control" type="text" id="inputTime" placeholder="8">
          </div>
        </div>

        power measurement type [select]
        -->

        <button type="submit" id="signup_form_submit" class="btn btn-primary pull-right">Build My Plan</button>

      </form>
    </div>
  </div>
  <div class="col-sm-4 col-sm-offset-2">
    <div class="row">
      <h2>Sign In</h2>
      <form class="form-horizontal" name="signin" action="/sign_in" method="post">
        <div class="form-group">
          <label class="control-label" for="inviteCode">Invite Code</label>
          <div class="controls">
            <input class="form-control" type="text" id="inviteCode" name="inviteCode">
          </div>
        </div>
        <button type="submit" class="btn btn-primary pull-right">Sign In</button>
      </form>
    </div>




    <div class="row">
      <h2>DB Sign In</h2>
      <form class="form-horizontal" name="db_signin" action="/db_sign_in" method="post">
        <div class="form-group">
          <label class="control-label" for="inputEmail">Email</label>
          <div class="controls">
            <input class="form-control" type="text" id="inputEmail" name="inputEmail">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label" for="inputPassword">Password</label>
          <div class="controls">
            <input class="form-control" type="text" id="inputPassword" name="inputPassword">
          </div>
        </div>
        <button type="submit" class="btn btn-primary pull-right">Sign In</button>
      </form>
    </div>
  </div>
</div>