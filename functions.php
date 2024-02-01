<?php
function dmo140748_get_menu_pages() {
    $menu_locations = get_nav_menu_locations();
    $menu_id = $menu_locations['desktop'];

    $menu_items = wp_get_nav_menu_items($menu_id);
    $menu_pages = array();

    foreach ($menu_items as $menu_item) {
        $menu_pages[] = get_post($menu_item->object_id);
    }

    return $menu_pages;
}

function dmo140748_get_page_index_in_menu($current_page_id, $menu_pages) {
    $current_page_index = 0;

    foreach ($menu_pages as $index => $page) {
        if ($page->ID == $current_page_id) {
            $current_page_index = $index;
            break;
        }
    }

    return $current_page_index;
}

function dmo140748_get_prev_page() {
    $menu_pages = dmo140748_get_menu_pages();
    $current_page_id = get_the_ID();
    $current_page_index = dmo140748_get_page_index_in_menu($current_page_id, $menu_pages);

    $prev_index = $current_page_index - 1;

    while ($prev_index >= 0) {
        if ($menu_pages[$prev_index]->ID !== $current_page_id) {
            $prev = $menu_pages[$prev_index];
            break;
        }
        $prev_index--;
    }

    if (isset($prev)) {
        echo '<a class="btn" href="' . get_permalink($prev->ID) . '">← ' . $prev->post_title . '</a>';
    } else {
        echo '<p></p>';
    }
}

function dmo140748_get_next_page() {
    $menu_pages = dmo140748_get_menu_pages();
    $current_page_id = get_the_ID();
    $current_page_index = dmo140748_get_page_index_in_menu($current_page_id, $menu_pages);

    $next_index = $current_page_index + 1;

    while ($next_index < count($menu_pages)) {
        if ($menu_pages[$next_index]->ID !== $current_page_id) {
            $next = $menu_pages[$next_index];
            break;
        }
        $next_index++;
    }

    if (isset($next)) {
        echo '<a class="btn" href="' . get_permalink($next->ID) . '">' . $next->post_title . ' →</a>';
    } else {
        echo '<p></p>';
    }
}

function dmo140748_get_pagination() {
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
    $dir = get_template_directory_uri() . '/assets/css/style.';

    wp_enqueue_style('dmo140748-style-root', $dir . 'root.css', array(), $version, 'all');
    wp_enqueue_style('dmo140748-style-header', $dir . 'header.css', array(), $version, 'all');
    wp_enqueue_style('dmo140748-style-footer', $dir . 'footer.css', array(), $version, 'all');
    wp_enqueue_style('dmo140748-style-front-page', $dir . 'front-page.css', array(), $version, 'all');
    wp_enqueue_style('dmo140748-style-single', $dir . 'single.css', array(), $version, 'all');
    wp_enqueue_style('dmo140748-style-wordpress', $dir . 'wordpress.css', array(), $version, 'all');
    wp_enqueue_style('dmo140748-style-news', $dir . 'news.css', array(), $version, 'all');
}

add_action('wp_enqueue_scripts', 'dmo140748_register_styles');

function dmo140748_register_scripts() {
    wp_enqueue_script('dmo140748-script', get_template_directory_uri() . '/assets/js/script.js', array(), wp_get_theme()->get('Version'), array('strategy' => 'defer'));
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
