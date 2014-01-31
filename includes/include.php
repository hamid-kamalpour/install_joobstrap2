
	<?php if($this->params->get('wrapperAlignment') == 2) : ?>
	<!-- Left -->
    	<style type="text/css">
			.inner_wrapper{float:left;}
		</style>
	<?php endif; ?>
	
	<?php if($this->params->get('wrapperAlignment') == 3) : ?>
	<!-- Right -->
    	<style type="text/css">
			.inner_wrapper{float:right;}
		</style>
	<?php endif; ?>

	
    <?php if($this->params->get('responsiveBehavior') == 1) : ?>
			<style type="text/css">
					.inner_wrapper {margin:0px auto;  width:<?php echo $this->params->get('maxWidth'); ?>px;max-width:<?php echo $this->params->get('maxWidth'); ?>px;min-width:<?php echo $this->params->get('maxWidth'); ?>px;}
			</style>
	<?php endif; ?>
	
	<?php if($this->params->get('responsiveBehavior') == 2) : ?>
			<style type="text/css">
					.inner_wrapper {margin:0px auto; width:100%;max-width:<?php echo $this->params->get('maxWidth'); ?>px;min-width:<?php echo $this->params->get('minWidth'); ?>px;}
			</style>
	<?php endif; ?>
	
	<?php if($this->params->get('showComponent') == 0) : ?>
			<style type="text/css">
					.main_area {display:none;}
			</style>
	<?php endif; ?>
	
		<?php if($this->params->get('showComponent') == 2) : ?>
			<style type="text/css">
					.on_frontpage .main_area {display:none;}
			</style>
	<?php endif; ?>
	
	<!-- Adds contrast color -->
	<style type="text/css">
		a, .horizon-menu a:hover{color:#<?php echo $this->params->get('contrastColor'); ?>;}
		.btn-info, .page-header:after, ul.nav > li:hover, .standout,  .logo_area_wrapper ul.nav > li.active a:link,  .logo_area_wrapper  ul.nav > li.active, .dropdown-menu .active > a,.dropdown-menu .active > a:hover, .dropdown-menu  > li > a:hover, 
		.logo_area_wrapper .navbar .nav > li > .dropdown-menu li a:hover, 
		.pricing_table.featured_plan:before, .horizon-menu, span.separator:hover, .sliding_menu_toggle a:hover, 
.dropdown-menu, .footer_area_wrapper<?php if($this->params->get('basicLayout') == 2) : ?> .container-fluid<?php endif; ?>, .nav .flyout-menu, .full_size.dark .footer_area_wrapper {background:none;background-color:#<?php echo $this->params->get('contrastColor'); ?>;}
		.module-title span {border-bottom:1px solid #<?php echo $this->params->get('contrastColor'); ?>;}
	</style>
	
	<?php if($this->params->get('backgroundImagetype') == 1) : ?>	
	<!-- Loads background texture if enabled -->
		<style type="text/css">
			body, .sidebar_area_wrapper  {background-image: url(<?php echo $this->baseurl;?>/<?php echo $this->params->get('backgroundImage'); ?>);}
		</style>
	<?php endif; ?>	
	

	


