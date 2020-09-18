<?php
/**
 * The search-form template.
 *
 * @package Mia&J
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}
?>
<form class="form-inline" role="search" method="get" action="<?php get_home_url() ?>">
    <div class="searchModal">
        <div class="modalExit">
            <h4>search</h4>
            <a class="closeBtn"><i class="iconexitMob icon-close"></i></a>
        </div>
        <div class="searchForm">
            <input class="search" type="search" id="search" value="<?php the_search_query(); ?>" name="s">
            <button class="searchBtn search-icon-inline" type="submit" value="Search"><i class="iconsearchMob icon-search"></i></button>
        </div>
    </div>
    <a class="searchbtnMob search-icon-inline"><i class="icon-search"></i></a>
</form>