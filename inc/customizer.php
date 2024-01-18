<?php

function wp_foodventure_customizer($wp_customize){
    //About Section
    $wp_customize->add_section(
        'sec_about',
        array(
            'title' => 'About Page',
            'description' => 'Edit the About Page'
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

    //About Our Mission Title
    $wp_customize->add_setting(
        'set_our_mission_title',
        array(
            'type' => 'theme_mod',
            'default' => 'Our Mission',
            'sanitize_callback' => 'wp_filter_nohtml_kses'
        )
    );

    $wp_customize->add_control(
        'set_our_mission_title',
        array(
            'label' => 'Our Mission Title',
            'description' => 'Enter a heading for the Our Mission section',
            'section' => 'sec_about',
            'type' => 'text'
        )
    );

    //About Our Mission Description
    $wp_customize->add_setting(
        'set_our_mission_description',
        array(
            'type' => 'theme_mod',
            'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
            sed do eiusmod tempor incididunt ut labore et dolore magna 
            aliqua. Sit amet purus gravida quis blandit turpis cursus 
            in. Odio facilisis mauris sit amet massa vitae tortor 
            condimentum lacinia. Pharetra et ultrices neque ornare 
            aenean euismod elementum.',
            'sanitize_callback' => 'sanitize_textarea_field'
        )
    );

    $wp_customize->add_control(
        'set_our_mission_description',
        array(
            'label' => 'Our Mission Description',
            'description' => 'Enter a description for the Our Mission section',
            'section' => 'sec_about',
            'type' => 'textarea'
        )
    );

    //About Section Image
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
                'section' => 'sec_about',
                'mime_type' => 'image'
            )
            ));

}

add_action('customize_register', 'wp_foodventure_customizer');