
<!DOCTYPE html>

<html>
    <head>
        
        <noscript><meta http-equiv="refresh" content="0;url=misc/no-js.php"></noscript>    
        
        
        <meta charset="UTF-8">
        <title>Microfinance Banking System</title>
       
        
        
      
        <link rel="stylesheet" href="css/css.css">
    </head>
    <body>
   
        <div class="wrapper">
            
        <div class="header">
        
            <img src="img/h-img.jpg" width="100%" height="120px" />
            </div>
            <div class="navbar">
                
            <ul>
            <li><a href="index.php">Home </a></li>
            <li><a href="properties/properties.php">Buy Properties </a></li>
                     <li><a href="loan/loan.php">Get a Micro loan </a></li>
           <?php if(isset($_SESSION['customer_login'])):?>

		   <li><a href="customer/customer_account_summary.php">Profile</a></li>
<?php endif; ?>
            <li id="last"><a href="contact/contact.php">Contact Us</a></li>
            </ul>
            </div>
                           <img src="img/naira.jpg" height="100px" width="100%"/>
						   <?
						 if(!isset($_SESSION['customer_login'])): ?>
        <div class="user_login">
            <form action='index.php' method='POST'>
        <table class="table-responsive"align="left">
            <tr><td><span class="caption">Customer Login</span></td></tr>
            <tr><td colspan="2"><hr></td></tr>
            <tr><td>Email:</td></tr>
            <tr><td><input type="text" name="uname" required></td> </tr>
            <tr><td>Password:</td></tr>
            <tr><td><input class="form-control" type="password" name="pwd" required></td></tr>
            
            <tr><td class="button1"><input type="submit" name="loginBtn" value="Log In" class="button"></td></tr>
        </table>
                </form>
            </div>
<? endif;?>
        <div class="image">
            <img src="img/home.jpg" height="100%" width="100%"/>
              
         
                <br>
            <div class="text">
                
                <a  href="safeonlinebanking.php"><h3>Click to read safe online banking tips</h3></a>
    <a href="misc/t&c.php"><h3>Terms and conditions</h3></a>
    <a href="misc/faq.php"><h3>FAQ'S</h3></a>
    <br>
    <center><h1>
      <a style="text-decoration:none;color:white;font-weight:bold"href="misc/faq.php"><h3>Open An Account Today..<font size="-1">It's fast and easy</font></a></center></h1>
    
  </div>
  
    
            </div>
            
            <div class="left_panel">
                <p>Our Online banking and property purchase  portal provides services that satisfies your banking needs.</p>
                <h3>Features</h3>
                <ul>
                    <li>Registration for online banking</li>
                    <li>Adding Beneficiary account</li>
                    <li>Funds Transfer</li>    <li>Property Purchase</li>
                  <li>Loans</li>     
                    <li>Last Login record</li>
                    <li>Mini Statement</li>
                    <li>ATM and Cheque Book</li>
                    <li>24/7 customer care</li>
                    <li>Account Statement by date</li>
                    
                    
                </ul>
                </div>
            
            <div class="right_panel">
                
                    <h3>Microfinance Online</h3>
                    <ul>
                        <li> this application provides features to administer and manage your accounts online.</li>
                       
                        <li>This Bank(Microfinance) or any of its representative never sends you email/SMS or calls you over phone to get your personal information, password or one time SMS (high security) password.</li>
                        <li>Any such e-mail/SMS or phone call is an attempt to fraudulently withdraw money from your account through Internet Banking. Never respond to such email/SMS or phone call. Please report immediately on report if you receive any such email/SMS or Phone call. Please lock your user access immediately.
</li>
                    </ul>
                </div>
                
                    