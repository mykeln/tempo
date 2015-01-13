<?php
if( !defined("TEMPO_MAIN_PROGRAM") ) die( "Error: can't include this file directly" );
?>

<div class="container">
  <div class="col-sm-4">
    <!-- user setup -->
    <div class="row">
      <h2>Sign Up</h2>
      <form class="form-horizontal" id="signup_form" name="signup" action="<? echo TEMPO_URL ?>/sign_up" method="post">

        <? require ('_user_form.php'); ?>

        <button type="submit" id="signup_form_submit" class="btn btn-primary pull-right">Build My Plan</button>

      </form>
    </div>
  </div>
  <div class="col-sm-4 col-sm-offset-2">
    <div class="row">
      <h2>Sign In</h2>
      <form class="form-horizontal" id="signin_form" name="signin" action="<? echo TEMPO_URL ?>/sign_in" method="post">
        <div class="form-group">
          <label class="control-label" for="inputEmail">Email</label>
          <div class="controls">
            <input class="form-control" type="email" id="inputEmail" name="inputEmail">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label" for="inputPassword">Password</label>
          <div class="controls">
            <input class="form-control" type="password" id="inputPassword" name="inputPassword">
          </div>
        </div>
        <button type="submit" class="btn btn-primary pull-right">Sign In</button>
      </form>
    </div>
  </div>
</div>
