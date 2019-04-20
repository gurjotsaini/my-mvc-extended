<?php
    /**
     * Created by User: gurjot
     */

    class Posts extends Controller
    {
        public function __construct () {
            // Check to see if $_SESSION['user_id'] is there
            // Or, check to see if user is logged in or not
            if (!isLoggedIn()) {
                redirect('users/login');
            }
        }

        public function index() {
            $data = [
                'page_title'    =>  'Posts'
            ];

            $this->view('posts/index', $data);
        }
    }