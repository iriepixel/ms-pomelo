<?php
/**
 * MS Pomelo functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package MS_Pomelo
 */

if ( ! function_exists( 'mspomelo_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function mspomelo_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on MS Pomelo, use a find and replace
	 * to change 'mspomelo' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'mspomelo', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'mspomelo' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'mspomelo_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // mspomelo_setup
add_action( 'after_setup_theme', 'mspomelo_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function mspomelo_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'mspomelo_content_width', 640 );
}
add_action( 'after_setup_theme', 'mspomelo_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function mspomelo_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'mspomelo' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'mspomelo_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function mspomelo_scripts() {
	wp_enqueue_style( 'mspomelo-style', get_stylesheet_uri() );

	wp_enqueue_script( 'mspomelo-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'mspomelo-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	wp_enqueue_script( 'mspomelo-carousel-script', get_template_directory_uri() . '/js/jquery.carouFredSel-6.2.1-packed.js', array(), '1', true );

	wp_enqueue_script( 'mspomelo-main-script', get_template_directory_uri() . '/js/script.js', array(), '1', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'mspomelo_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


/*always show add to cart button*/
add_action( 'woocommerce_before_add_to_cart_button', function(){
    // start output buffering
    ob_start();
} );

add_action( 'woocommerce_before_single_variation', function(){
    // end output buffering
    ob_end_clean();
    // output custom div
    echo '<div class="single_variation_wrap_custom">';
} );

/*add extra button on product page after 'add to cart' button*/
add_action('woocommerce_after_add_to_cart_button','mspomelo_additional_button');
function mspomelo_additional_button() {
	echo '<div class="try-on-fit-kit"><a href="' . esc_url( get_permalink(638) ) . '" target="_blank">TRY ON FITKIT</a></div>';
}

/*remove featured image from WooThumbs*/
// add_filter('woocommerce_single_product_image_thumbnail_html', 'remove_featured_image', 10, 2);
// function remove_featured_image($html, $attachment_id ) {
//     global $post, $product;

//     $featured_image = get_post_thumbnail_id( $post->ID );

//     if ( $attachment_id == $featured_image )
//         $html = '';

//     return $html;
// }


// change default variation
// add_filter( 'woocommerce_dropdown_variation_attribute_options_args', 'wc_remove_options_text');

// function wc_remove_options_text( $args ){
//     $args['show_option_none'] = 'SIZE';
//     return $args;
// }

add_filter( 'woocommerce_attribute_label', 'custom_attribute_label', 10, 3 );

function custom_attribute_label( $label, $name, $product ) {
    $taxonomy = 'pa_'.$name;

    if( $taxonomy == 'pa_size' )
        $label .= '<div class="custom-label">' . __('MY TEXT', 'woocommerce') . '</div>';

    return $label;
}

/* Remove tabs from product details page */
add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );
function woo_remove_product_tabs( $tabs ) {
	unset( $tabs['description'] ); // Remove the description tab
	unset( $tabs['reviews'] ); // Remove the reviews tab
	unset( $tabs['additional_information'] ); // Remove the additional information tab
	return $tabs;
}

/* Remove related prducts from product details page */
/**
 * Remove related products output
 */
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

// Remove cart suggestion
remove_action('woocommerce_cart_collaterals', 'woocommerce_cross_sell_display'); 

/*remove * from phone number in woo checkout*/
add_filter( 'woocommerce_checkout_fields' , 'mspomelo_not_required_fields', 9999 );
 
function mspomelo_not_required_fields( $f ) {
 
  unset( $f['billing']['billing_phone']['required'] );
 
  // the same way you can make any field required, example:
  // $f['billing']['billing_company']['required'] = true;
 
  return $f;
}

// remove select2 country from checkout
add_action( 'wp_enqueue_scripts', 'wsis_dequeue_stylesandscripts_select2', 100 );
 
function wsis_dequeue_stylesandscripts_select2() {
    if ( class_exists( 'woocommerce' ) ) {
        wp_dequeue_style( 'selectWoo' );
        wp_deregister_style( 'selectWoo' );
 
        wp_dequeue_script( 'selectWoo');
        wp_deregister_script('selectWoo');
    } 
} 

/**
 * Place a cart icon with number of items and total cost in the menu bar.
 *
 * Source: http://wordpress.org/plugins/woocommerce-menu-bar-cart/
 */
add_filter('wp_nav_menu_items','sk_wcmenucart', 10, 2);
function sk_wcmenucart($menu, $args) {

	// Check if WooCommerce is active and add a new item to a menu assigned to Primary Navigation Menu location
	if ( !in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) || 'primary' !== $args->theme_location )
		return $menu;

	ob_start();
		global $woocommerce;
		$viewing_cart = __('View your shopping cart', 'mspomelo');
		$start_shopping = __('Start shopping', 'mspomelo');
		$cart_url = $woocommerce->cart->get_cart_url();
		/*$shop_page_url = get_permalink( woocommerce_get_page_id( 'shop' ) );*/
		$shop_page_url = esc_url( home_url( '/' ) ) . 'store';
		$cart_contents_count = $woocommerce->cart->cart_contents_count;
		$cart_contents = sprintf(_n('%d', '%d', $cart_contents_count, 'mspomelo'), $cart_contents_count);
		$cart_total = $woocommerce->cart->get_cart_total();
		// Uncomment the line below to hide nav menu cart item when there are no items in the cart
		// if ( $cart_contents_count > 0 ) {
			/*if ($cart_contents_count == 0) {
				$menu_item = '<li class="right header-shopping-cart"><a class="wcmenucart-contents" href="'. $shop_page_url .'" title="'. $start_shopping .'">';
			} else {
				$menu_item = '<li class="right header-shopping-cart"><a class="wcmenucart-contents" href="'. $cart_url .'" title="'. $viewing_cart .'">';
			}*/

			$menu_item = '<li class="right header-shopping-cart"><a class="wcmenucart-contents" href="'. $cart_url .'" title="'. $viewing_cart .'">';

			$menu_item .= '<div class="wrapper"><div class="header-shopping-cart-count">' . $cart_contents . '</div>';

			$menu_item .= '<div class="header-shopping-cart-icon"></div></div>';
			$menu_item .= '</a></li>';
		// Uncomment the line below to hide nav menu cart item when there are no items in the cart
		// }
		echo $menu_item;
	$social = ob_get_clean();
	return $menu . $social;
}

/*remove woothemes update notification*/
remove_action( 'admin_notices', 'woothemes_updater_notice' );

/*remove woocommerce categories from products*/
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );

/*change reviews order by date*/
// function wpa_filter_list_comments($args){
//   $args['reverse_top_level'] = true;
//   return $args;
// }
// add_filter( 'woocommerce_product_review_list_args', 'wpa_filter_list_comments' );

/**
 * Optimize WooCommerce Scripts
 * Remove WooCommerce Generator tag, styles, and scripts from non WooCommerce pages.
 */
add_action( 'wp_enqueue_scripts', 'child_manage_woocommerce_styles', 99 );

function child_manage_woocommerce_styles() {
  //remove generator meta tag
  remove_action( 'wp_head', array( $GLOBALS['woocommerce'], 'generator' ) );

  //first check that woo exists to prevent fatal errors
  if ( function_exists( 'is_woocommerce' ) ) {
    //dequeue scripts and styles
    if ( ! is_woocommerce() && ! is_cart() && ! is_checkout() ) {
      wp_dequeue_style( 'woocommerce_frontend_styles' );
      wp_dequeue_style( 'woocommerce_fancybox_styles' );
      wp_dequeue_style( 'woocommerce_chosen_styles' );
      wp_dequeue_style( 'woocommerce_prettyPhoto_css' );
      wp_dequeue_script( 'wc_price_slider' );
      wp_dequeue_script( 'wc-single-product' );
      wp_dequeue_script( 'wc-add-to-cart' );
      wp_dequeue_script( 'wc-cart-fragments' );
      wp_dequeue_script( 'wc-checkout' );
      wp_dequeue_script( 'wc-add-to-cart-variation' );
      wp_dequeue_script( 'wc-single-product' );
      wp_dequeue_script( 'wc-cart' );
      wp_dequeue_script( 'wc-chosen' );
      wp_dequeue_script( 'woocommerce' );
      wp_dequeue_script( 'prettyPhoto' );
      wp_dequeue_script( 'prettyPhoto-init' );
      wp_dequeue_script( 'jquery-blockui' );
      wp_dequeue_script( 'jquery-placeholder' );
      wp_dequeue_script( 'fancybox' );
      wp_dequeue_script( 'jqueryui' );
    }
  }
}