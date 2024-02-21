<?php
$prep_time = get_post_meta($post->ID, 'recipe_card-prep_time', true);
$cooking_time = get_post_meta($post->ID, 'recipe_card-cooking_time', true);
$recipe_category = get_post_meta($post->ID, 'recipe_card-category', true);
$recipe_origin = get_post_meta($post->ID, 'recipe_card-origin', true);
$recipe_servings = get_post_meta($post->ID, 'recipe_card-servings', true);
$recipe_intro = get_post_meta($post->ID, 'recipe_card-intro', true);
$recipe_ingredients = get_post_meta($post->ID, 'recipe_card-ingredients', true);
$recipe_steps = get_post_meta($post->ID, 'recipe_card-steps', true);
if( $recipe_ingredients) :
    $ingredients_array = explode("\n", $recipe_ingredients);
if ( $recipe_steps) :
    $steps_array = explode("\n", $recipe_steps);
?>
<div class="recipe__card">
    <div class="recipe__card-header">
      <div class="recipe__card-pic"></div>
      <h1 class="recipe__card-name"><?php esc_html(the_title()); ?></h1>
      <div class="recipe__card-row">
        <ul class="recipe__card-attributes">
          <li class="recipe__card-attribute">
            <i class="fas fa-clock" style="color: #ffffff;">
            </i>
            <b>&nbsp;Prep:</b>&nbsp;<?php echo esc_html($prep_time); ?>
          </li>
          <li>
            <i class="fas fa-clock" style="color: #ffffff;">             </i>  
            <b>&nbsp;Cook:</b>&nbsp;<?php echo esc_html($cooking_time); ?>
          </li>
          <li>
            <i class="fas fa-utensils"style="color:#ffffff;">  
            </i>
            <b>&nbsp;Category:</b>&nbsp;<?php echo esc_html($recipe_category); ?>
          </li>
          <li>
            <i class="fas fa-globe" style="color: #ffffff;">             </i>
            &nbsp;<?php echo esc_html($recipe_origin); ?>
          </li>
        </ul>
      </div>
      <div class="recipe__card-row">
        <ul class="recipe__card-stars">
          <li><i class="star fas fa-star" style="color: #FFD43B;"></i></li>
          <li><i class="star fas fa-star" style="color: #FFD43B;"></i></li>
          <li><i class="star fas fa-star" style="color: #FFD43B;"></i></li>
          <li><i class="star fas fa-star" style="color: #FFD43B;"></i></li>
          <li><i class="star fas fa-star" style="color: #FFD43B;"></i></li>
        </ul>
      </div>
      <div class="recipe__card-row">
        <span class="recipe__card-ratings">
        5.0 from 10 votes
        </span>
      </div>
    </div>
  <div class="recipe__card-subheading">
    <div class="recipe__card-row">
      <div class="recipe__card-attributes">
        <i class="fas fa-user" style="color: #fff;"></i>
        <b>&nbsp;Servings:</b>&nbsp;<?php echo esc_html($recipe_servings); ?>
      </div>
    </div>
  </div>
  <div class="recipe__card-body">
    <div class="recipe__card-row">
      <button id="printBtn" class="recipe__card-pill">
        Print
      </button>
      <div class="recipe__card-sm_icon">
        <button id="fb">
          <i class="sm fab fa-facebook" style="color: #000;">         </i>      
        </button>
      </div>
      <div class="recipe__card-sm_icon">
        <button id="whatsApp">
          <i class="sm fab fa-whatsapp" style="color: #000;"></i>      
        </button>
      </div>
      <div class="recipe__card-sm_icon">
        <button id="pinterest">
          <i class="sm fab fa-pinterest" style="color: #000;"></i>      
        </button>
      </div>
      <div class="recipe__card-sm_icon">
        <a href="mailto:?subject=<?php echo urlencode(get_the_title()); ?>&body=Check out this recipe: <?php echo urlencode(get_permalink()); ?>">
          <i class="sm fas fa-envelope" style="color: #000;"></i>
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
        <h3>Ingredients</h3>
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