<?php
  // save_nations.php
  // 오늘의 기도 종족별 기도 api
  include_once( $_SERVER['DOCUMENT_ROOT']."/40ucsILHrT/wp-load.php");

  $connect = mysql_connect( DB_HOST, DB_USER, DB_PASSWORD );
  mysql_select_db(DB_NAME, $connect);
  mysql_query("SET NAMES utf8");

  $post_id = $_POST['post_id']; // 댓글 불러올 post_id
  $image_path = $_POST['image_path']; // 종족 소개 그림파일 위치
  $summary = $_POST['summary']; // 종족개관
  $prayer_request = $_POST['prayer_request']; // 기도제목

  global $wpdb;
  $table_name = $wpdb->prefix.'prm_nations';
  $wpdb->insert(
	$table_name,
	array (
		'post_id' => $post_id,
		'image_path' => $image_path,
		'summary' => $summary,
		'prayer_request' => $prayer_request
	)
  );

  echo "1";
?>

