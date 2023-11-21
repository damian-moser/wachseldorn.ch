<?php
/*
Template Name: Archivseite
*/
?>

<?php get_header(); ?>

<main>
    <section>
        <?php
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => -1,
            'order' => 'DESC',
        );

        $query = new WP_Query($args);
        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post();
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <div class="entry-meta">
                            <span class="posted-on"><?php echo 'Veröffentlicht am ' . get_the_date(); ?></span>
                            <span class="byline"><?php echo 'Verfasst von ' . get_the_author(); ?></span>
                        </div>
                    </header>
                    <div class="entry-content">
                        <?php the_excerpt(); ?>
                    </div>
                    <footer class="entry-footer">
                        <?php wachseldorn_entry_footer(); ?>
                    </footer>
                </article>
            <?php
            endwhile;
            wp_reset_postdata();
        else :
            ?>
            <p><?php echo 'Es wurden keine Beiträge gefunden.'; ?></p>
        <?php endif; ?>
    </section>
</main>

<?php get_footer(); ?>
