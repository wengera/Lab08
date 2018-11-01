<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of user_controller.class.php
 * @title user_controller
 * @authors awenger
 * @date 11/01/2018
 * @description UserController page
 */
class UserController {
    
    private $userModel;
    
    public function __construct(){
        $this->userModel = new UserModel();
    }
    
    public function home(){
        if(isset($_COOKIE["user"])) {
            $view = new Index();
            $view->display("You have successfully logged in.", true);
        }else{
            $view = new Register();
            $view->display();
        }
        
    }
    
    public function login(){
        $view = new Login();
        $view->display();
    }
    
    public function reset(){
        $view = new Reset();
        $view->display();
    }
    
    public function performReset($username, $password){
        $result = $this->userModel->resetPassword($username, $password);
    }
    
    public function registerUser($username, $password, $email, $firstName, $lastName){
        $user = $this->userModel->addUser($username, $password, $email, $firstName, $lastName);
        
        if ($user){
            $view = new Index();
            $view->display("Your account has been successfully created.", false);
        }else{
            $this->error("Unable to register user: " . $username);
        }
    }
    
    //list all toys
    public function verifyUser($username, $password){

        $user = $this->userModel->verifyUser($username, $password);
        
        if ($user){
            $cookie_name = "user";
            $cookie_value = $username;
            setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
            $view = new Index();
            $view->display("You have successfully logged in.", true);
        }else{
            $this->error("Unable to verify user: " . $username);
        }
    }
    
    public function logoutUser(){
        if(isset($_COOKIE['user'])){
            unset($_COOKIE['user']);
            setcookie('user', null, -1, "/");
            $view = new Index();
            $view->display("You have successfully logged out.", false);
        }else{
            $view = new Register();
            $view->display();
        }
    }
    
    //display an error message
    public function error($message){
        $view = new UserError();
        $view->display($message);
    }
}
