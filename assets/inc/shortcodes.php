<?php
/*
 *  List Users shortcodes
 */

// Make sure we don't expose any info if called directly
if (!function_exists('add_action')) {
    echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
    exit;
}


function users_list_shortcode()
{
    $request_uri = 'https://jsonplaceholder.typicode.com/users';
    $request = wp_remote_get($request_uri);
    $output = '';

    if (is_wp_error($request) || '200' != wp_remote_retrieve_response_code($request)) {
        return;
    }

    $users = json_decode(wp_remote_retrieve_body($request));
    if (empty($users)) {
        return;
    }

    $output = '<table width="100%"  style="border: 0px solid #ddd; " >';
    $output .= '<th>ID</th><th>Name</th><th>Username</th>';
    $output .= '';
    foreach ($users as $user) {
        $output .= sprintf(
            '<tr><td><a class="user_more" href="#popup" rel="modal:open" data-user_id="%s">%s</a></td><td><a class="user_more" href="#popup" rel="modal:open" data-user_id="%s">%s</a></td><td><a class="user_more" href="#popup" rel="modal:open" data-user_id="%s">%s</a></td></tr>',
            esc_html($user->id),
            esc_html($user->id),
            esc_html($user->id),
            esc_html($user->name),
            esc_html($user->id),
            esc_html($user->username)
        );
    }
    $output .= '</table>';
    return $output;
}

add_shortcode('list_users', 'users_list_shortcode');
