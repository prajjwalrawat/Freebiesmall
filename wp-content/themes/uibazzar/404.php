<?php
/**
* The template for displaying 404 pages (not found)
*
* @package WordPress
* @subpackage Twenty_Sixteen
* @since Twenty Sixteen 1.0
*/
get_header(); ?>
<div class="mainWrapper">
	<!-- sidebar -->
	<div class="contentBlocker">
		<!-- Category Navigation Block -->
		<aside id="sidebar" itemscope itemtype="http://schema.org/WPSideBar">
			<div class="fixedSidebar hideOnMobile-catnavDesktopView">
				<div class="categoryNavsm fullWidth">
					<?php dynamic_sidebar( 'catnavsidebar' ); ?>
				</div>
			</div>
			<div class="fixedSidebar hideOnDesktop-catnavMobileView">
				<div class="categoryNavsm fullWidth">
					<?php dynamic_sidebar( 'catnavsidebar-mobile' ); ?>
				</div>
			</div>
		</aside>
		<!-- Posts -->
		<div class="mainBlockCards-Outer">
			<div class="container-fluid">
				<div class="whiteBgLgNew">
					
					<div class="col-md-12">
						<h1 class="errorPage">
						Sorry! Our Bad, Your Freebie is Not Available
						</h1>
						<div class="col-md-12 text-center adjustAdvertBtn">
							<a class="btnlg twoRadius btnHoverOpac error-lg-btn" href="https://www.freebiesmall.com">
								Go Back To Home
							</a>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		<?php get_footer(); ?>
	</div>
	<!-- Product cards with sidebar nav ends -->