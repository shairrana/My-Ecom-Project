<?php
include("./com/connection.php");
$getCategory = $conn->prepare("SELECT * FROM category");
$getCategory->execute();
$result = $getCategory->fetchAll();
