<?php
$recipe_useful_notes = get_post_meta($post->ID, 'recipe_useful_notes', true);
if( $recipe_useful_notes) :
    $useful_notes_array = explode("\n", $recipe_useful_notes);
?>

<div class="useful_notes-box">
    <div class="userful_notes-content_wrapper">
        <div class="useful_notes-heading_box">
            <h4 class="useful_notes-heading_box_title">useful notes</h4>
        </div>
        <div class="useful_notes-notes">
            <ul>
                <?php foreach($useful_notes_array as $note) : ?>
                    <li>
                        <?php echo $note; ?>
                    </li>
                <?php endforeach; ?>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</div>