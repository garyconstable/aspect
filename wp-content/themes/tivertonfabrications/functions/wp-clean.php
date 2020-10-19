<?php

/* Remove Ugly WP data
==================================================================================================================================*/

remove_filter('term_description', 'wpautop');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_shortlink_wp_head');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');

function disable_embeds_init(){
    // Remove the REST API endpoint.
    remove_action('rest_api_init', 'wp_oembed_register_route');
    // Turn off oEmbed auto discovery.
    // Don't filter oEmbed results.
    remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10);
    // Remove oEmbed discovery links.
    remove_action('wp_head', 'wp_oembed_add_discovery_links');
    // Remove oEmbed-specific JavaScript from the front-end and back-end.
    remove_action('wp_head', 'wp_oembed_add_host_js');
}

add_action('init', 'disable_embeds_init', 9999);


/* Remove Gutenberg block styles
==================================================================================================================================*/

function my_custom_scripts() {
    wp_dequeue_style( 'wp-block-library' );
}

add_action( 'wp_enqueue_scripts', 'my_custom_scripts' );


/* Remove the recent comments
==================================================================================================================================*/

function remove_comments(){

    add_action('admin_menu', 'remove_admin_menus');

    function remove_admin_menus(){
        remove_menu_page('edit-comments.php');
    }

    add_action('init', 'remove_comment_support', 100);

    function remove_comment_support()
    {
        remove_post_type_support('post', 'comments');
        remove_post_type_support('page', 'comments');
    }

    function ami_admin_bar_render(){

        global $wp_admin_bar;
        $wp_admin_bar->remove_menu('comments');
    }

    add_action('wp_before_admin_bar_render', 'ami_admin_bar_render');
}