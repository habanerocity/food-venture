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
            if(get_post_type() == 'blog_recipes') {
                echo '<a href="'; 
                echo get_post_type_archive_link('blog_recipes'); 
                echo '">Recipes</a></li><li class="separator"> >> </li>'; 
                $terms = get_the_terms( $post->ID, 'recipe_category' );
                if ($terms && ! is_wp_error($terms)) {
                    $term_links_arr = array();
                    foreach ($terms as $term) {
                        $term_link = get_term_link($term);
                        if (!is_wp_error($term_link)) {
                            $term_links_arr[] = '<a href="' . esc_url($term_link) . '">' . $term->name . '</a>';
                        }
                    }
                    echo join(" </li><li class='separator'> >> </li><li> ", $term_links_arr);
                }
            } else {
                the_category(' </li><li class="separator"> >> </li><li> ');
            }
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

//Make 'Blog' Active When Viewing Single Posts
function add_current_nav_class($classes, $item) {
    // Getting the current post details
    global $post;

    // Check if the current page is a single post
    if (is_single() && $item->title == 'Blog') {
        $classes[] = 'current-menu-item';
    }

    // Return the corrected set of classes to be added to the menu item
    return $classes;
}
add_filter('nav_menu_css_class', 'add_current_nav_class', 10, 2 );

//Limit the Number of Blog Posts on Blog section to 9 per page
function limit_posts_per_page( $query ) {
    if ( $query->is_main_query() && !is_admin() && is_home() ) {
        $query->set( 'posts_per_page', 9 );
    }
}
add_action( 'pre_get_posts', 'limit_posts_per_page' );

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

//Add Custom Post Types

add_action('init', 'wp_foodventure_custom_post_types');

function wp_foodventure_custom_post_types(){
    //Register blog recipes post type
    register_post_type('blog_recipes',
        array(
            'labels' => array(
                'name' => 'Blog Recipes',
                'singular_name' => 'Blog Recipe',
                'add_new' => 'Add New Blog Recipe',
                'add_new_item' => 'Add New Blog Recipe',
                'edit_item' => 'Edit Blog Recipe',
                'new_item' => 'New Blog Recipe',
                'view_item' => 'View Blog Recipe',
                'search_items' => 'Search Blog Recipes',
                'not_found' => 'No Blog Recipes Found',
                'not_found_in_trash' => 'No Blog Recipes Found in Trash'
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'blog_recipes'),
            'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'comments'),
            'show_in_rest' => true,
            'taxonomies' => array('recipe_category', 'recipe_tag'),
        )
    );
}

//Add Recipe Post Types to Recipe Page
add_action('pre_get_posts', 'add_my_post_types_to_query');

function add_my_post_types_to_query($query) {
    if (is_category('Recipes') && empty($query->query_vars['suppress_filters'])) {
        $query->set('post_type', 'blog_recipes');
        return $query;
    }
}

//Add categories for Recipe Post Type
function create_recipe_taxonomies() {
    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
        'name'              => _x( 'Recipe Categories', 'taxonomy general name' ),
        'singular_name'     => _x( 'Recipe Category', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Recipe Categories' ),
        'all_items'         => __( 'All Recipe Categories' ),
        'parent_item'       => __( 'Parent Recipe Category' ),
        'parent_item_colon' => __( 'Parent Recipe Category:' ),
        'edit_item'         => __( 'Edit Recipe Category' ),
        'update_item'       => __( 'Update Recipe Category' ),
        'add_new_item'      => __( 'Add New Recipe Category' ),
        'new_item_name'     => __( 'New Recipe Category Name' ),
        'menu_name'         => __( 'Recipe Categories' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_in_menu'      => true,
        'show_admin_column' => true,
        'show_in_rest'      => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'recipe-category' ),
    );

    register_taxonomy( 'recipe_category', array( 'blog_recipes' ), $args );
}

add_action( 'init', 'create_recipe_taxonomies', 0 );

// Add tags for Recipe Post Type
function create_recipe_tags() {
    // Add tags to recipe post type
    $labels = array(
        'name' => _x('Recipe Tags', 'taxonomy general name'),
        'singular_name' => _x('Recipe Tag', 'taxonomy singular name'),
        'search_items' => __('Search Recipe Tags'),
        'popular_items' => __('Popular Recipe Tags'),
        'all_items' => __('All Recipe Tags'),
        'edit_item' => __('Edit Recipe Tag'),
        'update_item' => __('Update Recipe Tag'),
        'add_new_item' => __('Add New Recipe Tag'),
        'new_item_name' => __('New Recipe Tag Name'),
        'separate_items_with_commas' => __('Separate recipe tags with commas'),
        'add_or_remove_items' => __('Add or remove recipe tags'),
        'choose_from_most_used' => __('Choose from the most used recipe tags'),
        'not_found' => __('No recipe tags found.'),
        'menu_name' => __('Recipe Tags'),
    );

    $args = array(
        'hierarchical' => false,
        'labels' => $labels,
        'show_ui' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var' => true,
        'rewrite' => array('slug' => 'recipe-tag'),
    );

    register_taxonomy('recipe_tag', 'blog_recipes', $args);
}

add_action('init', 'create_recipe_tags', 0);