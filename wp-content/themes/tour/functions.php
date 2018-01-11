<?php
remove_filter('template_redirect','redirect_canonical');
/**
 * Скрыть админ панель
 */
show_admin_bar(false);

/**
 * Определим константу, которая будет хранить путь к папке single
 */
define( SINGLE_PATH, TEMPLATEPATH . '/single' );

/**
 * Добавим фильтр, который будет запускать функцию подбора шаблонов
 */
add_filter( 'single_template', 'my_single_template' );


/**
 * Основная функция для работы шаблона(тупо скопирована)
 */
if (!function_exists('tour_setup')) :
    function tour_setup()
    {
        load_theme_textdomain('tour');

        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
        set_post_thumbnail_size(1200, 9999);

        register_nav_menus(array(
            'primary' => __('Primary Menu', 'tour'),
        ));

        add_theme_support('post-formats', array(
            'aside',
            'image',
            'video',
            'quote',
            'link',
            'gallery',
            'status',
            'audio',
            'chat',
        ));
    }
endif;
add_action('after_setup_theme', 'tour_setup');

function tour_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'footer', 'tour' ),
        'id'            => 'footer-widget',
        'description'   => __( '', 'tour' ),
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
    ) );
}
add_action( 'widgets_init', 'tour_widgets_init' );

/**
 * Подключение файлов
 */
function tour_scripts() {
    wp_enqueue_style( 'tour-style', get_stylesheet_uri() );
    wp_enqueue_style( 'tour-main', get_template_directory_uri() . '/css/style.css', array());
    wp_enqueue_script( 'tour-html5', 'http://code.jquery.com/jquery-3.2.1.min.js', array());
    wp_enqueue_script( 'tour-script', get_template_directory_uri() . '/js/script.js', array(),'',true);

}
add_action( 'wp_enqueue_scripts', 'tour_scripts' );


/**
 * Функция для подбора шаблона
 */
function my_single_template( $single ) {
    global $wp_query, $post;

    /**
     * Проверяем наличие шаблонов по ID поста.
     * Формат имени файла: single-ID.php
     */
    if ( file_exists( SINGLE_PATH . '/single-' . $post->ID . '.php' ) ) {
        return SINGLE_PATH . '/single-' . $post->ID . '.php';
    }

    /**
     * Проверяем наличие шаблонов для категорий, ищем по ID категории или слагу
     * Формат имени файла: single-cat-SLUG.php или single-cat-ID.php
     */
    foreach ( (array) get_the_category() as $cat ) :

        if ( file_exists( SINGLE_PATH . '/single-cat-' . $cat->slug . '.php' ) ) {
            return SINGLE_PATH . '/single-cat-' . $cat->slug . '.php';
        } elseif ( file_exists( SINGLE_PATH . '/single-cat-' . $cat->term_id . '.php' ) ) {
            return SINGLE_PATH . '/single-cat-' . $cat->term_id . '.php';
        }

    endforeach;

    /**
     * Проверяем наличие шаблонов для тэгов, ищем по ID тэга или слагу
     * Формат имени файла: single-tag-SLUG.php или single-tag-ID.php
     */
    $wp_query->in_the_loop = true;
    foreach ( (array) get_the_tags() as $tag ) :

        if ( file_exists( SINGLE_PATH . '/single-tag-' . $tag->slug . '.php' ) ) {
            return SINGLE_PATH . '/single-tag-' . $tag->slug . '.php';
        } elseif ( file_exists( SINGLE_PATH . '/single-tag-' . $tag->term_id . '.php' ) ) {
            return SINGLE_PATH . '/single-tag-' . $tag->term_id . '.php';
        }

    endforeach;
    $wp_query->in_the_loop = false;

    /**
     * Если ничего не найдено открываем стандартный single.php, (его пока убрал)
     */
    if ( file_exists( SINGLE_PATH . '/single.php' ) ) {
        return SINGLE_PATH . '/single.php';
    }

    return $single;
}

/**
 * @param $html
 * @return mixed
 */
//Функция убирает размеры в картинках
function wph_remove_attributes($html) {
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}
add_filter('post_thumbnail_html', 'wph_remove_attributes', 10);
add_filter('image_send_to_editor', 'wph_remove_attributes', 10);


function my_get_template_part($template, $data = array()){
    extract($data);
    require locate_template($template.'.php');
}

/**
 * Вызываем class для формирования меню
 */
require get_template_directory() . '/inc/solid_navwalker.php';