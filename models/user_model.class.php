<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of user_model.class.php
 * @title UserModel
 * @authors awenger
 * @date 11/01/2018
 * @description User Model Class, Handles operations done on a user
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
        $sql = "SELECT *";
        $sql .= " FROM " . $this->db->getUserTable();
        $sql .= " WHERE username = '" . $username ."'";
      
        //execute the query
        $query = $this->dbConnection->query($sql);
        
        if ($query && $query->num_rows > 0){
            $user = $query->fetch_assoc();
            return password_verify($password , $user['password']);
        }else{
            return false;
        }
    }
    
    public function resetPassword($username, $password) {
        
        $password = password_hash($password , PASSWORD_DEFAULT);

        $sql = "UPDATE " . $this->db->getUserTable() . " SET password = " . $password;
        $sql .= " WHERE username = '" . $username ."'";

        //execute the query
        $query = $this->dbConnection->query($sql);

        return $query;
        
    }
    
    public function addUser($username, $password, $email, $firstName, $lastName) {
    //SQL select statement
        $id = $this->generateId();
        $password = password_hash($password , PASSWORD_DEFAULT);
        if ($id >= 0){
            $sql = "INSERT INTO " . $this->db->getUserTable() . " VALUES (" . $id . ", '" . $username . "', '" . $password . "', '" . $email . "', '" . $firstName . "', '" . $lastName . "')";

            //execute the query
            $query = $this->dbConnection->query($sql);

            return $query;
        }else{
            return false;
        }
        
    }
    
    public function generateId(){
        $sql = "SELECT *";
        $sql .= " FROM " . $this->db->getUserTable();
        
        $query = $this->dbConnection->query($sql);
        
        if ($query){
            return $query->num_rows + 1;
        }else{
            return -1;
        }
    }
}
