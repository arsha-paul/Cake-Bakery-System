<?php
session_start();
error_reporting(0);
include_once('includes/dbconnection.php');
if (strlen($_SESSION['fosuid']==0)) {
  header('location:logout.php');
  } else{ 


 

    ?>
<!DOCTYPE html>
<html lang="en">
    
<head>
        
        <title>Cake Bakery System||Order Detail</title>

        <!-- Icon css link -->
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="vendors/linearicons/style.css" rel="stylesheet">
        <link href="vendors/flat-icon/flaticon.css" rel="stylesheet">
        <link href="vendors/stroke-icon/style.css" rel="stylesheet">
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        
        <!-- Rev slider css -->
        <link href="vendors/revolution/css/settings.css" rel="stylesheet">
        <link href="vendors/revolution/css/layers.css" rel="stylesheet">
        <link href="vendors/revolution/css/navigation.css" rel="stylesheet">
        <link href="vendors/animate-css/animate.css" rel="stylesheet">
        
        <!-- Extra plugin css -->
        <link href="vendors/owl-carousel/owl.carousel.min.css" rel="stylesheet">
        <link href="vendors/magnifc-popup/magnific-popup.css" rel="stylesheet">
        <link href="vendors/jquery-ui/jquery-ui.min.css" rel="stylesheet">
        <link href="vendors/nice-select/css/nice-select.css" rel="stylesheet">
        
        <link href="css/style.css" rel="stylesheet">
        <link href="css/responsive.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
            <script language="javascript" type="text/javascript">
var popUpWin=0;
function popUpWindow(URLStr, left, top, width, height)
{
 if(popUpWin)
{
if(!popUpWin.closed) popUpWin.close();
}
popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+600+',height='+600+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
}

</script>
    </head>
    <body>
        
        <!--================Main Header Area =================-->
	<?php include_once('includes/header.php');?>
        <!--================End Main Header Area =================-->
        
        <!--================End Main Header Area =================-->
        <section class="banner_area">
        	<div class="container">
        		<div class="banner_text">
        			<h3>Cart</h3>
        			<ul>
        				<li><a href="index.php">Home</a></li>
        				<li><a href="my-order.php">My Order</a></li>
        			</ul>
        		</div>
        	</div>
        </section>
        <!--================End Main Header Area =================-->
        
        <!--================Cart Table Area =================-->
        <section class="cart_table_area p_100">
        	<div class="container">
				<div class="table-responsive">
                    <h4 style="color: palevioletred;text-align: center;">Single Order Detail</h4>
<h3>
#<?php echo $oid=$_GET['orderid'];?> Order Details
    </h3>

    <?php
//Getting Url
$link = "http"; 
$link .= "://"; 
$link .= $_SERVER['HTTP_HOST']; 

// Getting order Details
$userid= $_SESSION['fosuid'];
$ret=mysqli_query($con,"select * from tblcustorder where userid='$userid' and cid='$oid'");
while($result=mysqli_fetch_array($ret)) {
?>

<p style="color:#000"><b>Order #</b>cbcid<?php echo $oid?></p>
<p style="color:#000"><b>Ordet Date : </b><?php echo $od=$result['odate'];?></p>
<p style="color:#000"><b>Ordet Status :</b> <?php
$st=$result['status'];
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




?> &nbsp;
<a href="javascript:void(0);" onClick="popUpWindow('trackorder1.php?oid=<?php echo $oid;?>');" title="Track order" style="color:#000" class="btn pest_btn"> Track order
</a></p>

<?php } ?>
<!-- Invoice -->
<p>
 <a href="javascript:void(0);" onClick="popUpWindow('invoice1.php?oid=<?php echo $oid;?>&&odate=<?php echo $od;?>');" title="Order Invoice" style="color:#000" class="btn pest_btn">  Invoice</a></p>
					<?php 
                                $userid= $_SESSION['fosuid'];
 $query=mysqli_query($con,"select * from tblcustorder where userid='$userid' and cid='$oid'");
$num=mysqli_num_rows($query);
if($num>0){
    $cnt=1;

?>
                    <table class="table" style="padding-top: 20px;">

						<thead>
							<tr>
                                <th>#</th>
                                <th>Order ID</th>
								<th>Details</th>
								
								<th>Weight</th>
                                
								<th>Price</th><tr>
								
						</thead>
						<tbody>
							
				 <?php   
while ($row=mysqli_fetch_array($query)) {
    ?>				
               <tr>
               
<td><?php echo $cnt;?></td>
<td>cbcid<?php echo $row['cid'];?></td>

<td><?php echo $row['category'].',';echo $row['flavour'].',';echo $row['shape'].',';echo $row['layer'].',';?></td>  
<td><?php echo $row['weight'];?>  </td> 

<td>Rs:<?php echo $total=$row['price']?>
    <?php 
$grandtotal+=$total;
$cnt=$cnt+1; 
                    }        
 ?>
</td>
    
</tr>
<?php } ?>

<tr>
<th colspan="5" style="text-align: center;">Grand Total</th>    
<th>Rs: <?php echo $grandtotal;?></th>
</tr>


								<td>
									
								</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td>
									
								</td>
							</tr>
						</tbody>
					</table>
                    <!--
    <p style="color:red">
        <a href="javascript:void(0);" onClick="popUpWindow('cancelorder.php?oid=<?php echo $oid;?>');" title="Cancel this order" style="color:red" class="btn pest_btn">Cancel this order </a>
    </p> -->
				</div>
       			
        	</div>
        </section>
        <!--================End Cart Table Area =================-->
        
      <?php include_once('includes/footer.php');?>
        
        
        
        
        
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="js/jquery-3.2.1.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <!-- Rev slider js -->
        <script src="vendors/revolution/js/jquery.themepunch.tools.min.js"></script>
        <script src="vendors/revolution/js/jquery.themepunch.revolution.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.actions.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.video.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
        <!-- Extra plugin js -->
        <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
        <script src="vendors/magnifc-popup/jquery.magnific-popup.min.js"></script>
        <script src="vendors/isotope/imagesloaded.pkgd.min.js"></script>
        <script src="vendors/isotope/isotope.pkgd.min.js"></script>
        <script src="vendors/datetime-picker/js/moment.min.js"></script>
        <script src="vendors/datetime-picker/js/bootstrap-datetimepicker.min.js"></script>
        <script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
        <script src="vendors/jquery-ui/jquery-ui.min.js"></script>
        <script src="vendors/lightbox/simpleLightbox.min.js"></script>
        
        <script src="js/theme.js"></script>
    </body>

</html><?php } ?>