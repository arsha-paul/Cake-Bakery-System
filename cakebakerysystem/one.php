<?php
include('includes/dbconnection.php');
if(isset($_POST['submit']))
  {
    //$faid=$_SESSION['fosaid'];
    $fcat=$_POST['category'];
    $flavour=$_POST['flavour'];
    $shape=$_POST['shape'];
    $layer=$_POST['layer'];
    $quantity=$_POST['quantity'];
    $odate=$_POST['odate'];
$st=0;
    if(isset($_POST['writing'])){
    $writing=$_POST['writing'];
    }
    $weight=$_POST['weight'];
    if (file_exists($_FILES['itemimages']['tmp_name']) || is_uploaded_file($_FILES['itemimages']['tmp_name'])) 
{
    $itempic=$_FILES["itemimages"]["name"];
    
    $extension = substr($itempic,strlen($itempic)-4,strlen($itempic));
// allowed extensions
$allowed_extensions = array(".jpg","jpeg",".png",".gif");
// Validation for allowed extensions .in_array() function searches an array for a specific value.
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}

else
{

   //echo $itempic;
    
     move_uploaded_file($_FILES["itemimages"]["tmp_name"],"img/".$itempic);
      $query=mysqli_query($con, "insert into tblcustorder(category,flavour,shape,layer,image,quantity,weight,ddate,status) value('$fcat','$flavour','$shape','$layer','$itempic','$quantity','$weight','$odate','$st')");
     if ($query) {
    echo '<script>alert("Cake has been Ordered We Will Contact Immeditely")</script>';
     echo "<script>window.location.href ='custom.php'</script>";
   }
   else
     {
      echo '<script>alert("Something Went Wrong. Please try again.")</script>';
     }
}
    }
else
{
   // $itempic=md5($itempic).$extension;
    // move_uploaded_file($_FILES["itemimages"]["tmp_name"],"itemimages/".$itempic);


     $query=mysqli_query($con, "insert into tblcustorder(category,flavour,shape,layer,writing,quantity,weight,ddate,status) value('$fcat','$flavour','$shape','$layer','$writing','$quantity','$weight','$odate','$st')");
    if ($query) {
  echo '<script>alert("Cake has been added")</script>';
    echo "<script>window.location.href ='custom.php'</script>";
  }
  else
    {
     echo '<script>alert("Something Went Wrong. Please try again.")</script>';
    }

  
}} ?>