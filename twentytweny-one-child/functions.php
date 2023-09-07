<?php
add_action('wp_enqueue_scripts' , 'thr_enqueue_styles');
function thr_enqueue_styles () {
    //wp_enqueue_style( 'twenty-twenty-one-style', get_template_directory_uri() . '/style.css',);
    // wp_enqueue_style( 'twenty-twenty-one-style', get_stylesheet_directory_uri() . '/style.css' );
    wp_enqueue_style( 'bootstrap', get_stylesheet_directory_uri() . '/assets/css/bootstrap.min.css');
    wp_enqueue_style( 'font-awesome', get_stylesheet_directory_uri() . '/assets/css/font-awesome.css');
    wp_enqueue_style( 'templatemo-hexashop', get_stylesheet_directory_uri() . '/assets/css/templatemo-hexashop.css');
    wp_enqueue_style( 'owl-carousel', get_stylesheet_directory_uri() . '/assets/css/owl-carousel.css');
    wp_enqueue_style( 'lightbox', get_stylesheet_directory_uri() . '/assets/css/lightbox.css');
    wp_enqueue_style( 'flex-slider', get_stylesheet_directory_uri() . '/assets/css/flex-slider.css');
    //enque js
    wp_enqueue_script( 'bootstrap', get_stylesheet_directory_uri() . '/assets/js/bootstrap.min.js', array( 'jquery' ),  '4.5.2', true );
    wp_enqueue_script( 'popper', get_stylesheet_directory_uri() . '/assets/js/popper.js');
    wp_enqueue_script( 'owl-carousel', get_stylesheet_directory_uri() . '/assets/js/owl-carousel.js');
    wp_enqueue_script( 'accordions', get_stylesheet_directory_uri() . '/assets/js/accordions.js');
    wp_enqueue_script( 'datepicker', get_stylesheet_directory_uri() . '/assets/js/datepicker.js');
    wp_enqueue_script( 'scrollreveal', get_stylesheet_directory_uri() . '/assets/js/scrollreveal.min.js');
    wp_enqueue_script( 'waypoints', get_stylesheet_directory_uri() . '/assets/js/waypoints.min.js');
    wp_enqueue_script( 'jquery', get_stylesheet_directory_uri() . '/assets/js/jquery.counterup.min.js');
    wp_enqueue_script( 'imgfix', get_stylesheet_directory_uri() . '/assets/js/imgfix.min.js');
    wp_enqueue_script( 'slick', get_stylesheet_directory_uri() . '/assets/js/slick.js');
    wp_enqueue_script( 'lightbox', get_stylesheet_directory_uri() . '/assets/js/lightbox.js');
    wp_enqueue_script( 'isotope', get_stylesheet_directory_uri() . '/assets/js/isotope.js');
    wp_enqueue_script( 'custom', get_stylesheet_directory_uri() . '/assets/js/custom.js');
}