<?php
/**
 * Twenty Sixteen functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

/**
 * Twenty Sixteen only works in WordPress 4.4 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.4-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

if ( ! function_exists( 'markupbox_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * Create your own markupbox_setup() function to override in a child theme.
 *
 * @since Twenty Sixteen 1.0
 */
function markupbox_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Twenty Sixteen, use a find and replace
	 * to change 'markupbox' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'markupbox', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for custom logo.
	 *
	 *  @since Twenty Sixteen 1.2
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'thumbnail-product', 400, 300, true );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array( 
		'Footer-1' => __( 'Footer-1 Menu'),
		'Footer-2' => __( 'Footer-2 Menu'),
		'secondary'  => __( 'Secondary Menu' ),
		'mobile'  => __( 'Mobile Menu' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'status',
		'audio',
		'chat',
	) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', markupbox_fonts_url() ) );

	// Indicate widget sidebars can use selective refresh in the Customizer.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif; // markupbox_setup
add_action( 'after_setup_theme', 'markupbox_setup' );

/**
 * Sets the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 *
 * @since Twenty Sixteen 1.0
 */
function markupbox_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'markupbox_content_width', 840 );
}
add_action( 'after_setup_theme', 'markupbox_content_width', 0 );

/**
 * Registers a widget area.
 *
 * @link https://developer.wordpress.org/reference/functions/register_sidebar/
 *
 * @since Twenty Sixteen 1.0
 */
