<?php
if( !defined("TEMPO_MAIN_PROGRAM") ) die( "Error: can't include this file directly" );

// requires: instantiated $db (Chainiac_DB)
// $user = new Chainiac_User( $db );

class Chainiac_User {

    private $db;
    public $email;
    public $info;

    function __construct($db) {
        $this->db = $db;
    }

    // stores athlete row into $this->info
    // not called by default: only called in isLoginValid()
    function getInfo($email) {
        $this->info = $this->db->Single()->query(
            "SELECT * from `athletes` WHERE `email`=? limit 1",
            $email
        );
    }

    // given an email address and a password,
    // returns true or false
    function isLoginValid($enteredEmail, $enteredPass) {
        $email = trim(strtolower($enteredEmail));

        $this->getInfo($enteredEmail);

        // user does not exist, so login can't be valid
        if( empty($this->info) ) return( false );

        if( $this->info["password"] === $this->SaltedHash($enteredPass) ) {
            return( true );
        } else {
            return( false );
        }
    }

    // salt located in config.php
    function SaltedHash($t) {
        return( sha1(sha1($t).sha1(TEMPO_SALT)) );
    }

    function generateApiKey() {
        $key = uniqid('tempo_');
        return( $key );
    }

    // timestamp
    function updateLastLogin() {
        $this->db->Query(
            "UPDATE `athletes` SET `lastlogin_date`=NOW() WHERE `email`=? LIMIT 1",
            $this->info["email"]
        );
    }

    function stopSession() {
        setcookie('tempoAthlete', '', time() - 4600000, "/");
        unset($_COOKIE["tempoAthlete"]);
    }

    // login was successful (be sure to check first)
    function startSession() {

        // tie this back to api key
        setcookie("tempoAthlete", $this->info["api_key"], time()+3600000, "/");
        $_COOKIE["tempoAthlete"] = $this->info["api_key"];

        $this->updateLastLogin();
    }

    // creates a new user, adds to database with salted password
    // make sure user doesn't already exist
    // data contains an array of post fields, including email
    // if succeeds, returns database ID of record (athlete_id)
    // if fails, returns false
    function registerAccount($data) {
        $this->db->Query(
            "insert into `athletes` (" .
                "`created_date`, " .
                "`email`, `password`, `api_key`, `name`, " .
                "`weight`, `5s`, `1m`, `5m`, `20m`" .
            ") values (" .
                "NOW(), " .
                ":email, :pass, :api_key, :name, " .
                ":inw, :in5s, :in1m, :in5m, :in20m" .
            ")",
            array(
                ":email" => $data["inputEmail"],
                ":pass" => $this->SaltedHash($data["inputPassword"]),
                ":api_key" => $this->generateApiKey(),
                ":name" => $data["inputName"],
                ":inw" => $data["inputWeight"],
                ":in5s" => $data["input5s"],
                ":in1m" => $data["input1m"],
                ":in5m" => $data["input5m"],
                ":in20m" => $data["input20m"]
            )
        );

        // clear any info, to avoid false-positives
        // due to object reuse (creating multiple accts, etc)
        $this->info = array();

        // check to see if the query made it
        $this->getInfo($data["inputEmail"]);

        // nope :/
        if( empty($this->info) ) return(false);

        // everything a-ok
        return( $this->info["athlete_id"]);
    }
}