<?php 
session_start();
        
if(!isset($_SESSION['admin_login'])) 
    header('location:adminlogin.php');   
?>

<?php
include '../_inc/dbconn.php';
$fname=  $_REQUEST['edit_fname'];
$lname=$_REQUEST['edit_lname'];
$gender= $_REQUEST['edit_gender'];
$dob=  $_REQUEST['edit_dob'];
$id= $_REQUEST['current_id'];
$type= $_REQUEST['edit_account'];
$nominee=  $_REQUEST['edit_nominee'];
$address=  $_REQUEST['edit_address'];
$mobile=  $_REQUEST['edit_mobile'];
$email=  $_REQUEST['edit_email'];
try{
$sql="UPDATE customer SET  first_name=:fname,surname=:lname, dob=:dob, nominee=:nominee, account=:type, 
     address=:address, email=:email,
        mobile=:mobile, gender=:gender WHERE id=:id";
		$s=$conn->prepare($sql);
		$conn->beginTransaction();
		$s->bindValue(':fname',$fname);
		$s->bindValue(':lname',$lname);
				$s->bindValue(':gender',$gender);
						$s->bindValue(':dob',$dob);
								$s->bindValue(':type',$type);
										$s->bindValue(':address',$address);
												$s->bindValue(':mobile',$mobile);
													$s->bindValue(':email',$email);
														$s->bindValue(':nominee',$nominee);
															$s->bindValue(':id',$id);
											
$s->execute();
$conn->commit();
header('location:admin_homepage.php');
}catch(PDOException $e){

if($conn->inTransaction())
$conn->rollback();
	echo "failed to update customer details".$e->getMessage();
}
?>