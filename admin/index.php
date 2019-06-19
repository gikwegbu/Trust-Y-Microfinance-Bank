<?php


















        
if(!isset($_SESSION['admin_login'])){
    include 'adminlogin.php';
}else{
	include 'admin_homepage.php';
}
?>