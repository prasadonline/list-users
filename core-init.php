<?php
/*
*    ***** List Users *****
*    To Initializes all LU Core components
*/

// Make sure we don't expose any info if called directly
if (!function_exists('add_action')) {
    echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
    exit;
}
// Define constants
define('LU_CORE_INC', dirname(__FILE__).'/assets/inc/');
define('LU_CORE_IMG', plugins_url('assets/img/', __FILE__));
define('LU_CORE_CSS', plugins_url('assets/css/', __FILE__));
define('LU_CORE_JS', plugins_url('assets/js/', __FILE__));
define('LU_TEMPLATES', dirname(__FILE__).'/templates/');

/*
 *  Register CSS
 */
function register_core_css(){
    wp_enqueue_style('lu-core', LU_CORE_CSS .'core.css', null, time(), 'all');
    wp_enqueue_style('jquery_modal', LU_CORE_CSS . 'jquery.modal.min.css', null, time(), 'all');
};
add_action('wp_enqueue_scripts', 'register_core_css');

/*
 * Register JS / jQuery
 */
function register_core_js(){
    $jQuery = array('jquery');
    wp_register_script("users_script", LU_CORE_JS.'users.js', $jQuery);
    wp_enqueue_script("jquery_modal", LU_CORE_JS.'jquery.modal.min.js', $jQuery);

    wp_enqueue_script('users_script');
}
add_action('wp_enqueue_scripts', 'register_core_js');

/*
 *  Includes
 */
// Loading functions
if (file_exists(LU_CORE_INC . 'functions.php')) {
    require_once LU_CORE_INC . 'functions.php';
}

// Loading shortcodes
if (file_exists(LU_CORE_INC . 'shortcodes.php')) {
    require_once LU_CORE_INC . 'shortcodes.php';
}
