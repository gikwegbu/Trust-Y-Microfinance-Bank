<?php 
session_start();
        
if(!isset($_SESSION['admin_login'])) 
    header('location:adminlogin.php');   
?>
<?php

include '../_inc/dbconn.php';

$name= $_REQUEST['staff_name'];
$gender= $_REQUEST['staff_gender'];
$dob= $_REQUEST['staff_dob'];
$status=  $_REQUEST['staff_status'];
$dept= $_REQUEST['staff_dept'];
$doj= $_REQUEST['staff_doj'];
$address= $_REQUEST['staff_address'];
$mobile= $_REQUEST['staff_mobile'];
$email= $_REQUEST['staff_email'];
$salt="@g26jQsG&nh*&#8v";
$password= $_REQUEST['staff_pwd'];
try{
$sql="insert into staff set name=:name,dob=:dob,relationship=:status,department=:dept,doj=:doj,address=:address,mobile=:mobile,
    email=:email,pwd=:password,gender=:gender";
	$s=$conn->prepare($sql);
	$s->bindValue(':name',$name);
		$s->bindValue(':dob',$dob);
		$s->bindValue(':status',$status);
			$s->bindValue(':dept',$dept);
				$s->bindValue(':doj',$doj);
					$s->bindValue(':address',$address);
						$s->bindValue(':mobile',$mobile);
							$s->bindValue(':email',$email);
							$s->bindValue(':password',$password.$salt);
								$s->bindValue(':gender',$gender);
$s->execute();
}catch(PDOException $e){
	echo "Staff registeration failed. check the email and try again later.".$e->getMessage();
	}
header('location:admin_homepage.php');

?>