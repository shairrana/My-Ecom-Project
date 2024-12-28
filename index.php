<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mystore</title>
    <?php include("./com/comm.php") ?>
</head>

<body>
    <?php
    session_start();
    if (isset($_GET['signUp']) && !isset($_SESSION['user']['userName']) && !isset($_SESSION['user']['userEmail'])) {
        include("./client/signUp.php");
    } else if (isset($_GET['login']) && !isset($_SESSION['user']['userName']) && !isset($_SESSION['user']['userEmail'])) {
        include("./client/login.php");
    } else if (isset($_GET['loginOut'])) {
        echo "Yes i am Login Out";
        session_unset();
        session_destroy();
        header("Location: //localhost/test/ecomWeb/?home=true");
    } else if (isset($_GET['categoryId'])) {
        $categoryidGet = $_GET['categoryId'];
        include("./client/home.php");
    } else if (isset($_GET['user'])) {
        include("./client/showuser.php");
    } else if (isset($_GET['add-post'])) {
        include("./client/addPostandUser.php");
    } else if (isset($_GET['home'])) {
        include("./client/home.php");
    } else if (isset($_GET['latestProduct'])) {
        include("./client/home.php");
    } else if (isset($_GET['search'])) {
        $search = $_GET['search'];
        include("./client/home.php");
    }else if (isset($_GET['addCart'])) {
        if(!isset($_SESSION['user']['userName']) && !isset($_SESSION['user']['userEmail'])){
            include("./client/signUp.php");
        }else{
           $productId = $_GET['productId'];
           include("./client/addCart.php");
        }
    } else if (isset($_GET['cartNav'])) {
        include("./client/home.php");
    }
    else if (isset($_GET['removeCart'])) {
       echo $CardRemoveId = $_GET["productId"];
        include("./client/getProductDetails.php");
    }
    else  if (isset($_GET['update'])) {
        $UpdateId = $_GET['update'];
        include("./client/valusUpdatw.php");
    } else {
        header("Location: //localhost/test//ecomWeb/?home=true");
        // include("./client/header.php");
    }
    ?>
</body>

</html>