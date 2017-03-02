<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header(); ?>
<?php if (have_posts()) : ?>
<section>
	<div class="container">
		<div class="row">
            <div class="col-md-12 col-xs-12">
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
            
            <div class="col-md-9">
            	<div class="singleLeft">
                <h1 class="pageTitle"><?php printf( __( 'Search Results for : %s', 'pacify' ), '<span class="cat">' . get_search_query() . '</span>' ); ?></h1>
				<?php while (have_posts()) : the_post(); ?>
                    <article <?php post_class() ?>>
                        <h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
                        <p><?php the_time('l, F jS, Y') ?></p>
                        <p class="postmetadata"><?php the_tags('Tags: ', ', ', '<br />'); ?> Posted in <?php the_category(', ') ?> | <?php edit_post_link('Edit', '', ' | '); ?>  <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></p>
                    </article>
                <?php endwhile; ?>
                <!--<div class="custom-pagination"><?php //wp_pagenavi( array( 'options' => PageNavi_Core::$options->get_defaults() ) ); ?></div>-->
                </div> 
            </div>                
            
            
                <?php else : ?>
                <div class="container">  
                	<div class="row">
                        <div class="col-md-12 col-xs-12">
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
                    
						<div class="col-md-12 col-xs-12">
                        	<div class="singleLeft">
							<h1 class="pageTitle">No posts found. Try a different search?</h1>
                            <div class="searchHeader">
                                <?php get_search_form(); ?>
                            </div>
                            </div>
                		</div> 
                    </div><!--row-->
                </div><!--container-->                  
                <?php endif; ?>  
			

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
    	</div><!--row-->
    </div><!--container-->
</section>
<?php get_footer(); ?>
