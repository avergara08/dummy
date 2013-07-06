<?php
  $theme_path = '/'.path_to_theme();
?>

<!-- Wrapper / Start -->
<div id="wrapper">

<!-- Header
================================================== -->
<div id="top-line"></div>

<!-- 960 Container -->
<div class="container">

	<!-- Header -->
	<header id="header">

		<!-- Logo -->
		<div class="ten columns">
			<div id="logo">
				<h1><a href="<?php print $front_page; ?>"><img src="<?php print $theme_path; ?>/images/logo.png" alt="Nevia Premium Template" /></a></h1>
        <?php if ($site_slogan): ?>
          <div id="tagline"><?php print $site_slogan; ?></div>
        <?php endif; ?>
				<div class="clearfix"></div>
			</div>
		</div>

		<!-- Social / Contact -->
		<div class="six columns">

			<!-- Social Icons -->
			<ul class="social-icons">
				<li class="twitter"><a href="#">Twitter</a></li>
				<li class="facebook"><a href="#">Facebook</a></li>
				<li class="dribbble"><a href="#">Dribbble</a></li>
				<li class="linkedin"><a href="#">LinkedIn</a></li>
				<li class="rss"><a href="#">RSS</a></li>
			</ul>

			<div class="clearfix"></div>

			<!-- Contact Details -->
			<!--<div class="contact-details">Contact Phone: +48 880 440 110</div>-->

			<div class="clearfix"></div>

			<!-- Search -->
			<nav class="top-search">
				<form action="404-page.html" method="get">
					<button class="search-btn"></button>
					<input class="search-field" type="text" onblur="if(this.value=='')this.value='Search';" onfocus="if(this.value=='Search')this.value='';" value="Search" />
				</form>
			</nav>

		</div>
	</header>
	<!-- Header / End -->

	<div class="clearfix"></div>

</div>
<!-- 960 Container / End -->


<!-- Navigation
================================================== -->
<nav id="navigation" class="style-1">

<div class="left-corner"></div>
<div class="right-corner"></div>
<?php
  $main_menu_options = array(
    'links' => $main_menu,
    'attributes' => array(
      'id' => 'responsive',
      'class' => array('menu'),
    ),
  );
  print theme('links__system_main_menu', $main_menu_options);
?>

</nav>
<div class="clearfix"></div>


<!-- Content
================================================== -->
<div id="content">

<!-- 960 Container -->
<div class="container floated">

	<div class="sixteen floated page-title">
    <?php if ($title): ?>
      <h2><?php print $title; ?></h2>
    <?php endif; ?>

		
    <?php if ($breadcrumb): ?>
      <div id="breadcrumb"><?php print $breadcrumb; ?></div>
    <?php endif; ?>

	</div>

</div>
<!-- 960 Container / End -->


<!-- 960 Container -->
<div class="container content-wrapper floated">  
	<div class="eleven floated left">
    <?php if ($tabs && !empty($tabs['#primary'])): ?>
      <div class="notification success tabs closeable" id="notification_1">
        <!--<p>Nevia includes the popular Font Awesome &amp; Glyphicons sets with over 360 Icons!</p>-->
        <!--<i class="icon-tasks"></i> --><?php print render($tabs); ?>
      <a href="#" class="close"><i class="icon-remove"></i></a></div>
    <?php endif; ?>
    
    <?php if ($messages): ?>
      <!--<div class="notification notice closeable" style="margin: 40px 0 0px 0;">-->
        <?php print $messages; ?>
      <!--</div>-->
    <?php endif; ?>
    
    <div class="clearfix"></div>
    
    <section class="page-content">
      <!--<h3 class="margin-reset">haha</h3>-->
      <!--<p class="margin">test</p>-->
      
     
      <?php print render($page['content']); ?>
    </section>
    
    <div class="clearfix"></div>
	</div>
  
  <?php if ($page['sidebar']): ?>
    <div class="four floated sidebar right">
      <aside class="sidebar">
        <?php print render($page['sidebar']); ?>
      </aside>
    </div>
  <?php endif; ?>
  
</div>
<!-- 960 Container / End -->

</div>
<!-- Content / End -->

</div>
<!-- Wrapper / End -->


<!-- Footer
================================================== -->

<!-- Footer / Start -->
<footer id="footer">
	<!-- 960 Container -->
	<div class="container">

		<!-- About -->
		<div class="four columns">
			<img id="logo-footer" src="<?php print $theme_path; ?>/images/logo-footer.png" alt="" />
			<p>"You can worship a rock for all I care. Just don't throw it at me."</p>
			<p>Then I was like.. pew pew pew!</p>
		</div>

		<!-- Contact Details -->
		<div class="four columns">
			<h4>Contact Details</h4>
			<ul class="contact-details-alt">
				<li><i class="halflings white map-marker"></i> <p><strong>Address:</strong> 123. Asawa ni Marie. Araw gabi. Walang panty.</p></li>
				<li><i class="halflings white user"></i> <p><strong>Phone:</strong> +48 880 440 110</p></li>
				<li><i class="halflings white envelope"></i> <p><strong>Email:</strong> <a href="#">mail@example.com</a></p></li>
			</ul>
		</div>

		<!-- Photo Stream -->
		<div class="four columns">
			<h4>Photo Stream</h4>
			<div class="flickr-widget">
				<script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=6&amp;display=latest&amp;size=s&amp;layout=x&amp;source=user&amp;user=72179079@N00"></script>
				<div class="clearfix"></div>
			</div>
		</div>

		<!-- Twitter -->
		<div class="four columns">
			<h4>Twitter</h4>
			<ul id="twitter"></ul>
				<script type="text/javascript">
					jQuery(document).ready(function($){
						$.getJSON('/twitter.php?url='+encodeURIComponent('statuses/user_timeline.json?screen_name=dota2&count=2'), function(tweets){
						$("#twitter").html(tz_format_twitter(tweets));
					}); });
				</script>
			<div class="clearfix"></div>
		</div>

	</div>
	<!-- 960 Container / End -->

</footer>
<!-- Footer / End -->


<!-- Footer Bottom / Start  -->
<footer id="footer-bottom">

	<!-- 960 Container -->
	<div class="container">

		<!-- Copyrights -->
		<div class="eight columns">
			<div class="copyright">
				© Copyright 2013 by <a href="#">Nevia</a>. All Rights Reserved.
			</div>
		</div>

		<!-- Menu -->
		<div class="eight columns">
			<nav id="sub-menu">
				<ul>
					<li><a href="#">FAQ's</a></li>
					<li><a href="#">Sitemap</a></li>
					<li><a href="#">Contact</a></li>
				</ul>
			</nav>
		</div>

	</div>
	<!-- 960 Container / End -->

</footer>
<!-- Footer Bottom / End -->