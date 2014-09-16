<?php
add_action( 'wp_enqueue_scripts', 'sqm_js_override' );
function sqm_js_override()
{
    wp_dequeue_script( 'main' );
    wp_enqueue_script( 'sqm_main', get_stylesheet_directory_uri() . '/js/main.js', array( 'jquery' ), '1.0.0', true );
}