<?php /*

**************************************************************************
Plugin Name: Best Comment for BTJPrayer
Plugin URI: http://www.btjprayer.net/wp-content/plugins/best-comment
Description:
Author: INTERCP CYBER TEAM
Version: 1.0
Author URI: http://www.intercp.net
**************************************************************************/

function best_comment_admin_init() {
	if (isset($_REQUEST['action'])) {
		if ($_REQUEST['action'] == "editcomment") {
			add_meta_box('best-comment-meta-box', __('Best Comment'), 'best_comment_box', 'comment', 'normal');
		}
	}
}
add_action('admin_init', 'best_comment_admin_init', 99);

function save_best_comment_score( $comment_ID ) {
	if (!update_comment_meta( $comment_ID, 'best-comment-score', $_POST['best-comment-score'] )) {
			add_comment_meta( $comment_ID, 'best-comment-score', $_POST['best-comment-score'] );
	}
}

add_action( 'edit_comment', 'save_best_comment_score', 10);

function best_comment_box($comment) {
	global $wpdb;
	$comment_id = $comment->comment_ID;

	echo '<div class="best-comment-details" style="margin: 13px;">';

	$comment_meta = $wpdb->get_results("SELECT * FROM $wpdb->commentmeta WHERE comment_id = $comment_id and meta_key = 'best-comment-score'", ARRAY_A);
	if ($comment_meta) :
		foreach ($comment_meta as $entry) :
/*
			if ( is_serialized( $entry['meta_value'] ) ) {
				if ( is_serialized_string( $entry['meta_value'] ) ) {
					$entry['meta_value'] = maybe_unserialize( $entry['meta_value'] );
				} else {
					$entry['meta_value'] = "SERIALIZED DATA";
				}
			}

			$entry['meta_key'] = esc_attr($entry['meta_key']);
			$entry['meta_value'] = $entry['meta_value'];
			$entry['meta_id'] = (int) $entry['meta_id'];

			echo "<div style=\"overflow: auto; clear: both;\">\n";
			echo "<span style=\"float: left; width: 25%;\">" . $entry['meta_key'] . "</span>";
			echo "<span style=\"float: left; width: 70%;\">" . $entry['meta_value'] . "</span>\n";
			echo "</div>" . "\n";

*/
			?><label for="best-comment-score"><?php echo __('Score'); ?></label>
			<input type="text" id="best-comment-score" name="best-comment-score" value="<?php echo $entry['meta_value']; ?>" />
			<?php
		endforeach;
		echo '<div style="clear:both"></div>' . "\n\n";

	else :
	?>
	<label for="best-comment-score"><?php echo __('Score'); ?></label>
	<input type="text" name="best-comment-score"/>
	<?php
	endif;
	?>

</div>

	<?php



}
