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
                            <h3><?php echo get_theme_mod( 'set_description', 'Hi, we are foodies interesting in exploring the sights and flavors of the world, one bite at a time. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Nec sagittis aliquam malesuada bibendum arcu vitae elementum.' ); ?></h3>
                        </div>
                        <div class="flex_container-row">
                            <div class="container">
                                <img src="<?php echo $about_image ?>" alt="" style="max-width: 40rem;" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php get_footer(); ?>