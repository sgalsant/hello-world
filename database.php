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

$sql = 'SELECT firstName, jobTitle FROM employees ORDER BY firstName';

echo "<table border='1'>";
echo "<tr><th>first name</th><th>job title</th></tr>";
foreach ($conn->query($sql) as $row) {
    echo "<tr><td>" . $row['firstName'] . "</td><td>" . $row['jobTitle'] . "</td></tr>";
}
echo "</table>";
