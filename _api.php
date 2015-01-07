<?php
if( !defined("TEMPO_MAIN_PROGRAM") ) die( "Error: can't include this file directly" );

$retarr = array("timestamp" => date("r"));
switch( $routes[2] ) {

    // one mode of operation:
    // (1) Get specific athlete
    case "athlete":
        $retarr["athlete"] = $db->Single()->Query(
            "select * from athletes where api_key=?",
            $_GET['key']
        );

        // hide any personal information
        unset( $retarr["athlete"]["password"] );

        $retarr["fitness"] = "Erm, I kept it all in the same field :/";
    break;

    // two modes of operation:
    // (1) get specific activity, (2) get all
    case "activities":
        if( isset( $_GET['activity']) ) {
            $retarr["activities"] = $db->Single()->Query(
                "select * from `activities` where shortname=?",
                $_GET['activity']
            );
        } else {
            $retarr["activities"] = $db->Query(
                "select * from `activities` order by `shortname` desc"
            );
        }
    break;

    // two modes of operation:
    // (1) get specific weke, (2) get all entries
    case "schedules":
        if( isset( $_GET['week']) ) {
            $retarr["schedules"] = $db->Single()->Query(
                "select * from `schedules` where `week`=? order by `year` desc",
                $_GET['week']
            );
        } else {
            $retarr["schedules"] = $db->Query(
                "select * from `schedules` order by `year` desc"
            );
        }
    break;

}
echo json_encode($retarr);
