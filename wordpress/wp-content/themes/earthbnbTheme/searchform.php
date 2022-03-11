<form action="<?php esc_url(home_url('/liste-annonces/')); ?>">
    <input type="search" placeholder="Search" aria-label="Search" name="s" value="<?= get_search_query(); ?>">
    <button type="submit">Chercher</button> <!-- a remplacer par icone loupe -->
</form>