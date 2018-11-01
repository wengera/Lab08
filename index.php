<?php

/*
 * Author: your name
 * Date: today's date
 * Name: index.php
 * Description: short description about this file
 */

//include code in vendor/autoload.php file
require_once ("vendor/autoload.php");
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
        //case "____":
            //$user_controller->performReset($_POST['____'], $_POST['____']);
            break;
        default:
            $user_controller->registerUser($_POST['username'], $_POST['password'], $_POST['email'], $_POST['fname'], $_POST['lname']);
            break;

    }
}else{
    $user_controller->home();
}
    



//create an object of UserController

/*
 * $query = $user_controller->getUsers();
while ($row = $query->fetch_assoc()) {
    echo $row['username']."<br>";
}
 */

