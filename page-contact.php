<?php get_header(); ?>
<?php get_template_part('parts/content', 'custom-header') ?>
    <div class="overlay hidden"></div>
    <div id="content" class="site-content">
        <div id="primary" class="content-area">
            <div id="main" class="site-main">
                <?php
                $contact_image = wp_get_attachment_url(get_theme_mod('set_contact_image'));
                ?>
                <div class="container">
                    <div class="contact__form-container contact__row padding-section">
                        <div class="contact__wrapper ">
                            <img class="contact__pic" src="<?php echo esc_url($contact_image)  ?>" />
                        </div>
                        <div class="contact__form-wrapper">
                            <?php echo do_shortcode('[contact-form-7 id="57e1d9f" title="Contact form"]'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php get_footer(); ?>