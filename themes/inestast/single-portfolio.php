<?php 
/**
 *
 * @package Inesta
 */
?>
<?php get_header(); ?><div id="portfolio-item" class="single-portfolio">	<header>		<div class="container">			<div class="row">				<div class="col-md-12">					<a href="<?php echo get_home_url(); ?>" id="home-button"><i class="fa fa-home"></i></a>				</div>			</div>		</div>	</header>	<section id="content-ajax">
<?php 
if(have_posts()) :
			while (have_posts() ) : the_post();
				$skills =  get_post_meta( get_the_ID(),'skills',true );		
				$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
				$release_date =  get_post_meta( get_the_ID(),'release_date',true );	
				$client =  get_post_meta( get_the_ID(),'client',true );	
				$copyright =  get_post_meta( get_the_ID(),'copyright',true );	
				$sample_meta =  get_post_meta( get_the_ID(),'sample_meta',true );
				$project_link =  get_post_meta( get_the_ID(),'project_link',true );
				$project_description =  get_post_meta( get_the_ID(),'project_description',true );
				$project_link_url =  get_post_meta( get_the_ID(),'project_link_url',true );								$video_id =  get_post_meta( get_the_ID(),'project_video',true );								$video_type =  get_post_meta( get_the_ID(),'video_type',true );								$portfolio_type =  get_post_meta( get_the_ID(),'portfolio_type',true );								$slides = get_post_meta( get_the_ID(),'project_slideshow',true );												if( $video_type =='youtube'){					$video_url = 'http://www.youtube.com/embed/'.$video_id;				}elseif( $video_type == 'vimeo'){					$video_url = 'http://player.vimeo.com/video/'.$video_id.'?title=0&amp;byline=0&amp;portrait=0';				}				
				?>
<div class="portfolio-border">
	<div class="container">
		<div class="row">
			<div id="close-button">
				<i class="fa fa-times"></i>
			</div>
			<div class="col-sm-8 col-lg-8">								<?php if($portfolio_type == '' || $portfolio_type == 'picture_type'):?>							<img src="<?php echo $url;?>" alt="" class="img-responsive" />						<?php elseif($portfolio_type == 'video_type'): ?>							<script>								jQuery(document).ready(function() {									jQuery('.media-portfolio').fitVids();								});							</script>							<div class="media-portfolio">								<iframe src="<?php echo $video_url ;?>" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>							</div>						<?php elseif($portfolio_type = 'slider_type'): ?>							<script>								jQuery('.portfolio-slideshow ul').responsiveSlides({									nav: true,									auto: true,									prevText: "<i class='fa fa-angle-left'></i>",									nextText: "<i class='fa fa-angle-right'></i>",								});							</script>							<ul>							<div class="portfolio-slideshow">								<ul>								<?php									if ( ! empty( $slides ) ) {										foreach( $slides as $slide ) {											if($slide['link'] == '') {												echo '													<li>														<img src="' . $slide['image'] . '" alt="' . $slide['title'] . '" />													</li>';												}												else {												echo '													<li>														<a href="#" target="_blank"><img src="' . $slide['image'] . '" alt="' . $slide['title'] . '" /></a>													</li>';												}										}									}								?>								</ul>							</div>						<?php endif;?>
			</div>
			<div class="col-sm-4 col-lg-4">
			
				<h5>Project Details</h5>
				<ul class="details">
			<?php if($skills):?>
				<li>
					<span>Skills</span>: <?php echo $skills; ?>
				</li>
			<?php endif;?>
			<?php if($release_date):?>	
				<li>
					<span>Release Date</span>: <?php echo $release_date; ?>
				</li>
			<?php endif;?>
			<?php if($client):?>	
				<li>
					<span>Client</span>: <?php echo $client; ?>
				</li>
			<?php endif;?>
			<?php if($copyright):?>
				<li>
					<span>Copyright</span>: <?php echo $copyright; ?>
				</li>
			<?php endif;?>
			<?php if($sample_meta):?>
				<li>
					<span>Sample Meta</span>: <?php echo $sample_meta; ?>
				</li>
			<?php endif;?>
			<?php if($project_link):?>
				<li>
					<span>Project's link</span>: <a href="<?php echo $project_link_url;?>" target="_blank" class="general_color"><?php echo $project_link;?></a>
				</li>
			<?php endif;?>
			</ul>
			<?php if($project_description):?>
				<h5 class="top-space">Project Description</h5>
				<p class="description-portfolio">
					<?php echo $project_description; ?>
				</p>
			<?php endif;?>
			</div>
		</div>
	</div>
</div>

<?php endwhile;endif;?></section></div><?php get_footer(); ?>