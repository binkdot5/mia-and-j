<?php
/**
 * The header with just the logo.
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
<main class="container-fluid canvas">    
<h1 class="hidden">miaandj.com</h1>
    <header>
        <h2 class="hidden">Header</h2>
        <div class="row">
            <div class="col-2">
                <h3 class="hidden">mia&j Logo</h3>
                <?php 
                    $custom_logo_id = get_theme_mod( 'custom_logo' );
                    $custom_logo_url = wp_get_attachment_image_url( $custom_logo_id , 'full' );
                    echo '<a class="top-layer" href="' . esc_url( home_url( '/' ) ) . '"><img id="logo" src="' . esc_url( $custom_logo_url ) . '" alt="mia and j logo"> </a>';
                ?>
            </div>
            <?php 
                if ( is_front_page( 'home' ) ) :
                    get_template_part( '/template-parts/header/index-header', 'header' );
                else :
                    null;
                endif;
             ?>
        </div>
    </header>