<!DOCTYPE html>
<html>
<head>
</head>
<body>
<h1> Add Household </h1>

<?php

include 'Vheader.php';
include 'pvars.php';

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($conn->connect_error) {
	die('Connection failed: '. $conn->connect_error);
}

//start form
echo '<form action="addhousehold.php" method="get">';

//phone number input
echo 'Phone Number: <input type="tel" name="phone">';

//street input
echo 'Street: <input type="text" name="street">';

//City
echo 'City: <select name="city">';

//first value is empty
echo '<option value=""></option>';

//rest of the values
echo '<option value=Maryville>Maryville</option>';
echo '<option value=Alcoa>Alcoa</option>';

echo '</select><br>';

//zip code
echo 'Zip Code: <input type="number" name="zip">';

//alert notes
echo 'Alert Notes (Food Allergies, Special Needs, etc.): <input type="text" name="anotes">';

if (isset($_GET["submitAHform"])){
	//create household id
	$householdquery = "INSERT INTO Households (Phone, Street, City, State, Zip) VALUES ('".$_GET["phone"]."', '".$_GET["street"]."', '".$_GET["city"]."', 'TN', '".$_GET["zip"]."')";
	$conn->query($householdquery);
	
	//get household id
	$gethid = "SELECT Max(HouseholdID) AS NewHousehold FROM Households";
	$res = $conn->query($gethid);
	if($res) {
	while ($row = $res->fetch_assoc()) {
	$HouseholdID = $row["NewHousehold"];
	}
	}
	
	$anote = "INSERT INTO HouseholdAlertNotes (HouseholdID, Notes) VALUES ('".$HouseholdID."', '".$_GET["anotes"]."')";
	$conn->query($anote);
	
	//send household id to add people
	header('Location: addpeople.php?HouseholdID='.$HouseholdID.'');
	
}

//submit button
echo '<input type="submit" name="submitAHform">';

//end form
echo '</form>';

?>

</body>
</html>