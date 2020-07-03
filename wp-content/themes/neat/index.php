<?php get_header(); ?>
			
			<div class="container-wrap">

				<?php //dynamic_sidebar('featured-and-latest-posts') ?>

				<?php get_sidebar('main-page'); ?>
				<div id="fh5co-services">
					<div class="row out-container-services">
						<?php $posts = get_posts( array(
								'orderby'     => 'date',
								'order'       => 'DESC',
								'post_type'   => 'services',
							) );?>

						<?php foreach( $posts as $post ): setup_postdata($post);?>
							<div class="col-md-4 text-center animate-box services">
								<div >
									<p class="icon">
										<i class="<?php the_field('font-icon-class');  ?>"></i>
									</p>
									<div class="desc">
										<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
										<p><?php the_field('service-short-description') ?></p>
									</div>
								</div>
							</div>
						<?php endforeach;?>
						<?php wp_reset_postdata();?>

					</div>
				</div>
				<div id="fh5co-work" class="fh5co-light-grey">

					<?php dynamic_sidebar('projects-description') ?>

					<div class="row">
						<?php $postsProjects = get_posts( array(
								'numberposts' => 3,
								'orderby'     => 'date',
								'order'       => 'DESC',
								'post_type'   => 'work-projects',
							) );?>

						<?php foreach( $postsProjects as $post ): setup_postdata($post);?>
							<div class="col-md-4 text-center animate-box">
								<a href="<?php the_permalink()?>" class="work"  
								style="background-image: url( <?php echo has_post_thumbnail() ? the_post_thumbnail_url('large') : getDefaultThumbnailImageSrc()?>);">
									<div class="desc">
										<h3><?php the_title() ?></h3>
										<span><?php $featured_posts = get_field('project-services');
												if( $featured_posts ) echo $featured_posts[0]->post_title;?></span>
									</div>
								</a>
							</div>
						<?php endforeach;?>
						<?php wp_reset_postdata();?>
					</div>
				</div>

				<div id="fh5co-counter" class="fh5co-counters">
					<?php dynamic_sidebar('statistics-description')?>
					<div class="row animate-box counter-flexible">
						<div class="col-md-8 center-block">
							<div class="row counter-flexible">
								<?php dynamic_sidebar('statistics') ?>
							</div>
						</div>
					</div>
				</div>
				
				<?php dynamic_sidebar('featured-and-latest-posts') ?>

			</div>
			<!-- END container-wrap -->
			
			<?php get_footer(); ?>
