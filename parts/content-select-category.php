<nav id="blog__categories" >
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

        $home_url = esc_url(get_home_url());

        if($categories){
            // Add onchange event to the dropdown
            $categories = str_replace('<select', '<select onchange="if(this.value && this.value != \'-1\') { window.location.href=\''.$home_url.'/category/\'+this.value; } else if(this.value == \'\') { window.location.href=\''.$home_url.'/\' }"', $categories);
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
</nav>