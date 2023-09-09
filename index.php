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
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header();





?>


<div class="main-banner" id="top">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="left-content">
                    <div class="thumb">
                        <div class="inner-content">
                            <h4>We Are Hexashop</h4>
                            <span>Awesome, clean &amp; creative HTML5 Template</span>
                            <div class="main-border-button">
                                <a href="#">Purchase Now!</a>
                            </div>
                        </div>
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/left-banner-image.jpg" alt="">
                    </div>
                </div>
            </div>
        <div class="col-lg-6">
        <div class="right-content">
        <div class="row">
            <?php
            $terms = get_terms(array(
                'taxonomy'   => 'product_category',
                'hide_empty' => false,
                'parent'     => 0
            ));
            if ($terms && !is_wp_error($terms)) {
                foreach ($terms as $term) {
                    $term_id = $term->term_id;
                    $term_url = get_term_link($term);
                    // $image_url = get_term_meta($term_id, 'category_image', true);
                    $image_url = get_field('category_image', 'product_category_' . $term_id); // Assuming ACF field name is 'category_image'
            ?>
                    <div class="col-lg-6">
                        <div class="right-first-image">
                            <div class="thumb">
                                <div class="inner-content">
                                    <h4><?php echo $term->name; ?></h4>
                                    <a href="<?php echo esc_url($term_url); ?>">click</a>
                                </div>
                                <?php if (!empty($image_url)) { ?>
                                    <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo $term->name; ?>">
                                <?php } else { ?>
                                    <!-- Default image or alternative content -->
                                    <!-- <img src="http://localhost/wordpress/wp-content/uploads/2023/09/download.jpeg"> -->
                                
                                <?php } ?>
                            </div>
                        </div>
                    </div>
            <?php
                }
            }
            ?>
        </div>
    </div>
</div>

        </div>
    </div>
</div>





<?php if (is_home() && !is_front_page() && !empty(single_post_title('', false))) : ?>
    <header class="page-header alignwide">
        <h1 class="page-title"><?php single_post_title(); ?></h1>
    </header><!-- .page-header -->
<?php endif; ?>

<?php
if (have_posts()) {

    // Load posts loop.
    while (have_posts()) {
        the_post();

        // get_template_part( 'template-parts/content/content', get_theme_mod( 'display_excerpt_or_full_post', 'excerpt' ) );
    }

    // Previous/next page navigation.
    twenty_twenty_one_the_posts_navigation();
} else {

    // If no content, include the "No posts found" template.
    get_template_part('content/content-none');
}
?>

<!-- ***** Main Banner Area End ***** -->

<!-- ***** Men Area Starts ***** -->
<section class="section" id="men">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="section-heading">
                    <h2> Latest Products</h2>
                    <span>Details to details is what makes Hexashop different from the other themes.</span>
                </div>

                <div class="search-input">
                    <form id="search" action="#">
                        <input type="text" placeholder="search your product" id='searchText' name="s" onkeypress="handle" />
                        <button role="button">Search Now</button>
                    </form>
                </div>
                <br><br>


                <!-- Display all posts of the "products" custom post type -->
                <?php
                $args = array(
                    'post_type' => 'products', // Change to your custom post type name
                    'posts_per_page' => -1, // To display all posts
                );

                $products_query = new WP_Query($args);

                if ($products_query->have_posts()) : ?>
                    <div class="row">
                        <?php while ($products_query->have_posts()) : $products_query->the_post(); ?>
                            <div class="col-lg-4">
                                <div class="item">
                                    <div class="thumb">
                                        <!-- Display product image or featured image -->
                                        <?php if (has_post_thumbnail()) : ?>
                                            <?php the_post_thumbnail('thumbnail'); ?>
                                        <?php endif; ?>
                                        <div class="hover-content">
                                            <!-- Add your product-specific content here -->
                                            <!-- Example: Product title, price, etc. -->
                                        </div>
                                    </div>
                                    <div class="down-content">
                                        <!-- Add your product-specific content here -->
                                        <!-- Example: Product title, price, etc. -->
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php
                endif;
                // Restore the original post data.
                wp_reset_postdata();
                ?>
                <!-- End of displaying custom post type "products" -->



            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="men-item-carousel">
                    <div class="owl-men-item owl-carousel">
                        <div class="item">
                            <div class="thumb">
                                <div class="hover-content">
                                    <ul>
                                        <li><a href="single-product.html"><i class="fa fa-eye"></i></a></li>
                                        <li><a href="single-product.html"><i class="fa fa-star"></i></a></li>
                                        <li><a href="single-product.html"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/men-01.jpg" alt="">
                            </div>
                            <div class="down-content">
                                <h4>Classic Spring</h4>
                                <span>$120.00</span>
                                <ul class="stars">
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                </ul>
                            </div>
                        </div>
                        <div class="item">
                            <div class="thumb">
                                <div class="hover-content">
                                    <ul>
                                        <li><a href="single-product.html"><i class="fa fa-eye"></i></a></li>
                                        <li><a href="single-product.html"><i class="fa fa-star"></i></a></li>
                                        <li><a href="single-product.html"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/men-02.jpg" alt="">
                            </div>
                            <div class="down-content">
                                <h4>Air Force 1 X</h4>
                                <span>$90.00</span>
                                <ul class="stars">
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                </ul>
                            </div>
                        </div>
                        <div class="item">
                            <div class="thumb">
                                <div class="hover-content">
                                    <ul>
                                        <li><a href="single-product.html"><i class="fa fa-eye"></i></a></li>
                                        <li><a href="single-product.html"><i class="fa fa-star"></i></a></li>
                                        <li><a href="single-product.html"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/men-03.jpg" alt="">
                            </div>
                            <div class="down-content">
                                <h4>Love Nana ‘20</h4>
                                <span>$150.00</span>
                                <ul class="stars">
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                </ul>
                            </div>
                        </div>
                        <div class="item">
                            <div class="thumb">
                                <div class="hover-content">
                                    <ul>
                                        <li><a href="single-product.html"><i class="fa fa-eye"></i></a></li>
                                        <li><a href="single-product.html"><i class="fa fa-star"></i></a></li>
                                        <li><a href="single-product.html"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/men-01.jpg" alt="">
                            </div>
                            <div class="down-content">
                                <h4>Classic Spring</h4>
                                <span>$120.00</span>
                                <ul class="stars">
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Men Area Ends ***** -->


