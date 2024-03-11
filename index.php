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
                        else: ?>
                            <p>No posts to be displayed!</p>
                    <?php endif; ?>
                </article>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>