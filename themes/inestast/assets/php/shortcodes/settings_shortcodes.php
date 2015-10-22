<?php

/*-----------------------------------------------------------------------------------*/
/*	Column Shortcodes
/*-----------------------------------------------------------------------------------*/
if (!function_exists('one_first')) {
	function one_first( $atts, $content = null ) {
	   return '<div class="col-md-12 column">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('one_first', 'one_first');
}

if (!function_exists('one_third')) {
	function one_third( $atts, $content = null ) {
	   return '<div class="col-sm-4 col-lg-4 column">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('one_third', 'one_third');
}


if (!function_exists('two_third')) {
	function two_third( $atts, $content = null ) {
	   return '<div class="col-sm-8 col-lg-8 column">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('two_third', 'two_third');
}


if (!function_exists('one_half')) {
	function one_half( $atts, $content = null ) {
	   return '<div class="col-sm-6 col-lg-6 column">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('one_half', 'one_half');
}


if (!function_exists('one_fourth')) {
	function one_fourth( $atts, $content = null ) {
	   return '<div class="col-sm-3 col-lg-3 column">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('one_fourth', 'one_fourth');
}



if (!function_exists('three_fourth')) {
	function three_fourth( $atts, $content = null ) {
	   return '<div class="col-sm-9 col-lg-9 column">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('three_fourth', 'three_fourth');
}




if (!function_exists('one_sixth')) {
	function one_sixth( $atts, $content = null ) {
	   return '<div class="col-sm-2 col-lg-2 column">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('one_sixth', 'one_sixth');
}


if (!function_exists('five_sixth')) {
    function five_sixth( $atts, $content = null ) {
        return '<div class="col-sm-10 col-lg-10 column">' . do_shortcode($content) . '</div>';
    }
    add_shortcode('five_sixth', 'five_sixth');
}

if (!function_exists('button')) {
    function button( $atts, $content = null ) {
        extract(shortcode_atts(array(
            'style' => 'btn-default',
            'href' => '#'
        ), $atts));
        return '<a class="'.$style.'" href="'.$href.'">' . do_shortcode($content) . ' <i class="fa fa-chevron-right"></i></a>';
    }
    add_shortcode('button', 'button');
}


/*-----------------------------------------------------------------------------------*/
/*	Google Maps
/*-----------------------------------------------------------------------------------*/

if (!function_exists('map')) {
    function map( $atts, $content = null ) {
        extract(shortcode_atts(array(
            'address'   => 'address'
        ), $atts));

        return '
            <script type="text/javascript" src="https://maps.google.com/maps/api/js?v=3.exp&region=KR"></script>
            <script>
            jQuery(document).ready(function(){
                google.maps.event.addDomListener(window, "load", initialize);
                var geocoder;
                var map;
                var marker;
                var marker_image = "'.get_template_directory_uri().'/assets/images/map-marker-100.png"; //마커 이미지 설정
                function initialize(){
                    if(jQuery("#map-canvas").length) {
                        geocoder = new google.maps.Geocoder();
                        var mapOptions = { //구글 맵 옵션 설정
                            zoom : 16, //기본 확대율
                            center : new google.maps.LatLng(40.8112834, -74.245077), // 지도 중앙 위치
                            scrollwheel : false, //마우스 휠로 확대 축소 사용 여부
                            mapTypeId: google.maps.MapTypeId.ROADMAP
                        };

                        map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions); //구글 맵을 사용할 타겟



                        marker = new google.maps.Marker({ //마커 설정
                            map : map,
                            position : map.getCenter(), //마커 위치
                            icon : marker_image //마커 이미지
                        });
                        google.maps.event.addDomListener(window, "resize", function() { //리사이즈에 따른 마커 위치
                            var center = map.getCenter();
                            google.maps.event.trigger(map, "resize");
                            map.setCenter(center);
                        });

                    }//if-end
                    codeAddress();
                }//function-end

                function codeAddress(){
                    var address = "'.$address.'";

                    geocoder.geocode({
                        "address": address
                    }, function(results, status){
                        console.log(status);
                        if (status == google.maps.GeocoderStatus.OK) {
                            map.setCenter(results[0].geometry.location);
                            addMark(results[0].geometry.location.lat(), results[0].geometry.location.lng());

                        }
                    });
                }

                function addMark(lat, lng){
                    if(typeof marker!="undefined"){
                        marker.setMap(null);
                    }

                    marker = new google.maps.Marker({
                        map: map,
                        position: new google.maps.LatLng(lat, lng),
                        icon : marker_image //마커 이미지
                    });
                }

            });

            </script>

            <div id="map-canvas" style="width: 100%; height: 400px"></div>

';
    }
    add_shortcode('map', 'map');
}

/*-----------------------------------------------------------------------------------*/
/*	Alerts
/*-----------------------------------------------------------------------------------*/

if (!function_exists('alert')) {
	function alert( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'style'   => 'alert-1',
			'animation' => ''
	    ), $atts));
		
	   return '<div class="alert '.$style.' '.$animation.' my-animation">' . do_shortcode($content) . '<i class="fa fa-times close-alert"></i></div>';
	}
	add_shortcode('alert', 'alert');
}


/*-----------------------------------------------------------------------------------*/
/*	Toggle Shortcodes
/*-----------------------------------------------------------------------------------*/
	
if (!function_exists('toggle')) {
	function toggle( $atts, $content = null ) {
	    extract(shortcode_atts(array(
			'title'    	 => 'Title goes here',
			'state'		 => 'open',
			'animation'   => ''
	    ), $atts));
	
		
			if($state == 'open') $state_return= 'style="overflow: hidden; display: block;"';
			elseif($state =="closed") $state_return= 'style="overflow: hidden; display: none;"';
		
		return '<div class="toggle '.$animation.' my-animation"><div class="toggle-title"><div class="toggle-title-text hover-icon">'.$title .'</div><div class="toggle-arrow">+</div></div>
		<div class="toggle-content" '.$state_return.' >'.do_shortcode($content) .	'		</div>
		</div>';
		

	}
	add_shortcode('toggle', 'toggle');
}


/*-----------------------------------------------------------------------------------*/
/*	Tabs Shortcodes
/*-----------------------------------------------------------------------------------*/

if (!function_exists('tabs')) {
	function tabs( $atts, $content = null ) {
		$defaults = array('animation' => '');
		extract( shortcode_atts( $defaults, $atts ) );
		
		STATIC $i = 0;
		$i++;
		
		// Extract the tab titles for use in the tab widget.
		preg_match_all( '/tab title="([^\"]+)"/i', $content, $matches, PREG_OFFSET_CAPTURE );

		$tab_titles = array();
		if( isset($matches[1]) ){ $tab_titles = $matches[1]; }
		
		$output = '';
		

		if( count($tab_titles) ){
		    $output .= '<div id="tabs-'. $i .'" class="tabs '.$animation.' my-animation">';
			$output .= '<ul class="tabs-menu">';
			$element = 1;
			
			foreach( $tab_titles as $tab ){
				if($element == 1) {
					$output .= '<li class="active-tab"><a href="#tab-content-'.sanitize_title( $tab[0] ) .'">' . $tab[0] . '</a></li>';
					$element++;
				}
				else {
					$output .= '<li><a href="#tab-content-'.sanitize_title( $tab[0] ) .'">' . $tab[0] . '</a></li>';
				}
			}
		    
		    $output .= '</ul><div class="clear"></div>';
		    $output .= do_shortcode( $content );
		    $output .= '</div>';
		} else {
			$output .= do_shortcode( $content );
		}
		
		return $output;
	}
	add_shortcode( 'tabs', 'tabs' );
}

if (!function_exists('tab')) {
	function tab( $atts, $content = null ) {
		$defaults = array( 'title' => 'Tab' );
		extract( shortcode_atts( $defaults, $atts ) );
		
		return '<div id="tab-content-'. sanitize_title( $title ) .'" class="tab-content" >'. do_shortcode( $content ) .'</div>';
	}
	add_shortcode( 'tab', 'tab' );
}


/*-----------------------------------------------------------------------------------*/
/*	Accordions Shortcodes
/*-----------------------------------------------------------------------------------*/

if (!function_exists('accordions')) {
	function accordions( $atts, $content = null ) {
		$defaults = array('animation' => '' );
		extract( shortcode_atts( $defaults, $atts ) );
		
		STATIC $i = 0;
		$i++;
		
		// Extract the tab titles for use in the tab widget.
		preg_match_all( '/accordion title="([^\"]+)"/i', $content, $matches, PREG_OFFSET_CAPTURE );

		$tab_titles = array();
		if( isset($matches[1]) ){ $tab_titles = $matches[1]; }
		
		$output = '';
		

		if( count($tab_titles) ){
		    $output .= '<div id="tabs-'. $i .'" class="single-toggles '.$animation.' my-animation">';
				$output .= do_shortcode( $content );
		    $output .= '</div>';
		} else {
			$output .= do_shortcode( $content );
		}
		
		return $output;
	}
	add_shortcode( 'accordions', 'accordions' );
}

if (!function_exists('accordion')) {
	function accordion( $atts, $content = null ) {
		$defaults = array( 'title' => 'Tab' );
		extract( shortcode_atts( $defaults, $atts ) );
		
		return '<div class="toggle">
								<div class="toggle-title">
									<div class="toggle-title-text hover-icon">'.
										$title .'
									</div>
									<div class="toggle-arrow">
										+
									</div>
								</div>
								<div class="toggle-content" style="overflow: hidden; display: none;">
									'.do_shortcode( $content ).'
								</div>
							</div>';
							
	}
	add_shortcode( 'accordion', 'accordion' );
}



/*-----------------------------------------------------------------------------------*/
/* Content Box Shortcodes
/*-----------------------------------------------------------------------------------*/

if (!function_exists('content_box')) {
	function content_box( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'title'   => 'Title',
			'icon' => '',
			'style' => '',
			'text_color'=>'',
			'animation' =>''
	    ), $atts));
		
	   if($style =='style1'){ return '<div class="infobox-1 '.$text_color.' '.$animation.' my-animation"><i class="general_color fa '.$icon.'"></i> 
	   <h3>'. $title .'</h3>
	   <p>'.do_shortcode( $content ).'</p></div>';}
	   elseif($style =='style2'){ return '<div class="infobox-2 '.$text_color.' '.$animation.' my-animation"><header>
								<div><i  class="general_color fa '.$icon.'"></i></div>
								<h4>'. $title .'</h4></header>
								<p>'.do_shortcode( $content ).'
								</p>  
							</div>';}
	}
	add_shortcode('content_box', 'content_box');
}

/*-----------------------------------------------------------------------------------*/
/* Number Details Shortcodes
/*-----------------------------------------------------------------------------------*/


if (!function_exists('number_details')) {
	function number_details( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'number'   => '100',
			'number_details' => '',
			'text_color' => 'default',
			'animation' =>'',
	    ), $atts));
		
	   return '<div class="number-container my-animation '.$animation.'" data-perc="'.$number.'">
								<div class="number general_color">'.$number.'</div>
								<h3 class="number_details '.$text_color.'">'.$number_details.'</h3>
							</div>';
	}
	add_shortcode('number_details', 'number_details');
}

