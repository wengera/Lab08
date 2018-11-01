<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of toy_controller
 *
 * @author awenger
 */
class UserController {
    
    private $toy_model;
    
    public function __construct(){
        $this->toy_model = new ToyModel();
    }
    
    //list all toys
    public function all(){
        //get all the toys
        $toys = $this->toy_model->getToys();
        
        if ($toys){
            //display all the toys
             $view = new ToyView();
             $view->display($toys);
        }else{
            $this->error("No Toys were found.");
        }
    }
    
    //display an error message
    public function error($message){
        $view = new ToyError();
        $view->display($message);
    }
}
