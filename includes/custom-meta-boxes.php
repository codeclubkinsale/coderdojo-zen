<?php

// Add meta boxes to top level parent only
function cdzen_register_metaboxes( $post_type, $post ) {
    
	if ($post_type != 'badge') {
		return;
	}

	add_meta_box( 
		'badge-metabox',
		'Badge Details',
		'badge_metabox_callback',
		'badge',
		'side',
		'high'
	);
	
}
add_action( 'add_meta_boxes', 'cdzen_register_metaboxes', 10, 2 );

function badge_metabox_callback(){
	
	global $post;
	$children_badge_types;$child_badge_type;
	
	$parent_badge_types = get_parent_badge_type_terms();
	$parent_badge_type = get_parent_badge_type_meta($post->ID);

	if($parent_badge_type != null) {
		$children_badge_types = get_children_badge_type_terms($parent_badge_type->term_id);
		$child_badge_type = get_child_badge_type_meta($post->ID);
	} ?>

	<div class="components-panel__row"> 
		<div class="editor-post-format__content">
			<label for="post-format-selector-0">Badge Group</label>
			<select name="form_parent_badge_type" id="form_parent_badge_type" onChange="badgetypedropdownupdate()">
				<option value="">Select...</option>
				<?php foreach ($parent_badge_types as $term) {
					if($parent_badge_type->name == $term->name){
						echo '<option value="' . $term->slug . '"selected>' . $term->name . '</option>';
					} else {
						echo '<option value="' . $term->slug . '">' . $term->name . '</option>';
					}
				}?>
			</select>
		</div>
	</div>
	<div class="components-panel__row">
		<div class="editor-post-format__content">
			<label for="post-format-selector-0">Badge Type</label>
			<select name="form_child_badge_type" id="form_child_badge_type">
				<option value="">Select...</option>
					<?php foreach ($children_badge_types as $term) {
					if($child_badge_type->name == $term->name){
						echo '<option value="' . $term->slug . '"selected>' . $term->name . '</option>';
					} else {
						echo '<option value="' . $term->slug . '">' . $term->name . '</option>';
					}
				}?> 
			</select>
		</div>
	</div>
 
	<?php
 }
 
function save_badge_custom_metabox( $post_id ) {

	global $post;

	if ( array_key_exists( 'form_parent_badge_type', $_POST) && array_key_exists( 'form_child_badge_type', $_POST) ) {
		$tags = array(
			$_POST['form_parent_badge_type'],
			$_POST['form_child_badge_type']
		);
		wp_set_object_terms( $post_id, $tags, 'badge_type' );
	}

}
add_action( 'save_post', 'save_badge_custom_metabox' );

function _ajax_fetch_badge_type_list_callback() {
 
	$parent_badge_type_slug = $_POST['term_slug'];
	$parent_badge_type = get_term_by( 'slug', $parent_badge_type_slug , 'badge_type');
	$children_badge_type_terms = get_children_badge_type_terms($parent_badge_type->term_id);

	$terms = array();
	foreach($children_badge_type_terms as $badge_type_term) {
		$term = array(
			'slug' => $badge_type_term->slug,
			'term_name' => $badge_type_term->name
		);
		array_push($terms, $term);
	}
	$response = array( 'terms' => $terms );
	echo json_encode($response);
	wp_die();
	
	
}
add_action( 'wp_ajax_nopriv__ajax_fetch_badge_type_list', '_ajax_fetch_badge_type_list_callback' );
add_action('wp_ajax__ajax_fetch_badge_type_list', '_ajax_fetch_badge_type_list_callback');
