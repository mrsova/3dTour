<?php get_header(); ?>


<section class="how-it-works__banner"></section>
<section class="how-it-works__info">
    <h2 class="how-it-works__title">
        <?php if (have_posts()) while (have_posts()): the_post(); ?>
            <?= the_field('title'); ?>
        <?php endwhile; ?>
    </h2>
    <div class="how-it-works__body">
        <div class="how-it-works__image">
            <?php the_post_thumbnail(array(),array('alt'=>''));?>
        </div>
        <div class="how-it-works__list">
            <?php
                //Вывод продукции анонс
                $step = 1;
                $idObj = get_category_by_slug('how-it-works');
                $id = $idObj->cat_ID;
                $args = array(
                    'cat' => $id,
                    'order'=> ASC,
                    'posts_per_page'=> 3
                );
                $query = new WP_Query( $args );
                while( $query->have_posts()) : $query->the_post();
                    my_get_template_part('template-parts/content-how-it-works',array('step'=>$step++));
                    //get_template_part('template-parts/content-how-it-works','how-it-works');
                endwhile;
                wp_reset_postdata();
            ?>
        </div>
    </div>

</section>

<?php get_footer(); ?>
