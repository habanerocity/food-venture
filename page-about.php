<?php get_header(); ?>
    <?php include 'custom-header.php'?>
        <div class="overlay hidden"></div>
            <div id="content" class="site-content">
                <div id="primary" class="content-area">
                    <div id="main" class="site-main">
                        <div class="container">
                            <div class="general-template">
                                <?php 
                                    if( have_posts() ):
                                        while( have_posts() ) : the_post();
                                        ?>
                                            <article>
                                                <h1><?php the_title(); ?></h1>
                                                <?php the_content(); ?>
                                            </article>
                                        <?php
                                        endwhile;
                                    else: ?>
                                        <p>No posts to be displayed!</p>
                                <?php endif; ?>
                         </div>
                    </div>
                </div>
            </div>
        </div>
<?php get_footer(); ?>