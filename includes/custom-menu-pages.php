<?php
/**
 * Add aditional admin menu pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CoderDojo
 * @subpackage CoderDojo Zen
 * @since 1.0.0
 */

function cdzen_register_menu_pages() {
    
    global $submenu;

    $belts_link = array(
        __( 'All Belts', 'coderdojo-zen' ),
        'edit_posts',
        'edit.php?post_type=belt'
    );

    $programming_link = array(
        __( 'Programming Badges', 'coderdojo-zen' ),
        'edit_posts',
        'edit.php?post_type=badge&badge_type=programming'
    );

    $social_link = array(
        __( 'Soft Skills Badges', 'coderdojo-zen' ),
        'edit_posts',
        'edit.php?post_type=badge&badge_type=soft-skills'
    );

    $event_link = array(
        __( 'Events Badges', 'coderdojo-zen' ),
        'edit_posts',
        'edit.php?post_type=badge&badge_type=events'
    );

    $submenu['edit.php?post_type=badge']=array(
        0=>$belts_link,
        1=>$programming_link,
        2=>$social_link,
        3=>$event_link,
    ) + $submenu['edit.php?post_type=badge']; 

    unset($submenu['edit.php?post_type=badge'][10]);

}
add_action( 'admin_menu', 'cdzen_register_menu_pages' );

/**
 * Fix Parent Admin Menu Item
 */
function cdzen_parent_file( $parent_file ){
 
    global $current_screen;
    global $submenu_file;

    if ( in_array( $current_screen->base, array( 'post', 'edit' ) ) && 'badge' == $current_screen->post_type && isset( $_REQUEST[ 'badge_type' ])) {

        $badge_type_slug = get_query_var( 'badge_type' );
        $submenu_file = 'edit.php?post_type=badge&badge_type=' . $badge_type_slug;
    }
    return $parent_file;
}
add_filter( 'parent_file', 'cdzen_parent_file' );

function cdzen_badge_type_filter($post_type ){
    
    if( $post_type !== 'badge' || !isset( $_REQUEST[ 'badge_type' ])){
        return;
    }

    $parent_badge_type_term = get_term_by( 
        'slug',
        $_REQUEST[ 'badge_type' ],
        'badge_type'
    );

    if ($parent_badge_type_term->parent != 0) {
        return;
    }
    
    $children_badge_type_terms = get_children_badge_type_terms($parent_badge_type_term->term_id);?>

    <select name="badge_type" id="badge_type">
        <option value="">All Badge Types</option>
            <?php foreach ($children_badge_type_terms as $term) {
                echo '<option value="' . $term->slug . '">' . $term->name . '</option>';
            }?> 
    </select>
    

    <?php
    
}
add_action('restrict_manage_posts','cdzen_badge_type_filter');