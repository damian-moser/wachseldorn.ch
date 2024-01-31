<?php get_header(); ?>

<div class="bg-image">
     <div class="welcome">
          <h1 class="welcome-title">Willkommen in Wachseldorn</h1>
          <a href="/neuigkeiten" class="btn news-btn">News</a>
     </div>
</div>
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