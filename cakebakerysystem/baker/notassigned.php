<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (!isset($_SESSION['fosaid'])) {
  header('location:logout.php');
  } else{



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
                            <form name="f" method="POST" action="x1.php">
                                 <table class="table table-bordered mg-b-0">
     <p style="text-align: center; color: blue; font-size: 25px">Detail of Order Not Confirmed</p>
              <thead>
                <tr>
                  <th>S.NO</th>
                  <th>Cake Details</th>
                  <th>Image/Writtings</th>
                  <th>Order Date</th>
                  <th>Delivery Date</th>
                  <th>Price</th>
                  <th>Action </th>
                </tr>
              </thead>
              <?php
              $st=1;
              $email=$_SESSION['fosaid'];
$ret=mysqli_query($con,"select * from tblcdetails where status='$st' and email='$email'");
$cnt=1;

while ($row1=mysqli_fetch_array($ret)) {
$cid=$row1['cid'];
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
               
                <script type="text/javascript">
function getXMLHttp()
{
	var xmlHttp
	
	try
	{
		xmlHttp=new XMLHttpRequest();
	}
	catch(e)
	{
		try
		{
			xmlHttp=new ActiveXObject("Masxml2.XMLHTTP");
		}
		catch(e)
		{
			try
			{
				xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e)
			{
				alert("your browser doesnot support AJAX!");
				return false;
			}
		}
	}
	return xmlHttp;
	
}

function subcat(email,id)
{
  var xmlHttp = getXMLHttp();
 
	
    
	
	xmlHttp.onreadystatechange = function()
  	{
    	if(xmlHttp.readyState == 4)
    	{
			document.getElementById('id1').innerHTML = xmlHttp.responseText;
    	}
		else if(xmlHttp.readyState == 1)
		{
		document.getElementById('id1').innerHTML = '<span>Loading...</span>';	
		}
  	}
  xmlHttp.open("GET", "ajax.php?id="+id+"&email="+email, true);
  xmlHttp.send();
}
</script>
                </td>
                <td><input type="text" name="price" id="price" required >
                <input type="hidden" name="id" id="id" value="<?php  echo $cid; ?>" ></td>
                <td>
        <input type="submit" name="submit" value="add price" class="btn btn-success">
          

        
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
