<?php
/**
 *
 * TEMPLATE NAME: Home
 *
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

	<div id="primary" class="content-area">

		<div class="site-hero container">
			<div class="content">
				<h1 class="site-description bold">Hello, my name is Adam</h1>
				<h2 class="site-description">I am a TORONTO BASED FRONT END DEVELOPER <br class="mobile-hide">Who is currently available for hire, get in <a href="#">touch</a>.</h2>
			</div>
		</div>
		<!-- /.hero -->

		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'accordion' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
if($_SERVER['HTTP_X_REQUESTED_WITH']==''):
	//get_sidebar();
    get_footer();
endif;
?>
