<?php 
session_start();
        
if(!isset($_SESSION['admin_login'])) 
    header('location:adminlogin.php');   
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Add Customer</title>
        
        <link rel="stylesheet" href="../css/css.css">
         
          <link href="signature-pad/assets/jquery.signaturepad.css" rel="stylesheet">
  <!--[if lt IE 9]><script src="signature-pad/assets/flashcanvas.js"></script><![endif]-->
  <script src="signature-pad/assets/jquery.js"></script>
        
    </head>
<?php include 'header.php'; ?>
<div class='content_addcustomer'>
    <?php include 'admin_navbar.php'?>
            <div class='addcustomer'>

<form action="add_customer.php" enctype="multipart/form-data" method="POST">
            <table align="center">
                <tr><td colspan='2' align='center' style='color:#2E4372;'><h3><u>Add Customer</u></h3></td></tr>
                <tr>
                    <td>First Name</td>
                    <td><input type="text" name="f_name" required=""/></td>
                </tr>
                    <tr>
                    <td>Last Name</td>
                    <td><input type="text" name="l_name" required=""/></td>
                </tr>
                
                    <tr>
                    <td>Other Names(If Avail.)</td>
                    <td><input type="text" name="other_names"/></td>
                </tr>
                
                <tr>
                    <td>Gender</td>
                    <td>
                        M<input type="radio" name="customer_gender" value="M" checked/>
                        F<input type="radio" name="customer_gender" value="F" />
                    </td>
                </tr>
                <tr>
                    <td>
                        DOB
                    </td>
                    <td>
                        <input type="date" name="customer_dob" required=""/>
                    </td>
                </tr>
                <tr>
                    <td>Nominee</td>
                    <td><input type="text" name="customer_nominee" required=""/></td>
                </tr>
                <tr>
                    <td>
                        Branch
                    </td>
                    <td>
                        <select name="branch">
                            <option>ABA</option>
                            <option>ENUGU</option>
                            <option>OWERRI</option>
                            
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Account type</td>
                    <td>
                        <select name="customer_account">
                            <option>savings</option>
                            <option>current</option>
                            
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Initial Deposit</td>
                    <td><input type="text" placeholder="minimum 1000" name="initial" value="1000" min="1000" required=""/></td>
                </tr>
                
                <tr>
                    <td>Residential Address:</td>
                    <td><textarea name="customer_address" required=""></textarea></td>
                </tr>
                <tr>
                    <td>Mobile</td>
                    <td><input type="tel" name="customer_mobile" required=""/></td>
                </tr>

                <tr>
                    <td>Email </td>
                    <td><input type="email" name="customer_email" required=""/></td>
                </tr>
                
                
                    <tr>
                    <td> Office Address  </td>
                    <td><input type="text" name="office_address" required=""/></td>
                </tr>
                
                    <tr>
                    <td>Nationality</td>
                    <td><input type="text" name="nationality" required=""/></td>
                </tr>
                
                    <tr>
                    <td>State Of Origin</td>
                    <td><input type="text" name="state_of_origin" required=""/></td>
                </tr>
                
                
                    <tr>
                    <td>LGA </td>
                    <td><input type="text" name="lga" required=""/></td>
                </tr>
                
                    <tr>
                    <td>Home Town </td>
                    <td><input type="text" name="home_town" required=""/></td>
                </tr>
                
                    <tr>
                    <td>Tribe </td>
                    <td><input type="text" name="tribe" required=""/></td>
                </tr>
                
                    <tr>
                    <td>Next Of Kin </td>
                    <td><input type="text" name="next_of_kin" required=""/></td>
                </tr>
                  <tr>
                    <td>Next Of Kin Mobile </td>
                    <td><input type="tel" name="next_of_kin_mobile" required=""/></td>
                </tr>
                
                     <tr>
                    <td>Office Recommendation </td>
                    <td><input type="text" name="office_recommend" required=""/></td>
                </tr>
                    <tr>
                    <td>Mothers Maiden Name</td>
                    <td><input type="text" name="maiden_name" required=""/></td>
                </tr>
                
                
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="customer_pwd" required=""/></td>
                </tr>
                
                    <tr>
                    <td>Ref No </td>
                    <td><input type="text" name="ref" required=""/></td>
                </tr>
                
               <tr>
                    <td>Passport </td>
                    <td><input type="file" name="passport" required=""/></td>
 
                </tr>
                
                      <tr>
                    <td>Registeration Form(If Avail.) </td>
                    <td><input type="file" name="reg_form" required=""/></td>
                </tr>
                
                <tr><td>
 <div class="sigPad">
      
     
      <ul class="sigNav">
      
        <li class="drawIt"><a href="#draw-it" class="current" >Sign</a></li>
        <li class="clearButton"><a href="#clear">Clear</a></li>
      </ul>
      <div class="sig sigWrapper">
        <div class="typed"></div>
        <canvas class="pad" width="198" height="66" id="canvas1"></canvas>
        <input type="hidden" name="output" class="output">
         <label for="canvas1">Customer Sign.</label>
      </div>
    </div>
</td><tr><td>

    <div class="sigPad">
      <br><br>
     
      <ul class="sigNav">
      
        <li class="drawIt"><a 
        href="#draw-it" class="current" >Sign</a></li>
        <li class="clearButton"><a href="#clear">Clear</a></li>
      </ul>
      <div class="sig sigWrapper">
        <div class="typed"></div>
        <canvas class="pad" width="198" height="66" id="canvas2"></canvas>
        <input type="hidden" name="output-2" class="output">
         <label for="canvas2">Staff Sign.</label>
      </div>
    </div>
</td>
                </tr>
                
                <tr>
                    <td colspan="2" align='center' style='padding-top:20px'><input type="submit" name="add_customer" value="Add Customer" class="addstaff_button"/></td>}
                </tr>
            </table>
            </div>
    </div>
        </form>
        
        
  <script src="signature-pad/assets/jquery.signaturepad.js"></script>
  <script>
    $(document).ready(function() {
      $('.sigPad').signaturePad();
    });
  </script>
  <script src="signature-pad/assets/json2.min.js"></script>
<?php include 'footer.php';?>
    </body>
</html>