<article class="meta-info">
    <?php custom_breadcrumbs(); ?>
    <footer>
        <p class="blog__article-date"><i class="fas fa-calendar-alt"></i>&nbsp; <?php echo esc_html(get_the_date()); ?> by <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php the_author(); ?></a></p>
        <p class="blog__article-categories"><i class="fas fa-layer-group"></i>&nbsp;Categories:&nbsp; 
            <?php
                if(get_post_type() == 'blog_recipes'){
                    echo '&nbsp;' . wp_kses_post(get_the_term_list( $post->ID, 'recipe_category', '', '' ));
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
                the_tags( '', ' ' ); 
            }
        ?>
        </p>
        <div class="blog__article-share">
            <!-- <button id="printBtn" class="recipe__card-pill black">
                Print
            </button> -->
            <span>Share article:&nbsp; &nbsp; </span>
            <div class="recipe__card-sm_icon">
                <button id="fb">
                <i class="sm fab fa-facebook black"></i>      
                </button>
            </div>
            <div class="recipe__card-sm_icon">
                <button id="whatsApp">
                <i class="sm fab fa-whatsapp black"></i>      
                </button>
            </div>
            <div class="recipe__card-sm_icon">
                <button id="pinterest">
                <i class="sm fab fa-pinterest black"></i>      
                </button>
            </div>
            <div class="recipe__card-sm_icon">
                <a href="mailto:?subject=<?php echo urlencode(get_the_title()); ?>&body=Check out this recipe: <?php echo urlencode(get_permalink()); ?>">
                <i class="sm fas fa-envelope black"></i>
                </a>
            </div>
        </div>
    </footer>
</article>