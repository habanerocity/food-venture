<?php get_header(); ?>
<div class="overlay hidden"></div>
<?php include 'custom-header.php'  ?>
        <div id="content" class="site-content">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <div class="container padding-section blog__container">
                        <div class="blog__articles">
                                <div class="blog__items-grid">
                                    <?php 
                                        if( have_posts() ):
                                            while( have_posts() ) : the_post();
                                            ?>
                                                <?php if('post' == get_post_type() || 'blog_recipes' == get_post_type()): ?>
                                                <article class="article__card-index">
                                                    <div class="featured-thumbnail">
                                                        <?php the_post_thumbnail('medium'); ?>
                                                    </div>
                                                    <div class="article__card-content">
                                                        <div class="article__card-title&excerpt">
                                                            <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                                            <?php the_excerpt(); ?>
                                                        </div>
                                                        <div class="article__card-index-footer">
                                                            <span class="article__card-index-footer_date"><i class="fas fa-calendar-alt"></i> <?php echo esc_html(get_the_date()); ?></span>
                                                            <span class="article__card-index-footer_link"><a href="<?php the_permalink(); ?>">Read More</a></span>
                                                        </div>
                                                    </div>
                                                </article>
                                                <?php endif; ?>
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
        