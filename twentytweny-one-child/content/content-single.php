<div class="single-product section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="left-image">
            <img src="<?php twenty_twenty_one_post_thumbnail(); ?>">
          </div>
        </div>
        <div class="col-lg-6 align-self-center">
          <h4> <?php echo get_the_title(); ?></h4>
          <p><?php echo get_the_content(); ?></p>
          <ul>
            <li>
                <span>Product price:</span>
                <?php
                    $product_price = get_post_meta( get_the_ID(), "_product_actual_price",true );
                    echo $product_price;
                   
                ?>
            </li>
            
            <li>
                <span>Quantity:</span>
                <input type="number" name="quantity" id="quantity" value="1" min="1">
                </li>
                <li>
                    <span>Category:</span>
                    <?php
                    $category = get_the_terms( get_the_ID() ,  'product_category' );
                    foreach ( $category as $categories ) {
                        $categories_name = esc_html( $categories->name );
                        echo '<a href="#">' . $categories_name . '</a> ';
                     }
                    ?>

                    </li>
                <li>
                        <span>Brand:</span>
                        <?php
                        $brand = get_the_terms(get_the_ID(), 'product_brand');
                            if ($brand && !is_wp_error($brand)) {
                                foreach ($brand as $style) {
                                    $style_name = esc_html($style->name);
                                    echo '<a href="#">' . $style_name . '</a> ';
                                }
                            }
                        ?>
                    </li>    

                
            
           
          </ul>
        </div>
      </div>
   </div>
</div>