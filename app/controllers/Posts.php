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

            // Calling User model
            $this->userModel = $this->model('User');
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

        /**
         * Post add method
         */
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
                    'body'          =>  ''
                ];

                $this->view('posts/add', $data);
            }
        } // end of posts/add method

        /**
         * @param $id
         */
        public function show( $id) {
            $post = $this->postModel->getPostById($id);
            $user = $this->userModel->getUserById($post->user_id);

            $data = [
                'page_title'    =>  'Post - ' . $post->title,
                'post'          =>  $post,
                'user'          =>  $user
            ];

            $this->view('posts/show', $data);
        } // end of posts/show method

        /**
         * Post edit method
         *
         * @param $id
         */
        public function edit( $id) {
            // Check if request method is POST
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Sanitize Post array
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'page_title'    =>  'Post - Edit',
                    'id'            =>  $id,
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
                    if ($this->postModel->updatePost($data)) {
                        flash('post_message', 'Post Updated');
                        redirect('posts');
                    } else {
                        die('Something went wrong');
                    }
                } else {
                    // Load View with errors
                    $this->view('posts/edit', $data);
                }
            } else {
                // Get existing post from model
                $post = $this->postModel->getPostById($id);

                // Check for Owner
                if ($post->user_id != $_SESSION['user_id']) {
                    redirect('posts');
                }

                $data = [
                    'page_title'    =>  'Post - Edit',
                    'id'            =>  $id,
                    'title'         =>  $post->title,
                    'body'          =>  $post->body,
                ];

                $this->view('posts/edit', $data);
            }
        } // end of posts/edit method
    }