function markupbox_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Newsletter Mailchimp', 'markupbox' ),
		'id'            => 'mailchimp',
		'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'markupbox' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Category Nav Sidebar', 'markupbox' ),
		'id'            => 'catnavsidebar',
		'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'markupbox' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'CatNav Mobile', 'markupbox' ),
		'id'            => 'catnavsidebar-mobile',
		'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'markupbox' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );   

	register_sidebar( array(
		'name'          => __( 'Social Share', 'markupbox' ),
		'id'            => 'socialshare',
		'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'markupbox' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Adblock1', 'markupbox' ),
		'id'            => 'common-advert1',
		'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'markupbox' ),
		'before_widget' => '<div id="%1$s" class="widget-advert %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h6 class="widget-title noneTitle">',
		'after_title'   => '</h6>',
	) );
	register_sidebar( array(
			'name'          => __( 'PDP Category Nav', 'markupbox' ),
			'id'            => 'pdp-category-nav',
			'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'markupbox' ),
			'before_widget' => '<div id="%1$s" class="widget-advert pdpcategory-nav %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title pdpcategory-navigation">',
			'after_title'   => '</h2>',
		) );
	register_sidebar( array(
			'name'          => __( 'Top Horizontal', 'markupbox' ),
			'id'            => 'horizontal-banner',
			'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'markupbox' ),
			'before_widget' => '<div id="%1$s" class="top-advertisment %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );

		register_sidebar( array(
			'name'          => __( 'SEO Navigation Footer', 'markupbox' ),
			'id'            => 'seo-navfooter',
			'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'markupbox' ),
			'before_widget' => '<div id="%1$s" class="top-advertisment %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );
    register_sidebar( array(
		'name'          => __( 'Blog Adblock Placeholder', 'markupbox' ),
		'id'            => 'blog-advert-main',
		'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'markupbox' ),
		'before_widget' => '<div id="%1$s" class="widget-advert %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h6 class="widget-title noneTitle">',
		'after_title'   => '</h6>',
	) );

}
add_action( 'widgets_init', 'markupbox_widgets_init' );

if ( ! function_exists( 'markupbox_fonts_url' ) ) :
/**
 * Register Google fonts for Twenty Sixteen.
 *
 * Create your own markupbox_fonts_url() function to override in a child theme.
 *
 * @since Twenty Sixteen 1.0
 *
 * @return string Google fonts URL for the theme.
 */
function markupbox_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';
	return $fonts_url;
}
endif;

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Twenty Sixteen 1.0
 */
function markupbox_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'markupbox_javascript_detection', 0 );

/**
 * Enqueues scripts and styles.
 *
 * @since Twenty Sixteen 1.0
 */
function markupbox_scripts() {

	// Theme stylesheet.
	wp_enqueue_style( 'markupbox-style', get_stylesheet_uri() );

	// Load the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'markupbox-ie', get_template_directory_uri() . '/css/ie.css', array( 'markupbox-style' ), '20160412' );
	wp_style_add_data( 'markupbox-ie', 'conditional', 'lt IE 10' );

	// Load the Internet Explorer 8 specific stylesheet.
	wp_enqueue_style( 'markupbox-ie8', get_template_directory_uri() . '/css/ie8.css', array( 'markupbox-style' ), '20160412' );
	wp_style_add_data( 'markupbox-ie8', 'conditional', 'lt IE 9' );

	// Load the Internet Explorer 7 specific stylesheet.
	wp_enqueue_style( 'markupbox-ie7', get_template_directory_uri() . '/css/ie7.css', array( 'markupbox-style' ), '20160412' );
	wp_style_add_data( 'markupbox-ie7', 'conditional', 'lt IE 8' );

	// Load the html5 shiv.
	//wp_enqueue_script( 'markupbox-html5', get_template_directory_uri() . '/js/html5.js', array(), '3.7.3' );
	//wp_script_add_data( 'markupbox-html5', 'conditional', 'lt IE 9' );

	//wp_enqueue_script( 'markupbox-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20160412', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	//if ( is_singular() && wp_attachment_is_image() ) {
		//wp_enqueue_script( 'markupbox-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20160412' );
	//}

	wp_enqueue_script( 'markupbox-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20160412', true );

	wp_localize_script( 'markupbox-script', 'screenReaderText', array(
		'expand'   => __( 'expand child menu', 'markupbox' ),
		'collapse' => __( 'collapse child menu', 'markupbox' ),
	) );
}
add_action( 'wp_enqueue_scripts', 'markupbox_scripts' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @since Twenty Sixteen 1.0
 *
 * @param array $classes Classes for the body element.
 * @return array (Maybe) filtered body classes.
 */
function markupbox_body_classes( $classes ) {
	// Adds a class of custom-background-image to sites with a custom background image.
	if ( get_background_image() ) {
		$classes[] = 'custom-background-image';
	}

	// Adds a class of group-blog to sites with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of no-sidebar to sites without active sidebar.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'markupbox_body_classes' );

/**
 * Converts a HEX value to RGB.
 *
 * @since Twenty Sixteen 1.0
 *
 * @param string $color The original color, in 3- or 6-digit hexadecimal form.
 * @return array Array containing RGB (red, green, and blue) values for the given
 *               HEX code, empty array otherwise.
 */
function markupbox_hex2rgb( $color ) {
	$color = trim( $color, '#' );

	if ( strlen( $color ) === 3 ) {
		$r = hexdec( substr( $color, 0, 1 ).substr( $color, 0, 1 ) );
		$g = hexdec( substr( $color, 1, 1 ).substr( $color, 1, 1 ) );
		$b = hexdec( substr( $color, 2, 1 ).substr( $color, 2, 1 ) );
	} else if ( strlen( $color ) === 6 ) {
		$r = hexdec( substr( $color, 0, 2 ) );
		$g = hexdec( substr( $color, 2, 2 ) );
		$b = hexdec( substr( $color, 4, 2 ) );
	} else {
		return array();
	}

	return array( 'red' => $r, 'green' => $g, 'blue' => $b );
}

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images
 *
 * @since Twenty Sixteen 1.0
 *
 * @param string $sizes A source size value for use in a 'sizes' attribute.
 * @param array  $size  Image size. Accepts an array of width and height
 *                      values in pixels (in that order).
 * @return string A source size value for use in a content image 'sizes' attribute.
 */
function markupbox_content_image_sizes_attr( $sizes, $size ) {
	$width = $size[0];

	840 <= $width && $sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 62vw, 840px';

	if ( 'page' === get_post_type() ) {
		840 > $width && $sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
	} else {
		840 > $width && 600 <= $width && $sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 61vw, (max-width: 1362px) 45vw, 600px';
		600 > $width && $sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
	}

	return $sizes;
}
add_filter( 'wp_calculate_image_sizes', 'markupbox_content_image_sizes_attr', 10 , 2 );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails
 *
 * @since Twenty Sixteen 1.0
 *
 * @param array $attr Attributes for the image markup.
 * @param int   $attachment Image attachment ID.
 * @param array $size Registered image size or flat array of height and width dimensions.
 * @return string A source size value for use in a post thumbnail 'sizes' attribute.
 */
function markupbox_post_thumbnail_sizes_attr( $attr, $attachment, $size ) {
	if ( 'post-thumbnail' === $size ) {
		is_active_sidebar( 'sidebar-1' ) && $attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 60vw, (max-width: 1362px) 62vw, 840px';
		! is_active_sidebar( 'sidebar-1' ) && $attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 88vw, 1200px';
	}
	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'markupbox_post_thumbnail_sizes_attr', 10 , 3 );

/**
 * Modifies tag cloud widget arguments to have all tags in the widget same font size.
 *
 * @since Twenty Sixteen 1.1
 *
 * @param array $args Arguments for tag cloud widget.
 * @return array A new modified arguments.
 */
function markupbox_widget_tag_cloud_args( $args ) {
	$args['largest'] = 1;
	$args['smallest'] = 1;
	$args['unit'] = 'em';
	return $args;
}
add_filter( 'widget_tag_cloud_args', 'markupbox_widget_tag_cloud_args' );


//Advanced Custom Fields Theme Options
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Options',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}

// Custom Pagination

function kriesi_pagination($pages = '', $range = 2)
{  
     $showitems = ($range * 2)+1;  

     global $paged;
     if(empty($paged)) $paged = 1;

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   

     if(1 != $pages)
     {
         echo "<ul class='pagination'>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link(1)."'>&laquo;</a></li>";
         if($paged > 1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a></li>";

         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<li class='active'><span>".$i."</span></li>":"<li><a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a></li>";
             }
         }

         if ($paged < $pages && $showitems < $pages) echo "<li><a href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a></li>";  
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<li><a href='".get_pagenum_link($pages)."'>&raquo;</a></li>";
         echo "</ul>\n";
     }
}


function wt_get_category_count($input = '') {
	global $wpdb;
	if($input == '')
	{
		$category = get_the_category();
		return $category[0]->category_count;
	}
	elseif(is_numeric($input)) {
		$SQL = "SELECT $wpdb->term_taxonomy.count FROM $wpdb->terms, $wpdb->term_taxonomy WHERE $wpdb->terms.term_id=$wpdb->term_taxonomy.term_id AND $wpdb->term_taxonomy.term_id=$input";
		return $wpdb->get_var($SQL);
	}
	else {
		$SQL = "SELECT $wpdb->term_taxonomy.count FROM $wpdb->terms, $wpdb->term_taxonomy WHERE $wpdb->terms.term_id=$wpdb->term_taxonomy.term_id AND $wpdb->terms.slug='$input'";
		return $wpdb->get_var($SQL);
	}
}

/***** Shortcode for custom autocomplete Search bar *****/

function custom_search(){
	
$terms = get_terms( 'post_tag', array(
    'hide_empty' => 1
) );

$categories = get_terms( 'category', array(
    'orderby'    => 'count',
    'hide_empty' => 1
) );

$list = array_merge($terms,$categories);
$data = array();

foreach($list as $val)
{
 $json_data = array('value'=>$val->name, 'data'=>$val->term_id, 'taxtype'=>$val->taxonomy, 'taxslug' =>$val->slug);
 $data[] = json_encode($json_data);
}

$data = implode(', ', $data);
?>

  <div class="liveSearchBlock">
    <input type="text" placeholder="Search your freebie here..." class="txtbxs pro_text search_text input-lg form-control liveSearchField twoRadius livesearch-ga" id="autocomplete" name="autocomplete" value="">
    <p id="empty-message"></p>
	<input type="hidden" id="taxid" name="taxid" value="">
	<input type="hidden" id="taxtype" name="taxtype" value="">
	<input type="hidden" id="taxslug" name="taxslug" value="">
	<button class="btnLs"><i class="fa fa-search" aria-hidden="true"></i></button>
	</div>

	

<script>
jQuery(function(){
	jQuery("#empty-message").empty();
        var taxonomies = [<?php echo $data;?>];
        var site_url = "<?php echo site_url();?>";
  	document.getElementById("taxid").value = "";
	document.getElementById("taxtype").value = "";
	document.getElementById("taxslug").value = "";

        $('input:text').click(
    function(){
        $(this).val('');
    });
	
  jQuery('#autocomplete').autocomplete({
    lookup: taxonomies,
	autoFocus: true,
    onSelect: function (suggestion) {
			document.getElementById("taxid").value = suggestion.data;
			document.getElementById("taxtype").value = suggestion.taxtype;
			document.getElementById("taxslug").value = suggestion.taxslug;
			var taxtype = 	jQuery("#taxtype").val();
			jQuery("#empty-message").empty();
			if(taxtype == "post_tag")  { taxtype ="tag"; }
			var taxname = 	jQuery("#taxslug").val();
			window.location.href = site_url+"/"+taxtype+"/"+taxname;
	}
  });

  jQuery('button.btnLs').click(function() 
  { 
	var taxname = jQuery("#taxslug").val();
	var taxtype = 	jQuery("#taxtype").val();
	if(taxtype == "")
	{
	  taxtype = "tag";
	}
	if(taxname == "")
	{
	  taxname = "android-freebie";
	}
			
	if(taxtype == "post_tag")  { taxtype ="tag"; }
	window.location.href = site_url+"/"+taxtype+"/"+taxname;
	 
  });
  
  jQuery("#autocomplete").keypress(function(event){
    jQuery("#empty-message").empty();
    if(event.keyCode == 13) {
      if(jQuery("#taxid").val().length==0) {
			jQuery("#empty-message").html("<p class='noResult twoRadius'>Sorry No Freebies Found !</p>");
          event.preventDefault();
          return false;
      }
	  else
	  {
	  jQuery("#empty-message").empty();
	     var taxtype = 	jQuery("#taxtype").val();
	     if(taxtype == "post_tag")  { taxtype ="tag"; }
		 var taxname = 	jQuery("#taxslug").val();
                 
		 window.location.href = site_url+"/"+taxtype+"/"+taxname;
	  }
    }
	
 });

 

});
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri();?>/js/jquery.autocomplete.min.js"></script>
<?php
}
add_shortcode( 'search', 'custom_search' );
/***** End of Function *****/


// REMOVE WP EMOJI
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );


// Remove REST API  The string https://api.w.org/ is not a registered keyword. HTML5 validation bug.
function remove_api () {
remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );
}
add_action( 'after_setup_theme', 'remove_api' );



