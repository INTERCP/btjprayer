<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="margin-top: 0px;">
	<?php if ( is_search() || is_category() ) : ?>
	<?php twentyfourteen_post_thumbnail(); ?>
	<?php endif; ?>
    
	<?php if (!isset($_GET["nation"])) { ?>
	<header class="entry-header">
		<?php if ( in_array( 'category', get_object_taxonomies( get_post_type() ) ) && twentyfourteen_categorized_blog() ) : ?>
			<div class="entry-meta">
				<?php if (!isset($_GET["mobile"])) : ?>
				<span class="cat-links"><?php echo get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'twentyfourteen' ) ); ?></span> <?php endif; ?>
			</div>
		<?php
			endif;
		?>


		<?php
			$obj_category = get_the_category();
			$term_id = $obj_category[0]->term_id;
			$dif_day = "-1";
			if( $term_id == '6') {		// 종족기도만 -3
				$dif_day = "-3";
			}
			// New 표시
			$sub_date = substr( $post->post_date , 0, 10);
			$script_str = "<script>print_new( \"".$sub_date."\", $dif_day );</script>";
		?>
		<!-- $post->post_date2 : <?php echo $post->post_date; ?>, jang_test : <?php echo $term_id; ?>  -->

        <?php
            $comment_count = "&nbsp&nbsp;<span style='font-size: 14px;'>[".get_comments_number()."]</span>&nbsp;";
        ?>
        

		<?php
			if ( is_single() ) :
				the_title( '<h1 class="entry-title">', ' '.$script_str.'</h1>' );
			else :
				// 여기 출력됨
				// $title = split(";", get_the_title())[1];
				// echo '<h1 class="entry-title"><a href="'.esc_url( get_permalink() ).'" rel="bookmark">'.$title.'</a> '.$script_str.'</h1>'
				the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a> '.$comment_count.$script_str.'</h1>' );
			endif;
		?>

        

		<div class="entry-meta">
			<?php
				if ( 'post' == get_post_type() )
					twentyfourteen_posted_on();

				if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) :
			?>
			<?php
				if (!isset($_GET['mobile'])): ?>
			<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'twentyfourteen' ), __( '1 Comment', 'twentyfourteen' ), __( '% Comments', 'twentyfourteen' ) ); ?></span>
			<?php
                endif;
			?>
			<?php
				endif;

				edit_post_link( __( 'Edit', 'twentyfourteen' ), '<span class="edit-link">', '</span>' );
			?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->
	<?php } else {?>
	<style>.content-area, .entry-content { padding-top: 0 !important }</style>
	<?php } ?>
	<?php if ( is_search() || is_category() ) : ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
		<?php
			the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentyfourteen' ) );
			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentyfourteen' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
			) );
		?>
	</div><!-- .entry-content -->
	<?php endif; ?>

	<?php the_tags( '<footer class="entry-meta"><span class="tag-links">', '', '</span></footer>' ); ?>
</article><!-- #post-## -->
