<?php

function wp_foodventure_customizer($wp_customize){
    //About Section
    $wp_customize->add_section(
        'sec_about',
        array(
            'title' => 'About Section',
            'description' => 'About Description'
        )
    );

    //About Description
    $wp_customize->add_setting(
        'set_description',
        array(
            'type' => 'theme_mod',
            'default' => 'Hi, we are foodies interesting in exploring the sights and flavors of the world, one bite at a time. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Nec sagittis aliquam malesuada bibendum arcu vitae elementum.',
            'sanitize_callback' => 'sanitize_textarea_field'
        )
    );

    $wp_customize->add_control(
        'set_description',
        array(
            'label' => 'About Description',
            'description' => 'Write something about yourself',
            'section' => 'sec_about',
            'type' => 'textarea'
        )
    );

    //About Section Image
    $wp_customize->add_section(
        'sec_about_image',
        array(
            'title' => 'About Image',
        )
    );

    $wp_customize->add_setting(
        'set_about_image',
        array(
            'type' => 'theme_mod',
            'sanitize_callback' => 'absint'
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Media_Control(
            $wp_customize, 
            'set_about_image',
            array(
                'label' => 'About Image',
                'section' => 'sec_about_image',
                'mime_type' => 'image'
            )
            ));

}

add_action('customize_register', 'wp_foodventure_customizer');