<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Mia&J
 * 
 */

get_header();
?>

<section id="body">
    <h2 class="hidden">Page Title</h2>
    <div class="mjTitle">
        <h3 class="page-not-found">page not found</h3>
    </div> 
    <h2 class="hidden">Body</h2>
    <?php
        $page = get_post(); 
        $content = apply_filters( 'the_content', $page->post_content ); 
        echo $content;  
    ?>
</section>

<?php
get_footer();
