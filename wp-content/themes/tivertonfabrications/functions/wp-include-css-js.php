<?php

/**  Register Styles & Scripts  */
function global_enqueue_styles() {
    wp_register_style( 'global-site',  get_template_directory_uri() .'/static/app.min.css', array(), null, 'all' );
    wp_enqueue_style( 'global-site' );
}

function global_enqueue_scripts() {
    wp_register_script('global-site', get_template_directory_uri() .'/static/app.js', array( 'jquery' ));
    wp_enqueue_script( 'global-site' );
    wp_enqueue_script("jquery");
}

add_action( 'init', 'global_enqueue_styles'  );
add_action( 'init', 'global_enqueue_scripts' );