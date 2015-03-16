<?php
// test
if( !defined("TEMPO_MAIN_PROGRAM") ) die( "Error: can't include this file directly" );

require( "config.php" );

// user objects
require( "class.user.php" );
require( "class.db.php" );

// activity objects
require( "class.activity.php");


// assuming database will be used by all pages - for now
$db = new Chainiac_DB(
    TEMPO_DB_HOST,
    TEMPO_DB_NAME,
    TEMPO_DB_USER,
    TEMPO_DB_PASS
);

// setting specific db based on server's environment variables
function getCurrentUri() {
    $basepath = implode('/', array_slice(explode('/', $_SERVER['SCRIPT_NAME']), 0, -1)) . '/';
    $uri = substr($_SERVER['REQUEST_URI'], strlen($basepath));
    if (strstr($uri, '?')) $uri = substr($uri, 0, strpos($uri, '?'));
    $uri = '/' . trim($uri, '/');
    return $uri;
}

// app functions
function sign_in($enteredEmail,$enteredPassword) {

    global $db;
    $user = new Chainiac_User($db);

    $attempt = $user->isLoginValid($enteredEmail, $enteredPassword);

    if( $attempt === true ) {
        $user->startSession();
        header("Location:" . TEMPO_URL . "/dash");
    } else {
        echo "<p>Your email or password was entered incorrectly</p>";
        // redirect to a failed login page?
        die;
    }

  // normalize email entry to lower case
  //$enteredEmail = strtolower($enteredEmail);

}