<?

  $db = new Db();
  // Quote and escape form submitted values
  //$name = db_quote($_POST['username']);
  //$email = db_quote($_POST['email']);

  // temp, for demo purposes
  $name_raw = "Mykel";
  $email_raw = "myke@karmcity.com";

  $name = $db -> quote($name_raw);
  $email = $db -> quote($email_raw);

  $result = $db -> query("INSERT INTO `athletes` VALUES (``," . $name . ",NOW()," . $email . ",145,1705,1393,971,610,406,350,330,300)");


  $rows = $db -> select("SELECT `name`,`email` FROM `athletes`");


?>