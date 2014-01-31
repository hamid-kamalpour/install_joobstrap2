<?php 
/* Joobstrap Joomla Framework *index.php* v2.0.2  - 24.September 2013 - http://www.pixelsparadise.com */
/* Bootstrap v3.0.0  - http://twitter.github.com/bootstrap/index.html */
/* Free to use under the MIT license.
/* http://www.opensource.org/licenses/mit-license.php*/

defined('_JEXEC') or die;
JLoader::import( 'joomla.version' );
$version = new JVersion();
$app = JFactory::getApplication();
$doc = JFactory::getDocument();
$config = JFactory::getConfig();

// Check modules in left and right column besides the main content
$showHeader      = ($this->countModules('header_top') or $this->countModules('header_slider') or $this->countModules('header_center') or $this->countModules('header_bottom'));
$showTop      = ($this->countModules('top_top') or $this->countModules('top_center') or $this->countModules('top_bottom'));
$showLeft        = ($this->countModules('main_left'));
$showRight       = ($this->countModules('main_right'));
$showBottom      = ($this->countModules('bottom_top') or $this->countModules('bottom_center') or $this->countModules('bottom_bottom'));
$showFooter      = ($this->countModules('footer_top') or $this->countModules('footer_center') or $this->countModules('footer_bottom'));

// Detecting Active Variables
$sitename = $app->getCfg('sitename');
?>

<!DOCTYPE html>
<html xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" >
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script type="text/javascript" src="<?php echo $this->baseurl;?>/templates/<?php echo $this->template;?>/js/bootstrap.min.js"></script>
<jdoc:include type="head" />
<link rel="shortcut icon" href="<?php echo $this->baseurl;?>/templates/<?php echo $this->template;?>/favicon.ico" /> 
<?php if($this->params->get('stickyNav') == 1) : ?>
<!-- Sticky Nav Script -->
<script type="text/javascript" src="<?php echo $this->baseurl;?>/templates/<?php echo $this->template;?>/js/sticky.js"></script>
<script>
if (document.documentElement.clientWidth >= 980) {
    jQuery(window).load(function(){
      jQuery("#navbar_center").sticky({ topSpacing: 0, className:"sticked", wrapperClassName: "sticked_wrapper" });
    });}
</script>
<?php endif; ?>	

<!-- Le Grand CSS -->
<link href="<?php echo $this->baseurl;?>/templates/<?php echo $this->template;?>/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="<?php echo $this->baseurl;?>/templates/<?php echo $this->template;?>/css/bootstrap-extend.css" rel="stylesheet" media="screen">
<link href="<?php echo $this->baseurl;?>/templates/<?php echo $this->template;?>/css/flexslider.css" rel="stylesheet" media="screen">
<link href="<?php echo $this->baseurl;?>/templates/<?php echo $this->template;?>/css/style.css" rel="stylesheet" media="screen">
<?php if($this->params->get('fontAwesome') == 1) : ?>
<link href="<?php echo $this->baseurl;?>/templates/<?php echo $this->template;?>/css/font-awesome.min.css" rel="stylesheet" media="screen">
<?php endif; ?>
<?php if($this->params->get('animatedElements') == 1) : ?>
<link href="<?php echo $this->baseurl;?>/templates/<?php echo $this->template;?>/css/animate.min.css" rel="stylesheet" media="screen">
<?php endif; ?>
<?php if($this->params->get('subTheme') != -1) : ?>
<!-- Subthemes -->
<link rel="stylesheet" href="<?php echo $this->baseurl;?>/templates/<?php echo $this->template;?>/subthemes/<?php echo $this->params->get('subTheme'); ?>/style.css">
<?php endif; ?>	
    
<?php if($this->params->get('readDirection') == 0) : ?>
<!-- Loads RTL stylsheet if enabled-->	
<link rel="stylesheet" href="<?php echo $this->baseurl;?>/templates/<?php echo $this->template;?>/css/rtl.css" type="text/css" media="screen, projection" />
<?php endif; ?>	
    	
<!-- Loads template specific extras -->
<?php include ("includes/include.php"); ?> 

</head>

