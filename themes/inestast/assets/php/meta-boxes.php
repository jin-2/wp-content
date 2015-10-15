<?php
/**
 * Initialize the meta boxes. 
 */


add_action( 'admin_init', 'ef1_custom_meta_boxes_team' );

function ef1_custom_meta_boxes_team() {

  $my_meta_box = array(
    'id'        => 'my_meta_box',
    'title'     => 'My Meta Box',
    'desc'      => '',
    'pages'     => array( 'team' ),
    'context'   => 'normal',
    'priority'  => 'high',
    'fields'    => array(
	 array(
        'id'          => 'job',
        'label'       => 'Job Title',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'class'       => '',
        'choices'     => array()
      ),
	  array(
        'id'          => 'photo',
        'label'       => 'Photo',
        'desc'        => '',
        'std'         => '',
        'type'        => 'upload',
        'class'       => '',
        'choices'     => array()
      ),
	  array(
        'id'          => 'facebook',
        'label'       => 'Facebook Link',
        'desc'        => 'Leave empty for disable',
        'std'         => '',
        'type'        => 'text',
        'class'       => '',
        'choices'     => array()
      ),	  
	  array(
        'id'          => 'twitter',
        'label'       => 'Twitter Link',
        'desc'        => 'Leave empty for disable',
        'std'         => '',
        'type'        => 'text',
        'class'       => '',
        'choices'     => array()
      ),
	  array(
        'id'          => 'googleplus',
        'label'       => 'Google+ Link',
        'desc'        => 'Leave empty for disable',
        'std'         => '',
        'type'        => 'text',
        'class'       => '',
        'choices'     => array()
      ),
	  array(
        'id'          => 'linkedin',
        'label'       => 'Linkedin Link',
        'desc'        => 'Leave empty for disable',
        'std'         => '',
        'type'        => 'text',
        'class'       => '',
        'choices'     => array()
      ),
	  array(
        'id'          => 'dribble',
        'label'       => 'Dribble Link',
        'desc'        => 'Leave empty for disable',
        'std'         => '',
        'type'        => 'text',
        'class'       => '',
        'choices'     => array()
      ),	  

    )
  );
  
  ot_register_meta_box( $my_meta_box );

}


add_action( 'admin_init', 'ef1_custom_meta_boxes_clients' );

function ef1_custom_meta_boxes_clients() {

  $my_meta_box = array(
    'id'        => 'my_meta_box',
    'title'     => 'My Meta Box',
    'desc'      => '',
    'pages'     => array( 'clients' ),
    'context'   => 'normal',
    'priority'  => 'high',
    'fields'    => array(
	  array(
        'id'          => 'image',
        'label'       => 'Image',
        'desc'        => '',
        'std'         => '',
        'type'        => 'upload',
        'class'       => '',
        'choices'     => array()
      ),	  	  	array(        'id'          => 'client_link',		        'label'       => 'Link URL',		        'desc'        => 'Leave empty for disable',		        'std'         => '',		        'type'        => 'text',		        'class'       => '',		        'choices'     => array()      ),
    )
  );
  
  ot_register_meta_box( $my_meta_box );

}

add_action( 'admin_init', 'ef1_custom_meta_boxes_portfolio' );

