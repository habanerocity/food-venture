<div id="blog__archive" >
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