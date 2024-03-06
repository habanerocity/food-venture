<?php 
    $args = array( 'numberposts' => '1' );
    $recent_posts = wp_get_recent_posts( $args );
    foreach( $recent_posts as $recent ){
        $post_id = $recent["ID"];
        $hero_image = get_field('hero_image', $post_id);
        if($hero_image){ // Check if the 'hero_image' field exists
        ?>
            <article class="hero__post">
                <section class="hero__post-text_content">
                    <a class="hero__text-link" href="<?php echo esc_url(get_permalink($post_id)); ?>">
                        <h1 class="hero__title">
                            <?php echo esc_html(get_the_title($post_id)); ?>
                        </h1>
                    </a>
                    <p class="hero__summary">
                        <?php echo wp_kses_post(get_the_excerpt($post_id)); ?>
                    </p>
                    <div class="hero-btn_wrapper">
                        <a href="<?php echo esc_url(get_permalink($post_id)); ?>">
                            <button class="btn__round-transparent">Read More</button>
                        </a>
                    </div>
                </section>
                <figure class="hero__post-image_wrapper">
                    <div class="hero__post-image_container">
                        <a href="<?php echo esc_url(get_permalink($post_id)); ?>">
                            <img src="<?php echo esc_url($hero_image['url']); ?>" alt="" />
                        </a>
                    </div>
                </figure>
            </article>
            <?php
            }
        }
    wp_reset_query();
?>