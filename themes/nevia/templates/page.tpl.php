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

		<h2>Our Blog</h2>

		<nav id="breadcrumbs">
			<ul>
				<li>You are here:</li>
				<li><a href="#">Home</a></li>
				<li>Blog</li>
			</ul>
		</nav>

	</div>

</div>
<!-- 960 Container / End -->


<!-- 960 Container -->
<div class="container floated">

	<!-- Page Content -->
  <!-- Sidebar -->
	<div class="four floated sidebar left">
		<aside class="sidebar">

			<!-- Search -->
			<nav class="widget-search">
				<form action="404-page.html" method="get">
					<button class="search-btn-widget"></button>
					<input class="search-field" type="text" onblur="if(this.value=='')this.value='Search';" onfocus="if(this.value=='Search')this.value='';" value="Search" />
				</form>
			</nav>
			<div class="clearfix"></div>

			<!-- Categories -->
			<nav class="widget">
				<h4>Categories</h4>
				<ul class="categories">
					<li><a href="#">Business</a></li>
					<li><a href="#">Entertainment</a></li>
					<li><a href="#">News & Politics</a></li>
					<li><a href="#">Social Media</a></li>
					<li><a href="#">Technology</a></li>
				</ul>
			</nav>

			<!-- Tags -->
			<div class="widget">
				<h4>Tags</h4>
				<nav class="tags">
					<a href="#">Mountains</a>
					<a href="#">Winter Sports</a>
					<a href="#">Boating</a>
					<a href="#">Recreation</a>
					<a href="#">Skiing</a>
					<a href="#">Tourism</a>
					<a href="#">Nature</a>
					<a href="#">Alps</a>
				</nav>
			</div>

			<!-- Archives -->
			<nav class="widget">
				<h4>Archives</h4>
				<ul class="categories">
					<li><a href="#">October 2012</a></li>
					<li><a href="#">November 2012</a></li>
					<li><a href="#">December 2012</a></li>
				</ul>
			</nav>

			<!-- Tweets-->
			<div class="widget">
				<h4>Everybody loves Dota 2</h4>
				<ul id="twitter-blog"></ul>
					<script type="text/javascript">
            jQuery(document).ready(function($){
              $.getJSON('/twitter.php?url='+encodeURIComponent('statuses/user_timeline.json?screen_name=dota2&count=5'), function(tweets){
              $("#twitter-blog").html(tz_format_twitter(tweets));
            }); });
          </script>
				<div class="clearfix"></div>
			</div>


		</aside>
	</div>
  
	<div class="eleven floated right">

		<!-- Post -->
		<article class="post">

			<figure class="post-img">
				<a href="blog-post.html"><img src="<?php print $theme_path; ?>/images/blog-01.jpg" alt="" /></a>
			</figure>

			<section class="date">
				<span class="day">28</span>
				<span class="month">Dec</span>
			</section>

			<section class="post-content">

				<header class="meta">
					<h2><a href="blog-post.html">The Boating Life Begins With a Good Storm</a></h2>
					<span><i class="halflings user"></i>By <a href="#">admin</a></span>
					<span><i class="halflings tag"></i><a href="#">Boating</a>, <a href="#">Recreation</a></span>
					<span><i class="halflings comments"></i>With <a href="#">12 Comments</a></span>
				</header>

				<p>Maecenas dolor est, interdum a euismod eu, accumsan posuere nisl. Nam sed iaculis massa. Sed nisl lectus, tempor sed euismod quis, sollicitudin nec est. Suspendisse dignissim bibendum tempor. Nam erat felis, commodo sed semper commodo vel mauris suspendisse dignissim.</p>

				<a href="blog-post.html" class="button color">Read More</a>

			</section>

		</article>


		<!-- Divider -->
		<div class="line"></div>


		<!-- Post -->
		<article class="post">

			<section class="flexslider">
				<ul class="slides post-img">
					<li><a href="<?php print $theme_path; ?>/images/blog-02a-large.jpg" rel="fancybox-gallery" title="Winter Mountains"><img src="<?php print $theme_path; ?>/images/blog-02a.jpg" alt="" /></a></li>
					<li><a href="<?php print $theme_path; ?>/images/blog-02b-large.jpg" rel="fancybox-gallery" title="Tropical Mountains"><img src="<?php print $theme_path; ?>/images/blog-02b.jpg" alt="" /></a></li>
					<li><a href="<?php print $theme_path; ?>/images/blog-02c-large.jpg" rel="fancybox-gallery" title="Rolling Prarie Hills"><img src="<?php print $theme_path; ?>/images/blog-02c.jpg" alt="" /></a></li>
				</ul>
			</section>

			<section class="date">
				<span class="day">14</span>
				<span class="month">Dec</span>
			</section>

			<section class="post-content">

				<header class="meta">
					<h2><a href="blog-post.html">Skiing to a Remote Retreat in the Canadian Rockies </a></h2>
					<span><i class="halflings user"></i>By <a href="#">admin</a></span>
					<span><i class="halflings tag"></i><a href="#">Mountains</a>, <a href="#">Skiing</a></span>
					<span><i class="halflings comments"></i>With <a href="#">12 Comments</a></span>
				</header>

				<p>Maecenas dolor est, interdum a euismod eu, accumsan posuere nisl. Nam sed iaculis massa. Sed nisl lectus, tempor sed euismod quis, sollicitudin nec est. Suspendisse dignissim bibendum tempor. Nam erat felis, commodo sed semper commodo vel mauris suspendisse dignissim.</p>

				<a href="blog-post.html" class="button color">Read More</a>

			</section>

		</article>


		<!-- Divider -->
		<div class="line"></div>


		<!-- Post -->
		<article class="post">

			<figure class="post-img">
				<a href="blog-post.html"><img src="<?php print $theme_path; ?>/images/blog-03.jpg" alt="" /></a>
			</figure>

			<section class="date">
				<span class="day">10</span>
				<span class="month">Dec</span>
			</section>

			<section class="post-content">

				<header class="meta">
					<h2><a href="blog-post.html">Visiting Tuscany Without the Crowds</a></h2>
					<span><i class="halflings user"></i>By <a href="#">admin</a></span>
					<span><i class="halflings tag"></i><a href="#">Nature</a>, <a href="#">Tourism</a></span>
					<span><i class="halflings comments"></i>With <a href="#">12 Comments</a></span>
				</header>

				<p>Maecenas dolor est, interdum a euismod eu, accumsan posuere nisl. Nam sed iaculis massa. Sed nisl lectus, tempor sed euismod quis, sollicitudin nec est. Suspendisse dignissim bibendum tempor. Nam erat felis, commodo sed semper commodo vel mauris suspendisse dignissim.</p>

				<a href="blog-post.html" class="button color">Read More</a>

			</section>

		</article>

		<!-- Divider -->
		<div class="line"></div>

		<!-- Pagination -->
		<nav class="pagination">
			<ul>
				<li><a href="#" class="current">1</a></li>
				<li><a href="#">2</a></li>
				<li><a href="#">Next</a></li>
			</ul>
			<div class="clearfix"></div>
		</nav>

	</div>
	<!-- Content / End -->


	
	<!-- Page Content / End -->

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