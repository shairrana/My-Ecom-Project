<?php
include("./com/connection.php");
if (isset($_GET['home'])) {
    $getProduct = $conn->prepare("SELECT * FROM productdetails");
    $getProduct->execute();
    $result = $getProduct->fetchAll();
} else if (isset($_GET['categoryId'])) {
    $getProduct = $conn->prepare("SELECT * FROM productdetails WHERE CategoryId
    ='$categoryidGet'");
    $getProduct->execute();
    $result = $getProduct->fetchAll();
} else if (isset($_GET['latestProduct'])) {
    $getProduct = $conn->prepare("SELECT * FROM productdetails order by productId desc");
    $getProduct->execute();
    $result = $getProduct->fetchAll();
} else if (isset($_GET['add-post'])) {
    $getProduct = $conn->prepare("SELECT * FROM productdetails");
    $getProduct->execute();
    $result = $getProduct->fetchAll();
}else  if (isset($_GET['cartNav'])) {
    $getUserCartData = $conn->prepare("SELECT * FROM usercartdata ");
    $getUserCartData->execute();
    $result = $getUserCartData->fetchAll();
}
else  if (isset($_GET['removeCart'])) {
    $getUserCartData = $conn->prepare("DELETE FROM usercartdata WHERE productId='$CardRemoveId'");
    $getUserCartData->execute();
    $rowCount = $getUserCartData->rowCount();
    header("Location: //localhost/test//ecomWeb/?cartNav=true");
}
 else if (isset($_GET['search'])) {
    $searchdata = $conn->prepare("SELECT * FROM productdetails WHERE `Pname` LIKE '%$search%'");
    $searchdata->execute();
    $result = $searchdata->fetchAll();
}
