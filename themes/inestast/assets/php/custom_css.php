<?php 
/**
 * @package Inesta
 */
 
 function generate_dynamic_style_css() {
 save_smof_options(); global $smof_data;
	$ef1_custom_style = '';
	//headers
	$ef1_custom_style .= "h1 {\n font-size:".$smof_data['h1_font']['size'].";\n color:".$smof_data['h1_font']['color'].";\n}\n";
	$ef1_custom_style .= "h2 {\n font-size:".$smof_data['h2_font']['size'].";\n color:".$smof_data['h2_font']['color'].";\n}\n";
	$ef1_custom_style .= "h3 {\n font-size:".$smof_data['h3_font']['size'].";\n color:".$smof_data['h3_font']['color'].";\n}\n";
	$ef1_custom_style .= "h4 {\n font-size:".$smof_data['h4_font']['size'].";\n color:".$smof_data['h4_font']['color'].";\n}\n";
	$ef1_custom_style .= "h5 {\n font-size:".$smof_data['h5_font']['size'].";\n color:".$smof_data['h5_font']['color'].";\n}\n";
	$ef1_custom_style .= "h6 {\n font-size:".$smof_data['h6_font']['size'].";\n color:".$smof_data['h6_font']['color'].";\n}\n";
	// general color
	if($smof_data['general_color']){
		$ef1_custom_style .= ".general-color, #desktop-menu .active a, .infobox-2 header div i, .social-1:hover,  .text-edit .social-1:hover, #portfolio-categories ul li a:hover, .readmore a:hover, .post header h1 a:hover, .post header h2 a:hover, .post header h3 a:hover, .post header h4 a:hover, .post header h5 a:hover, .post header h6 a:hover, .widget ul li a:hover, .post header p a:hover, #tags a:hover, #list-comments li a:hover, #post-nav a:hover, .media .rslides_nav:hover, #desktop-menu .sub-menu .current_menu_item a, .text-edit a, .comment-body a, .infobox-1 i, .number-container .number, .contact-box:hover i, #portfolio-categories .current-cat a, #desktop-menu > .current-menu-item > a, #mobile-menu .current-menu-item > a, .portfolio-slideshow .rslides_nav:hover {
		color:".$smof_data['general_color']." !important;\n }";
		
		$ef1_custom_style .= ".general-bg, #submit-button-contact, #comment-form input[type='submit']:hover, .text-edit thead th, .comment-body thead th, #desktop-menu .sub-menu li:hover > a, #desktop-menu .sub-menu .current-menu-item > a, #home-button:hover { 
		background-color:".$smof_data['general_color']." !important;\n }";
		
		$ef1_custom_style .= ".general-border, .text-edit blockquote, #contact-form-script input[type='text']:focus, #contact-form-script textarea:focus, .style-input:focus, #portfolio-categories .current-cat a, #portfolio-categories .current-cat:hover a { 
		border-color:".$smof_data['general_color']." !important;\n
		}\n
		.active-tab {
			border-top-color:".$smof_data['general_color']." !important;\n
		}\n
		";
	}
	//body font
	$ef1_custom_style .= "body {\n
	color:".$smof_data['body_text_font']['color'].";
	font:".$smof_data['body_text_font']['style']." ".$smof_data['body_text_font']['size']." ".$smof_data['body_text_font']['face'].";\n}"; 
	
	$ef1_custom_style .= "h1,h2,h3,h4,h5,h6 {\n
	font-family:".$smof_data['g_select'].";\n}";  
	 
	$ef1_custom_style .= "#desktop-menu > li > a {\n
	color:".$smof_data['navigation_typography']['color']." !important;
	font-size:".$smof_data['navigation_typography']['size'].";
	font-style:".$smof_data['navigation_typography']['style'].";
	font-family:".$smof_data['navigation_typography']['face'].";\n}"; 
	
	$ef1_custom_style .= "#desktop-menu > li > a:hover, #desktop-menu .active a,#desktop-menu > li:hover > a, #desktop-menu .current-menu-item > a {\n
	color:".$smof_data['navigation_typography_hover']['color']." !important;
	font-size:".$smof_data['navigation_typography_hover']['size'].";
	font-style:".$smof_data['navigation_typography_hover']['style'].";
	font-family:".$smof_data['navigation_typography_hover']['face'].";\n}"; 
	 
	$ef1_custom_style .= "#copyright {\n
	color:".$smof_data['copyright_text__typography']['color']." !important;
	font-size:".$smof_data['copyright_text__typography']['size'].";
	font-style:".$smof_data['copyright_text__typography']['style'].";
	font-family:".$smof_data['copyright_text__typography']['face'].";\n}";

	$ef1_custom_style .= "#nav-main {\n
	background-color:".$smof_data['header_color']." !important;\n}"; 
	$ef1_custom_style .= "#foot-page {\n
	background-color:".$smof_data['footer_color']." !important;\n}"; 
	$ef1_custom_style .= " #desktop-menu .sub-menu li:hover > a, #desktop-menu .sub-menu .current-menu-item > a {\n
	background-color:".$smof_data['submenu_hover_color']." !important;\n}"; 
	$ef1_custom_style .= "#desktop-menu .sub-menu, #mobile-menu {\n
	background-color:".$smof_data['submenu_color']." !important;\n}"; 
	
	$ef1_custom_style .= "#desktop-menu .sub-menu li a  {\n
	color:".$smof_data['navigation_typography_submenu']['color']." !important;
	font-size:".$smof_data['navigation_typography_submenu']['size'].";
	font-style:".$smof_data['navigation_typography_submenu']['style'].";
	font-family:".$smof_data['navigation_typography_submenu']['face'].";\n}";
	
	$ef1_custom_style .= "#desktop-menu .sub-menu li:hover > a, #desktop-menu .sub-menu .current-menu-item > a   {\n
	color:".$smof_data['navigation_typography_submenu_hover']['color']." !important;
	font-size:".$smof_data['navigation_typography_submenu_hover']['size'].";
	font-style:".$smof_data['navigation_typography_submenu_hover']['style'].";
	font-family:".$smof_data['navigation_typography_submenu_hover']['face'].";\n}";
	if(!empty($ef1_custom_style)){
			$wrap_css ='';

			$wrap_css .="\n<!-- CUSTOM STYLE -->\n";
			$wrap_css .="<style type=\"text/css\">\n";

			$wrap_css .= $ef1_custom_style;

			$wrap_css .="\n\n</style>\n<!-- END CUSTOM STYLE -->\n";

			echo $wrap_css;
	}
 }
 add_action('wp_head','generate_dynamic_style_css'); 
 
 function google_fonts_head(){
	save_smof_options(); global $smof_data;
	 $headings_font1 = str_replace(" ", "+",$smof_data['g_select']);
	echo '<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family='.$headings_font1.':400,400italic,700,700italic"/>';
	$headings_font2 = str_replace(" ", "+",$smof_data['body_text_font']['face']);
	if($headings_font2 != 'arial' && $headings_font2 != 'verdana' && $headings_font2 != 'trebuchet' && $headings_font2 != 'georgia' && $headings_font2 != 'times' && $headings_font2 != 'tahoma' && $headings_font2 != 'helvetica' && $headings_font2 != $headings_font1){ 
	echo '<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family='.$headings_font2.':400,400italic,700,700italic"/>';}
	$headings_font3 = str_replace(" ", "+",$smof_data['navigation_typography']['face']);
	if($headings_font3 != 'arial' && $headings_font3 != 'verdana' && $headings_font3 != 'trebuchet' && $headings_font3 != 'georgia' && $headings_font3 != 'times' && $headings_font3 != 'tahoma' && $headings_font3 != 'helvetica' && $headings_font3 != $headings_font1 && $headings_font3 != $headings_font2){ 
	echo '<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family='.$headings_font3.':400,400italic,700,700italic"/>';}
	
	$headings_font4 = str_replace(" ", "+",$smof_data['navigation_typography_hover']['face']);
	if($headings_font4 != 'arial' && $headings_font4 != 'verdana' && $headings_font4 != 'trebuchet' && $headings_font4 != 'georgia' && $headings_font4 != 'times' && $headings_font4 != 'tahoma' && $headings_font4 != 'helvetica' && $headings_font4 != $headings_font1 && $headings_font4 != $headings_font2  && $headings_font4 != $headings_font3){ 
	echo '<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family='.$headings_font4.':400,400italic,700,700italic"/>';}
	
	$headings_font5 = str_replace(" ", "+",$smof_data['copyright_text__typography']['face']);
	if($headings_font5 != 'arial' && $headings_font5 != 'verdana' && $headings_font5 != 'trebuchet' && $headings_font5 != 'georgia' && $headings_font5 != 'times' && $headings_font5 != 'tahoma' && $headings_font5 != 'helvetica' && $headings_font5 != $headings_font1 && $headings_font5 != $headings_font2  && $headings_font5 != $headings_font3 && $headings_font5 != $headings_font4){ 
	echo '<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family='.$headings_font5.':400,400italic,700,700italic"/>';}
	
	$headings_font6 = str_replace(" ", "+",$smof_data['navigation_typography_submenu']['face']);
	if($headings_font6 != 'arial' && $headings_font6 != 'verdana' && $headings_font6 != 'trebuchet' && $headings_font6 != 'georgia' && $headings_font6 != 'times' && $headings_font6 != 'tahoma' && $headings_font6 != 'helvetica' && $headings_font6 != $headings_font1 && $headings_font6 != $headings_font2  && $headings_font6 != $headings_font3 && $headings_font6 != $headings_font4 && $headings_font6 != $headings_font5){ 
	echo '<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family='.$headings_font6.':400,400italic,700,700italic"/>';}
	
	
	$headings_font7 = str_replace(" ", "+",$smof_data['navigation_typography_submenu_hover']['face']);
	if($headings_font7 != 'arial' && $headings_font7 != 'verdana' && $headings_font7 != 'trebuchet' && $headings_font7 != 'georgia' && $headings_font5 != 'times' && $headings_font5 != 'tahoma' && $headings_font7 != 'helvetica' && $headings_font7 != $headings_font1 && $headings_font7 != $headings_font2  && $headings_font7 != $headings_font3 && $headings_font7 != $headings_font7 && $headings_font7 != $headings_font6 && $headings_font7 != $headings_font6){ 
	echo '<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family='.$headings_font7.':400,400italic,700,700italic"/>';}
 }
 add_action('wp_head','google_fonts_head'); 