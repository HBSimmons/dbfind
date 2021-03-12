<!DOCTYPE html>
<html>
<head>
</head>

<body>
<h1> Group Search </h1>
<?php
include 'Vheader.php';
include 'pvars.php';

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($conn->connect_error) {
	die('Connection failed: '. $conn->connect_error);
}


echo '<form action="groupsearch.php" method="get">';

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

if (isset($_GET["availability"]) && !empty($_GET["availability"])) {
	$groupquery = "SELECT * FROM Groups WHERE Availability LIKE '%".$_GET["availability"]."%' ORDER BY GroupName";
	//echo $groupquery;
	$res = $conn->query($groupquery);

if($res) {
	while ($row = $res->fetch_assoc()) {
		echo '<p>'.$row["GroupName"].', '.$row["Phone"].'</p>';
	}
}
}

echo '<input type="submit" name="submitthisform">';

echo '</form>';

$conn->close();
?>


</body>


</html>