<?php get_header(); ?>

<main>
     <section>
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