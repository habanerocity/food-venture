<?php
$recipe_useful_notes = get_post_meta($post->ID, 'recipe_useful_notes', true);
if( $recipe_useful_notes) :
    $useful_notes_array = explode("\n", $recipe_useful_notes);
?>

<section class="useful__notes-box">
    <div class="userful__notes-content_wrapper">
        <header class="useful__notes-heading_box">
            <h4 class="useful__notes-heading_box_title">useful notes</h4>
        </header>
        <div class="useful__notes-notes">
            <?php if (!empty($useful_notes_array)) : ?>
                <ul>
                    <?php foreach($useful_notes_array as $note) : ?>
                        <li>
                            <?php echo esc_html($note); ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else : ?>
                <p>No useful notes available.</p>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php endif; ?>