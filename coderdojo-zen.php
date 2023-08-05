<?php

/**
 * Plugin Name: CoderDojo Zen
 * Plugin URI:
 * Description: Display belts and badges on your site
 * Version: 0.9.0
 * Author: Anthony Nolan
 * Author URI: 
 * License: GPL version 2 or later - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * Requires at least: 5.7
 * Tested up to: 5.7
 * Requires PHP: 7.0
 * Text Domain: cdzen
 * Domain path: /languages/
 */

/**
 * Copyright 2013-2020 Automattic
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License, version 2, as
 * published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/** Custom Fuctions */
require_once dirname( __FILE__ ) . '/includes/custom-functions.php';

/** Custom Admin Menu */
require_once dirname( __FILE__ ) . '/includes/custom-menu-pages.php';

/** Custom Post Types */
require_once dirname( __FILE__ ) . '/includes/custom-post-types.php';

/** Custom Taxonomies */
require_once dirname( __FILE__ ) . '/includes/custom-taxonomies.php';

/** Custom Terms */
require_once dirname( __FILE__ ) . '/includes/custom-terms.php';

/** Custom Meta Boxes */
require_once dirname( __FILE__ ) . '/includes/custom-meta-boxes.php';

/** Custom User Details */
require_once dirname( __FILE__ ) . '/includes/custom-user-details.php';


function cdzen_enqueue_block_editor_assets() {   
    wp_enqueue_script( 'coderdojo_grading_editor__script', plugin_dir_url( __FILE__ ) . 'assets/js/editor-index.js' );
	wp_localize_script( 'coderdojo_grading_editor__script', 'coderdojoajax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
}
add_action('enqueue_block_editor_assets', 'cdzen_enqueue_block_editor_assets');

function cdzen_add_zen_pages() {
	// Create post object
	$profile_post = array(
		'post_title'    => wp_strip_all_tags( 'Profile' ),
		'post_content'  => 'Profile Page',
		'post_status'   => 'publish',
		'post_author'   => 1,
		'post_type'     => 'page',
		'page_template' => 'profile',
	);

	// Insert the post into the database
	wp_insert_post( $profile_post );

	// Create post object
	$dashboard_post = array(
		'post_title'    => wp_strip_all_tags( 'Dashboard' ),
		'post_content'  => '',
		'post_status'   => 'publish',
		'post_author'   => 1,
		'post_type'     => 'page',
	);

	// Insert the post into the database
	wp_insert_post( $dashboard_post );
}
register_activation_hook(__FILE__, 'cdzen_add_zen_pages');

function cdzen_login_redirect( $redirect_to, $request, $user ) {
	//is there a user to check?
	if ( isset( $user->roles ) && is_array( $user->roles ) ) {
		//check for admins
		if ( in_array( 'administrator', $user->roles ) ) {
			// redirect them to the default place
			return $redirect_to;
		} else {
			return home_url('/dashboard');
		}
	} else {
		return $redirect_to;
	}
}

add_filter( 'login_redirect', 'cdzen_login_redirect', 10, 3 );
