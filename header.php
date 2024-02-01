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
                    <div class="mobile" onclick="changeMobileBars(this)">
                        <div class="first"></div>
                        <div class="second"></div>
                        <div class="third"></div>
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