// schema for image itemprop="image"	
add_filter('post_thumbnail_html','mediaboxlv_image_itemprop',10,3 );
function mediaboxlv_image_itemprop($html, $post_id, $post_image_id){
    $html = str_replace('src',' itemprop="image" src',$html);
    return $html;
}

// prevent the category widget from using the category description as the list item title attribute
function sjc_disable_cat_desc_widget_list_titles ( $cat_args ) {
    $cat_args[ 'use_desc_for_title' ] = 0;
    return $cat_args;
}
add_filter( 'widget_categories_args', 'sjc_disable_cat_desc_widget_list_titles' );


// // Disable plugin and theme updates.

// add_action('after_setup_theme','remove_core_updates');
// function remove_core_updates()
// {
// if(! current_user_can('update_core')){return;}
// add_action('init', create_function('$a',"remove_action( 'init', 'wp_version_check' );"),2);
// add_filter('pre_option_update_core','__return_null');
// add_filter('pre_site_transient_update_core','__return_null');
// }
// remove_action('load-update-core.php','wp_update_plugins');
// add_filter('pre_site_transient_update_plugins','__return_null');


function featuredtoRSS($content) {
global $post;
if ( has_post_thumbnail( $post->ID ) ){
$content = '<div>' . get_the_post_thumbnail( $post->ID, 'custom-logo', array( 'style' => 'margin-bottom: 15px;' ) ) . '</div>' . $content;
}
return $content;
}
 
