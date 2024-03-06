<article class="article__card-index">
    <div class="article__card-top_wrapper">
        <div class="featured-thumbnail">
            <a href="<?php echo esc_url(get_the_permalink()); ?>">
                <img src="<?php echo esc_url(get_the_post_thumbnail_url(null, 'large')); ?>" class="article__card-img" alt="">
            </a>
        </div>
        <a href="<?php echo esc_url(get_the_permalink()); ?>">
            <h4 class="article__card-heading">
                <?php echo esc_html(the_title()); ?>
            </h4>
        </a>
        <?php the_excerpt(); ?>
    </div>
    <div class="article__card-index-footer">
        <span class="article__card-index-footer_date"><i class="fas fa-calendar-alt"></i> <?php echo esc_html(get_the_date()); ?></span>
        <span class="article__card-index-footer_link"><a href="<?php echo esc_url(the_permalink()); ?>">Read More</a></span>
    </div>
</article>