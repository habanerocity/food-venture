<?php get_header(); ?>
<?php include 'custom-header.php'?>
    <div class="overlay hidden"></div>
        <div id="content" class="site-content">
            <div id="primary" class="content-area">
                <div id="main" class="site-main">
                    <?php
                    $lost_image = wp_get_attachment_url(get_theme_mod('set_404_image'));
                    ?>
                    <div class="container">
                        <div class="general-template">
                            <div class="404-wrapper padding-section flex-col">
                                <img src="<?php echo $lost_image ?>" alt="404 Picture" class="lost-pic" />
                                <h3 class="lost-description">It looks like you're lost...</h3>
                                <a href="<?php echo get_permalink(get_page_by_title('Home'));  ?>">
                                    <button class="btn-rectangle">RETURN HOME</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php get_footer(); ?>