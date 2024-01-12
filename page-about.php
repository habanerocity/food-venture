<?php get_header(); ?>
    <div class="custom_header" style="background-image: url('<?php header_image();?>');background-size: cover; background-position: 50%;background-repeat: no-repeat;height: <?php echo get_custom_header()->height; ?>px;width: 100%;">
        <div class="container" style="height:100%;position:relative;">
            <div class="navbar_wrapper secondary_white">
                <?php include 'navbar.php'?>
            </div>
            <div style="height:82.5%;width:100%;display:flex;justify-content:center;align-items:center;">
                <h1 class="secondary_white"><?php the_title(); ?></h1>
            </div>
        </div>    
    </div>
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