<body  id="to_the_top" class="<?php if($this->params->get('basicLayout') == 1) : ?>full_size<?php endif; ?> <?php if($this->params->get('basicLayout') == 2) : ?>boxed<?php endif; ?>"> 
	<div class="sourrounding_all <?php if($this->countModules('slider_modules')) : ?>header_active<?php endif; ?> <?php $menu = JSite::getMenu(); if ($menu->getActive() == $menu->getDefault()) { echo 'on_frontpage'; }?>
<?php $menu = JSite::getMenu(); if ($menu->getActive() != $menu->getDefault()) { echo 'not_on_frontpage'; }?> "> 
<!-- **************************************** Template Body Starts **************************************** -->
    		    		
    	<!-- **************************************** Navbar Area Starts **************************************** -->
    	<div class="joobstrab_area navbar_area">

    		<?php if($this->countModules('navbar_top')) : ?>
    		<!-- ### NAVBAR_TOP Module Position Section Start ### -->
    		<div class="joobstrap_section sourrounding_wrapper" id="navbar_top">
    			<div class="inner_wrapper">
    				<div class="container">
    					<div class="row">
    						<jdoc:include type="modules" name="navbar_top" style="standard" />
    					</div>
    				</div>
    			</div>
    		</div>
    		<!-- ### NAVBAR_TOP Module Position Section End ### -->
    		<?php endif; ?>

    		<!-- ### NAVBAR_CENTER Module Position Section Start ### -->
    		<div class="joobstrap_section sourrounding_wrapper" id="navbar_center">
    			<div class="inner_wrapper">
    				<nav class="navbar navbar-default" role="navigation">
    					<div class="container">
    						<div class="row">
    							<div class="col-md-12">
    								<?php if($this->params->get('logoType') == 1) : ?>
          								<!-- Logo as image -->
										<a class="navbar-brand logo_image" href="<?php echo $this->baseurl;?>"><img src="<?php echo $this->params->get('logoFile'); ?>" alt="<?php echo $app->getCfg('sitename'); ?>"  /></a>
										<?php endif; ?>
		  
										<?php if($this->params->get('logoType') == 2) : ?>
		  								<!-- Logo as text taken from templates config-->
										<a class="navbar-brand logo_text" href="<?php echo $this->baseurl;?>"><h1><?php echo $this->params->get('logoText'); ?></h1></a>
										<?php endif; ?>
		
										<?php if($this->params->get('logoType') == 3) : ?>	
										<!-- Logo as moduleposition "logo" -->											
										<a class="brand logo_module" href="<?php echo $this->baseurl;?>" ><jdoc:include type="modules" name="logo" style="raw" />	</a>									
										<?php endif; ?>
		
										<?php if($this->params->get('logoType') == 4) : ?>
										<!-- Logo as image and text -->	
										<a class="navbar-brand logo_image_and_text" href="<?php echo $this->baseurl;?>"><img src="<?php echo $this->params->get('logoFile'); ?>" alt="<?php echo $app->getCfg('sitename'); ?>"  /><h1><?php echo $this->params->get('logoText'); ?></h1></a>
										<?php endif; ?>
    							</div>
    							<div class="col-md-12">
  								<!-- Brand and toggle get grouped for better mobile display -->
 									<div class="navbar-header">
    									<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
      										<span class="sr-only">Toggle navigation</span>
      										<span class="icon-bar"></span>
      										<span class="icon-bar"></span>
      										<span class="icon-bar"></span>
    									</button>
  									</div>
  									
									<?php if($this->countModules('main_nav')) : ?>
									<!-- Collect the nav links, forms, and other content for toggling -->
  									<div class="main_nav collapse navbar-collapse navbar-ex1-collapse">
    									<jdoc:include type="modules" name="main_nav" style="none" />
  									</div><!-- /.navbar-collapse -->
  									<?php endif; ?>
  								</div>
  							</div>
    					</div>
    				</nav>
    			</div>
    		</div>
    		<!-- ### NAVBAR_CENTER Module Position Section End ### -->

    			<?php if($this->countModules('navbar_bottom')) : ?>
    			<!-- ### NAVBAR_BOTTOM Module Position Section Start ### -->
    			<div class="joobstrap_section sourrounding_wrapper" id="navbar_bottom">
    				<div class="inner_wrapper">
    					<div class="container">
    						<div class="row">
    							<jdoc:include type="modules" name="navbar_bottom" style="standard" />
    						</div>
    					</div>
    				</div>
    			</div>
    			<!-- ### NAVBAR_BOTTOM Module Position Section End ### -->
    			<?php endif; ?>

    		</div>
    		<!-- **************************************** Navbar Area Ends **************************************** -->
    		
    		<?php if ($showHeader) : ?>
    		<!-- **************************************** Header Area Starts **************************************** -->
    		<div class="joobstrab_area header_area">
    			
    			<?php if($this->countModules('header_top')) : ?>
    			<!-- ### HEADER_TOP Module Position Section Start ### -->
    			<div class="joobstrap_section sourrounding_wrapper" id="header_top">
    				<div class="inner_wrapper">
    					<div class="container">
    						<div class="row">
    							<jdoc:include type="modules" name="header_top" style="standard" />
    						</div>
    					</div>
    				</div>
    			</div>
    			<!-- ### HEADER_TOP Module Position Section End ### -->
    			<?php endif; ?>
    			
    			<?php if($this->countModules('header_slider')) : ?>
    			<!-- ### HEADER_SLIDER Module Position Section Start ### -->
    			<div class="joobstrap_section sourrounding_wrapper" id="header_slider">
    				<div class="inner_wrapper">
    					<div class="container container-full">
    						<div class="row">
    							<div class="col-md-12 slider_controls">
									<div class="flexslider">
	    								<ul class="slides">
	    									<jdoc:include type="modules" name="header_slider" style="slider" />
	    								</ul>
	  								</div>
								</div>
    						</div>
    					</div>
    				</div>
    			</div>
    			<!-- ### HEADER_SLIDER Module Position Section End ### -->
    			<?php endif; ?>
    			
    			<?php if($this->countModules('header_center')) : ?>
    			<!-- ### HEADER_CENTER Module Position Section Start ### -->
    			<div class="joobstrap_section sourrounding_wrapper" id="header_center">
    				<div class="inner_wrapper">
    					<div class="container">
    						<div class="row">
    							<jdoc:include type="modules" name="header_center" style="standard" />
    						</div>
    					</div>
    				</div>
    			</div>
    			<!-- ### HEADER_CENTER Module Position Section End ### -->
    			<?php endif; ?>
    			
    			<?php if($this->countModules('header_bottom')) : ?>
    			<!-- ### HEADER_BOTTOM Module Position Section Start ### -->
    			<div class="joobstrap_section sourrounding_wrapper" id=" header_bottom">
    				<div class="inner_wrapper">
    					<div class="container">
    						<div class="row">
    							<jdoc:include type="modules" name="header_bottom" style="standard" />
    						</div>
    					</div>
    				</div>
    			</div>
    			<!-- ### HEADER_bottom Module Position Section End ### -->
    			<?php endif; ?>

    		</div>
    		<!-- **************************************** HEADER Area Ends **************************************** -->
    		<?php endif; ?>
    		
    		<?php if ($showTop) : ?>
    		<!-- **************************************** TOP Area Starts **************************************** -->
    		<div class="joobstrab_area top_area">
    			
    			<?php if($this->countModules('top_top')) : ?>
    			<!-- ### TOP_TOP Module Position Section Start ### -->
    			<div class="joobstrap_section sourrounding_wrapper" id="top_top">
    				<div class="inner_wrapper">
    					<div class="container">
    						<div class="row">
    							<jdoc:include type="modules" name="top_top" style="standard" />
    						</div>
    					</div>
    				</div>
    			</div>
    			<!-- ### TOP_TOP Module Position Section End ### -->
    			<?php endif; ?>
    			
    			<?php if($this->countModules('top_center')) : ?>
    			<!-- ### TOP_CENTER Module Position Section Start ### -->
    			<div class="joobstrap_section sourrounding_wrapper" id="top_center">
    				<div class="inner_wrapper">
    					<div class="container">
    						<div class="row">
    							<jdoc:include type="modules" name="top_center" style="standard" />
    						</div>
    					</div>
    				</div>
    			</div>
    			<!-- ### TOP_CENTER Module Position Section End ### -->
    			<?php endif; ?>
    			
    			<?php if($this->countModules('top_bottom')) : ?>
    			<!-- ### TOP_BOTTOM Module Position Section Start ### -->
    			<div class="joobstrap_section sourrounding_wrapper" id="top_bottom">
    				<div class="inner_wrapper">
    					<div class="container">
    						<div class="row">
    							<jdoc:include type="modules" name="top_bottom" style="standard" />
    						</div>
    					</div>
    				</div>
    			</div>
    			<!-- ### TOP_BOTTOM Module Position Section End ### -->
    			<?php endif; ?>

    		</div>
    		<!-- **************************************** TOP Area Ends **************************************** -->
    		<?php endif; ?>
    		
    		<!-- **************************************** MAIN Area Starts **************************************** -->
    		<div class="joobstrab_area main_area">
    			
    			<?php if($this->countModules('main_top')) : ?>
    			<!-- ### MAIN_TOP Module Position Section Start ### -->
    			<div class="joobstrap_section sourrounding_wrapper" id="main_top">
    				<div class="inner_wrapper">
    					<div class="container">
    						<div class="row">
    							<jdoc:include type="modules" name="main_top" style="standard" />
    						</div>
    					</div>
    				</div>
    			</div>
    			<!-- ### MAIN_TOP Module Position Section End ### -->
    			<?php endif; ?>
    			
    			<!-- ### MAIN_CENTER Module Position Section Start ### -->
    			<div class="joobstrap_section sourrounding_wrapper" id="main_center">
    				<div class="inner_wrapper">
    					<div class="container">
    						<div class="row">
    						<?php if($this->countModules('main_left')) : ?>
    							<?php if ($showRight) : ?>
    							<!-- Left Column -->
    							<div class="col-md-3 main_left">
    							<?php else: ?>
    							<div class="col-md-4 main_left">
    							<?php endif; ?>
    								<div class="row">
    								<jdoc:include type="modules" name="main_left" style="standard" />
    								</div>
    							</div>
    							<!-- Left Column End-->
    							<?php endif; ?>
    							
    							
    							<!-- Central Column -->
    							<?php if ($showRight and $showLeft) : ?>
    							<div class="col-md-6 main_center">
    							<?php elseif ($showRight or $showLeft) : ?>
    							<div class="col-md-8 main_center">
    							<?php else: ?>
    							<div class="col-md-12 main_center">
    							<?php endif; ?>
    								<div class="row">
    									<?php if($this->countModules('main_center_top')) : ?>
    										<div class="col-md-12 main_center_top">
    											<div class="row">
    											<jdoc:include type="modules" name="main_center_top" style="standard" />
    											</div>
    										</div>
    									<?php endif; ?>
    									
    									
    									<div class="col-md-12 main_component_area">
										<!-- Main Component Area Start -->
										<jdoc:include type="message" />
										<jdoc:include type="component" />
										<!-- Main Component Area End -->
    									</div>
    									
    									
    									<?php if($this->countModules('main_center_bottom')) : ?>
    										<div class="col-md-12 main_center_bottom">
    											<div class="row">
    											<jdoc:include type="modules" name="main_center_bottom" style="standard" />
    											</div>
    										</div>
    									<?php endif; ?>
    								</div>			
    							</div>
    							<!-- Central Column End-->
    							
    							<?php if($this->countModules('main_right')) : ?>
    							<?php if ($showLeft) : ?>
    							<!-- Left Column -->
    							<div class="col-md-3 main_right">
    							<?php else: ?>
    							<div class="col-md-4 main_right">
    							<?php endif; ?>
    								<div class="row">
    								<jdoc:include type="modules" name="main_right" style="standard" />
    								</div>
    							</div>
    							<!-- Right Column End-->
    							<?php endif; ?>
    							
    						</div>
    					</div>
    				</div>
    			</div>
    			<!-- ### MAIN_CENTER Module Position Section End ### -->
    			
    			<?php if($this->countModules('main_bottom')) : ?>
    			<!-- ### MAIN_BOTTOM Module Position Section Start ### -->
    			<div class="joobstrap_section sourrounding_wrapper" id="main_bottom">
    				<div class="inner_wrapper">
    					<div class="container">
    						<div class="row">
    							<jdoc:include type="modules" name="main_bottom" style="standard" />
    						</div>
    					</div>
    				</div>
    			</div>
    			<!-- ### MAIN_BOTTOM Module Position Section End ### -->
    			<?php endif; ?>

    		</div>
    		<!-- **************************************** MAIN Area Ends **************************************** -->
    		
    		<?php if ($showBottom) : ?>
    		<!-- **************************************** BOTTOM Area Starts **************************************** -->
    		<div class="joobstrab_area bottom_area">
    		
    			<?php if($this->countModules('bottom_top')) : ?>
    			<!-- ### BOTTOM_TOP Module Position Section Start ### -->
    			<div class="joobstrap_section sourrounding_wrapper" id="bottom_top">
    				<div class="inner_wrapper">
    					<div class="container">
    						<div class="row">
    							<jdoc:include type="modules" name="bottom_top" style="standard" />
    						</div>
    					</div>
    				</div>
    			</div>
    			<!-- ### BOTTOM_TOP Module Position Section End ### -->
    			<?php endif; ?>
    			
    			<?php if($this->countModules('bottom_center')) : ?>
    			<!-- ### BOTTOM_CENTER Module Position Section Start ### -->
    			<div class="joobstrap_section sourrounding_wrapper" id="bottom_center">
    				<div class="inner_wrapper">
    					<div class="container">
    						<div class="row">
    							<jdoc:include type="modules" name="bottom_center" style="standard" />
    						</div>
    					</div>
    				</div>
    			</div>
    			<!-- ### BOTTOM_CENTER Module Position Section End ### -->
    			<?php endif; ?>
    			
    			<?php if($this->countModules('bottom_bottom')) : ?>
    			<!-- ### BOTTOM_BOTTOM Module Position Section Start ### -->
    			<div class="joobstrap_section sourrounding_wrapper" id="bottom_bottom">
    				<div class="inner_wrapper">
    					<div class="container">
    						<div class="row">
    							<jdoc:include type="modules" name="bottom_bottom" style="standard" />
    						</div>
    					</div>
    				</div>
    			</div>
    			<!-- ### BOTTOM_BOTTOM Module Position Section End ### -->
    			<?php endif; ?>

    		</div>
    		<!-- **************************************** BOTTOM Area Ends **************************************** -->
    		<?php endif; ?>
    		
    		<?php if ($showFooter) : ?>
    		<!-- **************************************** Footer Area Starts **************************************** -->
    		<div class="joobstrab_area footer_area">
    		
    			<?php if($this->countModules('footer_top')) : ?>
    			<!-- ### FOOTER_TOP Module Position Section Start ### -->
    			<div class="joobstrap_section sourrounding_wrapper" id="footer_top">
    				<div class="inner_wrapper">
    					<div class="container">
    						<div class="row">
    							<jdoc:include type="modules" name="footer_top" style="standard" />
    						</div>
    					</div>
    				</div>
    			</div>
    			<!-- ### FOOTER_TOP Module Position Section End ### -->
    			<?php endif; ?>
    			
    			<?php if($this->countModules('footer_center')) : ?>
    			<!-- ### FOOTER_CENTER Module Position Section Start ### -->
    			<div class="joobstrap_section sourrounding_wrapper" id="footer_center">
    				<div class="inner_wrapper">
    					<div class="container">
    						<div class="row">
    							<jdoc:include type="modules" name="footer_center" style="standard" />
    						</div>
    					</div>
    				</div>
    			</div>
    			<!-- ### FOOTER_CENTER Module Position Section End ### -->
    			<?php endif; ?>
    			
    			<?php if($this->countModules('footer_bottom')) : ?>
    			<!-- ### FOOTER_BOTTOM Module Position Section Start ### -->
    			<div class="joobstrap_section sourrounding_wrapper" id="footer_bottom">
    				<div class="inner_wrapper">
    					<div class="container">
    						<div class="row">
    							<jdoc:include type="modules" name="footer_bottom" style="standard" />
    						</div>
    					</div>
    				</div>
    			</div>
    			<!-- ### FOOTER_BOTTOM Module Position Section End ### -->
    			<?php endif; ?>

    		</div>
    		<!-- **************************************** FOOTER Area Ends **************************************** -->
    		<?php endif; ?>
    		
    		
