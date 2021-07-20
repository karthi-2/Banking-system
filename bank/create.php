<!DOCTYPE html>
<html>
<head>
	<title>User Creation</title>
	<link rel="stylesheet" text="text/css" href="create.css">
</head>
<body>
	<ul>
		<li class="logo"><a><img src="logo1.jpg" style="width: 40px;height: 38px;"></a></li>
		<li class="sparks">SPARKS BANK</li>
		<li class="contact"><a href="contact.php"> Contact us </a></li>
		<li class="home"><a href="home.php"> Home </a></li>
	</ul>
	<div class="main">
		<br><br>
		
		<div class="create">
			<h1>Create</h1>
			<form action="created.php" method="">
				<label>Name :</label>
				<input class="input" type="text" name="name" placeholder="Enter your name" required><br/><br/>
				<label>Email Id :</label>
				<input class="input" type="email" name="email" placeholder="Enter your email" required><br/><br/>
				<label>Balance :</label>
				<input class="input" type="text" name="balance" placeholder="Enter your balance" required><br/><br/>
				<button class="button" type="submit" name="submit">Create</button>
			</form>
		</div>
	</div>
</body>
</html>