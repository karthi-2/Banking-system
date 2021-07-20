<?php
$connection=mysqli_connect("localhost:3307","root","","bank") or die("no connected");
mysqli_select_db($connection,"bank") or die("no database");
?>

<!DOCTYPE html>
<html>
<head>
	<title>
		Transactions
	</title>
	<link rel="stylesheet" type="text/css" href="transaction.css">
</head>
<body>
	<ul>
		<li class="logo"><a><img src="logo1.jpg" style="width: 40px;height: 38px;"></a></li>
		<li class="sparks">SPARKS BANK</li>
		<li class="contact"><a href="contact.php"> Contact us </a></li>
		<li class="home"><a href="home.php"> Home </a></li>
	</ul>
	<img class="image" src="b11.jpg" alt="no image">
	<br><br>
	<h1>Transfer Money</h1>
	<!--<br><br>
	<div class="from"><strong>From</strong></div>-->
<div class="table">
	<table>
		<tr>
			<th>Name</th>
			<th>Account No</th>
			<th>Email Id</th>
			<th>Balance</th>
		</tr>
<?php 
if (isset($_GET['accno'])) {
    $id =  mysqli_real_escape_string($connection, $_GET["accno"]);
    $sql = "SELECT * FROM customer WHERE accno=$id";
    $result = mysqli_query($connection, $sql);
    $row1 = mysqli_fetch_assoc($result);
    $sql_for_other_users = "SELECT * FROM customer WHERE NOT accno=$id";
    $result1 = mysqli_query($connection, $sql_for_other_users);
    $users = mysqli_fetch_all($result1, MYSQLI_ASSOC);
}
?>
<tr>
<td><b><?php echo $row1["name"]; ?></b></td>
  <td><b><?php echo $row1["accno"]; ?></b></td>
  <td><b><?php echo $row1["email"]; ?></b></td>
  <td><b><?php echo $row1["balance"]; ?></b></td>
 </tr>
</table>
</div>
<br><br><br>
<div class="form">
<form method="" action="loading.php">
	<br><br>
<strong><h2>Transfer To :<select class="dropdown" name="name" value="customer" id="customers">
	<option>Select Customer</option>
	<?php 
	$sql = "SELECT sno,name,accno,email,balance from customer";
		$result= $connection-> query($sql);
		if($result-> num_rows > 0){
			while($row = $result-> fetch_assoc()){
				if($row['accno']!=$id){
				?>
					<option name="<?php echo $row['name']; ?>"><?php echo $row['name']; }?></option>
				<?php
			}
			echo "</table>";
		}
		else{
			echo "0 result";
		}
		?>
</select></strong>
<br><br>
	<strong><b><h4>Enter Amount :</b></strong>
	<input class="rs" type="number" name="amount" min=1 max=<?php echo $row1['balance'] ?> required></h2>
<br>
	<strong><b>
		<input class="button" type="submit"  value="Submit">
	</b></strong>
</form>
</div>
</body>
</html>
<?php 
session_start();
$_SESSION['from_accno']=$id;
?>
