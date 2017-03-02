<?php
/*
Plugin Name: CGD Arrange Terms
Plugin URI: http://cgd.io/
Description:  Re-order, sort, and arrange categories, tags, and taxonomy terms.
Version: 1.1.3
Author: Clifton H. Griffin II
Author URI: http://cgd.io
*/

if ( ! class_exists('WordPress_SimpleSettings') )
	require('lib/wordpress-simple-settings.php');


if ( ! class_exists('CGD_Arrange_Walker') )
	require('inc/custom-walker.php');

class CGDArrangeTerms extends WordPress_SimpleSettings {
	var $table_name;
	var $prefix = "cgd_arrange_terms";

	public function __construct() {
    	parent::__construct();

    	global $wpdb;
    	$this->table_name = $wpdb->prefix . "cgd_term_order";

    	register_activation_hook( __FILE__, array($this, 'activate') );

		add_action('admin_menu', array($this,'admin_menu'), 11);
    	add_action('admin_init', array($this, 'catch_save_order') );
    	add_action('admin_enqueue_scripts', array($this,'admin_scripts') );
    	add_action('wp_ajax_update_arrangement', array($this, 'update_arrangement'));

		// Do the ordering

		// Adds backwards compatiblity for pre 4.6
		add_filter('get_terms_args', array($this, 'get_terms_add_taxonomy_arg'), 1, 2);

		add_filter('terms_clauses', array($this, 'get_terms_join'), 100, 1);
	    add_filter('get_terms_orderby', array($this, 'get_terms_orderby'), 100, 2);

	    $version = $this->get_setting('version');
	    if ( ! $version || $version < 112 ) $this->activate();
    }

    function activate() {

		global $wpdb;

		$wpdb->show_errors();

		/**
	     * Create Table
	     *
	     * @since 1.1
	     */
		$sql = "CREATE TABLE $this->table_name (
		  `term_id` bigint(20) unsigned NOT NULL DEFAULT '0',
		  `term_order` int(11) NOT NULL DEFAULT '0',
		  PRIMARY KEY  (term_id)
		) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1";

		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		dbDelta($sql);

		$version = $this->get_setting('version');
		$old_option = get_option('shopp_arrange_cat_override', false);

		if ( ! $version && $old_option !== false ) {
			// try upgrading
			$query = "INSERT INTO $this->table_name (term_id, term_order) SELECT term_id, term_order FROM $wpdb->terms";
			$wpdb->query($query);

			// try removing term_order column
			$wpdb->query("ALTER TABLE $wpdb->terms DROP `term_order`");

			// Port options
			if ( get_option('shopp_arrange_cat_override') == "yes" ) $this->add_setting('enabled_taxonomies', array('shopp_category') );

			// Delete old options
			delete_option('shopp_arrange_cat_override');
			delete_option('shopp_arrange_shipping_override');
		}

		// Set version
		$this->update_setting('version', 112);

		// Defaults
		$this->add_setting('cat_override', 'yes');
	}

	function admin_menu() {
		add_menu_page( "CGD Arrange Terms", "Arrange Terms", "manage_categories", "cgd-arrange", array($this, 'admin_page'), 'dashicons-sort' );
		add_submenu_page('cgd-arrange', 'CGD Arrange Terms', 'Arrange Terms', 'manage_categories', 'cgd-arrange', array($this,'admin_page') );
		add_submenu_page('cgd-arrange', 'CGD Arrange Terms Settings', 'Settings', 'manage_categories', 'cgd-arrange-settings', array($this,'settings_page') );
	}

	function admin_page() {
		include_once('cgd-arrange-admin.php');
	}

	function settings_page() {
		include_once('cgd-arrange-settings.php');
	}

	function admin_scripts() {
		if ( isset( $_REQUEST['page'] ) && $_REQUEST['page'] == "cgd-arrange" ) {
			wp_enqueue_script('jquery-ui-sortable');
			wp_enqueue_script( 'cgd-arrange-admin-js', plugins_url('js/admin.js', __FILE__) );
			wp_enqueue_style( 'cgd-arrange-admin-css', plugins_url('css/admin.css', __FILE__) );
		}
	}

	function catch_save_order() {
		global $wpdb;

		if ( isset( $_POST['_wpnonce'] ) && wp_verify_nonce( $_POST['_wpnonce'], 'sa_save_order' )  ) {
			foreach($_REQUEST['sa-term'] as $position => $term_id) {
				$wpdb->query($wpdb->prepare("REPLACE INTO $this->table_name (term_order, term_id) VALUES(%d, %d)", $position, $term_id));
			}
		}
	}

	function get_terms_join($pieces) {
		$pieces['join'] .= " LEFT JOIN $this->table_name tto ON tto.term_id = t.term_id";

		return $pieces;
	}

	function get_terms_orderby($orderby, $args) {
		$taxonomies = $this->get_setting('enabled_taxonomies');

		if ( isset($args['taxonomy']) && in_array($args['taxonomy'][0], $taxonomies) ) {
			return 'tto.term_order';
		} else {
			return $orderby;
		}
	}

	/**
	 * Adds backwards compatiblity for pre 4.6
	 */
	function get_terms_add_taxonomy_arg($args, $taxonomies) {
		$enabled_taxonomies = $this->get_setting('enabled_taxonomies');

		if ( in_array($taxonomies[0], $enabled_taxonomies) && ! isset($args['taxonomy']) ) {
			$args['taxonomy'] = array($taxonomies[0]);
		}

		return $args;
	}
}

$CGDArrangeTerms = new CGDArrangeTerms();
