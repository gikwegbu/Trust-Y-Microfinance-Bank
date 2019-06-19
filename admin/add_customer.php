<?php 

 session_start();
//if(!isset($_SESSION['admin_login'])) 
    //header('location:adminlogin.php');   
?>
    <?php
include '../_inc/dbconn.php';
//,include '../_inc/files.inc.php';

$cust_sign = filter_input(INPUT_POST, 'output', FILTER_UNSAFE_RAW);
$staff_sign = filter_input(INPUT_POST, 'output-2', FILTER_UNSAFE_RAW);

$f_name= $_REQUEST['f_name'];
$l_name= $_REQUEST['l_name'];
$other_names= $_REQUEST['other_names'];

$gender= $_REQUEST['customer_gender'];
$dob=  $_REQUEST['customer_dob'];
$nominee= $_REQUEST['customer_nominee'];
$type=  $_REQUEST['customer_account'];
$credit= $_REQUEST['initial'];
$address=  $_REQUEST['customer_address'];
$mobile= $_REQUEST['customer_mobile'];
$email= $_REQUEST['customer_email'];

$off_addr=$_REQUEST['office_address'];
$nationality= $_REQUEST['nationality'];
$state_of_origin= $_REQUEST['state_of_origin'];

$lga=
$_REQUEST['lga'];
$tribe= $_REQUEST['tribe'];
$next_of_kin= $_REQUEST['next_of_kin'];

$office_recomm=
$_REQUEST['office_recommend'];
$next_of_kin_mobile= $_REQUEST['next_of_kin_mobile'];
$mothers_maiden=$_REQUEST['maiden_name'];
$home_town=$_REQUEST['home_town'];

$ref= $_REQUEST['ref'];


  
  $reg_form_tmp=$_FILES['reg_form']['tmp_name'];
  
  $reg_form = $_FILES['reg_form']['name'];
  $reg_mimetype = $_FILES['reg_form']['type'];
  
  $pass_tmp=$_FILES['passport']['tmp_name'];
  $passport = $_FILES['passport']['name'];
  $pass_mimetype = $_FILES['passport']['type'];
	$mtype='';

   	
 switch($pass_mimetype){
	  case 'image/gif':
	  case 'image/jpg':
	  case 'image/jpeg':
	  case 'image/png':
	  $mtype='image';
	  break;
	  /**
	  case 'text/plain':
	  $type='text';
	  break;
	  case 'text/pdf':
	  $type='pdf';
	  break;
	  case 'video/mp4':
	  case 'video/mpeg':
	  $type='video';
	  break;
	  case 'audio/mp3':
	  $type='audio';
	  break;
	  **/
	 default:
	  $mtype='unknown';
	  echo "passport must be an image!";
	  header('location: .');
	  break;
	  }
	 
  $pass_path='../uploads/' . time() . $_SERVER['REMOTE_ADDR'].$passport;
  
  
 
// Copy the file (if it is deemed safe)
$uploadstatus="";
if (!is_uploaded_file($pass_tmp) or
    !copy($pass_tmp, $pass_path))
{
	
	if ($_FILES['passport']['error'] > 0)
{

switch ($_FILES['passport']['error'])
{
case 1:  
 $uploadstatus='File exceeded upload_max_filesize';  break;
 
case 2:  
 $uploadstatus=
'File exceeded max_file_size';  break;

case 3:  
 $uploadstatus=
 'File only partially uploaded';  break;
 
case 4:  
 $uploadstatus=
'No file uploaded';  break;
}
}
	 echo "Could not save passport! ,please retry later".$uploadstatus;
header('location: .');
}


echo "passport saved";



 switch($reg_mimetype){
	  case 'image/gif':
	  case 'image/jpg':
	  case 'image/jpeg':
	  case 'image/png':
	  $mtype='image';
	  break;
	  /**
	  case 'text/plain':
	  $type='text';
	  break;
	  case 'text/pdf':
	  $type='pdf';
	  break;
	  case 'video/mp4':
	  case 'video/mpeg':
	  $type='video';
	  break;
	  case 'audio/mp3':
	  $type='audio';
	  break;
	  **/
	 default:
	  $mtype='unknown';
	  echo "form must be an image!";
	  header('location: .');
	  break;
	  }
	 
  $reg_path='../uploads/' . time() . $_SERVER['REMOTE_ADDR'].$reg_form;
  
  
 
