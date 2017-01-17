<?php
  include_once( $_SERVER['DOCUMENT_ROOT']."/40ucsILHrT/wp-load.php");

  global $wpdb;

  $userid = $_POST["userid"];
  $passwd = $_POST["passwd"];
  $name = $_POST["name"];
  $email = $_POST["email"];

  header('Content-Type: text/json; charset=utf-8');
  $tablename = 'btjusers';


  $result = $wpdb->query(
    $wpdb->prepare(
      "INSERT INTO $tablename (`userid`, `password`, `name`, `email`, `registered_date`)
      VALUES('$userid', PASSWORD('$passwd'), '$name', '$email', NOW())"
    )
  );

  echo json_encode(array('result' => $result));
?>