<!-- Loads template specific footer section -->
<!-- ##################################################### CREDITS AREA STARTS HERE ##################################################### -->
<div class="joobstrap_section sourrounding_wrapper" id="credits">
	<div class="inner_wrapper">
		<div class="container">
			<div class="row">
				<div class="col-md-6 credits_left">
					<p>Created and designed by <a href="http://www.joobstrap.com" target="_blank">joobstrap.com</a><br />With help of <a href="http://twitter.github.com/bootstrap/">Bootstrap Framework</a> and Flexslider by <a href="http://flex.madebymufffin.com">Madebymufffin</a></p>
					<p class="copyright_by">&copy;  <?php echo date('Y');?> by <a href="<?php echo $this->baseurl;?>"><?php echo $app->getCfg('sitename'); ?></a></p>
				</div>
			
				<div class="col-md-6 credits_right">
				<p class="text-align-right"><a href="http://www.joomla.org" title="Click here to visit Joomla!" target="_blank">Joomla! ®</a> name is used under a limited license from <a href="http://opensourcematters.org" title="Click here to visit Open Source Matters" target="_blank">Open Source Matters</a><br>
				<a title="pixelsparadise.com" href="http://www.joobstrap.com">Joobstrap.com</a> is not affiliated with the <a title="Joomla! Home" href="http://www.joomla.org">Joomla!</a> Project.</p>
				<p class="back_to_the_top text-align-right"><a href="#to_the_top" id="back-top"><i class="icon-circle-arrow-up icon-white"></i> Back to top</a></p>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- ##################################################### CREDITS AREA ENDS HERE ##################################################### -->

