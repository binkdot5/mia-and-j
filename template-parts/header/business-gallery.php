<?php
/**
 * Displays the gallery module for the business page.
 *
 * @package Mia&J
 * 
 */
?>

<div class="col-10 d-flex justify-content-end">
    <ul class="custom-photo-grid">
        <li id="pg-1">
            <img src="<?php the_field( 'photo_a' ); ?>" class="busimg-1">
        </li>
        <li id="pg-2">
            <img src="<?php the_field( 'photo_b' ); ?>" class="busimg-2">
        </li>
    </ul>
</div>

<div class="col-12">
    <ul class="photo-grid-flexbox d-flex justify-content-end">
        <li id="pg-3">
            <img src="<?php the_field( 'photo_c' ); ?>" class="busimg-3">
        </li>
    </ul>
</div>