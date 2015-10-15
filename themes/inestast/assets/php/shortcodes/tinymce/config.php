<?php
$animation = array( 
	'' =>  'none',
    'flash' => 'flash', 
    'bounce' => 'bounce', 
    'shake' => 'shake', 
    'tada' => 'tada', 
    'swing' => 'swing', 
    'flip' => 'flip', 
    'fadeIn' => 'fadeIn', 
    'fadeInUp' => 'fadeInUp',    
    'fadeInDown' => 'fadeInDown', 
    'fadeInLeft' => 'fadeInLeft', 
    'fadeInRight' => 'fadeInRight',  
  );     

/*-----------------------------------------------------------------------------------*/
/*	Alert Config
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['alert'] = array(
	'no_preview' => true,
	'params' => array(
		'style' => array(
			'type' => 'select',
			'label' => __('Alert Style', 'textdomain'),
			'desc' => __('Select the alert\'s style, ie the alert colour', 'textdomain'),
			'options' => array(
				'alert-1' => 'Yellow',
				'alert-3' => 'Red',
				'alert-4' => 'Blue',
				'alert-2' => 'Green'
			)
		),
		'content' => array(
			'std' => 'Your Alert!',
			'type' => 'textarea',
			'label' => __('Alert Text', 'textdomain'),
			'desc' => __('Add the alert\'s text', 'textdomain'),
		),
		'animation' => array(
							'type' => 'select',
							'label' => __('Animation', 'textdomain'),
							'desc' => __('', 'textdomain'),
							'options' => $animation,
						)			
		
	),
	'shortcode' => '[alert style="{{style}}" animation="{{animation}}"] {{content}} [/alert]',
	'popup_title' => __('Insert Alert Shortcode', 'textdomain')
);

/*-----------------------------------------------------------------------------------*/
/*	Toggle Config
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['toggle'] = array(
	'no_preview' => true,
	'params' => array(
		'title' => array(
			'type' => 'text',
			'label' => __('Toggle Content Title', 'textdomain'),
			'desc' => __('Add the title that will go above the toggle content', 'textdomain'),
			'std' => 'Title'
		),
		'content' => array(
			'std' => 'Content',
			'type' => 'textarea',
			'label' => __('Toggle Content', 'textdomain'),
			'desc' => __('Add the toggle content. Will accept HTML', 'textdomain'),
		),
		'state' => array(
			'type' => 'select',
			'label' => __('Toggle State', 'textdomain'),
			'desc' => __('Select the state of the toggle on page load', 'textdomain'),
			'options' => array(
				'open' => 'Open',
				'closed' => 'Closed'
			)
		),
		'animation' => array(
							'type' => 'select',
							'label' => __('Animation', 'textdomain'),
							'desc' => __('', 'textdomain'),
							'options' => $animation,
						)		
			
	),
	'shortcode' => '[toggle title="{{title}}" state="{{state}}" animation="{{animation}}"] {{content}} [/toggle]',
	'popup_title' => __('Insert Toggle Content Shortcode', 'textdomain')
);

/*-----------------------------------------------------------------------------------*/
/*	Tabs Config
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['tabs'] = array(
    'params' => array(
			'animation' => array(
						'type' => 'select',
						'label' => __('Animation', 'textdomain'),
						'desc' => __('', 'textdomain'),
						'options' => $animation,
					)),
    'no_preview' => true,
    'shortcode' => '[tabs animation="{{animation}}"] {{child_shortcode}}  [/tabs]',
    'popup_title' => __('Insert Tab Shortcode', 'textdomain'),
    
    'child_shortcode' => array(
        'params' => array(
            'title' => array(
                'std' => 'Title',
                'type' => 'text',
                'label' => __('Tab Title', 'textdomain'),
                'desc' => __('Title of the tab', 'textdomain'),
            ),
            'content' => array(
                'std' => 'Tab Content',
                'type' => 'textarea',
                'label' => __('Tab Content', 'textdomain'),
                'desc' => __('Add the tabs content', 'textdomain')
            )
        ),
        'shortcode' => '[tab title="{{title}}"] {{content}} [/tab]',
        'clone_button' => __('Add Tab', 'textdomain')
    )
);
/*-----------------------------------------------------------------------------------*/
/*	Accordion Config
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['accordion'] = array(
    'params' => array(
			'animation' => array(
				'type' => 'select',
				'label' => __('Animation', 'textdomain'),
				'desc' => __('', 'textdomain'),
				'options' => $animation,
			)
			),
    'no_preview' => true,
    'shortcode' => '[accordions animation="{{animation}}" ] {{child_shortcode}}  [/accordions]',
    'popup_title' => __('Insert Tab Shortcode', 'textdomain'),
    
    'child_shortcode' => array(
        'params' => array(
            'title' => array(
                'std' => 'Title',
                'type' => 'text',
                'label' => __('Tab Title', 'textdomain'),
                'desc' => __('Title of the tab', 'textdomain'),  
            ),
            'content' => array(
                'std' => 'Tab Content',
                'type' => 'textarea',
                'label' => __('Tab Content', 'textdomain'),
                'desc' => __('Add the tabs content', 'textdomain')
            )	
        ),
        'shortcode' => '[accordion title="{{title}}" ] {{content}} [/accordion]',
        'clone_button' => __('Add Tab', 'textdomain')
    )
);

/*-----------------------------------------------------------------------------------*/
/*	Columns Config
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['columns'] = array(
	'params' => array(),
	'shortcode' => ' {{child_shortcode}} ', // as there is no wrapper shortcode
	'popup_title' => __('Insert Columns Shortcode', 'textdomain'),
	'no_preview' => true,
	
	// child shortcode is clonable & sortable
	'child_shortcode' => array( 
		'params' => array(
			'column' => array(
				'type' => 'select',
				'label' => __('Column Type', 'textdomain'),
				'desc' => __('Select the type, ie width of the column.', 'textdomain'),
				'options' => array(
					'one_first' => 'One First',
					'one_third' => 'One Third',
					'two_third' => 'Two Thirds',
					'one_half' => 'One Half',
					'one_fourth' => 'One Fourth',
					'three_fourth' => 'Three Fourth',
					'one_sixth' => 'One Sixth',
					'five_sixth' => 'Five Sixth',
				)
			),
			'content' => array(
				'std' => '',
				'type' => 'textarea',
				'label' => __('Column Content', 'textdomain'),
				'desc' => __('Add the column content.', 'textdomain'),
			)
		),
		'shortcode' => '[{{column}}] {{content}} [/{{column}}] ',
		'clone_button' => __('Add Column', 'textdomain')
	)
);






/*-----------------------------------------------------------------------------------*/
/*	Content Box Config
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['content_box'] = array(
	'no_preview' => true,
		'params' => array(
			'title' => array(
				'std' => '',
				'type' => 'text',
				'label' => __('Title', 'textdomain'),
				'desc' => __('Title of the Callout Box', 'textdomain'),
			),
			'content' => array(
				'std' => '',
				'type' => 'textarea',
				'label' => __('Content', 'textdomain'),
				'desc' => __('', 'textdomain'),
			),
			'icon' => array(
				'std' => '',
				'type' => 'text',
				'label' => __('Icon', 'textdomain'),
				'desc' => __('Icon class <a href="'.get_template_directory_uri().'/assets/images/fontawesome_list.jpg" target="_blank">Refer here </a>', 'textdomain'),
			),
			'style' => array(
				'type' => 'select',
				'std' => 'style1',
				'label' => __('Select Style', 'textdomain'),
				'desc' => __('Select the style content box', 'textdomain'),
				'options' => array(
					'style1' => 'Style 1',
					'style2' => 'Style 2',
				)
				),
			'text_color' => array(
				'type' => 'select',
				'label' => __('Text Color', 'textdomain'),
				'desc' => __('', 'textdomain'),
				'options' => array(
					'default' => 'Default',
					'white' => 'White'
				)
			),
			'animation' => array(
				'type' => 'select',
				'label' => __('Animation', 'textdomain'),
				'desc' => __('', 'textdomain'),
				'options' => $animation,
			)			

		),
		'shortcode' => '[content_box title="{{title}}" icon="{{icon}}" style="{{style}}" text_color="{{text_color}}" animation="{{animation}}"] {{content}} [/content_box]',	
		'popup_title' => __('Content Box', 'textdomain')
);


/*-----------------------------------------------------------------------------------*/
/*	Number Details Config
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['number_details'] = array(
	'no_preview' => true,
		'params' => array(
			'number' => array(
				'std' => '',
				'type' => 'text',
				'label' => __('Number', 'textdomain'),
				'desc' => __('', 'textdomain'),
			),
			'number_details' => array(
				'std' => '',
				'type' => 'text',
				'label' => __('Number Details', 'textdomain'),
				'desc' => __('', 'textdomain'),
			), 
			'text_color' => array(
				'type' => 'select',
				'label' => __('Text Color', 'textdomain'),
				'desc' => __('', 'textdomain'),
				'options' => array(
					'default' => 'Default',
					'white' => 'White',
				),
			),
			'animation' => array(
				'type' => 'select',
				'label' => __('Animation', 'textdomain'),
				'desc' => __('', 'textdomain'),
				'options' => $animation,
			)				

		),
		'shortcode' => '[number_details number_details="{{number_details}}" number="{{number}}" text_color="{{text_color}}" animation="{{animation}}"]',
		'popup_title' => __('Number Details', 'textdomain')
);		
 
/*-----------------------------------------------------------------------------------*/
/*	Contact Details Config
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['contact_details'] = array(
	'no_preview' => true,
		'params' => array(
			'address' => array(
				'std' => '',
				'type' => 'text',
				'label' => __('Adress', 'textdomain'),
				'desc' => __('', 'textdomain'),
			),
			'phone' => array(
				'std' => '',
				'type' => 'text',
				'label' => __('Phone', 'textdomain'),
				'desc' => __('', 'textdomain'),
			),
			'fax' => array(
				'std' => '',
				'type' => 'text',
				'label' => __('Fax', 'textdomain'),
				'desc' => __('', 'textdomain'),
			),
			'mail' => array(
				'std' => '',
				'type' => 'text',
				'label' => __('Mail', 'textdomain'),
				'desc' => __('', 'textdomain'),
			),
			'text_color' => array(
				'type' => 'select',
				'label' => __('Text Color', 'textdomain'),
				'desc' => __('', 'textdomain'),
				'options' => array(
					'default' => 'Default',
					'white' => 'White'
				)
			),
			'animation' => array(
				'type' => 'select',
				'label' => __('Animation', 'textdomain'),
				'desc' => __('', 'textdomain'),
				'options' => $animation,
			)			
		),
		'shortcode' => '[contact_details address="{{address}}" phone="{{phone}}" fax="{{fax}}" mail="{{mail}}" text_color="{{text_color}}" animation="{{animation}}"]',	
		'popup_title' => __('Contact Details', 'textdomain')
);




/*-----------------------------------------------------------------------------------*/
/*	Slogan Config
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['slogan'] = array(
	'no_preview' => true,
	'params' => array(
		'text_size' => array(
			'type' => 'select',
			'label' => __('Text SIze', 'textdomain'),
			'desc' => __('', 'textdomain'),
			'options' => array(
				'h1' => 'H1',
				'h2' => 'H2',
				'h3' => 'H3',
				'h4' => 'H4',
				'h5' => 'H5',
				'h6' => 'H6',
			),
		),
		'content' => array(
			'std' => 'Text',
			'type' => 'text',
			'label' => __('Text', 'textdomain'),
			'desc' => __('', 'textdomain'),
		),
		'text_color' => array(
			'type' => 'select',
			'label' => __('Text Color', 'textdomain'),
			'desc' => __('', 'textdomain'),
			'options' => array(
				'default' => 'Default',
				'white' => 'White'
			),
		),
		'animation' => array(
			'type' => 'select',
			'label' => __('Animation', 'textdomain'),
			'desc' => __('', 'textdomain'),
			'options' => $animation,
		)		
	),
	'shortcode' => '[slogan text_size="{{text_size}}" text_color="{{text_color}}" animation="{{animation}}"] {{content}} [/slogan]',
	'popup_title' => __('Slogan', 'textdomain')
);/*-----------------------------------------------------------------------------------*//*	TEAM/*-----------------------------------------------------------------------------------*/$zilla_shortcodes['team'] = array(	'no_preview' => true,	'params' => array(		'column' => array(			'type' => 'select',			'label' => __('Column', 'textdomain'),			'desc' => __('Select column', 'textdomain'),			'options' => array(				'column-1' => '1/1',				'column-2' => '1/2',				'column-3' => '1/3',				'column-4' => '1/4'			)		),			),	'shortcode' => '[team column="{{column}}"]',	'popup_title' => __('Insert team Shortcode', 'textdomain'));/*-----------------------------------------------------------------------------------*//*	Video Config/*-----------------------------------------------------------------------------------*/$zilla_shortcodes['video_player'] = array(	'no_preview' => true,	'params' => array(            'video_type' => array(			'type' => 'select',			'label' => __('Video Type', 'textdomain'),			'desc' => __('', 'textdomain'),			'options' => array(				'youtube' => 'Youtube',				'vimeo' => 'Vimeo',			),		),		'video_id' => array(			'std' => '',			'type' => 'text',			'label' => __('Video ID', 'textdomain'),			'desc' => __('Enter Youtube or Vimeo ID', 'textdomain')		)			),	'shortcode' => '[video_player video_type="{{video_type}}" video_id="{{video_id}}"]',	'popup_title' => __('Insert Video', 'textdomain'));

