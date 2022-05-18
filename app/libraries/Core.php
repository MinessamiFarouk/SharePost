<?php
    /*
        * core howa lighadi it7akambi url dyal appk kamlla o ghadi ijib lina controllers/method/param 3la 7sab url li3tinah
        * Main App Core Class
        * Creates URL & core controller
        * URL FORMAT - /controller/method/params
    */
    class Core {
        protected $CurrentController = 'Pages';
        protected $CurrentMethod = 'index';
        protected $Params = [];

        public function __Construct(){

            $url = $this->getUrl();
            
            if(isset($url)) {
                if(file_exists('../app/controllers/'. ucwords($url[0]) . '.php')){
                    $this->CurrentController = ucwords($url[0]);
                    //unset the index
                    unset($url[0]);
                }
            }
           
            //Require the controlle
            require_once('../app/controllers/'.$this->CurrentController . '.php');

            //instantiate the controller
            $this->CurrentController = new $this->CurrentController;

            //check for second part of url
            if(isset($url[1])){
                //check to see if method existe in controllers
                if(method_exists($this->CurrentController, $url[1])){
                    $this->CurrentMethod = $url[1];
                    unset($url[1]);
                }
            }

            //get params
            $this->Params = $url ? array_values($url) : [];
            
            //call a callback with array of params
            call_user_func_array([$this->CurrentController, $this->CurrentMethod], $this->Params);

            //call_user_func_array is run a function with thier params that come in array
        }
        public function getUrl() {
            if(isset($_GET['url'])){
                $newURL = rtrim($_GET['url'], '/');
                $newURL = filter_var($newURL, FILTER_SANITIZE_URL);
                $newURL = explode('/', $newURL);
                return $newURL;
            }
        }
    }