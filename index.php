<?php

/*
 * Author: Alex Wenger Kevin June
 * Date: 11/01/2018
 * Name: index.php
 * Description: it's the main index file
 */

//include code in vendor/autoload.php file
require_once ("vendor/autoload.php");

//Autoloader doesn't work
require("controllers/user_controller.class.php");
require("models/user_model.class.php");
require("views/index/register.class.php");
require("views/index/index.class.php");
require("views/login/login.class.php");
require("views/reset/reset.class.php");

$user_controller = new UserController();


if(isset($_GET['action']) && ($_GET['action'] != '')){
    switch ($_GET['action']){
        case "verify":
            $user_controller->verifyUser($_POST['username'], $_POST['password']);
            break;
        case "register":
            $user_controller->registerUser($_POST['username'], $_POST['password'], $_POST['email'], $_POST['fname'], $_POST['lname']);
            break;
        case "logout":
            $user_controller->logoutUser();
            break;
        case "login":
            $user_controller->login();
            break;
        case "reset":
            $user_controller->reset();
            break;
        case "do_reset":
            $user_controller->performReset($_POST['username'], $_POST['password']);
            break;
        default:
            $user_controller->registerUser($_POST['username'], $_POST['password'], $_POST['email'], $_POST['fname'], $_POST['lname']);
            break;
    }
}else{
    $user_controller->home();
}

