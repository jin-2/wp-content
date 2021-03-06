<?php
/**
 * @package Inesta
 */
/*
Template Name: Sidebar Right
*/

	get_header(); 
	get_template_part( 'assets/php/partials/nav', 'header' );
?>

<section id="blog" class="subpage">
	<div class="section-text-1">
		<span class="up"><?php the_title(); ?></span>
	</div>
	<div class="divider-2"></div>
		<div class="container">
			<div class="row">		
				<div class="col-sm-8 col-lg-8">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?> 
					<div <?php post_class( 'text-edit post');?> >
					<?php
						if ( has_post_thumbnail() ) { 
						echo '<div class="media full-page-media">';
						 the_post_thumbnail( 'post-thumb', array('class' => 'img-responsive post-thumb') );
						 echo '</div>';
						}
					?>
						<?php the_content(); ?> 
					</div>
				<?php endwhile; else: ?>
					<?php get_template_part( 'no-results', 'index' ); ?>
				<?php endif; ?>
				</div>
				<div class="col-sm-4 col-lg-4">
					<?php get_sidebar(); ?>
				</div>	
			</div>
		</div>
</section>

<?php get_footer(); ?>