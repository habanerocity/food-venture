<?php
// Get the image URL
$image = get_field('recipe_thumbnail-home_page');

// Render the image
if ($image) {
    $heading = get_post_meta(get_the_ID(), 'recipe_thumbnail-heading', true);
    $subheading = get_post_meta(get_the_ID(), 'recipe_thumbnail-subheading', true);

    $image_url = $image['url'];
    $image_alt = $image['alt'];

    echo '<article class="latest__recipes-thumbnail_container">';
    echo '<a href="' . esc_url(get_permalink()) . '">';
    echo '<img class="latest__recipes-thumbnail" alt="' . esc_attr($image_alt) . '" src="' . esc_url($image_url) . '">';
    echo '<div class="latest__recipes-thumbnail_overlay">';
    echo '<header class="latest__recipes-thumbnail_headings">';
    echo '<h4 class="latest__recipes-thumbnail_title">' . esc_html($heading) . '</h4>';
    echo '<h5 class="latest__recipes-thumbnail_subtitle">' . esc_html($subheading) . '</h5>';
    echo '</header>';
    echo '</div>';
    echo '</a>';
    echo '</article>';
}
?>