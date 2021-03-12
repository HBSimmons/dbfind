<!DOCTYPE html>
<html>
<head>
</head>
<body>
<h1> Client Search </h1>

<?php
include 'Vheader.php';
include 'pvars.php';

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($conn->connect_error) {
	die('Connection failed: '. $conn->connect_error);
}


//start form
echo '<form action="clientsearch.php" method="get">';

//get a dropdown of names with searchable text box
echo 'Name: <select name="CName"  required>';

//first value is empty
echo '<option value=""></option>';

//get all of the client names
$res = $conn->query("SELECT HouseholdID, FirstName, LastName FROM People ORDER BY FirstName, LastName");
while ($row = $res->fetch_assoc()) {
  echo '<option value="'.$row["HouseholdID"].'">'.$row["FirstName"].' '.$row["LastName"].'</option>';
}

echo '</select><br>';

if (isset($_GET["submitCVform"])){
	header('Location: addvisit.php?CName='.$_GET["CName"].'');
}

//submit button
echo '<input type="submit" name="submitCVform">';

//end form
echo '</form>';

$conn->close();
?>

</body>
</html>