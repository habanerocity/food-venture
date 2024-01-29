<?php

require get_template_directory() . '/inc/customizer.php';

function wpfoodventure_load_scripts(){
    wp_enqueue_style( 'wpfoodventure-style', get_stylesheet_uri(), array(), filemtime( get_template_directory() . '/style.css' ), 'all' );
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&family=Source+Sans+3&display=swap', array(), null );
    wp_enqueue_script('font-awesome', 'https://kit.fontawesome.com/9497c4ca6a.js');
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

    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
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

// Register Breadcrumbs
function custom_breadcrumbs() {
    global $post;
    echo '<ul id="breadcrumbs">';
    if (!is_home()) {
        echo '<li><a href="';
        echo get_option('home');
        echo '">';
        echo 'Home';
        echo '</a></li><li class="separator"> >> </li>';
        if (is_category() || is_single()) {
            if (is_single()) {
                echo '<li><a href="';
                echo get_permalink( get_option( 'page_for_posts' ) );
                echo '">';
                echo 'Blog';
                echo '</a></li><li class="separator"> >> </li>';
            }
            echo '<li>';
            the_category(' </li><li class="separator"> >> </li><li> ');
            if (is_single()) {
                echo '</li><li class="separator"> >> </li><li>';
                the_title();
                echo '</li>';
            }
        } elseif (is_page()) {
            if($post->post_parent){
                $anc = get_post_ancestors( $post->ID );
                $title = get_the_title();
                foreach ( $anc as $ancestor ) {
                    $output = '<li><a href="'.get_permalink($ancestor).'" title="'.get_the_title($ancestor).'">'.get_the_title($ancestor).'</a></li> <li class="separator"> >> </li>';
                }
                echo $output;
                echo '<strong title="'.$title.'"> '.$title.'</strong>';
            } else {
                echo '<li><strong> '.get_the_title().'</strong></li>';
            }
        }
    }
    elseif (is_tag()) {single_tag_title();}
    elseif (is_day()) {echo"<li>Archive for "; the_time('F jS, Y'); echo'</li>';}
    elseif (is_month()) {echo"<li>Archive for "; the_time('F, Y'); echo'</li>';}
    elseif (is_year()) {echo"<li>Archive for "; the_time('Y'); echo'</li>';}
    elseif (is_author()) {echo"<li>Author Archive"; echo'</li>';}
    elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "<li>Blog Archives"; echo'</li>';}
    elseif (is_search()) {echo"<li>Search Results"; echo'</li>';}
    echo '</ul>';
}

// Custom Excerpt Length
function custom_excerpt_length( $length ) {
    return 30; 
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

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

// Register Sidebars - Blog Article Sidebar
add_action('widgets_init', 'wp_foodventure_blog_sidebar');

function wp_foodventure_blog_sidebar(){
    register_sidebar(
        array(
            'name' => 'Blog Sidebar',
            'id' => 'sidebar-blog',
            'description' => 'Sidebar for blog articles',
            'before_widget' => '<div class="blog-sidebar-section">',
            'after_widget' => '</div>',
            'before_title' => '<h4 class="blog-sidebar-label">',
            'after_title' => '</h4>'
        )
    );
}