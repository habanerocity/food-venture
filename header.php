<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <h1>This is an h1</h1>
    <h2>This is an h2</h2>
    <h3>This is an h3</h3>
    <h4>This is an h4</h4>
    <p>this is a p tag</p>
    <div>this is a div tag</div>
    <div id="page" class="site">
        <header>
            <nav class="top-bar">
                <div class="logo">
                    Logo
                </div>
                <div class="searchbox">
                    Search
                </div>
            </nav>
            <section class="menu-area">
                <nav class="main-menu">
                    Menu
                </nav>
            </section>
        </header>