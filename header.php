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
        <div id="header-content">
            <div id="wrapper">
                <div id="wappen">
                    <a id="home" href="<?php echo home_url(); ?>">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/wachseldorn.svg" alt="Wappen Wachseldorn">
                        <h4>Gemeinde Wachseldorn</h4>
                    </a>
                    <div id="mobile" onclick="changeMobileBars(this)">
                        <div id="bar-top"></div>
                        <div id="bar-middle"></div>
                        <div id="bar-bottom"></div>
                    </div>
                </div>
                <!-- DESKTOP MENU -->
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
        <div id="dropdown" style="display: none;">
            <div id="dropdown-container">
                <div id="dropdown-content"></div>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/xmark.svg" id="closeMenu" alt="Menu schliessen" title="schliessen">
            </div>
        </div>
        <!-- MOBILE MENU -->
        <div id="menu" style="visibility: hidden; display: none;">
            <div id="menu-content">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'mobile',
                    'container' => '',
                ));
                ?>
            </div>
        </div>
    </header>