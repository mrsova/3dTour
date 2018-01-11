<div class="about-technology__item">
    <div class="about-technology-item">
        <a href="<?=get_permalink();?>" class="about-technology-item__link">
            <div class="about-technology-item__wrap">
                <?php the_post_thumbnail(array(),array('class'=>'about-technology-item__img','alt'=>''));?>
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