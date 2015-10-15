<?php
/**
 * @package Inesta
*/
save_smof_options(); global $smof_data;
?>
<?php if($smof_data['menu_position']=='top_menu'): ?>
<!-- MAIN MENU -->	
<div id="nav-main" class="sticky-menu">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div id="logo-container">	
					<div class="tb">
						<div class="tb-cell">
					<a href="<?php echo home_url(); ?>">
						<?php if($smof_data['logo_image']):?>
						<img alt="<?php echo get_bloginfo('name');?>" id="logo" title="logo" src="<?php echo $smof_data['logo_image'];?>" <?php if($smof_data['retina_image']){ echo "data-at2x=\"".$smof_data['retina_image']."\"";}?> class="img-responsive" />						<?php else:?>							<h2 id="logo"><?php echo get_bloginfo('name');?></h2>						<?php endif;?>						</a>			
						</div>
					</div>
				</div>							
					<?php wp_nav_menu(array(								
					'container' => 'nav',								
					'container_class' => 'menu_container',					
					'theme_location'  => 'primary',						
				'menu_class'      => 'visible-md visible-lg',				
				'menu_id'         => 'desktop-menu',						
				'fallback_cb' => 'no_main' 						
				)); ?> 			
				<div id="mobile-menu-button" class="hidden-md hidden-lg">		
				<i class="fa fa-bars"></i>			
				</div>					
				<div class="clear"></div>				
			</div>			
		</div>		
	</div>		
<!-- MOBILE MENU -->		
	<nav id="mobile-menu">			
		<div class="container hidden-lg hidden-md">				
			<div class="row">					
				<div class="col-md-12">					
					<?php wp_nav_menu(array('menu_id'=> '','menu_class'=> '','theme_location' => 'primary',)); ?> 					
				</div>				
			</div> 			
		</div>		
	</nav>			
</div>
<?php endif; ?>
<!-- HEADER -->
<?php if($smof_data['type_home_section']!='none'):?>
	<?php if(is_front_page() ):?>
		
	
	<?php if($smof_data['type_home_section']=='bgimage'):?>
	<header id="header-main" class="slide-menu">
		<div class="pattern"></div>
		<div id="slideshow-header">
			<?php
				$slides = $smof_data['ef1_slider']; //get the slides array
				$number = 0;
				foreach ($slides as $slide) {
				echo '<div id="bg'.++$number.'" class="bg-slider" style="background:url( '.$slide['url'].')"></div>';
				}
			?>
		</div>
	<?php elseif($smof_data['type_home_section']=='bgvideo'): ?>
	<header id="header-main" class="slide-menu parallax-off" style="background: url(<?php echo $smof_data['background_video_thumb'] ?>);">
		<video id="video-background" preload="auto" autoplay="true" loop="loop" muted="muted" volume="0">
		<?php if($smof_data['background_video_type_webm']){
		echo '<source src="'.$smof_data['background_video_type_webm'].'" type="video/webm">';}
		if($smof_data['background_video_type_mp4']){
		echo '<source src="'.$smof_data['background_video_type_mp4'].'" type="video/mp4">';}  ?>
		</video>
	<?php endif;?>
	<?php if($smof_data['type_home_section']=='bgvideo' || $smof_data['type_home_section']=='bgimage'):?>
		<div class="field-table">
			<div class="table-container">
				<div id="header-text">
					<ul id="header-slider">
					<?php echo $smof_data['title_home'];?>
					</ul>
					<span class="second-text"><?php echo $smof_data['subtitle_home'];?></span>
				</div>
			</div>
		</div>
	</header>
	<?php endif;?>	

	<?php if($smof_data['type_home_section']=='revslider'): ?>
		<header id="header-main" class="slide-menu">
			<?php putRevSlider($smof_data['revolution_slider']); ?> 
		</header>
	<?php endif; ?>
	<?php if($smof_data['type_home_section']=='layerslider'): ?>
		<header id="header-main" class="slide-menu">
			<?php layerslider($smof_data['layer_slider']); ?> 
		</header>
	<?php endif; ?>
<?php endif;endif;?><?php if($smof_data['menu_position']=='after_header_menu'): ?>			<!-- MAIN MENU -->	<div id="nav-main" class="sticky-menu">		<div class="container">			<div class="row">				<div class="col-md-12">					<div id="logo-container"><div class="tb"><div class="tb-cell">						<a href="<?php echo home_url(); ?>">						<?php if($smof_data['logo_image']):?>							<img alt="<?php echo get_bloginfo('name');?>" id="logo" title="logo" src="<?php echo $smof_data['logo_image'];?>" <?php if($smof_data['retina_image']){ echo "data-at2x=\"".$smof_data['retina_image']."\"";}?> class="img-responsive" />						<?php else:?>							<h2 id="logo"><?php echo get_bloginfo('name');?></h2>						<?php endif;?>						</a>					</div></div></div>							<?php wp_nav_menu(array(								'container' => 'nav',								'container_class' => 'menu_container',								'theme_location'  => 'primary',								'menu_class'      => 'visible-md visible-lg',								'menu_id'         => 'desktop-menu',								'fallback_cb' => 'no_main' 							)); ?> 					<div id="mobile-menu-button" class="hidden-md hidden-lg">						<i class="fa fa-bars"></i>					</div>					<div class="clear"></div>							</div>			</div>		</div>		<!-- MOBILE MENU -->		<nav id="mobile-menu">			<div class="container hidden-lg hidden-md">				<div class="row">					<div class="col-md-12">					<?php wp_nav_menu(array('menu_id'=> '','menu_class'=> '','theme_location' => 'primary',)); ?> 					</div>				</div> 			</div>		</nav>			</div><?php endif; ?>
