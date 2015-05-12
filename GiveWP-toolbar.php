<?php
/**
 * Plugin Name: GiveWP Toolbar
 */

class GiveWP_Admin_Bar {
	//The GiveWP Toolbar Instance
	public static function init() {
		static $instance = false;
		if ( ! $instance ) {
			$instance = new GiveWP_Admin_Bar();
		}
		return $instance;
	}
	public function __construct() {
		add_action('admin_bar_menu', array( $this, 'admin_bar_nodes'), 999);
	}
	/**
	 * The function that creates the menus (nodes) for the admin bar
	 *
	 * @param $wp_admin_bar The WordPress admin bar
	 */
	public function admin_bar_nodes( $wp_admin_bar ) {
		if ( ! is_admin() ) {
			$wp_admin_bar->add_node( array(
					'id'    => 'givewp_toolbar',
					'title' => 'Give',
				)
			);

			if( is_singular('give_forms')) {
				//Code coming here soon!


			}

			$wp_admin_bar->add_node( array(
					'id'     => 'givewp_all_products',
					'title'  => 'All Products',
					'parent' => 'givewp_toolbar',
					'href'   => admin_url( 'edit.php?post_type=give_forms' ),
				)
			);

			$wp_admin_bar->add_node( array(
					'id'     => 'givewp_new_product',
					'title'  => 'New Give Form',
					'parent' => 'givewp_toolbar',
					'href'   => admin_url( 'post-new.php?post_type=give_forms' ),
				)
			);

			$wp_admin_bar->add_node( array(
					'id'     => 'givewp_transactions',
					'title'  => 'Transactions',
					'parent' => 'givewp_toolbar',
					'href'   => admin_url( 'edit.php?post_type=give_forms&page=give-payment-history' ),
				)
			);
			$wp_admin_bar->add_node( array(
					'id'     => 'givewp_settings',
					'title'  => 'Settings',
					'parent' => 'givewp_toolbar',
					'href'   => admin_url( 'edit.php?post_type=give_forms&page=give-settings' ),
				)
			);

		}
	}
}
/**
 * Load the class, and check if the main plugin file exists
 *
 * @since 1.0
 */
function load_GiveWP_Admin_Bar() {
	if( !function_exists( 'is_plugin_active' ) ) {
		include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	}
	//Check if the plugin's main file exists
	if( is_plugin_active( 'Give/give.php' ) ) {
		return GiveWP_Admin_Bar::init();
	}
}
add_action('plugins_loaded', 'load_GiveWP_Admin_Bar');


if ( !empty( $related_ids ) ) {
	if ( 1 < count( $related_ids ) ) {
		update_metadata( $object_type, $id, '_pods_' . $field[ 'name' ], $related_ids );
	}

	foreach ( $related_ids as $related_id ) {
		add_metadata( $object_type, $id, $field[ 'name' ], $related_id );
	}
}
