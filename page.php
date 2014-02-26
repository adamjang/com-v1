<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package adamjang
 */

if($_SERVER['HTTP_X_REQUESTED_WITH']==''):
    get_header();
endif;

?>

	<div id="main" class="site-main container" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<div class="inner">

			<?php get_template_part( 'content', 'page' ); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) :
					comments_template();
				endif;
			?>
			
			</div>

		<?php endwhile; // end of the loop. ?>

	</div><!-- #main -->

<?php
if($_SERVER['HTTP_X_REQUESTED_WITH']==''):
	//get_sidebar();
    get_footer();
endif;
?>