<?php
function my_theme_enqueue_styles() {
    $parent_style = 'nikkon-style';
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
?>

<?php
add_action('wp_enqueue_scripts', 'jquery');
?>

<?php
// Slick slider styles
function slick_slider_styles() {
    wp_enqueue_style( 'slick-slider-styles', get_stylesheet_directory_uri() . '/slick/slick.css' ); 
    wp_enqueue_style( 'slick-slider-theme-styles', get_stylesheet_directory_uri() . '/slick/slick-theme.css' );  
}

add_action( 'wp_enqueue_scripts', 'slick_slider_styles');
// Slick slider js
function slick_slider_js() {
    wp_enqueue_script('slick-slider-js', get_stylesheet_directory_uri() . '/slick/slick.min.js', array('jquery'), '', true );
}
add_action( 'wp_enqueue_scripts', 'slick_slider_js');
?>

<?php
function custom_javascript() {
    wp_enqueue_script('custom-scripts', get_stylesheet_directory_uri() . '/js/custom.js', array('jquery'), '1.0.0', true );
}

add_action( 'wp_enqueue_scripts', 'custom_javascript');
?>

<?php
function match_height_js() {
    wp_enqueue_script('match-height', get_stylesheet_directory_uri() . '/js/libs/jquery.matchHeight.js', array('jquery'), '1.0.0', true );
}

add_action( 'wp_enqueue_scripts', 'match_height_js');
?>

<?php
add_filter('add_to_cart_text', 'woo_custom_cart_button_text');
add_filter('woocommerce_product_single_add_to_cart_text', 'woo_custom_cart_button_text');
add_filter('woocommerce_product_add_to_cart_text', 'woo_custom_cart_button_text');

function woo_custom_cart_button_text() {
    return __('Add to cart', 'woocommerce');
}

?>

<?php
// remove quantity from all products
function wc_remove_all_quantity_fields( $return, $product ) {
    return true;
}
add_filter( 'woocommerce_is_sold_individually', 'wc_remove_all_quantity_fields', 10, 2 );
?>

<?php
//remove Sale badge on products
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
?>

<?php
// add username in top menu
add_filter( 'wp_nav_menu_items', 'my_custom_menu_item');

function my_custom_menu_item($items)
{
    if(is_user_logged_in())
    {
        $user=wp_get_current_user();
        $name=$user -> display_name;
        $items .= '<li class="login-item"><a href="#"><i class="fa fa-user fa-fw"></i> '.$name.'</a></li>';
    }
    return $items;
} 
?>

<?php
add_action('login_form','my_added_login_field');
function my_added_login_field(){
    //Output your HTML
?>
    <p>
        <label for="my_extra_field">My extra field<br>
        <input type="text" tabindex="20" size="20" value="" class="input" id="my_extra_field" name="my_extra_field_name"></label>
    </p>
<?php
}
?>

<?php
add_action( 'login_enqueue_scripts', 'sourcexpress_login_enqueue_scripts', 10 );
function sourcexpress_login_enqueue_scripts() {
    wp_enqueue_script( 'login-register.js', get_stylesheet_directory_uri() . '/js/login-register.js', array( 'jquery' ), 1.0 );
}
?>