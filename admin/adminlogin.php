<?php 
session_start();
        
if(isset($_SESSION['admin_login'])) 
    header('location:admin_homepage.php');   
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <noscript><meta http-equiv="refresh" content="0;url=no-js.php"></noscript>  
    <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width" initial-scale="1">
    <title title="Admin Login - Online Banking">Admin Login - Online Banking</title>
    <link rel="stylesheet" type="text/css" href="admin.css">
    <link rel="stylesheet"  href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
     <link rel="icon" href="../img/site_icon.png" sizes="16*16" type="image/png"><!--this adds an icon to the tab browser for your webpage-->
   
    </head>
     <body>
            <?php include 'header.php'; ?>

     <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h4 class="modal-titile">Admin Login</h4>
                            </div>
                            <div class="modal-body">
                              <form action='' method='POST'>
                                        <div class="form-group has-feedback">
                                            <label for="Username">Username:</label>
                                            <input type="text" name="uname" class="form-control" required  placeholder="Username">
                                            <span id="user" class="glyphicon glyphicon-user form-control-feedback"></span>
                                        </div>
                                        <div class="form-group has-feedback">
                                            <label for="Password1">Password</label>
                                            <input type="password" name="pwd" class="form-control" required  placeholder="Password">
                                            <span id="lock" class="glyphicon glyphicon-lock form-control-feedback"></span>
                                        </div>
                                          <div class="form-group">
                                                <div class="">
                                                  <div class="checkbox">
                                                    <label><input type="checkbox"> Remember me</label>
                                                  </div>
                                                </div>
                                          </div>
                                        <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
                                      
                                        <input type="submit" name="submitBtn" value="Log In" class="button btn btn-primary">
                               </form>
                            </div>
                            <div class="modal-footer">
                                <marquee><i>Enter your Administrative login details...</i></marquee>
                            </div>
                        </div>
                    </div>
      
<?php include 'footer.php';
?>
<?php 
include '../_inc/dbconn.php';
if(!isset($_SESSION['admin_login'])){
if(isset($_REQUEST['submitBtn'])){
	try{
    $sql="SELECT * FROM admin WHERE id='1'";
    $result=$conn->query($sql);
    }catch(PDOException $e) {
    	echo "Login failed".$e->getMessage();
}
    $rws= $result->fetch();
    $username=  $_REQUEST['uname'];
    $password=  $_REQUEST['pwd'];
    if($username==$rws[8] && $password==$rws[9]) {
        
        $_SESSION['admin_login']=1;
        $_SESSION['admin_id']=$rws[8];
    header('location:admin_homepage.php');
    
    }else{
    
        header('location:adminlogin.php');      
}}}
else {
    header('location:admin_homepage.php');
}
?>

    
   </body>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</html>