<?php
/**
* The template for displaying all single posts and attachments
*
* @package WordPress
* @subpackage Twenty_Sixteen
* @since Twenty Sixteen 1.0
*/
get_header(); ?>
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
						<div class="col-md-7 col-sm-12 pdpLgImg">
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
						<div class="col-md-5 col-sm-12">
							<div class="fullwidth">
								<a id="total-downloads-ga" class="btn btn-lg btn-danger btn-block twoRadius animateAll" href="<?php the_field(download_link); ?>" target="_blank" >
									<span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span> Download Freebie
								</a>
								<div class="autorBlock fullWidth">
									<small class="introTextAuthor freebies-info-seo" itemprop="description">
									<?php the_content(''); ?>
									</small>
									<div class="socialShare fullWidth">
										<div class="shareThis-block">
											<ul>
												<li class="share-facebook">
													<a rel="nofollow" class="share-facebook shareThis-btn" href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&amp;t=<?php the_title(); ?>" title="Share on Facebook" target="_blank">
														<i class="fa fa-facebook-square" aria-hidden="true"></i>
														<span>Facebook</span>
													</a>
												</li>
												<li class="share-twitter">
													<a rel="nofollow" class="share-twitter shareThis-btn" href="http://www.twitter.com/share?url=<?php echo
														get_permalink($post->ID);?>" target="_blank" title="Share on Twitter">
														<i class="fa fa-twitter" aria-hidden="true"></i>
														<span>Twitter</span>
													</a>
												</li>
												<li class="share-googlePlus">
													<a rel="nofollow" class="share-google-plus-1 shareThis-btn" href="https://plus.google.com/share?url=<?php echo
														get_permalink($post->ID);?>" target="_blank" title="Share on Google+">
														<i class="fa fa-google-plus" aria-hidden="true"></i>
														<span>Google</span>
													</a>
												</li>
												<li class="share-pinterest">
													<a rel="nofollow" class="share-pinterest shareThis-btn" href="http://pinterest.com/pin/create/button/?url=<?php echo
														get_permalink($post->ID);?>" target="_blank" title="Share on Pinterest">
														<i class="fa fa-pinterest" aria-hidden="true"></i>
														<span>Pinterest</span>
													</a>
												</li>
											</ul>
										</div>
									</div>
									<div class="connectAuthourBlock">
										<ul class="authorConnect fullWidth">
											<li>Connect with Designer:</li>
											<?php if( get_field('author_wesite_url') ): ?>
											<li>
												<a href="<?php the_field('author_wesite_url'); ?>" title="Visit author's Website" target="_blank">
													<i class="fa fa-globe" aria-hidden="true"></i>
													<small> Website </small>
												</a>
											</li>
											<?php endif; ?>
											<?php if( get_field('author_behance_url') ): ?>
											<li>
												<a href="<?php the_field('author_behance_url'); ?>" title="Visit author's Behance Profile" target="_blank">
													<i class="fa fa-behance" aria-hidden="true"></i>
													<small> Behance </small>
												</a>
											</li>
											<?php endif; ?>
											<?php if( get_field('author_dribbble_url') ): ?>
											<li>
												<a href="<?php the_field('author_dribbble_url'); ?>" title="Visit author's Dribbble Profile" target="_blank">
													<i class="fa fa-dribbble" aria-hidden="true"></i>
													<small> Dribbble </small>
												</a>
											</li>
											<?php endif; ?>
										</ul>
									</div>
								</div>
								
							</div>
							<!-- tags block -->
							<?php if ($tags) {?>
							<div class="tagsOuter text-left adjustDescSingle fullwidth relatedTagsBlockFull">
								<h6> Browse by Related Tags </h6>
								<nav id="relatedTags">
									<?php the_tags( '<ul><li>', '</li><li>', '</li></ul>' ); ?>
								</nav>
							</div>
							<?php }?>
							<!-- tags block -->
						</div>
					</div>
					<?php endwhile;   wp_reset_postdata(); ?>
					<!-- Related Posts -->
					
					<section class="relatedOuter fullWidth">
						<div class="blogCards fullWidth twoRadius">
							<div class="titleBlock fullWidth">
								<h3 class="reltTtle"> Don't Lose Heart, You Might Also Like </h3>
							</div>
							<div class="row">
								<?php
								$orig_post = $post;
								global $post;
								$tags = wp_get_post_tags($post->ID);
								
								if ($tags) {
								$tag_ids = array();
								foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
								$args=array(
								'tag__in' => $tag_ids,
								'post__not_in' => array($post->ID),
								'posts_per_page'=>9, // Number of related posts to display.
								'caller_get_posts'=>1
								);
								
								$my_query = new wp_query( $args );
								
								while( $my_query->have_posts() ) {
								$my_query->the_post();
								?>
								
								<!-- Post loop -->
								<article class="col-xs-6 col-sm-6 col-md-4 hentry productCards-lgDesk">
									<div class="productCard">
										<div class="thumbnail twoRadius">
											<div class="blogBlock">
												<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
													<div class="imgBox">
														<?php the_post_thumbnail('thumbnail-product'); ?>
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
													<div class="animateAll toolsTitle">
														<h2 class="productTitle"><?php the_title(); ?></h2>
													</div>
												</a>
											</div>
										</div>
									</div>
								</article>
								<!-- Post loop ends -->
								<? }
								}
								$post = $orig_post;
								wp_reset_query();
								?>
							</div>
						</div>
						</section><!-- Related Posts ends-->
						
					</div>
					<aside class="col-md-3 col-sm-4" itemscope itemtype="http://schema.org/WPSideBar">
						<div class="sidebarSingle">
							<div class="ydntTry">
								<div class="clearfix"><!-- empty --></div>
								<nav id="categoryAll">
									<?php dynamic_sidebar( 'catnav' ); ?>
								</nav>
							</div>
							<div class="fullwidth twoRadius">
								<?php dynamic_sidebar( 'common-advert1' ); ?>
							</div>
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