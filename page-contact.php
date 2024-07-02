<?php get_header(); ?>
<?php get_template_part('parts/content', 'custom-header') ?>
<div class="overlay hidden"></div>
<main id="content" class="site-content">
    <section id="primary" class="content-area">
        <div id="main" class="site-main">
            <?php
            $contact_image = wp_get_attachment_url(get_theme_mod('set_contact_image'));
            $contact_image_id = attachment_url_to_postid($contact_image);
            $contact_image_alt = get_post_meta($contact_image_id, '_wp_attachment_image_alt', true);
            ?>
            <div class="container">
                <section class="contact__form-container contact__row padding-section">
                    <div class="contact__wrapper ">
                        <img class="contact__pic" alt="<?php echo esc_attr($contact_image_alt) ?>" src="<?php echo esc_url($contact_image)  ?>" />
                    </div>
                    <div class="contact__form-wrapper">
                        <?php the_content(); ?>
                    </div>
                </section>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>