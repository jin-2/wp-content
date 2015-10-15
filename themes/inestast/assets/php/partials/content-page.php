<?php
/**
 * @package Inesta
 */

$title = get_the_title();
$bg_img = get_post_meta( get_the_ID(),'background_image',true );
$background_color = get_post_meta( get_the_ID(),'background_color',true );
$bg_type =  get_post_meta( get_the_ID(),'background_type',true );
$container_width =  get_post_meta( get_the_ID(),'container_width',true );
$parallax =  get_post_meta( get_the_ID(),'background_parallax',true );

 ?>

<div id="<?php echo sanitize_title($title); ?>" style="<?php  
if($bg_type == 'image')
echo (!empty($bg_img))?'background-image:url('.$bg_img.');':'' ;
elseif($bg_type == 'color') 
echo (!empty($background_color))?'background-color:'.$background_color.'':'' ;

?>" class="section-main gap-bottom slide-menu text-edit<?php if($bg_type == 'image'){ if($parallax == 1){ echo ' parallax-'.get_the_ID();}}?>">
			<?php if($container_width == "default"): ?>
			<div class="container">
				<div class="row">
			<?php endif; ?>
				<?php the_content();?>
			<?php if($container_width == 'default'): ?>		 
				</div>
			</div>
			<?php endif; ?>
		</div>