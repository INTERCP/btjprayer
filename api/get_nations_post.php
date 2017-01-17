<?php
  // 오늘의 기도 종족별기도 포스트 가져오기 api
  include_once( $_SERVER['DOCUMENT_ROOT']."/40ucsILHrT/wp-load.php");

  $connect = mysqli_connect( DB_HOST, DB_USER, DB_PASSWORD );
  mysqli_select_db(DB_NAME, $connect);
  mysqli_query("SET NAMES utf8");

  global $wpdb;
  $table_name = $wpdb->prefix.'prm_nations';
  $post_id = $_GET['post_id'];

  $nations_post = $wpdb->get_row( " SELECT * FROM $table_name WHERE post_id = $post_id" );

  $server_path = 'http://www.prayformuslims.org/ki-ko-ahav-elohim-et-haolam/prm-content/uploads/';

  $nations_post->image_path = $server_path.$nations_post->image_path;
  
  echo json_encode($nations_post);

?>

