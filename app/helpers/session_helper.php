<?php
    /**
     * Created by User: gurjot
     */

    // Starting Sessions
    session_start();

    /**
     * Flash message helper
     * Example: flash('register_success', 'This is the message', 'alert alert-danger');
     * Display in View: echo flash('register_success');
     *
     * @param string $name
     * @param string $message
     * @param string $class
     */
    function flash( $name = '', $message = '', $class = 'alert alert-success') {
        // Checking if name is not empty
        if (!empty($name)) {
            // Checking if message is not empty is not already set
            if (!empty($message) && empty($_SESSION[$name])) {
                // Checking if $_SESSION[$name] is empty
                if (!empty($_SESSION[$name])) {
                    unset($_SESSION[$name]);
                }

                // Checking if $_SESSION[$name . '_class'] is empty
                if (!empty($_SESSION[$name . '_class'])) {
                    unset($_SESSION[$name . '_class']);
                }

                $_SESSION[$name]                = $message;
                $_SESSION[$name . '_class']     = $class;
            } elseif (empty($message) && !empty($_SESSION[$name])) {
                $class = !empty($_SESSION[$name . '_class']) ? $_SESSION[$name . '_class'] :  '';
                echo '<div class="'. $class .'" id="msg-flash">'. $_SESSION[$name] .'</div>';

                unset($_SESSION[$name]);
                unset($_SESSION[$class]);
            }
        }
    }