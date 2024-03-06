<?php
if (comments_open() || get_comments_number()) {
    echo '<div class="non-print-content">';
    echo '<div class="comment__section-container">';
    echo '<div class="container padding-section">';
    comments_template();
    echo '</div>';
    echo '</div>';
    echo '</div>';
}
?>