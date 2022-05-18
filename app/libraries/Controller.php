<?php
    /*
        * ay controllers ghadi nsawbo ghadi extends man had class ohad fille howa lighadi it7akam fi models o views
        *Base Controller
        *Loads the view and model
    */
    class Controller {
        //Load Model
        public function model($model) {
            if(file_exists('../app/models/' . $model . '.php')){
                //Require the model
                require_once '../app/models/' . $model . '.php';

                //instantaite te model
                return new $model();
            }else {
                die('The Model Does Not Exist');
            }
        }

        //Load View
        public function view($view, $data = []){
            if(file_exists('../app/views/' .$view . '.php')){
                require_once '../app/views/' .$view . '.php';
            }else {
                die('The View Does Not Exist');
            }
        }
    }