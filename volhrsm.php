<!DOCTYPE html>
<html>
<head>
</head>
<body>
<h1> Volunteer Hours By Month / Day </h1>

<?php


include 'Vheader.php';
include 'pvars.php';

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($conn->connect_error) {
	die('Connection failed: '. $conn->connect_error);
}

echo '<form action="volhrsm.php" method="get">';

echo 'Year: <select name="year" required>';
echo '<option value=""></option>';

echo '<option value="2019" >2019</option>'; 
echo '<option value="2020">2020</option>';
echo '</select><br>';

echo 'Month (1-12): <input type="number" name="month" min="1" max="12" required><br>';

echo 'Day (1-31): <input type="number" name="day" min="1" max="31"><br>';


if (isset($_GET["month"]) && !empty($_GET["month"])){
$res = $conn->query("SELECT SUM(Hours) AS TotHours FROM VolunteerHours WHERE MONTH(Date) = '".$_GET["month"]."' AND YEAR(Date) = '".$_GET["year"]."'");
$row = $res->fetch_assoc();
echo 'Total Volunteer Hours for the Month: '.$row["TotHours"].' <br>';

if(isset($_GET["day"]) && !empty($_GET["day"])) {
$res = $conn->query("SELECT SUM(Hours) AS TotHours FROM VolunteerHours WHERE DAY(Date) = '".$_GET["day"]."' AND YEAR(Date) = '".$_GET["year"]."' AND MONTH(Date) = '".$_GET["month"]."'");
$row = $res->fetch_assoc();
echo 'Total Volunteer Hours for the Day: '.$row["TotHours"].' <br>';
}

}

echo '<input type="submit" name="submit"><br>';

echo '</form>';






?>

</body>
</html>