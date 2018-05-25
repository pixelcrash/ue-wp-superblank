<?php




add_action( 'after_setup_theme', 'ue_blank_setup' );
function ue_blank_setup()
{
  // Add post formats if needed  
  // add_theme_support( 'post-formats', array( 'aside', 'gallery' ) );
  // Add Post Thumbnails - Featured Image

    add_theme_support( 'post-thumbnails' );

    register_nav_menus(
      array( 
        'main-menu' => __( 'Main Menu', 'ue_blank' ),
        'main-menu_mobile' => __( 'Main Menu Mobile', 'ue_blank' )
     )
    );
}




// LOAD CSS & JS

add_action( 'wp_enqueue_scripts', 'ue_enqueue_style' );

function ue_enqueue_style() {

  //wp_enqueue_style( 'uikitmin', get_template_directory_uri() . '/app/libs/uikit/css/uikit.min.css' );
  wp_enqueue_style( 'uikitmin', 'https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.2/css/uikit.min.css' );
  wp_enqueue_script( 'uikit', 'https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.2/js/uikit.min.js', array('jquery')); // loading the uikit framework
  wp_enqueue_style( 'makeup', get_template_directory_uri() . '/app/css/makeup.css');
  //wp_enqueue_script( 'font', 'https://use.typekit.net/ort5rnl.js', array('jquery')); // adobe font
  //wp_enqueue_script( 'uikit', get_template_directory_uri() . '/bower_components/uikit/js/uikit.min.js', array('jquery')); // loading the uikit framework
  wp_enqueue_script( 'magic', get_template_directory_uri() . '/app/js/magic.js', array('jquery', 'uikit')); // That is where the app magic is happening

}




/* CUSTOM IMAGE SIZES */

add_image_size( 'image1024', 1024, 9999 );
add_image_size( 'image1440', 1440, 9999 );
add_image_size( 'image1920', 1920, 9999 );
add_image_size( 'image768', 768, 9999 );
add_image_size( 'image512', 512, 9999 );
add_image_size( 'imageTN512', 512, 512, TRUE );
add_image_size( 'imageTN1024', 1024, 1024, TRUE );





// AJAX CALl BUTTON STRIPE
add_action('wp_ajax_nopriv_ue_stripe_button', 'ue_stripe_button');
add_action('wp_ajax_ue_stripe_button', 'ue_stripe_button');
function ue_stripe_button(){
     // the first part is a SWTICHBOARD that fires specific functions according to the value of Query Variable 'fn'
           echo do_shortcode('[accept_stripe_payment name="Cool Script" price="50"  button_text="BBUTTON HELLO" shipping_address=”1″ billing_address=”1″ description="This is a test item description"]');
         die;

}




add_action( 'wp_enqueue_scripts', 'add_ajax_script' );
function add_ajax_script() {

    wp_localize_script( 'ajax-js', 'ajax_params', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );

}



if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Theme Settings',
		'menu_title'	=> 'Einstellungen',
		'menu_slug' 	=> 'theme-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

}

