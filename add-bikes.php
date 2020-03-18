<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['send']))
  {
$bname=$_POST['bname'];
$brand=$_POST['brand'];
$price=$_POST['price'];
$fuel=$_POST['fuel'];
$year=$_POST['year'];
$img=$_POST['img'];
$dealer=$_POST['dealer'];

$sql="INSERT INTO  tblvehicles(dealer,VehiclesTitle,VehiclesBrand,PricePerDay,FuelType,ModelYear,Vimage1) VALUES(:dealer,:bname,:brand,:price,:fuel,:year,:img)";
$query = $dbh->prepare($sql);
$query->bindParam(':bname',$bname,PDO::PARAM_STR);
$query->bindParam(':brand',$brand,PDO::PARAM_STR);
$query->bindParam(':price',$price,PDO::PARAM_STR);
$query->bindParam(':fuel',$fuel,PDO::PARAM_STR);
$query->bindParam(':year',$year,PDO::PARAM_STR);
$query->bindParam(':dealer',$dealer,PDO::PARAM_STR);
$query->bindParam(':img',$img,PDO::PARAM_STR);

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
<title>BIKE RENTAL</title>
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
    .errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
    </style>
</head>
<body>


<!--Header-->
<?php include('includes/admin-header.php');?>
<!-- /Header -->

<!--Contact-us-->
<section class="contact_us section-padding">
  <div class="container">
    <div  class="row">
      
      <div class="col-md-12" align="center">
        <h3>Bike details</h3>
          <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php }
        else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
        <div class="contact_form gray-bg">
          <form  method="post">
            <div class="form-group">
              <label class="control-label">Bike Name <span>*</span></label>
              <input type="text" name="bname" class="form-control white_bg" id="bname" required>
            </div>
            <div class="form-group">
              <label class="control-label">Bike Brand<span>*</span></label>
              <input type="text" name="brand" class="form-control white_bg" id="brand" required>
            </div>
            <div class="form-group">
              <label class="control-label">Price/day <span>*</span></label>
              <input type="text" name="price" class="form-control white_bg" id="price" required>
            </div>
            <div class="form-group">
              <label class="control-label">Bike Type<span>*</span></label>
              <input type="text" name="fuel" class="form-control white_bg" id="fuel" required>
            </div>
            <div class="form-group">
              <label class="control-label">Model Year <span>*</span></label>
              <input type="text" name="year" class="form-control white_bg" id="year" required>
            </div>
            <div class="form-group">
              <label class="control-label">Image Path <span>*</span></label>
              <input type="text" name="img" class="form-control white_bg" id="year" required>
            </div>
            <div class="form-group">
              <label class="control-label">DEALER id <span>*</span></label>
              <input type="text" name="dealer" class="form-control white_bg" id="year" required>
            </div>
            
            <div class="form-group">
              <button class="btn" type="submit" name="send" type="submit">Add Bike <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /Contact-us-->


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
<script src="assets/switcher/js/switcher.js"></script>
<!--bootstrap-slider-JS-->
<script src="assets/js/bootstrap-slider.min.js"></script>
<!--Slider-JS-->
<script src="assets/js/slick.min.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>

</body>

<!-- Mirrored from themes.webmasterdriver.net/carforyou/demo/contact-us.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 16 Jun 2017 07:26:55 GMT -->
</html>
