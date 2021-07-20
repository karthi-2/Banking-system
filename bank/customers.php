<!DOCTYPE html>
<html>
<head>
	<title>
		view customers
	</title>
	<link rel="stylesheet" type="text/css" href="css/customers.css">
</head>
<body>
	<ul>
		<li class="logo"><a><img src="images/logo1.jpg" style="width: 40px;height: 38px;"></a></li>
		<li class="sparks">SPARKS BANK</li>
		<li class="contact"><a href="contact.php"> Contact us </a></li>
		<li class="home"><a href="home.php"> Home </a></li>
	</ul>
	<div class="table">
	<table>
		<tr>
			<th><b>S.No</b></th>
			<th><b>Name</b></th>
			<th><b>Account No</b></th>
			<th><b>Emai Id</b></th>
			<th><b>Balance</b></th>
			<th><b>Action</b></th>
		</tr>
		<?php
		$connection=mysqli_connect("localhost:3307","root","","bank");
		if($connection-> connect_error){
			die("connection failed:". $connection-> connect_error);
		}
		$sql = "SELECT sno,name,accno,email,balance from customer";
		$result= $connection-> query($sql);
		$i=1;
		if($result-> num_rows > 0){
			while($row = $result-> fetch_assoc()){
				?>
				<tr>
					<td><b><?php echo $i; ?> </b></td>
					<td><b><?php echo $row['name']; ?> </b></td>
					<td><b><?php echo $row['accno']; ?> </b></td>
					<td><b><?php echo $row['email']; ?> </b></td>
					<td><b><?php echo $row['balance']; ?> </b></td>
					<td><b><a class="transaction" href="transaction.php?accno=<?php echo $row['accno'] ?>"> Make Transaction</a></b></td>
				</tr>
			<?php
			$i++;
			}
			echo "</table>";
		}
		else{
			echo "0 result";
		}
		$connection-> close();
		?>
	</table>
</div>
</body>
</html>