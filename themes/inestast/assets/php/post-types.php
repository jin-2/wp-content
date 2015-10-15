<?php 
add_action( 'init', 'team_posttype_init' );
if ( !function_exists( 'team_posttype_init' ) ) :
function team_posttype_init() {

	$team_labels = array(
		'name' => _x('Member', 'post type general name','inesta'),
		'singular_name' => _x('Member', 'post type singular name','inesta'),
		'add_new' => _x('Add New', 'Portfolio','inesta'),
		'add_new_item' => __('Add New Member','inesta'),
		'edit_item' => __('Edit Member','inesta'),
		'new_item' => __('New Member','inesta'),
		'all_items' => __('All Members','inesta'), 
		'view_item' => __('View Member','inesta'),
		'search_items' => __('Search Member','inesta'),
		'not_found' =>  __('No Member found','inesta'),
		'not_found_in_trash' => __('No Members found in Trash','inesta'), 
		'parent_item_colon' => '',
		'menu_name' => __('Team','inesta')

	);
	$team_args = array(
		'labels' => $team_labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true, 
		'show_in_menu' => true, 
		'query_var' => false,
		'rewrite' => false,
		'capability_type' => 'post',
		'has_archive' => false, 
		'hierarchical' => false,
		'exclude_from_search' => true,
		'menu_position' => 4,
		'menu_icon' => get_template_directory_uri().'/assets/images/admin/icon-team.png', 
		'supports' => array( 'title' )
	); 
	register_post_type( 'team', $team_args );

 }
	

endif;


add_action( 'init', 'clients_posttype_init' );
if ( !function_exists( 'clients_posttype_init' ) ) :
function clients_posttype_init() {

	$client_labels = array(
		'name' => _x('Client', 'post type general name','inesta'),
		'singular_name' => _x('Clients', 'post type singular name','inesta'),
		'add_new' => _x('Add New', 'Portfolio','inesta'),
		'add_new_item' => __('Add New Client','inesta'),
		'edit_item' => __('Edit Client','inesta'),
		'new_item' => __('New Client','inesta'),
		'all_items' => __('All Clients','inesta'), 
		'view_item' => __('View Client','inesta'),
		'search_items' => __('Search Client','inesta'),
		'not_found' =>  __('No Client found','inesta'),
		'not_found_in_trash' => __('No Clients found in Trash','inesta'), 
		'parent_item_colon' => '',
		'menu_name' => __('Clients','inesta')

	);
	$team_args = array(
		'labels' => $client_labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true, 
		'show_in_menu' => true, 
		'query_var' => false,
		'rewrite' => false,
		'capability_type' => 'post',
		'has_archive' => false, 
		'hierarchical' => false,
		'exclude_from_search' => true,
		'menu_position' => 6,
		'menu_icon' => get_template_directory_uri().'/assets/images/admin/icon-clients.png', 
		'supports' => array( 'title' )
	); 
	register_post_type( 'clients', $team_args );

 }
endif;



/*-----------------------------------------------------------------------------------*/
/*	Register Project post format.
/*-----------------------------------------------------------------------------------*/
add_action( 'init', 'portfolio_posttype_init' );
if ( !function_exists( 'portfolio_posttype_init' ) ) :
function portfolio_posttype_init() {

	$portfolio_labels = array(
		'name' => _x('Portfolio', 'post type general name','inesta'),
		'singular_name' => _x('Portfolio', 'post type singular name','inesta'),
		'add_new' => _x('Add New', 'Portfolio','inesta'),
		'add_new_item' => __('Add New Portfolio','inesta'),
		'edit_item' => __('Edit Portfolio','inesta'),
		'new_item' => __('New Portfolio','inesta'),
		'all_items' => __('All Portfolio','inesta'),
		'view_item' => __('View Portfolio','inesta'),
		'search_items' => __('Search Portfolio','inesta'),
		'not_found' =>  __('No Portfolio found','inesta'),
		'not_found_in_trash' => __('No Portfolios found in Trash','inesta'), 
		'parent_item_colon' => '',
		'menu_name' => __('Portfolio','inesta')

	);
	$portfolio_args = array(
		'labels' => $portfolio_labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true, 
		'show_in_menu' => true, 
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'has_archive' => true, 
		'hierarchical' => false,
		'menu_position' => 10,
		'menu_icon' => get_template_directory_uri().'/assets/images/admin/icon-portfolio.png',
		'supports' => array( 'title','thumbnail','video','gallery' ) 
	); 
	register_post_type( 'portfolio', $portfolio_args );

 }
	

endif;

/*-----------------------------------------------------------------------------------*/
/*	Portfolio custom taxonomies.
/*-----------------------------------------------------------------------------------*/
add_action( 'init', 'portfolio_taxonomies_innit', 0 );
if ( !function_exists( 'portfolio_taxonomies_innit' ) ) :
function portfolio_taxonomies_innit() {
	// portfolio Category
	$labels = array(
		'name' => _x( 'Categories', 'taxonomy general name' ,'inesta'),
		'singular_name' => _x( 'Category', 'taxonomy singular name','inesta' ),
		'search_items' =>  __( 'Search Categories','inesta' ),
		'all_items' => __( 'All Categories' ,'inesta'),
		'parent_item' => __( 'Parent Category' ,'inesta'),
		'parent_item_colon' => __( 'Parent Category:' ,'inesta'),
		'edit_item' => __( 'Edit Category' ,'inesta'), 
		'update_item' => __( 'Update Category' ,'inesta'),
		'add_new_item' => __( 'Add New Category' ,'inesta'),
		'new_item_name' => __( 'New Category Name' ,'inesta'),
		'menu_name' => __( 'Category','inesta' ),
	); 	
	
	register_taxonomy('portfolio-category',array('portfolio'), array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'portfolio-category' ),
	));
}


endif; 

/*-----------------------------------------------------------------------------------*/
/*	OnePage custom taxonomies.
/*-----------------------------------------------------------------------------------*/
add_action( 'init', 'onepage_posttype_init' );
if ( !function_exists( 'onepage_posttype_init' ) ) :
function onepage_posttype_init() {

	$onepage_labels = array(
		'name' => _x('OnePage Section', 'post type general name','inesta'),
		'singular_name' => _x('OnePage', 'post type singular name','inesta'),
		'add_new' => _x('Add New Section', 'Section','inesta'),
		'add_new_item' => __('Add New Section','inesta'),
		'edit_item' => __('Edit Section','inesta'),
		'new_item' => __('New Section','inesta'),
		'all_items' => __('All Sections','inesta'), 
		'view_item' => __('View Section','inesta'),
		'search_items' => __('Search Section','inesta'),
		'not_found' =>  __('No Section found','inesta'),
		'not_found_in_trash' => __('No Sections found in Trash','inesta'), 
		'parent_item_colon' => '',
		'menu_name' => __('OnePage Section','inesta')

	);
	$onepage_args = array(
		'labels' => $onepage_labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,  
		'show_in_menu' => true, 
		'query_var' => false,
		'rewrite' => false,
		'capability_type' => 'page',
		'has_archive' => false, 
		'hierarchical' => false,
		'exclude_from_search' => true,
		'menu_position' => 6,
		'menu_icon' => get_template_directory_uri().'/assets/images/admin/icon-onepage.png', 
		'supports' => array( 'title','editor','revisions','page-attributes' ) 
	); 
	register_post_type( 'onepage', $onepage_args );

 }
endif;


