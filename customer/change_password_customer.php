<?php 
session_start();
include '../_inc/dbconn.php';
        
if(!isset($_SESSION['customer_login'])) 
    header('location:../index.php');   
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Change Password</title>
        
        <link rel="stylesheet" href="../css/css.css">
        <style>
        .content_customer table,th,td {
    padding:6px;
    border: 1px solid #2E4372;
   border-collapse: collapse;
   text-align: center;
}
</style>
    </head>
        <?php include 'header.php' ?>
        <div class='content_customer'>
           <?php include 'customer_navbar.php'?>
            <div class="customer_top_nav">
             <div class="text">Welcome <?php echo $_SESSION['name']?></div>
            </div>

    <br><br><br><br>
    <h3 style="text-align:center;color:#2E4372;"><u>Change Password</u></h3>
            <form action="" method="POST">
                <table align="center">
                    <tr>
                        <td>Enter old password:</td>
                        <td><input type="password" name="old_password" required=""/></td>
                    </tr>
                    <tr>
                        <td>Enter new password:</td>
                        <td><input type="password" name="new_password" required=""/></td>
                    </tr>
                    <tr>
                        <td>Enter password again:</td>
                        <td><input type="password" name="again_password" required=""/></td>
                    </tr>
                    </table>
                    
                       <table align="center"><tr>
                        <td><input type="submit" name="change_password" value="Change Password" class="addstaff_button"/></td>
                    </tr>
                </table>
            </form>
            <?php
            $change=$_SESSION['login_id'];
            if(isset($_REQUEST['change_password'])){
            	try{
            $sql="SELECT * FROM customer WHERE id='$change'";
            $result=$conn->query($sql);
            $rws= $result->fetch();
            }catch(PDOExecption $e){
   echo $e->getMassage();
            }
            $salt="@g26jQsG&nh*&#8v";
            $old=  sha1($_REQUEST['old_password'].$salt);
            $new=  sha1($_REQUEST['new_password'].$salt);
            $again=sha1($_REQUEST['again_password'].$salt);
            
            if($rws[9]==$old && $new==$again){
            	try{
                $sql1="UPDATE customer SET password='$new' WHERE id='$change'";
                $conn->exec($sql1);
               }
               catch(PDOException $e){
               	echo 'password change failed';
               } header('location:customer_account_summary.php');
            }
            else{
                
                header('location:change_account_summary.php');
            }
            }
            ?>
            
        </div>
        <?php include 'footer.php';?>