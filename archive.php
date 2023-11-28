<?php
/*
Template Name: Archivseite
*/
?>

<?php get_header(); ?>

<main>
    <?php dmo140748_get_pagination(); ?>
    <section>
        <?php
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => -1,
                'order' => 'DESC',
            );

            $query = new WP_Query($args);
            echo '<h1>Neuigkeiten</h1>';
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
    </section>
</main>

<?php get_footer(); ?>