<!-- ***** Explore Area Starts ***** -->
<section class="section" id="explore">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="left-content">
                    <h2>Explore Our Products</h2>
                    <span>You are allowed to use this HexaShop HTML CSS template. You can feel free to modify or edit this layout. You can convert this template as any kind of ecommerce CMS theme as you wish.</span>
                    <div class="quote">
                        <i class="fa fa-quote-left"></i>
                        <p>You are not allowed to redistribute this template ZIP file on any other website.</p>
                    </div>
                    <p>There are 5 pages included in this HexaShop Template and we are providing it to you for absolutely free of charge at our TemplateMo website. There are web development costs for us.</p>
                    <p>If this template is beneficial for your website or business, please kindly <a rel="nofollow" href="https://paypal.me/templatemo" target="_blank">support us</a> a little via PayPal. Please also tell your friends about our great website. Thank you.</p>
                    <div class="main-border-button">
                        <a href="products.html">Discover More</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="right-content">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="leather">
                                <h4>Leather Bags</h4>
                                <span>Latest Collection</span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="first-image">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/explore-image-01.jpg" alt="">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="second-image">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/explore-image-02.jpg" alt="">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="types">
                                <h4>Different Types</h4>
                                <span>Over 304 Products</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Explore Area Ends ***** -->

<!-- ***** Social Area Starts ***** -->
<section class="section" id="social">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading">
                    <h2>Social Media</h2>
                    <span>Details to details is what makes Hexashop different from the other themes.</span>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row images">
            <div class="col-2">
                <div class="thumb">
                    <div class="icon">
                        <a href="http://instagram.com">
                            <h6>Fashion</h6>
                            <i class="fa fa-instagram"></i>
                        </a>
                    </div>
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/instagram-01.jpg" alt="">
                </div>
            </div>
            <div class="col-2">
                <div class="thumb">
                    <div class="icon">
                        <a href="http://instagram.com">
                            <h6>New</h6>
                            <i class="fa fa-instagram"></i>
                        </a>
                    </div>
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/instagram-02.jpg" alt="">
                </div>
            </div>
            <div class="col-2">
                <div class="thumb">
                    <div class="icon">
                        <a href="http://instagram.com">
                            <h6>Brand</h6>
                            <i class="fa fa-instagram"></i>
                        </a>
                    </div>
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/instagram-03.jpg" alt="">
                </div>
            </div>
            <div class="col-2">
                <div class="thumb">
                    <div class="icon">
                        <a href="http://instagram.com">
                            <h6>Makeup</h6>
                            <i class="fa fa-instagram"></i>
                        </a>
                    </div>
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/instagram-04.jpg" alt="">
                </div>
            </div>
            <div class="col-2">
                <div class="thumb">
                    <div class="icon">
                        <a href="http://instagram.com">
                            <h6>Leather</h6>
                            <i class="fa fa-instagram"></i>
                        </a>
                    </div>
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/instagram-05.jpg" alt="">
                </div>
            </div>
            <div class="col-2">
                <div class="thumb">
                    <div class="icon">
                        <a href="http://instagram.com">
                            <h6>Bag</h6>
                            <i class="fa fa-instagram"></i>
                        </a>
                    </div>
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/instagram-06.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Social Area Ends ***** -->

<!-- ***** Subscribe Area Starts ***** -->
<div class="subscribe">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="section-heading">
                    <h2>By Subscribing To Our Newsletter You Can Get 30% Off</h2>
                    <span>Details to details is what makes Hexashop different from the other themes.</span>
                </div>
                <form id="subscribe" action="" method="get">
                    <div class="row">
                        <div class="col-lg-5">
                            <fieldset>
                                <input name="name" type="text" id="name" placeholder="Your Name" required="">
                            </fieldset>
                        </div>
                        <div class="col-lg-5">
                            <fieldset>
                                <input name="email" type="text" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your Email Address" required="">
                            </fieldset>
                        </div>
                        <div class="col-lg-2">
                            <fieldset>
                                <button type="submit" id="form-submit" class="main-dark-button"><i class="fa fa-paper-plane"></i></button>
                            </fieldset>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-4">
                <div class="row">
                    <div class="col-6">
                        <ul>
                            <li>Store Location:<br><span>Sunny Isles Beach, FL 33160, United States</span></li>
                            <li>Phone:<br><span>010-020-0340</span></li>
                            <li>Office Location:<br><span>North Miami Beach</span></li>
                        </ul>
                    </div>
                    <div class="col-6">
                        <ul>
                            <li>Work Hours:<br><span>07:30 AM - 9:30 PM Daily</span></li>
                            <li>Email:<br><span>info@company.com</span></li>
                            <li>Social Media:<br><span><a href="#">Facebook</a>, <a href="#">Instagram</a>, <a href="#">Behance</a>, <a href="#">Linkedin</a></span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ***** Subscribe Area Ends ***** -->
<?php
get_footer();
?>
