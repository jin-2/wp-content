<?php
/**
 * @package Inesta
 */
?>

<?php 
    if ( ! comments_open() ) { // There are comments but comments are now closed
        echo '';
	}
	else {
		if (have_comments()) { ?>
<div id="comments">
	<h4><?php comments_number('No Responses', 'One Response', '% Responses');?> <?php printf('to %s', the_title('', '', false)); ?></h4>
		<?php $comments = get_comments( array (
			'post_id' => $post->ID
			)
		); ?>
    <ul id="list-comments">
		<?php
     wp_list_comments(array(
      // see http://codex.wordpress.org/Function_Reference/wp_list_comments
      // 'login_text'        => 'Login to reply',
      // 'callback'          => null,
      // 'end-callback'      => null,
      // 'type'              => 'all',
      // 'reverse_top_level' => null,
	   'avatar_size'       => 60
      // 'reverse_children'  =>
      ));
      ?>
	</ul>
			<nav id="pagination">
				<?php paginate_comments_links();?>
				<div class="clear"></div>
			</nav>
</div>
<?php } ?>
<div id="comment-form">
		<?php	
		 $commenter = wp_get_current_commenter();
		

			//$fields['email'] = '';
           /* $fields[ 'comment_notes_before' ]=$fields[ 'comment_notes_after' ] = '';
			$fields[ 'author' ] = '<div class="field"> 
										<input type="text" name="author" placeholder="' . __('Name', 'inesta') . '" value="' . esc_attr($commenter['comment_author']) . '"  id="author" class="style-input" />
									</div>';
            $fields[ 'comment_field' ] = 
                '<div class="comment-form-comment">'.
                    '<textarea name="comment" id="comment" placeholder="'. __('Comment', 'inesta') .'" class="required" rows="8" tabindex="4"></textarea>'.
                '</div>';*/
            
            //echo '<div class="row-fluid">';
	    	comment_form( array (
			'comment_notes_before' => '',
			'comment_notes_after' => '',
			'fields' => apply_filters( 'comment_form_default_fields', array(
		'author' => '<div class="field"><input type="text" name="author" placeholder="' . __('Name', 'inesta') . '" value="' . esc_attr($commenter['comment_author']) . '"  id="author" class="style-input" /></div>',
		'email' => '<div class="field margin-field"><input type="text" name="email" placeholder="' . __('Email', 'inesta') . '" value="' . esc_attr($commenter['comment_author_email']) . '"  id="email" class="style-input" /></div>',
		'url' => '<div class="field">' . '<input id="url" name="url" type="text"  placeholder="' . __('Site', 'inesta') . '" /></div><div class="clear"></div>', 
	  
		)
			)
		) 
		);  
           // comment_form($fields);  ?>
</div>
<?php } ?>