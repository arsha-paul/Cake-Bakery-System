<?php 
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['fosuid']==0)) {
  header('location:logout.php');
  } else{


    if(isset($_POST['submit']))
  {
    $faid=$_SESSION['fosaid'];
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
      $query=mysqli_query($con, "insert into tblcustorder(category,flavour,shape,layer,image,quantity,weight,ddate,status,userid) value('$fcat','$flavour','$shape','$layer','$itempic','$quantity','$weight','$odate','$st','$faid')");
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


     $query=mysqli_query($con, "insert into tblcustorder(category,flavour,shape,layer,writing,quantity,weight,ddate,status,userid) value('$fcat','$flavour','$shape','$layer','$writing','$quantity','$weight','$odate','$st','$faid')");
    if ($query) {
  echo '<script>alert("Cake has been added")</script>';
    echo "<script>window.location.href ='custom.php'</script>";
  }
  else
    {
     echo '<script>alert("Something Went Wrong. Please try again.")</script>';
    }

  
}}
    /*
if(isset($_POST['submit']))
  {
    //$faid=$_SESSION['fosaid'];
    $fcat=$_POST['category'];
    $flavour=$_POST['flavour'];
    $shape=$_POST['shape'];
    $layer=$_POST['layer'];
    $quantity=$_POST['quantity'];
    $odate=$_POST['odate'];

    if(isset($_POST['writing'])){
    $writing=$_POST['writing'];
    }
    $weight=$_POST['weight'];
    if(isset($_POST['itemimages'])){
    $itempic=$_FILES["itemimages"]["name"];
    $st=0;
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

   echo $itempic=$itempic.$extension;
    
     move_uploaded_file($_FILES["itemimages"]["tmp_name"],"img/".$itempic);
     echo $query=mysqli_query($con, "insert into tblcustorder(category,flavour,shape,layer,image,quantity,weight,ddate,status) value('$fcat','$flavour','$shape','$layer','$itempic','$quantity','$weight','$odate','$st')");
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

  
} 

} */

 ?>
<!DOCTYPE html>
<html lang="en">
    
<head>
        <title>Cake Bakery System|| Profile</title>

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
        
        <link href="css/style.css" rel="stylesheet">
        <link href="css/responsive.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    
        <style>
