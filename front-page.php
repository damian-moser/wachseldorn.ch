<?php get_header(); ?>

<div id="container">
     <div id="homeContainer">
          <h1 id="title">Willkommen in Wachseldorn</h1>
          <a href="/neuigkeiten" id="homeBtn" class="btn">News</a>
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