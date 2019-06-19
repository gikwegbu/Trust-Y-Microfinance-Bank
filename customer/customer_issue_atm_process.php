<?php 
session_start();
        
if(!isset($_SESSION['customer_login'])) 
    header('location: ../index.php');   
?>
<?php
include '../_inc/dbconn.php';
$name=$_SESSION['name'];
$account_no=$_SESSION['login_id'];
$option=$_REQUEST['atm'];

$atm_status=$cheque_book_status="NOT REQUESTED";
if($option=='ATM')
    $atm_status="PENDING";
else
    $cheque_book_status="PENDING";
    
try{
    $sql="SELECT * FROM cheque_book WHERE account_no='$account_no'";
    $result=$conn->query($sql);
    }catch(PDOException $e){
    	echo "Error in retrieving cheque books";
    }
    $rws=$result->fetch();
    $c_status=$rws[3];
    $c_id=$rws[2];
    try{
    $sql="SELECT * FROM atm WHERE account_no='$account_no'";
    $result=  $conn->query($sql);
    }catch(PDOException $e){
    	echo 'Error in retrieving atm status';
    }
    $rws=$result->fetch();
    $a_status=$rws[3];
    $a_id=$rws[2];
    
    
    if(($option=='ATM' && (($a_status=='PENDING')||($a_status=='ISSUED'))) || ($option=='CHEQUE' && (($c_status=='PENDING')||($c_status=='ISSUED'))))           
    {
        echo '<script>alert("You have already made a request!");';
   echo 'window.location= "customer_issue_atm.php";</script>';
}
  
elseif($option=='ATM'){
	try{
$sql="insert into atm values('','$name','$account_no','$atm_status')";
$conn->exec($sql);

echo '<script>alert("Request succesfull. You will recieve confirmation from branch very soon.");';
echo 'window.location= "customer_issue_atm.php";</script>';
}catch(PDOException $e){
	echo 'ATM request not successfully recorded,please retry later';
}
}
else {
	try{
$sql="insert into cheque_book values('','$name','$account_no','$cheque_book_status')";
$conn->exec($sql);
echo '<script>alert("Request succesfull. You will recieve confirmation from branch very soon.");';
echo 'window.location= "customer_issue_atm.php";</script>';
}catch(PDOException $e){
	echo "some error occured,your request could not be processed now";
}
}


?>