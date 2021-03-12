<!DOCTYPE html>
<html>
<head>
</head>
<body>
<h1> Add People </h1>

<?php

include 'Vheader.php';
include 'pvars.php';

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($conn->connect_error) {
	die('Connection failed: '. $conn->connect_error);
}

//start form
echo '<form action="addpeople.php" method="get">';

//get household id if you do not already have it
echo 'Household you want to add to: <select name="HID">';

//first value is empty
echo '<option value=""></option>';

//get all of the client names
$res = $conn->query("SELECT HouseholdID, FirstName, LastName FROM People ORDER BY FirstName, LastName");
while ($row = $res->fetch_assoc()) {
  echo '<option value="'.$row["HouseholdID"].'">'.$row["FirstName"].' '.$row["LastName"].'</option>';
}

echo '</select><br>';

//person 1
echo '<p>Person 1</p>'; 

//first name
echo 'First Name: <input type="text" name="FirstName" required>';

//last name
echo 'Last Name: <input type="text" name="LastName" required>';

//gender
echo 'Gender: <select name="gender" required>';
echo '<option value=""></option>';
echo '<option value=M>Male</option>';
echo '<option value=F>Female</option>';
echo '</select><br>';

//birthdate
echo 'Birthdate: <input type="date" name="birthdate" required>';

//relationship
echo 'Relationship: <select name="relationship" required>';
echo '<option value=""></option>';
echo '<option value=Self>Self</option>';
echo '<option value=Spouse>Spouse</option>';
echo '<option value=Child>Child</option>';
echo '<option value=Grandchild>Grandchild</option>';
echo '<option value=Father>Father</option>';
echo '<option value=Mother>Mother</option>';
echo '<option value=Grandfather>Grandfather</option>';
echo '<option value=Grandmother>Grandmother</option>';
echo '<option value=Friend>Friend</option>';
echo '<option value=Unrelated Adult>Unrelated Adult</option>';
echo '</select><br>';

//phone
echo 'Phone Number: <input type="tel" name="phone">';

//person 2
echo '<p>Person 2</p>'; 

//first name
echo 'First Name: <input type="text" name="FirstName2">';

//last name
echo 'Last Name: <input type="text" name="LastName2">';

//gender
echo 'Gender: <select name="gender2">';
echo '<option value=""></option>';
echo '<option value=M>Male</option>';
echo '<option value=F>Female</option>';
echo '</select><br>';

//birthdate
echo 'Birthdate: <input type="date" name="birthdate2">';

//relationship
echo 'Relationship: <select name="relationship2">';
echo '<option value=""></option>';
echo '<option value=Self>Self</option>';
echo '<option value=Spouse>Spouse</option>';
echo '<option value=Child>Child</option>';
echo '<option value=Grandchild>Grandchild</option>';
echo '<option value=Father>Father</option>';
echo '<option value=Mother>Mother</option>';
echo '<option value=Grandfather>Grandfather</option>';
echo '<option value=Grandmother>Grandmother</option>';
echo '<option value=Friend>Friend</option>';
echo '<option value=Unrelated Adult>Unrelated Adult</option>';
echo '</select><br>';

//phone
echo 'Phone Number: <input type="tel" name="phone2">';

//person 3
echo '<p>Person 3</p>'; 

//first name
echo 'First Name: <input type="text" name="FirstName3">';

//last name
echo 'Last Name: <input type="text" name="LastName3">';

//gender
echo 'Gender: <select name="gender3">';
echo '<option value=""></option>';
echo '<option value=M>Male</option>';
echo '<option value=F>Female</option>';
echo '</select><br>';

//birthdate
echo 'Birthdate: <input type="date" name="birthdate3">';

