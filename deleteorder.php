<!-- This the backend code to delete the order  -->

<?php
// to connect the database
    include('conn.php');
    // to get the order id which we want to delete 
    $orderid = $_GET['orderid'];

    // delete query to delete order using order id 
    $sql = "DELETE FROM `orders` WHERE `orderid`='$orderid'";
    $run = mysqli_query($conn, $sql);

    // if order gets deleted 
    if($run){
        ?>
        <script>alert("Order deleted successfully");</script>
        <?php
    }else{
        ?>
        <script>alert("Failed to delete order")</script>
        <?php
    }
?>

<script>
    // to change the location 
    location.replace("http://localhost/kwykpr/adminordermanagement.php");
</script>