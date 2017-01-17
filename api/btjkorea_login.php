<?php
	//header("Content-Type: application/json;charset=utf-8");

	$connect = mysql_connect( 'localhost', 'btjkorea', 'qlxlwpdl1040!' );
	mysql_select_db('btjkorea', $connect);
	mysql_query("SET NAMES utf8");

  $userid = $_POST["userid"];
  $passwd = $_POST["passwd"];

  $query = "
    SELECT mb_no, mb_id, mb_password, mb_name, mb_level, mb_sex, mb_hp, chaptercode
    FROM g5_member
    WHERE mb_id = '$userid' AND mb_password = PASSWORD('$passwd')
  ";

  $result = mysql_query($query, $connect);


  while($row = mysql_fetch_assoc($result)) {
      $rows[] = $row;
  }
  echo json_encode($rows);
?>
