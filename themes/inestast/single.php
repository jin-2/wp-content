<?php
/**
 * @package Inesta
 */

	save_smof_options(); global $smof_data;
	get_header(); 
	get_template_part( 'assets/php/partials/nav', 'header' );
?>
<section id="blog" class="subpage">
	<div class="section-text-1">
		<span class="up"><?php $categories = get_the_category(); foreach($categories as $category) { $cat_name = $category->name; if($cat_name != 'featured') echo ''.$cat_name . ' '; } ?></span>
	</div>
	<div class="divider-2"></div>
	<div class="container">
		<div class="row">
			<?php if($smof_data['default_layout']=='2c-l-fixed'): ?>
				<div class="col-sm-4 col-lg-4">
					<?php get_sidebar(); ?>
				</div>
			<?php endif;?>			
			<div class="col-sm-8 col-lg-8">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?> 
					<?php get_template_part( 'assets/php/partials/content', 'single' ); ?> 
				<?php endwhile; else: ?>
					<?php get_template_part( 'no-results', 'index' ); ?>
				<?php endif; ?>
					  
			</div>
			<?php if($smof_data['default_layout']=='2c-r-fixed'):  ?>
						<div class="col-sm-4 col-lg-4">
							<?php get_sidebar(); ?>
						</div>
			<?php endif;?>
		</div>
	</div>
</section>

<?php get_footer(); ?>