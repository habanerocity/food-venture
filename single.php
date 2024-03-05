<?php get_header(); ?>
<?php include 'custom-header.php'?>
    <div class="overlay hidden"></div>
    <div id="primary ">
        <div id="main">
            <div class="container padding-section blog__wrapper">
                <?php
                while( have_posts()):
                    the_post();
                    ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <header class="meta-info">
                            <div class="non-print-content">
                                <div class="meta-info">
                                    <?php custom_breadcrumbs(); ?>
                                    <p class="blog__article-date"><i class="fas fa-calendar-alt"></i>&nbsp; <?php echo esc_html(get_the_date()); ?> by <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php the_author(); ?></a></p>
                                    <p class="blog__article-categories"><i class="fas fa-layer-group"></i>&nbsp;Categories:&nbsp; 
                                        <?php
                                            if(get_post_type() == 'blog_recipes'){
                                                echo '&nbsp;' . wp_kses_post(get_the_term_list( $post->ID, 'recipe_category', '', ', ' ));
                                            } else {
                                                the_category(' ');
                                            }
                                        ?>
                                    </p>
                                    <p class="blog__article-tags"><i class="fas fa-tags"></i>Tags:&nbsp; 
                                    <?php 
                                        if(get_post_type() == 'blog_recipes') {
                                            echo '&nbsp;' . wp_kses_post(get_the_term_list( $post->ID, 'recipe_tag', '', '&nbsp;' )); 
                                        } else {
                                            the_tags( '', ', ' ); 
                                        }
                                    ?>
                                    </p>
                                </div>
                            </div>
                        </header>
                        <div class="content">
                        <div class="non-print-content">
                            <?php the_content(); ?>
                        </div>
                            <?php 
                                if(get_post_type() == 'blog_recipes'):
                                    
                                    include 'useful-notes.php';
                                     
                                    include 'recipe-card.php';
                                    
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
            <?php
            $prev_link = get_previous_post_link('%link', 'Previous Post', TRUE);
            $next_link = get_next_post_link('%link', 'Next Post', TRUE);

            if ($prev_link || $next_link) : ?>
            <div class="non-print-content">
                <div class="post__navigation">
                    <div class="container padding-section post__navigation-child">
                        <div class="prev-post">
                            <?php echo wp_kses_post($prev_link); ?>
                        </div>
                        <div class="next-post">
                            <?php echo wp_kses_post($next_link); ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <?php
            if (comments_open() || get_comments_number()) {
                echo '<div class="non-print-content">';
                echo '<div class="comment__section-container">';
                echo '<div class="container padding-section">';
                comments_template();
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
            
            ?>
            <?php
                endwhile;
                ?>
        </div>
    </div>
    <div class="non-print-content">
        <?php get_footer(); ?>
    </div>