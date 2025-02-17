<?php
	session_start();
	if(isset($_SESSION["usr"]))
	{
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin - Add Branch</title>
	
  	<!-- Favicons -->
 	<link href="img/favicon.png" rel="icon">
 	<link href="img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
	
<!--************ Java Script********** -->
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

</script>

<!--************ Java Script********** -->	
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="admin_dashboard.php">
                <div class="sidebar-brand-icon rotate-n-15">
                   <i class="fas fa-user-circle"></i>
				</div>
                <div class="sidebar-brand-text mx-3">Admin</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="admin_dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
				</a>
			</li>
<!-- ************************** -->
            <hr class="sidebar-divider">           
            <div class="sidebar-heading">
				Branch section
			</div>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-hotel"></i>
                    <span>Branch</span>
				</a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="add_branch.php">Add Branch</a>
						<a class="collapse-item" href="view_branch.php">View Branch Details</a>
					</div>
                </div>
            </li>
<!-- ************************** -->
            <hr class="sidebar-divider">
			
			<div class="sidebar-heading">
                Food section
			</div>
			
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-utensils"></i>
                    <span>Category</span>
				</a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!--<h6 class="collapse-header">Custom Components:</h6>-->
                        <a class="collapse-item" href="add_food_category.php">Add Food Category</a>
                        <a class="collapse-item" href="add_sub_category.php">Add Food Sub-Category</a>
						<a class="collapse-item" href="view_food_items.php">View Food Products</a>
					</div>
                </div>
            </li>
<!-- ************************** -->
            <hr class="sidebar-divider">
			
			<div class="sidebar-heading">
                Stock section
			</div>	
					
            <li class="nav-item">
                <a class="nav-link collapsed" href="view_stocks.php">
                    <i class="fas fa-eye"></i>
                    <span>View Stocks</span>
				</a>
            </li>
<!-- ************************** -->
            <hr class="sidebar-divider">
			
			<div class="sidebar-heading">
                Order section
			</div>	
					
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
                    aria-expanded="true" aria-controls="collapseThree">
                    <i class="fas fa-utensils"></i>
                    <span>Orders</span>
				</a>
                <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!--<h6 class="collapse-header">Custom Components:</h6>-->
                        <a class="collapse-item" href="view_orders.php">Incoming Orders</a>
                        <a class="collapse-item" href="view_order_status.php">Orders Status</a>
					</div>
                </div>
            </li>
<!-- ************************** -->
            <hr class="sidebar-divider">
			
			<div class="sidebar-heading">
                Payment section			</div>	
					
            <li class="nav-item">
                <a class="nav-link collapsed" href="view_payment_details.php">
                    <i class="fas fa-eye"></i>
                    <span>Payment Details</span>
				</a>
			</li>
<!-- ************************** -->

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
            <!-- Sidebar Message -->
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
					</button>
<!-- njan ipol koduthal notification bell -->					
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
					
                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
							 </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
								</h6>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
							</div>
                        </li>
<!-- njan ipol koduthal notification bell -->					
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">							</a>
                            <!-- Dropdown - admin logout Information here-->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout								</a>							</div>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">				

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Add Branch</h1>					
					</div>					
				
<!-- enike venda forms njn ivide kodukkanam ***********-->
					<div>
                            <form  class="form was-validated" name="fm" method="post" action="add_branch_action.php"><!--was-validated veno-->
                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control form-control-user" placeholder="Branch Name" required name="branch_name"
										 pattern="[a-zA-Z]+[a-zA-Z ]+" >
										 <!--<div class="invalid-feedback">Letters Only.</div>-->
                                    </div>
								</div>
								<div class="form-group row">
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control form-control-user" placeholder="Branch Place" required name="branch_place" 
										 pattern="[a-zA-Z]+[a-zA-Z ]+" title="only letters">
										 <!--<div class="invalid-feedback">Letters Only.</div>-->
                                    </div>
                                </div>
								<div class="form-group row">
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control form-control-user" placeholder="Branch Pincode" required name="branch_pincode" 
										 pattern="[0-9]{6}" title="Digits Only">
										 <!--<div class="invalid-feedback">Letters Only.</div>-->
                                    </div>
                                </div>
								<div class="form-group row">
                                	<div class="col-sm-6">
                                    	<input type="email" class="form-control form-control-user" placeholder="Email Address" required name="eml" 
										onChange="getemail(this)">
										<center><span id="span"></span></center>
									<!--<div class="invalid-feedback">Letters Only.</div>-->
                                	</div>
								</div>
                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control form-control-user" required pattern="[0-9]{10}" title="Max 10 Digits" 
										name="mob_no" placeholder="Mobile No." id="mob_no" onChange="setPass()">
                                    </div>
								</div>
						<!--******************* script for my use********************8-->												
									<script>
										function setPass()
										{											
											var x=document.getElementById("mob_no");
											var x1=x.value.substr(0,4);
											var x2="PWD@NIL";
											var x3=x2.concat(x1);
											for_check=document.fm.mob_no.value;
											if(for_check!=""){
											document.getElementById("pw").defaultValue = x3;
											}else{document.getElementById("pw").defaultValue ="";}
										}
									</script>
						<!--******************* script for my use********************8-->																		
								<div class="form-group row">
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control form-control-user" required name="pw" id="pw" 
										placeholder="Password" pattern=".{8,}" title="Eight or more characters" readonly="readonly">
                                    </div>
									<!-- pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one  
									number and one uppercase and lowercase letter, and at least 8 or more characters">-->									
                                </div>
								<div class="form-group row col-sm-2">
									<input type="submit" class="btn btn-primary btn-user btn-block" value="Add Branch" name="add_branch">
								</div>																										
                            </form>
					</div>
<!-- enike venda forms njn ivide kodukkanam ***********-->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
					<div><!--Footer le copyright delete cheythu--></div>
                </div>
            </footer>
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">?</span>                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>				</div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
</body>
</html>

<?php
	}	//if nte close
	else
	{
		header("Location:index.php");
	}
?>