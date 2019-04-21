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
        }

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
        }
    }