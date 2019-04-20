<?php
    /**
     * Created by User: gurjot
     */

    class Pages extends Controller
    {
        public function __construct () {

        }

        /**
         * Returns data for index page
         */
        public function index() {
            $data = [
                'page_title'    =>  'Index',
                'title'         =>  'Welcome to MyMVC Extended',
                'description'   =>  'For source code, Go to the following Github page:',
                'github_link'   =>  '<a href="https://github.com/gurjotsaini/my-mvc-extended" class="btn btn-primary my-2" target="_blank">MyMVC Github</a>'
            ];

            $this->view('pages/index', $data);
        }

        /**
         * Returns data for about page
         */
        public function about() {
            $data = [
                'page_title'        =>  'About Us',
                'title'             =>  'About - MyMVC Extended',
                'description'       =>  'Just download it from Github repo, and you are good to go.',
                'app_version'       =>  APP_VERSION
            ];

            $this->view('pages/about', $data);
        }
    }