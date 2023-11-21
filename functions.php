<?php
if (!function_exists('wachseldorn_posted_on')) {
    function wachseldorn_posted_on() {
        echo 'Veröffentlicht am ' . get_the_date();
    }
}

if (!function_exists('wachseldorn_posted_by')) {
    function wachseldorn_posted_by() {
        echo 'Verfasst von ' . get_the_author();
    }
}

if (!function_exists('wachseldorn_entry_footer')) {
    function wachseldorn_entry_footer() {
        echo 'Fußbereich des Eintrags';
    }
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
