<?php
    /**
     * Created by User: gurjot
     */

    class Users  extends Controller
    {
        public function __construct () {

        }

        public function register() {
            // Check for POST
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Process the form
            } else {
                // Init Data
                $data = [
                    'page_title'            =>  'Register',
                    'name'                  =>  '',
                    'email'                 =>  '',
                    'password'              =>  '',
                    'confirm_password'      =>  '',
                    'name_error'            =>  '',
                    'email_error'           =>  '',
                    'password_error'        =>  '',
                    'con_password_error'    =>  ''
                ];
                // Load view
                $this->view('users/register', $data);
            }
        } // end of register method

        public function login() {
            // Check for POST
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Process the form
            } else {
                // Init Data
                $data = [
                    'page_title'            =>  'Login',
                    'email'                 =>  '',
                    'password'              =>  '',
                    'email_error'           =>  '',
                    'password_error'        =>  ''
                ];
                // Load view
                $this->view('users/login', $data);
            }
        } // end of login method
    }