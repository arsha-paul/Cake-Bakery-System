<?php include('includes/dbconnection.php');
if(isset($_GET['cid'])){
    echo $d=$_GET['d'];
    echo $id=$_GET['cid'];
    
    $ret1=mysqli_query($con,"update tblcdetails  set status='$d' where id='$id'");
    if($ret1){
    header("Location:ongo.php");
    }
    
    
} ?>