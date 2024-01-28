    <footer>
        <div id="footer">
            <div id="footer-wrapper">
                <a href="<?= home_url(); ?>" id="home-link">
                    <img src="<?= get_template_directory_uri() . "/assets/img/" ?>wachseldorn.svg" alt="Home">
                </a>
                <a class="link-white" href="<?= home_url() . "/wp-admin/"; ?>" target="_blank" rel="noopener">Login➚</a>
            </div>
            <div id="footer-infos">
                <div>
                    <h2>Öffnungszeiten</h2>
                    <table>
                        <tbody>
                        <tr>
                            <td>Dienstag</td>
                            <td><strong>07.30 Uhr bis 11.30 Uhr</strong></td>
                        </tr>
                        <tr>
                            <td>Donnerstag</td>
                            <td><strong>07.00 Uhr bis 11.30 Uhr</strong></td>
                        </tr>
                        </tbody>
                    </table>
                    <p>Telefonisch sind wir täglich unter der Telefonnummer <a class="link" href="tel:0334531054">033 453 10 54</a> erreichbar.</p>
                </div>
                <div>
                    <h2>Adresse</h2>
                    <strong>Süderen 63 a, 3618 Süderen</strong>
                </div>
            </div>
            <?php
                wp_nav_menu(array(
                    'theme_location' => 'footer',
                    'container' => '',
                ));
            ?>
            <hr>
            <div id="footer-cred">
                <a class="link-white" href="<?= home_url(); ?>">Gemeinde Wachseldorn</a>
                <a class="link-white" href="https://damian.work" target="_blank" rel="noopener">&copy;2024 by Damian</a>
                <div>
                    <a class="link-white" href="<?php echo home_url() . '/datenschutz' ?>">Datenschutzerklärung</a><span style="color: #ffffff;"> |</span>
                    <a class="link-white" href="<?php echo home_url() . '/impressum' ?>">Impressum</a>
                </div>
            </div>
        </div>
        <?php wp_footer(); ?>
    </footer>
    <button id="backToTopBtn" onclick="scrollToTop()">
        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#000000" viewBox="0 0 448 512"><path d="M201.4 137.4c12.5-12.5 32.8-12.5 45.3 0l160 160c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L224 205.3 86.6 342.6c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3l160-160z"/></svg>
    </button>
</div>