/*-----------------------------------------------------------------------------------*/
/* Clear Shortcodes
/*-----------------------------------------------------------------------------------*/


if (!function_exists('clear')) {
	function clear( $atts, $content = null ) {
		extract(shortcode_atts(array(
				
	    ), $atts));
		
	   return '<div class="clear"></div>';
	}
	add_shortcode('clear', 'clear');
}

/*-----------------------------------------------------------------------------------*/
/* Divider Shortcodes
/*-----------------------------------------------------------------------------------*/


if (!function_exists('divider')) {
	function divider( $atts, $content = null ) {
		extract(shortcode_atts(array(
				
	    ), $atts));
		
	   return '<div class="divider-1"></div>';
	}
	add_shortcode('divider', 'divider');
} 

/*-----------------------------------------------------------------------------------*/
/* Team Shortcodes
/*-----------------------------------------------------------------------------------*/


if (!function_exists('team')) {
	function team( $atts, $content = null ) {
	
	extract(shortcode_atts(array(
			'column'   => 'col-sm-4 col-lg-4',
	    ), $atts));
		ob_start();
		
		if($column == 'column-1') $column = 'col-md-12';
		if($column == 'column-2') $column = 'col-lg-6 col-sm-6';
		if($column == 'column-3') $column = 'col-lg-4 col-sm-4';
		if($column == 'column-4') $column = 'col-lg-3 col-sm-3';
		
		$the_query = new WP_Query(array('post_type'=>'team','posts_per_page' => -1,));
		if($the_query->have_posts()) :
			while ( $the_query->have_posts() ) : $the_query->the_post();
			$photo = get_post_meta( get_the_ID(),'photo',true );
			$facebook = get_post_meta( get_the_ID(),'facebook',true );
			$twitter = get_post_meta( get_the_ID(),'twitter',true );
			$googleplus = get_post_meta( get_the_ID(),'googleplus',true );
			$linkedin = get_post_meta( get_the_ID(),'linkedin',true );	
			$dribble = get_post_meta( get_the_ID(),'dribble',true );
			$job = get_post_meta( get_the_ID(),'job',true );
			echo '<div class="'.$column.' team-member">
					<div class="team-member">
							<div class="photo-member effect-1 animated">
								<img src="'.$photo.'" alt="" class="img-responsive" />
							</div><div class="clear"></div>';
							
								if(!empty($facebook)):
									echo '<a href="'.$facebook.'" class="social-1"><i class="fa fa-facebook"></i></a>';
								endif;	
								if(!empty($twitter)):
									echo '<a href="'.$twitter.'" class="social-1"><i class="fa fa-twitter"></i></a>';
								endif;
								if(!empty($dribble)):
									echo '<a href="'.$dribble.'" class="social-1"><i class="fa fa-dribbble"></i></a>';
								endif;
								if(!empty($linkedin)):
									echo '<a href="'.$linkedin.'" class="social-1"><i class="fa fa-linkedin"></i></a>';
								endif;	
								if(!empty($googleplus)):
									echo '<a href="'.$googleplus.'" class="social-1"><i class="fa fa-google-plus"></i></a>';
								endif;	
							
					echo '
							<div class="info-team">
								<p>'.get_the_title().'</p>
								<span>'.$job.'</span>
							</div>
						</div>
						
					</div>';
			endwhile;
			echo '<div class="clear"></div>';
		endif;
		$tmp = ob_get_clean();
		return $tmp;
	}
	add_shortcode('team', 'team');
}
/*-----------------------------------------------------------------------------------*/
/* Clients Shortcodes
/*-----------------------------------------------------------------------------------*/


