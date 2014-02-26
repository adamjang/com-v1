<?php
/**
 * @package adamjang
 */
?>

<article id="post-<?php the_ID(); ?>">
	<header class="entry-header">
		<h1 class="entry-title content"><?php the_title(); ?></h1>
		<?php //get_excerpt() ?>
		<div class="entry-meta wrapper content">

			<?php

				$projectmeta = ($post->post_excerpt) ? 'project-meta has-excerpt' : 'project-meta ';
				$projectdesc = ($post->post_excerpt) ? 'project-desc has-excerpt' : 'project-desc ';

			?>
			
			<div class="<?php echo $projectmeta ?>">
				<ul class="inner">
					<li><span class="project-meta-title">Role:</span> Web Developer</li>
					<li><span class="project-meta-title">Created:</span> 2012</li>
					<li><span class="project-meta-title">Agency:</span> Oddlystudios, Maclaren McCann</li>
					<li><span class="project-meta-title">Client:</span> Cision Canada</li>
				</ul>
			</div><!-- /.project-title -->

			<div class="<?php echo $projectdesc ?>">
				<div class="inner ">
					<?php the_excerpt(); ?>
				</div>
			</div><!-- /.project-meta -->

		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content screenshot-wrap">
		<div class="content">
			<?php the_content(); ?>
		</div>
	</div><!-- .entry-content -->
	<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'adamjang' ),
			'after'  => '</div>',
		) );
	?>
</article><!-- #post-## -->