// Copy the file (if it is deemed safe)
$uploadstatus="";
if (!is_uploaded_file($reg_form_tmp) or
    !copy($reg_form_tmp, $reg_path))
{
	
	if ($_FILES['reg_form']['error'] > 0)
{

switch ($_FILES['reg_form']['error'])
{
case 1:  
 $uploadstatus='File exceeded upload_max_filesize';  break;
 
case 2:  
 $uploadstatus=
'File exceeded max_file_size';  break;

case 3:  
 $uploadstatus=
 'File only partially uploaded';  break;
 
case 4:  
 $uploadstatus=
'No file uploaded';  break;
}
}
	
	echo "Could not save reg_form, please retry later".$uploadstatus;
header('location: .');
}
echo " registeration form saved";


//salting of password
$salt="@g26jQsG&nh*&#8v";
$password=  sha1($_REQUEST['customer_pwd'].$salt);

$branch=  $_REQUEST['branch'];
$date=date("Y-m-d");
switch($branch){
case 'ABA': $ifsc="K421A";
    break;
case 'OWERRI': $ifsc="D30AC";
    break;
case 'ENUGU': $ifsc="B6A9E";
    break;
}
try{
	
$sql="SELECT MAX(id) from customer";
$result=$conn->query($sql);

$rws= $result->fetch();
$id=$rws[0]+1;
$sql="CREATE TABLE passbook".$id." 
    (transactionid int(5) AUTO_INCREMENT, transactiondate date, name VARCHAR(255), branch VARCHAR(255), branch_code VARCHAR(255), credit int(10), debit int(10), 
    amount float(10,2), narration VARCHAR(255), PRIMARY KEY (transactionid))";
    $conn->beginTransaction();
    $conn->exec($sql);
    $conn->commit();
}catch(PDOException $e){
		if($conn->inTransaction()){
$conn->rollback();
	}
	
	echo "passbook creation failed".$e->getMessage();
}
try{

		$sql='insert into customer set first_name=:fname,surname=:lname,other_names=:other_name,gender=:gender,dob=:dob,nominee=:nominee,account=:type,address=:address,mobile=:mobile,email=:email,password=:password,branch=:branch,branch_code=:bcode,office_address=:office_addr,lga=:lga,nationality=:nationality,state_of_origin=:state,tribe=:tribe,mothers_maiden_name=:maiden_name,next_of_kin=:n_of_kin,next_of_kin_mobile=:n_of_kin_mobile,ref_no=:ref,date_reg=:date_reg,office_recommendation=:office_recomm,home_town=:home,passport=:passport,reg_form=:reg_form,acc_status="ACTIVE",acc_no=02234632';
	$s=$conn->prepare($sql);
	$conn->beginTransaction();
	$s->bindValue(':fname',$f_name);
	
		$s->bindValue(':lname',$l_name);
			$s->bindValue(':other_name',$other_names);
	$s->bindValue(':gender',$gender);
	$s->bindValue(':dob',$dob);
	$s->bindValue(':nominee',$nominee);
	$s->bindValue(':type',$type);
	$s->bindValue(':address',$address);
	$s->bindValue(':mobile',$mobile);
	$s->bindValue(':email',$email);
	$s->bindValue(':password',$password);
	$s->bindValue(':branch',$branch);
	$s->bindValue(':bcode',$ifsc);
	
	$s->bindValue(':office_addr',$off_addr);
	$s->bindValue(':lga',$lga);
	$s->bindValue(':nationality',$nationality);
	
		$s->bindValue(':state',$state_of_origin);
	$s->bindValue(':tribe',$tribe);
		$s->bindValue(':maiden_name',$mothers_maiden);
	$s->bindValue(':n_of_kin',$next_of_kin);
	$s->bindValue(':n_of_kin_mobile',$next_of_kin_mobile);
	$s->bindValue(':ref',$ref);
	
		$s->bindValue(':date_reg',date('Y-m-d h:i:s'));
	
		$s->bindValue(':office_recomm',$office_recomm);
		
		$s->bindValue(':home',$home_town);$s->bindValue(':passport',$pass_path);
	$s->bindValue(':reg_form',$reg_path);
	
	
$s->execute() ;
$conn->commit();
}catch(PDOException $e){
	
		if($conn->inTransaction()){
$conn->rollback();
	}
	echo "customer creation failed ".$e->getMessage();
}
try{
	

$sql="insert into passbook".$id." set transactiondate=:date,name=:name,branch=:branch,branch_code=:branch_code,debit=0,credit=:credit,amount=:amt,narration='Account Open'";
$s=$conn->prepare($sql);
$conn->beginTransaction();
$s->bindValue(':date',$date);
$s->bindValue(':name',$f_name.' '.$l_name);
$s->bindValue(':branch',$branch);
$s->bindValue(':branch_code',$ifsc);
$s->bindValue(':credit',$credit);
$s->bindValue(':amt',$credit);

$s->execute();
$conn->commit();
}catch(PDOException $e){
		if($conn->inTransaction()){
$conn->rollback();
	}
	echo "inserting data into passbook failed. ".$e->getMessage();
}


