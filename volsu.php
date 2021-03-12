<!DOCTYPE html>
<html>
<head>
</head>
<body>
<h1> Volunteer Sign-Up </h1>

<?php

include 'Vheader.php';
include 'pvars.php';

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($conn->connect_error) {
	die('Connection failed: '. $conn->connect_error);
}

echo '<form action="volsu.php" method="get">';

//Full Name
echo 'First name: <input type="text" name="firstname" > Last name: <input type="text" name="lastname" required><br>';

//email
echo 'Email address: <input type="email" name="emailAddr"><br>';

//phone
//echo 'Phone number: <input type ="text" name="part1" >-<input type="text" name="part2">-<input type="text" name="part3" ><br>';
echo 'Phone Number: <input type="tel" name="phone" required>';

//groups
echo 'If registering a group please type the name: <input type="text" name="groups"><br>';

//checkboxes for serving times
echo '<p>Please select any times in which you are interested in serving</p>';
echo '<input type="checkbox" name="Times[]" value="M930-12">Monday 9:30am-12:00pm <br>';
echo '<input type="checkbox" name="Times[]" value="M12-2">Monday 12:00pm-2:00pm <br>';
echo '<input type="checkbox" name="Times[]" value="T930-11">Tuesday 9:30am-11:00am <br>';
echo '<input type="checkbox" name="Times[]" value="W930-12">Wednesday 9:30am-12:00pm <br>';
echo '<input type="checkbox" name="Times[]" value="W12-2">Wednesday 12:00pm-2:00pm <br>';
echo '<input type="checkbox" name="Times[]" value="R9-12">Thursday 9:00am-12:00pm <br>';
echo '<input type="checkbox" name="Times[]" value="S930-12">Saturday 9:30am-12:00pm <br>';
echo '<input type="checkbox" name="Times[]" value="S10-12">Saturday 10:00am-12:00pm <br>';

//checkboxes for serving areas
echo '<p>Please select any areas in which you are interested in serving</p>';
echo '<input type="checkbox" name="Area[]" value="Front Check-in/Computer">Front Check-in/Computer <br>';
echo '<input type="checkbox" name="Area[]" value="Stock/Sorting">Stocking/Sorting<br>';
echo '<input type="checkbox" name="Area[]" value="Food Bags">Food Bags<br>';
echo '<input type="checkbox" name="Area[]" value="Shift Mgmt">Shift Management<br>';
echo '<input type="checkbox" name="Area[]" value="Writing">Writing<br>';
echo '<input type="checkbox" name="Area[]" value="Website/IT Support">Website/IT Support<br>';
echo '<input type="checkbox" name="Area[]" value="Cleaning">Cleaning <br>';
echo '<input type="checkbox" name="Area[]" value="Food Drive">Food Drives <br>';
echo '<input type="checkbox" name="Area[]" value="Driver4pickup">Driver for Food Pick-Up(Truck Needed) <br>';

?>

<?php

//takes all data into array and puts data into volunteers thing
$checkBox = implode(',', $_GET['Times']);

if(isset($_GET['submit']))
{       
    //$timequery= $conn->query"INSERT INTO Volunteers (Name, Email, PhoneNumber, Availability) VALUES (firstname lastname,  emailAddr, part1 part2 part3, '" . $checkBox . "')";
	$conn->query("INSERT INTO Volunteers (Name, Email, PhoneNumber, Availability) VALUES ('".$_GET["firstname"]." ".$_GET["lastname"]."',  '".$_GET["emailAddr"]."', '".$_GET["phone"]."', '" . $checkBox . "')");
	
 

}

//takes all data into array and puts it into volunteer roles thing
//takes all data into array


$checkBox2 = implode(',', $_GET['Area']);

if(isset($_GET['submit']))
{       
    //$areaquery= $conn->query"INSERT INTO Volunteers (Name, Role) VALUES  (firstname lastname, '" . $checkBox . "')";
	$conn->query("INSERT INTO VolunteerRoles (Name, Role) VALUES  ('".$_GET["firstname"]." ".$_GET["lastname"]."', '" . $checkBox2 . "')");
 
	echo 'You have succesfully been registered.';
	
	if(isset($_GET["groups"]) && !empty($_GET["groups"])) {
		$groupnames = "INSERT INTO Groups (GroupName, Phone, Availability) VALUES ('".$_GET["groups"]."', '".$_GET["phone"]."' , '".$checkBox."')";
		$conn->query($groupnames);
	}
}
  
echo '<input type="submit" name="submit"><br>';
echo '</form>'; 


?>



</body>
</html>	