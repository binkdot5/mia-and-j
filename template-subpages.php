<?php
/*
Template Name: Subpages
*/
?>

<?php get_header(); ?>
    <section id="body">
        <h2 class="hidden">Page Title</h2>
        <div class="mjTitle the-cookies">
            <?php the_title( '<h3>', '</h3>' ); ?>
        </div> 
        <h2 class="hidden">Body</h2>
        <?php
            $page = get_post(); 
            $content = apply_filters( 'the_content', $page->post_content ); 
            echo $content;  
        ?>
    </section>
<?php get_footer(); ?>