<?php 
session_start();
        
if(!isset($_SESSION['staff_login'])) 
    header('location:staff_login.php');   
?>
<?php
if(isset($_REQUEST['submit'])&& $_REQUEST['submit']=='cheque_approve')
{
    include '_inc/dbconn.php';
    $id=$_REQUEST['customer_id'];
    try{
    $sql="SELECT * FROM cheque_book WHERE id='$id'";
    $result=  $conn->query($sql);
    }catch (PDOException $e){
    	echo "failed to issue cheque book, please try again later";
    }
    $rws= $result->fetch();
                
    if($rws[3]=="PENDING"){
    	try {
    $sql="UPDATE cheque_book SET cheque_book_status='ISSUED' WHERE id='$id'";
    
    
    $conn->exec($sql);
    }catch(PDOException $e){
    	echo 'failed in updating check book status,please try again later'.$e->getMessage();
    }
    
    echo '<script>alert("Cheque Book Issued");';
    echo 'window.location= "staff_cheque_approve.php";</script>';
    }
}