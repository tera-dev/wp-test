<?php get_header();?>

	<div class="container-wrap">
		<aside id="fh5co-hero">
			<div class="flexslider">	
				<?php $postSlideData = getDataAboutPageSlideById(367);?>
				<ul class="slides">
			   	<li style="background-image: url(<?php echo $postSlideData['thumbnail_url']?>);">
			   		<div class="overlay-gradient"></div>
		   			<div class="row">
			   			<div class="col-md-6 col-md-offset-3 slider-text slider-text-bg">
			   				<div class="slider-text-inner text-center">
			   					<h1><?php echo $postSlideData['title']?></h1>
									<h2><?php echo $postSlideData['content']?></h2>
			   				</div>
			   			</div>
			   		</div>
			   	</li>   	
			  	</ul>
		  	</div>
		</aside>		
		<div id="fh5co-work">
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
	</div><!-- END container-wrap -->

	<?php get_footer();?>