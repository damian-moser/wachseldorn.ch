<?php get_header(); ?>

<main>
     <div class="page-banner">
          <?php
               if (has_post_thumbnail()) {
                    the_post_thumbnail();
               }
          ?>
     </div>

     <?php dmo140748_get_pagination(); ?>
     <section>
          <h1><?php the_title(); ?></h1>
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