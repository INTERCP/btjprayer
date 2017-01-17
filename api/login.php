<?php
  include_once( $_SERVER['DOCUMENT_ROOT']."/40ucsILHrT/wp-load.php");

  global $wpdb;

  $userid = $_POST["userid"];
  $passwd = $_POST["passwd"];

  header('Content-Type: text/json; charset=utf-8');
  $tablename = 'btjusers';
  $login_user = $wpdb->get_results(
    "SELECT * FROM $tablename WHERE `userid` = '$userid' AND `password` = PASSWORD('$passwd')"
  );

  echo json_encode($login_user[0]);
?>
