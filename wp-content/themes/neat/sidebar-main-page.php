	<aside id="fh5co-hero">
		<div class="flexslider">
			<ul class="slides">

				<?php
				$posts = get_posts( array(
					'orderby'     => 'date',
					'order'       => 'DESC',
					'post_type'   => 'slides-main-page',
				) );?>
					
				<?php foreach( $posts as $post ): setup_postdata($post); ?>
					<li style="background-image: url( <?php the_field('slide-picture');  ?> );">
						<div class="overlay-gradient"></div>
						<div class="container-fluid">
							<div class="row">
								<div class="col-md-6 col-md-offset-3 <?php the_field('content-placement-class');?> slider-text">
									<div class="slider-text-inner">
										<h1><?php the_title(); ?></h1>
											<h2><?php the_content(); ?></h2>
											<p>
												<a class="btn btn-primary btn-demo" href="<?php the_field('link-for-demo-button');?>"></i> View Demo</a> 
												<a class="btn btn-primary btn-learn" href="<?php the_field('link-for-learn-more-button');?>">Learn More</a>
											</p>
									</div>
								</div>
							</div>
						</div>
					</li>
				<?php endforeach;?>
				<?php wp_reset_postdata();?>
			</ul>
		</div>
	</aside>