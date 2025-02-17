<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['fosaid']==0)) {
  header('location:logout.php');
  } else{

if(isset($_POST['submit']))
  {
    extract($_POST);
    
   $s="insert into tblbaker(bname,email,mobno,password)values('$baker_name','$eml','$mob_no','$pw')";
    $query=mysqli_query($con, $s );
    if ($query) {
   

    
    echo '<script>alert("Baker Added Successfully")</script>';
  }
  else
    {
      echo '<script>alert("Something Went Wrong. Please try again.")</script>';
    }

  

}
  ?>
<!DOCTYPE html>
<html>

<head>

    <title>Cake Bakery System||Edit Cake Item</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="css/plugins/steps/jquery.steps.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
<script>
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
<!-- This function is used to check the email is already exist or not -->
function getemail(e)
{
  var xmlHttp = getXMLHttp();
 	
	var ev =e.value;
	
	xmlHttp.onreadystatechange = function()
  	{
    	if(xmlHttp.readyState == 4)
    	{
			document.getElementById('span').innerHTML = xmlHttp.responseText;
    	}
		else if(xmlHttp.readyState == 1)
		{
		document.getElementById('span').innerHTML = '<span>Loading...</span>';	
		}
  	}
  xmlHttp.open("GET", "ajax_for_branch.php?e="+ev, true);
  xmlHttp.send();
}
function setPass()
	{											
											var x=document.getElementById("mob_no");
											var x1=x.value.substr(0,4);
											var x2="cbs@";
											var x3=x2.concat(x1);
											for_check=document.submit.mob_no.value;
											if(for_check!=""){
											document.getElementById("pw").defaultValue = x3;
											}else{document.getElementById("pw").defaultValue ="";}
		}

</script>

</head>

<body>

    <div id="wrapper">

    <?php include_once('includes/leftbar.php');?>

        <div id="page-wrapper" class="gray-bg">
             <?php include_once('includes/header.php');?>
        <div class="row border-bottom">
        
        </div>
            <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Cake</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="dashboard.php">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a>Baker</a>
                    </li>
                    <li class="breadcrumb-item active">
                        <strong>Add Baker</strong>
                    </li>
                </ol>
            </div>
        </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox">
                        
                        <div class="ibox-content">

                            
                           <?php

?>

                            <form id="submit" action="#" class="wizard-big" method="post" name="submit" >
                                <p style="font-size:16px; color:red;"> <?php if($msg){
    echo $msg;
  }  ?> </p>
                                    <fieldset>
                                         
                                            <div class="form-group row"><label class="col-sm-2 col-form-label">Baker Name:</label>
                                                <div class="col-sm-10"><input type="text" class="form-control form-control-user" placeholder="Baker Name" required name="baker_name"
										 pattern="[a-zA-Z]+[a-zA-Z ]+" ></div>
                                            </div>
                                            
                                           
                                            
                                            <div class="form-group row"><label class="col-sm-2 col-form-label">Email:</label>
                                                <div class="col-sm-10"><input type="email" class="form-control form-control-user" placeholder="Email Address" required name="eml" 
										onChange="getemail(this)"></div>
                                            </div>


                                            <div class="form-group row"><label class="col-sm-2 col-form-label">Mobile:</label><div class="col-sm-10">
                                            <input type="text" class="form-control form-control-user" required pattern="[0-9]{10}" title="Max 10 Digits" 
										name="mob_no" placeholder="Mobile No." id="mob_no" onChange="setPass()"></div>
                                            </div>
                                            <script>
										
									</script>

                                            <div class="form-group row"><label class="col-sm-2 col-form-label">Password:</label><div class="col-sm-10">
                                            <input type="text" class="form-control form-control-user" required name="pw" id="pw" 
										placeholder="Password" pattern=".{8,}" title="Eight or more characters" readonly="readonly"></div>
                                            </div>
                                            
                                           
                                        </fieldset>

                                
                                
                             

  
          <p style="text-align: center;"><button type="submit" name="submit" class="btn btn-primary">Add Baker</button></p>
            
                                
                               
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
