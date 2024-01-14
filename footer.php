    <footer>
        <div id="footer">
            <div id="footer-wrapper">
                <a href="<?php echo home_url(); ?>" id="home-link">
                    <img src="<?php echo get_template_directory_uri() . "/assets/img/" ?>wachseldorn.svg" alt="Home">
                </a>
                <a id="admin" href="<?php echo home_url() . "/wp-admin/"; ?>">Login</a>
            </div>
            <?php
                wp_nav_menu(array(
                    'theme_location' => 'footer',
                    'container' => '',
                ));
            ?>
            <hr>
            <div id="footer-cred">
                <p>Gemeinde Wachseldorn</p>
                <a href="https://damian.work" target="_blank" rel="noopener">&copy;2024 by Damian</a>
                <div>
                    <a href="<?php echo home_url() . '/datenschutz' ?>">Datenschutzerklärung</a><span style="color: #ffffff;"> |</span>
                    <a href="<?php echo home_url() . '/impressum' ?>">Impressum</a>
                </div>
            </div>
        </div>
        <?php wp_footer(); ?>
    </footer>
</div>