<?php get_header(); ?>

<div id="container">
     <div id="homeContainer">
          <h1 id="title">Willkommen in Wachseldorn</h1>
          <a href="#news" id="homeBtn">News</a>
     </div>
</div>

<main>
    <section id="news">
        <h1>Aktuelles</h1>
        <?php
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => 2,
            'order' => 'DESC',
        );

        $query = new WP_Query($args);

        echo '<div id="news-container">';
        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post();
                ?>
                <article style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>');" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <a href="<?php the_permalink(); ?>">
                        <h2><?php the_title(); ?></h2>
                        <div class="news-content">
                            <?php the_content(); ?>
                        </div>
                    </a>
                </article>
            <?php
            endwhile;
            wp_reset_postdata();
        else :
            echo 'Zurzeit gibt es keine Nachrichten';
        endif;
        echo '</div>';
        echo '<a href="' . home_url() . '/aktuell' . '">Alle Beiträge anzeigen</a>';

            if(have_posts()){
                while(have_posts()){
                    the_post();
                    the_content();
                }
            }
        ?>
    </section>
</main>

<?php get_footer(); ?>