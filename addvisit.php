<!DOCTYPE html>
<html>
<head>
</head>
<body>
<h1> Add Visit </h1>

<?php
include 'Vheader.php';
include 'pvars.php';

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($conn->connect_error) {
	die('Connection failed: '. $conn->connect_error);
}

//start form
echo '<form action="addvisit.php" method="get">';

//get the alert notes
$alertnotes = "SELECT Notes FROM HouseholdAlertNotes WHERE HouseholdID = ".$_GET["CName"]."";
$res = $conn->query($alertnotes);
if($res) {
while ($row = $res->fetch_assoc()) {
echo '<p>Alert Notes: '.$row["Notes"].'</p>';
}
}

//get notes
$notes = "SELECT Notes FROM HouseholdVisit WHERE HouseholdID = ".$_GET["CName"]."";
$res = $conn->query($notes);
if($res) {
$row = $res->fetch_assoc();
echo '<p>Note from last visit: '.$row["Notes"].'</p>';
}
	
//get the date they last visited
$datequery = "SELECT Max(Date) As MaxDate FROM HouseholdVisit WHERE HouseholdID = ".$_GET["CName"]."";
$res = $conn->query($datequery);
if($res) {
while ($row = $res->fetch_assoc()) {
echo '<p>Date of last visit: '.$row["MaxDate"].'</p>';
}
}
	
//get all the members in the household
$householdmembers = "SELECT * FROM People WHERE HouseholdID = ".$_GET["CName"]."";
$res = $conn->query($householdmembers);
if($res) {
echo '<p>Household Members:</p>';
while ($row = $res->fetch_assoc()) {
echo '<p>'.$row["FirstName"].' '.$row["LastName"].'</p>';
}
}

//hidden field for household id
echo '<input type="hidden" id="HouseholdID" name="HouseholdID" value="'.$_GET["CName"].'">';

//date box
$tod = date('Y-m-d');
echo 'Date: <input type="date" name="setdate" value="'.$tod.'"><br>';

//visit type box`
echo 'Visit Type: <select name="Vtype" required>';

//first value is empty
echo '<option value=""></option>';

//rest of the values
echo '<option value=1>Standard</option>';
echo '<option value=2>Homeless</option>';
echo '<option value=3>Client Choice</option>';

echo '</select><br>';

//bag type box
echo 'Bag Type: <select name="Btype" required>';

//first value is empty
echo '<option value=""></option>';

//rest of the values
echo '<option value=2>Bag for 1-2</option>';
echo '<option value=3>Bag for 3-5</option>';
echo '<option value=4>Bag for 6+</option>';
echo '<option value=5>Choice Bag for 1-2</option>';
echo '<option value=6>Choice Bag for 3-5</option>';
echo '<option value=7>Choice Bag for 6+</option>';
echo '<option value=14>Children Bag</option>';

echo '</select><br>';

//notes
echo 'Notes: <input type="text" name="notes">';

if (isset($_GET["submitAVform"])){
	$visitquery = "INSERT INTO HouseholdVisit (HouseholdID, Date, Type, Received, Notes) VALUES ('".$_GET["HouseholdID"]."', '".$_GET["setdate"]."', '".$_GET["Vtype"]."', '".$_GET["Btype"]."', '".$_GET["notes"]."')";
	//echo $visitquery;
	$conn->query($visitquery);
}

//submit button
echo '<input type="submit" name="submitAVform">';

echo '</form>';

$conn->close();
?>

</body>

</html>