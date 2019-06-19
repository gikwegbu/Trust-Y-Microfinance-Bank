

<?php 
session_start();
        
if(!isset($_SESSION['customer_login'])) 
    header('location:index.php');   
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Personal Details</title>
        
        <link rel="stylesheet" href="newcss.css">
        
        
          <link href="signature-pad/assets/jquery.signaturepad.css" rel="stylesheet">
  <!--[if lt IE 9]><script src="signature-pad/assets/flashcanvas.js"></script><![endif]-->
  <script src="signature-pad/assets/jquery.js"></script>  
        
    </head>

	         <?php
                $cust_id=$_SESSION['cust_id'];
                include '../_inc/dbconn.php';
                require_once '../_inc/helpers.inc.php';
                try{
                $sql="SELECT * FROM customer WHERE email='$cust_id'";
                $result= $conn->query($sql);
                }catch(PDOException $e){
    echo 'problem in retrieving your details, please retry later';
                }
                $rws=$result->fetch();
                
                
                $fname= $rws[1];
                $lname=$rws['surname'];
                $account_no= $rws[0];
                $dob=$rws[3];
                $nominee=$rws[4];
                $branch=$rws[10];
                $branch_code= $rws[11];
                
                $gender=$rws[2];
                $mobile=$rws[7];
                $email=$rws[8];
                $address=$rws[6];
                
                $last_login= $rws[12];
                
                $acc_status=$rws[13];
                $acc_type=$rws[5];
				 $acc_no=$rws['acc_no'];
             $passport=$rws['passport'];
                
                 try{
                $sql="SELECT * FROM signatures WHERE signator='$account_no'";
                $result= $conn->query($sql);
              
                }catch(PDOException $e){
    echo 'problem in retrieving your signature '.$e->getMessage();
                }
                  $sign=$result->fetch();
                $signature=$sign['signature'];
                                
?>
        <?php include 'header.php' ?>
        <div class='content_customer'>
                    <div class="customer_top_nav">
             <div  class="text">Welcome <?php echo $_SESSION['name']?></div>
            </div>
            <br><br><br><br>
            <h3 style="text-align:center;color:#2E4372;"><u>Personal Details</u></h3>
            
             
            <div class="content3">
            <p><span class="heading">Name: </span><?php echo $fname.' '.$lname;?></p>
            <p><span class="heading">gender: </span><?php if($gender=='M') echo "Male"; else echo "Female";?></p>
            <p><span class="heading">Mobile: </span><?php echo $mobile;?></p>
            <p><span class="heading">Email: </span><?php echo $email;?></p>
            <p><span class="heading">Address: </span><?php echo $address;?></p>
            </div>
            <div class="content4">
                         <img align="right" class="passport" src="<? echo $passport ?>" />
                
            <p><span class="heading">Account No: </span><?php echo $acc_no;?></p>
            <p><span class="heading">Nominee: </span><?php echo $nominee;?></p>
            <p><span class="heading">Branch: </span><?php echo $branch;?></p>
            <p><span class="heading">Branch Code: </span><?php echo $branch_code;?></p>
            
            <p><span class="heading">Account Type: </span><?php echo $acc_type;?></p>
             
            <div ><span class="heading">Signature: </span><?
            
            /**
require_once 'signature-pad/signature-to-image.php';
$json=htmOut($signature);

if(!json_decode($json))
echo "signature corrupted";


$img = sigJsonToImage($json);

// Save to file

imagepng($img, 'signature.png');
// Output to browser
//header('Content-Type: image/png');
//imagepng($img);

 // Destroy the image in memory when complete
 imagedestroy($img);
            **/
   ?>
    <script>
    $(document).ready(function() {
      $('.sigPad').signaturePad();
    });
  </script>
<script>
  $(document).ready(function () {
    // Write out the complete signature from the database to Javascript
    var sig = <?php echo htmlentities($signature, ENT_NOQUOTES, 'UTF-8');?>;
    $('.sigPad').signaturePad({displayOnly : true}).regenerate(sig);
  });
</script>
   
   
   <div class="sigPad" >
    <canvas class="pad" width="198" height="55"></canvas>
   </div>
           
        
  <script src="signature-pad/assets/jquery.signaturepad.js"></script>

  <script src="signature-pad/assets/json2.min.js"></script>
   </div>
            
            </div>
            </div>
           <?php include 'customer_navbar.php'?> 
        </div>
   
               <?php include 'footer.php';?>
            
    </body>
</html>