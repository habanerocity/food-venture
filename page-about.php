<?php get_header(); ?>
<?php get_template_part('parts/content', 'custom-header') ?>
    <div class="overlay hidden"></div>
    <div id="content" class="site-content">
            <div id="primary" class="content-area">
                <div id="main" class="site-main">
                    <?php
                    $about_image = wp_get_attachment_url(get_theme_mod('set_about_image'));
                    ?>
                    <div class="general-template">
                        <div class="container">
                            <div class="padding-section">
                                <h3 class="about-description"><?php echo esc_html(get_theme_mod( 'set_description', 'Hi, we are foodies interesting in exploring the sights and flavors of the world, one bite at a time. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Nec sagittis aliquam malesuada bibendum arcu vitae elementum.' )); ?></h3>
                            </div>
                        </div>
                        <div class="flex_container-row border-top">
                            <div class="container">
                                <div class="our_mission-section padding-section">
                                    <div class="about_us_pic-wrapper">
                                        <img src="<?php echo esc_url($about_image) ?>" alt="Our Picture" class="about-pic" />
                                    </div>
                                    <div class="our_mission-wrapper">
                                        <h2 class="mb-0 mt-0"><?php echo esc_html(get_theme_mod( 'set_our_mission_title', 'Our Mission' )); ?></h2>
                                        <p class="our_mission-description"><?php echo esc_html(get_theme_mod('set_our_mission_description', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sit amet purus gravida quis blandit turpis cursus in. Odio facilisis mauris sit amet massa vitae tortor condimentum lacinia. Pharetra et ultrices neque ornare aenean euismod elementum.')); ?></p>
                                        <div class="btn__wrapper">
                                        <a class="unstyled-link" href="<?php echo esc_url(get_permalink(get_page_by_title('Contact'))); ?>">
                                            <button class="btn__round-transparent margin_right-xl">Contact</button>
                                        </a>
                                        <a class="unstyled-link" href="<?php echo esc_url(get_permalink(get_page_by_title('Blog'))); ?>">
                                            <button class="btn__round-solid">View Blog</button>
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