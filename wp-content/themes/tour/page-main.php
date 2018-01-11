<?php get_header(); ?>
    <main class="main">
        <section class="b-main">
            <?php if (have_posts()) while (have_posts()): the_post();
                $image = get_field('im');
                $size = 'full'; // (thumbnail, medium, large, full or custom size)
                if(!empty($image)) {
                    echo wp_get_attachment_image( $image['id'], array(), "", array( "class" => "b-main__img" ) );
                }
            endwhile; ?>
            <div class="b-main__cont">
                <img class="b-main__logo" src="<?php echo esc_url(get_template_directory_uri()) ?>/img/b-main/logo.png"
                     alt="">
                <div class="b-main__header">
                    <div class="b-main__title">
                        <!-- Плагин Custom Fields -->
                        <?php if (have_posts()) while (have_posts()): the_post(); ?>
                            <?= the_field('field1'); ?>
                        <?php endwhile; ?>
                    </div>
                    <div class="b-main__sub-title">
                        <?php if (have_posts()) while (have_posts()): the_post(); ?>
                            <?= the_field('field2'); ?>
                        <?php endwhile; ?>
                    </div>
                </div>
                <div class="b-main__wrap-btn">
                    <a href="/shedule.html" class="btn btn--large btn--blue">Schedule a demo</a>
                </div>
            </div>
        </section>

        <!-- WHAT IS ANTI-DRONE TECHNOLOGY?-->
        <section class="about-technology">
            <div class="about-technology__header">
                <h2 class="about-technology__title">
                    <?php if (have_posts()) while (have_posts()): the_post(); ?>
                        <?= the_field('field3'); ?>
                    <?php endwhile; ?>
                </h2>
            </div>
            <div class="about-technology__body">
                <div class="about-technology__list">

                    <?php
                        $idObj = get_category_by_slug('	drone-tehnology');
                        $id = $idObj->cat_ID;
                        $args = array(
                            'cat' => $id,
                            'order'=> ASC,
                            'posts_per_page'=> 3,
                        );
                        $query = new WP_Query( $args );
                        while( $query->have_posts() ){ $query->the_post();
                    ?>

                    <div class="about-technology__item">
                        <div class="about-technology-item">
                            <a href="<?=get_permalink();?>" class="about-technology-item__link">
                                <div class="about-technology-item__wrap">
                                    <?php the_post_thumbnail('200',array('class'=>'about-technology-item__img','alt'=>''));?>
                                    <div class="about-technology-item__header">
                                        <h3 class="about-technology-item__title"><?php the_title()?></h3>
                                    </div>
                                </div>
                                <div class="about-technology-item__text">
                                    <?php the_excerpt();?>
                                </div>
                                <div class="about-technology-item__more">
                                    Read more
                                </div>
                            </a>
                        </div>
                    </div>
                    <?php } wp_reset_postdata();?>

                </div>
            </div>
        </section>


        <section class="differents">
            <div class="differents__header">
                <h2 class="differents__title">
                    <?php if (have_posts()) while (have_posts()): the_post(); ?>
                        <?= the_field('field4'); ?>
                    <?php endwhile; ?>
                </h2>
            </div>
            <div class="differents__body">
                <div class="differents__list">
                    <?php
                    $idObj = get_category_by_slug('	trusted-solution');
                    $id = $idObj->cat_ID;
                    $args = array(
                        'cat' => $id,
                        'order'=> ASC,
                        'posts_per_page'=> 5,
                    );
                    $query = new WP_Query( $args );
                    while( $query->have_posts() ){ $query->the_post();
                        ?>

                    <div class="differents__item">
                        <div class="different">
                            <?php the_post_thumbnail(array(),array('class'=>'','alt'=>''));?>
                            <h3 class="different__title"><?php the_title()?></h3>
                            <div class="different__text">
                                <?php the_excerpt();?>
                            </div>
                        </div>
                    </div>
                    <?php } wp_reset_postdata();?>

                </div>
            </div>
        </section>

        <section class="solutions">
            <div class="solutions__header">
                <div class="solutions__title">Tailor-Made Solutions for Your Industry</div>
            </div>
            <div class="solutions__body">
                <div class="solutions__list">
                    <?php
                    $idObj = get_category_by_slug('	industry-solutions');
                    $id = $idObj->cat_ID;
                    $args = array(
                        'cat' => $id,
                        'order'=> ASC,
                        'posts_per_page'=> 8,
                    );
                    $query = new WP_Query( $args );
                    while( $query->have_posts() ){ $query->the_post();
                        ?>
                        <div class="solutions__item">
                            <div class="solutions__wrap">
                                <a href="<?=get_permalink();?>" class="solutions__link">
                                    <div class="solutions__border-top"></div>
                                    <div class="solutions__logo">
                                        <?php the_post_thumbnail(array(),array('class'=>'','alt'=>''));?>
                                    </div>
                                    <div class="solutions__border-bottom"></div>
                                    <div class="solutions__name"><?php the_title()?></div>
                                </a>
                            </div>
                        </div>
                    <?php } wp_reset_postdata();?>
                </div>
            </div>
        </section>

        <section class="shedule-form">
            <div class="shedule-form__header">
                <h2 class="shedule-form__title">
                    Schedule a&nbsp;demo
                </h2>
            </div>
            <div class="shedule-form__body">
                <div class="errorN"></div>
                <br/>
                <?while(have_posts()) : the_post();
                    $data = get_field_object('success_form')['value'];
                    my_get_template_part('template-parts/content-feedback',array('data'=>$data,'emailto'=>get_option('admin_email')));
                endwhile;?>
            </div>

        </section>
    </main>
<?php get_footer(); ?>