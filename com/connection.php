<?php
$host = "localhost";
$hostName = "root";
$hostPassword = null;
$dbName = "mystore";

$conn = new PDO("mysql:host=$host;dbname=$dbName", $hostName, $hostPassword);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
