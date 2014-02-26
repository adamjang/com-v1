<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package adamjang
 */
?>

<ul class="projects acc">
	
	<?php

		$count = 0;
		$args = array( 'post_type' => 'projects', 'posts_per_page' => -1, 'orderby' => 'menu_order', 'order' => 'asc' );
		$loop = new WP_Query( $args );
		while ( $loop->have_posts() ) : $loop->the_post();

		$first = ($count == 0) ? 'vis' : '';
		$class = ($count % 2) ? 'even' : 'odd';

		if($count == 0){
			$bg = 'wendys.jpg';
		}elseif($count == 1){
			$bg = 'cision.jpg';
		}elseif($count == 2){
			$bg = 'kia.jpg';
		}elseif($count == 3){
			$bg = 'boostagents.jpg';
		}else{
			$bg = 'nissan.jpg';
		}

	?>
		
		<li class="project acc-item <?php echo $first ?> <?php echo $class ?>" style="background-image: url(<?php echo get_bloginfo('template_directory'); ?>/img/<?php echo $bg ?>)">
			<div class="acc-item__inner">
 				<div class="acc-item--title">
					<div class="content">
						<div class="acc-title">
							<?php echo the_title() ?>
							<span class="acc-tags">Front End Development</span>
						</div>
						
					</div>
					<!-- <div class="acc-title--background"></div> -->
				</div>
				<!-- /.acc-item--title -->

				<div class="acc-item--preview container">
					<div class="content">
						<div class="inner grid">
							<div class="grid__item one-half tab-portrait-down--one-whole">
								<?php the_excerpt(); ?>
							</div>
							
							<div class="grid__item one-quarter push--tab-portrait-up--one-quarter tab-portrait-down--one-whole">
								<div class="grid">
									<div class="grid__item one-whole tab-portrait-down--one-half">
										<hr class="divider--small mobile-only">
										<a class="view-case" href="<?php the_permalink(); ?>">read the case study</a>
									</div>	
									<div class="grid__item one-whole tab-portrait-down--one-half">
										<hr class="divider--small">
										<a href="http://kiacanada.com">www.kiacanada.com</a>
									</div>
								</div>
								
							</div>
						</div>
					</div>
				</div> 
				<!-- /.acc-item--preview -->

				<!-- <div class="blackout"></div> -->

			</div>
			<!-- /.acc-item__inner -->

		</li> <!-- /article -->

	<?php 

		$count++;
		endwhile; 

	?>

</ul>