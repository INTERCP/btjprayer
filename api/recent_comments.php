<?php
  // 오늘의 기도 최근댓글 api
  include_once( $_SERVER['DOCUMENT_ROOT']."/40ucsILHrT/wp-load.php");

  global $wpdb;
  $comments = $wpdb->get_results(
    "SELECT".
    " c.comment_ID as id,".
    " c.comment_post_ID as parent,".
    " c.comment_author as name,".
    " c.comment_author_url as url,".
    " c.comment_date_gmt as date,".
    " c.comment_content as content,".
    " cm.meta_value as score,".
    " terms.slug as category,".
    " posts.post_title as parent_title ".
    "FROM".
    " $wpdb->comments c LEFT JOIN $wpdb->posts posts".
    " ON c.comment_post_ID = posts.ID".
    " LEFT JOIN $wpdb->commentmeta cm".
    " ON c.comment_ID = cm.comment_id,".
    " $wpdb->term_relationships t LEFT JOIN $wpdb->terms terms".
    " ON t.term_taxonomy_id = terms.term_id ".
    "WHERE".
    " c.comment_approved = '1'".
    " AND c.comment_post_ID = t.object_id ".
    " AND cm.meta_key = 'best-comment-score'".
    " AND terms.slug != 'ko'".
    "ORDER BY".
    " score DESC, comment_date_gmt DESC LIMIT 10"
  );

  header('Content-Type: text/json; charset=utf-8');
  echo "{\"posts\":[{\"comments\":".json_encode($comments)."}]}";
?>
