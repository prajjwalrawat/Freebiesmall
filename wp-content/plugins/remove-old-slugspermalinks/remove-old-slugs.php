<?php
/*
Plugin Name: Remove Old Slugs
Plugin URI: http://www.snippet.fm
Description: Plugin removes old slugs (permalinks) from database.
Version: 2.0.1
Author: Algoritmika Ltd.
Author URI: http://www.algoritmika.com
Text Domain: remove-old-slugspermalinks
Domain Path: /langs
Copyright: © 2016 Algoritmika Ltd.
License: GNU General Public License v3.0
License URI: http://www.gnu.org/licenses/gpl-3.0.html
*/

if ( ! class_exists( 'Alg_Remove_Old_Slugs' ) ) {

	/*
	 * Alg_Remove_Old_Slugs.
	 *
	 * @version 2.0.0
	 */
	class Alg_Remove_Old_Slugs{

		/*
		 * Constructor.
		 *
		 * @version 2.0.0
		 */
		function __construct() {
			if ( is_admin() ) {
				add_action( 'init', array( $this, 'init' ) );
				add_action( 'admin_menu', array( $this, 'add_plugin_options_page' ) );
				add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), array( $this, 'action_links' ) );
			}
		}

		/**
		 * Show action links on the plugin screen
		 *
		 * @version 2.0.0
		 * @since   2.0.0
		 * @param   mixed $links
		 * @return  array
		 */
		function action_links( $links ) {
			$custom_links = array(
				'<a href="' . admin_url( 'tools.php?page=alg-remove-old-slugs-settings-admin' ) . '">' . __( 'Settings', 'woocommerce' ) . '</a>',
			);
			return array_merge( $custom_links, $links );
		}

		/**
		 * Init.
		 *
		 * @since   2.0.0
		 * @version 2.0.0
		 */
		function init() {
			// Set up localisation
			load_plugin_textdomain( 'remove-old-slugspermalinks', false, dirname( plugin_basename( __FILE__ ) ) . '/langs/' );
		}

		/*
		 * add_plugin_options_page.
		 *
		 * @version 2.0.0
		 */
		function add_plugin_options_page() {
			add_submenu_page(
				'tools.php',
				__( 'Remove Old Slugs Plugin', 'remove-old-slugspermalinks' ),
				__( 'Remove Old Slugs', 'remove-old-slugspermalinks' ),
				'manage_options',
				'alg-remove-old-slugs-settings-admin',
				array( $this, 'create_admin_page' )
			);
		}

		/**
		 * alg_get_table_html.
		 *
		 * @since   2.0.0
		 * @version 2.0.0
		 */
		function alg_get_table_html( $data, $args = array() ) {
			$defaults = array(
				'table_class'        => '',
				'table_style'        => '',
				'table_heading_type' => 'horizontal',
				'columns_classes'    => array(),
				'columns_styles'     => array(),
			);
			$args = array_merge( $defaults, $args );
			extract( $args );
			$table_class = ( '' == $table_class ) ? '' : ' class="' . $table_class . '"';
			$table_style = ( '' == $table_style ) ? '' : ' style="' . $table_style . '"';
			$html = '';
			$html .= '<table' . $table_class . $table_style . '>';
			$html .= '<tbody>';
			foreach( $data as $row_number => $row ) {
				$html .= '<tr>';
				foreach( $row as $column_number => $value ) {
					$th_or_td = ( ( 0 === $row_number && 'horizontal' === $table_heading_type ) || ( 0 === $column_number && 'vertical' === $table_heading_type ) ) ? 'th' : 'td';
					$column_class = ( ! empty( $columns_classes ) && isset( $columns_classes[ $column_number ] ) ) ? ' class="' . $columns_classes[ $column_number ] . '"' : '';
					$column_style = ( ! empty( $columns_styles ) && isset( $columns_styles[ $column_number ] ) ) ? ' style="' . $columns_styles[ $column_number ] . '"' : '';

					$html .= '<' . $th_or_td . $column_class . $column_style . '>';
					$html .= $value;
					$html .= '</' . $th_or_td . '>';
				}
				$html .= '</tr>';
			}
			$html .= '</tbody>';
			$html .= '</table>';
			return $html;
		}

		/*
		 * manage_old_slugs.
		 *
		 * @since   2.0.0
		 * @version 2.0.0
		 */
		function manage_old_slugs() {
			$html = '';
			$html .= '<p>';
			global $wpdb;
			$wp_postmeta_table = $wpdb->prefix . 'postmeta';
			$db_results = $wpdb->get_results( "SELECT * FROM $wp_postmeta_table WHERE meta_key = '_wp_old_slug' ORDER BY post_id" );
			$num_old_slugs = count( $db_results );
			if ( $num_old_slugs > 0 ) {
				// Old slugs found
				if ( isset( $_POST['alg_remove_old_slugs'] ) ) {
					// Remove old slugs
					$wpdb->get_results( "DELETE FROM $wp_postmeta_table WHERE meta_key = '_wp_old_slug'" );
					$db_results = $wpdb->get_results( "SELECT * FROM $wp_postmeta_table WHERE meta_key = '_wp_old_slug'" );
					$num_old_slugs_after_delete = count( $db_results );
					$html .= '<p>';
					$html .= '<strong>';
					$html .= sprintf(
						__( 'Removing old slugs from database finished! %d old slug(s) deleted.', 'remove-old-slugspermalinks' ),
						( $num_old_slugs - $num_old_slugs_after_delete )
					);
					$html .= '</strong>';
					$html .= '</p>';
				} else {
					// Display old slugs
					$table_data = array();
					$table_data[] = array(
						'#',
						__( 'Old Slug', 'remove-old-slugspermalinks' ),
						__( 'Post ID', 'remove-old-slugspermalinks' ),
						__( 'Post Title', 'remove-old-slugspermalinks' ),
						__( 'Post Type', 'remove-old-slugspermalinks' ),
						__( 'Current Slug', 'remove-old-slugspermalinks' ),
					);
					$i = 0;
					foreach ( $db_results as $db_result ) {
						$i++;
						$post_type    = get_post_type( $db_result->post_id );
						$post_title   = get_the_title( $db_result->post_id );
						$current_slug = get_post( $db_result->post_id );
						$current_slug = $current_slug->post_name;
						$table_data[] = array(
							$i,
							$db_result->meta_value,
							$db_result->post_id,
							$post_title,
							$post_type,
							$current_slug,
						);
					}
					$html .= sprintf( __( '<p><strong>%d</strong> old slug(s) found:<p>', '' ), $num_old_slugs );
					$html .= $this->alg_get_table_html( $table_data, array( 'table_class' => 'widefat striped' ) );
					$html .= '<p>';
					$html .= '<form method="post" action="">';
					$html .= '<input class="button-primary" type="submit" name="alg_remove_old_slugs" value="' . __( 'Remove Old Slugs', 'remove-old-slugspermalinks' ) . '"/>';
					$html .= '</form>';
					$html .= '</p>';
				}

			} else {
				// None old slugs found
				$html .= '<em>' . __( 'No old slugs found in database.', 'remove-old-slugspermalinks' ) . '</em>';
			}
			$html .= '</p>';
			return $html;
		}

		/*
		 * create_admin_page.
		 *
		 * @version 2.0.0
		 */
		function create_admin_page() {
			$html = '';
			$html .= '<div class="wrap">';
			$html .= '<h2>' . __( 'Remove Old Slugs Plugin', 'remove-old-slugspermalinks' ) . '</h2>';
			$html .= '<p>' . __( 'This tool removes old slugs (permalinks) from database.', 'remove-old-slugspermalinks' ) . '</p>';

			// Manage old slugs
			$html .= $this->manage_old_slugs();

			// Refresh link
			$html .= '<p><a href="' . admin_url( 'tools.php?page=alg-remove-old-slugs-settings-admin' ) . '">' . __( 'Refresh page', 'remove-old-slugspermalinks' ) . '</a></p>';

			// Donate link
			$html .= '<div id="setting-error-settings_updated" class="updated settings-error">';
			$html .= '<p>';
			$html .= sprintf(
				__( 'If you like our plugin and find it useful - <a href="%s" target="_blank">please buy us a coffee</a> :)', 'remove-old-slugspermalinks' ),
				'https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=VYVPG96K6ZHE4&lc=LT&item_name=Tom%20Anbinder&currency_code=USD&bn=PP%2dDonationsBF%3abtn_donateCC_LG%2egif%3aNonHosted'
			);
			$html .= '</p>';
			$html .= '</div>';

			$html .= '</div>';

			echo $html;
		}
	}
}

$Alg_Remove_Old_Slugs = new Alg_Remove_Old_Slugs();
