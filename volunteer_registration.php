<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?php
include 'headerstuff.php';
include 'vars.php';

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
if ($conn->connect_error) {
    die('Connection failed: '. $conn->connect_error);
}
?>

<form action="volunteer_registration.php" method="get">

First Name: 
<input type="text" name="first_name"><br>

Last Name: 
<input type="text" name="last_name"><br>

Email:
<input type="email" name="email"><br>

Phone Number:
<input type="tel" name="phonenumber"><br>

<input type="submit">

</form>

</body>