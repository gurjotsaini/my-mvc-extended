<?php
    /**
     * Main file, in which all the Classes, config files are included
     * Created by User: gurjot
     */

    // Load config
    require_once 'config/config.php';

    // Loading helper methods
    require_once 'helpers/url_helper.php';
    require_once 'helpers/session_helper.php';

    // Autoload Core Libraries
    spl_autoload_register(function($className) {
        require_once 'libraries/' . $className . '.php';
    });
