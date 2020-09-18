<?php
/**
 * The header for the Shop page
 *
 * This is the template that displays all of the <head> section and everything up until <section>
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Mia&J
 * 
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title(); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <main>    
        <h1 class="hidden">miaandj.com</h1>
        <header class="bottom-space">
            <?php
                get_template_part( '/template-parts/header/shop-header', 'header' );
            ?>
        </header>