<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<?php
if(isset($_COOKIE["user"])) {
	echo "Welcome back, " .$_COOKIE["user"];
}
?>

<body style="background-color:<?php echo $_COOKIE["color"];?>" >

<div class="sticky">

<ul>
<li><a href="index.php">index.php</a></li>
<li><a href="gardner.php">gardner.php</a></li>
<li><a href="form.php">form.php</a></li>
<li><a href="dbconnect3.php">dbconnect3.php</a></li>
<li><a href="country_form.php">country_form.php</a></li>
</ul>
</div>