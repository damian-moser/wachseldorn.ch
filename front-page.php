<?php get_header(); ?>

<div id="container">
     <div id="homeContainer">
          <h1 id="title">Willkommen in Wachseldorn</h1>
          <a href="#news" id="homeBtn" class="btn">News</a>
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
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <?php the_post_thumbnail(); ?>
                    <a href="<?php the_permalink(); ?>">
                        <div class="news-container">
                            <h2><?php the_title(); ?></h2>
                            <div class="news-content">
                                <?php the_excerpt(); ?>
                            </div>
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
        ?>
        <p id="go-to-news" title="Zu allen Nachrichten">
            <a class="btn" href="<?php echo home_url() . '/aktuell'?>">Gehe zu allen Nachrichten →</a>
        </p>
        <?php
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