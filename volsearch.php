<!DOCTYPE html>
<html>
<head>
</head>

<body>
<h1> Volunteer Search </h1>
<?php
include 'Vheader.php';
include 'pvars.php';

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($conn->connect_error) {
	die('Connection failed: '. $conn->connect_error);
}


echo '<form action="volsearch.php" method="get">';

echo 'Availability: <select name="availability">';

echo '<option value=""></option>';

echo '<option value="M930-12">Monday 9:30am-12:00pm</option>';
echo '<option value="M12-2">Monday 12:00pm-2:00pm</option>'; 
echo '<option value="T930-11">Tuesday 9:30am-11:00am</option>';
echo '<option value="W930-12">Wednesday 9:30am-12:00pm</option>'; 
echo '<option value="W12-2">Wednesday 12:00pm-2:00pm</option>';
echo '<option value="R9-12">Thursday 9:00am-12:00pm</option>'; 
echo '<option value="S930-12">Saturday 9:30am-12:00pm</option>';
echo '<option value="S10-12">Saturday 10:00am-12:00pm</option>';

echo '</select><br>';

echo 'Roles: <select name="roles">';

echo '<option value=""></option>';

echo'<option value="Check-in">Front Check-in/Computer</option>';
echo'<option value="Stock/Sort">Stocking/Sorting</option>';
echo'<option value="Food Bags">Food Bags</option>';
echo'<option value="Shift Mgmt">Shift Management</option>';
echo'<option value="Writing">Writing</option>';
echo'<option value="IT Supp">Website/IT Support</option>';
echo'<option value="Clean">Cleaning</option>';
echo'<option value="Food Drive">Food Drive</option>';
echo'<option value="Driver4pickup">Driver for Food Pick-Up(Truck Needed)</option>';

echo '</select><br>';

if (isset($_GET["availability"]) && !empty($_GET["availability"])) {
	$volquery = "SELECT * FROM Volunteers WHERE Availability LIKE '%".$_GET["availability"]."%' ORDER BY Name";

$res = $conn->query($volquery);
if($res) {
	while ($row = $res->fetch_assoc()) {
	echo '<p>'.$row["Name"].', '.$row["Email"].' , '.$row["PhoneNumber"].'</p>';
	}
}
}

if (isset($_GET["roles"]) && !empty($_GET["roles"])) {
	$volquery2 = "SELECT * FROM VolunteerRoles WHERE Role LIKE '%".$_GET["roles"]."%' ORDER BY Name";

$res = $conn->query($volquery2);
if($res) {
	while ($row = $res->fetch_assoc()) {
	echo '<p>'.$row["Name"].', '.$row["Role"].'</p>';
	}
}
}

echo '<input type="submit" name="submitthisform">';

echo '</form>';

$conn->close();
?>


</body>


</html>