if (!function_exists('clients')) {
	function clients( $atts, $content = null ) {
		ob_start();
			$the_query = new WP_Query( 'post_type=clients&posts_per_page=-1');
		
			echo '<ul class="client-carousel">';
			if($the_query->have_posts()) :
			while ( $the_query->have_posts() ) : $the_query->the_post();
			$image = get_post_meta( get_the_ID(),'image',true );
				$client_link = get_post_meta( get_the_ID(),'client_link',true );
			if(!$client_link){
			echo '<li><img src="'.$image.'" class="img-responsive" alt="" /></li>';
			}else{
			echo '<li><a href="'.$client_link.'" style="border:none;" target="_blank"><img src="'.$image.'" class="img-responsive" alt="" /></a></li>';
			}
			endwhile;
		endif;
		echo '</ul>';
		wp_reset_query(); 
		$tmp = ob_get_clean();
		return $tmp;
	}
	add_shortcode('clients', 'clients');
}

/*-----------------------------------------------------------------------------------*/
/* Portfolio Shortcodes
/*-----------------------------------------------------------------------------------*/


if (!function_exists('portfolio')) {
	function portfolio( $atts, $content = null ) {
        extract(shortcode_atts(array(
            'only_featured'   => 'no',
            'more_href' => get_home_url().'/portfolio'
        ), $atts));

        $portfolio_query = array(
            'post_type' => 'portfolio',
            'posts_per_page' => 50
        );
        if($only_featured == "yes") {
            $portfolio_query['tax_query'] = array(
                array(
                    'taxonomy' => 'portfolio-category',
                    'field'    => 'slug',
                    'terms'    => 'featured',
                )
            );
        }
	ob_start();	
		wp_reset_query();
		global $smof_data;
		$the_query_portfolio = new WP_Query( $portfolio_query );
        if($only_featured == "no") :
			echo '
			
			<div id="portfolio-categories">
				<div class="container">
					<div class="row">
						<ul>
							<li class="current-cat"><a href="#" data-filter="*">'.$smof_data['shortcode_portfolio'].'</a>';
							$terms = get_terms('portfolio-category','hide_empty=0');
							 $count = count($terms);
							 if ( $count > 0 ){
								
								 foreach ( $terms as $term ) {
								   echo '<li><a href="#" data-filter=".'.$term->slug.'">' . $term->name . '</a></li>';
									
								 }
							
							 }
						echo '</ul>
					</div>
				</div>
			</div>
			';
			

        endif;
        echo '
            <div id="portfolio-loader">
				<img src="'.get_template_directory_uri().'/assets/images/loader.gif" alt ="Loading" />
			</div>
			<div id="portfolio-item" class="section-main gap-bottom"></div>
        ';
        echo '<div id="works-list">';
        if($the_query_portfolio->have_posts()) :
			while ($the_query_portfolio->have_posts() ) : $the_query_portfolio->the_post();
			//$url = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );
            $thumbnails = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'portfolio-image' );
                $url = $thumbnails[0];
                //printr($thumbnails,"thumbnails");

			 
			$term_list = wp_get_post_terms(get_the_ID(), 'portfolio-category', array("fields" => "slugs"));
						echo '<a href="'.get_permalink().'" class="';
							foreach ($term_list as  $terms   ){
								echo $terms.' ';   
							
							}
						
						echo '">';
						echo '
											<img src="'.$url.'" class="img-responsive" alt="" /> 
											<div class="field-table">
												<div class="table-container">
													<div class="work-info">
														<p>'.get_the_title().'</p>';
														$i =0;
														$term_list_name = wp_get_post_terms(get_the_ID(), 'portfolio-category', array("fields" => "names"));
														foreach ($term_list_name as  $terms   ){
															echo $terms; 
															if($i < count($term_list_name)-1){
															echo ' / ';
															}
															$i++;
														};
													echo '</div>
												</div>
											</div>
								</a>';
			endwhile;
		endif;

		echo '</div>';
        if($only_featured == "yes") echo '<div class="container">
<div class="row"><a class="btn-default" href="'.$more_href.'">More portfolios <i class="fa fa-chevron-right"></i></a></div>
</div>';
	$tmp = ob_get_clean();
	return $tmp;
	}
	add_shortcode('portfolio', 'portfolio');
}

