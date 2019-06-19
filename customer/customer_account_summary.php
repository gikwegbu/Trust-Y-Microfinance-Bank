<?php 

        
if(!isset($_SESSION['customer_login'])) 
    header('location:index.php');   
?>
<?php
                $cust_id=$_SESSION['cust_id'];
                include '../_inc/dbconn.php';
                try{
                $sql="SELECT * FROM customer WHERE email='$cust_id'";
                $result=  $conn->query($sql);
                $rws= $result->fetch();
                
                
                $name= $rws[1];
                $account_no= $rws[0];
                $branch=$rws[10];
                $branch_code= $rws[11];
                $last_login= $rws[12];
                $acc_status=$rws[13];
                $address=$rws[6];
                $acc_type=$rws[5];
                
                $gender=$rws[2];
                $mobile=$rws[7];
                $email=$rws[8];
                $acc_no=$rws['acc_no'];
                $passport=$rws['passport'];
               $_SESSION['acc_no']=$acc_no; 
               $_SESSION['login_id']=$account_no;
                $_SESSION['name']=$name;
                }catch(PDOException $e){
                	echo $e.getMessage();
                }
                ?>

<!DOCTYPE html>
<html>
    <head>
        
        <meta charset="UTF-8">
        <title>Home - Online Banking</title>
        
        <link rel="stylesheet" href="../css/newcss.css">
    </head>
    
        <?php include 'header.php'; ?>
        <img width="100%" height="200px" src="../img/mtransfer.jpg" />
        
        <div class='content_customer'>
                        <div class="customer_top_nav">
             <div class="">Welcome <?php echo $_SESSION['name']?></div>
            </div>
            
            
            <?php
                try{
                $sql="SELECT * FROM passbook".$account_no." order by transactionid desc";//$_SESSION['login_id'] ;
                $result=  $conn->query($sql);
               
                }
                catch(PDOException $e)       {
          echo "loading details failed.please try again ".$e->getMessage();
                }
             $rws=$result->fetch();
                $balance=$rws[7];
            
?>
            <div class="customer_body">
                <div class="content1">
                   <img align="right" class="passport" src="<? echo $passport ?>" />
                
            <p><span class="heading">Account No: </span><?php echo $acc_no;?></p>
            <p><span class="heading">Branch: </span><?php echo $branch;?></p>
            <p><span class="heading">Branch Code: </span><?php echo $branch_code;?></p>
            </div>
            
            <div class="content2">
            <p><span class="heading">Balance: <del>N</del> </span><?php echo $balance;?></p>
            <p><span class="heading">Account status: </span><?php echo $acc_status;?></p>
            <p><span class="heading">Last Login: </span><?php echo $last_login;?></p>
           </div>
            
            
            
           <?php include 'customer_navbar.php'?>

            
        </div>
   
               <?php include 'footer.php';?>
            
    </body>
</html>