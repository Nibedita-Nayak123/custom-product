<?php 
get_header();
$description = get_the_archive_description();
?>

<?php if ( have_posts() ) : ?>

        <!-- ***** Main Banner Area Start ***** -->
        <div class="page-heading" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-content">
                        <?php the_archive_title( '<h2 class="page-title">', '</h2>' ); ?>
                        <span><?php echo wp_kses_post( wpautop( $description ) ); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->


    <!-- ***** Products Area Starts ***** -->
    <section class="section" id="products">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2>Our Latest Products</h2>
                        <span>Check out all of our products.</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
            <?php while ( have_posts() ) : ?>
                <?php the_post(); ?>
                <div class="col-lg-4">
                    <div class="item">
                        <div class="thumb">
                            <div class="hover-content">
                                <ul>
                                    <li><a href="<?php the_permalink(); ?>"><i class="fa fa-eye"></i></a></li>
                                    <li><a href="single-product.html"><i class="fa fa-star"></i></a></li>
                                    <li><a href="single-product.html"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
                        </div>
                        <div class="down-content">
                            <h4><?php the_title(); ?></h4>
                            <span>$<?php echo get_post_meta( get_the_ID(), '_product_actual_price', true ); ?></span>
                        </div>
                    </div>
                </div>
                <?php //get_template_part( 'template-parts/content/content', get_theme_mod( 'display_excerpt_or_full_post', 'excerpt' ) ); ?>
            <?php endwhile; ?>
                <div class="col-lg-12">
                    <?php
                    the_posts_pagination( array(
                        'mid_size' => 2,
                        'prev_text' => __( '', 'textdomain' ),
                        'next_text' => __( '', 'textdomain' ),
                    ) );
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Products Area Ends ***** -->

<?php else : ?>
	<?php get_template_part( 'template-parts/content/content-none' ); ?>
<?php endif; ?>




<?php get_footer();?>