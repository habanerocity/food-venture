<?php
$prep_time = get_post_meta($post->ID, 'recipe_card-prep_time', true);
$cooking_time = get_post_meta($post->ID, 'recipe_card-cooking_time', true);
$recipe_category = get_post_meta($post->ID, 'recipe_card-category', true);
$recipe_origin = get_post_meta($post->ID, 'recipe_card-origin', true);
$recipe_servings = get_post_meta($post->ID, 'recipe_card-servings', true);
$recipe_intro = get_post_meta($post->ID, 'recipe_card-intro', true);
$recipe_ingredients = get_post_meta($post->ID, 'recipe_card-ingredients', true);
$recipe_steps = get_post_meta($post->ID, 'recipe_card-steps', true);
$recipe_card_picture = get_post_meta($post->ID, 'recipe_card_picture', true);
if( $recipe_ingredients) :
    $ingredients_array = explode("\n", $recipe_ingredients);
if ( $recipe_steps) :
    $steps_array = explode("\n", $recipe_steps);
?>

<div class="recipe__card">
    <div class="recipe__card-header">
    <div class="recipe__card-pic" style="background-image: url('<?php echo esc_url(get_field('recipe_card_picture'));  ?>');"></div>
      <h1 class="recipe__card-name"><?php esc_html(the_title()); ?></h1>
      <div class="recipe__card-row">
        <ul class="recipe__card-attributes">
          <li class="recipe__card-attribute">
            <i class="fas fa-clock"></i>
            <b>&nbsp;Prep:</b>&nbsp;<?php echo esc_html($prep_time); ?>
          </li>
          <li>
            <i class="fas fa-clock"></i>  
            <b>&nbsp;Cook:</b>&nbsp;<?php echo esc_html($cooking_time); ?>
          </li>
          <li>
            <i class="fas fa-utensils"></i>
            <b>&nbsp;Category:</b>&nbsp;<?php echo esc_html($recipe_category); ?>
          </li>
          <li>
            <i class="fas fa-globe"></i>
            &nbsp;<?php echo esc_html($recipe_origin); ?>
          </li>
        </ul>
      </div>
      <div class="recipe__card-row">
        <?php
        if(function_exists('the_ratings')) { 
            ob_start(); // Start output buffering
            the_ratings(); 
            $ratings = ob_get_clean(); // Get the output into a variable and clean the buffer

            // Create a new DOMDocument and load the HTML
            $doc = new DOMDocument();
            @$doc->loadHTML($ratings);

            // Find the 'post-ratings' div
            $divs = $doc->getElementsByTagName('div');
            $postRatings = null;
            foreach ($divs as $div) {
                if ($div->getAttribute('class') == 'post-ratings') {
                    $postRatings = $div;
                    break;
                }
            }

            if ($postRatings) {
                // Create a new div
                $wrapper = $doc->createElement('div');
                $wrapper->setAttribute('class', 'star-wrapper');

                // Find all img tags in 'post-ratings' and move them to the new div
                $imgs = $postRatings->getElementsByTagName('img');
                while ($imgs->length > 0) {
                    $wrapper->appendChild($imgs->item(0));
                }

                // Append the new div to 'post-ratings'
                $postRatings->appendChild($wrapper);
            }

            // Save the modified HTML
            $ratings = $doc->saveHTML();

            // Remove parentheses
            $ratings = str_replace(array('(', ')'), '', $ratings);

            echo $ratings; // Output the modified content
        }
        ?>
      </div>
      <!-- <div class="recipe__card-row">
        <span class="recipe__card-ratings">
        5.0 from 10 votes
        </span>
      </div> -->
    </div>
  <div class="recipe__card-subheading">
    <div class="recipe__card-row">
      <!-- <div class="recipe__card-attributes"> -->
        <i class="fas fa-user"></i>
        <b>&nbsp;Servings:</b>&nbsp;<span class="recipe__card-servings"><?php echo esc_html($recipe_servings); ?></span>
      <!-- </div> -->
    </div>
  </div>
  <div class="recipe__card-body">
    <div class="recipe__card-row">
      <button id="printBtn" class="recipe__card-pill">
        Print
      </button>
      <div class="recipe__card-sm_icon">
        <button id="fb">
          <i class="sm fab fa-facebook"></i>      
        </button>
      </div>
      <div class="recipe__card-sm_icon">
        <button id="whatsApp">
          <i class="sm fab fa-whatsapp"></i>      
        </button>
      </div>
      <div class="recipe__card-sm_icon">
        <button id="pinterest">
          <i class="sm fab fa-pinterest"></i>      
        </button>
      </div>
      <div class="recipe__card-sm_icon">
        <a href="mailto:?subject=<?php echo urlencode(get_the_title()); ?>&body=Check out this recipe: <?php echo urlencode(get_permalink()); ?>">
          <i class="sm fas fa-envelope black"></i>
        </a>
      </div>
    </div>
    <div class="recipe__card-row">
      <div class="recipe__card-intro">
      <?php echo esc_html($recipe_intro); ?>
      </div>
    </div>
    <div class="recipe__card-row">
      <div class="recipe__card-ingredient_divider">
        <h3 class="recipe__card-ingredients_heading">Ingredients</h3>
        <div class="recipe__card-ingredients_multipliers">          <button id="resetBtn" class="recipe__card-ingredient_multiplier">            1x
         </button>
         <button id="doubleBtn" class="recipe__card-ingredient_multiplier">            2x
         </button>
         <button id="tripleBtn" class="recipe__card-ingredient_multiplier">            3x
         </button>
        </div>
      </div>
    </div>
      <div class="recipe__card-row">
        <ul class="recipe__card-ingredients">
          <?php foreach($ingredients_array as $ingredient): ?>
            <?php 
            $ingredient = preg_replace('/(\d+\/\d+|\d+)/', '<span class="ingredientQuantity">$1</span>', trim($ingredient)); 
            $ingredient = preg_replace('/(cup|lb|tablespoon|teaspoon)\b/', '<span class="measurement">$1</span>', $ingredient);
            ?>
            <li><?php echo wp_kses($ingredient, array('span' => array('class' => array()))); ?></li>
          <?php endforeach; ?>
        </ul>
    </div>
    <div class="recipe__card-row">
        <div class="recipe__card-ingredient_divider">
            <h3>Instructions</h3>
        </div>
    </div>
    <div class="recipe__card-row">
        <ol class="recipe__card-steps">
            <?php foreach($steps_array as $step): ?>
                <li><?php echo esc_html(trim($step)); ?></li>
            <?php endforeach; ?>
            <?php endif; ?>
        </ol>
        <?php endif; ?>
    </div>
  </div>