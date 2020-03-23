<?php
/*
Plugin Name: List Users
Plugin URI: http://PrasadOnline.com
Description: List Users API caller for Inpsyde GmbH
Version: 1.0
Author: Prasad Warnakulasuriya
Author URI: http://PrasadOnline.com
License: GPLv2 or later
Text Domain: list-users
*/

// Make sure we don't expose any info if called directly
if (!function_exists('add_action')) {
    echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
    exit;
}

if (file_exists(plugin_dir_path(__FILE__). 'core-init.php')) {
    require_once(plugin_dir_path( __FILE__ ).'core-init.php');
}
