<!DOCTYPE html>
<html>
<head>
</head>
<body>
<h1> Donations Received </h1>

<?php


include 'Vheader.php';
include 'pvars.php';

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($conn->connect_error) {
	die('Connection failed: '. $conn->connect_error);
}

echo '<form action="donrep.php" method="get">';
echo 'Year: <select name="year">';
echo '<option value=""></option>';

echo '<option value="2019" >2019</option>'; 
echo '<option value="2020">2020</option>';
echo '<input type="submit" name="submit"><br>';
echo '</select><br>';



$res = $conn->query("SELECT SUM(Quantity) AS TotQ FROM Donations WHERE Year(Date) = '".$_GET["year"]."'");
$row = $res->fetch_assoc();
echo 'Donations received this year: '.$row["TotQ"].' <br>';


//$price = 1.6;

$dollar = 1.6 * $row["TotQ"];
echo 'Donations in dollar amounts: '.$dollar.' <br>';



?>

</body>
</html>