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
                                    <div class="hero__post-image">
                                        <img src="<?php echo $hero_image['url']; ?>" alt="" />
                                    </div>
                                    <div class="hero__text_content">
                                        <h2 class="hero-title">
                                            <?php echo get_the_title($post_id); ?>
                                        </h2>
                                        <p class="hero-summary">
                                            <?php echo get_the_excerpt($post_id); ?>
                                        </p>
                                    </div>
                                </div>
                                <?php
                                }
                            }
                        wp_reset_query();
                        ?>
                    </section>
                </div>
            </div>
        </div>
<?php get_footer(); ?>
        