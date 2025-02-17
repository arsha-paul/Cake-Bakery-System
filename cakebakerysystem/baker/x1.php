<?php
include('includes/dbconnection.php');
if(isset($_POST['submit'])){
    $st=2;
       echo $p=$_POST['price'];
       echo  $id=$_POST['id'];
       echo "update tblcustorder set price='$p' where cid='$id'";
       echo "update tblcdetails set status='$st' where cid='$id'";

        $ret=mysqli_query($con,"update tblcustorder set price='$p' where cid='$id'");
        $ret1=mysqli_query($con,"update tblcdetails set status='$st' where cid='$id'");
        if($ret && $ret1 ){
            ?>
    <script>
        alert("Price Added and Processing Started");
        window.location.href="notassigned.php";
        </script>
            <?php
        }
    

    }

    ?>