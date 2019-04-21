<?php
    /**
     * Created by User: gurjot
     */

    /**
     * Page redirect
     *
     * @param $location
     */
    function redirect( $location) {
        header('Location: ' . URL_ROOT . '/' . $location);
    } // end of redirect method