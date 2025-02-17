<?php
session_start();

include_once 'includes/dbconnection.php';
 ?>
<script language="javascript" type="text/javascript">
function f2()
{
window.close();
}
function f3()
{
window.print(); 
}
</script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Cake Bakery-Track Order</title>
</head>
<body>

<div style="margin-left:50px;">
<?php  

$orderid=intval($_GET['oid']);
$ret=mysqli_query($con,"select * from  tblcustorder where cid ='$orderid'");

$cnt=1;


 ?>
<table border="1"  cellpadding="10" style="border-collapse: collapse; border-spacing:0; width: 100%; text-align: center;">
  <tr align="center">
   <th colspan="4" >Tracking History of #<?php echo  $orderid;?></th> 
  </tr>
  <tr>
    <th>#</th>
<th>Price</th>
<th>Status</th>
<th>Time</th>
</tr>
<?php  

if($row=mysqli_fetch_array($ret)) { 
  //$cancelledby=$row['OrderCanclledByUser'];
  $st=$row['status'];
  ?>
<tr>
  <td><?php echo $cnt;?></td>
 <td><?php  echo $row['price'];?></td> 
  <td><?php  //echo $row['bstatus']; 
if($st==0){
echo "Cake Ordered";
} elseif($st==1) {

$ret1=mysqli_query($con,"select * from  tblcdetails where cid ='$orderid'");
if($row1=mysqli_fetch_array($ret1)) { 
 $st1=intval($row1['status']);



if($st1==2){
    echo "Assigned";
}
elseif($st1==3){
    echo "Being Prepared";
}elseif($st1==4){

    echo "Delivered";
}
else{
    echo "Under Processing...";
}
}}
  ?></td> 
   <td><?php  echo $row['odate'];?></td> 
</tr>
<?php $cnt=$cnt+1;}?>
</table>
     
     <p >
      <input name="Submit2" type="submit" class="txtbox4" value="Close" onClick="return f2();" style="cursor: pointer;"  />   <input name="Submit2" type="submit" class="txtbox4" value="Print" onClick="return f3();" style="cursor: pointer;"  /></p>
</div>

</body>
</html>

     