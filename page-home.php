<?php get_header(); ?>
<div class="container">
    <?php include 'navbar.php'?>
</div>
<div class="overlay hidden"></div>
        <div id="content" class="site-content">
            <div id="primary" class="content-area">
                <div id="main" class="site-main container">
                    <section class="hero-section   padding-section">
                        <?php 
                        $args = array( 'numberposts' => '1' );
                        $recent_posts = wp_get_recent_posts( $args );
                        foreach( $recent_posts as $recent ){
                            $post_id = $recent["ID"];
                            $hero_image = get_field('hero_image', $post_id);
                            if($hero_image){ // Check if the 'hero_image' field exists
                            ?>
                                <div class="hero-post">
                                    <div class="hero__text_content">
                                        <a class="hero__text-link" href="<?php echo get_permalink($post_id); ?>">
                                            <h1 class="hero-title">
                                                <?php echo get_the_title($post_id); ?>
                                            </h1>
                                        </a>
                                        <p class="hero-summary">
                                            <?php echo get_the_excerpt($post_id); ?>
                                        </p>
                                        <div class="hero-btn_wrapper">
                                            <a href="<?php echo get_permalink($post_id); ?>"><button class="btn_round-transparent">Read More</button></a>
                                        </div>
                                    </div>
                                    <div class="hero__post-image_wrapper">
                                        <div class="image-container">
                                            <a href="<?php echo get_permalink($post_id); ?>">
                                                <img src="<?php echo $hero_image['url']; ?>" alt="" />
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                }
                            }
                        wp_reset_query();
                        ?>
                    </section>
                    <section class="latest__articles">
                        <div class="latest__articles-wrapper">
                            <div class="latest__articles-heading">
                                <h3 class="section__title">Latest Articles</h3>
                                <hr class="section__title-divider" />
                                <a class="see_blog-link" href="<?php echo get_bloginfo('url') . '/blog';  ?>">See all</a>
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
                                        ?>
                                            <article class="article__card">
                                                <div class="featured-thumbnail">
                                                    <?php the_post_thumbnail('medium'); ?>
                                                </div>
                                                <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                                <?php the_excerpt(); ?>
                                                <div class="article__card-footer">
                                                    <span class="article__card-footer_date"><i class="fas fa-calendar-alt"></i> <?php echo get_the_date(); ?></span>
                                                    <span class="article__card-footer_link"><a href="<?php the_permalink(); ?>">Read More</a></span>
                                                </div>
                                            </article>
                                        <?php
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
                            <a class="see_blog-link" href="<?php echo get_bloginfo('url') . '/blog_recipes';  ?>">See all</a>
                        </div>
                        <div class="flex_container-row">
                            <?php 
                            $args = array(
                                'post_type' => 'blog_recipes',
                                'posts_per_page' => 4,
                            );
                            $query = new WP_Query($args);

                            if($query->have_posts()) : while ($query->have_posts()) : $query->the_post();

                                // Get the image URL
                                $image_url = get_field('recipe_thumbnail-home_page');

                                // Render the image
                                if (!empty($image_url)) {
                                    echo '<div class="latest__recipes-thumbnail_container">';
                                    echo '<a href="' . get_permalink() . '">';
                                    echo '<img class="latest__recipes-thumbnail" src="' . esc_url($image_url) . '">';
                                
                                    echo '<div class="latest__recipes-thumbnail_overlay">';
                                    $heading = get_post_meta(get_the_ID(), 'recipe_thumbnail-heading', true);
                                    $subheading = get_post_meta(get_the_ID(), 'recipe_thumbnail-subheading', true);
                                    echo '<div class="latest__recipes-thumbnail_headings">';
                                    echo '<h4 class="latest__recipes-thumbnail_title">' . esc_html($heading) . '</h4>';
                                    echo '<h5 class="latest__recipes-thumbnail_subtitle">' . esc_html($subheading) . '</h5>';
                                    echo '</div>';
                                    echo '</div>';
                                    echo '</a>';
                                    echo '</div>';
                                }

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
        