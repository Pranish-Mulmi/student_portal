<?php
// $host = "localhost";
// $user = "root";
// $password = "";
// $db   = "herald_db";

$host="localhost";
$user="np03cs4a240016";
$password="sleTYUajQY";
$db="np03cs4a240016";

try {
    $conn = new PDO("mysql:host=$host;dbname=$db", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>