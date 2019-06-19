<?php 
session_start();
        
if(!isset($_SESSION['customer_login'])) 
    header('location:index.php');   
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Transfer Funds</title>
        
        <link rel="stylesheet" href="../css/css.css">
          <style>
            .content_customer table,th,td {
    padding:6px;
    border: 1px solid #2E4372;
   border-collapse: collapse;
   text-align: center;
}
.content_customer td{
    padding:10px;
}
.head{
    
  text-align:center;
    color:#2E4372;
    font-weight:bold;
}

        </style>
    </head>
        <?php include 'header.php' ?>
        <div class='content_customer'>
            
           <?php include 'customer_navbar.php'?>
            <div class="customer_top_nav">
             <div class="text">Welcome <?php echo $_SESSION['name']?></div>
            </div>
            <br><br><br><br>
        <h3 style="text-align:center;color:#2E4372;"><u>Transfer Funds</u></h3>
            
                    
                    <?php
                    include '../_inc/dbconn.php';
        $sender_id=$_SESSION["login_id"];
        
        try{
        $sql="SELECT * FROM beneficiary1 WHERE sender_id='$sender_id' AND status='ACTIVE'";
        $result=  $conn->query($sql);
       }catch(PDOException $e){
       	echo 'Error in trying to find transfer '.$e->getMessage();
       } $rws=$result->fetch();
        $s_id=$rws[1];              
        ?>
        
    
        <?php       
        if($sender_id==$s_id)    
        {
        echo "<form action='customer_transfer_process.php' method='POST'>";
        echo "<table align='center'>";
        echo "<tr><td>Select Beneficiary:</td><td> <select name='transfer'>" ; 
        try{
        $sql1="SELECT * FROM beneficiary1 WHERE sender_id='$sender_id' AND status='ACTIVE'";
        $result=$conn->query($sql);
                }catch(PDOException $e){
  echo $e->getMessage();
                }
        foreach($result as $rws) {
        echo "<option value='$rws[3]'>$rws[4]</option>";
        }
      
        echo "</td></tr></select>";
         
        echo "<tr><td>Enter Amount: </td><td><input type='number' name='t_val' required></td></table>";
        
        echo "<table align='center'><tr><td style='padding:5px;'><input type='submit' name='submitBtn' value='Transfer' class='addstaff_button'></td></tr></table></form>"; 
        }
        else{
            echo "<br><br><div class='head'><h3>No Benefeciary Added with your account.</h3></div>";
        }
        ?>
    </div> 
    <?php include 'footer.php'; ?>