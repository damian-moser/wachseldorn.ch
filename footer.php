<svg class="footer-waves" viewBox="0 0 1920 360" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" >
    <path d="M0 181L29.2 194.2C58.3 207.3 116.7 233.7 174.8 240.8C233 248 291 236 349.2 212C407.3 188 465.7 152 523.8 144.5C582 137 640 158 698.2 181.8C756.3 205.7 814.7 232.3 872.8 223.7C931 215 989 171 1047.2 159.3C1105.3 147.7 1163.7 168.3 1221.8 192C1280 215.7 1338 242.3 1396.2 229.2C1454.3 216 1512.7 163 1570.8 145.2C1629 127.3 1687 144.7 1745.2 155.5C1803.3 166.3 1861.7 170.7 1890.8 172.8L1920 175L1920 361L1890.8 361C1861.7 361 1803.3 361 1745.2 361C1687 361 1629 361 1570.8 361C1512.7 361 1454.3 361 1396.2 361C1338 361 1280 361 1221.8 361C1163.7 361 1105.3 361 1047.2 361C989 361 931 361 872.8 361C814.7 361 756.3 361 698.2 361C640 361 582 361 523.8 361C465.7 361 407.3 361 349.2 361C291 361 233 361 174.8 361C116.7 361 58.3 361 29.2 361L0 361Z" fill="#5c9343"></path>
    <path d="M0 167L29.2 161.3C58.3 155.7 116.7 144.3 174.8 164.8C233 185.3 291 237.7 349.2 239.3C407.3 241 465.7 192 523.8 191.7C582 191.3 640 239.7 698.2 264.8C756.3 290 814.7 292 872.8 285C931 278 989 262 1047.2 235.3C1105.3 208.7 1163.7 171.3 1221.8 156.3C1280 141.3 1338 148.7 1396.2 175.2C1454.3 201.7 1512.7 247.3 1570.8 263.2C1629 279 1687 265 1745.2 246.5C1803.3 228 1861.7 205 1890.8 193.5L1920 182L1920 361L1890.8 361C1861.7 361 1803.3 361 1745.2 361C1687 361 1629 361 1570.8 361C1512.7 361 1454.3 361 1396.2 361C1338 361 1280 361 1221.8 361C1163.7 361 1105.3 361 1047.2 361C989 361 931 361 872.8 361C814.7 361 756.3 361 698.2 361C640 361 582 361 523.8 361C465.7 361 407.3 361 349.2 361C291 361 233 361 174.8 361C116.7 361 58.3 361 29.2 361L0 361Z" fill="#3f652e"></path>
    <path d="M0 246L29.2 240.7C58.3 235.3 116.7 224.7 174.8 236.2C233 247.7 291 281.3 349.2 284C407.3 286.7 465.7 258.3 523.8 257.3C582 256.3 640 282.7 698.2 286.5C756.3 290.3 814.7 271.7 872.8 259C931 246.3 989 239.7 1047.2 235.2C1105.3 230.7 1163.7 228.3 1221.8 235.5C1280 242.7 1338 259.3 1396.2 256.3C1454.3 253.3 1512.7 230.7 1570.8 234.5C1629 238.3 1687 268.7 1745.2 270.3C1803.3 272 1861.7 245 1890.8 231.5L1920 218L1920 361L1890.8 361C1861.7 361 1803.3 361 1745.2 361C1687 361 1629 361 1570.8 361C1512.7 361 1454.3 361 1396.2 361C1338 361 1280 361 1221.8 361C1163.7 361 1105.3 361 1047.2 361C989 361 931 361 872.8 361C814.7 361 756.3 361 698.2 361C640 361 582 361 523.8 361C465.7 361 407.3 361 349.2 361C291 361 233 361 174.8 361C116.7 361 58.3 361 29.2 361L0 361Z" fill="#243a1a"></path>
</svg>
    <footer>
        <div class="footer-content">
            <div class="footer-navigation">
                <a href="<?= home_url(); ?>" >
                    <img src="<?= get_template_directory_uri() . "/assets/img/" ?>wachseldorn.svg" alt="Home">
                </a>
                <a class="link-white" href="<?= home_url() . "/wp-admin/"; ?>" target="_blank" rel="noopener">Login➚</a>
            </div>
            <div class="footer-info">
                <div>
                    <h2>Öffnungszeiten</h2>
                    <table>
                        <tbody>
                        <tr>
                            <td>Dienstag</td>
                            <td>07.30 Uhr bis 11.30 Uhr</td>
                        </tr>
                        <tr>
                            <td>Donnerstag</td>
                            <td>07.00 Uhr bis 11.30 Uhr</td>
                        </tr>
                        </tbody>
                    </table>
                    <p>Telefonisch sind wir täglich unter der Telefonnummer <a class="link-white" href="tel:0334531054">033 453 10 54</a> erreichbar.</p>
                </div>
                <div>
                    <h2>Adresse</h2>
                    <p>Süderen 63 a, 3618 Süderen</p>
                </div>
            </div>
            <?php
            wp_nav_menu(array(
                'theme_location' => 'footer',
                'container' => '',
            ));
            ?>
            <hr>
            <div class="footer-cred">
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

    <button class="top-btn" onclick="scrollToTop()">
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 448 512">
            <path d="M201.4 137.4c12.5-12.5 32.8-12.5 45.3 0l160 160c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L224 205.3 86.6 342.6c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3l160-160z"/>
        </svg>
    </button>
</div>