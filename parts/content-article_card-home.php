<article class="article__card-home">
    <div class="article__card-top_wrapper">
        <div class="featured-thumbnail">
            <a href="<?php echo esc_url(get_permalink(get_the_ID())); ?>">
                <?php the_post_thumbnail('large', ['class' => esc_attr('article__card-img')]); ?>
            </a>
        </div>
        <a href="<?php echo esc_url(get_permalink(get_the_ID())); ?>">
            <h4 class="article__card-home_heading">
                <?php echo esc_html(get_the_title()); ?>
            </h4>
        </a>
        <?php echo esc_html(get_the_excerpt()); ?>
    </div>
    <div class="article__card-home-footer">
        <span class="article__card-home-footer_date"><i class="fas fa-calendar-alt"></i> <?php echo esc_html(get_the_date()); ?></span>
        <span class="article__card-home-footer_link"><a href="<?php echo esc_url(get_permalink(get_the_ID())); ?>">Read More</a></span>
    </div>
</article>