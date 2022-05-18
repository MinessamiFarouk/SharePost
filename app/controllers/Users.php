<?php
class Users extends Controller{
    public function __construct() {
        
    }

    public function register() {
        //check for post
        if($_SERVER['REQUEST_METHOD'] == 'Post') {
            //process form

            //Init data
            $data = [
                'name' => htmlspecialchars(trim($_POST['name'])),
                'email' => htmlspecialchars(trim($_POST['email'])),
                'password' => htmlspecialchars(trim($_POST['password'])),
                'confirm_password' => htmlspecialchars(trim($_POST['confirm_password'])),
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => '',
            ];

            //Validate Name
            if(empty($data['name'])) {
                $data['name_err'] = 'Please Enter Name';
            }

            //Validate E-mail
            if(empty($data['email'])) {
                $data['email_err'] = 'Please Enter E-mail';
            }

            //Validate Password
            if(empty($data['password'])) {
                $data['password_err'] = 'Please Enter Password';
            }elseif(strlen($data['password']) < 6){
                $data['password_err'] = 'Password must be at least 6 Characters';
            }

            //Validate Comfirm_Password
            if(empty($data['confirm_password'])) {
                $data['confirm_password_err'] = 'Please Confirm Password';
            }else {
                if($data['confirm_password'] != $data['password']) {
                    $data['confirm_password_err'] = 'Password do not Mutch';
                }
            }

            //Make sure that the errors are empty
            if(empty($data['name_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])) {
                die('Success');
            }else {
                //load the view with errors
                $this->view('users/register', $data);
            }
            
        } else{
            $data = [
                'name' => '',
                'email' => '',
                'password' => '',
                'confirm_password' => '',
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => '',
            ];

            $this->view('users/register', $data);
        }
    }

    public function login() {
        //check for post
        if($_SERVER['REQUEST_METHOD'] == 'Post') {
            //process form
        }else{
            $data = [
                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => '',
            ];

            $this->view('users/login', $data);
        }
    }
}