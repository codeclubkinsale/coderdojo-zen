<?php

function cdzen_register_taxonomies() {
    /**
	 * Taxonomy: Badge Type.
	 */

	$labels = [
		"name" => __( "Badge Types", "coderdojo-grading" ),
		"singular_name" => __( "Badge Type", "coderdojo-grading" ),
		"menu_name" => __( "Badge Types", "coderdojo-grading" ),
		"all_items" => __( "All Badge Types", "coderdojo-grading" ),
		"edit_item" => __( "Edit Badge Type", "coderdojo-grading" ),
		"view_item" => __( "View Badge Type", "coderdojo-grading" ),
		"update_item" => __( "Update Badge Type name", "coderdojo-grading" ),
		"add_new_item" => __( "Add new Badge Type", "coderdojo-grading" ),
		"new_item_name" => __( "New Badge Type name", "coderdojo-grading" ),
		"parent_item" => __( "Parent Badge Type", "coderdojo-grading" ),
		"parent_item_colon" => __( "Parent Badge Type:", "coderdojo-grading" ),
		"search_items" => __( "Search Badge Types", "coderdojo-grading" ),
		"popular_items" => __( "Popular Badge Types", "coderdojo-grading" ),
		"separate_items_with_commas" => __( "Separate Badge Types with commas", "coderdojo-grading" ),
		"add_or_remove_items" => __( "Add or remove Badge Types", "coderdojo-grading" ),
		"choose_from_most_used" => __( "Choose from the most used Badge Types", "coderdojo-grading" ),
		"not_found" => __( "No Badge Types found", "coderdojo-grading" ),
		"no_terms" => __( "No Badge Types", "coderdojo-grading" ),
		"items_list_navigation" => __( "Programming Badge Types list navigation", "coderdojo-grading" ),
		"items_list" => __( "Programming Badge Types list", "coderdojo-grading" ),
		"back_to_items" => __( "Back to Badge Types", "coderdojo-grading" ),
	];

	$args = [
		"label" => __( "Badge Types", "coderdojo-grading" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => 'edit.php?post_type=belt',
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => false,
		"show_admin_column" => true,
		"show_in_rest" => false,
		"rest_base" => "pbadgetype",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
	];
	register_taxonomy( "badge_type", [ "badge" ], $args );

	$labels = [
		"name" => __( "Ticket Types", "coderdojo-kata" ),
		"singular_name" => __( "Ticket Type", "coderdojo-kata" ),
		"menu_name" => __( "Ticket Types", "coderdojo-kata" ),
		"all_items" => __( "All Ticket Types", "coderdojo-kata" ),
		"edit_item" => __( "Edit Ticket Type", "coderdojo-kata" ),
		"view_item" => __( "View Ticket Type", "coderdojo-kata" ),
		"update_item" => __( "Update Ticket Type name", "coderdojo-kata" ),
		"add_new_item" => __( "Add new Ticket Type", "coderdojo-kata" ),
		"new_item_name" => __( "New Ticket Type name", "coderdojo-kata" ),
		"parent_item" => __( "Parent Ticket Type", "coderdojo-kata" ),
		"parent_item_colon" => __( "Parent Ticket Type:", "coderdojo-kata" ),
		"search_items" => __( "Search Ticket Types", "coderdojo-kata" ),
		"popular_items" => __( "Popular Ticket Types", "coderdojo-kata" ),
		"separate_items_with_commas" => __( "Separate Ticket Types with commas", "coderdojo-kata" ),
		"add_or_remove_items" => __( "Add or remove Ticket Types", "coderdojo-kata" ),
		"choose_from_most_used" => __( "Choose from the most used Ticket Types", "coderdojo-kata" ),
		"not_found" => __( "No Ticket Types found", "coderdojo-kata" ),
		"no_terms" => __( "No Ticket Types", "coderdojo-kata" ),
		"items_list_navigation" => __( "Ticket Types list navigation", "coderdojo-kata" ),
		"items_list" => __( "Ticket Types list", "coderdojo-kata" ),
		"back_to_items" => __( "Back to Ticket Types", "coderdojo-kata" ),
	];


	$args = [
		"label" => __( "Ticket Types", "coderdojo-zen" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => false,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'types', 'with_front' => true, ],
		"show_admin_column" => true,
		"show_in_rest" => false,
		"rest_base" => "types",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => true,
		"sort" => true,
		"show_in_graphql" => false,
	];
	register_taxonomy( "ticket_types", [ "ticket" ], $args );

}

add_action( 'init', 'cdzen_register_taxonomies' );