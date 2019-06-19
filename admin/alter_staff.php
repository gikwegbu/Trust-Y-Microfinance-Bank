<?php 
session_start();
        
if(!isset($_SESSION['admin_login'])) 
    header('location:adminlogin.php');   
?>
<?php
include '../_inc/dbconn.php';
$name= $_REQUEST['edit_name'];
$gender= $_REQUEST['edit_gender'];
$dob= $_REQUEST['edit_dob'];
$id= $_REQUEST['current_id'];
$status= $_REQUEST['edit_status'];
$dept= $_REQUEST['edit_dept'];
$doj= $_REQUEST['edit_doj'];
$address= $_REQUEST['edit_address'];
$email= $_REQUEST['edit_email'];
$mobile= $_REQUEST['edit_mobile'];
try{
$sql="UPDATE staff SET  name=:name, email=:email,dob=:dob, relationship=:status, 
    department=:dept, doj=:doj, address=:address, 
        mobile=:mobile, gender=:gender WHERE id='$id'";
$s=$conn->prepare($sql);
$s->bindValue(':name',$name);
$s->bindValue(':dob',$dob);
$s->bindValue(':status',$status);
$s->bindValue(':dept',$dept);
$s->bindValue(':doj',$doj);
$s->bindValue(':address',$address);
$s->bindValue(':mobile',$mobile);
$s->bindValue(':email',$email);
$s->bindValue(':gender',$gender);
$s->execute();
header('location:admin_homepage.php');
}
catch(PDOException $e){
	echo 'Staff update failed'.$e->getMessage();
}

?>