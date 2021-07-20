<!DOCTYPE html>
<html>
<head>
	<title>Transfering</title>
	<link rel="stylesheet" type="text/css" href="css/loading.css">
	<meta http-equiv="refresh" content="4; url=success.php">
</head>
<body>
	<ul>
		<li class="logo"><a><img src="images/logo1.jpg" style="width: 40px;height: 38px;"></a></li>
		<li class="sparks">SPARKS BANK</li>
	</ul>
<img class="process" src="images/t3.gif">
<br><br><br><br>
<img class="wait" src="images/t2.gif">
</body>
</html>
<?php 
session_start();
$connection=mysqli_connect("localhost:3307","root","","bank") or die("no connected");
mysqli_select_db($connection,"bank") or die("no database");
$id=$_SESSION['from_accno'];
$cus=$_GET['name'];
$amount=$_GET['amount'];
$reciever="SELECT balance FROM customer WHERE name='$cus'";
$reciever=mysqli_query($connection,$reciever);
$reciever=mysqli_fetch_assoc($reciever);
$r=$reciever['balance'];
$reciever=$r+$amount;
$sender= "SELECT name FROM customer WHERE accno=$id";
$sender1=mysqli_query($connection,$sender);
$sender=mysqli_fetch_assoc($sender1);
$sender_before_balance= "SELECT balance FROM customer WHERE accno=$id";
$sender_before_balance=mysqli_query($connection,$sender_before_balance);
$sender_before_balance=mysqli_fetch_assoc($sender_before_balance);
$s=$sender_before_balance['balance'];
$sender_after_balance= $sender_before_balance['balance']-$amount;
date_default_timezone_set("Asia/kolkata");
$date=date("d-m-Y");
$time=date("h:i:sa");
$sen=$sender['name'];
$history="INSERT INTO history (sender,receiver,amount,dte,tme) VALUES ('$sen','$cus','$amount','$date','$time')";
$query=mysqli_query($connection,$history);
$update_sender="UPDATE customer SET balance=$sender_after_balance WHERE accno=$id";
$query=mysqli_query($connection,$update_sender);
$update_reciever="UPDATE customer SET balance=$reciever WHERE name='$cus'";
$query=mysqli_query($connection,$update_reciever);
//header("Refresh:20;url=success.php?from=$id&to=$cus&amount=$amount");
?>
