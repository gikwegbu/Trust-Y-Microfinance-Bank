<?php 
session_start();
        
if(!isset($_SESSION['admin_login'])) 
    header('location:adminlogin.php');   
?>
<!DOCTYPE html>
<?php
include '../_inc/dbconn.php';
try{
$sql="SELECT * FROM `customer`";
$result= $conn->query($sql);
$sql_min="SELECT MIN(id) from customer";
$result_min= $conn->query($sql_min);
$rws_min= $result_min->fetch();
}catch(PDOException $e){
	echo 'error in retrieving customers '.$e->getMessage();
}
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../css/css.css"/>
        <style>
            .displaystaff_content table,th,td {
    padding:6px;
    border: 1px solid #2E4372;
   border-collapse: collapse;
}

        </style>
        <title>Delete Customer</title>
    </head>
    <?php include 'header.php'?>
        
                <div class="displaystaff_content">
                    <?php include 'admin_navbar.php'?>
                <form action="editcustomer.php" method="POST">
            
                    <table align="center">
                        <th>Choose</th>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>DOB</th>
                        <th>Nominee</th>
                        <th>Account type</th>
                        <th>Address</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <?php
                        foreach($result as $rws){
                            echo "<tr><td><input type='radio' name='customer_id' value=".$rws[0];
                            if($rws[0]==$rws_min[0]) echo' checked';
                            echo " /></td>";
                            echo "<td>".$rws[1]."</td>";
                            echo "<td>".$rws[2]."</td>";
                            echo "<td>".$rws[3]."</td>";
                            echo "<td>".$rws[4]."</td>";
                            echo "<td>".$rws[5]."</td>";
                            echo "<td>".$rws[6]."</td>";
                            echo "<td>".$rws[7]."</td>";
                            echo "<td>".$rws[8]."</td>";
                            echo "</tr>";
                        }
                        ?>
                        
                    </table>
                    <table align="center">
                        <tr>
                            <td>
                                <input type="submit" name="submit2_id" value="DELETE CUSTOMER DETAILS" class='addstaff_button'/>
                            </td>
                        </tr>
                    </table>
                </form>

            
                </div>
                
                
                
            
    </body>
</html>
