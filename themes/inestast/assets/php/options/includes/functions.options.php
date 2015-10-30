<?php

add_action('init','of_options');

if (!function_exists('of_options'))
{
	function of_options()
	{
		//Access the WordPress Categories via an Array
		$of_categories 		= array();  
		$of_categories_obj 	= get_categories('hide_empty=0');
		foreach ($of_categories_obj as $of_cat) {
		    $of_categories[$of_cat->cat_ID] = $of_cat->cat_name;}
		$categories_tmp 	= array_unshift($of_categories, "Select a category:");    
	    
		//Access the WordPress Pages via an Array
		$of_pages 			= array();
		$of_pages_obj 		= get_pages('sort_column=post_parent,menu_order');    
		foreach ($of_pages_obj as $of_page) {
		    $of_pages[$of_page->ID] = $of_page->post_name; }
		$of_pages_tmp 		= array_unshift($of_pages, "Select a page:");       
	
		//Testing 
		$of_options_select 	= array("one","two","three","four","five"); 
		$of_options_radio 	= array("one" => "One","two" => "Two","three" => "Three","four" => "Four","five" => "Five");
		
		//Sample Homepage blocks for the layout manager (sorter)
		$of_options_homepage_blocks = array
		( 
			"disabled" => array (
				"placebo" 		=> "placebo", //REQUIRED!
				"block_one"		=> "Block One",
				"block_two"		=> "Block Two",
				"block_three"	=> "Block Three",
			), 
			"enabled" => array (
				"placebo" 		=> "placebo", //REQUIRED!
				"block_four"	=> "Block Four",
			),
		);


		//Stylesheets Reader
		$alt_stylesheet_path = LAYOUT_PATH;
		$alt_stylesheets = array();
		
		if ( is_dir($alt_stylesheet_path) ) 
		{
		    if ($alt_stylesheet_dir = opendir($alt_stylesheet_path) ) 
		    { 
		        while ( ($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false ) 
		        {
		            if(stristr($alt_stylesheet_file, ".css") !== false)
		            {
		                $alt_stylesheets[] = $alt_stylesheet_file;
		            }
		        }    
		    }
		}


		//Background Images Reader
		$bg_images_path = get_stylesheet_directory(). '/images/bg/'; // change this to where you store your bg images
		$bg_images_url = get_template_directory_uri().'/images/bg/'; // change this to where you store your bg images
		$bg_images = array();
		
		if ( is_dir($bg_images_path) ) {
		    if ($bg_images_dir = opendir($bg_images_path) ) { 
		        while ( ($bg_images_file = readdir($bg_images_dir)) !== false ) {
		            if(stristr($bg_images_file, ".png") !== false || stristr($bg_images_file, ".jpg") !== false) {
		            	natsort($bg_images); //Sorts the array into a natural order
		                $bg_images[] = $bg_images_url . $bg_images_file;
		            }
		        }    
		    }
		}
		

		/*-----------------------------------------------------------------------------------*/
		/* TO DO: Add options/functions that use these */
		/*-----------------------------------------------------------------------------------*/
		
		//More Options
		$uploads_arr 		= wp_upload_dir();
		$all_uploads_path 	= $uploads_arr['path'];
		$all_uploads 		= get_option('of_uploads');
		$other_entries 		= array("Select a number:","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30","31","32","33","34");  
		$body_repeat 		= array("no-repeat","repeat-x","repeat-y","repeat");
		$body_pos 			= array("top left","top center","top right","center left","center center","center right","bottom left","bottom center","bottom right");
		
		// Image Alignment radio box
		$of_options_thumb_align = array("alignleft" => "Left","alignright" => "Right","aligncenter" => "Center"); 
		
		// Image Links to Options
		$of_options_image_link_to = array("image" => "The Image","post" => "The Post"); 


/*-----------------------------------------------------------------------------------*/
/* The Options Array */
/*-----------------------------------------------------------------------------------*/

// Set the Options Array
global $of_options;
global $ef1_google_fonts;  
$of_options = array();

//General Options
$of_options[] = array( 	"name" 		=> __("General Options"),
						"type" 		=> "heading"
				);

$of_options[] = array( 	"name" 		=> __("General Options"),
						"desc" 		=> "",
						"id" 		=> "general_info",
						"std" 		=> "<h3 class='h3_options' >General Options</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				);
				
$of_options[] = array( 	"name" 		=> __("General Color"),
						"desc" 		=> __("Pick a general color for the theme."),
						"id" 		=> "general_color",
						"std" 		=> "",
						"type" 		=> "color"
				);
$of_options[] = array( 	"name" 		=> __("Contact Email"),
						"desc" 		=> __("Contact Email - use shortcode contact form "),
						"id" 		=> "contact_email_shortcode",
						"std" 		=> "Your Email",
						"type" 		=> "text"
				);	
$of_options[] = array( 	"name" 		=> __("Enable Sticky Menu"),
						"desc" 		=> "",
						"id" 		=> "enable_sticky_menu",
						"std" 		=> 1,
						"type" 		=> "switch"
				);   
$of_options[] = array( 	"name" 		=>__( "Meta Description"),
						"desc" 		=> "",
						"id" 		=> "meta_description",
						"std" 		=> "Default Text",
						"type" 		=> "textarea"
				);	
				
$of_options[] = array( 	"name" 		=> __("Meta Keywords"),
						"desc" 		=> "",
						"id" 		=> "meta_keywords",
						"std" 		=> "Default Text",
						"type" 		=> "textarea"
				);	
$of_options[] = array( 	"name" 		=> __("Enable Preloader"),
						"desc" 		=> "",
						"id" 		=> "enable_preloader",
						"std" 		=> 0,
						"type" 		=> "switch"
				);  
$of_options[] = array( 	"name" 		=> __("Custom Favicon"),
						"desc" 		=> __("It's image represent your website favicon (16x16px)"),
						"id" 		=> "favicon",
						// Use the shortcodes [site_url] or [site_url_secure] for setting default URLs
						"std" 		=> "",
						"mod"		=> "min",
						"type" 		=> "media"
				);		

$of_options[] = array( 	"name" 		=> __("Enable BackTop"),
						"desc" 		=> "",
						"id" 		=> "enable_backtop",
						"std" 		=> 1,
						"type" 		=> "switch"
				); 
$of_options[] = array( 	"name" 		=> __("Tracking Code"),
						"desc" 		=> __("Paste your Google Analytics (or other) tracking code here. This will by added into the head template"),
						"id" 		=> "tracking_code",
						"std" 		=> "",
						"type" 		=> "textarea"
				);		
// Home Section Start
$of_options[] = array( 	"name" 		=> __("Home Section"),
						"type" 		=> "heading"
				);

$of_options[] = array( 	"name" 		=> __("Home Section"),
						"desc" 		=> "",
						"id" 		=> "general_info",
						"std" 		=> "<h3 class='h3_options' >".__("Home Section")."</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				);	
				
$of_options[] = array( 	"name" 		=> __("Type Home Section"),
						"desc" 		=> "",
						"id" 		=> "type_home_section",
						"std" 		=> 'none',
						"type" 		=> "select",
						"options" 	=> array(
						'none' => 'None',
						'bgimage' => 'Background Images',
						'bgvideo' => 'Background Video',
						'revslider' => 'Revolution Slider',
						'layerslider' => 'Layer Slider'
						)
				);	
$of_options[] = array( 	"name" 		=> __("Background Images"),
						"desc" 		=> "",
						"id" 		=> "general_info",
						"std" 		=> "<h3 class='h3_options' >Background Images</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				);		
				
$of_options[] = array( 	"name" 		=> __("Slider Options"),
						"desc" 		=> __("Unlimited slider with drag and drop sortings."),
						"id" 		=> "ef1_slider",
						"std" 		=> "",
						"type" 		=> "slider"
				);
$of_options[] = array( 	"name" 		=> __("Background Video"),
						"desc" 		=> "",
						"id" 		=> "general_info",
						"std" 		=> "<h3 class='h3_options' >Background Video</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				);		
$of_options[] = array( 	"name" 		=> __("Background Video type webm"),
						"desc" 		=> "",
						"id" 		=> "background_video_type_webm",
						"std" 		=> "",
						"type" 		=> "upload"
				);		
$of_options[] = array( 	"name" 		=> __("Background Video type mp4"),
						"desc" 		=> "",
						"id" 		=> "background_video_type_mp4",
						"std" 		=> "",
						"type" 		=> "upload"
				);	
$of_options[] = array( 	"name" 		=> __("Video and Image Text"),
						"desc" 		=> "",
						"id" 		=> "general_info",
						"std" 		=> "<h3 class='h3_options' >Video and Image Text</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				);	
$of_options[] = array( 	"name" 		=> __("Title"),
						"desc" 		=> __("Title Carousel"),
						"id" 		=> "title_home",
						"std" 		=> "
<li>
	<p>INESTA</p>
</li>
<li>
	<p>WORDPRESS TEMPLATE</p>
</li> ",
						"type" 		=> "textarea"
				);		
$of_options[] = array( 	"name" 		=> __("Subtitle"),
						"desc" 		=> "",
						"id" 		=> "subtitle_home",
						"std" 		=> "RESPONSIVE ONE PAGE PORTFOLIO TEMPLATE",
						"type" 		=> "text"
				);					
$of_options[] = array( 	"name" 		=> __("Revolution Slider"),
						"desc" 		=> "",
						"id" 		=> "general_info",
						"std" 		=> "<h3 class='h3_options' >Revolution Slider</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				);		
$of_options[] = array( 	"name" 		=> __("Revolution Slider"),
						"desc" 		=> __("Slider Alias"),
						"id" 		=> "revolution_slider",
						"std" 		=> "",
						"type" 		=> "text"
				);	
$of_options[] = array( 	"name" 		=> __("Layer Slider"),
						"desc" 		=> "",
						"id" 		=> "general_info",
						"std" 		=> "<h3 class='h3_options' >Layer Slider</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				);		
$of_options[] = array( 	"name" 		=> __("Layer Slider"),
						"desc" 		=> __("Slider Alias"),
						"id" 		=> "layer_slider",
						"std" 		=> "",
						"type" 		=> "text"
				);	
// Blog Section Start
$of_options[] = array( 	"name" 		=> __("Blog"),
						"type" 		=> "heading"
				);			
$url =  ADMIN_DIR . 'assets/images/';
$of_options[] = array( 	"name" 		=> __("Default Layout"),
						"desc" 		=> __("Select main content and sidebar alignment."),
						"id" 		=> "default_layout",
						"std" 		=> "2c-r-fixed",
						"type" 		=> "images",
						"options" 	=> array(
							'2c-r-fixed' 	=> $url . '2cr.png',
							'2c-l-fixed' 	=> $url . '2cl.png',
						)
				);
$of_options[] = array( 	"name" 		=> __("Pagination Type"),
						"desc" 		=> "",
						"id" 		=> "pagination_type",
						"std" 		=> 'n_p',
						"type" 		=> "select",
						"options" 	=> array(
						'number' => 'Number',
						'n_p' => 'Next & Previous'
						)
				);	
$of_options[] = array( 	"name" 		=> __("Enable Author Info"),
						"desc" 		=> "",
						"id" 		=> "enable_author_info",
						"std" 		=> 1,
						"type" 		=> "switch"
				); 
$of_options[] = array( 	"name" 		=> __("Enable Create Data"),
						"desc" 		=> "",
						"id" 		=> "enable_create_data",
						"std" 		=> 1,
						"type" 		=> "switch"
				); 
$of_options[] = array( 	"name" 		=> __("Enable Comments Info"),
						"desc" 		=> "",
						"id" 		=> "enable_comments_info",
						"std" 		=> 1,
						"type" 		=> "switch"
				); 
$of_options[] = array( 	"name" 		=> __("Typography"),
						"type" 		=> "heading"
				);

$of_options[] = array( 	"name" 		=> __("General Fonts"),
						"desc" 		=> "",
						"id" 		=> "general_info",
						"std" 		=> "<h3 class='h3_options' >General Fonts</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				);	
$of_options[] = array( 	"name" 		=> __("Body Text Font"),
						"desc" 		=> "",
						"id" 		=> "body_text_font",
						"std" 		=> array(
											'size'  => '12px',
											'face'  => 'Open Sans',
											'style' => 'normal',
											'color' => '#343434'
										),
						"type" 		=> "typography"
				);  
$of_options[] = array( 	"name" 		=> __("Navigation"),
						"desc" 		=> "",
						"id" 		=> "general_info",
						"std" 		=> "<h3 class='h3_options' >Navigation</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				);
$of_options[] = array( 	"name" 		=> __("Navigation Typography"),
						"desc" 		=> "",
						"id" 		=> "navigation_typography",
						"std" 		=> array(
											'size'  => '12px',
											'face'  => 'Open Sans',
											'style' => 'normal',
											'color' => '#343434'
										),
						"type" 		=> "typography"
				);  
$of_options[] = array( 	"name" 		=> __("Navigation Typography Hover"),
						"desc" 		=> "",
						"id" 		=> "navigation_typography_hover",
						"std" 		=> array(
											'size'  => '12px',
											'face'  => 'Open Sans',
											'style' => 'normal',
											'color' => '#2ac4ea'
										),
						"type" 		=> "typography"
				); 
$of_options[] = array( 	"name" 		=> __("Navigation Typography Submenu "),
						"desc" 		=> "",
						"id" 		=> "navigation_typography_submenu",
						"std" 		=> array(
											'size'  => '12px',
											'face'  => 'Open Sans',
											'style' => 'normal',
											'color' => '#fff'
										),
						"type" 		=> "typography"
				); 
$of_options[] = array( 	"name" 		=> __("Navigation Typography Submenu Hover"),
						"desc" 		=> "",
						"id" 		=> "navigation_typography_submenu_hover",
						"std" 		=> array(
											'size'  => '12px',
											'face'  => 'Open Sans',
											'style' => 'normal',
											'color' => '#2ac4ea'
										),
						"type" 		=> "typography"
				); 				
$of_options[] = array( 	"name" 		=> __("Submenu Color"),
						"desc" 		=> "",
						"id" 		=> "submenu_color",  
						"std" 		=> "#222",
						"type" 		=> "color"
				);	
$of_options[] = array( 	"name" 		=> __("Submenu Hover Color"),
						"desc" 		=> "",
						"id" 		=> "submenu_hover_color",  
						"std" 		=> "#2ac4ea",
						"type" 		=> "color"
				);	
$of_options[] = array( 	"name" 		=> __("Footer"),
						"desc" 		=> "",
						"id" 		=> "general_info",
						"std" 		=> "<h3 class='h3_options' >Footer</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				);				
$of_options[] = array( 	"name" 		=> __("Copyright Text Typography"),
						"desc" 		=> "",
						"id" 		=> "copyright_text__typography",
						"std" 		=> array(
											'size'  => '13px',
											'face'  => 'Open Sans',
											'style' => 'normal',
											'color' => '#fff'
										),
						"type" 		=> "typography"
				); 
$of_options[] = array( 	"name" 		=> __("Headlines"),
						"desc" 		=> "",
						"id" 		=> "general_info",
						"std" 		=> "<h3 class='h3_options' >Headlines</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				);	
$of_options[] = array( 	"name" 		=> __("Heading Font Family"),
						"desc" 		=> __("Some description. Note that this is a custom text added added from options file."),
						"id" 		=> "g_select",
						"std" 		=> "Open Sans",
						"type" 		=> "select_google_font",
						"preview" 	=> array(
										"text" => "This is my preview text!", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						),
						"options" 	=> $ef1_google_fonts
				);
$of_options[] = array( 	"name" 		=> __("H1 - Font Properties"),
						"desc" 		=> "",
						"id" 		=> "h1_font",
						"std" 		=> array('size' => '40px','color' => '#343434'),
						"type" 		=> "typography"
				);
$of_options[] = array( 	"name" 		=> __("H2 - Font Properties"),
						"desc" 		=> "",
						"id" 		=> "h2_font",
						"std" 		=> array('size' => '34px','color' => '#343434'),
						"type" 		=> "typography"
				);
$of_options[] = array( 	"name" 		=> __("H3 - Font Properties"),
						"desc" 		=> "",
						"id" 		=> "h3_font",
						"std" 		=> array('size' => '30px','color' => '#343434'),
						"type" 		=> "typography"
				);
$of_options[] = array( 	"name" 		=> __("H4 - Font Properties"),
						"desc" 		=> "",
						"id" 		=> "h4_font",
						"std" 		=> array('size' => '24px','color' => '#343434'),
						"type" 		=> "typography"
				);
$of_options[] = array( 	"name" 		=> __("H5 - Font Properties"),
						"desc" 		=> "",
						"id" 		=> "h5_font",
						"std" 		=> array('size' => '20px','color' => '#343434'),
						"type" 		=> "typography"
				);
$of_options[] = array( 	"name" 		=> __("H6 - Font Properties"),
						"desc" 		=> "",
						"id" 		=> "h6_font",
						"std" 		=> array('size' => '15px','color' => '#343434'),
						"type" 		=> "typography"
				);	
$of_options[] = array( 	"name" 		=> __("Translate"),
						"type" 		=> "heading"
				);

$of_options[] = array( 	"name" 		=> __("404 Page"),
						"desc" 		=> "",
						"id" 		=> "general_info",
						"std" 		=> "<h3 class='h3_options' >404 Page</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				);	
$of_options[] = array( 	"name" 		=> __("404 Title Text"),
						"desc" 		=> "",
						"id" 		=> "404_title_text",
						"std" 		=> "ooops... error 404",
						"type" 		=> "text"
				);	
$of_options[] = array( 	"name" 		=> __("404 Text"),
						"desc" 		=> "",
						"id" 		=> "404_text",
						"std" 		=> "We`re sorry, but the page you are looking for doesn`t exist.",
						"type" 		=> "text"
				);	
$of_options[] = array( 	"name" 		=> __("404 Link"),
						"desc" 		=> "",
						"id" 		=> "404_link",
						"std" 		=> "Go to homepage",
						"type" 		=> "text"
				);	
$of_options[] = array( 	"name" 		=> __("Shortcodes"),
						"desc" 		=> "",
						"id" 		=> "general_info",
						"std" 		=> "<h3 class='h3_options' >Shortcodes</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				);		
$of_options[] = array( 	"name" 		=> __("Shortcode Portfolio"),
						"desc" 		=> "",
						"id" 		=> "shortcode_portfolio",
						"std" 		=> "All",
						"type" 		=> "text"
				);
$of_options[] = array( 	"name" 		=> __("Contact Message"),
						"desc" 		=> "",
						"id" 		=> "contact_message",
						"std" 		=> "Your message...",
						"type" 		=> "text"
				);
$of_options[] = array( 	"name" 		=> __("Contact Name"),
						"desc" 		=> "",
						"id" 		=> "contact_name",
						"std" 		=> "Your name (required)",
						"type" 		=> "text"
				);
$of_options[] = array( 	"name" 		=> __("Contact Email"),
						"desc" 		=> "",
						"id" 		=> "contact_email",
						"std" 		=> "Your email (required)",
						"type" 		=> "text"
				);
$of_options[] = array( 	"name" 		=> __("Contact Website"),
						"desc" 		=> "",
						"id" 		=> "contact_website",
						"std" 		=> "Your website",
						"type" 		=> "text"
				);	
$of_options[] = array( 	"name" 		=> __("Contact Website"),
						"desc" 		=> "",
						"id" 		=> "contact_website",
						"std" 		=> "Your website",
						"type" 		=> "text"
				);					
$of_options[] = array( 	"name" 		=> __("Custom CSS"),
						"type" 		=> "heading"
				);

$of_options[] = array( 	"name" 		=> __("Custom CSS"),
						"desc" 		=> "",
						"id" 		=> "general_info",
						"std" 		=> "<h3 class='h3_options' >Custom CSS</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				);	
$of_options[] = array( 	"name" 		=> __("Custom CSS"),
						"desc" 		=> "",
						"id" 		=> "custom_css",
						"std" 		=> "",
						"type" 		=> "textarea"
				);	
$of_options[] = array( 	"name" 		=> __("Footer and Header"),
						"type" 		=> "heading"
				);
$of_options[] = array( 	"name" 		=> __("Header"),
						"desc" 		=> "",
						"id" 		=> "general_info",
						"std" 		=> "<h3 class='h3_options' >Header</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				);

$of_options[] = array( 	"name" 		=> __("Logo Image"),
						"desc" 		=> "",
						"id" 		=> "logo_image",
						// Use the shortcodes [site_url] or [site_url_secure] for setting default URLs
						"std" 		=> "",
						"type" 		=> "upload"
				);	
$of_options[] = array( 	"name" 		=> __("Retina 2x Logo Image"),
						"desc" 		=> "",
						"id" 		=> "retina_image",
						// Use the shortcodes [site_url] or [site_url_secure] for setting default URLs
						"std" 		=> "",
						"type" 		=> "upload"
				);	
$of_options[] = array( 	"name" 		=> __("Header Menu Color"),
						"desc" 		=> "",
						"id" 		=> "header_color",  
						"std" 		=> "#fff",
						"type" 		=> "color"
				);					
$of_options[] = array( 	"name" 		=> __("Footer Text"),
						"desc" 		=> "",
						"id" 		=> "general_info",
						"std" 		=> "<h3 class='h3_options' >Footer</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				);
$of_options[] = array( 	"name" 		=> __("Copyright Text"),
						"desc" 		=> "",
						"id" 		=> "copyright_text",
						"std" 		=> "",
						"type" 		=> "text"
				);	
$of_options[] = array( 	"name" 		=> __("Footer Color"),
						"desc" 		=> "",
						"id" 		=> "footer_color",  
						"std" 		=> "#202732",
						"type" 		=> "color"
				);	
$of_options[] = array( 	"name" 		=> __("Footer Social Icon"),
						"desc" 		=> "",
						"id" 		=> "general_info",
						"std" 		=> "<h3 class='h3_options' >Footer Social Icon</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				);
$of_options[] = array( 	"name" 		=> __("Facebook URL"),
						"desc" 		=> "If it is empty, icon was disabled.",
						"id" 		=> "facebookurl",
						"std" 		=> "",
						"type" 		=> "text"
				);	
$of_options[] = array( 	"name" 		=> __("Twitter URL"),
						"desc" 		=> "If it is empty, icon was disabled.",
						"id" 		=> "twitterurl",
						"std" 		=> "",
						"type" 		=> "text"
				);	
$of_options[] = array( 	"name" 		=> __("Dribbble URL"),
						"desc" 		=> "If it is empty, icon was disabled.",
						"id" 		=> "dribbleurl",
						"std" 		=> "",
						"type" 		=> "text"
				);	
$of_options[] = array( 	"name" 		=> __("LinkedIn URL"),
						"desc" 		=> "If it is empty, icon was disabled.",
						"id" 		=> "linkedinurl",
						"std" 		=> "",
						"type" 		=> "text"
				);	
$of_options[] = array( 	"name" 		=> __("Google Plus URL"),
						"desc" 		=> "If it is empty, icon was disabled.",
						"id" 		=> "googleurl",
						"std" 		=> "",
						"type" 		=> "text"
				);	
$of_options[] = array( 	"name" 		=> __("Twitter API"),
						"type" 		=> "heading"
				);

$of_options[] = array( 	"name" 		=> __("Twitter API"),
						"desc" 		=> "",
						"id" 		=> "general_info",
						"std" 		=> "<h3 class='h3_options' >Twitter API</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				);
$of_options[] = array( 	"name" 		=> __("Consumer key"),
						"desc" 		=> "",
						"id" 		=> "consumer_key",
						"std" 		=> "",
						"type" 		=> "text"
				);					$of_options[] = array( 	"name" 		=> "Username",						"desc" 		=> "",						"id" 		=> "username",						"std" 		=> "",						"type" 		=> "text"				);	
$of_options[] = array( 	"name" 		=> __("Consumer secret"),
						"desc" 		=> "",
						"id" 		=> "consumer_secret",
						"std" 		=> "",
						"type" 		=> "text"
				);	
$of_options[] = array( 	"name" 		=> __("Access token"),
						"desc" 		=> "",
						"id" 		=> "access_token",
						"std" 		=> "",
						"type" 		=> "text"
				);	
$of_options[] = array( 	"name" 		=> __("Access token secret"),
						"desc" 		=> "",
						"id" 		=> "access_token_secret",
						"std" 		=> "",
						"type" 		=> "text"
				);					
// Backup Options
$of_options[] = array( 	"name" 		=> __("Backup Options"),
						"type" 		=> "heading",
						"icon"		=> ADMIN_IMAGES . "icon-slider.png"
				);
				
$of_options[] = array( 	"name" 		=> __("Backup and Restore Options"),
						"id" 		=> "of_backup",
						"std" 		=> "",
						"type" 		=> "backup",
						"desc" 		=> __('You can use the two buttons below to backup your current options, and then restore it back at a later time. This is useful if you want to experiment on the options but would like to keep the old settings in case you need it back.'),
				);
				
$of_options[] = array( 	"name" 		=> __("Transfer Theme Options Data"),
						"id" 		=> "of_transfer",
						"std" 		=> "",
						"type" 		=> "transfer",
						"desc" 		=> __('You can tranfer the saved options data between different installs by copying the text inside the text box. To import data from another install, replace the data in the text box with the one from another install and click "Import Options".'),
				);
				
	}//End function: of_options()
}//End chack if function exists: of_options()
?>
