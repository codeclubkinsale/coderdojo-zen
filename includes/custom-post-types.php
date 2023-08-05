<?php
/**
 * Add aditional post types
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CoderDojo
 * @subpackage CoderDojo Zen
 * @since 1.0.0
 */

function cdzen_register_custom_post_types() {

    /**  
	 * Post Type: Belts.
	 */

	$labels = [
		"name" => __( "Belts", "coderdojo" ),
		"singular_name" => __( "Belt", "coderdojo" ),
		"menu_name" => __( "All Belts", "coderdojo" ),
		"all_items" => __( "Belts", "coderdojo" ),
		"add_new" => __( "Add new", "coderdojo" ),
		"add_new_item" => __( "Add new Belt", "coderdojo" ),
		"edit_item" => __( "Edit Belt", "coderdojo" ),
		"new_item" => __( "New Belt", "coderdojo" ),
		"view_item" => __( "View Belt", "coderdojo" ),
		"view_items" => __( "View Belts", "coderdojo" ),
		"search_items" => __( "Search Belts", "coderdojo" ),
		"not_found" => __( "No Belts found", "coderdojo" ),
		"not_found_in_trash" => __( "No Belts found in bin", "coderdojo" ),
		"parent" => __( "Parent Belt:", "coderdojo" ),
		"featured_image" => __( "Featured image for this Belt", "coderdojo" ),
		"set_featured_image" => __( "Set featured image for this Belt", "coderdojo" ),
		"remove_featured_image" => __( "Remove featured image for this Belt", "coderdojo" ),
		"use_featured_image" => __( "Use as featured image for this Belt", "coderdojo" ),
		"archives" => __( "Belt archives", "coderdojo" ),
		"insert_into_item" => __( "Insert into Belt", "coderdojo" ),
		"uploaded_to_this_item" => __( "Upload to this Belt", "coderdojo" ),
		"filter_items_list" => __( "Filter Belts list", "coderdojo" ),
		"items_list_navigation" => __( "Belts list navigation", "coderdojo" ),
		"items_list" => __( "Belts list", "coderdojo" ),
		"attributes" => __( "Belts attributes", "coderdojo" ),
		"name_admin_bar" => __( "Belt", "coderdojo" ),
		"item_published" => __( "Belt published", "coderdojo" ),
		"item_published_privately" => __( "Belt published privately.", "coderdojo" ),
		"item_reverted_to_draft" => __( "Belt reverted to draft.", "coderdojo" ),
		"item_scheduled" => __( "Belt scheduled", "coderdojo" ),
		"item_updated" => __( "Belt updated.", "coderdojo" ),
		"parent_item_colon" => __( "Parent Belt:", "coderdojo" ),
	];

	$args = [
		"label" => __( "Belts", "coderdojo" ),
		"labels" => $labels,
		"description" => "",
		"public" => false,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => false,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		'capability_type' => array('award','awards'), //custom capability type
        'map_meta_cap'    => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "belts", "with_front" => true ],
		"query_var" => true,
		"supports" => [ "title", "editor", "thumbnail", "page-attributes" ],
	];

	register_post_type( "belt", $args );

    /**
	 * Post Type: Badges.
	 */

	$labels = [
		"name" => __( "Badges", "coderdojo" ),
		"singular_name" => __( "Badge", "coderdojo" ),
		"menu_name" => __( "Awards", "coderdojo" ),
		"all_items" => __( "All Badges", "coderdojo" ),
		"add_new" => __( "Add new", "coderdojo" ),
		"add_new_item" => __( "Add new Badge", "coderdojo" ),
		"edit_item" => __( "Edit Badge", "coderdojo" ),
		"new_item" => __( "New Badge", "coderdojo" ),
		"view_item" => __( "View Badge", "coderdojo" ),
		"view_items" => __( "View Badges", "coderdojo" ),
		"search_items" => __( "Search Badges", "coderdojo" ),
		"not_found" => __( "No Badges found", "coderdojo" ),
		"not_found_in_trash" => __( "No Badges found in bin", "coderdojo" ),
		"parent" => __( "Parent Badge:", "coderdojo" ),
		"featured_image" => __( "Featured image for this Badge", "coderdojo" ),
		"set_featured_image" => __( "Set featured image for this Badge", "coderdojo" ),
		"remove_featured_image" => __( "Remove featured image for this Badge", "coderdojo" ),
		"use_featured_image" => __( "Use as featured image for this Badge", "coderdojo" ),
		"archives" => __( "Programming Badge archives", "coderdojo" ),
		"insert_into_item" => __( "Insert into Badge", "coderdojo" ),
		"uploaded_to_this_item" => __( "Upload to this Badge", "coderdojo" ),
		"filter_items_list" => __( "Filter Badges list", "coderdojo" ),
		"items_list_navigation" => __( "Programming Badges list navigation", "coderdojo" ),
		"items_list" => __( "Programming Badges list", "coderdojo" ),
		"attributes" => __( "Programming Badges attributes", "coderdojo" ),
		"name_admin_bar" => __( "Programming Badge", "coderdojo" ),
		"item_published" => __( "Programming Badge published", "coderdojo" ),
		"item_published_privately" => __( "Programming Badge published privately.", "coderdojo" ),
		"item_reverted_to_draft" => __( "Programming Badge reverted to draft.", "coderdojo" ),
		"item_scheduled" => __( "Programming Badge scheduled", "coderdojo" ),
		"item_updated" => __( "Programming Badge updated.", "coderdojo" ),
		"parent_item_colon" => __( "Parent Badge:", "coderdojo" ),
	];

	$args = [
		"label" => __( "Badges", "coderdojo" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		'capability_type' => 'post', //custom capability type
        'map_meta_cap'    => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "programming", "with_front" => true ],
		"query_var" => true,
		"menu_position" => 22,
		"menu_icon" => "dashicons-awards",
		"supports" => [ "title", "editor", "thumbnail" ],
	];

	register_post_type( "badge", $args );

	$labels = [
		"name" => __( "Events", "coderdojo" ),
		"singular_name" => __( "Event", "coderdojo" ),
		"menu_name" => __( "All Events", "coderdojo" ),
		"all_items" => __( "Events", "coderdojo" ),
		"add_new" => __( "Add new", "coderdojo" ),
		"add_new_item" => __( "Add new Event", "coderdojo" ),
		"edit_item" => __( "Edit Event", "coderdojo" ),
		"new_item" => __( "New Event", "coderdojo" ),
		"view_item" => __( "View Event", "coderdojo" ),
		"view_items" => __( "View Events", "coderdojo" ),
		"search_items" => __( "Search Events", "coderdojo" ),
		"not_found" => __( "No Events found", "coderdojo" ),
		"not_found_in_trash" => __( "No Events found in bin", "coderdojo" ),
		"parent" => __( "Parent Event:", "coderdojo" ),
		"featured_image" => __( "Featured image for this Event", "coderdojo" ),
		"set_featured_image" => __( "Set featured image for this Event", "coderdojo" ),
		"remove_featured_image" => __( "Remove featured image for this Event", "coderdojo" ),
		"use_featured_image" => __( "Use as featured image for this Event", "coderdojo" ),
		"archives" => __( "Event archives", "coderdojo" ),
		"insert_into_item" => __( "Insert into Event", "coderdojo" ),
		"uploaded_to_this_item" => __( "Upload to this Event", "coderdojo" ),
		"filter_items_list" => __( "Filter Events list", "coderdojo" ),
		"items_list_navigation" => __( "Events list navigation", "coderdojo" ),
		"items_list" => __( "Events list", "coderdojo" ),
		"attributes" => __( "Events attributes", "coderdojo" ),
		"name_admin_bar" => __( "Event", "coderdojo" ),
		"item_published" => __( "Event published", "coderdojo" ),
		"item_published_privately" => __( "Event published privately.", "coderdojo" ),
		"item_reverted_to_draft" => __( "Event reverted to draft.", "coderdojo" ),
		"item_scheduled" => __( "Event scheduled", "coderdojo" ),
		"item_updated" => __( "Event updated.", "coderdojo" ),
		"parent_item_colon" => __( "Parent Event:", "coderdojo" ),
	];

	$args = [
		"label" => esc_html__( "Events", "coderdojo" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"rest_namespace" => "wp/v2",
		"has_archive" => "dashboard/my-dojos/events",
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"can_export" => false,
		"rewrite" => [ "slug" => "/dashboard/my-dojos/events", "with_front" => true ],
		"query_var" => true,
		"supports" => [ "title", "editor", "thumbnail" ],
		"show_in_graphql" => false,
	];

	register_post_type( "events", $args );

	$labels = [
		"name" => __( "Tickets", "coderdojo" ),
		"singular_name" => __( "Ticket", "coderdojo" ),
		"menu_name" => __( "All Tickets", "coderdojo" ),
		"all_items" => __( "Tickets", "coderdojo" ),
		"add_new" => __( "Add new", "coderdojo" ),
		"add_new_item" => __( "Add new Ticket", "coderdojo" ),
		"edit_item" => __( "Edit Ticket", "coderdojo" ),
		"new_item" => __( "New Ticket", "coderdojo" ),
		"view_item" => __( "View Ticket", "coderdojo" ),
		"view_items" => __( "View Tickets", "coderdojo" ),
		"search_items" => __( "Search Tickets", "coderdojo" ),
		"not_found" => __( "No Tickets found", "coderdojo" ),
		"not_found_in_trash" => __( "No Tickets found in bin", "coderdojo" ),
		"parent" => __( "Parent Ticket:", "coderdojo" ),
		"featured_image" => __( "Featured image for this Ticket", "coderdojo" ),
		"set_featured_image" => __( "Set featured image for this Ticket", "coderdojo" ),
		"remove_featured_image" => __( "Remove featured image for this Ticket", "coderdojo" ),
		"use_featured_image" => __( "Use as featured image for this Ticket", "coderdojo" ),
		"archives" => __( "Ticket archives", "coderdojo" ),
		"insert_into_item" => __( "Insert into Ticket", "coderdojo" ),
		"uploaded_to_this_item" => __( "Upload to this Ticket", "coderdojo" ),
		"filter_items_list" => __( "Filter Tickets list", "coderdojo" ),
		"items_list_navigation" => __( "Tickets list navigation", "coderdojo" ),
		"items_list" => __( "Tickets list", "coderdojo" ),
		"attributes" => __( "Tickets attributes", "coderdojo" ),
		"name_admin_bar" => __( "Ticket", "coderdojo" ),
		"item_published" => __( "Ticket published", "coderdojo" ),
		"item_published_privately" => __( "Ticket published privately.", "coderdojo" ),
		"item_reverted_to_draft" => __( "Ticket reverted to draft.", "coderdojo" ),
		"item_scheduled" => __( "Ticket scheduled", "coderdojo" ),
		"item_updated" => __( "Ticket updated.", "coderdojo" ),
		"parent_item_colon" => __( "Parent Ticket:", "coderdojo" ),
	];

	$args = [
		"label" => esc_html__( "Tickets", "coderdojo" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"rest_namespace" => "wp/v2",
		"has_archive" => "dashboard/tickets",
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"can_export" => false,
		"rewrite" => [ "slug" => "/dashboard/tickets", "with_front" => true ],
		"query_var" => true,
		"supports" => [ "title", "editor", "page-attributes" ],
		"show_in_graphql" => false,
	];

	register_post_type( "ticket", $args );

}

add_action( 'init', 'cdzen_register_custom_post_types' );


