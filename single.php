<?php get_header(); ?>

<main>
     <section>
          <?php while (have_posts()) : the_post(); ?>

               <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                         <h1 class="entry-title"><?php the_title(); ?></h1>
                         <div class="entry-meta">
                              <span class="posted-on"><?php echo 'Veröffentlicht am ' . get_the_date(); ?></span>
                              <span class="byline"><?php echo 'Verfasst von ' . get_the_author(); ?></span>
                         </div>
                    </header>

                    <div class="entry-content">
                         <?php
                         if (has_post_thumbnail()) {
                              echo '<div class="post-thumbnail">';
                              the_post_thumbnail();
                              echo '</div>';
                         }
                         the_content();
                         ?>
                    </div>

                    <footer class="entry-footer">
                         <?php wachseldorn_entry_footer(); ?>
                    </footer>
               </article>

          <?php endwhile; ?>
     </section>
</main>

<?php get_footer(); ?>
