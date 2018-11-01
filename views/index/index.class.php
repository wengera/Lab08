<?php
/**
 * Description of index.class.php
 * @title index
 * @authors awenger
 * @date 11/01/2018
 * @description Index Class
 */

class Index extends View {
    public function display($message, $loginStatus) {
        
        //call the header method defined in the parent class to add the header
        parent::header();
        ?>
        <!-- page specific content starts -->
        <!-- top row for the page header  --> 
        <div class="top-row">LOGIN</div>  
        
        <!-- middle row -->
        <div class="middle-row">
            <p><?= $message ?></p>
        </div>
        
        <?php 
            if ($loginStatus){
                
        ?>
            <!-- bottom row for links  -->
            <div class="bottom-row">
                <span style="float: left">
                    Want to log out? <a href="index.php?action=logout">Logout</a>            </span>
                <span style="float: right">Reset password? <a href="index.php?action=reset">Reset</a></span>
            </div>
        <?php
            }else{
        ?>
            <!-- bottom row for links  -->
            <div class="bottom-row">
                 <span style="float: left">Already have an account? <a href="index.php?action=login">Login</a></span>
                <span style="float: right">Don't have an account? <a href="index.php">Register</a></span>
            </div>
        <?php
            }
        ?>
        
        <!-- page specific content ends -->
        
        
        <?php
        //call the footer method defined in the parent class to add the footer
        parent::footer();
    }
}