<?php
/**
 * Online Shop functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Acme Themes
 * @subpackage Online Shop
 */


/**
 *  Default Theme layout options
 *
 * @since Online Shop 1.0.0
 *
 * @param null
 * @return array $online_shop_theme_layout
 *
 */
if ( !function_exists('online_shop_get_default_theme_options') ) :
    function online_shop_get_default_theme_options() {

        $default_theme_options = array(

            /*basic info*/
            'online-shop-header-bi-number'  => 4,
            'online-shop-first-info-icon'  => 'fa-volume-control-phone',
            'online-shop-first-info-title'  => esc_html__('+00 123 456 789', 'online-shop'),
            'online-shop-first-info-link'  => '',
            'online-shop-second-info-icon'  => 'fa-envelope-o',
            'online-shop-second-info-title'  => esc_html__('example@youremail.com', 'online-shop'),
            'online-shop-second-info-link'  => '',
            'online-shop-third-info-icon'  => 'fa-map-marker',
            'online-shop-third-info-title'  => esc_html__('Our Location', 'online-shop'),
            'online-shop-third-info-link'  => '',
            'online-shop-forth-info-icon'  => 'fa-clock-o',
            'online-shop-forth-info-title'  => esc_html__('Working Hours', 'online-shop'),
            'online-shop-forth-info-link'  => '',

            /*feature section options*/
            'online-shop-feature-post-cat'  => 0,
            'online-shop-feature-product-cat'  => 0,
            'online-shop-feature-content-options'  => 'disable',
            'online-shop-feature-post-number'  => 3,
            'online-shop-feature-slider-display-cat'  => '',
            'online-shop-feature-slider-display-title'  => 1,
            'online-shop-feature-slider-display-excerpt'  => '',
            'online-shop-feature-slider-display-arrow'  => 1,
            'online-shop-feature-slider-enable-autoplay'  => 1,
            'online-shop-fs-image-display-options'  => 'full-screen-bg',
            'online-shop-feature-button-text'  => esc_html__('Shop Now', 'online-shop'),

            /*feature-right*/
            'online-shop-feature-right-content-options'  => 'disable',
            'online-shop-feature-right-post-cat'  => 0,
            'online-shop-feature-right-product-cat'  => 0,
            'online-shop-feature-right-post-number'  => 2,
            'online-shop-feature-right-display-title'  => 1,
            'online-shop-feature-right-display-arrow'  => '',
            'online-shop-feature-right-enable-autoplay'  => 1,
            'online-shop-feature-right-image-display-options'  => 'full-screen-bg',
            'online-shop-feature-right-button-text'  => esc_html__('Shop Now', 'online-shop'),

            /*feature special menu*/
            'online-shop-feature-enable-special-menu'  => '',

            /*header options*/
            'online-shop-enable-header-top'  => '',
            'online-shop-header-top-basic-info-display-selection'  => 'left',
            'online-shop-header-top-menu-display-selection'  => 'hide',
            'online-shop-header-top-social-display-selection'  => 'right',
            'online-shop-top-right-button-options'  => 'link',
            'online-shop-top-right-button-title'  => esc_html__('My Account', 'online-shop'),
            'online-shop-popup-widget-title'  => esc_html__('Popup Content', 'online-shop'),
            'online-shop-top-right-button-link'  => '',

            /*header icons*/
            'online-shop-enable-cart-icon'  => '',
            'online-shop-enable-wishlist-icon'  => '',

            /*site identity*/
            'online-shop-display-site-logo'  => 1,
            'online-shop-display-site-title'  => 1,
            'online-shop-display-site-tagline'  => 1,

            /*Menu Options*/
            'online-shop-enable-special-menu'  => '',
            'online-shop-special-menu-text'  => esc_html__('Special Menu', 'online-shop'),

            'online-shop-menu-right-text'  => '',
            'online-shop-menu-right-highlight-text'  => '',
            'online-shop-menu-right-text-link'  => '',
            'online-shop-menu-right-link-new-tab'  => '',

            'online-shop-enable-sticky-menu'  => '',

            /*social options*/
            'online-shop-social-data'  => '',

            /*media options*/
            'online-shop-header-media-position'  => 'above-menu',
            'online-shop-header-image-link'  => esc_url( home_url() ),
            'online-shop-header-image-link-new-tab'  => '',

            /*logo and menu*/
            'online-shop-header-logo-ads-display-position'  => 'left-logo-right-ads',

            /*footer options*/
            'online-shop-footer-copyright'  => esc_html__( 'Copyright &copy; All Right Reserved', 'online-shop' ),
            'online-shop-enable-footer-power-text'  => 1,

            /*blog layout*/
            'online-shop-blog-archive-img-size' => 'full',
            'online-shop-blog-archive-more-text'  => esc_html__( 'Read More', 'online-shop' ),

            /*layout/design options*/
            'online-shop-single-sidebar-layout'  => 'right-sidebar',
            'online-shop-front-page-sidebar-layout'  => 'right-sidebar',
            'online-shop-archive-sidebar-layout'  => 'right-sidebar',

            'online-shop-enable-sticky-sidebar'  => 1,
            'online-shop-blog-archive-layout'  => 'show-image',

            'online-shop-primary-color'  => '#f73838',
            'online-shop-cat-hover-color'  => '#2d2d2d',

            /*single post options*/
            'online-shop-show-related'  => 1,
            'online-shop-related-title'  => esc_html__( 'Related posts', 'online-shop' ),
            'online-shop-related-post-display-from'  => 'cat',
            'online-shop-single-img-size'  => 'full',

            /*woocommerce*/
            'online-shop-wc-shop-archive-sidebar-layout'  => 'no-sidebar',
            'online-shop-wc-product-column-number'  => 4,
            'online-shop-wc-shop-archive-total-product'  => 16,
            'online-shop-wc-single-product-sidebar-layout'  => 'no-sidebar',

            /*theme options*/
            'online-shop-search-placeholder'  => esc_html__( 'Search', 'online-shop' ),
            'online-shop-breadcrumb-options'  => 'default',

            'online-shop-hide-front-page-content'  => '',

            /*Reset*/
            'online-shop-reset-options'  => '0'
        );

        return apply_filters( 'online_shop_default_theme_options', $default_theme_options );
    }
endif;

/**
 * Get theme options
 *
 * @since Online Shop 1.0.0
 *
 * @param null
 * @return array online_shop_theme_options
 *
 */
if ( !function_exists('online_shop_get_theme_options') ) :
    function online_shop_get_theme_options() {

        $online_shop_default_theme_options = online_shop_get_default_theme_options();
        $online_shop_get_theme_options = get_theme_mod( 'online_shop_theme_options');
        if( is_array( $online_shop_get_theme_options )){
            return array_merge( $online_shop_default_theme_options, $online_shop_get_theme_options );
        }
        else{
            return $online_shop_default_theme_options;
        }
    }
endif;

$online_shop_saved_theme_options = online_shop_get_theme_options();
$GLOBALS['online_shop_customizer_all_values'] = $online_shop_saved_theme_options;

/**
 * require int.
 */
require_once trailingslashit( get_template_directory() ) . 'acmethemes/init.php';
