<?php

// Load configuration as an array. Use the actual location of your configuration file
$config = parse_ini_file('../config.ini');


function getCurrentUri() {
  $basepath = implode('/', array_slice(explode('/', $_SERVER['SCRIPT_NAME']), 0, -1)) . '/';
  $uri = substr($_SERVER['REQUEST_URI'], strlen($basepath));
  if (strstr($uri, '?')) $uri = substr($uri, 0, strpos($uri, '?'));
  $uri = '/' . trim($uri, '/');
  return $uri;
}

// app functions
function sign_in($user) {
  // normalize user entry to lower case
  $user = strtolower($user);

  // tie this back to email address
  setcookie("tempoAthlete", $user, time()+3600000, "/");
  $_COOKIE["tempoAthlete"] = $user;

  header("Location:/dash");
}

function db_sign_in($enteredEmail,$enteredPassword) {
  // normalize email entry to lower case
  $enteredEmail = strtolower($entererdEmail);

  $result = db_query("SELECT `email`,`password` FROM `athletes` WHERE email='" . $enteredEmail . "';");

  if($result) {
    $dbData = mysqli_fetch_array($result);
    $dbEmail = $dbData[0];
    $dbPassword = $dbData[1];

    // If the password they give maches
    if($enteredPassword === $dbPassword){
      // tie this back to email address
      setcookie("tempoAthlete", $dbEmail, time()+3600000, "/");
      $_COOKIE["tempoAthlete"] = $dbEmail;

      header("Location:/dash");
    } else {
      echo "Your email or password was entered incorrectly";
    }
  } else {
    echo "I had trouble accessing the database";
  }
}

// database functions
function db_connect() {
    global $config;

    // Define connection as a static variable, to avoid connecting more than once
    static $connection;

    // Try and connect to the database, if a connection has not been established yet
    if(!isset($connection)) {

        $connection = mysqli_connect('localhost',$config['username'],$config['password'],$config['dbname']);
    }

    // If connection was not successful, handle the error
    if($connection === false) {
        // Handle error - notify administrator, log to a file, show an error screen, etc.
        return mysqli_connect_error();
    }
    return $connection;
}

function db_query($query) {

    // Connect to the database
    $connection = db_connect();

    // Query the database
    $result = mysqli_query($connection,$query);

    return $result;
}

?>