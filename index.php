<?php get_header(); ?>
<?php include 'custom-header.php'  ?>
        <div id="content" class="site-content">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <div class="container padding-section blog-container">
                        <div class="blog-articles">
                            <div class="blog-input__container">
                                <div id="blog-categories" >
                                    <?php 
                                        // Get current category
                                        $current_category = get_query_var('category_name');

                                        // If no category is selected, set the selected option to "Select Category"
                                        $selected_option = $current_category ? $current_category : '-1';

                                        // Dropdown of categories
                                        $categories = wp_dropdown_categories( array(
                                            'show_option_none'  => 'Select Category', // This line adds "Select Category" as the first option
                                            'show_option_all'   => 'All Categories',
                                            'orderby'           => 'name',
                                            'echo'              => 0, // Don't echo the dropdown immediately
                                            'hierarchical'      => 1,
                                            'value_field'       => 'slug', // Use slugs as the option values
                                            'selected'          => $selected_option, // Set the selected option
                                        ) );

                                        if($categories){
                                            // Add onchange event to the dropdown
                                            $categories = str_replace('<select', '<select onchange="if(this.value && this.value != \'-1\') { window.location.href=\''.get_home_url().'/category/\'+this.value; } else if(this.value == \'\') { window.location.href=\''.get_home_url().'/\' }"', $categories);
                                            echo $categories;
                                        }

                                        // Set the title
                                        if($current_category){
                                            $title = $current_category;
                                        } else if($selected_option == ''){
                                            $title = 'All Categories';
                                        } else {
                                            $title = 'Select Category';
                                        }

                                        // Set the page title in the custom header
                                        add_filter('pre_get_document_title', function($original_title) use ($title) {
                                            return $title;
                                        });
                                    ?>
                                </div>
                                <div id="blog-archive" >
                                    <?php 
            
                                        // Dropdown of categories
                                        $archives = wp_get_archives( array(
                                            'type'            => 'monthly',
                                            'format'          => 'option',
                                            'show_post_count' => true,
                                            'echo'            => 0
                                        ) );
            
                                        if($archives) {
                                            echo '<select onchange="document.location.href=this.options[this.selectedIndex].value;" >';
                                            echo '<option value="">Select Month</option>';
                                            echo $archives;
                                            echo '</select>';
                                        }
                                    ?>
                                </div>
                            </div>
                                <div class="blog-items">
                                    <?php 
                                        if( have_posts() ):
                                            while( have_posts() ) : the_post();
                                            ?>
                                                <article class="article__card">
                                                    <div class="featured-thumbnail">
                                                        <?php the_post_thumbnail('medium'); ?>
                                                    </div>
                                                    <div class="article__card-content">
                                                        <div class="article__card-title&excerpt">
                                                            <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                                            <?php the_excerpt(); ?>
                                                        </div>
                                                        <div class="article__card-footer">
                                                            <span class="article__card-footer_date"><i class="fas fa-calendar-alt"></i> <?php echo get_the_date(); ?></span>
                                                            <span class="article__card-footer_link"><a href="<?php the_permalink(); ?>">Read More</a></span>
                                                        </div>
                                                    </div>
                                                </article>
                                            <?php
                                            endwhile;
                                        else: ?>
                                            <p>No posts to be displayed!</p>
                                    <?php endif; ?>
                                </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
<?php get_footer(); ?>
        