/*-----------------------------------------------------------------------------------*/
/*	Text Config
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['text'] = array(
	'no_preview' => true,
	'params' => array(
		'text_size' => array(
			'type' => 'select',
			'label' => __('Text SIze', 'textdomain'),
			'desc' => __('', 'textdomain'),
			'options' => array(
				'h1' => 'H1',
				'h2' => 'H2',
				'h3' => 'H3',
				'h4' => 'H4',
				'h5' => 'H5',
				'h6' => 'H6',
			),
		),
		'content' => array(
			'std' => 'Text',
			'type' => 'textarea',
			'label' => __('Text', 'textdomain'),
			'desc' => __('', 'textdomain'),
		),
		'text_color' => array(
			'type' => 'select',
			'label' => __('Text Color', 'textdomain'),
			'desc' => __('', 'textdomain'),
			'options' => array(
				'default' => 'Default',
				'white' => 'White'
			),
		),
		'animation' => array(
			'type' => 'select',
			'label' => __('Animation', 'textdomain'),
			'desc' => __('', 'textdomain'),
			'options' => $animation,
		)		
	),
	'shortcode' => '[text text_size="{{text_size}}" text_color="{{text_color}}" animation="{{animation}}"] {{content}} [/text]',
	'popup_title' => __('Text', 'textdomain')
);
?>