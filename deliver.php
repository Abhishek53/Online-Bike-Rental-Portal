<?php
session_start();
// connect to the database
include('includes/config.php');
$email=$_SESSION['login'];
//echo ($email);


$bid=$_GET['book_id'];





	$sta=1;
	$con2="update tblbooking set DStatus=:newbal where id=:email";
	$chngpwd2 = $dbh->prepare($con2);
	$chngpwd2-> bindParam(':email', $bid, PDO::PARAM_STR);
	$chngpwd2-> bindParam(':newbal', $sta, PDO::PARAM_STR);
	$chngpwd2->execute();
	header('location: booked-bikes.php');



?>