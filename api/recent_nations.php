<?php
  // 오늘의 기도 최근댓글 api
  include_once( $_SERVER['DOCUMENT_ROOT']."/40ucsILHrT/wp-load.php");

  $connect = mysqli_connect( DB_HOST, DB_USER, DB_PASSWORD );
  mysqli_select_db(DB_NAME, $connect);
  mysqli_query("SET NAMES utf8");

  global $wpdb;


  $query = "
    SELECT
      posts.post_parent id,
      posts.post_title title,
      posts.post_modified modified
    FROM (
      SELECT MAX(P.ID) post_id, MAX(P.post_modified) modified
      FROM $wpdb->posts P, $wpdb->term_relationships T
      WHERE
	P.post_parent = T.object_id
	AND T.term_taxonomy_id = 15
	AND P.post_type = 'revision'
      GROUP BY P.post_parent
      ORDER BY modified DESC
    ) list INNER JOIN $wpdb->posts posts on list.post_id = posts.id
    INNER JOIN $wpdb->posts parent on posts.post_parent = parent.id
    WHERE parent.post_status = 'publish'
  ";


  // $results = $wpdb->get_results("select P.post_parent id, P.post_title title, max(P.post_modified) modified from $wpdb->posts P, $wpdb->term_relationships T where P.post_parent = T.object_id and T.term_taxonomy_id = 15 and P.post_type = 'revision' group by P.post_parent order by modified desc");
  $results = $wpdb->get_results($query);

  header('Content-Type: text/json; charset=utf-8');
  echo "{\"posts\":".json_encode($results)."}";
?>
