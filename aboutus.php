<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['send']))
  {
$name=$_POST['fullname'];
$email=$_POST['email'];
$contactno=$_POST['contactno'];
$message=$_POST['message'];
$sql="INSERT INTO  tblcontactusquery(name,EmailId,ContactNumber,Message) VALUES(:name,:email,:contactno,:message)";
$query = $dbh->prepare($sql);
$query->bindParam(':name',$name,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':contactno',$contactno,PDO::PARAM_STR);
$query->bindParam(':message',$message,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Query Sent. We will contact you shortly";
}
else
{
$error="Something went wrong. Please try again";
}

}
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="keywords" content="">
<meta name="description" content="">
<title>Bike Rental Portal</title>
<!--Bootstrap -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
<!--Custome Style -->
<link rel="stylesheet" href="assets/css/styles3.css" type="text/css">
<!--OWL Carousel slider-->
<link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
<link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
<!--slick-slider -->
<link href="assets/css/slick.css" rel="stylesheet">
<!--bootstrap-slider -->
<link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
<!--FontAwesome Font Style -->
<link href="assets/css/font-awesome.min.css" rel="stylesheet">


<!-- Fav and touch icons -->
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/favicon-icon/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/favicon-icon/apple-touch-icon-114-precomposed.html">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicon-icon/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="assets/images/favicon-icon/apple-touch-icon-57-precomposed.png">
<link rel="shortcut icon" href="assets/images/favicon-icon/24x24.png">
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
<style>
.abttab{
	border : none;

}
tr{
		word-wrap:break-word;
}
</style>
</head>
<body >


<!--Header-->
<?php include('includes/header.php');?>
<!-- /Header -->



<div class="row">
	<div class="col-sm-12">		
		<img width="100%" src="assets/images/bnm.png"/>
	</div>
</div>
<hr style="border-top: 1px solid #c4c1c1">


<div class="row" style="font-family: 'Times New Roman'">
	<div class="col-sm-12" align="center">
		<h1>ABOUT US</h1>
	</div>
</div>
<br><br>
<div class="row" style="font-family: 'Times New Roman'">
	<div class="col-sm-12">
		<div class="col-sm-6">
			
			<div class="col-sm-12" align="center">
				<h2>Internal Guide</h2><h1>Prarthana T V</h1><h5>Assistant Professor</h5><h5>Department Of CSE, BNMIT.</h5>
			
			</div>
		</div>
		<div class="col-sm-6">
			<div class="col-sm-6" align="center">
				<img width="200pt" height="200pt" src="assets/images/abhi.jpg"/>
			</div>
			<div class="col-sm-6" align="center">
				<h2>Abhishek R</h2><h5>1BG16CS004</h5><h5>Department Of CSE, BNMIT</h5>
				<ul>
              <li style="display: inline;" class="social"><a href="#"><i class="fa fa-github" aria-hidden="true"></i></a></li>
              <li style="display: inline;" class="social"><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
              <li style="display: inline;" class="social"><a href="#"><i class="fa fa-google" aria-hidden="true"></i></a></li>
              <li style="display: inline;" class="social"><a href="#"><i class="fa fa-facebook " aria-hidden="true"></i></a></li>
              <li style="display: inline;" class="social"><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
           </ul>
			</div>
		</div>
		
	</div>
</div>

<hr style="border-top: 1px solid #c4c1c1">


<!--Footer -->
<?php include('includes/footer.php');?>
<!-- /Footer-->

<!--Back to top-->
<div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>
<!--/Back to top-->


<!-- Scripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/interface.js"></script>
<!--Switcher-->
<!--bootstrap-slider-JS-->
<script src="assets/js/bootstrap-slider.min.js"></script>
<!--Slider-JS-->
<script src="assets/js/slick.min.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>

</body>

</html>
