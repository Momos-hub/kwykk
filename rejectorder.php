<!-- This is to change status as reject but currently not using  -->

<?php
    include('conn.php');
    $conn2 = mysqli_connect('localhost', 'root', '', 'customer', 3308);
    
    $orderid = $_GET['orderid'];

    $sqlquery2 = "UPDATE `orders` SET `status`='reject' WHERE `orderid`=$orderid";
    $run2 = mysqli_query($conn, $sqlquery2);

    header("Location: adminordermanage.php");

?>