add_filter('the_excerpt_rss', 'featuredtoRSS');
add_filter('the_content_feed', 'featuredtoRSS');


// Remove bracket and add span class to category count.

function replace_post_count_parentheses($cat) {
   $cat = str_replace('(', '<span class="count-wrap">', $cat);
   $cat = str_replace(')', '</span>', $cat);
   return $cat; }
add_filter('wp_list_categories','replace_post_count_parentheses'); 

//Custom Pagination
if ( ! function_exists( 'my_pagination' ) ) :
function my_pagination() {
global $wp_query;
$big = 999999999; // need an unlikely integer
echo paginate_links( array(
'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
'format' => '?paged=%#%',
'current' => max( 1, get_query_var('paged') ),
'total' => $wp_query->max_num_pages
) );
}
endif;

// Limit words
function string_limit_words($string, $word_limit)
{
  $words = explode(' ', $string, ($word_limit + 1));
  if(count($words) > $word_limit)
  array_pop($words);
  return implode(' ', $words);
}




//Videos
add_action( 'init', 'blog' );
function blog() {
	$labels = array(
		"name" => __( 'Blog', 'wpcharming' ),
		"singular_name" => __( 'Blog', 'wpcharming' ),
		"menu_name" => __( 'Blog', 'wpcharming' ),
		"all_items" => __( 'All Blog', 'wpcharming' ),
		"add_new" => __( 'Add New Blog', 'wpcharming' ),
		"add_new_item" => __( 'Add New Blog', 'wpcharming' ),
		"edit_item" => __( 'Edit Blog', 'wpcharming' ),
		"new_item" => __( 'New Blog', 'wpcharming' ),
		"view_item" => __( 'View Blog', 'wpcharming' ),
		"search_items" => __( 'Search Blog', 'wpcharming' ),
		"not_found" => __( 'No Blog Found', 'wpcharming' ),
		"not_found_in_trash" => __( 'No Blog found in trash', 'wpcharming' ),
		"parent_item_colon" => __( 'Parent Blog', 'wpcharming' ),
		"featured_image" => __( 'Feature Image for Blog', 'wpcharming' ),
		"set_featured_image" => __( 'Set featured Blog image', 'wpcharming' ),
		"remove_featured_image" => __( 'Remove featured image for Blog', 'wpcharming' ),
		"use_featured_image" => __( 'Use featured image for Blog', 'wpcharming' ),
		"archives" => __( 'Blog archives', 'wpcharming' ),
		"insert_into_item" => __( 'Insert into Blog', 'wpcharming' ),
		"uploaded_to_this_item" => __( 'Uploaded to this Blog', 'wpcharming' ),
		"items_list_navigation" => __( 'Blog list navigation', 'wpcharming' ),
		"items_list" => __( 'Blog List', 'wpcharming' ),
		"parent_item_colon" => __( 'Parent Blog', 'wpcharming' ),
		);

	$args = array(
		"label" => __( 'Blog', 'wpcharming' ),
		"labels" => $labels,
		"description" => "Blog",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "blog",
		"has_archive" => false,
		"show_in_menu" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "blog", "with_front" => true ),
		"query_var" => true,		
		"supports" => array( "title", "editor", "thumbnail", "custom-fields", "page-attributes", "post-formats" ),		
		"taxonomies" => array( ),
		);
	register_post_type( "blog", $args );

