<?php get_header(); ?>
<?php include 'custom-header.php'?>
    <div class="overlay hidden"></div>
        <div id="content" class="site-content">
            <div id="primary" class="content-area">
                <div id="main" class="site-main">
                    <?php
                    $about_image = wp_get_attachment_url(get_theme_mod('set_about_image'));
                    ?>
                    <div class="general-template">
                        <div class="container">
                            <h3 class="margin-section"><?php echo get_theme_mod( 'set_description', 'Hi, we are foodies interesting in exploring the sights and flavors of the world, one bite at a time. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Nec sagittis aliquam malesuada bibendum arcu vitae elementum.' ); ?></h3>
                        </div>
                        <div class="flex_container-row border-top">
                            <div class="container">
                                <div class="flex_container-row padding-section">
                                    <div class="about_us_pic-wrapper">
                                        <img src="<?php echo $about_image ?>" alt="Our Picture" class="about-pic" />
                                    </div>
                                    <div class="our_mission-wrapper">
                                        <h2 class="mb-0"><?php echo get_theme_mod( 'set_our_mission_title', 'Our Mission' ); ?></h2>
                                        <p class="our_mission-description"><?php echo get_theme_mod('set_our_mission_description', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sit amet purus gravida quis blandit turpis cursus in. Odio facilisis mauris sit amet massa vitae tortor condimentum lacinia. Pharetra et ultrices neque ornare aenean euismod elementum.') ?></p>
                                        <div class="our_mission-btn_wrapper">
                                        <a class="unstyled-link" href="<?php echo get_permalink(get_page_by_title('Contact')); ?>">
                                            <button class="btn_round-transparent margin_right-xl">Contact</button>
                                        </a>
                                        <a class="unstyled-link" href="<?php echo get_permalink(get_page_by_title('Blog')) ?>">
                                            <button class="btn_round-solid">View Blog</button>
                                        </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php get_footer(); ?>