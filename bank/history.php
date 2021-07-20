<!DOCTYPE html>
<html>
<head>
	<title>
		History
	</title>
	<link rel="stylesheet" type="text/css" href="css/history.css">
</head>
<body>
	<ul>
		<li class="logo"><a><img src="images/logo1.jpg" style="width: 40px;height: 38px;"></a></li>
		<li class="sparks">SPARKS BANK</li>
		<li class="contact"><a href="contact.php"> Contact us </a></li>
		<li class="home"><a href="home.php"> Home </a></li>
	</ul>
	<div class="table">
		<h1>Transaction History</h1><br>
	<table>
		<tr>
			<th><b>S.No</b></th>
			<th><b>Sender</b></th>
			<th><b>Reciever</b></th>
			<th><b>Amount</b></th>
			<th><b>Date</b></th>
			<th><b>Time</b></th>
		</tr>
		<?php
		$connection=mysqli_connect("localhost:3307","root","","bank");
		if($connection-> connect_error){
			die("connection failed:". $connection-> connect_error);
		}
		$sql = "SELECT * from history ";
		$result= $connection-> query($sql);
		$i=1;
		if($result-> num_rows > 0){
			while($row = $result-> fetch_assoc()){
				?>
				<tr>
					<td><b><?php echo $i; ?> </b></td>
					<td><b><?php echo $row['sender']; ?> </b></td>
					<td><b><?php echo $row['receiver']; ?> </b></td>
					<td><b><?php echo $row['amount']; ?> </b></td>
					<td><b><?php echo $row['dte']; ?> </b></td>
					<td><b><?php echo $row['tme']; ?></b></td>
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