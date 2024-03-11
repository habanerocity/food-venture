<?php
$prev_link = get_previous_post_link('%link', 'Previous Post', TRUE);
$next_link = get_next_post_link('%link', 'Next Post', TRUE);
if ($prev_link || $next_link) : ?>
<div class="non-print-content">
    <nav class="post__navigation">
        <div class="container padding-section post__navigation-child">
            <div class="prev-post">
                <?php echo wp_kses_post($prev_link); ?>
            </div>
            <div class="next-post">
                <?php echo wp_kses_post($next_link); ?>
            </div>
        </div>
    </nav>
</div>
<?php endif; ?>