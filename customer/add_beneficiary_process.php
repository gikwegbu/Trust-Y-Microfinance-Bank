<?php 
session_start();
        
if(!isset($_SESSION['customer_login'])) 
    header('location: ../index.php');   
?>
<?php
if(isset($_REQUEST['account_no'])):
                $sender_id=$_SESSION["login_id"];
                $sender_name=$_SESSION["name"];
     
                $acc_no=$_REQUEST['account_no'];
                $branch=$_REQUEST['branch_select'];
                $ifsc=$_REQUEST['ifsc_code'];
                
                
                include '../_inc/dbconn.php';
                try{
                $sql1="SELECT * FROM beneficiary1 WHERE sender_id='$sender_id' AND reciever_acc='$acc_no'";
                $result1= $conn->query($sql1);
                }catch(PDOException $e){}
                $rws1= $result1->fetch();
                $s1=$rws1[1];
                $s2=$rws1['reciever_acc'];
                
             try {
                $sql="SELECT * FROM customer WHERE acc_no='$acc_no'";
                
                $result=  $conn->query($sql);
                }catch(PDOException $e){}
                $rws=  $result->fetch();
              $r_id=$rws[0];
			  $payee_name=$rws['name'];
                if($sender_id==$rws[0]) //can't send request to himself
                {
                echo '<script>alert("You cant add yourself as a beneficiery!");';
                     echo 'window.location= "add_beneficiary.php";</script>';
                }
                
                elseif($s1==$sender_id && $s2==$acc_no)
                {
                    echo '<script>alert("You cant add a beneficiery twice!");';
                     echo 'window.location= "add_beneficiary.php";</script>';
                }
                
                elseif($rws['acc_no']!=$acc_no && $rws[11]!=$branch && $rws[12]!=$ifsc)
                {
                echo '<script>alert("Beneficiary Not Found!\nPlease enter correct details");';
                     echo 'window.location= "add_beneficiary.php";</script>';
                }
                
                
                else{
                     
                    $status="PENDING";
                    try{
                $sql="insert into beneficiary1 set sender_id=:sender_id,sender_name=:sender_name,reciever_id=:r_id,reciever_name=:payee_name,status=:status,reciever_acc=:acc_no";
$s=$conn->prepare($sql);
$s->bindValue(':sender_id',$sender_id);
    $s->bindValue(':sender_name',$sender_name);

	$s->bindValue(':r_id',$r_id);
	$s->bindValue(':payee_name',$payee_name);
	$s->bindValue(':acc_no',$acc_no);
	$s->bindValue(':status',$status);
				$s->execute();
                }catch(PDOException $e){
  echo $e->getMessage();
                }
                header("location:display_beneficiary.php");
                }
                endif?>
                