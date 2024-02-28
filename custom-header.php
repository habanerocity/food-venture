<?php
    // Get the post type
    $post_type = get_post_type();

    // Choose the custom field based on the post type
    $custom_field = $post_type == 'blog_recipes' ? 'recipe-custom_header_pic' : 'blog_article-custom_header_pic';

    // Get the custom background image URL
    $custom_bg_image = get_field($custom_field);
    if (!$custom_bg_image) {
        // If there's no custom background image, use the default header image
        $custom_bg_image = get_header_image();
    }
?>
<div class="custom_header" style="background-image: url('<?php echo esc_url($custom_bg_image); ?>');background-size: cover; background-position: 50%;background-repeat: no-repeat;height: <?php echo get_custom_header()->height; ?>px;width: 100%;">
    <div class="container" style="height:100%;position:relative;">
        <div class="navbar_wrapper secondary_white">
            <?php include 'navbar.php'?>
        </div>
        <div class="header__banner">
        <h1 class="secondary_white banner-text">
            <?php 
            if(is_404()){
                echo '404 - Page Not Found!';
            } elseif(is_category()) {
                single_cat_title();
            } elseif(is_home() || is_front_page()) {
                echo 'All Categories';
            } elseif(is_archive()) {
                if(is_month()) {
                    echo get_the_date('F Y');
                } else {
                    the_archive_title();
                }
            } elseif(is_search()) {
                echo 'Search Results for: ' . get_search_query();
            } else {
                the_title();
            }
            ?>
        </h1>
        </div>
    </div>    
</div>