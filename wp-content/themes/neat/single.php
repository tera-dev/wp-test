<?php get_header();?>
	<div class="container-wrap">
		<div id="fh5co-blog">
			<?php the_post();?>
			<?php the_post_thumbnail('large')?>
			<h1><?php the_title() ?></h1>
			<?php the_content()?>
		</div>
	</div><!-- END container-wrap -->

<?php get_footer();?>