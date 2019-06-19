<?
include '../_inc/staff_functs.php';

if(!isset($_SESSION['staff_login']))
{
	include 'staff_login.php';
}else{
	include 'staff_homepage.php';
}

if(isset($_REQUEST['change_password'])):
change_staff_pass($_SESSION['login_id'],$_REQUEST['new_password'],$_REQUEST['again_password'],$_REQUEST['old_password']);


exit();
endif;
?>