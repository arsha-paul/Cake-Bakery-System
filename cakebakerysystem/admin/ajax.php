<?php
$id=$_GET['id'];
$email=$_GET['email'];
include('includes/dbconnection.php');
$st=1;
$ret=mysqli_query($con,"update tblcustorder set status='$st' where cid='$id'");
if($ret){

    $ret=mysqli_query($con,"insert into tblcdetails(cid,status,email) value('$id','$st','$email')");
    if($ret){

    ?>
<script>
    alert("Assigned");
    window.location.href="notassigned.php";
    </script>
    <?php
    }

}
?>