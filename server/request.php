<?php
session_start();
include("../com/connection.php");
if (isset($_POST['signUp'])) {
    $name = $_POST['SName'];
    $email = $_POST['Semail'];
    $phone = $_POST['Sphone'];
    $password = $_POST['Spassword'];

    $checkEmail = $conn->prepare("SELECT * FROM userdata WHERE email='$email'");
    $checkEmail->execute();
    if ($checkEmail->rowCount() == 0) {
        $setData = $conn->prepare("
        INSERT INTO userdata (`name`,`email`,`phone`,`password`)
        VALUE ('$name','$email','$phone','$password');
        ");
        $result = $setData->execute();
        if ($result) {
            $id = $conn->lastInsertId();
            $_SESSION['user'] = ["userId" => $id, "userName" => $name, "userEmail" => $email];
            echo "<script>
            alert('Sign Up SuccessFully');
            </script>";
            header("Location: //localhost/test/ecomWeb/?login=true");
        } else {
            echo "<script>alert('Login Filed');</script>";
        }
    } else {
        echo "<script>alert('Email Already Submit');</script>";
        include("../client/signUp.php/?signUp=true");
    }
} else if (isset($_POST['login'])) {
    $Lemail = $_POST['Lemail'];
    $Lpassword = $_POST['Lpassword'];
    $checkEmail = $conn->prepare("SELECT * FROM userdata WHERE email='$Lemail'");
    $checkEmail->execute();
    $checkPassword = $conn->prepare("SELECT * FROM userdata WHERE password='$Lpassword'");
    $checkPassword->execute();
    $checkEmail->rowCount();
    $checkPassword->rowCount();
    if ($checkEmail->rowCount() <= 0) {
        echo "<script>alert('Email is Not Valid')</script>";
    } else if ($checkPassword->rowCount() <= 0) {
        echo "<script>alert('Password is Not Valid')</script>";
    } else {
        foreach ($checkEmail as $data) {
            $name = $data['name'];
            $id = $data['id'];
        }
        $_SESSION['user'] = ["userId" => $id, "userName" => $name, "userEmail" => $Lpassword];
        echo "<script>alert('Login Success Full')</script>";
        header("Location: //localhost/test/ecomWeb/?home=true");
    }
} else if (isset($_POST['upload'])) {
    $pName = $_POST['productName'];
    $pPrice = $_POST['productPrice'];
    $pImageTemp = $_FILES['productImg']['tmp_name'];
    $pImage = $_FILES['productImg']['name'];
    $pCategory = $_POST['categorys'];

    $img_des = "../server/images/" . $pImage;
    move_uploaded_file($pImageTemp, $img_des);

    $setProduct = $conn->prepare("INSERT INTO productdetails (`Pname`, `Pprice`, `Pimage`, `CategoryId`)
    VALUES (' $pName','$pPrice','$img_des','$pCategory');
    ");
    if ($setProduct->execute()) {
        header("Location: //localhost/test/ecomWeb/?add-post=true");
    }
} else if (isset($_POST['delete-btn'])) {
    $getHiddenValue = $_POST['hiddenValue'];
    $productIdGet = $conn->prepare("DELETE FROM `productdetails` WHERE productId='$getHiddenValue'");
    if ($productIdGet->execute()) {
        header("Location: //localhost/test/ecomWeb/?add-post=true");
    }
} else if (isset($_POST['userDelete'])) {
    $userId = $_POST['userId'];
    $userDelete = $conn->prepare("DELETE FROM `userdata` WHERE id='$userId'");
    if ($userDelete->execute()) {
        echo "<script>alert('user Delete')</script>";
        header("Location: //localhost/test/ecomWeb/?user=true");
    }
}
