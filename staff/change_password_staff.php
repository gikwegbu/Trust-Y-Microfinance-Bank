<?php 
session_start();
include '../_inc/dbconn.php';
        
if(!isset($_SESSION['staff_login'])) 
    header('location:staff_login.php');   
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Change Password</title>
        <style>
            .displaystaff_content table,th,td {
    padding:6px;
    border: 1px solid #2E4372;
   border-collapse: collapse;
   text-align: center;
}

        </style>
        <link rel="stylesheet" href="../css/css.css">
    </head>
        <?php include 'header.php' ?>
        <div class='content'>
           <?php include 'staff_navbar.php'?>
            <div class="displaystaff_content">
                
                <h3 style="text-align:center;color:#2E4372;"><u>Change Password</u></h3>
            <form action="index.php" method="POST">
                <table align="center">
                    <tr>
                        <td>Enter old password</td>
                        <td><input type="password" name="old_password" required=""/></td>
                    </tr>
                    <tr>
                        <td>Enter new password</td>
                        <td><input type="password" name="new_password" required=""/></td>
                    </tr>
                    <tr>
                        <td>Enter password again</td>
                        <td><input type="password" name="again_password" required=""/></td>
                    </tr></table>
                    
                        <table align="center"><tr>
                        <td><input type="submit" name="change_password" value="Change Password" class='addstaff_button'/></td>
                    </tr>
                </table>
            </form>
           
          
        </div>
        <?php include 'footer.php';?>