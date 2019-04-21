<?php
    /**
     * Created by User: gurjot
     */

    class Posts extends Controller
    {
        /**
         * Posts constructor.
         */
        public function __construct () {
            // Check to see if $_SESSION['user_id'] is there
            // Or, check to see if user is logged in or not
            if (!isLoggedIn()) {
                redirect('users/login');
            }

            // Calling Post model
            $this->postModel = $this->model('Post');
        } // end of posts/construct method

        /**
         * Returns data for posts/index page
         */
        public function index() {
            // Get posts
            $posts = $this->postModel->getPosts();

            $data = [
                'page_title'    =>  'Posts',
                'posts'         =>  $posts
            ];

            $this->view('posts/index', $data);
        } // end of posts/index method

        public function add() {
            // Check if request method is POST
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Sanitize Post array
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'page_title'    =>  'Posts - Add',
                    'title'         =>  trim($_POST['title']),
                    'body'          =>  trim($_POST['body']),
                    'user_id'       =>  $_SESSION['user_id'],
                    'title_error'   =>  '',
                    'body_error'    =>  ''
                ];

                // Validate title
                if (empty($data['title'])) {
                    $data['title_error'] = 'Please enter title';
                }

                // Validate body
                if (empty($data['body'])) {
                    $data['body_error'] = 'Please enter body text';
                }

                // Make sure that there are no errors
                if (empty($data['title_error']) && empty($data['body_error'])) {
                    // Validated
                    if ($this->postModel->addPost($data)) {
                        flash('post_message', 'Post Added');
                        redirect('posts');
                    } else {
                        die('Something went wrong');
                    }
                } else {
                    // Load View with errors
                    $this->view('posts/add', $data);
                }
            } else {
                $data = [
                    'page_title'    =>  'Posts - Add',
                    'title'         =>  '',
                    'body'          =>  '',
                    'title_error'   =>  '',
                    'body_error'    =>  ''
                ];

                $this->view('posts/add', $data);
            }
        }
    }