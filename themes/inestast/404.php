<?php
/**
 * @package Inesta
*/

 get_header(); 
 get_template_part( 'assets/php/partials/nav', 'header' ); 
 save_smof_options(); global $smof_data;
?>

<div id="error">	<div>
		<h1><?php
			if($smof_data['404_title_text']) {
				echo $smof_data['404_title_text'];
			}
		?></h1>
		<p class="error-text"><?php
			if($smof_data['404_text']) {
				echo $smof_data['404_text'];
			}
		?></p>
		<?php if($smof_data['404_link']):?>
		<a href="<?php echo home_url(); ?>" class="button-style-3"><?php echo $smof_data['404_link'];?></a>
		<?php endif;?>	</div>
</div>

<?php get_footer(); ?>