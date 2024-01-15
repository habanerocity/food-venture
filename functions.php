<?php

function wpfoodventure_load_scripts(){
    wp_enqueue_style( 'wpfoodventure-style', get_stylesheet_uri(), array(), filemtime( get_template_directory() . '/style.css' ), 'all' );
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&family=Source+Sans+3&display=swap', array(), null );
    wp_enqueue_script( 'dropdown', get_template_directory_uri() . '/js/dropdown.js', array(), '1.0', true );
};

add_action( 'wp_enqueue_scripts', 'wpfoodventure_load_scripts' );

function wpfoodventure_config(){
    register_nav_menus(
        array(
            'wp_foodventure_main_menu' => 'Main Menu',
            'wp_foodventure_footer_menu' => 'Footer Menu'
        )
    );

    $args = array(
        'height' => 440,
        'width' => 1920
    );

    add_theme_support( 'custom-header', $args );
    add_theme_support( 'custom-logo', array(
        'height' => 75,
        'width' => 75,
        'flex-height' => true,
        'flex-width' => true
    ) );
}

//upload svg files

function add_file_types_to_uploads($file_types){
    $new_filetypes = array();
    $new_filetypes['svg'] = 'image/svg+xml';
    $file_types = array_merge($file_types, $new_filetypes );
    return $file_types;
    }
    add_filter('upload_mimes', 'add_file_types_to_uploads');

add_action( 'after_setup_theme', 'wpfoodventure_config', 0 );

// Register Sidebars - Footer Columns

add_action('widgets_init', 'wp_foodventure_footer_cols');
function wp_foodventure_footer_cols(){
    register_sidebar(
        array(
            'name' => 'Footer Column 1',
            'id' => 'footer-col-1',
            'description' => 'First column in the footer',
            'before_widget' => '<div class="footer-menu-section">',
            'after_widget' => '</div>',
            'before_title' => '<h4 class="footer-menu-label">',
            'after_title' => '</h4>'
        )
    );
    register_sidebar(
        array(
            'name' => 'Footer Column 2',
            'id' => 'footer-col-2',
            'description' => 'Second column in the footer',
            'before_widget' => '<div class="footer-menu-section">',
            'after_widget' => '</div>',
            'before_title' => '<h4 class="footer-menu-label">',
            'after_title' => '</h4>'
        )
    );
    register_sidebar(
        array(
            'name' => 'Footer Column 3',
            'id' => 'footer-col-3',
            'description' => 'Third column in the footer',
            'before_widget' => '<div class="footer-menu-section">',
            'after_widget' => '</div>',
            'before_title' => '<h4 class="footer-menu-label">',
            'after_title' => '</h4>'
        )
    );
    register_sidebar(
        array(
            'name' => 'Footer Column 4',
            'id' => 'footer-col-4',
            'description' => 'Fourth column in the footer',
            'before_widget' => '<div class="footer-menu-section">',
            'after_widget' => '</div>',
            'before_title' => '<h4 class="footer-menu-label">',
            'after_title' => '</h4>'
        )
    );
}