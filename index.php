<?php get_header(); ?>
<div class="overlay hidden"></div>
<?php get_template_part('parts/content', 'custom-header') ?>
<main id="content" class="site-content">
    <section id="primary" class="content-area">
        <div id="main" class="site-main">
            <div class="container padding-section blog__container">
                <header class="blog__articles">
                    <div class="blog__input_container">
                        <?php get_template_part( 'parts/content', 'select-category'); ?>
                        <?php get_template_part( 'parts/content', 'select-archive'); ?>
                    </div>
                </header>
                <article class="blog__items-grid">
                <?php 
                    $args = array( 
                        'post_type' => array('post', 'food_review'),
                        'posts_per_page' => 3,
                        'offset' => 1,
                        'post_status' => 'publish'
                    );
                    $query = new WP_Query( $args);

                    if( $query->have_posts() ):
                        while( $query->have_posts()) : $query->the_post();
                            get_template_part( 'parts/content', 'article_card-index');
                        endwhile;
                        wp_reset_postdata();
                    else: ?>
                        <p>No posts to be displayed!</p>
                <?php endif; ?>
                </article>
                <div class="container padding-section post__navigation-child">
                    <div class="pages new">
                        <?php previous_posts_link( "<< Newer posts" ) ?>
                    </div>
                    <div class="pages old">
                        <?php next_posts_link( "Older posts >>" ) ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>