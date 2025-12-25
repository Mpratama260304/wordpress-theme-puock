<?php

function pk_ext_moments_init()
{
    $name = __("Moments", PUOCK);
    $labels = array(
        'name' => $name,
        'singular_name' => $name,
        'add_new' => __('Add', PUOCK) . ' ' . $name,
        'add_new_item' => __('Add', PUOCK) . ' ' . $name,
        'edit_item' => __('Edit', PUOCK) . ' ' . $name,
        'new_item' => __('New', PUOCK) . ' ' . $name,
        'view_item' => __('View', PUOCK) . ' ' . $name,
        'search_items' => __('Search', PUOCK) . ' ' . $name,
        'not_found' => __('No', PUOCK) . ' ' . $name,
        'not_found_in_trash' => __('No trashed', PUOCK) . ' ' . $name,
        'parent_item_colon' => '',
        'menu_name' => $name
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'menu_icon'=>'dashicons-format-status',
        'supports' => array(
            'title',
            'editor',
            'author',
            'comments'
        )
    );
    register_post_type('moments', $args);
}
add_action('init', 'pk_ext_moments_init');

function pk_ext_moments_rewrites_init()
{
    add_rewrite_rule(
        'moments/([0-9]+)?.html$',
        'index.php?post_type=moments&p=$matches[1]',
        'top'
    );
}
add_action( 'init', 'pk_ext_moments_rewrites_init' );

function pk_ext_moments_link( $link, $post ){
    if ( $post->post_type == 'moments' ){
        return home_url( 'moments/' . $post->ID .'.html' );
    } else {
        return $link;
    }
}
add_filter('post_type_link', 'pk_ext_moments_link', 1, 2);
