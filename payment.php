<?php
session_start();
// connect to the database
include('includes/config.php');
$email=$_SESSION['login'];
//echo ($email);
$sql ="SELECT user_balance FROM user WHERE  user_email=:email";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);


$bid=$_GET['book_id'];
$sql2 ="SELECT user.user_balance as balance,tblvehicles.PricePerDay as price,tblvehicles.id as vid,tblbooking.days,tblbooking.Status  from tblbooking join tblvehicles on tblbooking.VehicleId=tblvehicles.id join user on tblbooking.user_email=user.user_email where tblbooking.id=:bid";
$query2= $dbh -> prepare($sql2);
$query2-> bindParam(':bid', $bid, PDO::PARAM_STR);
$query2-> execute();
$results2=$query2->fetchAll(PDO::FETCH_OBJ);




if($query->rowCount() > 0)
{
	foreach ($results2 as $result2) {
		# code...
		$balance = $result2->balance;
	}
	$sta=1;
	$crnt_price=($result2->days*$result2->price);
	if($crnt_price<$balance){
	$new_balance=$balance-$crnt_price;
	$con1="update user set user_balance=:newbal where user_email=:email";
	$chngpwd1 = $dbh->prepare($con1);
	$chngpwd1-> bindParam(':email', $email, PDO::PARAM_STR);
	$chngpwd1-> bindParam(':newbal', $new_balance, PDO::PARAM_STR);
	$chngpwd1->execute();
	$con2="update tblbooking set Status=:newbal where id=:email";
	$chngpwd2 = $dbh->prepare($con2);
	$chngpwd2-> bindParam(':email', $bid, PDO::PARAM_STR);
	$chngpwd2-> bindParam(':newbal', $sta, PDO::PARAM_STR);
	$chngpwd2->execute();
	header('location: my-booking.php');

}else{header('Location: ' . $_SERVER['HTTP_REFERER']);
}

}

 else{
  
header('Location: ' . $_SERVER['HTTP_REFERER']);


}
?>