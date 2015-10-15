<?php
/**
 * Inesta functions and definitions
 *
 * @package Inesta
 */

	global $wp_version,$is_IE;
 
	define('EF1_FUNCTIONS', get_template_directory()  . '/assets/php');
	define('EF1_INDEX_JS', get_template_directory_uri()  . '/assets/js/');
	define('EF1_INDEX_CSS', get_template_directory_uri()  . '/assets/css/');
	
	include_once( 'assets/php/options/ot-loader.php' );
	//include_once( 'assets/php/options/theme-options.php' );
	require_once ('assets/php/post-types.php');
	require_once ('assets/php/tgm/tgm.php');	
	require_once ('assets/php/pagination.php');		
	require_once ('assets/php/theme_options/admin/index.php');	
	require_once ('assets/php/custom_css.php');
	include( EF1_FUNCTIONS . '/shortcodes/shortcodes.php' );
	include( EF1_FUNCTIONS. '/shortcodes/settings_shortcodes.php' );
	load_template( trailingslashit( get_template_directory() ) . 'assets/php/meta-boxes.php' );
	add_filter( 'ot_show_pages', '__return_false' );
	add_filter( 'ot_show_new_layout', '__return_false' ); 
	add_filter( 'ot_theme_mode', '__return_true' ); 
	
	
function register_my_menu() {
  register_nav_menu('primary',__( 'Primary Menu' ));
}
add_action( 'init', 'register_my_menu' );

function ef1_first_class(){

 $args_onepage = array(
	'posts_per_page'   => 2,
	'offset'           => 0,
	'category'         => '',
	'orderby'          => 'none',
	'order'            => 'DESC',
	'include'          => '',
	'exclude'          => '',
	'meta_key'         => '', 
	'meta_value'       => '',
	'post_type'        => 'onepage',
	'post_mime_type'   => '',
	'post_parent'      => '',
	'post_status'      => 'publish',
	'suppress_filters' => true );
	
$posts_array = get_posts( $args_onepage );
$first_class = 0; 

$first_class  = '#'.sanitize_title($posts_array[0]->post_name ); 
	return $first_class;
}

