<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (!isset($_SESSION['fosaid'])) {
  header('location:logout.php');
  } else{

if(isset($_GET['cid'])){
    $d=$_GET['d'];
    $id=$_GET['cid'];
    
    $ret1=mysqli_query($con,"update tblcdetails  set status='$d' where id='$id'");
    if($ret1){
    header("Location:ongo.php");
    }
    
}

  ?>
<!DOCTYPE html>
<html>

<head>

    <title>Cake Bakery System</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="css/plugins/steps/jquery.steps.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    
</head>

<body>

    <div id="wrapper">

    <?php include_once('includes/leftbar.php');?>

        <div id="page-wrapper" class="gray-bg">
             <?php include_once('includes/header.php');?>
        
        <div class="row border-bottom">
        
        </div>
            
        <div class="wrapper wrapper-content animated fadeInRight">
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox">
                        <div id="id1">
</div>
                        <div class="ibox-content">
                            <form name="f" method="POST">
                                 <table class="table table-bordered mg-b-0">
     <p style="text-align: center; color: blue; font-size: 25px">Detail of Order OnGoing</p>
              <thead>
                <tr>
                  <th>S.NO</th>
                  <th>Cake Details</th>
                  <th>Image/Writtings</th>
                  <th>Order Date</th>
                  <th>Delivery Date</th>
                  <th>Price</th>
                  <th>Status</th>
                  <th>Action </th>
                </tr>
              </thead>
              <?php
              $st=2;
              $st2=3;
              $email=$_SESSION['fosaid'];
$ret=mysqli_query($con,"select * from tblcdetails where (status ='$st' or status='$st2') and email='$email'");
$cnt=1;

while ($row1=mysqli_fetch_array($ret)) {
$cid=$row1['cid'];
$d1=$row1['id'];
$status=$row1['status'];
$st1=2;
    $ret1=mysqli_query($con,"select * from tblcustorder where cid='$cid'");
    if($row=mysqli_fetch_array($ret1)){

    

?>
              <tbody>
                <tr>
                  <td><?php echo $cnt;?></td>
              
                  <td><?php  echo $row['category']." , ";echo $row['flavour']." , "; echo $row['shape']." , ";echo $row['layer']." , ";echo $row['weight'];?></td>
                  <td><?php
                  if($row["image"]==""){
                     echo $row['writing'];

                  }
                  else{
                    ?>
                   <img src="../img/<?php echo $row['image'];?>" width="50" height="25" >
                                            
                    <?php


                  }
                  
                  ?></td>
                  <td><?php   echo $row['odate']; ?></td>
                  <td><?php   echo $row['ddate']; ?>
              
                
                </td>
                <td><?php echo $row['price']; ?>
                <input type="hidden" name="id" id="id" value="<?php  echo $cid; ?>" ></td>
                <td><?php
                if($status==2){
                    echo "Processing...";
                }
                elseif($status==3){
                    echo "Processing Completed";
                }else{
                    echo "Delivered";
                }
                
                ?></td>
                <td> <select name="d" id="d">
                <option value="">Select</option>
                <?php 
                if($status==2){
                ?>
                <option value="3"> Cake Processing Completed</option>
                <option value="4">Delivered</option>
                <?php } else if($status==3){?>
                    <option value="4">Delivered</option>
                    <?php } ?>

                </select>
                <script type="text/javascript">
document.getElementById('d').onchange = function() {
    window.location = "ongo.php?cid=<?php echo $d1; ?>&d=" + this.value;
};
</script>
               </td>
                </tr>
                <?php }
$cnt=$cnt+1;
}?>
               
              </tbody>
            </table>
</form>

                           
                        </div>
                    </div>
                    </div>

                </div>
            </div>
        <?php include_once('includes/footer.php');?>

        </div>
        </div>



    <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

    <!-- Steps -->
    <script src="js/plugins/steps/jquery.steps.min.js"></script>

    <!-- Jquery Validate -->
    <script src="js/plugins/validate/jquery.validate.min.js"></script>


    <script>
        $(document).ready(function(){
            $("#wizard").steps();
            $("#form").steps({
                bodyTag: "fieldset",
                onStepChanging: function (event, currentIndex, newIndex)
                {
                    // Always allow going backward even if the current step contains invalid fields!
                    if (currentIndex > newIndex)
                    {
                        return true;
                    }

                    // Forbid suppressing "Warning" step if the user is to young
                    if (newIndex === 3 && Number($("#age").val()) < 18)
                    {
                        return false;
                    }

                    var form = $(this);

                    // Clean up if user went backward before
                    if (currentIndex < newIndex)
                    {
                        // To remove error styles
                        $(".body:eq(" + newIndex + ") label.error", form).remove();
                        $(".body:eq(" + newIndex + ") .error", form).removeClass("error");
                    }

                    // Disable validation on fields that are disabled or hidden.
                    form.validate().settings.ignore = ":disabled,:hidden";

                    // Start validation; Prevent going forward if false
                    return form.valid();
                },
                onStepChanged: function (event, currentIndex, priorIndex)
                {
                    // Suppress (skip) "Warning" step if the user is old enough.
                    if (currentIndex === 2 && Number($("#age").val()) >= 18)
                    {
                        $(this).steps("next");
                    }

                    // Suppress (skip) "Warning" step if the user is old enough and wants to the previous step.
                    if (currentIndex === 2 && priorIndex === 3)
                    {
                        $(this).steps("previous");
                    }
                },
                onFinishing: function (event, currentIndex)
                {
                    var form = $(this);

                    // Disable validation on fields that are disabled.
                    // At this point it's recommended to do an overall check (mean ignoring only disabled fields)
                    form.validate().settings.ignore = ":disabled";

                    // Start validation; Prevent form submission if false
                    return form.valid();
                },
                onFinished: function (event, currentIndex)
                {
                    var form = $(this);

                    // Submit form input
                    form.submit();
                }
            }).validate({
                        errorPlacement: function (error, element)
                        {
                            element.before(error);
                        },
                        rules: {
                            confirm: {
                                equalTo: "#password"
                            }
                        }
                    });
       });
    </script>

</body>

</html>
<?php } ?>
