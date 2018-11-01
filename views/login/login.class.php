<?php
/**
 * Description of login.class.php
 * @title login
 * @authors awenger
 * @date 11/01/2018
 * @description Login Class
 */

class Login extends View {
    public function display() {
        
        //call the header method defined in the parent class to add the header
        parent::header();
        ?>
        <!-- page specific content starts -->
        <!-- top row for the page header  --> 
        <div class="top-row">Login</div>  
        
        <!-- middle row -->
        <div class="middle-row">
            <p>Please enter your username and password.</p>
            <form method="post" action="index.php?action=verify">
                <div><input type="text" name="username" style="width: 99%" required="" placeholder="Username"></div>
                <div><input type="password" name="password" style="width: 99%" required="" placeholder="Password"></div>
                <div><input type="submit" class="button" value="Login"></div>
            </form>
        </div>
        
        <!-- bottom row for links  -->
        <div class="bottom-row">
            <span style="float: right">Don't have an account? <a href="index.php">Register</a></span>
        </div>
        <!-- page specific content ends -->
        
        
        <?php
        //call the footer method defined in the parent class to add the footer
        parent::footer();
    }
}