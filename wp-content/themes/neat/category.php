<?php get_header();?>
	<div class="container-wrap">
		<aside id="fh5co-hero">
			<div class="flexslider">
				<?php $postSlideData = getDataAboutPageSlideById(368);?>
				<ul class="slides">
			   	<li style="background-image: url(<?php echo $postSlideData['thumbnail_url']?>);">
			   		<div class="overlay-gradient"></div>
			   		<div class="container-fluids">
			   			<div class="row">
				   			<div class="col-md-6 col-md-offset-3 slider-text slider-text-bg">
				   				<div class="slider-text-inner text-center">
				   					<h1><?php echo $postSlideData['title']?></h1>
										<h2><?php echo $postSlideData['content']?></h2>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>		   	
			  	</ul>
		  	</div>
		</aside>		
		<div id="fh5co-blog">
			<div class="row">

				<?php if(have_posts()): 
					while(have_posts()): the_post(); ?>
						<div class="col-md-4">
							<div class="fh5co-blog animate-box">
								<a href="<?php the_permalink()?>" class="blog-bg" style="background-image: url(<?php echo has_post_thumbnail() ?
									get_the_post_thumbnail_url() : getDefaultThumbnailImageSrc() ?>);"></a>
								<div class="blog-text">
									<span class="posted_on"><?php the_modified_date()?></span>
									<h3><?php the_title() ?></h3>
									<p><?php the_field('brief-description') ?></p>
									<ul class="stuff">
										
										<li><i class="icon-heart3"></i></li>
										<li><i class="icon-eye2"></i><?php if(function_exists('the_views')) the_views(); ?></li>
										<li><?php if(function_exists('wp_ulike')) wp_ulike('get')?></li>
										<li><a href="<?php the_permalink()?>">Read More<i class="icon-arrow-right22"></i></a></li>
									</ul>
								</div> 
							</div>
							<?php echo ($code) ?>
						</div>
					<?php endwhile; ?>
				<?php else: ?>
					Записей нет!
				<?php endif; ?>
			</div>
		</div>
	</div><!-- END container-wrap -->

	<?php get_footer();?>

