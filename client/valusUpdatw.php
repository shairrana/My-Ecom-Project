<?php
include("./com/connection.php");
$updateValue = $conn->prepare("SELECT * FROM productdetails WHERE productId='$UpdateId'");
$updateValue->execute();
$result = $updateValue->fetchAll();
if ($result) {
    foreach ($result as $res) {
        $NnameP = $res['Pname'];
        $NpriseP = $res['Pprice'];
        $NimageP = $res['Pimage'];
        $NcategoryP = $res['CategoryId'];
    }
}
