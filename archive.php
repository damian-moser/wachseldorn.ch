<?php
/*
Template Name: Archivseite
*/
?>

<?php get_header(); ?>

<main>
    <?php dmo140748_get_pagination(); ?>
    <section>
        <h1>Neuigkeiten</h1>
        <div id="filter-form">
            <button type="button" class="input-btn" onclick="showFilter(this)">Filter anzeigen</button>
            <form method="get" style="display: none;">
                <input
                    class="input"
                    type="text"
                    placeholder="Titel"
                    name="filter_title"
                    id="filter_title"
                    value="<?php echo ( isset( $_GET['filter_title'] ) ) ? esc_attr( $_GET['filter_title'] ) : ''; ?>"
                    autocomplete="off"
                    spellcheck="false"
                    autofocus
                >

                <?php
                $categories = get_categories();

                if ( $categories ) :
                    ?>
                    <select name="category" class="input">
                        <option value="">Alle Kategorien</option>
                        <?php
                        foreach ( $categories as $category ) {
                            $selected = ( isset( $_GET['category'] ) && $_GET['category'] == $category->term_id ) ? 'selected' : '';
                            echo '<option value="' . esc_attr( $category->term_id ) . '" ' . $selected . '>' . esc_html( $category->name ) . '</option>';
                        }
                        ?>
                    </select>
                <?php endif; ?>
                <input class="input-btn" type="submit" value="Filtern">
            </form>
            <a id="reset-filter" href="<?php echo esc_url(remove_query_arg(array('filter_title', 'category'))); ?>" style="display: none;">
                <button class="input-btn green">Zurücksetzen</button>
            </a>
        </div>

        <?php
        $args = array(
            'post_type'      => 'post',
            'posts_per_page' => 10,
        );

        // Filter nach Titel
        if ( isset( $_GET['filter_title'] ) && ! empty( $_GET['filter_title'] ) ) {
            $args['s'] = sanitize_text_field( $_GET['filter_title'] );
        }

        // Filter nach Kategorien
        if ( isset( $_GET['category'] ) && ! empty( $_GET['category'] ) ) {
            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'category',
                    'field'    => 'id',
                    'terms'    => intval( $_GET['category'] ),
                ),
            );
        }

        $query = new WP_Query( $args );

        echo '<div id="news-container">';
        if ( $query->have_posts() ) :
            while ( $query->have_posts() ) : $query->the_post();
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
        wp_reset_postdata();
        ?>
    </section>
</main>

<?php get_footer(); ?>
