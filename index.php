<?php get_header(); ?>
<div class="overlay hidden"></div>
<?php get_template_part('parts/content', 'custom-header') ?>
<main id="content" class="site-content">
    <section id="primary" class="content-area">
        <div id="main" class="site-main">
            <div class="container padding-section blog__container">
                <header class="blog__articles">
                    <div class="blog__input_container">
                        <?php get_template_part( 'parts/content', 'select-category'); ?>
                        <?php get_template_part( 'parts/content', 'select-archive'); ?>
                    </div>
                </header>
                <article class="blog__items-grid">
                    <?php 
                    if( have_posts() ):
                        while( have_posts() ) : the_post();
                            get_template_part( 'parts/content', 'article_card-index');
                        endwhile;
                    ?>
                </article>
                <nav id="blog__index-navigation" class="post__navigation">
                    <div id="padding__bottom-none" class="container padding-section post__navigation-child">
                        <div class="prev-post">
                            <?php previous_posts_link( "Newer posts" ) ?>
                        </div>
                        <div class="next-post">
                            <?php next_posts_link( "Older posts" ) ?>
                        </div>
                    </div>
                </nav>
                <?php 
                    else: 
                ?>
                <p>No posts to be displayed!</p>
                <?php 
                    endif; 
                ?>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>