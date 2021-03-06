<?php get_header();?>
<main class="main">
    <section class="detect__banner"></section>
    <section class="detect__info">
        <div class="detect__header">
            <h2 class="detect__title">
                <?=single_post_title()?>
            </h2>
        </div>
        <div class="detect__body">
            <div class="detect__image">
                <?php if (have_posts()) while (have_posts()): the_post(); ?>
                    <img src="<?= the_field('detail_image'); ?>" alt="">
                <?php endwhile; ?>
            </div>
            <div class="detect__list">
                <div class="detect__pictogramms">
                    <?php if (have_posts()) while (have_posts()): the_post(); ?>
                        <?if (get_field_object('sensor')['value'] !=0): ?>
                            <div class="pictogramm">
                                <div class="pictogramm__svg">
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                         viewBox="0 0 240.6 99.3">
                                        <path d="M147.4,99.3H93.2c-11.8,0-21.3-9.5-21.3-21.3V21.3C71.9,9.5,81.4,0,93.2,0h54.2c11.8,0,21.3,9.5,21.3,21.3V78
            C168.7,89.7,159.2,99.3,147.4,99.3z M93.2,8.5c-7.1,0-12.8,5.7-12.8,12.8V78c0,7.1,5.7,12.8,12.8,12.8h54.2
            c7.1,0,12.8-5.7,12.8-12.8V21.3c0-7.1-5.7-12.8-12.8-12.8H93.2z"/>
                                        <path d="M142.6,82.8H98c-6.3,0-11.4-5.1-11.4-11.4V25c0-6.3,5.1-11.4,11.4-11.4h44.6c6.3,0,11.4,5.1,11.4,11.4v46.5
            C154,77.7,148.9,82.8,142.6,82.8z"/>
                                        <g>
                                            <path d="M202.9,76.9c0.8,0.8,2,1.1,3.2,0.8c0.5-0.2,0.9-0.5,1.3-0.8c7.2-7.3,11.2-16.9,11.2-27.2c0-10.3-4-20-11.3-27.2
                c-0.6-0.6-1.4-0.9-2.2-0.9c-0.9,0-1.6,0.3-2.2,0.9c-1.2,1.2-1.2,3.3,0,4.5c12.5,12.5,12.5,32.9,0,45.5
                C201.7,73.6,201.7,75.6,202.9,76.9z"/>
                                            <path d="M194.4,36.1c-1.4-1.4-3.8-1.2-4.9,0.5c-0.8,1.3-0.5,2.9,0.5,4c2.4,2.4,3.7,5.6,3.7,9c0,3.4-1.3,6.5-3.6,8.9
                c-1.2,1.2-1.4,3.2-0.3,4.4c0.8,1,2.1,1.4,3.4,1c0.5-0.1,0.9-0.4,1.3-0.8c3.6-3.6,5.6-8.4,5.6-13.5C200,44.5,198,39.7,194.4,36.1z"
                                            />
                                            <path d="M219.1,13.1c9.8,9.7,15.1,22.7,15.1,36.5s-5.4,26.8-15.1,36.5c-1.6,1.6-1,5,1.8,5.4c1.1,0.1,2.1-0.3,2.9-1.1
                c10.8-10.9,16.8-25.4,16.8-40.8c0-15.4-6-30-16.9-40.9c-1.1-1.1-2.9-1.3-4.1-0.5C217.9,9.4,217.7,11.8,219.1,13.1z"/>
                                        </g>
                                        <g>
                                            <path d="M37.6,22.4c-0.8-0.8-2-1.1-3.2-0.8c-0.5,0.2-0.9,0.5-1.3,0.8c-7.2,7.3-11.2,16.9-11.2,27.2c0,10.3,4,20,11.3,27.2
                c0.6,0.6,1.4,0.9,2.2,0.9c0.9,0,1.6-0.3,2.2-0.9c1.2-1.2,1.2-3.3,0-4.5c-12.5-12.5-12.5-32.9,0-45.5C38.9,25.7,38.9,23.7,37.6,22.4
                z"/>
                                            <path d="M46.2,63.2c1.4,1.4,3.8,1.2,4.9-0.5c0.8-1.3,0.5-2.9-0.5-4c-2.4-2.4-3.7-5.6-3.7-9c0-3.4,1.3-6.5,3.6-8.9
                c1.2-1.2,1.4-3.2,0.3-4.4c-0.8-1-2.1-1.4-3.4-1c-0.5,0.1-0.9,0.4-1.3,0.8c-3.6,3.6-5.6,8.4-5.6,13.5C40.6,54.8,42.6,59.6,46.2,63.2
                z"/>
                                            <path d="M21.5,86.1C11.7,76.4,6.4,63.4,6.4,49.6s5.4-26.8,15.1-36.5c1.6-1.6,1-5-1.8-5.4c-1.1-0.1-2.1,0.3-2.9,1.1
                C6,19.8,0,34.2,0,49.6c0,15.4,6,30,16.9,40.9c1.1,1.1,2.9,1.3,4.1,0.5C22.7,89.8,22.8,87.5,21.5,86.1z"/>
                                        </g>
                                    </svg>
                                </div>
                                <div class="pictogramm__text"><?=the_field('sensor');?> Sensor</div>
                            </div>
                        <?endif;?>

                        <?if (get_field_object('camera')['value'] !=0): ?>
                            <div class="pictogramm">
                                <div class="pictogramm__svg">
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                         viewBox="0 0 58.6 59.6">
                                        <path d="M29.1,19.9c-5.3,0-9.6,4.3-9.6,9.6c0,5.3,4.3,9.6,9.6,9.6c5.3,0,9.6-4.3,9.6-9.6C38.7,24.2,34.4,19.9,29.1,19.9z M29.1,33.2
            c-2,0-3.7-1.7-3.7-3.7c0-2,1.7-3.7,3.7-3.7c2,0,3.7,1.7,3.7,3.7C32.8,31.5,31.1,33.2,29.1,33.2z"/>
                                        <path d="M49,6.6h-1.5l-0.7-1.3C45.2,2,41.9,0,38.3,0H19.9c-3.7,0-6.9,2-8.6,5.3l-0.7,1.3H9.6C4.3,6.6,0,10.9,0,16.2v23.2
            c0,4.9,3.7,9,8.5,9.5L24.2,49v10.5h10.1V49H49c5.3,0,9.6-4.3,9.6-9.6V16.2C58.6,10.9,54.3,6.6,49,6.6z M29.1,43.1
            c-7.5,0-13.6-6.1-13.6-13.6s6.1-13.6,13.6-13.6c7.5,0,13.6,6.1,13.6,13.6S36.6,43.1,29.1,43.1z M52.7,39.4c0,2-1.7,3.7-3.7,3.7h-5.9
            l0.7-0.8c3.1-3.6,4.8-8.1,4.8-12.8c0-10.8-8.8-19.5-19.5-19.5C18.3,10,9.6,18.7,9.6,29.5c0,4.7,1.7,9.3,4.8,12.8l0.7,0.8H9.6
            c-2,0-3.7-1.7-3.7-3.7V16.2c0-2,1.7-3.7,3.7-3.7h2.9c1.1,0,2.1-0.6,2.6-1.6l1.5-3c0.6-1.3,1.9-2,3.3-2h18.3c1.4,0,2.7,0.8,3.3,2
            l1.5,3c0.5,1,1.5,1.6,2.6,1.6H49c2,0,3.7,1.7,3.7,3.7V39.4z"/>
                                    </svg>
                                </div>
                                <div class="pictogramm__text"><?=the_field('camera');?> Camera</div>
                            </div>
                        <?endif;?>
                    </div>

                <?php endwhile; ?>
                <div class="detect__subtitle">Product specs</div>

                <div class="detect__item">
                    <div class="detect__option">range:</div>
                    <div class="detect__text">
                        <?php if (have_posts()) while (have_posts()): the_post(); ?>
                            <?= the_field('range'); ?>
                        <?php endwhile; ?>
                    </div>
                </div>
                <div class="detect__item">
                    <div class="detect__option">dimensions:</div>
                    <div class="detect__text">
                        <?php if (have_posts()) while (have_posts()): the_post(); ?>
                            <?= the_field('dimensions'); ?>
                        <?php endwhile; ?>
                    </div>
                </div>
                <div class="detect__item">
                    <div class="detect__option">use:</div><br>
                    <div class="detect__text">
                        <?php if (have_posts()) while (have_posts()): the_post(); ?>
                            <?= the_field('use'); ?>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        </div>

    </section>

</main>
<?php get_footer();?>
