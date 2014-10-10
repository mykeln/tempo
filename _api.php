<?php

  if($_GET['get'] == "activities") {
    $result = db_query("SELECT name,shortname FROM `activities` ORDER BY `name` DESC;");
    if($result === false) {
        echo 'There was an error retrieving workouts.';
    } else {
      // prepare the json workout output
      $activities = array();

      while($activity = mysqli_fetch_array($result, MYSQL_ASSOC)) {
        $activities[] = array($activity);
      }

      $output = json_encode(array('activities' => $activities));

      echo $output;
    }
  }

?>

