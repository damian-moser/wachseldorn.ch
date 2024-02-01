<?php
/*
Template Name: archive-page
*/
?>

<?php get_header(); ?>

<main>
    <?php theme_get_pagination(); ?>
    <section>
        <h1>Neuigkeiten</h1>
        <div class="filter-form">
            <button type="button" class="input-btn" onclick="showFilter(this)">Filter anzeigen</button>
            <form method="get" style="display: none;">
                <input
                    class="input"
                    type="text"
                    placeholder="Titel"
                    name="filter_title"
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
            <a class="reset-filter" href="<?php echo esc_url(remove_query_arg(array('filter_title', 'category'))); ?>" style="display: none;">
                <button class="input-btn green">Zurücksetzen</button>
            </a>
        </div>

        <?php
        $args = array(
            'post_type'      => 'post',
            'posts_per_page' => 10,
        );

        if ( isset( $_GET['filter_title'] ) && ! empty( $_GET['filter_title'] ) ) {
            $args['s'] = sanitize_text_field( $_GET['filter_title'] );
        }

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

        echo '<div class="news-container">';
        if ( $query->have_posts() ) :
            while ( $query->have_posts() ) : $query->the_post();
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <a href="<?php the_permalink(); ?>">
                        <div class="post-image">
                            <?php the_post_thumbnail(); ?>
                        </div>
                        <div class="news-wrapper">
                            <div class="news-info">
                                <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512">
                                    <path d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z"/>
                                </svg>
                                <strong><?= get_the_date(); ?></strong>
                            </div>
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
