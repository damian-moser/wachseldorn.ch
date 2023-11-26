<?php get_header(); ?>

<main>
     <section>
          <?php
          dmo140748_get_pagination();

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