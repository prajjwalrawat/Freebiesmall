<?php
/**
* The template for displaying pages
* Template Name: Contact Forms
* This is the template that displays all pages by default.
* Please note that this is the WordPress construct of pages and that
* other "pages" on your WordPress site will use a different template.
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
		<div class="fixedSidebar hideOnMobile-catnavDesktopView">
			<div class="categoryNavsm fullWidth">
				<?php dynamic_sidebar( 'catnavsidebar' ); ?>
			</div>
		</div>
		<!-- Posts -->
		<div class="mainBlockCards-Outer">
			<div class="container-fluid">
				<div class="row">
					<div class="centerLayout centerLayout-alignleft">
						<div class="submitDesignBlock">
							<div class="col-md-12">
								<div class="breadcrumbs">
									<?php
									if ( function_exists('yoast_breadcrumb') ) {
									yoast_breadcrumb('
									<p id="breadcrumbs">','</p>
									');
									}
									?>
								</div>
								<h1 class="catTitleLg" itemprop="headline"> <?php the_title(); ?></h1>
								</div><!-- breadcrumbs -->
								<?php the_content(); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php get_footer(); ?>
		</div>
		<!-- Product cards with sidebar nav ends -->