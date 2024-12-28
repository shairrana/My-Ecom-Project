<?php
include("./com/connection.php");
$userId = $_SESSION['user']['userId'];
$getCartData = $conn->prepare("SELECT * FROM productdetails WHERE productId='$userId'");
$getCartData->execute();
$result = $getCartData->fetchAll();
if($result){
    foreach($result as $res){
       $Pname = $res['Pname']; 
       $Pprice = $res['Pprice'];
       $Pimage = $res['Pimage'];
    }
    $setDataCart = $conn->prepare("INSERT INTO `usercartdata` (`Pname`, `Pprice`, `Pimage`, `UserId`)
    VALUES ('$Pname','$Pprice','$Pimage','$userId');
    ");
    $result = $setDataCart->execute();
   if($result){

    header("Location: //localhost/test//ecomWeb/?home=true");
   }else{
    echo "<script>alert('Product is Not Add Cart')</script>";
   }
}else{
    echo "hello";
}

?>