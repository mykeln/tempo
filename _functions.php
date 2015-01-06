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










































<?php

/* usage:
$database = new Chainiac_DB(
    DATABASE__HOST,
    SELECT_DATABASE,
    DATABASE__USER,
    DATABASE__PASS
);

# available settings commands:
$database->Single()
$database->Multiple()
$database->setSticky(true)      // or false
$database->setReturnData(true)  // or false

# ex#1 - gets all rows:
$rows = $database->Query("show tables");

# ex#2 - gets a single row:
$row = $database->Single->Query(
    "select * from users where id=:id limit 1",
    array(":id" => $_GET['id'])
);

# ex#3 - if you're doing a bunch of single queries,
# and want settings to stick around:
$sql = "select * from users where id=? limit 1";
$database->Single->setSticky(true);
$r1 = $database->Query($sql, array($_GET['user1']) );
$r2 = $database->Query($sql, array($_GET['user2']) );



*/

class Chainiac_DB {
  private $hostname;
  private $database;
  private $username;
  private $password;

  // default value: false
  // if true, keeps any changed options after query
  // if false, resets to default settings after each query
  public $sticky;

  // default value: false
  // returns single row if true, otherwise multiple rows
  public $single_mode;

  // default value: true
  // if true: on query, fetch rows and return them
  // if false, on query, return $statement
  public $return_data;


  function __construct($h, $d, $u, $p) {
      // required
      // operational toggle switches

      $this->hostname = $h;
      $this->database = $d;
      $this->username = $u;
      $this->password = $p;

      $this->setDefaults();
      $this->connect();
  }

  function setDefaults() {
      $this->single_mode = false;
      $this->sticky = false;
      $this->return_data = true;
      return( $this );
  }

  function setSticky($v = true) {
      $this->sticky = $v;
  }

  function setReturnData($v = true) {
      $this->return_data = $v;
      return($this);
  }

  function connect() {
      try {
          $this->db = new PDO(
              "mysql:host={$this->hostname};dbname={$this->database}",
              $this->username,
              $this->password
          );
  } catch( Exception $e ) {
          // do some error handling here
    echo "<h4>Error connecting to MySQL</h4>";
          die;
      }
  }

  function Single() {
      $this->single_mode = true;
      return( $this );
  }

  function Multiple() {
      $this->single_mode = false;

      return( $this );
  }

  function Query($sql, $params = array()) {

      if( !is_array($params) ) $params = array($params);

      $this->statement = $this->db->prepare( $sql );
      $this->statement->execute($params);

      if( $this->return_data == false ) {
          return( $this->statement );
      }

      if( $this->single_mode == false ) {
          return( $this->statement->fetchAll() );
      } else {
          return( $this->statement->fetch() );
      }

      if( $this->sticky == false ) $this->setDefaults();
  }
}
?>