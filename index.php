<!-- Author:
   James Ononiwu
   facebook: fb.com/jamesononiwu
     -->

<?php 
   include  '_inc/home_functs.php';
session_start();
?>

<?php 

if(isset($_REQUEST['loginBtn'])){
 $login= log_in_customer($_REQUEST['uname'],$_REQUEST['pwd']);
 
 if($login){
	  header('location: customer/index.php');
 }else{
	 echo "Your Email or Password is incorrect";
	 
 }
 exit();
}
include 'view.php';
   
?>
 <?php include 'footer.php' ?>