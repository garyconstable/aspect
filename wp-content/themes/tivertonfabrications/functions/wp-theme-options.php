<?php

/** Add Menu Support to theme */

add_theme_support( 'menus' );

/** Register Menus */
function register_menus() {
    register_nav_menus(
        array(
            'header-navigation' => __( 'Main Navigation' ),

            'footer-links' => __( 'Footer Links' ),
        )
    );
}

add_action( 'init', 'register_menus' );


/** Enable ACF Options across the whole site */

if( function_exists('acf_add_options_page') ) {

    acf_add_options_page();

}

function amiboilerplate_context( $context ) {

    $context['options'] = get_fields('option');
    return $context;

}

add_filter( 'timber_context', 'amiboilerplate_context'  );


/** Validate forms using ACF form validation (add more code if more fields are added! )*/

add_action( 'init', 'form_validation' );

/**  Form Validation   */
function form_validation(){

    function validate_form() {

        $form_name = af_get_field( 'form_name' );
        $form_email = af_get_field( 'form_email' );
        $form_enquiry = af_get_field( 'form_enquiry' );

        if ( $form_name == '') {
            af_add_error( 'form_name', 'Please enter your name' );
        }

        if ( $form_email == '') {
            af_add_error( 'form_email', 'Please enter your email address' );
        }

        if ( $form_enquiry == '') {
            af_add_error( 'form_enquiry', 'Please provide an enquiry' );
        }
    }

    add_action( 'af/form/validate/key=form_5da5852282c73', 'validate_form' );
}