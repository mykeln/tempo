<?php
if( !defined("TEMPO_MAIN_PROGRAM") ) die( "Error: can't include this file directly" );

// requires: instantiated $db (Chainiac_DB)
// $activity = new Chainiac_Activity( $db );

class Chainiac_Activity {

  private $db;
  public $info;

  function __construct($db) {
    $this->db = $db;
  }

  // stores activity row into $this->info
  function getInfo($activityName) {
    $this->info = $this->db->Single()->query(
      "SELECT * from `activities` WHERE `name`=? limit 1",
      $activityName
    );
  }

  // creates a new activity, adds to database
  // make sure user doesn't already exist
  // data contains an array of post fields
  // if succeeds, returns database ID of record (activity_id)
  // if fails, returns false
  function addActivity($data) {
    $this->db->Query("insert into `activities` (`name`,`shortname`,`type`,`wu`,`desc`,`info`,`target`,`cd`,`duration`) values (:name,:shortname,:type,:wu,:desc,:info,:target,:cd,:duration)",
      array(
      ":name" => $data["inputName"],
      ":shortname" => str_replace(" ", "_", strtolower($data["inputName"])),
      ":type" => $data["inputType"],
      ":wu" => $data["inputWu"],
      ":desc" => $data["inputDesc"],
      ":info" => $data["inputInfo"],
      ":target" => $data["inputTarget"],
      ":cd" => $data["inputCd"],
      ":duration" => $data["inputDuration"]
      )
    );

    // clear any info, to avoid false-positives
    // due to object reuse (creating multiple accts, etc)
    $this->info = array();

    // check to see if the query made it
    $this->getInfo($data["inputName"]);

    // nope :/
    if( empty($this->info) ) return(false);

    // everything a-ok
    return( $this->info["activity_id"]);
  }

}
