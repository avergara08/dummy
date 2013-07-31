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
				<div id="tagline">And I was like.. pew pew pew!</div>
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

		<h2>Coming soon..ish</h2>

	</div>

</div>
<!-- 960 Container / End -->


<!-- Page Content -->
<div class="page-content">

	<!-- 960 Container -->
	<div class="container">
		<?php if ($messages): ?>
			<!--<div class="notification notice closeable" style="margin: 40px 0 0px 0;">-->
				<?php print $messages; ?>
			<!--</div>-->
		<?php endif; ?>
		
		<!-- Sixteen Columns -->
		<div class="sixteen columns">

			<section id="not-found">
				<h2>Err.. <i class="icon-beaker"></i></h2>
				<p>We are still under construction. Check back soon :)</p>
			</section>

		</div>

	</div>
	<!-- 960 Container / End -->

</div>
<!-- Page Content / End -->


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
		<div class="five columns">
			<img id="logo-footer" src="<?php print $theme_path; ?>/images/logo-footer.png" alt="" />
			<!--<p>"You can worship a rock for all I care. Just don't throw it at me."</p>-->
			<!--<p>Then I was like.. pew pew pew!</p>-->
      
      <!--<h4>Contact Details</h4>-->
			<ul class="contact-details-alt">
        <li><i class="halflings white bullhorn"></i> <p>A phrase said along with accompanying gesture - both hands miming rapid gunfire. Laser beams.. of course!</p></li>
        <li><i class="halflings white user"></i> <p><strong>Need a web developer?</strong> &nbsp;<a href="/contact">Contact us.</a></p></li>
				<li><i class="halflings white map-marker"></i> <p><strong>Mataas na lupa,</strong> Lipa City, Batangas</p></li>
				<!--<li><i class="halflings white user"></i> <p><strong>Phone:</strong> +63 917 1234567</p></li>-->
				<li><i class="halflings white wrench"></i> <p><strong>Bugs?</strong> <a href="/contact">Kindly inform us via the contact page.</a></p></li>
				<!--<li><i class="halflings white wrench"></i> <p>This is a portfolio site - in the future. Pages are still under construction.</p></li>-->
				
			</ul>
		</div>

		<!-- Photo Stream -->
		<div class="seven columns">
			<h4>The International 2013</h4>
			<div class="flickr-widget">
				<script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=10&amp;display=latest&amp;size=s&amp;layout=x&amp;source=user&amp;user=84574136@N06"></script>
				<div class="clearfix"></div>
			</div>
		</div>

		<!-- Twitter -->
		<div class="four columns">
			<h4>Dota 2</h4>
			<ul id="twitter"></ul>
				<script type="text/javascript">
					jQuery(document).ready(function($){
						$.getJSON('/custom/twitter?url='+encodeURIComponent('statuses/user_timeline.json?screen_name=dota2&count=2'), function(tweets){
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
				&copy; Copyright 2013 by <a href="#">pewpewpinas.com</a>. All Rights Reserved.
			</div>
		</div>

		<!-- Menu -->
		<div class="eight columns">
			<nav id="sub-menu">
				<ul>
					<li><a href="#">FAQ's</a></li>
					<li><a href="#">Sitemap</a></li>
					<li><a href="contact">Contact</a></li>
				</ul>
			</nav>
		</div>

	</div>
	<!-- 960 Container / End -->

</footer>
<!-- Footer Bottom / End -->