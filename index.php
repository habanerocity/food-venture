<?php get_header(); ?>
<div class="overlay hidden"></div>
<?php include 'custom-header.php'  ?>
        <div id="content" class="site-content">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <div class="container padding-section blog__container">
                        <div class="blog__articles">
                            <div class="blog__input_container">
                                <?php get_template_part( 'parts/select-category'); ?>
                                <?php get_template_part( 'parts/select-archive'); ?>
                            </div>
                                <div class="blog__items-grid">
                                    <?php 
                                        if( have_posts() ):
                                            while( have_posts() ) : the_post();
                                            get_template_part( 'parts/content');
                                            endwhile;
                                        else: ?>
                                            <p>No posts to be displayed!</p>
                                    <?php endif; ?>
                                </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
<?php get_footer(); ?>
        