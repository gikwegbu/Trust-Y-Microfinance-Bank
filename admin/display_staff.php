<?php 
session_start();
        
if(!isset($_SESSION['admin_login'])) 
    header('location:adminlogin.php');   
?>
<!DOCTYPE html>
<?php
include '../_inc/dbconn.php';
try{
$sql="SELECT * FROM `staff`";
$result= $conn->query($sql);
$sql_min="SELECT MIN(id) from staff";
$result_min= $conn->query($sql_min);
}catch(PDOException $e){
	echo 'Error in retrieving staffs';
}
$rws_min= $result_min->fetch();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Edit Staff Details</title>
        <style>
            .displaystaff_content table,th,td {
    padding:6px;
    border: 1px solid #2E4372;
   border-collapse: collapse;
}
#button{
    border:none;
}
        </style>
        <link rel="stylesheet" href="newcss.css">
    </head>
    
    <?php include 'header.php' ?>
     
    <div class="displaystaff_content">
       <?php include 'admin_navbar.php'?>
                    <div class="displaystaff">
                <form action="editstaff.php" method="POST">
            
                    <table align="center">
                        <caption align='center' style='color:#2E4372'><h3><u>Staff Details</u></h3></caption>
                        <th>Choose</th>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>DOB</th>
                        <th>Relationship</th>
                        <th>Department</th>
                        <th>DOJ</th>
                        <th>Address</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <?php
                        foreach($result as $rws){
                            echo "<tr><td><input type='radio' name='staff_id' value=".$rws[0];
                            if($rws[0]==$rws_min[0]) echo' checked';
                            echo " /></td>";
                            echo "<td>".$rws[1]."</td>";
                            echo "<td>".$rws[10]."</td>";
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
                    
                    
                    <table align="center" id='button'>
                    
                        <tr>
                            <td><input type="submit" name="submit1_id" value="EDIT STAFF DETAILS" class='addstaff_button' ></td>
                        </tr>
                        
                    </table>
                    </form>
                
                    
</div>

          <?php 
          
          include 'footer.php';?>
    </body>
</html>