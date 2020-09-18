<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since Twenty Nineteen 1.0
 */

get_header(); 
?>

    <aside id="address">
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
            <h4>
                <a href="https://facebook.com/miaandj" target="_blank">facebook</a>
                |
                <a href="https://instagram.com/thisismiaandj" target="_blank">instagram</a>
            </h4>
        </div>
    </aside>
    
    <section id="summary"> 
        <h2 class="hidden">Body</h2>
        <div class="pt-3">
            <?php
                $page = get_post(); 
                $content = apply_filters( 'the_content', $page->post_content ); 
                echo $content;  
            ?>
        </div>
    </section>
    
<?php 
get_footer();