<?php 
$connection=mysqli_connect("localhost:3307","root","","bank") or die("no connected");
mysqli_select_db($connection,"bank") or die("no database");
$name=$_GET['name'];
$email=$_GET['email'];
$balance=$_GET['balance'];
$f=0;
while(1){
	$accno=rand(1200,1300);
	$acc="SELECT accno FROM customer";
	$acc1=mysqli_query($connection,$acc);
	if($acc1-> num_rows > 0){
		while($row = $acc1-> fetch_assoc()){
			if($row['accno']==$accno){
				$f=1;
			}
		}
		if($f==0){
			break;
		}
	}
}
$create="INSERT INTO customer (name,accno,email,balance) VALUES ('$name','$accno','$email','$balance')";
$query=mysqli_query($connection,$create);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Successfully created</title>
	<link rel="stylesheet" type="text/css" href="created.css">
</head>
<body>
	<ul>
		<li class="logo"><a><img src="logo1.jpg" style="width: 40px;height: 38px;"></a></li>
		<li class="sparks">SPARKS BANK</li>
		<li class="contact"><a href="contact.php"> Contact us </a></li>
		<li><a href="customers.php"> Customers </a></li>
		<li class="home"><a href="home.php"> Home </a></li>
	</ul>
	<br><br>
	<h1>Your account has been created successfully!!!</h1>
	<img class="image" src="created.gif">
	<h1>YOUR ACCOUNT NUMBER : <?php echo $accno; ?></h1>
</body>
</html>
