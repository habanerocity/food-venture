<header>
    <nav class="navbar">
        <div class="navbar_nav">
            <div class="logo">
                <?php 
                if(has_custom_logo()){
                    if(is_front_page()){
                        // Display the logo for the homepage
                        echo '<img src="' . esc_url(get_theme_mod('home_logo')) . '" class="home__logo" alt="Home Logo">';
                    } else {
                        // Display the custom logo for other pages
                        the_custom_logo();
                    }
                } else {
                    ?>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="unstyled-link"><span><?php echo esc_html(bloginfo('name')); ?></span></a>
                <?php
                }
                 ?>
            </div>
            <nav class="main-menu" <?php if (is_front_page()) echo 'id="home-main-menu"'; ?>>
                <button class="check-button" aria-label="Navigation Menu">
                    <div <?php if (is_front_page()) echo 'id="home-menu-hamburger"';else echo 'class="hamburger"' ?>>
                        <div class="bar1" id=""></div>
                        <div class="bar2" id=""></div>
                        <div class="bar3" id=""></div>
                    </div>
                </button>
                <div class="wp_nav_wrapper">
                    <img src="<?php echo esc_url('http://www.tastetripping.net/wp-content/uploads/2024/03/image-removebg-preview-2.png') ?>" class="sidemenu_logo hidden" alt="Taste Tripping Logo">
                    <?php wp_nav_menu( array( 'theme_location' => 'wp_foodventure_main_menu' ) ); ?>
                    <aside class="searchbox">
                        <?php get_search_form(); ?>
                    </aside>
                </div>
            </nav>
        </div>
    </nav>
    <section class="menu-area">
        <div class="container">
            
        </div>
    </section>
</header>