/*-----------------------------------------------------------------------------------*/
/*	Contact Form Shortcodes
/*-----------------------------------------------------------------------------------*/
 
if (!function_exists('contact_form')) {
	function contact_form( $atts, $content = null ) {
	ob_start();	
		global $smof_data;
	   return '
				<script>var form_url = "'.get_template_directory_uri().'/assets/php/contact_form/";</script>
				<div id="contact-form-script">
						<form method="post" id="form-ajax" action="#">

								<div class="col-sm-6 col-lg-6">
									<textarea placeholder="'.$smof_data['contact_message'].'" id="message-contact" name="message"></textarea>
								</div>
								<div class="col-sm-6 col-lg-6">
									<input type="text" name="personal" placeholder="'.$smof_data['contact_name'].'" id="personal" />
									<input type="text" name="email" placeholder="'.$smof_data['contact_email'].'" id="email" />
									<input type="text" name="website" placeholder="'.$smof_data['contact_website'].'" id="website" />
								</div>
								<div class="clear"></div>

								<div class="col-md-12">
									<div id="submit-button-contact">
										<i class="fa fa-envelope"></i>
										<input type="submit" value="&nbsp;" />
									</div>
								</div>

							
							<input type="hidden" name="my_email" value="'.$smof_data['contact_email_shortcode'].'" />
						</form>
					</div><div id="contact-success"><h4 class="contact-text">'.$smof_data['contact_success'].'</h4></div>';
	$tmp = ob_get_clean();
	return $tmp;
	}
	add_shortcode('contact_form', 'contact_form');
}

