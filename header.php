<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <div id="page" class="site">
        <header>
            <nav class="top-bar">
                <div class="container">
                    <div class="logo">
                        Logo
                    </div>
                    <nav class="main-menu">
                        <button class="check-button">
                            <div class="menu-icon">
                                <div class="bar1" id=""></div>
                                <div class="bar2" id=""></div>
                                <div class="bar3" id=""></div>
                            </div>
                        </button>
                        <?php wp_nav_menu( array( 'theme_location' => 'wp_foodventure_main_menu' ) ); ?>
                        <div class="searchbox">
                            Search
                        </div>
                    </nav>
                </div>
            </nav>
            <section class="menu-area">
                <div class="container">
                   
                </div>
            </section>
        </header>