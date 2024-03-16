<?php get_header(); ?>
<?php get_template_part('parts/content', 'custom-header') ?>
<div class="overlay hidden"></div>
<main id="content" class="site-content">
    <section id="primary" class="content-area">
        <div id="main" class="site-main">
            <div class="container">
            <?php
                while( have_posts()):
                    the_post();
                    ?>
                    <div class="content">
                        <?php the_content(); ?>
                    </div>
                <?php
            endwhile;
            ?>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>