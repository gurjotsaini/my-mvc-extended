<?php
    /**
     * Created by User: gurjot
     */

    class Posts extends Controller
    {
        public function index() {
            $data = [
                'page_title'    =>  'Posts'
            ];

            $this->view('posts/index', $data);
        }
    }