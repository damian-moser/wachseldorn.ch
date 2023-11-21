    <footer>
        <div id="footerDiv">
            <a href="<?php echo home_url(); ?>" id="linkToHome">
                <img src="<?php echo get_template_directory_uri() . "/assets/img/" ?>wachseldorn.svg" alt="Home">
            </a>
            <?php
                wp_nav_menu(array(
                    'theme_location' => 'footer',
                    'container' => '',
                ));
            ?>
            <hr>
            <div id="footerRights">
                <p>Gemeinde Wachseldorn</p>
                <div>
                    <a href="<?php echo home_url() . '/datenschutz' ?>">Datenschutzerklärung</a><span style="color: #ffffff;"> |</span>
                    <a href="<?php echo home_url() . '/impressum' ?>">Impressum</a>
                </div>
            </div>
        </div>
    </footer>
</div>