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

						
					</div>
					<aside class="col-md-3 col-sm-4" itemscope itemtype="http://schema.org/WPSideBar">
						<div class="sidebarSingle">
							<div class="ydntTry">
								<div class="clearfix"><!-- empty --></div>
								<nav id="categoryAll">
									<?php //dynamic_sidebar( 'catnav' ); ?>
								</nav>
							</div>
							<div class="fullwidth twoRadius">
								<?php //dynamic_sidebar( 'common-advert1' ); ?>
							</div>
							<div class="fullwidth twoRadius">
								<?php //dynamic_sidebar( 'pdp-category-nav' ); ?>
							</div>
						</div>
					</aside>
				</div>
                <div class="commentForm">
                	<?php comments_template('/comments.php'); ?>
                </div><!--commentForm-->
			</div>
		</div>
	</section>
    
<style>
.commentForm{float:left; width:700px; margin:0 0 80px 0;}
.messageBox{width:100%; float:left; margin:0 0 5px;}
.messageBox textarea{height:135px;}
.commentForm .field{background:#fff; border:1px solid #f3f4f5; padding:20px 25px; color:#dc4031; font-family:Arial, Helvetica, sans-serif; font-size:16px; line-height:1.75em; width:100%; float:left;}
.nameBox{width:49.5%; float:left;}
.emailBox{width:49.5%; float:right;}
.commentForm input::-moz-placeholder, 
.commentForm textarea::-moz-placeholder{color:#707378;}
.submitbox{text-align:right;}
.submitbox input[type="submit"]{display:inline-block; line-height:1.45em; font-size:16px; padding:13px 45px; background:#fff; border:2px solid #dc4031; border-radius: 2.5em; -moz-border-radius: 2.5em; -ms-border-radius: 2.5em; -o-border-radius: 2.5em; -webkit-border-radius: 2.5em; font-family:Arial, Helvetica, sans-serif; font-weight:700; color:#dc4031; margin:10px 0 0 0;}
.submitbox input[type="submit"]:hover{background-color:#dc4031; color:#fff;}
.comment-reply-title{font-weight:300; font-size:30px; color:#dc4031; margin:25px 0;}
.commentForm .comment-author img{display:none;}
.commentForm .comment-author .says{display:none;}
.comment-metadata{display:none;}
.commentForm .comment-author .fn{color:#43464b; font-size: 22px; font-weight: bold; line-height: 1.66429em;}
.commentForm .comment-author .fn a{color:#43464b; text-decoration:none;}
.comment-content p{margin-bottom: 1.5em; color: #707378; font-size: 14px; line-height: 1.71429em; overflow-wrap: break-word;}
.comment-reply-link{display:inline-block; line-height:1.45em; font-size:14px; padding:11px 30px; background:#fff; border:1px solid #e3e9eb; border-radius: 2.5em; -moz-border-radius: 2.5em; -ms-border-radius: 2.5em; -o-border-radius: 2.5em; -webkit-border-radius: 2.5em; font-family:Arial, Helvetica, sans-serif; font-weight:700; color:#dc4031; margin:0; text-decoration:none; text-transform:uppercase;}
.comment-reply-link:hover{background-color:#dc4031; color:#fff;  text-decoration:none;}
.comment .children {margin-left:49px;}
.comment-body{color: #707378; font-size: 14px; hyphens: auto; line-height: 1.71429em; overflow-wrap: break-word;}
.children .comment-body {padding-left: 49px;}
.children > .comment > .comment-body {border-left: 2px solid #dadada;}
.children > .bypostauthor > .comment-body {border-color: #f16334;}
.comment-author{border-top: 1px solid #dadada; margin-top: 27px; padding-top: 27px; position: relative;}
.children .comment-author {padding-top: 25px;}
.children .comment-author::after{background: #f2f2f2; content: ""; display: block; height: 36px; left: -52px; position: absolute; top: -2px; width: 5px;}
.comment-author{color:#43464b; font-size:22px; font-weight:bold; line-height:1.66429em; margin-bottom:0.5em;}
.submitbox{width:100%; float:left;}
#comments{line-height:24px;}


@media(max-width:991px){
.commentForm{width:100%;}	
	
	
}

@media(max-width:767px){
.comment .children{margin-left:15px;}
.children .comment-author::after {width:40px;}
.children .comment-body{padding-left:15px;}
.commentForm .comment-author .fn{font-size:20px;}
.comment-reply-title{font-size:22px;}
.commentForm .field{width:100%;}
.emailBox,
.nameBox{width:100%; margin:0 0 5px 0;}
.submitbox input[type="submit"]{margin:5px 0 0 0; display:block; width:100%;}
.shareThis-block ul li{margin:0 4px 6px 0;}


}
</style>    
    
    
    
	<div class="singlePageFooterGap fullwidth"><!-- empty --></div>
	<?php get_footer(); ?>