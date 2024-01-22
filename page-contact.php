<?php get_header(); ?>
<?php include 'custom-header.php'?>
    <div class="overlay hidden"></div>
        <div id="content" class="site-content">
            <div id="primary" class="content-area">
                <div id="main" class="site-main">
                    <?php
                    $contact_image = wp_get_attachment_url(get_theme_mod('set_contact_image'));
                    ?>
                    <div class="container">
                        <div class="contact_form-container contact-row padding-section">
                            <div class="contact-wrapper ">
                                <img class="contact-pic" src="<?php echo $contact_image  ?>" />
                            </div>
                            <div class="contact_form-wrapper">
                                <?php echo do_shortcode('[contact-form-7 id="57e1d9f" title="Contact form"]'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php get_footer(); ?>