<?php
function remove_left_sidebar(){
	unregister_sidebar( 'sidebar-1' );
}
add_action( 'widgets_init', 'remove_left_sidebar', 11 );

function get_excerpt(){
	$excerpt = get_the_content();
	$excerpt = preg_replace(" (\[.*?\])",'',$excerpt);
	$excerpt = strip_shortcodes($excerpt);
	$excerpt = strip_tags($excerpt);
	$excerpt = substr($excerpt, 0, 600);
	$excerpt = substr($excerpt, 0, strripos($excerpt, " "));
	$excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
	//$excerpt = $excerpt.'<br/><br/>... <a href="'.$permalink.'">더보기</a>';
	return $excerpt;
}

register_nav_menus( array(
	'mobile_menu' => 'Mobile Menu',
));

function nation_summary_shortcode( $atts, $content = null ) {
	return '<div id="nation_summary_title" style="border-top: 1px solid #C8C8C8; line-height:36px; font-weight:bold; padding-left: 5px;">종족 개관<span style="float:right; line-height:24px;" class="glyphicon glyphicon-menu-down"></span></div><div id="nation_summary_content" style="display:none">' . $content . '</div>';
}
add_shortcode( '종족개관', 'nation_summary_shortcode' );

function prayer_request_shortcode( $atts, $content = null ) {
	return '<div id="prayer_request_title"i style="border-top: 1px solid #C8C8C8; line-height:36px; font-weight:bold; padding-left: 5px;">기도제목</div><div id="prayer_request_content">' . $content . '</div>';
	#return '<div id="prayer_request_title"i style="border-top: 1px solid #C8C8C8; line-height:36px; font-weight:bold; padding-left: 5px;">기도제목<span style="float:right; line-height:24px;" class="glyphicon glyphicon-menu-down"></span></div><div id="prayer_request_content" style="display:none">' . $content . '</div>';
}
add_shortcode( '기도제목', 'prayer_request_shortcode' );

function get_best_comments() {
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
		" score DESC, comment_date_gmt DESC LIMIT 5"
	);

	return $comments;
}
function getExcerpt($str, $startPos=0, $maxLength=120) {
	if(mb_strlen($str) > $maxLength) {
		$excerpt   = mb_substr($str, $startPos, $maxLength-3);
		//$lastSpace = strrpos($excerpt, ' ');
		//$excerpt   = substr($excerpt, 0, $lastSpace);
		$excerpt  .= '...';
	} else {
		$excerpt = $str;
	}

	return $excerpt;
}


function mytheme_comment($comment, $args, $depth) {
  if ( 'div' === $args['style'] ) {
  	$tag       = 'div';
    $add_below = 'comment';
  } else {
    $tag       = 'li';
    $add_below = 'div-comment';
  }
?>
	<<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">

		<?php if ( 'div' != $args['style'] ) : ?>
        <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
    <?php endif; ?>
<!--
    <div class="comment-author vcard">
    <?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
    <?php printf( __( '<cite class="fn">%s</cite>' ), get_comment_author_link() ); ?>
    </div>

    <?php if ( $comment->comment_approved == '0' ) : ?>
   	<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></em>
    <br />
    <?php endif; ?>

    <div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
    <?php
    /* translators: 1: date, 2: time */
    printf( __('%1$s %2$s'), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)' ), '  ', '' );
    ?>
    </div>
	-->
		<?php
		printf( __( '<span class="fn">%s</span> ' ), get_comment_author_link() );
		printf( __('&nbsp;&nbsp;&nbsp;%1$s %2$s'), get_comment_date(),  get_comment_time() );
		?><br/>
    <?php comment_text(); ?>
		<!--<div class="amen">아멘</div>-->
    <div class="reply">
    	<?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
    </div>

    <?php if ( 'div' != $args['style'] ) : ?>
    </div>
    <?php endif; ?>
    <?php
}

function is_leap_year($year)
{
	return ((($year % 4) == 0) && ((($year % 100) != 0) || (($year %400) == 0)));
}

function get_day_of_year() {
	if (is_leap_year(date('Y')) && date('z') > 57) {
		return date('z');
	} else {
		return date('z') + 1;
	}
}

function testDB() {
	/*
	$db = new SQLite3('/home/intercp/www/btjprayer/gap.db');
	if(!$db) {
		echo "fail\n";
	} else {
		echo "success!\n";
	}
	*/
}

function get_print_new_script() {
    $obj_category = get_the_category();
    $term_id = $obj_category[0]->term_id;
    $dif_day = "-3";
    // 종족기도는 3일간 new 표시
    if( $term_id == get_category_by_slug('nationsjoin')) {		
        $dif_day = "-3";
    }
    // New 표시
    $sub_date = substr( $post->post_date , 0, 10);
    $script_str = "<script>print_new( \"".$sub_date."\", $dif_day );</script>";
    return $script_str;
}
?>
