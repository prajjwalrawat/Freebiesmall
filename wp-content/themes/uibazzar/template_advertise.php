<?php
/**
* The template for displaying pages
* Template Name: Advertise
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
      <!-- Posts -->
      <div class="mainBlockCards-Outer">
        <div class="container-fluid">
          <div class="row">
            <div class="centerLayout">
              <div class="whiteBgLgNew">
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
                  <h1 class="catTitleLg" itemprop="headline"> <?php the_title('');  ?></h1>
                  </div><!-- breadcrumbs -->
                  <div class="col-md-12">
                    <?php the_content(); ?>
                    <div class="promotionPage promotionPageOuterBlock">
                      <div class="row">
                        <div class="col-sm-6 col-md-6 hentry center-blockAd">
                          <div class="thumbnail">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/bannerAdvertising.svg" class="bannerPromotion" alt="Banner Advertising">
                            <div class="caption">
                              <h3 itemprop="headline">Banner Advertising</h3>
                              <p itemprop="description">
                                Promote a brand or service on our platform, we promote Banner Advertising on affordable prices on our platform. Available slots:
                                <strong>300 x 250 &amp; 728 x 90</strong>
                              </p>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-6 col-md-6 hentry center-blockAd">
                          <div class="thumbnail">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/site-sponsorship-fm.svg" class="bannerPromotion" alt="Site/Product Sponsorship">
                            <div class="caption">
                              <h3 itemprop="headline">Site/Product Sponsorship</h3>
                              <p itemprop="description">We offer ideal sponsorship programme for <strong>920 days</strong>, place your brand/prdouct link or logo on our site and get more visibility, Hurry up!!!</p>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-6 col-md-6 hentry center-blockAd">
                          <div class="thumbnail">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/newsletter-advertising.svg" class="bannerPromotion" alt="Newsletter Advertising">
                            <div class="caption">
                              <h3 itemprop="headline">Newsletter Advertising</h3>
                              <p itemprop="description">
                              We can send a targeted mail to our entire list<strong>(2,00,000 subscribers)</strong> with email campaign reports. Get exclusive advertising opportunities, Hurry Up</p>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-6 col-md-6 hentry center-blockAd">
                          <div class="thumbnail">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/affiliate-programme-fm.svg" class="bannerPromotion" alt="Affiliate">
                            <div class="caption">
                              <h3 itemprop="headline">Affiliate</h3>
                              <p itemprop="description">
                                Affiliate marketing is a great way to sale your products online, if you have interesting offer for us you can
                                <a href="https://www.freebiesmall.com/contact-us/">contact us</a>. We'd be happy to sale your products on our platform.</p>
                              </div>
                            </div>
                          </div>
                          <div class="clearfix"><!-- empty --></div>
                          <div class="col-md-12 text-center adjustAdvertBtn">
                            <a class="btnlg twoRadius btnHoverOpac" href="https://www.freebiesmall.com/contact-us/">
                              Let's Connect
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php get_footer(); ?>
        </div>
        <!-- Product cards with sidebar nav ends -->