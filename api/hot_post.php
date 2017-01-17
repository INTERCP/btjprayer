<?php

    //error_reporting(E_ALL ^ E_NOTICE);
    //ini_set("display_errors", 1);

	// 무살기 어플 많이 본글 json api
	header("Content-Type: application/json;charset=utf-8");

	include_once( $_SERVER['DOCUMENT_ROOT']."/40ucsILHrT/wp-config.php");

	$connect = mysql_connect( DB_HOST, DB_USER, DB_PASSWORD );
	mysql_select_db(DB_NAME, $connect);
	mysql_query("SET NAMES utf8");

	$query = "
		SELECT 
			A.date AS stat_date
			,A.count
			,B.id
			,B.post_title AS title
			,B.post_status AS status
			,B.guid AS url
			,B.post_date AS date
			/* ,B.post_content AS content */
			,C.term_taxonomy_id AS category_id
			,D.name AS category_title
			,D.slug AS category_slug
		FROM  
			ppnz0_statistics_pages A
			,ppnz0_posts B
			,ppnz0_term_relationships C
			,ppnz0_terms D
		WHERE 
			A.id = B.id
			AND A.id = C.object_id	
			AND A.uri LIKE '/api/get_post?id=%' 
			AND B.post_status = 'publish'
			AND B.post_date >= DATE_FORMAT(DATE_ADD(NOW(), INTERVAL -1 MONTH), '%Y-%m-%d')
			AND C.term_taxonomy_id IN(2,6,7)  /* 2=오늘의기도, 6=종족기도, 7=열방자료실 */
			AND C.term_taxonomy_id = D.term_id
		ORDER BY A.count DESC
		LIMIT 10
	";

	$result = mysql_query($query, $connect);
	while( $row = mysql_fetch_assoc($result) ){
		// 첨부검색
		$query2 = " 
			SELECT 
				id, post_parent, guid AS url, post_title, post_status, post_name, post_type, post_mime_type
			FROM  ppnz0_posts 
			WHERE 
				post_parent = '$row[id]' 
				AND post_type = 'attachment'
			ORDER BY id 
		";
		$result2 = mysql_query($query2, $connect);
		$rows2 = array();
		while( $row2 = mysql_fetch_assoc($result2) ){
			$rows2[] = $row2;
		}
		$row[attachments] = $rows2;
		$rows[] = $row;

	}

	$posts[posts] = $rows;

	//print_r($posts[posts]); exit;

	echo json_encode($posts); 

?>