//relationship
echo 'Relationship: <select name="relationship3">';
echo '<option value=""></option>';
echo '<option value=Self>Self</option>';
echo '<option value=Spouse>Spouse</option>';
echo '<option value=Child>Child</option>';
echo '<option value=Grandchild>Grandchild</option>';
echo '<option value=Father>Father</option>';
echo '<option value=Mother>Mother</option>';
echo '<option value=Grandfather>Grandfather</option>';
echo '<option value=Grandmother>Grandmother</option>';
echo '<option value=Friend>Friend</option>';
echo '<option value=Unrelated Adult>Unrelated Adult</option>';
echo '</select><br>';

//phone
echo 'Phone Number: <input type="tel" name="phone3">';

//person 4
echo '<p>Person 4</p>'; 

//first name
echo 'First Name: <input type="text" name="FirstName4">';

//last name
echo 'Last Name: <input type="text" name="LastName4">';

//gender
echo 'Gender: <select name="gender4">';
echo '<option value=""></option>';
echo '<option value=M>Male</option>';
echo '<option value=F>Female</option>';
echo '</select><br>';

//birthdate
echo 'Birthdate: <input type="date" name="birthdate4">';

//relationship
echo 'Relationship: <select name="relationship4">';
echo '<option value=""></option>';
echo '<option value=Self>Self</option>';
echo '<option value=Spouse>Spouse</option>';
echo '<option value=Child>Child</option>';
echo '<option value=Grandchild>Grandchild</option>';
echo '<option value=Father>Father</option>';
echo '<option value=Mother>Mother</option>';
echo '<option value=Grandfather>Grandfather</option>';
echo '<option value=Grandmother>Grandmother</option>';
echo '<option value=Friend>Friend</option>';
echo '<option value=Unrelated Adult>Unrelated Adult</option>';
echo '</select><br>';

//phone
echo 'Phone Number: <input type="tel" name="phone4">';

//hidden field for household id
echo '<input type="hidden" id="HouseholdID" name="HID" value="'.$_GET["HouseholdID"].'">';

if (isset($_GET["submitAPform"])){
	$addperson1 = "INSERT INTO People (HouseholdID, FirstName, LastName, Gender, Birthdate, Relationship, Phone) VALUES ('".$_GET["HID"]."', '".$_GET["FirstName"]."', '".$_GET["LastName"]."', '".$_GET["gender"]."', '".$_GET["birthdate"]."', '".$_GET["relationship"]."', '".$_GET["phone"]."')";
	$conn->query($addperson1);
	
	if (!empty($_GET["FirstName2"])){
		$addperson2 = "INSERT INTO People (HouseholdID, FirstName, LastName, Gender, Birthdate, Relationship, Phone) VALUES ('".$_GET["HID"]."', '".$_GET["FirstName2"]."', '".$_GET["LastName2"]."', '".$_GET["gender2"]."', '".$_GET["birthdate2"]."', '".$_GET["relationship2"]."', '".$_GET["phone2"]."')";
		$conn->query($addperson2);
	}
	
	if (!empty($_GET["FirstName3"])){
		$addperson3 = "INSERT INTO People (HouseholdID, FirstName, LastName, Gender, Birthdate, Relationship, Phone) VALUES ('".$_GET["HID"]."', '".$_GET["FirstName3"]."', '".$_GET["LastName3"]."', '".$_GET["gender3"]."', '".$_GET["birthdate3"]."', '".$_GET["relationship3"]."', '".$_GET["phone3"]."')";
		$conn->query($addperson3);
	}
	
	if (!empty($_GET["FirstName4"])){
		$addperson4 = "INSERT INTO People (HouseholdID, FirstName, LastName, Gender, Birthdate, Relationship, Phone) VALUES ('".$_GET["HID"]."', '".$_GET["FirstName4"]."', '".$_GET["LastName4"]."', '".$_GET["gender4"]."', '".$_GET["birthdate4"]."', '".$_GET["relationship4"]."', '".$_GET["phone4"]."')";
		$conn->query($addperson4);
	}
	
}

//submit button
echo '<input type="submit" name="submitAPform">';

//end form
echo '</form>';

?>

</body>
</html>