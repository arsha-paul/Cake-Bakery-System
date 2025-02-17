
<!--************add_branch enna page le values ee page il varum********-->
<html>
<body>
<?php

/*******Values ellam post vazhi kitti ******** */

$b_name=$_POST['branch_name'];
$b_place=$_POST['branch_place'];
$b_pincode=$_POST['branch_pincode'];
$b_email=$_POST['eml'];
$b_mobile=$_POST['mob_no'];
$pw=$_POST['pw'];
$l_s=2;

include "connection.php";
//email already exist cheyundo enn check cheyanpogunu

$sq="select * from tbl_login where email='$email'";
$res_email=mysqli_query($con,$sq);
if(mysqli_num_rows($res_email)>0)
{
	?>
	
	<script> 		
		alert("Email is already existing");
		window.location.href="add_branch.php";
	</script>

	<?php
}
else
{
	//regirster cheyuna details aha tbl_branch_details leke pogunnu
	$sq1="insert into tbl_branch_details(b_name,b_email,b_place,b_mobile,b_pincode) values('$b_name','$b_email','$b_place','$b_mobile','$b_pincode')";
	$sql2="insert into tbl_login(email,password,login_status) values('$b_email','$pw','$l_s')";

	if(mysqli_query($con,$sq1)&& mysqli_query($con,$sql2))
	{
		
	?>
		<script>
 			<!-- Values insert ayiyal "successfully inserted" enn kanikum -->
 			alert("Branch Regirstration Successfully ");
 			window.location.href="add_branch.php";
 		</script>
	<?php
	}
	else
	{
	?>
			<script>
				alert("Branch Registration was not successfully. Please try again");
				window.location.href="add_branch.php";
			</script>
	<?php
	}
}

?>
</body>
</html>