</div>

<?php if($this->countModules('modal1')) : ?>
<!-- ##################################################### MODAL CONTENT STARTS HERE ##################################################### -->
<div id="modal1" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
</div>
<jdoc:include type="modules" name="modal1" style="standard" />
<div class="modal-footer">
<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
</div>
</div>
<!-- ##################################################### MODAL CONTENT Ends HERE ##################################################### -->
<?php endif; ?>

<?php if($this->countModules('modal2')) : ?>
<!-- ##################################################### MODAL CONTENT STARTS HERE ##################################################### -->
<div id="modal2" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
</div>
<jdoc:include type="modules" name="modal2" style="standard" />
<div class="modal-footer">
<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
</div>
</div>
<!-- ##################################################### MODAL CONTENT Ends HERE ##################################################### -->
<?php endif; ?>
	
<!-- **************************************** Loading the JS stuff **************************************** -->

<?php if($this->countModules('header_slider')) : ?>
<!--Loads Slider scripts if a module is published on pos header_slider -->
<script type="text/javascript" src="<?php echo $this->baseurl;?>/templates/<?php echo $this->template;?>/js/flexslider-min.js"></script>
<script type="text/javascript">jQuery.noConflict();</script>

<script type="text/javascript">
	jQuery.noConflict();
		jQuery(window).load(function() {
    		jQuery('.flexslider').flexslider({
          	<?php if($this->params->get('sliderEffect') == 1) : ?>animation: "fade",<?php endif; ?>
          	<?php if($this->params->get('sliderEffect') == 2) : ?>animation: "slide",<?php endif; ?>
          	slideDirection: "horizontal",
          	<?php if($this->params->get('sliderAuto') == 1) : ?>slideshow: true, <?php endif; ?>
          	<?php if($this->params->get('sliderAuto') == 0) : ?>slideshow: false, <?php endif; ?>
          	slideshowSpeed: <?php echo $this->params->get('sliderTime'); ?>,
          	animationSpeed: <?php echo $this->params->get('sliderChange'); ?>,
          	<?php if($this->params->get('sliderArrows') == 0) : ?>directionNav: false,<?php endif; ?>
          	<?php if($this->params->get('sliderArrows') == 1) : ?>directionNav: true,<?php endif; ?>
          	<?php if($this->params->get('sliderPagination') == 0) : ?>controlNav: false,<?php endif; ?>
          	<?php if($this->params->get('sliderPagination') == 1) : ?>controlNav: true,<?php endif; ?>
          	<?php if($this->params->get('loopSlider') == 0) : ?>animationLoop: false, <?php endif; ?>
          	<?php if($this->params->get('loopSlider') == 1) : ?>animationLoop: true, <?php endif; ?>
          	pauseOnAction: true, 
          	smoothHeight: true,
          	<?php if($this->params->get('hoverPause') == 0) : ?>pauseOnHover: false,<?php endif; ?> 
          	<?php if($this->params->get('hoverPause') == 1) : ?>pauseOnHover: true,<?php endif; ?> 
          	prevText: "<",          
nextText: ">",           
         
   			 });
  		});
