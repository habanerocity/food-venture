<?php

function wpfoodventure_load_scripts(){
    wp_enqueue_style( 'wpfoodventure-style', get_stylesheet_uri(), array(), filemtime( get_template_directory() . '/style.css' ), 'all' );
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&family=Source+Sans+3&display=swap', array(), null );
    wp_enqueue_script( 'dropdown', get_template_directory_uri() . '/js/dropdown.js', array(), '1.0', true );
};

add_action( 'wp_enqueue_scripts', 'wpfoodventure_load_scripts' );

register_nav_menus(
    array(
        'wp_foodventure_main_menu' => 'Main Menu',
        'wp_foodventure_footer_menu' => 'Footer Menu'
    )
);