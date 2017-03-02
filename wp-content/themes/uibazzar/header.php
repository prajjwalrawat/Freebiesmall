<?php
/**
* The template for displaying the header
*
* Displays all of the head element and everything up until the "site-content" div.
*
* @package WordPress
* @subpackage Twenty_Fifteen
* @since Twenty Fifteen 1.0
*/
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, user-scalable=no, minimum-scale=1.0, initial-scale=1">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon.png">
    <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/images/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/images/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/images/manifest.json">
    <link rel="mask-icon" href="<?php echo get_template_directory_uri(); ?>/images/safari-pinned-tab.svg">
    <meta name="theme-color" content="#ffffff">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <!--<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">-->
    <link rel='stylesheet' href='<?php echo get_template_directory_uri(); ?>/css/font.css' type='text/css' />
    <!--<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' type='text/css' />-->
    <link rel='stylesheet' href='<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css' type='text/css' />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <meta name="p:domain_verify" content="b9da16074706580d512da346f0781390"/>
    <?php wp_head(); ?>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">
    <header class="header" itemscope itemtype="http://schema.org/WPHeader">
      <nav class="navbar navbar-default zeroRadius navbar-fixed-top">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <span itemscope itemtype="http://schema.org/Organization">
              <a class="navbar-brand logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" itemprop="url">
                <img src="<?php echo get_template_directory_uri(); ?>/images/logo-fm.svg" alt="Freebies Mall Logo" itemprop="logo">
              </a>
            </span>
          </div>
          <!-- live search -->
          <div class="topLivesearchBlock">
            <div class="searchBlockLg">
            	<?php get_search_form(); ?>              
				<?php //echo do_shortcode('[search]'); ?>
            </div>
          </div>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <nav class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" itemscope itemtype="http://schema.org/SiteNavigationElement">
            <ul class="nav navbar-nav navbar-right navHideMobile">
              <li><a href="https://www.freebiesmall.com/blog/" class="submitdesign-page-ga">Blog</a></li>
              <li><a href="https://www.freebiesmall.com/submit-a-design/" class="submitdesign-page-ga">Submit Freebie</a></li>
              <li><a href="https://www.freebiesmall.com/write-for-us/" class="writeforus-page-ga">Write For Us</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right navHideDesktop" style="display:none;">
              <li><a href="https://www.freebiesmall.com/blog/" class="submitdesign-page-ga">Blog</a></li>
              <li><a href="https://www.freebiesmall.com/submit-a-design/" class="submitdesign-page-ga">Submit Freebie</a></li>
              <li><a href="https://www.freebiesmall.com/write-for-us/" class="writeforus-page-ga">Write For Us</a></li>
            </ul>
            <div class="mobilemenu">
              <?php
              wp_nav_menu( array(
              'theme_location' => 'mobile',
              'menu_class'     => 'mobile-menu',
              ) );
              ?>
            </div>
            
          </nav>
          </div><!-- /.navbar-collapse -->
        </nav>
      </header>