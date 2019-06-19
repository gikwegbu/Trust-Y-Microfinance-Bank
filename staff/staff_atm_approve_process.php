<?php 
session_start();
        
if(!isset($_SESSION['staff_login'])) 
    header('location:staff_login.php');   
?>
<?php
if(isset($_REQUEST['submit']) && $_REQUEST['submit']=='atm_approve')
{
    include '_inc/dbconn.php';
    $id=$_REQUEST['customer_id'];
    try{
    $sql="SELECT * FROM atm WHERE id='$id'";
    $result= $conn->query($sql);
    $rws=$result->fetch();
                }catch(PDOException $e){
    echo 'failed to retrieve this customers atm status';
                }
    if($rws[3]=="PENDING")
    {try
    {
    $sql="UPDATE atm SET atm_status='ISSUED' WHERE id='$id'";
    
    $conn->exec($sql);
    
   echo '<script>alert("ATM Card Issued");';
   echo 'window.location= "staff_atm_approve.php";</script>';
   }
   catch(PDOException $e){
   	echo "failed to update atm status";
   }
   }
}