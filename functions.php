<?php
//* Start the engine
include_once( get_template_directory() . '/lib/init.php' );

//* Child theme (do not remove)
define( 'CHILD_THEME_NAME', 'loop Theme' );
define( 'CHILD_THEME_URL', 'http://www.emilybrookdesign.com/' );
define( 'CHILD_THEME_VERSION', '2.0.1' );

//* Add HTML5 markup structure
add_theme_support( 'html5' );

//* Add viewport meta tag for mobile browsers
//add_theme_support( 'genesis-responsive-viewport' );

//* WooCommerce
add_theme_support( 'genesis-connect-woocommerce' );

//add_filter( 'woocommerce_enqueue_styles', 'dequeue_woocommerce_general_stylesheet' );
//function dequeue_woocommerce_general_stylesheet( $enqueue_styles ) {
//	unset( $enqueue_styles['woocommerce-general'] );	
//	return $enqueue_styles;
//}


//* Add support for 3-column footer widgets
add_theme_support( 'genesis-footer-widgets', 3 );

/** Custom image sizes */
add_image_size( 'Home-Featured', 110, 100, TRUE );
add_image_size( 'Home-Right-Featured', 300, 200, TRUE );

/** Customize the post info function */
add_filter( 'genesis_post_info', 'post_info_filter' );
function post_info_filter($post_info) {
if ( !is_page() ) {
    $post_info = '';
    return $post_info;
}}

/** Remove the post meta function */
remove_action( 'genesis_after_post_content', 'genesis_post_meta' );


// -----------------------------------
// --  REMOVE SOME DEFAULT WIDGETS  --
// -----------------------------------
 
function pc_unregister_default_widgets() {
    unregister_widget('WP_Widget_Pages');
    unregister_widget('WP_Widget_Calendar');
    unregister_widget('WP_Widget_Archives');
    unregister_widget('WP_Widget_Links');
    unregister_widget('WP_Widget_Categories');
    unregister_widget('WP_Widget_RSS');
    unregister_widget('WP_Widget_Tag_Cloud');
    unregister_widget('Twenty_Eleven_Ephemera_Widget');
    unregister_widget('Akismet_Widget');
    unregister_widget('WP_Widget_Recent_Comments');
    unregister_widget('WP_Widget_Recent_Posts');
    unregister_widget('WP_Widget_Meta');
    
    
}
 
add_action( 'widgets_init', 'pc_unregister_default_widgets', 11 );


// Home page widgets
genesis_register_sidebar( array(
	'id'			=> 'home-featured-left',
	'name'			=> __( 'Home Featured Left', 'loop' ),
	'description'	=> __( 'This is the featured section left side.', 'loop' ),
) );
genesis_register_sidebar( array(
	'id'			=> 'home-featured-right',
	'name'			=> __( 'Home Featured Right', 'loop' ),
	'description'	=> __( 'This is the featured section right side.', 'loop' ),
) );
genesis_register_sidebar( array(
	'id'			=> 'home-welcome',
	'name'			=> __( 'Home Welcome', 'loop' ),
	'description'	=> __( 'This is the home bottom section.', 'loop' ),
) );
genesis_register_sidebar( array(
	'id'			=> 'home-banner',
	'name'			=> __( 'Home Banner', 'loop' ),
	'description'	=> __( 'This is the home banner section.', 'loop' ),
) );
genesis_register_sidebar( array(
	'id'			=> 'home-middle-1',
	'name'			=> __( 'Home Middle 1', 'loop' ),
	'description'	=> __( 'This is the home middle left section.', 'loop' ),
) );
genesis_register_sidebar( array(
	'id'			=> 'home-middle-2',
	'name'			=> __( 'Home Middle 2', 'loop' ),
	'description'	=> __( 'This is the home middle center section.', 'loop' ),
) );
genesis_register_sidebar( array(
	'id'			=> 'home-middle-3',
	'name'			=> __( 'Home Middle 3', 'loop' ),
	'description'	=> __( 'This is the home middle right section.', 'loop' ),
) );

//* Create a shortcode to display our custom Go to top link
add_shortcode('footer_custombacktotop', 'set_footer_custombacktotop');
function set_footer_custombacktotop($atts) {
    return '
        <a href="#" class="top">Return to top of page</a>
    ';
}


//* Add smooth scrolling for any link having the class of "top"
add_action('wp_footer', 'go_to_top');
function go_to_top() { ?>
    <script type="text/javascript">
        jQuery(function($) {
            $('a.top').click(function() {
                $('html, body').animate({scrollTop:0}, 'slow');
                return false;
            });
        });
    </script>
<?php }

//* Change the footer text
add_filter('genesis_footer_creds_text', 'sp_footer_creds_filter');
function sp_footer_creds_filter( $creds ) {
    $creds = '[footer_copyright] &middot; All Right Reserved &middot <a href="http://http://www.highpeaksloop.com">High Peaks Loop</a> &middot; Built by <a href="http://www.emilybrookdesign.com">Emily Brook Reinholt</a>[footer_custombacktotop]';
    return $creds;
}


