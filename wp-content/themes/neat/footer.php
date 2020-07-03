			<div class="container-wrap">
				<footer id="fh5co-footer" role="contentinfo">
					<div class="row footer-flexible">
						<div class="col-md-3">
							<h4>About <?php bloginfo('name')?></h4>
							<p><?php bloginfo('description') ?></p>
						</div>
						<?php dynamic_sidebar('footer-widgets') ?>
					</div>

					<div class="row copyright">
						<div class="col-md-12 text-center">
							<p>
								<small class="block">&copy; 2016 Free HTML5. All Rights Reserved.</small> 
								<small class="block">Designed by <a href="http://freehtml5.co/" target="_blank">FreeHTML5.co</a> Demo Images: <a href="http://unsplash.co/" target="_blank">Unsplash</a></small>
							</p>
							<?php dynamic_sidebar('social-links-in-footer') ?>
							<!-- <p>
								<ul class="fh5co-social-icons">
									<li><a href="#"><i class="icon-twitter"></i></a></li>
									<li><a href="#"><i class="icon-facebook"></i></a></li>
									<li><a href="#"><i class="icon-linkedin"></i></a></li>
									<li><a href="#"><i class="icon-dribbble"></i></a></li>
								</ul>
							</p> -->
						</div>
					</div>
				</footer>
				<?php wp_footer(); ?>
			</div><!-- END container-wrap -->
		</div> <!-- END div#page-->

		<div class="gototop js-top">
			<a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
		</div>
	</body>
</html>