.multiselect {
width:20em;
height:5em;
border:solid 1px gray;
overflow:auto;
}
.multiselect label {
display:block;
}
.multiselect-on {
color: lightgray;
background-color:cadetblue;
}
</style>

      
    </head>
    <body>
        
        <!--================Main Header Area =================-->
		<?php include_once('includes/header.php');?>
        <!--================End Main Header Area =================-->
        
        <!--================End Main Header Area =================-->
        <section class="banner_area">
        	<div class="container">
        		<div class="banner_text">
        			<h3>Profile</h3>
        			<ul>
        				<li><a href="index.php">Home</a></li>
        				<li><a href="profile.php">User Profile</a></li>
        			</ul>
        		</div>
        	</div>
        </section>
        <!--================End Main Header Area =================-->
        
        <!--================Contact Form Area =================-->
        <section class="contact_form_area p_100">
        	<div class="container">
        		<div class="main_title">
					<h2>Make your own cake</h2>
					
				</div>
       			<div class="row">
       				<div class="col-lg-10">  <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
       					 <form id="submit" action="#" class="wizard-big" method="post" name="submit" enctype="multipart/form-data">
                                    <fieldset>
                                          <div class="form-group row"><label class="col-sm-2 col-form-label">Cake Category:</label>
                                                <div class="col-sm-10"><select name='category' id="foodcategory" class="form-control white_bg" required="true" onchange="if (this.value=='Photo Cake'){//this.form['other'].style.visibility='visible' ; 
                                                document.getElementById('x').style.display = 'block';
                                                document.getElementById('x1').style.display = 'none';
                                            
                                            }else {//this.form['other'].style.visibility='hidden'
                                                document.getElementById('x').style.display = 'none';
                                                document.getElementById('x1').style.display = 'block';
                                                };" >
     
      <?php
      
      $query=mysqli_query($con,"select * from  tblcategory");
              while($row=mysqli_fetch_array($query))
              {
              ?>    
              <option value="<?php echo $row['CategoryName'];?>"><?php echo $row['CategoryName'];?></option>
                  <?php } ?>  
   </select></div>
                                            </div>
                                            <div class="form-group row"><label class="col-sm-2 col-form-label">Flavour:</label>
                                                <div class="col-sm-10"><select  class="form-control" name="flavour">
                                                    <option value="">Choose Flavour</option>
                                                    <option value="Chocolate">Chocolate</option>
                                                    <option value="Vanila">Vanila</option>
                                                    
              </select>
              </div> </div>
                                            
              <div class="form-group row"><label class="col-sm-2 col-form-label">Shape:</label>
                                                <div class="col-sm-10"><select  class="form-control" name="shape" >
                                                    <option value="">Choose Shape</option>
                                                    <option value="Rectangle">Rectangle</option>
                                                    <option value="Circle">Circle</option>
                                                    <option value="Oval">Oval</option>
                                                    
              </select>
              </div> </div>
              <div class="form-group row"><label class="col-sm-2 col-form-label">Layer:</label>
                                                <div class="col-sm-10"><select  class="form-control" name="layer">
                                                    <option value="">Choose Layer</option>
                                                    <option value="Three Tier">Three Tier</option>
                                                    <option value="Two Tier">Two Tier</option>
                                                    <option value="Single Tier">Single Tier</option>
                                                    
              </select>
              </div> </div>
              <span id="x">  <div class="form-group row" >
                                                <label class="col-sm-2 col-form-label">Image</label>
                                                <div class="col-sm-10" ><input type="file" name="itemimages" ></div>
                                            </div>
              </span>
                                        <span id="x1">
                                                <div class="form-group row"><label class="col-sm-2 col-form-label">Writings</label>
                                                <div class="col-sm-10"><input type="text" name="writing"  class="form-control"></div>
                                            </div></span>
                                            <div class="form-group row"><label class="col-sm-2 col-form-label">Quantity:</label>
                                                <div class="col-sm-10"><input type="text" class="form-control" name="quantity" required="true"></div>
                                            </div>
                                            <div class="form-group row"><label class="col-sm-2 col-form-label">Cake Weight:</label>
                                                <div class="col-sm-10"><select  class="form-control" name="weight">
                                                    <option value="">Choose Weight</option>
                                                    <option value="500 gm">500 gm</option>
                                                    <option value="1 kg">1 kg</option>
                                                    <option value="1.5 kg">1.5 kg</option>
                                                    <option value="2 kg">2 kg</option>
                                                    <option value="2.5 kg">2.5 kg</option>
                                                    <option value="3 kg">3 kg</option>
                                                    <option value="3.5 kg">3.5 kg</option>
                                                    <option value="4 kg">4 kg</option>
              </select>
              </div> </div>
              <div class="form-group row"><label class="col-sm-2 col-form-label">Date of Delivery</label>

              <?php $next_date = date('Y-m-d', strtotime($date .' +2 day'));
               $next_date1 = date('Y-m-d', strtotime($date .' +7 day'));
              ?>
                                                <div class="col-sm-10"><input type="date" class="form-control" name="odate" required="true" min="<?php echo $next_date; ?>" max="<?php echo $next_date1; ?>"></div>
                                            </div>
                                            
                                           
                                        </fieldset>

                                </fieldset>
                                
                                
                               
  
          <p style="text-align: center;"><button type="submit" name="submit" class="btn btn-primary">Submit</button></p>
            
                                
                               
                            </form>
       				</div>
       				
       			
        </section>
        <!--================End Contact Form Area =================-->
        
        
       
       <?php include_once('includes/footer.php');?>
       <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
       
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
        <script src="vendors/datetime-picker/js/moment.min.js"></script>
        <script src="vendors/datetime-picker/js/bootstrap-datetimepicker.min.js"></script>
        <script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
        <script src="vendors/jquery-ui/jquery-ui.min.js"></script>
        <script src="vendors/lightbox/simpleLightbox.min.js"></script>
        <!--gmaps Js-->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
        <script src="js/gmaps.min.js"></script>
        <script src="js/map-active.js"></script>
        
        <!-- contact js -->
        <script src="js/jquery.form.js"></script>
        <script src="js/jquery.validate.min.js"></script>
        <script src="js/contact.js"></script>
        
        <script src="js/theme.js"></script>
        <script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    </body>

</html><?php  } ?>