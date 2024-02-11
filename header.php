<!DOCTYPE html>
<html lang="de" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon.ico">
    <?php wp_head(); ?>
</head>
<body>
<div id="root">
    <header>
        <div class="header-content">
            <div class="wrapper">
                <div class="wappen">
                    <a href="<?php echo home_url(); ?>">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/wachseldorn.svg" alt="Wappen Wachseldorn">
                        <h4>Gemeinde Wachseldorn</h4>
                    </a>
                    <div class="search-mobile">
                        <a href="<?= home_url() . '?s' ?>" class="search-header">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 512 512">
                                <path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/>
                            </svg>
                        </a>
                        <div class="mobile" onclick="changeMobileBars(this)">
                            <div class="first"></div>
                            <div class="second"></div>
                            <div class="third"></div>
                        </div>
                    </div>
                </div>
                <nav>
                <?php
                    wp_nav_menu(array(
                        'theme_location' => 'desktop',
                        'container' => '',
                    ));
                ?>
                </nav>
            </div>
        </div>
        <div class="dropdown" style="display: none;">
            <div class="dropdown-container">
                <div class="dropdown-content"></div>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/xmark.svg" class="close-menu" alt="Menu schliessen" title="schliessen">
            </div>
        </div>
        <div class="mobile-menu" style="visibility: hidden; display: none;">
            <div class="menu-content">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'mobile',
                    'container' => '',
                ));
                ?>
            </div>
        </div>
    </header>