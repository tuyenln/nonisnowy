<?php
/**
 * Header top display options of elements
 *
 * @since Online Shop 1.0.0
 *
 * @param null
 * @return array $online_shop_header_top_display_selection
 *
 */
if ( !function_exists('online_shop_header_top_display_selection') ) :
	function online_shop_header_top_display_selection() {
		$online_shop_header_top_display_selection =  array(
			'hide' => esc_html__( 'Hide', 'online-shop' ),
			'left' => esc_html__( 'on Top Left', 'online-shop' ),
			'right' => esc_html__( 'on Top Right', 'online-shop' )
		);
		return apply_filters( 'online_shop_header_top_display_selection', $online_shop_header_top_display_selection );
	}
endif;

/**
 * online_shop_menu_right_button_link_options
 *
 * @since Online Shop 1.0.0
 *
 * @param null
 * @return array $online_shop_menu_right_button_link_options
 *
 */
if ( !function_exists('online_shop_menu_right_button_link_options') ) :
	function online_shop_menu_right_button_link_options() {
		$online_shop_menu_right_button_link_options =  array(
			'disable' => esc_html__( 'Disable', 'online-shop' ),
			'widget' => esc_html__( 'Widget on Popup', 'online-shop' ),
			'link' => esc_html__( 'Normal Link', 'online-shop' )
		);
		return apply_filters( 'online_shop_menu_right_button_link_options', $online_shop_menu_right_button_link_options );
	}
endif;

/**
 * Header Basic Info number
 *
 * @since Online Shop 1.0.0
 *
 * @param null
 * @return array $online_shop_header_bi_number
 *
 */
if ( !function_exists('online_shop_header_bi_number') ) :
	function online_shop_header_bi_number() {
		$online_shop_header_bi_number =  array(
			1 => esc_html__( '1', 'online-shop' ),
			2 => esc_html__( '2', 'online-shop' ),
			3 => esc_html__( '3', 'online-shop' ),
			4 => esc_html__( '4', 'online-shop' )
		);
		return apply_filters( 'online_shop_header_bi_number', $online_shop_header_bi_number );
	}
endif;

/**
 * Header Media Position options
 *
 * @since Online Shop 1.0.0
 *
 * @param null
 * @return array $online_shop_header_media_position
 *
 */
if ( !function_exists('online_shop_header_media_position') ) :
	function online_shop_header_media_position() {
		$online_shop_header_media_position =  array(
			'very-top' => esc_html__( 'Very Top', 'online-shop' ),
			'above-logo' => esc_html__( 'Above Site Identity', 'online-shop' ),
			'above-menu' => esc_html__( 'Below Site Identity and Above Menu', 'online-shop' ),
			'below-menu' => esc_html__( 'Below Menu', 'online-shop' )
		);
		return apply_filters( 'online_shop_header_media_position', $online_shop_header_media_position );
	}
endif;

/**
 * Header Site identity and ads display options
 *
 * @since Online Shop 1.0.0
 *
 * @param null
 * @return array $online_shop_header_logo_menu_display_position
 *
 */
if ( !function_exists('online_shop_header_logo_menu_display_position') ) :
	function online_shop_header_logo_menu_display_position() {
		$online_shop_header_logo_menu_display_position =  array(
			'left-logo-right-ads' => esc_html__( 'Left Logo and Right Ads', 'online-shop' ),
			'right-logo-left-ads' => esc_html__( 'Right Logo and Left Ads', 'online-shop' ),
			'center-logo-below-ads' => esc_html__( 'Center Logo and Below Ads', 'online-shop' )
		);
		return apply_filters( 'online_shop_header_logo_menu_display_position', $online_shop_header_logo_menu_display_position );
	}
endif;

/**
 * Feature Section Options
 *
 * @since Online Shop 1.0.0
 *
 * @param null
 * @return array $online_shop_feature_section_content_options
 *
 */
if ( !function_exists('online_shop_feature_section_content_options') ) :
	function online_shop_feature_section_content_options() {
		$online_shop_feature_section_content_options =  array(
			'disable' => esc_html__( 'Disable', 'online-shop' ),
			'post' => esc_html__( 'Post', 'online-shop' ),
		);
		if( online_shop_is_woocommerce_active() ){
			$online_shop_feature_section_content_options['product'] = esc_html__( 'Product', 'online-shop' );
		}
		return apply_filters( 'online_shop_feature_section_content_options', $online_shop_feature_section_content_options );
	}
endif;

/**
 * Featured Slider Image Options
 *
 * @since Online Shop 1.0.0
 *
 * @param null
 * @return array $online_shop_fs_image_display_options
 *
 */
if ( !function_exists('online_shop_fs_image_display_options') ) :
	function online_shop_fs_image_display_options() {
		$online_shop_fs_image_display_options =  array(
			'full-screen-bg' => esc_html__( 'Full Screen Background', 'online-shop' ),
			'responsive-img' => esc_html__( 'Responsive Image', 'online-shop' )
		);
		return apply_filters( 'online_shop_fs_image_display_options', $online_shop_fs_image_display_options );
	}
endif;

/**
 * Sidebar layout options
 *
 * @since Online Shop 1.0.0
 *
 * @param null
 * @return array $online_shop_sidebar_layout
 *
 */
