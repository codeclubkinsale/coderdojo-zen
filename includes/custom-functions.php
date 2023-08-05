<?php 

function get_parent_badge_type_terms() {
    
    return get_terms( 
        array(
            'taxonomy' => 'badge_type',
            'orderby' => 'term_id',
            'order' => 'ASC',
            'parent' => 0,
            'hide_empty' => false
        ) 
    );
}

function get_parent_badge_type_meta($post_ID) {
    
    $badge_type_terms =  wp_get_object_terms( $post_ID, 'badge_type', array('orderby' => 'term_id'));

	$badge_type = NULL;
    if($badge_type_terms) {
        $badge_type = $badge_type_terms[0];
    }
    return $badge_type;
}

function get_children_badge_type_terms($parent_badge_type_ID, $number_of_terms = '') {
    
    return  get_terms( array(
        'taxonomy' => 'badge_type',
        'order' => 'ASC',
        'orderby' => 'term_id',
        'parent' => $parent_badge_type_ID,
        'number' => $number_of_terms,
        'hide_empty' => false
    ) );
}

function get_child_badge_type_meta($post_ID) {
    
    $children_belt_type_terms =  wp_get_object_terms( $post_ID, 'belt_type', array('orderby' => 'term_id'));

	$child_belt_type = array(
		 'name' => ''
	);
    if($children_belt_type_terms) {
        $child_belt_type = $children_belt_type_terms[1];
    }
    return $child_belt_type;
}

function get_badges() {
    
    $args = array(
        'numberposts'	=> -1,
        'post_type'		=> 'badge',
        'tax_query'		=> array(
            array(
                'taxonomy'	=> 'badge-type',
                'field'		=> 'slug',
                'terms'		=> 'programming'
            )
        )
    );

    return get_posts( $args );
}