</script>
<?php endif; ?>

<?php if($this->params->get('backgroundImagetype') == 2) : ?>
<!-- Background Image Settings and Script-->
<script type="text/javascript" src="<?php echo $this->baseurl;?>/templates/<?php echo $this->template;?>/js/backstretch.min.js"></script>
<script type="text/javascript">
	jQuery.backstretch([
         "<?php echo $this->baseurl;?>/<?php echo $this->params->get('backgroundImage'); ?>",
         
         <?php if($this->params->get('backgroundImage2')) : ?>
         "<?php echo $this->baseurl;?>/<?php echo $this->params->get('backgroundImage2'); ?>",
         <?php endif; ?>
         
         <?php if($this->params->get('backgroundImage3') ) : ?>
         "<?php echo $this->baseurl;?>/<?php echo $this->params->get('backgroundImage3'); ?>",
         <?php endif; ?>
         
         <?php if($this->params->get('backgroundImage4') ) : ?>
         "<?php echo $this->baseurl;?>/<?php echo $this->params->get('backgroundImage4'); ?>",
         <?php endif; ?>
         
         <?php if($this->params->get('backgroundImage5') ) : ?>
         "<?php echo $this->baseurl;?>/<?php echo $this->params->get('backgroundImage5'); ?>",
         <?php endif; ?>
         
         <?php if($this->params->get('backgroundImage6') ) : ?>
         "<?php echo $this->baseurl;?>/<?php echo $this->params->get('backgroundImage6'); ?>",
         <?php endif; ?>
         
         <?php if($this->params->get('backgroundImage7') ) : ?>
         "<?php echo $this->baseurl;?>/<?php echo $this->params->get('backgroundImage7'); ?>",
         <?php endif; ?>
         
         <?php if($this->params->get('backgroundImage8') ) : ?>
         "<?php echo $this->baseurl;?>/<?php echo $this->params->get('backgroundImage8'); ?>",
         <?php endif; ?>
         
         <?php if($this->params->get('backgroundImage9') ) : ?>
         "<?php echo $this->baseurl;?>/<?php echo $this->params->get('backgroundImage9'); ?>",
         <?php endif; ?>
         
         <?php if($this->params->get('backgroundImage10') ) : ?>
         "<?php echo $this->baseurl;?>/<?php echo $this->params->get('backgroundImage10'); ?>",
         <?php endif; ?>
               
         <?php if($this->params->get('backgroundImage11') ) : ?>
         "<?php echo $this->baseurl;?>/<?php echo $this->params->get('backgroundImage11'); ?>",
         <?php endif; ?>
         
         <?php if($this->params->get('backgroundImage12') ) : ?>
         "<?php echo $this->baseurl;?>/<?php echo $this->params->get('backgroundImage12'); ?>"
         <?php endif; ?>
        ], {
            duration: <?php echo $this->params->get('backgroundImageduration'); ?>,fade: <?php echo $this->params->get('backgroundImagefade'); ?>
        });
</script>
<?php endif; ?>	


<?php if($this->params->get('loadInview') == 1) : ?>
<!-- Inview script -->
<script type="text/javascript" src="<?php echo $this->baseurl;?>/templates/<?php echo $this->template;?>/js/custom.js"></script>
<script type="text/javascript" src="<?php echo $this->baseurl;?>/templates/<?php echo $this->template;?>/js/inview.js"></script>
<?php endif; ?>

<!-- Smooth scrolling script -->
<script type="text/javascript" src="<?php echo $this->baseurl;?>/templates/<?php echo $this->template;?>/js/smoothscroll.min.js"></script>		

<!-- **************************************** Template Body ends **************************************** -->
	</body>
</html>