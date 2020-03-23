<?php
/*
 *  List Users functions
 */

// Make sure we don't expose any info if called directly
if (!function_exists('add_action')) {
    echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
    exit;
}

/*
 *  to enable custom endpoint ( arbitrary url )
 */
function set_url()
{
    $uri = basename(parse_url(add_query_arg(), PHP_URL_PATH));
    if ($uri == "users-list") {
        add_filter('template_include', function () {
            return LU_TEMPLATES.'/page.php';
        });
        add_action('pre_get_document_title', 'set_page_tittle');
    }
}
add_action('wp', 'set_url');

/*
 *  To set page title
 */
function set_page_tittle() {
    return 'Get Users List API Response';
}
