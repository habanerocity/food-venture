<?php get_header(); ?>
<div class="overlay hidden"></div>
<?php get_template_part('parts/content', 'custom-header') ?>
<main id="content" class="site-content">
    <section id="primary" class="content-area">
        <div id="main" class="site-main">
            <div class="container padding-section blog__container">
                <article class="blog__articles">
                    <div class="blog__items-grid">
                        <?php 
                            if( have_posts() ):
                                while( have_posts() ) : the_post();
                                ?>
                                    <?php if('post' == get_post_type() || 'blog_recipes' == get_post_type()): ?>
                                    <?php get_template_part( 'parts/content', 'article_card-index'); ?>
                                    <?php endif; ?>
                                <?php
                                endwhile;
                            else: ?>
                                <p>No posts to be displayed!</p>
                        <?php endif; ?>
                    </div>
                </article>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>