<?php
/*
Template Name: General Template
*/
?>
<?php get_header(); ?>
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
                                            <h1><?php echo esc_html(get_the_title()); ?></h1>
                                            <?php echo wp_kses_post(get_the_content()); ?>
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
        
