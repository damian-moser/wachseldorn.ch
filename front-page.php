<?php get_header(); ?>

<div id="bg-image">
     <div id="welcome">
          <h1 id="title">Willkommen in Wachseldorn</h1>
          <a href="/neuigkeiten" id="news-btn" class="btn">News</a>
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