<header>
    <nav class="navbar">
        <div class="navbar_nav">
            <div class="logo">
                <?php 
                if(has_custom_logo()){
                    if(is_front_page()){
                        // Display the logo for the homepage
                        echo '<img src="http://wp-food-venture.local/wp-content/uploads/2024/01/tt.svg" class="home__logo" alt="Home Logo">';
                    } else {
                        // Display the custom logo for other pages
                        the_custom_logo();
                    }
                } else {
                    ?>
                    <a href="<?php echo home_url('/'); ?>" style="text-decoration: none;color: #000;"><span><?php bloginfo('name'); ?></span></a>
                <?php
                }
                 ?>
            </div>
            <nav class="main-menu" <?php if (is_front_page()) echo 'id="home-main-menu"'; ?>>
                <button class="check-button">
                    <div <?php if (is_front_page()) echo 'id="home-menu-icon"';else echo 'class="menu-icon"' ?>>
                        <div class="bar1" id=""></div>
                        <div class="bar2" id=""></div>
                        <div class="bar3" id=""></div>
                    </div>
                </button>
                <div class="wp_nav_wrapper">
                    <img src="http://wp-food-venture.local/wp-content/uploads/2024/01/tt.svg" class="sidemenu_logo hidden">
                    <?php wp_nav_menu( array( 'theme_location' => 'wp_foodventure_main_menu' ) ); ?>
                    <div class="searchbox">
                        <input <?php if (is_front_page()) echo 'id="search__field-home"'; else echo 'id="search__field"' ?> type="search" name="search" placeholder="Search" >
                        <svg id="mag_glass" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 17 17" fill="none">
                            <path d="M16.7613 15.555L13.6097 12.4289C14.833 10.9035 15.4255 8.96744 15.2652 7.0187C15.1049 5.06996 14.204 3.25669 12.7479 1.95175C11.2917 0.646811 9.39092 -0.0506209 7.43633 0.00286362C5.48174 0.0563482 3.62193 0.856684 2.2393 2.2393C0.856684 3.62193 0.0563482 5.48174 0.00286362 7.43633C-0.0506209 9.39092 0.646811 11.2917 1.95175 12.7479C3.25669 14.204 5.06996 15.1049 7.0187 15.2652C8.96744 15.4255 10.9035 14.833 12.4289 13.6097L15.555 16.7358C15.634 16.8154 15.7279 16.8786 15.8315 16.9218C15.935 16.9649 16.046 16.9871 16.1582 16.9871C16.2703 16.9871 16.3813 16.9649 16.4849 16.9218C16.5884 16.8786 16.6823 16.8154 16.7613 16.7358C16.9144 16.5774 17 16.3657 17 16.1454C17 15.9251 16.9144 15.7134 16.7613 15.555ZM7.66321 13.6097C6.48711 13.6097 5.33742 13.2609 4.35953 12.6075C3.38164 11.9541 2.61947 11.0254 2.16939 9.93882C1.71932 8.85225 1.60156 7.65661 1.831 6.50311C2.06045 5.34961 2.6268 4.29005 3.45842 3.45842C4.29005 2.6268 5.34961 2.06045 6.50311 1.831C7.65661 1.60156 8.85225 1.71932 9.93882 2.16939C11.0254 2.61947 11.9541 3.38164 12.6075 4.35953C13.2609 5.33742 13.6097 6.48711 13.6097 7.66321C13.6097 9.24031 12.9832 10.7528 11.868 11.868C10.7528 12.9832 9.24031 13.6097 7.66321 13.6097Z" <?php if (is_front_page()) echo 'fill="#000"'; else echo 'fill="#f5f5f5"' ?>/>
                        </svg>
                    </div>
                </div>
            </nav>
        </div>
    </nav>
    <section class="menu-area">
        <div class="container">
            
        </div>
    </section>
</header>