<?php
/**
 * @package Inesta
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
				<div class="col-sm-12 col-lg-12">
					<?php
						if ( has_post_thumbnail() ) { 
						echo '<div class="media full-page-media">';
						 the_post_thumbnail( 'post-thumb-big', array('class' => 'img-responsive post-thumb-big') );
						 echo '</div>';
						}
					?>
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?> 
						<div <?php post_class( 'text-edit post');?> >  
							<?php the_content(); ?> 
						</div>
					<?php endwhile; else: ?>
						<?php get_template_part( 'no-results', 'index' ); ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
</section>

<?php get_footer(); ?>