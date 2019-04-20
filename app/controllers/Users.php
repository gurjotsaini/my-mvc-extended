<?php
    /**
     * Created by User: gurjot
     */

    class Users  extends Controller
    {
        public function __construct () {
            // Load User model
            $this->userModel = $this->model('User');
        }

        /**
         *
         */
        public function register() {
            // Check for POST
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Process the form
                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // Init Data
                $data = [
                    'page_title'            =>  'Register',
                    'name'                  =>  trim($_POST['name']),
                    'email'                 =>  trim($_POST['email']),
                    'password'              =>  trim($_POST['password']),
                    'confirm_password'      =>  trim($_POST['confirm_password']),
                    'name_error'            =>  '',
                    'email_error'           =>  '',
                    'password_error'        =>  '',
                    'con_password_error'    =>  ''
                ];

                // Validate Email
                if (empty($data['email'])) {
                    $data['email_error'] = 'Please enter email';
                } else {
                    // Check if email exists
                    if ($this->userModel->findUserByEmail($data['email'])) {
                        $data['email_error'] = 'Email already exists';
                    }
                }

                // Validate Name
                if (empty($data['name'])) {
                    $data['name_error'] = 'Please enter name';
                }

                // Validate Password
                if (empty($data['password'])) {
                    $data['password_error'] = 'Please enter password';
                } elseif (strlen($data['password']) < 6) {
                    $data['password_error'] = 'Password must be at least 6 character long';
                }

                // Validate Confirm Password
                if (empty($data['confirm_password'])) {
                    $data['con_password_error'] = 'Please confirm password';
                } else {
                    if ($data['password'] != $data['confirm_password']) {
                        $data['con_password_error'] = 'Passwords do not match';
                    }
                }

                // Making sure errors are empty
                if (empty($data['email_error']) && empty($data['name_error']) && empty($data['password_error']) && empty($data['con_password_error'])) {
                    // Validated

                    // Hashing password
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                    // Register User
                    if ($this->userModel->register($data)) {
                        flash('register_success', 'You are registered');
                        redirect('users/login');
                    } else {
                        die('Something went wrong');
                    }
                } else {
                    // Load view
                    $this->view('users/register', $data);
                }
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

        /**
         *
         */
        public function login() {
            // Check for POST
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Process the form
                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // Init Data
                $data = [
                    'page_title'            =>  'Login',
                    'email'                 =>  trim($_POST['email']),
                    'password'              =>  trim($_POST['password']),
                    'email_error'           =>  '',
                    'password_error'        =>  ''
                ];

                // Validate Email
                if (empty($data['email'])) {
                    $data['email_error'] = 'Please enter email';
                }

                // Validate Password
                if (empty($data['password'])) {
                    $data['password_error'] = 'Please enter password';
                }

                // Making sure errors are empty
                if (empty($data['email_error']) && empty($data['password_error'])) {
                    // Validated
                    die('Success');
                } else {
                    // Load view
                    $this->view('users/login', $data);
                }
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