<?php
class Custom_Products_Plugin {
public function __construct() {
    add_action('init',[$this,"create_place_post_type"]);
    add_action('init', array($this, 'register_Taxonomies'));
    add_action('add_meta_boxes', array($this, 'custom_products_add_metaboxes'));
    add_action('save_post', array($this, 'custom_products_save_metaboxes'));      
}
public function create_place_post_type(){
    $labels = array(
        'name'                  => _x( 'Product', 'Post type general name', 'Product' ),
        'singular_name'         => _x( 'Product', 'Post type singular name', 'Product' ),
        'menu_name'             => _x( 'Product', 'Admin Menu text', 'Product' ),
        'name_admin_bar'        => _x( 'Product', 'Add New on Toolbar', 'Product' ),
        'add_new'               => __( 'Add New', 'Product' ),
        'add_new_item'          => __( 'Add New Product', 'Product' ),
        'new_item'              => __( 'New Product', 'Product' ),
        'edit_item'             => __( 'Edit Product', 'Product' ),
        'view_item'             => __( 'View Product', 'Product' ),
        'all_items'             => __( 'All Product', 'Product' ),
        'search_items'          => __( 'Search Product', 'Product' ),
        'parent_item_colon'     => __( 'Parent Product:', 'Product' ),
        'not_found'             => __( 'No Product found.', 'Product' ),
        'not_found_in_trash'    => __( 'No Product found in Trash.', 'Product' ),
        'featured_image'        => _x( 'ProductCover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'Product' ),
        'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'Product' ),
        'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'Product' ),
        'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'Product' ),
        'archives'              => _x( 'Product archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'Product' ),
        'insert_into_item'      => _x( 'Insert into Product', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'Product' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this Product', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'Product' ),
        'filter_items_list'     => _x( 'Filter Product list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'Product' ),
        'items_list_navigation' => _x( 'Product list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'Product' ),
        'items_list'            => _x( 'Product list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'Product' ),
);
$args = array(
    'labels'             => $labels,
    'public'             => true,
    'has_archive'        => true,
    'rewrite'            => array( 'slug' => 'products' ),
    'supports'           => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
);
register_post_type( 'product',$args);
}
// Register custom taxonomies 'Product Category' and 'Product Brand'
public function register_taxonomies() {
$category_labels = array(
    'name'                       => _x( 'Categories', 'taxonomy general name', 'Product-text-domain' ),
    'singular_name'              => _x( 'Category', 'taxonomy singular name', 'Product-text-domain' ),
    'search_items'               => __( 'Search Categories', 'Product-text-domain' ),
    'popular_items'              => __( 'Popular Categories', 'Product-text-domain' ),
    'all_items'                  => __( 'All Categories', 'Product-text-domain' ),
    'parent_item'                => null,
    'parent_item_colon'          => null,
    'edit_item'                  => __( 'Edit Category', 'Product-text-domain' ),
    'update_item'                => __( 'Update Category', 'Product-text-domain' ),
    'add_new_item'               => __( 'Add New Category', 'Product-text-domain' ),
    'new_item_name'              => __( 'New Category Name', 'Product-text-domain' ),
    'separate_items_with_commas' => __( 'Separate categories with commas', 'Product-text-domain' ),
    'add_or_remove_items'        => __( 'Add or remove categories', 'Product-text-domain' ),
    'choose_from_most_used'      => __( 'Choose from the most used categories', 'Product-text-domain' ),
    'menu_name'                  => __( 'Categories', 'Product-text-domain' ),
);
$category_args = array(
    'hierarchical'      => true,
    'labels'            => $category_labels,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => true,
    'rewrite'           => array( 'slug' => 'product-category' ),
);
register_taxonomy( 'product_category', 'product', $category_args );
// Add taxonomy for product brands
$brand_labels = array(
    'name'                       => _x( 'Brands', 'taxonomy general name', 'Product-text-domain' ),
    'singular_name'              => _x( 'Brand', 'taxonomy singular name', 'Product-text-domain' ),
    'search_items'               => __( 'Search Brands', 'Product-text-domain' ),
    'popular_items'              => __( 'Popular Brands', 'Product-text-domain' ),
    'all_items'                  => __( 'All Brands', 'Product-text-domain' ),
    'edit_item'                  => __( 'Edit Brand', 'Product-text-domain' ),
    'update_item'                => __( 'Update Brand', 'Product-text-domain' ),
    'add_new_item'               => __( 'Add New Brand', 'Product-text-domain' ),
    'new_item_name'              => __( 'New Brand Name', 'Product-text-domain' ),
    'separate_items_with_commas' => __( 'Separate brands with commas', 'Product-text-domain' ),
    'add_or_remove_items'        => __( 'Add or remove brands', 'Product-text-domain' ),
    'choose_from_most_used'      => __( 'Choose from the most used brands', 'Product-text-domain' ),
    'menu_name'                  => __( 'Brands', 'Product-text-domain' ),
);
$brand_args = array(
    'hierarchical'      => false,
    'labels'            => $brand_labels,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => true,
    'rewrite'           => array( 'slug' => 'product-brand' ),
);
register_taxonomy( 'product_brand', 'product', $brand_args );
}
public function custom_products_add_metaboxes() {
    add_meta_box('product_price', 'Product Price', array($this, 'custom_products_price_callback'), 'product', 'normal', 'default');
}
public function custom_products_price_callback($post) {
    // Get the actual price value for the current product
    $actual_price = get_post_meta($post->ID, '_product_actual_price', true);
    $sales_price = get_post_meta($post->ID, '_product_sales_price', true);


    // Output a input field for the actual price
    echo '<input type="text" name="product_actual_price" placeholder="product price" value="' . esc_attr($actual_price) . '" />';
    echo '<input type="text" name="product_sales_price" placeholder="product purchase price" value="' . esc_attr($sales_price) . '" />';

}

// Save the meta box data
public function custom_products_save_metaboxes($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;

    // Save actual price
    if (isset($_POST['product_actual_price'])) {
        $actual_price = sanitize_text_field($_POST['product_actual_price']);
        update_post_meta($post_id, '_product_actual_price', $actual_price);
    }

    // Save sales price
    if (isset($_POST['product_sales_price'])) {
        $sales_price = sanitize_text_field($_POST['product_sales_price']);
        update_post_meta($post_id, '_product_sales_price', $sales_price);
    }
}
} 
new Custom_Products_Plugin();