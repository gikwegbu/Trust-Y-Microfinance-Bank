<?php 
session_start();
        
if(!isset($_SESSION['staff_login'])) 
    header('location:staff_login.php');   
?>
<?php
if(isset($_REQUEST['approve_beneficiary']))
{
    $id=$_REQUEST['customer_id'];
    
    include '../_inc/dbconn.php';
    try{
    $sql="UPDATE beneficiary1 SET status='ACTIVE' WHERE id='$id'";
    $conn->exec($sql);
    
   echo '<script>alert("Beneficiary status ACTIVE ");';
   echo 'window.location= "staff_beneficiary.php";</script>';
   }catch(PDOException $e){
   	echo 'failed to set beneficiary.please retry later.';
   }
}