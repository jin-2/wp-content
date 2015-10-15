<?php
/**
 * @package Inesta
 */
?>
<?php save_smof_options(); global $smof_data;?>
<div id="category-<?php the_ID(); ?>" <?php post_class( 'post'); ?>>
	<div class="media">
		<?php
		$args = array(  
		'numberposts' => -1, // Using -1 loads all posts  
		'orderby' => 'menu_order', // This ensures images are in the order set in the page media manager  
		'order'=> 'ASC',  
		'post_mime_type' => 'image', // Make sure it doesn't pull other resources, like videos  
		'post_parent' => $post->ID, // Important part - ensures the associated images are loaded 
		'post_status' => null, 
		'post_type' => 'attachment'  
		);  
	  
		$images = get_children( $args );
		
		if( !has_post_format( 'video' ) &&! has_post_format( 'gallery' )  ) {
			if ( has_post_thumbnail() ) { 
			 echo '<a href="'.get_permalink().'">';
			 the_post_thumbnail( 'post-thumb', array('class' => 'img-responsive post-thumb') );
			 echo '</a>';
			}
		
		} 
		elseif($images && has_post_format( 'gallery' )){
			echo '<ul class="rslides">';
			foreach($images as $image){ 
				echo '<li>';
				echo '<a href="'.get_permalink().'">';
				echo wp_get_attachment_image($image->ID, 'post-thumb'); 
				echo '</a></li>';
			}
			echo '</ul>';	
		
			
		
		}
		elseif( has_post_format( 'video' ) ) {
			$video = get_post_meta( $post->ID, '_format_video_embed', true ); 
			$video = str_replace('<iframe', '<div class="media"><iframe', $video);
			$video = str_replace('</iframe>', '</iframe></div>', $video);
			 echo '<div>'.$video.'</div>';
		}
		?> 
	</div>
	<header>
		<h4><a href="<?php  the_permalink(); ?>"><?php the_title(); ?></a></h4>
		<p>
		<?php
			if($smof_data['enable_author_info']){
				echo 'Posted by '. get_the_author_link();
			}
			if($smof_data['enable_create_data']){
				if($smof_data['enable_author_info']){
					echo ' | ';
					}
				the_time('F jS, Y');
			}
			if($smof_data['enable_comments_info']){
				if($smof_data['enable_author_info'] || $smof_data['enable_create_data']){
					echo ' | ';
				}	
				echo  '<a href="'.get_comments_link().'">';
				comments_number( 'No responses', '1 Response', '% Responses' );
				echo '</a>';
			}
		?>
		</p> 
	</header>

	<div class="post-content">
		<?php the_excerpt(); ?> 
	</div>
	<footer>
	<p class="readmore"><a href="<?php  the_permalink(); ?>">Read more</a></p>
	</footer>
</div>