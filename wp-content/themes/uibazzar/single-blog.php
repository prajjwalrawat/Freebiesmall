<?php
/**
* The template for displaying all single posts and attachments
*
* @package WordPress
* @subpackage Twenty_Sixteen
* @since Twenty Sixteen 1.0
*/
get_header('header2'); ?>
<!-- Featured UI kIT -->
<section class="commonBlockGapLgFixed pdpOuter pdp-download greySingle">
	<div class="center-signle-pagePdp">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="breadcrumbs fullWidth pdpBreadcrumbs" itemprop="breadcrumb">
						<?php
						if ( function_exists('yoast_breadcrumb') ) {
						yoast_breadcrumb('
						<span id="breadcrumbs">','</span>
						');
						}
						?>
					</div>
				</div>
				<?php while (have_posts()) : the_post(); ?>
				<div class="col-md-9 col-sm-8">
					<div class="rightInfo twoRadius fullWidth">
						<div class="col-md-12">
							<div class="topTitle fullwidth twoRadius">
								<h1>
								<span itemprop="headline" itemprop="headline"> <?php the_title(); ?> </span>
								<span class="in"> in </span>
								<span class="cat"><?php the_category(', '); ?></span>
								</h1>
							</div>
						</div>
						<div class="col-xs-12 pdpLgImg">
							<div class="left fullwidth twoRadius">
								<?php the_post_thumbnail(''); ?>
							</div>
							<!-- File Format Available -->
							<ul class="fileformat">
								<?php if( get_field('psd') ): ?>
								<li>
									<span> <?php the_field('psd'); ?> </span>
								</li>
								<?php endif; ?>
								<?php if( get_field('sketch') ): ?>
								<li>
									<span> <?php the_field('sketch'); ?> </span>
								</li>
								<?php endif; ?>
								<?php if( get_field('ai') ): ?>
								<li>
									<span> <?php the_field('ai'); ?> </span>
								</li>
								<?php endif; ?>
								<?php if( get_field('fonts') ): ?>
								<li>
									<span> <?php the_field('fonts'); ?></span>
								</li>
								<?php endif; ?>
								<?php if( get_field('wordpresstheme') ): ?>
								<li>
									<span> <?php the_field('wordpresstheme'); ?> </span>
								</li>
								<?php endif; ?>
							</ul>
						</div>
					</div>
					<?php endwhile;   wp_reset_postdata(); ?>
					<!-- Related Posts -->

						
					</div>
					<aside class="col-md-3 col-sm-4" itemscope itemtype="http://schema.org/WPSideBar">
						<div class="sidebarSingle">
							<div class="fullwidth twoRadius">
								<?php dynamic_sidebar( 'pdp-category-nav' ); ?>
							</div>
						</div>
					</aside>
				</div>
			</div>
		</div>
	</section>
	<div class="singlePageFooterGap fullwidth"><!-- empty --></div>
	<?php get_footer(); ?>