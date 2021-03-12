<!DOCTYPE html>
<html>
<head>
</head>
<body>
<h1> Donations </h1>

<?php

include 'pvars.php';
include 'Vheader.php';

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($conn->connect_error) {
	die('Connection failed: '. $conn->connect_error);
}

echo '<form action="don.php" method="get">';

//calendar for entering date of donation (taken from Tyler)
$tod = date('Y-m-d');
echo 'Date: <input type="date" name="setdate" value="'.$tod.'"><br>';

echo 'Donor Type: <select name="donor">';

echo '<option value=""></option>';

echo '<option value="2" name="dtype">Food Drive</option>'; 
echo '<option value="3" name="dtype">Grocery Rescue</option>';
echo '<option value="4" name="dtype">Private Donor</option>'; 
echo '<option value="5" name="dtype">Second Harvest</option>';
echo '<option value="6" name="dtype">Grocery Store</option>'; 
echo '<option value="7" name="dtype">Grocery Drive Cart</option>';
echo '<option value="8" name="dtype">USDA Food</option>';
echo '</select><br>';

echo 'Please enter the amount donated(in lbs)';
echo '<input type="text" name="lbs"><br>';



if(isset($_GET["submit"]))
{       
    //$timequery= $conn->query"INSERT INTO Volunteers (Name, Email, PhoneNumber, Availability) VALUES (firstname lastname,  emailAddr, part1 part2 part3, '" . $checkBox . "')";
	$donquery = "INSERT INTO Donations (SourceID, Date, Quantity) VALUES ('".$_GET["donor"]."', '".$_GET["setdate"]."',  '".$_GET["lbs"]."')";
	//echo $donquery;
	$conn->query("INSERT INTO Donations (SourceID, Date, Quantity) VALUES ('".$_GET["donor"]."', '".$_GET["setdate"]."',  '".$_GET["lbs"]."')");
	
}


echo '<input type="submit" name="submit"><br>';

echo '</form>';

?>

</body>
</html>