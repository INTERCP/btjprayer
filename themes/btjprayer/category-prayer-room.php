<?php
/**
 * The template for displaying Category pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

			<?php if ( have_posts() ) : ?>

			<header class="archive-header">
				<?php
					// Show an optional term description.
					$term_description = term_description();
					if ( ! empty( $term_description ) ) :
						printf( '<div class="taxonomy-description">%s</div>', $term_description );
					endif;
				?>
			</header><!-- .archive-header -->
      <div class="page-content">
        <p>
          <select>
            <option value="열방기도실">열방기도실</option>
            <option value="아랍창">아랍창</option>
            <option value="페르시아창">페르시아창</option>
            <option value="중국소수민족창">중국소수민족창</option>
            <option value="중앙아시아창">중앙아시아창</option>
          </select>

          <a href="#">기도방 개설 신청</a>

          <a href="#">기도글 작성</a>
        </p>
			<?php
					// Start the Loop.
					while ( have_posts() ) : the_post();

					/*
					 * Include the post format-specific template for the content. If you want to
					 * use this in a child theme, then include a file called called content-___.php
					 * (where ___ is the post format) and that will be used instead.
					 */
					// get_template_part( 'content', get_post_format() );
          ?>
          <div class="prayer-room-entry">
            <div class="prayer-room-entry-header">
              <p><strong><?php the_author(); ?></strong></p>
              <p><?php the_date(); ?></p>
            </div>
            <p><?php the_content(); ?></p>
            <p><a href="#">아멘</a> 123</p>
            <p><input type="text" size="25" /> <input type="button" value="기도문 남기기" /></p>
          </div><?php
					endwhile;
					// Previous/next page navigation.
					// twentyfourteen_paging_nav();

				else :
					// If no content, include the "No posts found" template.
					get_template_part( 'content', 'none' );

				endif;
			?>
      </div>
		</div><!-- #content -->
	</section><!-- #primary -->

<?php
if(!isset($_GET["mobile"])) {
	get_sidebar( 'content' );
	get_sidebar();
}
?>
<div style="clear:both;"></div>
<?php get_footer(); ?>
