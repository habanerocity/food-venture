<?php get_header(); ?>
<div class="container">
<?php get_template_part('parts/content', 'navbar') ?>
</div>
<div class="overlay hidden"></div>
    <div id="content" class="site-content">
        <div id="primary" class="content-area">
            <div id="main" class="site-main container">
                <section class="hero__section   padding-section">
                    <?php get_template_part( 'parts/content', 'hero'); ?>
                </section>
                <section class="latest__articles">
                    <div class="latest__articles-wrapper">
                        <div class="latest__articles-heading">
                            <h3 class="section__title">Latest Articles</h3>
                            <hr class="section__title-divider" />
                            <a class="blog__link" href="<?php echo esc_url(get_bloginfo('url') . '/blog');  ?>">See all</a>
                        </div>
                        <div class="flex_container-row">
                            <?php 
                                $args = array( 
                                    'posts_per_page' => 3,
                                    'offset' => 1
                                );
                                $query = new WP_Query( $args);

                                if( $query->have_posts() ):
                                    while( $query->have_posts()) : $query->the_post();
                                        get_template_part( 'parts/content', 'article_card-home');
                                    endwhile;
                                    wp_reset_postdata();
                                else: ?>
                                    <p>No posts to be displayed!</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </section>
                <section class="newsletter__signup padding-section">
                    <?php echo do_shortcode('[contact-form-7 id="e8ce9fa" title="Newsletter Signup"]'); ?>
                </section>
                <section class="latest__recipes">
                    <div class="latest__articles-heading">
                        <h3 class="section__title">Latest Recipes</h3>
                        <hr class="section__title-divider" />
                        <a class="blog__link" href="<?php echo esc_url(get_bloginfo('url') . '/blog_recipes');  ?>">See all</a>
                    </div>
                    <div class="flex_container-row">
                        <?php 
                        $args = array(
                            'post_type' => 'blog_recipes',
                            'posts_per_page' => 4,
                        );
                        $query = new WP_Query($args);
                        if($query->have_posts()) : while ($query->have_posts()) : $query->the_post();

                        get_template_part( 'parts/content', 'latest-recipes');

                        endwhile;
                        endif;
                        
                        // Reset post data
                        wp_reset_postdata();
                        ?>
                    </div>
                </section>
            </div>
        </div>
    </div>
<?php get_footer(); ?>