// End of cptui_register_my_cpts_sweat_workout()
}

 
add_action( 'init', 'create_blog_tax' );

function create_blog_tax() {
	register_taxonomy(
		'blog_category',
		'blog',
		
		array(
			'label' => __( 'Blog Category' ),
			'rewrite' => array( 'slug' => 'blog' ),
			'hierarchical' => true,
			'show_ui' => true,
			'show_admin_column' => true,
		)
	);
}

add_action( 'init', 'create_blog_tag' );
function create_blog_tag() {
	register_taxonomy(
		'blog_tag',
		'blog',
		
		array(
			'label' => __( 'Blog Tag' ),
			'rewrite' => array( 'slug' => 'blog' ),
			'hierarchical' => true,
			'show_ui' => true,
			'show_admin_column' => true,
		)
	);
}


add_filter(
'post_link',
'custom_post_type_link',
10,
3); function custom_post_type_link($permalink, $post, $leavename) {
if (!gettype($post) == 'post') {
    return $permalink;
}
switch ($post->post_type) {
    case 'post':
        //$permalink = get_home_url() . '/' . $post->post_name . '/';

        $cats = get_the_category($post->ID);
        $subcats = array();
        foreach( $cats as $cat ) {
            $cat = get_category($cat->term_id);
            if($cat->parent) { $subcats[] = sanitize_title($cat->name); }
        }
        if($subcats) {
            foreach($subcats as $subcat) {
                $subcat = $subcat.'/';
                $permalink = str_replace($subcat, "", $permalink);
            }
        }


        break;
}

return $permalink;}



  