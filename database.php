<?php
$servername = "mysql";
$username = "user";
$password = "user";
$database = "app";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
echo "<br>";

$sql = 'SELECT employeeNumber, firstName, jobTitle FROM employees ORDER BY employeeNumber';

$maxNumber = 0;
echo "<table border='1'>";
echo "<tr><th>number</th><th>first name</th><th>job title</th></tr>";
foreach ($conn->query($sql) as $row) {
    echo "<tr><td>" .  $row['employeeNumber'] . "</td><td>" . $row['firstName'] . "</td><td>" . $row['jobTitle'] . "</td></tr>";
    if ($maxNumber < $row['employeeNumber']) {
    	$maxNumber = $row['employeeNumber'];
    }
}
echo "</table>";


$sql = "insert  into `employees`(`employeeNumber`,`lastName`,`firstName`,`extension`,`email`,`officeCode`,`reportsTo`,`jobTitle`) values (".($maxNumber+1).",'Nuevo','Nuevo','x5800','dmurphy@classicmodelcars.com','1',NULL,'President')";


if ($conn->query($sql) ) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
