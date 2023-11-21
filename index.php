<?php
get_header();

if (have_posts()) :
    while (have_posts()) : the_post();
        the_title();
        the_content();
    endwhile;
else :
    echo '<p>Es wurden keine Beiträge gefunden.</p>';
endif;

get_footer();
