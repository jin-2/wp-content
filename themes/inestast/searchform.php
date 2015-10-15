<section class="widget">
	<div class="search-widget">
		<form action="<?php echo home_url(); ?>/" id="searchform" method="get">
			<input type="text" name="s" value="Search..." onfocus="if(this.value=='' || this.value == 'Search...') this.value=''" onblur="if(this.value == '') {this.value=this.defaultValue}" onkeyup="keyUp();" />
			<input type="submit" value="" />
			<i class="fa fa-search search-button"></i>
		</form>
	</div>
</section>