
<header>
 

  <!-- Navigation -->
  <nav id="navigation_bar" class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
        <div >
          <div class="logo" style="margin-top: 10px;"> <a href="index.php"><img src="assets/images/logg2.png" alt="image"/></a> </div>
        </div>
        <button id="menu_slide" data-target="#navigation" aria-expanded="false" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      </div>
      <div class="header_wrap">
        <div class="user_login">
          <ul>
            <li class="dropdown"> <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle" aria-hidden="true"></i>
<?php
$email=$_SESSION['login'];
$sql ="SELECT admin_name FROM admin WHERE admin_email=:email ";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
	{

	 echo htmlentities($result->admin_name); }}?><i class="fa fa-angle-down" aria-hidden="true"></i></a>
              <ul class="dropdown-menu">
           <?php if($_SESSION['login']){?>

            
            <li><a href="logout.php">Sign Out</a></li>
            <?php } else { ?>
            <li><a href="logout.php"  data-toggle="modal" data-dismiss="modal">Sign Out</a></li>
            <li><a href="generate_report.php"  data-toggle="modal" data-dismiss="modal">Generate Report</a></li>
            <?php } ?>
          </ul>
            </li>
          </ul>
        </div>
     
      <div class="collapse navbar-collapse" id="navigation">
        <ul class="nav navbar-nav">
          <li><a href="admin-index.php">Home</a>    </li>

          <li><a href="aboutus.php">About Us</a></li>
          <li><a href="contact-us.php">Contact Us</a></li>
          <li><a href="add-bike.php">ADD Bikes</a>
          <li><a href="booked-bikes.php">Booked Bikes</a>



        </ul>
      </div>
    </div>
  </nav>
  <!-- Navigation end -->

</header>