if ( !function_exists('online_shop_sidebar_layout') ) :
    function online_shop_sidebar_layout() {
        $online_shop_sidebar_layout =  array(
	        'right-sidebar' => esc_html__( 'Right Sidebar', 'online-shop' ),
	        'left-sidebar'  => esc_html__( 'Left Sidebar' , 'online-shop' ),
	        'both-sidebar'  => esc_html__( 'Both Sidebar' , 'online-shop' ),
	        'middle-col'  => esc_html__( 'Middle Column' , 'online-shop' ),
	        'no-sidebar'    => esc_html__( 'No Sidebar', 'online-shop' )
        );
        return apply_filters( 'online_shop_sidebar_layout', $online_shop_sidebar_layout );
    }
endif;

/**
 * Blog layout options
 *
 * @since Online Shop 1.0.0
 *
 * @param null
 * @return array $online_shop_blog_layout
 *
 */
if ( !function_exists('online_shop_blog_layout') ) :
    function online_shop_blog_layout() {
        $online_shop_blog_layout =  array(
            'show-image' => esc_html__( 'Show Image', 'online-shop' ),
            'no-image'   => esc_html__( 'Hide Image', 'online-shop' )
        );
        return apply_filters( 'online_shop_blog_layout', $online_shop_blog_layout );
    }
endif;

/**
 * Reset Options
 *
 * @since Online Shop 1.0.0
 *
 * @param null
 * @return array
 *
 */
if ( !function_exists('online_shop_reset_options') ) :
    function online_shop_reset_options() {
        $online_shop_reset_options =  array(
            '0'  => esc_html__( 'Do Not Reset', 'online-shop' ),
            'reset-color-options'  => esc_html__( 'Reset Colors Options', 'online-shop' ),
            'reset-all' => esc_html__( 'Reset All', 'online-shop' )
        );
        return apply_filters( 'online_shop_reset_options', $online_shop_reset_options );
    }
endif;

/**
 * Breadcrumbs options
 *
 * @since Online Shop 1.0.0
 *
 * @param null
 * @return array
 *
 */
if ( !function_exists('online_shop_breadcrumbs_options') ) :
	function online_shop_breadcrumbs_options() {
		$online_shop_breadcrumbs_options =  array(
			'disable'  => esc_html__( 'Disable', 'online-shop' ),
			'default'  => esc_html__( 'Default', 'online-shop' )
		);
		if( online_shop_is_woocommerce_active() ){
			$online_shop_breadcrumbs_options['wc-breadcrumb'] = esc_html__( 'WC Breadcrumb', 'online-shop' );
		}
		return apply_filters( 'online_shop_breadcrumbs_options', $online_shop_breadcrumbs_options );
	}
endif;

/**
 * Blog Archive Display Options
 *
 * @since Online Shop 1.0.0
 *
 * @param null
 * @return array
 *
 */
if ( !function_exists('online_shop_blog_archive_category_display_options') ) :
	function online_shop_blog_archive_category_display_options() {
		$online_shop_blog_archive_category_display_options =  array(
			'default'  => esc_html__( 'Default', 'online-shop' ),
			'cat-color'  => esc_html__( 'Categories with Color', 'online-shop' )
		);
		return apply_filters( 'online_shop_blog_archive_category_display_options', $online_shop_blog_archive_category_display_options );
	}
endif;

/**
 * Related Post Display From Options
 *
 * @since Online Shop 1.0.0
 *
 * @param null
 * @return array
 *
 */
if ( !function_exists('online_shop_related_post_display_from') ) :
	function online_shop_related_post_display_from() {
		$online_shop_related_post_display_from =  array(
			'cat'  => esc_html__( 'Related Posts From Categories', 'online-shop' ),
			'tag'  => esc_html__( 'Related Posts From Tags', 'online-shop' )
		);
		return apply_filters( 'online_shop_related_post_display_from', $online_shop_related_post_display_from );
	}
endif;

/**
 * Image Size
 *
 * @since Online Shop 1.0.0
 *
 * @param null
 * @return array $online_shop_get_image_sizes_options
 *
 */
if ( !function_exists('online_shop_get_image_sizes_options') ) :
	function online_shop_get_image_sizes_options( $add_disable = false ) {
		global $_wp_additional_image_sizes;
		$choices = array();
		if ( true == $add_disable ) {
			$choices['disable'] = esc_html__( 'No Image', 'online-shop' );
		}
		foreach ( array( 'thumbnail', 'medium', 'large' ) as $key => $_size ) {
			$choices[ $_size ] = $_size . ' ('. get_option( $_size . '_size_w' ) . 'x' . get_option( $_size . '_size_h' ) . ')';
		}
		$choices['full'] = esc_html__( 'full (original)', 'online-shop' );
		if ( ! empty( $_wp_additional_image_sizes ) && is_array( $_wp_additional_image_sizes ) ) {

			foreach ($_wp_additional_image_sizes as $key => $size ) {
				$choices[ $key ] = $key . ' ('. $size['width'] . 'x' . $size['height'] . ')';
			}
		}
		return apply_filters( 'online_shop_get_image_sizes_options', $choices );
	}
endif;