<?php
/*
 * Author: Alex Wenger Kevin June
 * Date: 11/01/2018
 * Name: reset.class.php
 * Description: This class extends the View class. The "display" method displays a reset password form. 
 */

class Reset extends View {
    public function display($username) {
        
        //call the header method defined in the parent class to add the header
        parent::header();
        ?>
        <!-- page specific content starts -->
        <!-- top row for the page header  --> 
        <div class="top-row">RESET PASSWORD</div>  
        
        <!-- middle row -->
        <div class="middle-row">
            <p>Please enter a new password. Username is not changeable.</p>
            <form method="post" action="index.php?action=do_reset">
                <div><input type="text" name="username" style="width: 99%" required="" value="<?= $username ?>" readonly="readonly"></div>
                <div><input type="password" name="password" style="width: 99%;" required="" minlength="5" placeholder="Password, 5 characters minimum"></div>
                <div><input type="submit" class="button" value="Reset Password"></div>
            </form>
        </div>
        
        <!-- bottom row for links  -->
        <div class="bottom-row">         
            <span style="float: left">Cancel password reset? <a href="index.php?action=login">Cancel Reset</a></span>
            <span style="float: right"></span>
        </div>
        <!-- page specific content ends -->
        
        
        <?php
        //call the footer method defined in the parent class to add the footer
        parent::footer();
    }
}