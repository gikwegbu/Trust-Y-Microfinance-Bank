<?php 
session_start();
        
if(!isset($_SESSION['admin_login'])) 
    header('location:adminlogin.php');   
?>
<?php
include '../_inc/dbconn.php';
$id= $_REQUEST['customer_id'];
try{
$sql="SELECT * FROM `customer` WHERE id=:id";
$s=$conn->prepare($sql);
$s->bindValue(':id',$id);
$s->execute();

}catch(PDOException $e){}
$rws= $s->fetch();
?>
<?php
                        $delete_id=  $_REQUEST['customer_id'];
                        if(isset($_REQUEST['submit2_id'])){
         
         try{
$sql="SELECT * FROM `customer` WHERE id=:id";
$s=$conn->prepare($sql);
$s->bindValue(':id',$id);
$s->execute();

}catch(PDOException $e){
echo 'error while getting customer '
.$e->getMessage();
}
// remove customer files
         $unlinker=$s->fetch();
         unlink($unlinker['passport']);
         unlink($unlinker['reg_form']);
         //remove customer passwords
         
                  try{
$sql="Delete FROM `signature` WHERE signator=:id";
$s=$conn->prepare($sql);
$s->bindValue(':id',$id);
$s->execute();

}catch(PDOException $e){
        echo 'failed to delete signature '.$e->getMessage();
        }
         
         //delete actual info 
        try{          $sql_delete="DELETE FROM `customer` WHERE `id` = :id";
		  $s=$conn->prepare($sql_delete);
		  $s->bindValue(':id',$id);
		  $s->execute();
                            $sql_drop="DROP TABLE passbook".$delete_id;
    $conn->exec($sql_drop);
	      header('location:admin_homepage.php');
    }catch(PDOException $e){
  echo 'error in removing account '.$e->getMessage();
                            }
                        }
                        
                                   
                        ?>
<!DOCTYPE HTML>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../css/css.css"/>
        
        <title>customer editing</title>
        
    </head>
    <?php include 'header.php'; ?>
        <div class='content_addstaff'>
    <?php include 'admin_navbar.php'?>
                <div class='addstaff'>
                <form action="alter_customer.php" method="POST">
            <table align="center">
                                <input type="hidden" name="current_id" value="<?php echo $id;?>"/>
                 <tr><td colspan='2' align='center' style='color:#2E4372;'><h3><u>Edit Customer Details</u></h3></td></tr>
                <tr>
                    <td>First name</td>
                    <td><input type="text" name="edit_fname" value="<?php echo $rws[1];?>" required=""/></td>
                </tr>
                    <tr>
                    <td>Surname</td>
                    <td><input type="text" name="edit_lname" value="<?php echo $rws['surname'];?>" required=""/></td>
                </tr>
                
                <tr>
                    <td>gender</td>
                    <td>
                        M<input type="radio" name="edit_gender" value="M" <?php if($rws[2]=="M") echo "checked";?>/>
                        F<input type="radio" name="edit_gender" value="F" <?php if($rws[2]=="F") echo "checked";?>/>
                    </td>
                </tr>
                <tr>
                    <td>
                        DOB
                    </td>
                    <td>
                        <input type="date" name="edit_dob" value="<?php echo $rws[3];?>"/>
                    </td>
                </tr>
                <tr>
                    <td>Nominee</td>
                    <td><input type="text" name="edit_nominee" value="<?php echo $rws[4];?>" required=""/></td>
                </tr>
                <tr>
                    <td>account type</td>
                    <td>
                        <select name="edit_account">
                            <option <?php if($rws[5]=="savings") echo "selected";?>>savings</option>
                            <option <?php if($rws[5]=="current") echo "selected";?>>current</option>
                        </select>
                    </td>
                </tr>
                
                                
                <tr>
                    <td>Address:</td>
                    <td><textarea name="edit_address"><?php echo $rws[6];?></textarea></td>
                </tr>
                
                    <td>mobile</td>
                    <td><input type="text" name="edit_mobile" value="<?php echo $rws[7];?>" required=""/></td>
                </tr>

                <tr>
                    <td>email id</td>
                    <td><input type="email" name="edit_email" value="<?php echo $rws[8];?>" required=""/></td>
                </tr>
                
                <tr>
                    <td colspan="2" align='center' style='padding-top:20px'><input type="submit" name="alter_customer" value="UPDATE DATA" class='addstaff_button'/></td>
                </tr>
            </table>
        </form>
                
        </div>
        </div>
                
           
    </body>
</html>