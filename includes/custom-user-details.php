<?php

function cdg_custom_user_column($columns) {
    $columns['user_belt'] = 'Belt';
    return $columns;
}

add_filter('manage_users_columns', 'cdg_custom_user_column');

//Adds Content To The Custom Added Column
function cdg_custom_user_column_content($value, $column_name, $user_id) {
    $user = get_userdata( $user_id );
    if ( 'user_belt' == $column_name ){ 
        $belt_ID = get_user_meta( $user_id, 'user_belt', true ); 
        if ($belt_ID) {
            $belt = get_post($belt_ID);
            $value = $belt->post_title;
        }
    } 
    return $value;
}
add_filter('manage_users_custom_column',  'cdg_custom_user_column_content', 2, 3);

function user_meta_belts_form(WP_User $user) {
    $belt_ID = get_the_author_meta( 'user_belt', $user->ID );
    $args = array(
        'numberposts'      => -1,
        'orderby' => 'menu_order',
        'order' => 'ASC',
        'post_type'        => 'belts'
    );
    $belts = get_posts( $args );
    ?>

    <h3>Grading</h3>
    <table class="form-table">
        <tr class="user-grading-current-belt-wrap">
            <th>
                <label for="current_belt">Belt</label>
            </th>
            <td>
                <select name="current_belt" id="current_belt">
                    <option value="" >— Select Belt —</option>
                    <?php foreach ($belts as $belt){
                        if ( $belt->ID == $belt_ID ):
                            echo '<option value="' . $belt->ID . '" selected="selected">' . $belt->post_title . '</option>';
                        else :
                            echo '<option value="' . $belt->ID . '">' . $belt->post_title . '</option>';
                        endif;
                    };?>
                </select>
            </td>
	    </tr>
    </table>
<?php
}
add_action('show_user_profile', 'user_meta_belts_form'); // editing your own profile
add_action('edit_user_profile', 'user_meta_belts_form'); // editing another user
//add_action('user_new_form', 'user_meta_locations_form'); // creating a new user




function user_meta_belts_save($userId) {
    if (!current_user_can('edit_user', $userId)) {
        return;
    }
    update_user_meta($userId, 'user_belt', $_REQUEST['current_belt']);
}
add_action('personal_options_update', 'user_meta_belts_save');
add_action('edit_user_profile_update', 'user_meta_belts_save');