/*-----------------------------------------------------------------------------------*/
/*	Contact Details Shortcodes
/*-----------------------------------------------------------------------------------*/
 
if (!function_exists('contact_details')) {
	function contact_details( $atts, $content = null ) {
		extract(shortcode_atts(array(
		'address' => '',
		'phone' => '',
		'fax' => '',
		'mail'=>'',
		'text_color' => 'default',
		'animation' => ''
	    ), $atts));
		
	   return '	<div id="contact-info"> 
					<div class="col-sm-4 col-lg-4 contact-box '.$animation.' my-animation '.$text_color.'">
						<span>
							<i class="fa fa-map-marker contact-info-head"></i>
						'.$address.'
						</span>
					</div>
					<div class="col-sm-4 col-lg-4 contact-box '.$animation.' my-animation '.$text_color.'">
						<span>
							<i class="fa fa-phone contact-info-head"></i>
							'.$phone.'
						</span>
					</div>
					<div class="col-sm-4 col-lg-4 contact-box '.$animation.' my-animation '.$text_color.'">
						<span>
							<i class="fa fa-envelope contact-info-head"></i>
							'.$mail.'
						</span>
					</div>
				</div>';
	}
	add_shortcode('contact_details', 'contact_details');
}



/*-----------------------------------------------------------------------------------*/
/* Video Shortcodes
/*-----------------------------------------------------------------------------------*/
if (!function_exists('video_player')) {
    function video_player($atts) {
    $atts = extract(shortcode_atts(array(
            'video_id' => '',
            'video_type'=>''
            ),$atts));

            if(isset($video_id)){
              if( $video_type =='youtube'){
              $video_url = 'http://www.youtube.com/embed/'.$video_id;
              }elseif( $video_type == 'vimeo'){
              $video_url = 'http://player.vimeo.com/video/'.$video_id.'?title=0&amp;byline=0&amp;portrait=0';
              }
                    if(!empty($video_url)):
                    $video = '';
                    $video .= '<div class="fit">';
                            $video .= '<iframe src="'.$video_url.'"  width="500" height="281" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>';
                            $video .= '</div>';

                    endif;
                    return $video;
            }
    }
    add_shortcode('video_player','video_player');
}



