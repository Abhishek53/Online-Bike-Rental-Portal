<?php
session_start();
// connect to the database
include('includes/config.php');
$email=$_SESSION['login'];
//echo ($email);
$sql ="SELECT user_id,user_name,user_phone,user_email,user_balance FROM user WHERE  user_email=:email";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
    foreach ($results as $result) {
        # code...
        $id = $result->user_id;
        $name= $result->user_name;
        $phone= $result->user_phone;
        $email = $result->user_email;
        $balance=$result->user_balance;
    }


} else{
  
header('location: index.php');

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="keywords" content="">
<meta name="description" content="">
<title>Smart Ticket Technology</title>
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
td{
    align-items: center;
}


</style>

</head>
<body bgcolor="black">
                <!--Header-->
                <?php include('includes/header.php');?>
                <!-- /Header -->

                
                
                
            <center>
                <div class="container-fullwidth">
                        <div class="jumbotron col-md-6 col-md-offset-3"
                                style="margin-top: 50px">
                                
                                <div class="row">
                                        <div class="account_details col-md-10 col-md-offset-1"
                                                style="margin-top: 30px; margin-bottom: 30px">
                                                <h2>Account Details</h2>
                                                <hr class="divider">
                                                <table class="table table-user-information col-md-6"  border="0">
                                                        <tbody>
                                                                <tr>
                                                                        <td><h3>User Name</h3></td>
                                                                        <td ><font size="5"><?php echo htmlentities($name);  ?></font></td>
                                                                </tr>
                                                                <tr>
                                                                        <td><h3>Account Balance</h3></td>
                                                                        <td><font size="5"><?php echo htmlentities($balance);  ?></font></td>
                                                                </tr>
                                                                
                                                                <tr>
                                                                        <td><h3>Phone Number</h3></td>
                                                                        <td><font size="5"><?php echo htmlentities($phone);  ?></font></td>
                                                                </tr>
                                                                <tr>
                                                                        <td><h3>Email</h3></td>
                                                                        <td><font size="5"><a href="mailto:abc@gmail.com"><?php echo htmlentities($email);  ?></a></font></td>
                                                                </tr>
                                                                
                                                        </tbody>
                                                </table>

                                                <div >

                                                    <a href="delete-account.php" style="margin-left: 10pt;" > <button type="submit" class="btn" name="button" value="delacc" style="background-color: orangered; color: white; margin-right: 20px;">Delete Account</button></div></a> <br>                                   
                                                   <a href="update-password.php" ><button type="submit" class="btn btn-primary" name="button" value="" style="color: white; margin-left: 20px;">Change Password</button></a>    
                                                </div>
                                        </div>
                                </div>
                        </div>
                         
                         
                              
                </div>
                
              </center>
              

              

<!--Back to top-->
<div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>
<!--/Back to top-->

        </body>
</html>