function ef1_custom_meta_boxes_portfolio() {

  $my_meta_box = array(
    'id'        => 'my_meta_box',
    'title'     => 'My Meta Box',
    'desc'      => '',
    'pages'     => array( 'portfolio' ),
    'context'   => 'normal',
    'priority'  => 'high',
    'fields'    => array(
	  array(
        'id'          => 'portfolio_type',
        'label'       => 'Portfolio Type',
        'desc'        => '',
        'std'         => '',
        'type'        => 'select',
        'class'       => '',
        'choices'     => array(
			array(
	            'label'       => 'Image',
	            'value'       => 'picture_type',
			),	
			array(
	            'label'       => 'Slider',
	            'value'       => 'slider_type',
			),
			array(
	            'label'       => 'Video',
	            'value'       => 'video_type',
			)
		),
	),
	  array(
        'id'          => 'skills',
        'label'       => 'Skills',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'class'       => '',
        'choices'     => array()
      ),
	  array(
        'id'          => 'release_date',
        'label'       => 'Release Date',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'class'       => '',
        'choices'     => array()
      ),
	  array(
        'id'          => 'client',
        'label'       => 'Client',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'class'       => '',
        'choices'     => array()
      ),
	  array(
        'id'          => 'copyright',
        'label'       => 'Copyright',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'class'       => '',
        'choices'     => array()
      ),
	  array(
        'id'          => 'sample_meta',
        'label'       => 'Sample Meta',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'class'       => '',
        'choices'     => array()
      ),
	  array(
        'id'          => 'project_link',
        'label'       => 'Project\'s link',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'class'       => '',
        'choices'     => array()
      ),
	  array(
        'id'          => 'project_link_url',
        'label'       => 'Project\'s link URL',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'class'       => '',
        'choices'     => array()
      ),
	  array(
        'id'          => 'project_description',
        'label'       => 'Project Description',
        'desc'        => '',
        'std'         => '',
        'type'        => 'textarea',
        'class'       => '',
        'choices'     => array()
      ),
	  array(
        'id'          => 'project_slideshow',
        'label'       => 'Pictures Slideshow',
        'desc'        => '',
        'std'         => '',
        'type'        => 'slider',
        'class'       => '',
        'choices'     => array()
      ),
	  
	  array(
        'id'          => 'project_video',
        'label'       => 'Video ID',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'class'       => '',
        'choices'     => array()
      ),
	array(
        'id'          => 'video_type',
        'label'       => 'Video Type',
        'desc'        => '',
        'std'         => '',
        'type'        => 'select',
        'class'       => '',
        'choices'     => array(
			array(
	            'label'       => 'Youtube',
	            'value'       => 'youtube',
			),	
			array(
	            'label'       => 'Vimeo',
	            'value'       => 'vimeo',
			),
		),
	),
    )
  );
  
  ot_register_meta_box( $my_meta_box );

}

add_action( 'admin_init', '_custom_page_settings');


 
function _custom_page_settings() {

	$metadata_settings = array(
		'id'          => 'metadata_settings',
		'title'       => 'Metadata Settings',
		'desc'        => '',
		'pages'       => array('onepage'),
		'context'     => 'normal',
		'priority'    => 'high',
		'fields'      => array(
		    array(
	        'label'       => 'Container Width',
	        'id'          => 'container_width',
	        'type'        => 'select',
	        'desc'        => 'Select type container width',
			'std'         => 'default',
	        'rows'        => '',
	        'post_type'   => '',
	        'taxonomy'    => '',
	        'class'       => '',
	        'choices'     => array(
	          array(
	            'label'       => 'Default',
	            'value'       => 'default',
	          ),	
			  array(
	            'label'       => 'Full Size',
	            'value'       => 'full_size',
	          ),

			),
		   ),
	      array(
	        'label'       => 'Background',
	        'id'          => 'background_type',
	        'type'        => 'select',
	        'desc'        => 'Select type background',
	        'choices'     => array(
	          array(
	            'label'       => 'Image',
	            'value'       => 'image'
	          ),
	          array(
	            'label'       => 'Color',
	            'value'       => 'color'
	          ),
	        ),
	        'std'         => 'image',
	        'rows'        => '',
	        'post_type'   => '',
	        'taxonomy'    => '',
	        'class'       => '' 
	      ),
			 array(
	            'label'       => 'Background image',
	            'id'          => 'background_image',
	            'type'        => 'upload',
	            'desc'        => '',
	            'std'         => '',
	            'rows'        => '',
	            'post_type'   => '',
	            'taxonomy'    => '',
	            'class'       => ''
	          ),			  
			 array(
	            'label'       => 'Background Color',
	            'id'          => 'background_color',
	            'type'        => 'colorpicker',
	            'desc'        => '',
	            'std'         => '#FFFFFF',
	          ),
	      array(
	        'label'       => 'Parallax Image',
	        'id'          => 'background_parallax',
	        'type'        => 'select',
	        'desc'        => 'Select on/off parallax, work only if you choose image background',
	        'choices'     => array(
			array(
	            'label'       => 'On',
	            'value'       => true,
	          ),
	          array(
	            'label'       => 'Off',
	            'value'       => false,
	          ),

			'std'         => false,
	        'rows'        => '',
	        'post_type'   => '',
	        'taxonomy'    => '',
	        'class'       => ''
	        ),

	      ),

		)
	);
    ot_register_meta_box( $metadata_settings );	
}
