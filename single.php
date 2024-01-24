<?php get_header(); ?>
<?php include 'custom-header.php'?>
    <div class="overlay hidden"></div>
    <div id="primary ">
        <div id="main">
            <div class="container padding-section" style="display: flex;">
                <?php
                while( have_posts()):
                    the_post();
                    ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <header class="meta-info">
                            <div class="meta-info">
                                <?php custom_breadcrumbs(); ?>
                                <p><i class="fas fa-calendar-alt"></i> <?php echo get_the_date(); ?> by <?php the_author_posts_link(); ?></p>
                                <p>Categories: <?php the_category( ' '); ?></p>
                                <p>Tags: <?php the_tags( '', ', '); ?></p>
                            </div>
                        </header>
                        <div class="content">
                            <?php the_content(); ?>
                            <?php echo do_shortcode('[contact-form-7 id="e8ce9fa" title="Newsletter Signup"]'); ?>
                        </div>
                    </article>
                    <?php get_sidebar(); ?>
                    <?php
                endwhile;
                ?>
            </div>
        </div>
    </div>
<?php get_footer(); ?>