<?php get_header(); ?>
<?php include 'custom-header.php'  ?>
        <div id="content" class="site-content">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <div class="container padding-section blog-container">
                        <div class="blog-articles">
                            <div class="blog-input__container">
                                <div id="blog-categories" >
                                    <?php 
                                        // Dropdown of categories
                                        wp_dropdown_categories( array(
                                            'show_option_none' => 'Categories',
                                            'orderby'          => 'name',
                                            'echo'             => 1,
                                            'hierarchical'     => 1,
                                        ) );
                                    ?>
                                </div>
                                <div id="blog-archive" >
                                    <?php 
            
                                        // Dropdown of categories
                                        $archives = wp_get_archives( array(
                                            'type'            => 'monthly',
                                            'format'          => 'option',
                                            'show_post_count' => true,
                                            'echo'            => 0
                                        ) );
            
                                        if($archives) {
                                            echo '<select onchange="document.location.href=this.options[this.selectedIndex].value;" >';
                                            echo '<option value="">Select Month</option>';
                                            echo $archives;
                                            echo '</select>';
                                        }
                                    ?>
                                </div>
                            </div>
                                <div class="blog-items">
                                    <?php 
                                        if( have_posts() ):
                                            while( have_posts() ) : the_post();
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
                                        else: ?>
                                            <p>No posts to be displayed!</p>
                                    <?php endif; ?>
                                </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
<?php get_footer(); ?>
        