add_action( 'after_setup_theme', 'ef1_after_setup' );
if (!function_exists('ef1_after_setup')) {
	function ef1_after_setup() {
		add_theme_support('post-formats',array('gallery','video') );  
		//add feed
		add_theme_support( 'automatic-feed-links' ); 
		//add thumb 
		add_theme_support( 'post-thumbnails' ); 
		add_image_size( 'post-thumb', 750, 430, true ); 
		add_image_size( 'post-thumb-big', 1200, 720, true ); 
		add_image_size( 'portfolio-thumb', 690, 1000, true );
		add_image_size( 'four-columns', 228, 160, true );
		add_image_size( 'two-columns', 472, 295, true );
		add_image_size( 'thumbnail-large', 75, 75, true ); // Large thumbnails
		add_image_size( 'thumbnail-wide', 300, 100, true ); // Wide thumbnails
		add_image_size( 'main-image', 285, 280, true ); // Main (latest) image
		add_image_size( 'main-image-pictures', 290, 280, true ); // Main (pictures) image
		add_image_size( 'lead-image', 690, 330, true ); // Post Page Main image
		add_image_size( 'portfolio-image', 800, 450, true ); // Post Page Main image
		add_image_size( 'news-image', 370, 208, true ); // News Shorcode
	}
}
function ef1_widgets_init() {
		register_sidebar( array(
		'name' => __( 'Sidebar', '' ),
		'id' => 'sidebar-1',
		'description' => __( 'Appears when using the optional Front Page template with a page set as Static Front Page', '' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<header><h3 class="widget-title line-header">',
		'after_title' => '</h3></header>',
	) );
}
add_action( 'widgets_init', 'ef1_widgets_init' );

if ( ! isset( $content_width ) ) $content_width = 900;

// excerpt lenght 
function ef1_custom_excerpt_length( $length ) {
	if(is_home() )return 25; 
	else return 50;
}
add_filter( 'excerpt_length', 'ef1_custom_excerpt_length', 999 );
// end excerpt lenght 

//comments lvl
function ef1_change_level_comment($count) {
	if ( ! current_user_can( 'manage_network' ) ) {
       return 2; // or any number you want
   }
}
add_filter( 'thread_comments_depth_max', 'ef1_change_level_comment' ); 
	
function ef1_js_scripts() {
	save_smof_options(); global $smof_data;		wp_enqueue_script( 'plugins', EF1_INDEX_JS.'plugins.js', array('jquery'), '1.0.0', true);
	wp_enqueue_script( 'scripts', EF1_INDEX_JS.'scripts.js', array('jquery'), '1.0.0', true);		if($smof_data['enable_text_slideshow'] ) { 		wp_enqueue_script( 'header_slider', EF1_INDEX_JS.'header.slider.js', array('jquery'), '1.0.0', true);	}
	if($smof_data['enable_preloader'] ) { 
		wp_enqueue_script( 'preloader', EF1_INDEX_JS.'preloader.js', array('jquery'), '1.0.0', true);
	}
	if($smof_data['enable_sticky_menu'] ) { 
		wp_enqueue_script( 'sticky_menu', EF1_INDEX_JS.'sticky-menu.js', array('jquery'), '1.0.0', true);
	}
	if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
}
add_action( 'wp_enqueue_scripts', 'ef1_js_scripts' );

function ef1_style_js_header(){?>
	<!--[if lt IE 9]>
		<meta http-equiv="X-UA-Compatible" content="IE=8" />
	<![endif]-->
	<!--[if IE 7]>
		<script src="<?php echo EF1_INDEX_JS.'lte-ie7.js';?>"></script>
	<![endif]-->
	<!--[if lt IE 9]>
		<script src="<?php echo EF1_INDEX_JS.'html5shiv.js';?>"></script>
		<script src="<?php echo EF1_INDEX_JS.'respond.js';?>"></script>
	<![endif]-->	<script src="<?php echo EF1_INDEX_JS.'mobile_var.js';?>"></script>

<?php }
add_action( 'wp_head', 'ef1_style_js_header' ); 
	
function ef1_style() {
	wp_dequeue_style( 'ot-dynamic-dynamic-css' );
	wp_enqueue_style( 'style', get_stylesheet_directory_uri(). '/style.css' ); 
	wp_register_style( 'ie-css', EF1_INDEX_CSS.'ie.css', false);
	$GLOBALS['wp_styles']->add_data( 'ie-css', 'conditional', 'lt IE 9' );
	wp_enqueue_style( 'ie-css' );
	wp_enqueue_style( 'bootstrap', EF1_INDEX_CSS. 'bootstrap.css' );
	wp_enqueue_style( 'linecons', EF1_INDEX_CSS. 'linecons.css' );
	wp_enqueue_style( 'font-awesome', EF1_INDEX_CSS. 'font-awesome.min.css' );
	wp_enqueue_style( 'bxslider', EF1_INDEX_CSS. 'jquery.bxslider.css' );
	wp_enqueue_style( 'animate', EF1_INDEX_CSS. 'animate.min.css' );
	wp_enqueue_style( 'ot-dynamic-dynamic-css' );
}
add_action( 'wp_enqueue_scripts', 'ef1_style' );		
		
		
add_filter( 'wp_nav_menu_objects', 'single_page_nav_links' );
function single_page_nav_links( $items ) {foreach ( $items as $item ) {	if ('onepage' == $item->object) { 		$current_post = get_post($item->object_id);		$menu_title = "#".sanitize_title($current_post->post_title);		$item->url = home_url( '/' ).$menu_title;	} elseif('custom' == $item->type) {		if (1 === preg_match('/^#([^\/]+)$/', $item->url , $matches)) {			$item->url = home_url( '/' ).$item->url; 			} 		}	} return $items; }

 

function ef1_parallax(){

	$ef1_section_query = new WP_Query( array( 'post_type' => 'onepage', 'posts_per_page' => -1 )); 
	if($ef1_section_query->have_posts()):  		
		$script_return = '';
		while($ef1_section_query->have_posts()) : $ef1_section_query->the_post();
		$parallax =  get_post_meta( get_the_ID(),'background_parallax',true );
		$bg_type =  get_post_meta( get_the_ID(),'background_type',true );
		if($bg_type == 'image'){
			if($parallax == true) {
				$script_return .= "\t".'jQuery(".parallax-'.get_the_ID().'").css("background-attachment", "fixed");'."\n";
				$script_return .= "\t".'jQuery(".parallax-'.get_the_ID().'").parallax("50%", "0.3");'."\n";
				
			}
		}
		endwhile;
		save_smof_options(); global $smof_data; 
		$slides = $smof_data['ef1_slider']; //get the slides array
		$number = 0;
		if($slides){
			foreach ($slides as $slide) {
					$script_return .= "\t".'jQuery("#bg'.++$number.'").css("background-attachment", "fixed");'."\n";
					$script_return .= "\t".'jQuery("#bg'.$number.'").parallax("50%", "0.4");'."\n";
				}
		}
		$script_out ='';
		$script_out .= '<script type="text/javascript">'."\n".'jQuery(window).load(function () {'."\n";
		$script_out .= $script_return;
		$script_out .= '});'."\n". "\n".'</script>'."\n";
		echo $script_out;
	endif;

}
add_action('wp_footer','ef1_parallax',100);

function ef1_title(){
 wp_reset_query(); 
	$description  = get_bloginfo ( 'description' ); 
	$site_name = get_bloginfo('name');
	echo	'<title>';
	echo $site_name; 
	if(is_front_page() || is_home()){
					if(!empty($description))echo ' - '.$description ;
					} else { 
					echo ' -' ;wp_title('');
					}
	echo	"</title>\n";

}
add_action('wp_head', 'ef1_title');// Add <title></title> in head 
// End Title

// google analytics
function ef1_register_tracking_code(){
			save_smof_options(); global $smof_data;
			if($smof_data['tracking_code']){
				echo $smof_data['tracking_code'];
				} 
	
}
add_action( 'wp_head', 'ef1_register_tracking_code' ); 
// end google analytics


//Favicon
function ef1_favicon(){
			save_smof_options();  global $smof_data;
			if($smof_data['favicon']){
				echo '<link rel="shortcut icon" href="'.$smof_data['favicon'].'" />'."\n";
			}
	
}
add_action('wp_head', 'ef1_favicon');// Add favicon in head
//End Favicon

//description
function ef1_description(){
		save_smof_options();  global $smof_data;
		if($smof_data['meta_description']) 
			echo '<meta name="description" content="'.$smof_data['meta_description'].'"/>';
		}
add_action( 'wp_head', 'ef1_description' );  
//end description 

//meta_keywords
function ef1_meta_keywords(){
		save_smof_options(); global $smof_data;
		if($smof_data['meta_keywords']) 
			echo '<meta name="keywords" content="'.$smof_data['meta_keywords'].'"/>';
		}
	
add_action( 'wp_head', 'ef1_meta_keywords' ); 
//end meta_keywords 

// header size menu
function ef1_small_menu(){
	if ( function_exists( 'ot_get_option' ) ) {
		if(ot_get_option('header_size')== 2) 
			wp_enqueue_style( 'small_menu', get_template_directory_uri(). '/assets/css/menusmall.css' );
		}
	}
add_action( 'wp_head', 'ef1_small_menu' ); 
//end header size menu

function ef1_custom_css(){
		save_smof_options(); global $smof_data;
		if($smof_data['custom_css']) {
		$custom_css = "<style type=\"text/css\">";
		$custom_css .= $smof_data['custom_css'];
		$custom_css .= "</style>";
		echo $custom_css;
		}
		
	} 
add_action( 'wp_head', 'ef1_custom_css' ); 

//Enqueue the Open Sans font.
function mytheme_fonts() {
    $protocol = is_ssl() ? 'https' : 'http';
    wp_enqueue_style( 'Open+Sans', "$protocol://fonts.googleapis.com/css?family=Open+Sans:400,600,300" );}
add_action( 'wp_enqueue_scripts', 'mytheme_fonts' );


function save_smof_options(){
	global $of_options, $options_machine, $smof_data, $smof_details;
	if( !defined('ADMIN_PATH') )
		define( 'ADMIN_PATH', get_template_directory() . '/assets/php/theme_options/admin/' );
	if( !defined('ADMIN_DIR') )
		define( 'ADMIN_DIR', get_template_directory_uri() . '/assets/php/theme_options/admin/' );
	require_once ( ADMIN_PATH . 'functions/functions.load.php' );
	require_once ( ADMIN_PATH . 'classes/class.options_machine.php' );
	$options_machine = new Options_Machine($of_options);
	$defaults = $options_machine->Defaults;
	return $defaults;
}