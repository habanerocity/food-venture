<?php get_header(); ?>
<?php get_template_part('parts/content', 'custom-header') ?>
    <div class="overlay hidden"></div>
    <div id="primary">
        <div id="main">
            <div class="container padding-section blog__wrapper">
                <?php
                while( have_posts()):
                    the_post();
                    ?>
                    <article style="<?php echo !is_active_sidebar('sidebar-blog') ? 'width:100%;' : 'width: 66.6667%;'; ?>" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <header class="meta-info">
                            <div class="non-print-content">
                                <?php get_template_part( 'parts/content', 'meta-info' ); ?>
                            </div>
                        </header>
                        <div class="content">
                        <div class="non-print-content">
                            <?php the_content(); ?>
                        </div>
                            <?php 
                                if(get_post_type() == 'blog_recipes'):
                                    get_template_part( 'parts/content', 'recipe-card' );
                                    get_template_part( 'parts/content', 'useful-notes');
                                endif;
                            ?> 
                        </div>
                        <div class="non-print-content">
                            <div class="newsletter_banner">
                                <?php echo do_shortcode('[contact-form-7 id="e8ce9fa" title="Newsletter Signup"]'); ?>
                            </div>
                        </div>
                    </article>
                    <!-- <div class="non-print-content"> -->
                    <?php get_sidebar(); ?>
                    <!-- </div> -->
            </div>
            <?php get_template_part('parts/content', 'pagination') ?>
            <?php get_template_part('parts/content', 'comments-section') ?>
            <?php
            endwhile;
            ?>
        </div>
    </div>
    <div class="non-print-content">
        <?php get_footer(); ?>
    </div>