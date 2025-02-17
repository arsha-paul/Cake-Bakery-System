    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
                        <img alt="image" class="rounded-circle" src="img/user.png"/>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <?php
$admid=$_SESSION['fosaid'];
$ret=mysqli_query($con,"select bname from tblbaker where email='$admid'");
$row=mysqli_fetch_array($ret);
$name=$row['bname'];

?>
                        
                            <span class="text-muted text-xs block"><?php echo $name; ?> <b class="caret"></b></span>
                        </a>
                        
                    </div>
                    <div class="logo-element">
                    CBS
                    </div>
                </li>
                <li>
                    <a href="dashboard.php"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span> <span class="fa arrow"></span></a>
                                    </li>
                                    
                                   
              
                
 

        <li>
                    <a href="#"><i class="fa fa-list"></i> <span class="nav-label">Orders</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                         <li><a href="notassigned.php">Assigned</a></li>
                        <li><a href="ongo.php">Ongoing</a></li>
                        <li><a href="deliver.php">Delivered</a></li>
                        
                    
                       
                    </ul>
                </li>


  
        
                
                
               
            </ul>

        </div>
    </nav>