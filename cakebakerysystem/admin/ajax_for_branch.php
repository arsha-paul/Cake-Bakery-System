<?php 
$e=$_GET['e'];
include "connection.php";
$sql="select * from tbl_user_details where u_email='$e'";
$sql2="select *from tbl_db_details where db_email='$e'";
$sql3="select *from tbl_branch_details where b_email='$e'";
$sql4="select *from tbl_login where email='$e'";
$q=mysqli_query($con,$sql);
$q2=mysqli_query($con,$sql2);
$q3=mysqli_query($con,$sql3);
$q4=mysqli_query($con,$sql4);
if((mysqli_num_rows($q)>0)|(mysqli_num_rows($q2))|(mysqli_num_rows($q3))|(mysqli_num_rows($q4))){
echo "<font color='red'>email already exist</font>";
}

?>
