<?php 
session_start();

include '../_inc/dbconn.php';

$date=date('Y-m-d h:i:s');
$id=$_SESSION['login_id'];
try{
$sql="UPDATE customer SET last_login='$date' WHERE id='$id'";
$conn->exec($sql);
}catch(PDOExecption $e){}
session_destroy();
header('location: ../index.php');
?>