<?php
function theme_get_menu_pages() {
    $menu_locations = get_nav_menu_locations();
    $menu_id = $menu_locations['desktop'];

    $menu_items = wp_get_nav_menu_items($menu_id);
    $menu_pages = array();

    foreach ($menu_items as $menu_item) {
        $menu_pages[] = get_post($menu_item->object_id);
    }

    return $menu_pages;
}

function theme_get_page_index_in_menu($current_page_id, $menu_pages) {
    $current_page_index = 0;

    foreach ($menu_pages as $index => $page) {
        if ($page->ID == $current_page_id) {
            $current_page_index = $index;
            break;
        }
    }

    return $current_page_index;
}

function theme_get_prev_page() {
    $menu_pages = theme_get_menu_pages();
    $current_page_id = get_the_ID();
    $current_page_index = theme_get_page_index_in_menu($current_page_id, $menu_pages);

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

function theme_get_next_page() {
    $menu_pages = theme_get_menu_pages();
    $current_page_id = get_the_ID();
    $current_page_index = theme_get_page_index_in_menu($current_page_id, $menu_pages);

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

function theme_get_pagination() {
    echo '<div class="pagination-control">';
    echo theme_get_prev_page();
    echo theme_get_next_page();
    echo '</div>';
}

function theme_theme_support() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'theme_theme_support');

function theme_register_styles() {
    $version = wp_get_theme()->get('Version');
    $dir = get_template_directory_uri() . '/assets/css/style.';

    wp_enqueue_style('theme-style-init', $dir . 'init.css', array(), $version, 'all');
    wp_enqueue_style('theme-style-root', $dir . 'root.css', array(), $version, 'all');
    wp_enqueue_style('theme-style-header', $dir . 'header.css', array(), $version, 'all');
    wp_enqueue_style('theme-style-footer', $dir . 'footer.css', array(), $version, 'all');
    wp_enqueue_style('theme-style-front-page', $dir . 'front-page.css', array(), $version, 'all');
    wp_enqueue_style('theme-style-single', $dir . 'single.css', array(), $version, 'all');
    wp_enqueue_style('theme-style-wordpress', $dir . 'wordpress.css', array(), $version, 'all');
    wp_enqueue_style('theme-style-news', $dir . 'news.css', array(), $version, 'all');
    wp_enqueue_style('theme-style-mobile-menu', $dir . 'mobile-menu.css', array(), $version, 'all');
    wp_enqueue_style('theme-style-desktop-menu', $dir . 'desktop-menu.css', array(), $version, 'all');
    wp_enqueue_style('theme-style-search-results', $dir . 'search-results.css', array(), $version, 'all');
}

add_action('wp_enqueue_scripts', 'theme_register_styles');

function theme_register_scripts() {
    wp_enqueue_script('theme-script', get_template_directory_uri() . '/assets/js/script.js', array(), wp_get_theme()->get('Version'), array('strategy' => 'defer'));
}

add_action('wp_enqueue_scripts', 'theme_register_scripts');

function theme_menus() {
    $locations = array(
        'desktop' => 'Desktop Navigation',
        'mobile'  => 'Mobile Navigation',
        'footer'  => 'Footer Navigation',
    );

    register_nav_menus($locations);
}

add_action('init', 'theme_menus');
