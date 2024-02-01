<?php get_header(); ?>

<main>
     <section>
          <p style="margin-bottom: 2rem;"><a href="javascript:history.back();" class="btn no-link">← zurück</a></p>
          <?php while (have_posts()) : the_post(); ?>
               <div id="singe-post">
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                         <header class="entry-header">
                              <h1 class="entry-title"><?php the_title(); ?></h1>
                              <div class="entry-meta">
                                   <span>Veröffentlicht am
                                        <strong><?php echo get_the_date(); ?></strong>
                                   </span>
                                   <span>Verfasst von
                                        <strong><?php echo ucfirst(get_the_author()); ?></strong>
                                   </span>
                              </div>
                         </header>
                         <div class="entry-content">
                              <?php
                                   if (has_post_thumbnail()) {
                                        echo '<div class="post-thumbnail">';
                                        echo the_post_thumbnail();
                                        echo '</div>';
                                   }
                                   echo '<div class="post-content">';
                                   the_content();
                                   echo '</div>';
                              ?>
                         </div>
                    </article>
               </div>
          <?php endwhile; ?>
     </section>
</main>

<?php get_footer(); ?>
