	<?php get_header();?>
	<div class="container-wrap">
	<aside id="fh5co-hero">
			<div class="flexslider">
				<?php $postSlideData = getDataAboutPageSlideById(386) ?>
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
		<div id="fh5co-contact">
			<div class="row animate-box">
				<div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
					<?php the_post();the_content();?>
				</div>
			</div>
			<div class="row">
				<?php dynamic_sidebar('contact-data') ?>
				<div class="col-md-7 col-md-push-1 animate-box">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Name">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Email">
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<textarea name="" class="form-control" id="" cols="30" rows="7" placeholder="Message"></textarea>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<input type="submit" value="Send Message" class="btn btn-primary btn-modify">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div><!-- END container-wrap -->

	<?php get_footer();?>
