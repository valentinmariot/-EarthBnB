<div class="home-search">
    <img class="home-search__bg" src="https://wallpaperaccess.com/full/1683478.jpg">
        <div class="home-search__container-title">
            <h1 class="home-search__title">Quelle sera votre prochaine destination ?</h1>
            <div class="home-search__container-form">
                <form class="home-search__form" action="<?php esc_url(home_url('/liste-annonces/')); ?>">
                    <input class="home-search__input" type="search" placeholder="Commencez votre recherche" aria-label="Search" name="s" value="<?= get_search_query(); ?>">
                    <button class="home-search__btn fa-solid fa-magnifying-glass" type="submit"></button>
                </form>
                <div class="home-search__container-link">
                    <a class="home-search__link"ref="/liste-annonces/">Je suis flexible</a>
                </div>
            </div>
        </div>
    </img>
</div>

