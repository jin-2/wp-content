<?php
/**
 * @package Inesta
 */
 ?>
<?php save_smof_options(); global $smof_data;?>	
		<!-- ===== FOOTER ===== --> 
		<footer id="foot-page">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
							<?php 
								if($smof_data['facebookurl']){
									echo '<a href="'.$smof_data['facebookurl'].'" class="social-1"><i class="fa fa-facebook"></i></a>';
								}
								if($smof_data['twitterurl']){
									echo '<a href="'.$smof_data['twitterurl'].'" class="social-1"><i class="fa fa-twitter"></i></a>';
								}
								if($smof_data['dribbleurl']){
									echo '<a href="'.$smof_data['dribbleurl'].'" class="social-1"><i class="fa fa-dribbble"></i></a>';
								}
								if($smof_data['linkedinurl']){
									echo '<a href="'.$smof_data['linkedinurl'].'" class="social-1"><i class="fa fa-linkedin"></i></a>';
								}
								if($smof_data['googleurl']){
									echo '<a href="'.$smof_data['googleurl'].'" class="social-1"><i class="fa fa-google-plus"></i></a>';
								}
							?>
						<?php if($smof_data['copyright_text']):?>
						<p id="copyright"><?php echo $smof_data['copyright_text'];?></p>
						<?php endif; ?>
						<?php if($smof_data['enable_backtop']):?>
						<div id="backtop">
							<i class="fa fa-angle-up"></i>
						</div>
						<?php endif;?>
					</div>
				</div>
			</div>
		</footer>		
		<?php wp_footer(); ?>
	</body>
</html>