<?php get_header(); ?>
<?php get_template_part('parts/content', 'custom-header') ?>
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
                                <img src="<?php echo esc_url($lost_image); ?>" alt="404 Picture" class="lost-pic" />
                                <h3 class="lost-description">It looks like you're lost...</h3>
                                <?php $home_url = get_permalink(get_page_by_title('Home')); ?>
                                <?php if ($home_url) : ?>
                                <a href="<?php echo esc_url($home_url);  ?>">
                                    <button class="btn__rectangular">RETURN HOME</button>
                                </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php get_footer(); ?>