<!-- to change the status as dispatched but currently not using  -->

<?php
    include('conn.php');
    $conn2 = mysqli_connect('localhost', 'root', '', 'customer', 3308);
    
    $orderid = $_GET['orderid'];

    // $sqlquery1 = "INSERT INTO `orders`(`orderid`, `productid`, `productname`, `productprice`, `productoffer`, `mermail`, `usermail`) VALUES ('$orderid', '$productid', '$productname', '$productprice', '$productoffer', '$mermail', '$usermail')";
    // $run1 = mysqli_query($conn, $sqlquery1);

    $sqlquery2 = "UPDATE `orders` SET `status`='dispatched' WHERE `orderid`=$orderid";
    $run2 = mysqli_query($conn, $sqlquery2);

    header("Location: adminordermanage.php");

?>