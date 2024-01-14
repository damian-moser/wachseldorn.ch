<?php get_header(); ?>

<main>
     <section>
          <div id="notFound">
               <h1>404 - Seite nicht gefunden</h1>
               <div>
                    <a class="btn" href="javascript:window.history.back();">zurück</a>
                    <a class="btn" href="<?php echo home_url() ?>">Homepage</a>
               </div>
          </div>
     </section>
</main>

<?php get_footer(); ?>