/*-----------------------------------------------------------------------------------*/
/*	Slogan Shortcodes
/*-----------------------------------------------------------------------------------*/
 
if (!function_exists('slogan')) {
	function slogan( $atts, $content = null ) {
		extract(shortcode_atts(array(
		'text_size' => '',
		'text_color' => 'default',
		'animation' => ''
	    ), $atts));
		

		return '<div class="slogan '.$text_color.' '.$animation.' my-animation"><'.$text_size.'>'.do_shortcode( $content ).'</'.$text_size.'></div>';
	}
	add_shortcode('slogan', 'slogan');  
}

/*-----------------------------------------------------------------------------------*/
/*	Text Shortcodes
/*-----------------------------------------------------------------------------------*/
 
if (!function_exists('text')) {
	function text( $atts, $content = null ) {
		extract(shortcode_atts(array(
		'text_size' => '',
		'text_color' => 'default',
		'animation' => ''
	    ), $atts));
		
		return '<div class="text '.$text_color.' '.$animation.' my-animation"><'.$text_size.'>'.do_shortcode( $content ).'</'.$text_size.'></div>';
	   
	}
	add_shortcode('text', 'text');
}


/*-----------------------------------------------------------------------------------*/
/* Twitter Shortcodes
/*-----------------------------------------------------------------------------------*/


if (!function_exists('twitter')) {
	function twitter( $atts, $content = null ) {
		ob_start();	
		global $smof_data;
		if( $smof_data['access_token'] && $smof_data['access_token_secret'] && $smof_data['consumer_key'] &&$smof_data['consumer_secret']){
			include(get_template_directory()  . '/assets/php/tweets.php');
			include(get_template_directory()  . '/assets/php/tweets-user.php');
		}
		else {
		echo 'None of arguments';
		}
		$tmp = ob_get_clean();
		return $tmp;
	}
	add_shortcode('twitter', 'twitter');
}