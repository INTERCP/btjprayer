<?php
  // 특성이미지 api
  include_once( $_SERVER['DOCUMENT_ROOT']."/40ucsILHrT/wp-load.php");
  include_once( $_SERVER['DOCUMENT_ROOT']."/40ucsILHrT/wp-includes/post-thumbnail-template.php" );
  include_once( $_SERVER['DOCUMENT_ROOT']."/40ucsILHrT/wp-includes/post.php" );

  $id = $_GET['post_id'];
  $image_url = wp_get_attachment_url( get_post_thumbnail_id($id) );
  // echo $image_url;
?>

<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="refresh" content="0;url=<?php echo $image_url; ?>" />
</head>
</html>
