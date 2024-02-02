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
                                <p class="blog__article-date"><i class="fas fa-calendar-alt"></i>&nbsp; <?php echo get_the_date(); ?> by <?php the_author_posts_link(); ?></p>
                                <p class="blog__article-categories"><i class="fas fa-layer-group"></i>&nbsp;Categories: 
                                    <?php
                                        if(get_post_type() == 'blog_recipes'){
                                            echo '&nbsp;' . get_the_term_list( $post->ID, 'recipe_category', '', ', ' );
                                        } else {
                                            the_category(' ');
                                        }
                                    ?>
                                </p>
                                <p class="blog__article-tags"><i class="fas fa-tags"></i>Tags: 
                                <?php 
                                    if(get_post_type() == 'blog_recipes') {
                                        echo '&nbsp;' . get_the_term_list( $post->ID, 'recipe_tag', '', '&nbsp;' ); 
                                    } else {
                                        the_tags( '', ', ' ); 
                                    }
                                ?>
                                </p>
                            </div>
                        </header>
                        <div class="content">
                            <?php the_content(); ?>
                            <?php echo do_shortcode('[contact-form-7 id="e8ce9fa" title="Newsletter Signup"]'); ?>
                        </div>
                        
                    </article>
                    <?php get_sidebar(); ?>
                    
            </div>
            <?php
            $prev_link = get_previous_post_link('%link', 'Previous Post', TRUE);
            $next_link = get_next_post_link('%link', 'Next Post', TRUE);

            if ($prev_link || $next_link) : ?>
                <div class="post-navigation">
                    <div class="container padding-section" style="display: flex; justify-content: space-between;">
                        <div class="prev-post">
                            <?php echo $prev_link; ?>
                        </div>
                        <div class="next-post">
                            <?php echo $next_link; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php
            if (comments_open() || get_comments_number()) {
                echo '<div class="comment__section-container">';
                echo '<div class="container padding-section">';
                comments_template();
                echo '</div>';
                echo '</div>';
            }
            
            ?>
            <?php
                endwhile;
                ?>
        </div>
    </div>
<?php get_footer(); ?>