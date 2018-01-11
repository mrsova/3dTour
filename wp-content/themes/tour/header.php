<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php wp_head();?>
</head>
<body>
<header class="header">
    <div class="header__wrap-top">
        <div class="header__top">
            <div class="header-control">
                <ul class="header-control__list">
                    <li class="header-control__item">
                        <a href="" class="header-control__link">Concatc</a>
                    </li>
                    <li class="header-control__item">
                        <a href="" class="header-control__link">Login</a>
                    </li>
                    <li class="header-control__item">
                        <a href="" class="header-control__link">Jobs</a>
                    </li>
<!--                    <li class="header-control__item">-->
<!--                        <div class="header-lang">-->
<!--                            <i class="header-lang__icon"></i>-->
<!--                            <a href="" class="header-lang__link">DE</a>-->
<!--                            <span>|</span>-->
<!--                            <a href="" class="header-lang__link">EN</a>-->
<!--                        </div>-->
<!--                    </li>-->
                </ul>
            </div>
        </div>
    </div>
    <div class="header__wrap-bottom">
        <div class="header__bottom">

            <div class="header__hamburger hamburger">
                <button>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </button>
                <span class="hamburger__text">Menu</span>
            </div>

            <div class="header__wrap-logo">
                <a href="/" class="header-logo">
                    <img src="<?php echo esc_url(get_template_directory_uri())?>/img/logo.png" alt="">
                </a>
            </div>
            <div class="header__wrap-nav">
                <nav class="header-nav" aria-label="<?php esc_attr_e( 'Primary Menu', 'tour' ); ?>">
                    <?php if ( has_nav_menu( 'primary' ) ) :
                        wp_nav_menu( array(
                            'theme_location' => 'primary',
                            'menu_class'     => 'header-nav__list',
                            'menu_id'        => '',
                            'container'      => false,
                            'items_wrap'     => '<ul class="%2$s">%3$s</ul>',
                            'walker'         => new Solid_Navwalker
                        ) );
                        ?>
                    <?php endif; ?>
                </nav>
            </div>
            <div class="header-btn">
                <a href="" class="btn btn--blue btn--middle btn--block">Schedule a&nbsp;demo</a>
            </div>
        </div>
    </div>
</header>