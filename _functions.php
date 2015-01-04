<?php

// setting specific db based on server's environment variables
function getCurrentUri() {
  $basepath = implode('/', array_slice(explode('/', $_SERVER['SCRIPT_NAME']), 0, -1)) . '/';
  $uri = substr($_SERVER['REQUEST_URI'], strlen($basepath));
  if (strstr($uri, '?')) $uri = substr($uri, 0, strpos($uri, '?'));
  $uri = '/' . trim($uri, '/');
  return $uri;
}

function generateApiKey() {
  $key = uniqid('tempo_');
  return $key;
}

// app functions
function sign_in($enteredEmail,$enteredPassword) {
  // normalize email entry to lower case
  $enteredEmail = strtolower($enteredEmail);

  $result = db_query("SELECT `email`,`password`,`api_key` FROM `athletes` WHERE email='" . $enteredEmail . "';");
  if($result) {
    $dbData = mysqli_fetch_array($result);
    $dbEmail = $dbData[0];
    $dbPassword = $dbData[1];
    $dbKey = $dbData[2];

    // If the password they give maches
    if($enteredPassword === $dbPassword){
      // tie this back to api key
      setcookie("tempoAthlete", $dbKey, time()+3600000, "/");
      $_COOKIE["tempoAthlete"] = $dbKey;

      $updateLastLogin = db_query("UPDATE `athletes` SET `lastlogin_date`=NOW() WHERE email='" . $enteredEmail . "';");
      if (!($updateLastLogin)) {
        echo "Couldn't update your last login date.";
        exit;
      }

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
  $db_host = getenv('DB_HOST');
  $db_user = getenv('DB_USER');
  $db_pass = getenv('DB_PASS');
  $db_name = getenv('DB_NAME');

  // Define connection as a static variable, to avoid connecting more than once
  static $connection;

  // Try and connect to the database, if a connection has not been established yet
  if(!isset($connection)) {
    $connection = mysqli_connect($db_host,$db_user,$db_pass,$db_name);
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