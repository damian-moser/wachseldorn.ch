<?php get_header(); ?>

<main>
     <section>
          <p class="mb-2"><a href="javascript:history.back();" class="btn">← zurück</a></p>
          <?php while (have_posts()) : the_post(); ?>
               <div id="singe-post">
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                         <header class="entry-header">
                              <h1 class="entry-title"><?php the_title(); ?></h1>
                              <div class="entry-meta">
                                   <span>Veröffentlicht am
                                        <span class="bold"><?php echo get_the_date(); ?></span>
                                   </span>
                                   <span>Verfasst von
                                        <span class="bold"><?php echo ucfirst(get_the_author()); ?></span>
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
