<?php get_header(); ?>

<main class="main">
    <section class="about-us__banner">
    </section>
    <section class="about-us__info">
        <div class="about-us__wraper">
            <div class="about-us__header">
                <h2 class="about-us__title">
                    <?=wp_title('', false);?>
                </h2>
            </div>
            <div class="about-us__body">
                <div class="about-us__text">
                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
                        the_content();
                    endwhile; else: ?>
                        <p>Sorry, no posts matched your criteria.</p>
                    <?php endif; ?>
                </div>
<!--                <div class="about-us__quote"></div>-->
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
