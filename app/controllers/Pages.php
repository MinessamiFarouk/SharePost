<?php
    class Pages extends Controller{

        public function __Construct() {
        }

        public function index() {
            $data = [
                'tittle' => 'sharePosts',
                'description' => 'Simple Social Network build on the sharePost PHP Framework'
            ];
            $this->view('pages/index', $data);
        }
        
        public function about() {
            $data = [
                'tittle' => 'About us',
                'description' => 'Application To Share Posts With Other Users.'
            ];
            $this->view('pages/about', $data);
        } 
    }