// 1. Get the input from the form
//  Using the PHP filters are the most secure way of doing it


// 2. Confirm the form was submitted before doing anything else

  // 3. Validate that the submitted signature is in an acceptable format
  if (!json_decode($cust_sign) or !json_decode($staff_sign)) {
 echo "problem with changing signature to the right format";
  }
require_once 'signature-pad/signature-to-image.php';
 $img1 = sigJsonToImage($cust_sign);

imagepng($img1, 'cust_sign.png');
imagedestroy($img1);
 $img2 = sigJsonToImage($staff_sign);

imagepng($img2, 'staff_sign.png');
imagedestroy($img2);

    
    // Create some other pieces of information about the user
    //  to confirm the legitimacy of their signature
    $sig_hash = sha1($cust_sign);
    $sig_hash2=sha1($staff_sign);
    $created = time();
    $ip = $_SERVER['REMOTE_ADDR'];

   // 5. Use PDO prepare to insert all the information into the database
   try{
    $sql = $conn->prepare('
      INSERT INTO signatures (signator, signature, sig_hash,signator2,signature2,sig_hash2, ip, created,narration,date)
      VALUES (:signator,:signature,:sig_hash,:signator2,:signature2,:sig_hash2,:ip,:created,:narration,:date)');
      $conn->beginTransaction();
    $sql->bindValue(':signator', $id, PDO::PARAM_STR);
    
      $sql->bindValue(':signator2', $_SESSION['admin_id'], PDO::PARAM_STR);
    $sql->bindValue(':signature', $cust_sign, PDO::PARAM_STR);
    $sql->bindValue(':sig_hash', $sig_hash, PDO::PARAM_STR);
    
      
       $sql->bindValue(':signature2', $staff_sign, PDO::PARAM_STR);
    $sql->bindValue(':sig_hash2', $sig_hash2, PDO::PARAM_STR);
    
    $sql->bindValue(':ip', $ip, PDO::PARAM_STR);
    $sql->bindValue(':created', $created, PDO::PARAM_INT);
       $sql->bindValue(':narration',"ACCOUNT OPENING", PDO::PARAM_STR);
       $sql->bindValue(':date',date('Y-m-d h:i:s'));
    $sql->execute();

    // 6. Trigger the display of the signature regeneration
    $show_form = false;
  


 
 
 
 
 
 $conn->commit();
}catch(PDOException $e){
	if($conn->inTransaction()){
$conn->rollback();
	}
	echo "error why trying to sign ".$e->getMessage();
}
echo 'customer successfully registered';

//header('location:admin_homepage.php');



   


?>