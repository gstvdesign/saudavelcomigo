<form action="/" method="get" accept-charset="utf-8" id="searchform" role="search">
  <div class="search">
    <label class="search_title" for="s">Procurando alguma coisa?</label>
    <input class="search_input" type="text" name="s" id="s" value="<?php the_search_query(); ?>" placeholder="Busca…"/>
    <input class="search_button" type="submit" id="searchsubmit" value="Search" />
  </div>
</form>