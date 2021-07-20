<?php
$connection=mysqli_connect("localhost:3307","root","","bank") or die("no connected");
mysqli_select_db($connection,"bank") or die("no database");
?>