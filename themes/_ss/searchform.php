<?php ?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
	<i class="fa fa-search"></i>
    <input type="search" class="search-field" placeholder="<?php echo esc_attr( 'Search..' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" title="検索:" />
</form>

