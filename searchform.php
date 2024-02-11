<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div>
        <label class="screen-reader-text" for="s"><?php echo _x( 'Search for:', 'label'); ?></label>
        <input type="text" value="<?= get_search_query(); ?>" name="s" id="s" placeholder="Suchbegriff" autocomplete="off" autofocus />
        <input type="submit" id="searchsubmit" value="<?php echo esc_attr_x( 'Suchen', 'submit button' ) ?>" />
    </div>
</form>
