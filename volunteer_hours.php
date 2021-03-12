<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<h1> Volunteer Hours </h1>
<?php
include 'Vheader.php';
include 'pvars.php';

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
if ($conn->connect_error) {
    die('Connection failed: '. $conn->connect_error);
}


//start form
echo '<form action="volunteer_hours.php" method="get">';

//Dropdown of volunteer names
echo 'Name: <select name="VName"  required>';
//echo 'Name: <input list="VName" type="text" required>';

echo '<option value=""></option>';

$res = $conn->query("SELECT DISTINCT Name, ID FROM Volunteers ORDER BY Name");
while ($row = $res->fetch_assoc()) {
  echo '<option value="'.$row["ID"].'">'.$row["Name"].'</option>';
}
echo '</select><br>';

//date box
$tod = date('Y-m-d');
echo 'Date: <input type="date" name="setdate" value="'.$tod.'"><br>';

//number of hours worked box
echo 'Hours: <input type="number" name="hours" min="1" step="1" oninput="validity.valid||(value="");" required><br>';

echo '<input type="submit" name="formsubmitted">';
//end form

//when form submits records volunteers hours by ID
if (isset($_GET["formsubmitted"])) {
	echo 'Your hours have been recorded';
	$conn->query("INSERT INTO VolunteerHours (ID, Date, Hours) VALUES ('".$_GET["VName"]."', '".$_GET["setdate"]."', '".$_GET["hours"]."')");
}
echo '</form>';

$conn->close();
?>

</body>