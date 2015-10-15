<?php
/**
 * @package Inesta
 */
?>
<?php save_smof_options(); global $smof_data;?>
<?php get_header(); ?>

<?php get_template_part( 'assets/php/partials/nav', 'header' ); ?>
<section id="blog" class="subpage">
	<div class="section-text-1">
		<span class="up"><?php  single_cat_title();  ?></span>
	</div>
	<div class="divider-2"></div>

	<div class="container">
		<div class="row">
			<?php if($smof_data['default_layout']=='2c-l-fixed'): ?>
				<div class="col-sm-4 col-lg-4">
					<?php get_sidebar(); ?>
				</div>
			<?php endif;?>
			<!-- CONTENT COLUMN -->
			<div class="col-sm-8 col-lg-8">
				<!-- FIRST POST BLOG -->
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'assets/php/partials/content', 'category' ); ?>
				<?php endwhile; else: ?>
					<?php get_template_part( 'no-results', 'index' ); ?>
				<?php endif;?>
					<nav id="post-nav">
						<?php if($smof_data['pagination_type']=='n_p'){ 
								posts_nav_link(' ', '<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>');}
							else {
								my_pagination();}?>
					</nav>
			</div>
			<?php wp_reset_query(); ?>
			<!-- SIDEBAR -->
			<?php if($smof_data['default_layout']=='2c-r-fixed'):  ?>
						<div class="col-sm-4 col-lg-4">
							<?php get_sidebar(); ?>
						</div>
			<?php endif;?>
		</div>
	</div>
</section>

<?php get_footer(); ?>