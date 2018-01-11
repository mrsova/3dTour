<?php get_header(); ?>
<main class="main">
    <section class="our-products__banner"></section>
    <section class="our-products__info">
        <h2 class="our-products__title">
            <?php if (have_posts()) while (have_posts()): the_post(); ?>
                <?= the_field('field1'); ?>
            <?php endwhile; ?>
        </h2>
        <div class="about-technology__body">
            <div class="about-technology__list">
                <?php
                    //Вывод продукции анонс
                    $idObj = get_category_by_slug('	products');
                    $id = $idObj->cat_ID;
                    $args = array(
                        'cat' => $id,
                        'order'=> ASC,
                        'posts_per_page'=> 3,
                    );
                    $query = new WP_Query( $args );
                    while( $query->have_posts()) : $query->the_post();
                        get_template_part('template-parts/content-products','products');
                    endwhile;
                    wp_reset_postdata()
                ?>
            </div>
        </div>
    </section>
    <section class="products-table">
        <?php if (have_posts()) while (have_posts()): the_post(); ?>
            <?= the_field('table-desktop'); ?>
        <?php endwhile; ?>
        <?php if (have_posts()) while (have_posts()): the_post(); ?>
            <?= the_field('table-mobile'); ?>
        <?php endwhile; ?>
    </section>
</main>
<?php get_footer(); ?>
