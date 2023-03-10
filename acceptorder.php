<?php
    include('conn.php');
    $conn2 = mysqli_connect('localhost', 'root', '', 'customer', 3308);
    
    $orderid = $_GET['orderid'];
    $productid = $_GET['productid'];
    $productname = $_GET['productname'];
    $productprice = $_GET['productprice'];
    $productoffer = $_GET['productoffer'];
    $mermail = $_GET['mermail'];
    $usermail = $_GET['usermail'];

    $sqlquery1 = "INSERT INTO `orders`(`orderid`, `productid`, `productname`, `productprice`, `productoffer`, `mermail`, `usermail`) VALUES ('$orderid', '$productid', '$productname', '$productprice', '$productoffer', '$mermail', '$usermail')";
    $run1 = mysqli_query($conn, $sqlquery1);

    $sqlquery2 = "UPDATE `orders` SET `status`='accept' WHERE `orderid`=$orderid";
    $run2 = mysqli_query($conn, $sqlquery2);

    $sqlquery3 = "DELETE FROM `buy` WHERE `orderid`=$orderid";
    $run3 = mysqli_query($conn2, $sqlquery3);

?>