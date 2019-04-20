<?php
    /**
     * Created by User: gurjot
     */

    // Page redirect
    function redirect($location) {
        header('Location: ' . URL_ROOT . '/' . $location);
    }