<?php

// Load configuration as an array. Use the actual location of your configuration file
$config = parse_ini_file('../config.ini');

// app functions
function sign_in($user) {

  // tie this back to email address
  setcookie("tempoAthlete", $user, time()+3600000, "/");
  $_COOKIE["tempoAthlete"] = $user;

  header("Location:" . $_SERVER["PHP_SELF"]);
}

function db_sign_in($email,$pass) {
  $result = db_query("SELECT * FROM `athletes` WHERE email='" . $email . "';");

  if($result) {
    // If the password they give maches
    if($email->password === $pass){
      echo "logging you in captain";
    } else {
      echo "password didn't match";
    }
  } else {
    echo "didn't find you";
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