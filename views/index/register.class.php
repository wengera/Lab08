<?php
/*
 * Author: Alex Wenger
 * Date: 11/01/2018
 * Name: register.class.php
 * Description: This class extends the View class. The "display" method displays a registration form. 
 */

class Register extends View {
    public function display() {
        
        //call the header method defined in the parent class to add the header
        parent::header();
        ?>
        <!-- page specific content starts -->
        <!-- top row for the page header  --> 
        <div class="top-row">CREATE AN ACCOUNT</div>  
        
        <!-- middle row -->
        <div class="middle-row">
            <p>Please complete the entire form. All fields are required.</p>
            <form method="post" action="index.php?action=register">
                <div><input type="text" name="username" style="width: 99%" required="" placeholder="Username"></div>
                <div><input type="password" name="password" style="width: 99%" required="" minlength="5" placeholder="Password, 5 characters minimum"></div>
                <div><input type="email" name="email" style="width: 99%" required="" placeholder="Email"></div>
                <div><input type="text" name="fname" style="width: 99%" required="" placeholder="First name"></div>
                <div><input type="text" name="lname" style="width: 99%" required="" placeholder="Last name"></div>
                <div><input type="submit" class="button" value="register"></div>
            </form>
        </div>
        
        <!-- bottom row for links  -->
        <div class="bottom-row">         
            <span style="float: left">Already have an account? <a href="index.php?action=login">Login</a></span>
            <span style="float: right">Don't have an account? <a href="index.php">Register</a></span>
        </div>
        <!-- page specific content ends -->
        
        
        <?php
        //call the footer method defined in the parent class to add the footer
        parent::footer();
    }
}