<?php
/**
 * The template for displaying the default page template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Mia&J
 * 
 */

if ( is_page( array('cart', 'checkout', 'shop', 'my-account') ) ) :
    get_header( 'shop' );
    else :
        get_header('alt');
    endif;    
?>
    <?php

    if ( is_page('home') ) :

        echo (
        '<aside id="address">
            <h2 class="hidden">Address</h2>
            <div class="mjAddress">
                <h2>b35</h2>
                <h4>udyog vihar phase V
                    <br />
                    gurgaon, haryana 122016
                    <br />
                    india | <a href="tel:+91971775350">+91971775350</a>
                </h4>
            </div>
            <div class="mjContact">
                <h4>
                    <a href="mailto:hi@miaandj.com">hi@miaandj.com</a>
                </h4>
                <h3>
                    <a href="https://facebook.com/miaandj" target="_blank">facebook</a>
                    |
                    <a href="https://instagram.com/thisismiaandj" target="_blank">instagram</a>
                </h3>
            </div>
        </aside>' );

            else :

                null;

            endif;
    ?>
    
    <section id="body"> 
        <h2 class="hidden">Body</h2>
        <?php
            $page = get_post(); 
            $content = apply_filters( 'the_content', $page->post_content ); 
            echo $content;  
        ?>
    </section>
    
<?php 
get_footer();
