<?php
function dmo140748_get_page_index(){
    $current_page_index = 0;
    foreach (get_pages() as $index => $page) {
        if ($page->ID == get_the_ID()) {
            $current_page_index = $index;
            break;
        }
    }

    return $current_page_index;
}

function dmo140748_get_prev_page(){
    $pages = get_pages();
    $current_page_index = dmo140748_get_page_index();

    $prev = ($current_page_index > 0) ? $pages[$current_page_index - 1] : null;
    if($prev){
        echo '<a class="btn" href="' . get_permalink($prev->ID) . '">← ' . $prev->post_title . '</a>';
    } else {
        echo '<p></p>';
    }
}

function dmo140748_get_next_page(){
    $pages = get_pages();
    $current_page_index = dmo140748_get_page_index();

    $next = ($current_page_index < count($pages) - 1) ? $pages[$current_page_index + 1] : null;
    if($next){
        echo '<a class="btn" href="' . get_permalink($next->ID) . '">' . $next->post_title . ' →</a>';
    } else {
        echo '<p></p>';
    }
}

function dmo140748_get_pagination(){
    echo '<div class="pagination-control">';
    echo dmo140748_get_prev_page();
    echo dmo140748_get_next_page();
    echo '</div>';
}

function dmo140748_theme_support() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'dmo140748_theme_support');

function dmo140748_register_styles() {
    $version = wp_get_theme()->get('Version');
    wp_enqueue_style('dmo140748-style-root', get_template_directory_uri() . '/assets/css/root.css', array(), $version, 'all');
    wp_enqueue_style('dmo140748-style-header', get_template_directory_uri() . '/assets/css/header.css', array(), $version, 'all');
    wp_enqueue_style('dmo140748-style-footer', get_template_directory_uri() . '/assets/css/footer.css', array(), $version, 'all');
    wp_enqueue_style('dmo140748-style-home', get_template_directory_uri() . '/assets/css/home.css', array(), $version, 'all');
    wp_enqueue_style('dmo140748-style-single', get_template_directory_uri() . '/assets/css/single.css', array(), $version, 'all');
}

add_action('wp_enqueue_scripts', 'dmo140748_register_styles');

function dmo140748_register_scripts() {
    $version = wp_get_theme()->get('Version');
    wp_enqueue_script('dmo140748-script', get_template_directory_uri() . '/assets/js/script.js', array(), $version, array('strategy' => 'defer'));
}

add_action('wp_enqueue_scripts', 'dmo140748_register_scripts');

function dmo140748_menus() {
    $locations = array(
        'desktop' => 'Desktop Navigation',
        'mobile'  => 'Mobile Navigation',
        'footer'  => 'Footer Navigation',
    );

    register_nav_menus($locations);
}

add_action('init', 'dmo140748_menus');

if (!current_user_can('administrator')) {
    add_filter('show_admin_bar', '__return_false');
}
