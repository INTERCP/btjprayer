<?php
  // 오늘의 기도 GAP 참여하기 post api
  include_once( $_SERVER['DOCUMENT_ROOT']."/40ucsILHrT/wp-load.php");

  $device_id = $_POST['device_id']; // 디바이스 id
  $name = $_POST['name']; // 이름
  $sex = $_POST['sex']; // 성별
  $age = $_POST['age']; // 나이
  $country = $_POST['country']; // 국가
  $ip_addr = $_POST['ip_addr']; // ip 주소
  $regtime = $_POST['regtime']; // 등록 날자

  if (!isset($regtime)) {
    $regtime = (new \DateTime())->format('Y-m-d H:i:s');
  }

  global $wpdb;
  $table_name = $wpdb->prefix.'gap_users';
  try{
    $wpdb->insert(
    	$table_name,
    	array (
    		'device_id' => $device_id,
    		'name' => $name,
    		'sex' => $sex,
    		'age' => $age,
    		'country' => $country,
    		'ip_addr' => $ip_addr,
    		'regtime' => $regtime
    	)
    );

    echo "1";
  } catch (Exception $e) {
    echo $e;
  }

?>
