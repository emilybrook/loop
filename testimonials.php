<?php
/*
 * Template Name: Testimonials 
 */

// Add custom body class to the head
add_filter( 'body_class', 'add_body_class' );
function add_body_class( $classes ) {
   $classes[] = 'testimonials';
   return $classes;
}

remove_action('genesis_loop', 'genesis_do_loop');
add_action('genesis_loop', 'custom_loop');
function custom_loop() {

    global $paged;
    $args = array('post_type' => 'testimonials');

    genesis_custom_loop( $args );

}

genesis(); //
