<?php
/**
* The template for displaying the footer
*
* Contains the closing of the #content div and all content after
*
* @package WordPress
* @subpackage Twenty_Sixteen
* @since Twenty Sixteen 1.0
*/
?>
<!-- footer -->
<div class="clearfix"></div>
<footer class="page-footer page-footer-ga" id="footerInfo2">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-4 col-sm-4 sitelinksBlock footerNoneText">
				<h3 class="titleFooterSmall"> What is FreebiesMall ? </h3>
				<p itemprop="description" class="paraFooter">
					FreebiesMall is a blog site for designers &amp; developers.
					Our aim is to provide top quality design &amp; development resources.
					We offer Free UI Kits, Fonts, App Design &amp; Web Design free themes,
					Free PSD &amp; Sketch Files, Illustrations, Mockups, Free WordPress &amp; Bootstrap Templates.
				</p>
			</div>
			<div class="col-md-2 col-sm-2 footerNavSitelinks">
				<h3 class="titleFooterSmall"> Sitelinks </h3>
				<?php
				wp_nav_menu( array(
				'theme_location' => 'Footer-2',
				'menu_class'     => 'primary-menu',
				) );
				?>
			</div>
			<div class="col-md-3 col-sm-3 getBlock">
				<h3 class="titleFooterSmall"> Connect With Us </h3>
				<ul itemscope itemtype="http://schema.org/Organization" class="socialMediaFooter">
					<li>
						<a class="facebook-ga fb-sm" title="Visit us on Facebook" href="https://www.facebook.com/realfreeebiesmall/" itemprop="sameAs">
							<i class="fa fa-facebook-official" aria-hidden="true"></i>
						</a>
					</li>
					<li>
						<a class="twitter-ga twitter-sm" title="Visit us on Twitter" href="https://twitter.com/freebiesmall3" itemprop="sameAs">
							<i class="fa fa-twitter" aria-hidden="true"></i>
						</a>
					</li>
					<li>
						<a class="pinterest-ga pinterest-sm" title="Visit us on Pinterest" href="https://in.pinterest.com/freebiesmall/" itemprop="sameAs">
							<i class="fa fa-pinterest" aria-hidden="true"></i>
						</a>
					</li>
					<li>
						<a class="googleplus-ga googlePlus-sm" title="Visit us on Google+" href="https://plus.google.com/u/0/111134682580669056874" itemprop="sameAs">
							<i class="fa fa-google-plus" aria-hidden="true"></i>
						</a>
					</li>
				</ul>
				<div class="rssBlock">
					<p> Subscribe to our <strong>RSS Feed</strong> </p>
					<a title="FreebiesMall's RSS feed" class="rssfeed" href="https://www.freebiesmall.com/feed/" itemprop="sameAs" target="_blank">
						<i class="fa fa-rss-square" aria-hidden="true"></i>
					</a>
				</div>
			</div>
			<div class="col-md-3 col-sm-3 sitelinksBlock">
				<div class="newsletterSubscription">
					<?php dynamic_sidebar( 'mailchimp' ); ?>
				</div>
			</div>
			<div class="clearfix"><!-- empty --></div>
		</div>
	</div>
</footer>
<footer class="main-footer text-center full-width">
	<p> Made with <span class="glyphicon glyphicon-heart" aria-hidden="true"></span> by <span itemprop="copyrightHolder" itemscope itemtype="http://schema.org/Organization"> Freebies Mall </span></p>
</footer>
<?php wp_footer(); ?>
<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" async></script>-->
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery-1.10.0.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>
<!-- Google Analytics -->
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
ga('create', 'UA-88264969-1', 'auto');
ga('send', 'pageview');
</script>
<script>
$(".mobilemenu ul").addClass("nav navbar-nav navbar-right navHideDesktop");
$(".mobilemenu ul ul").removeClass("nav navbar-nav navbar-right navHideDesktop");
</script>
<div id="fb-root"></div>
<script>(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.8";
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
<!-- Begin comScore Tag -->
<script>
  var _comscore = _comscore || [];
  _comscore.push({ c1: "2", c2: "23582108" });
  (function() {
    var s = document.createElement("script"), el = document.getElementsByTagName("script")[0]; s.async = true;
    s.src = (document.location.protocol == "https:" ? "https://sb" : "http://b") + ".scorecardresearch.com/beacon.js";
    el.parentNode.insertBefore(s, el);
  })();
</script>

<noscript>
  <img src="http://b.scorecardresearch.com/p?c1=2&c2=23582108&cv=2.0&cj=1" />
</noscript>
<!-- End comScore Tag -->
</body>
</html>