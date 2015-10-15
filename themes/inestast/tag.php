<?php
/**
 * @package Inesta
 */
	save_smof_options(); global $smof_data;
	get_header(); 
	get_template_part( 'assets/php/partials/nav', 'header' );
?>
<div id="blog" class="section">
	<div class="container">
		<div class="row">
			<div class="title">
				<h2>Tag</h2>  
				<div class="head-line-dark"></div>
			</div>
			<?php if($smof_data['default_layout']=='2c-l-fixed'): ?>
				<div class="col-sm-4 col-lg-4">
					<?php get_sidebar(); ?>
				</div>
			<?php endif;?>	
			<!-- CONTENT -->
			<div class="col-md-9">
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
</div>
		
<?php get_footer(); ?>