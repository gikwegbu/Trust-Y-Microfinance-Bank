<?php 
session_start();

include '../_inc/dbconn.php';
$date=$_SESSION['staff_date'];
$id=$_SESSION['id'];
try{
$sql="UPDATE staff SET lastlogin='$date' WHERE id='$id'";
$conn->exec($sql);
}catch(PDOException $e){}

session_destroy();
header('location:staff_login.php');
?>