 <?php
/**
* Template Name: Write For Us
*
* @package WordPress
* @subpackage Twenty_Sixteen
* @since Twenty Sixteen 1.0
*/
get_header(); ?>
<!-- Blog Content -->
<section class="blog-content-wrapper blog-contentother-two">
  <!-- Header Section Blog -->
  <section class="fullBlogMain_wrapper">
    <div class="container container-blog-main">
      <div class="row">
        <div class="col-md-8 blog-inner-wrapper respBlog-block">
          <article class="freebiesmall-blog-card freebiesmall-blog-card-gaplg">
            <div class="white-left-box">
              <div class="blog-content">
                <h2 class="blog-main-title">
                  <?php the_title(); ?>
                </h2>
                <?php the_content(); ?>
              </div>
            </div>
          </article>
        </div>
        <div class="col-md-4 respBlog-block sbb02">
          <aside class="sidebar-blog">
            <section class="recentPosts-blog-wrapper">
              <h5 class="latest_posts_blog_title"> Connect With Us </h5>
              <ul itemscope="" itemtype="http://schema.org/Organization" class="socialMediaBlog">
                <li><a class="facebook-ga fb-sm" title="Visit us on Facebook" href="https://www.facebook.com/realfreeebiesmall" itemprop="sameAs"><i class="fa fa-facebook-official" aria-hidden="true"></i></a></li>
                <li><a class="twitter-ga twitter-sm" title="Visit us on Twitter" href="https://twitter.com/freebiesmall3" itemprop="sameAs"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                <li><a class="pinterest-ga pinterest-sm" title="Visit us on Pinterest" href="https://in.pinterest.com/freebiesmall/" itemprop="sameAs"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                <li><a class="googleplus-ga googlePlus-sm" title="Visit us on Google+" href="https://plus.google.com/u/0/111134682580669056874" itemprop="sameAs"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
              </ul>
            </section>
          </aside>
        </div>
        
      </div>
    </div>
  </section>
</section>
<?php get_footer(); ?>