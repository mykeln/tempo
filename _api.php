<?php

  if($routes[2] == "activities") {
    if ($_GET['activity']) {
      $filter = "WHERE shortname='" . $_GET['activity'] . "'";
    }

    $result = db_query("SELECT * FROM `activities` " . $filter . " ORDER BY `name` DESC;");
    if($result === false) {
        echo 'There was an error retrieving workouts.';
    } else {
      // prepare the json workout output
      $activities = array();

      while($activity = mysqli_fetch_array($result, MYSQL_ASSOC)) {
        $activities[] = $activity;
      }

      $output = json_encode(array('activities' => $activities));

      echo $output;
    }
  }

  if($routes[2] == "schedules") {
    if ($_GET['week']) {
      $filter = "WHERE week='" . $_GET['week'] . "'";
    }

    $result = db_query("SELECT * FROM `schedules` " . $filter . " ORDER BY `year` DESC;");
    if($result === false) {
        echo 'There was an error retrieving your schedule.';
    } else {
      // prepare the json workout output
      $schedules = array();

      while($schedule = mysqli_fetch_array($result, MYSQL_ASSOC)) {
        $schedules[] = $schedule;
      }

      $output = json_encode(array('schedules' => $schedules));

      echo $output;
    }
  }

?>

