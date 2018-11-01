<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of toy_model
 *
 * @author awenger
 */
class UserModel {
    
    private $db;
    private $dbConnection;
    
    public function __construct(){
        $this->db = Database::getInstance();
        $this->dbConnection = $this->db->getConnection();
    }
    
    /*
     * this method retrieves all toys from the database and
     * returns an array of Toy objects if successful or false if failed.
     */
    public function verifyUser($username, $password) {
    //SQL select statement
        $sql = "SELECT * FROM " . $this->db->getUserTable() . "WHERE username = " . $username . " and password = " . $password;
 
        //execute the query
        $query = $this->dbConnection->query($sql);
 
        if ($query && $query->num_rows > 0){
            return true;
        }else{
            return false;
        }
    }
    
    public function addUser($username, $password, $email, $firstName, $lastName) {
    //SQL select statement
        $sql = "INSERT INTO  " . $this->db->getUserTable() . "VALUES (" . $username . ", " . $password . ", " . $email . ", " . $firstName . ", " . $lastName . ")";
 
        //execute the query
        $query = $this->dbConnection->query($sql);
 
        return $query;
    }
}
