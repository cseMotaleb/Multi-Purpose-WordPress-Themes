<?php
function corpea_post_type_portfolio(){

    $labels = array(
            'name'                  => _x( 'Portfolios', 'Portfolios', 'corpea' ),
            'singular_name'         => _x( 'Portfolio', 'Portfolio', 'corpea' ),
            'menu_name'             => __( 'Portfolios', 'corpea' ),
            'parent_item_colon'     => __( 'Parent Portfolio:', 'corpea' ),
            'all_items'             => __( 'All Portfolio', 'corpea' ),
            'view_item'             => __( 'View Portfolio', 'corpea' ),
            'add_new_item'          => __( 'Add New Portfolio', 'corpea' ),
            'add_new'               => __( 'New Portfolio', 'corpea' ),
            'edit_item'             => __( 'Edit Portfolio', 'corpea' ),
            'update_item'           => __( 'Update Portfolio', 'corpea' ),
            'search_items'          => __( 'Search Portfolio', 'corpea' ),
            'not_found'             => __( 'No article found', 'corpea' ),
            'not_found_in_trash'    => __( 'No article found in Trash', 'corpea' )
        );

    $args = array(
            'labels'                => $labels,
            'public'                => true,
            'publicly_queryable'    => true,
            'show_in_menu'          => true,
            'show_in_admin_bar'     => true,
            'can_export'            => true,
            'has_archive'           => false,
            'hierarchical'          => false,
            'menu_icon'             => 'dashicons-format-gallery',
            'menu_position'         => null,
            'supports'              => array( 'title','editor','thumbnail','comments')
        );

    register_post_type('portfolio',$args);
}
add_action('init','corpea_post_type_portfolio');



/*--------------------------------------------------------------
 *          View Message When Updated portfolio
 *-------------------------------------------------------------*/
function corpea_update_message_portfolio(){
    global $post, $post_ID;

    $message['portfolio'] = array(
        0   => '',
        1   => sprintf( __('Portfolio updated. <a href="%s">View Portfolio</a>', 'corpea' ), esc_url( get_permalink($post_ID) ) ),
        2   => __('Custom field updated.', 'corpea' ),
        3   => __('Custom field deleted.', 'corpea' ),
        4   => __('Portfolio updated.', 'corpea' ),
        5   => isset($_GET['revision']) ? sprintf( __('Portfolio restored to revision from %s', 'corpea' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
        6   => sprintf( __('Portfolio published. <a href="%s">View Portfolio</a>', 'corpea' ), esc_url( get_permalink($post_ID) ) ),
        7   => __('Portfolio saved.', 'corpea' ),
        8   => sprintf( __('Portfolio submitted. <a target="_blank" href="%s">Preview Portfolio</a>', 'corpea' ), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
        9   => sprintf( __('Portfolio scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Portfolio</a>', 'corpea' ), date_i18n( __( 'M j, Y @ G:i','corpea'), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
        10  => sprintf( __('Portfolio draft updated. <a target="_blank" href="%s">Preview Portfolio</a>', 'corpea' ), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
        );

return $message;
}
add_filter( 'post_updated_messages', 'corpea_update_message_portfolio' );



/*--------------------------------------------------------------
 *          Register Custom Taxonomies
 *-------------------------------------------------------------*/
function corpea_create_portfolio_taxonomy(){
    $labels = array(    'name'              => _x( 'Categories', 'taxonomy general name','corpea'),
                        'singular_name'     => _x( 'Category', 'taxonomy singular name','corpea' ),
                        'search_items'      => __( 'Search Category','corpea'),
                        'all_items'         => __( 'All Category','corpea'),
                        'parent_item'       => __( 'Parent Category','corpea'),
                        'parent_item_colon' => __( 'Parent Category:','corpea'),
                        'edit_item'         => __( 'Edit Category','corpea'),
                        'update_item'       => __( 'Update Category','corpea'),
                        'add_new_item'      => __( 'Add New Category','corpea'),
                        'new_item_name'     => __( 'New Category Name','corpea'),
                        'menu_name'         => __( 'Category','corpea')
        );
    $args = array(  'hierarchical'      => true,
                    'labels'            => $labels,
                    'show_ui'           => true,
                    'show_admin_column' => true,
                    'query_var'         => true,
        );
    register_taxonomy('portfolio-cat',array( 'portfolio' ),$args);
}

add_action('init','corpea_create_portfolio_taxonomy');


/**
 * Register Portfolio Tag Taxonomies
 *
 * @return void
 */


function corpea_register_portfolio_tag_taxonomy(){
    $labels = array(
        'name'                  => _x( 'Portfolio Tags', 'taxonomy general name', 'corpea' ),
        'singular_name'         => _x( 'Portfolio Tag', 'taxonomy singular name', 'corpea' ),
        'search_items'          => __( 'Search Portfolio Tag', 'corpea' ),
        'all_items'             => __( 'All Portfolio Tag', 'corpea' ),
        'parent_item'           => __( 'Portfolio Parent Tag', 'corpea' ),
        'parent_item_colon'     => __( 'Portfolio Parent Tag:', 'corpea' ),
        'edit_item'             => __( 'Edit Portfolio Tag', 'corpea' ),
        'update_item'           => __( 'Update Portfolio Tag', 'corpea' ),
        'add_new_item'          => __( 'Add New Portfolio Tag', 'corpea' ),
        'new_item_name'         => __( 'New Portfolio Tag Name', 'corpea' ),
        'menu_name'             => __( 'Portfolio Tag', 'corpea' )
    );

    $args = array(
        'hierarchical'          => false,
        'labels'                => $labels,
        'show_in_nav_menus'     => true,
        'show_ui'               => true,
        'show_admin_column'     => true,
        'query_var'             => true
    );
    register_taxonomy( 'portfolio-tag', array( 'portfolio' ), $args );
}
add_action('init','corpea_register_portfolio_tag_taxonomy');











