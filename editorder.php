<!-- This page contains the form to update order from admin side  -->

<?php
// to include navbar of admin dashboard 
include('navadmin.php');

// make connections 
$conn1 = new mysqli('localhost', 'root', '', 'customer', 3308);
$conn2 = new mysqli('localhost', 'root', '', 'tempo', 3308);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KWYK | Edit Order</title>
    <link rel="stylesheet" href="uploaddoc.css">
    <link rel="stylesheet" href="https://www.w3schools.com/html/styles.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>

<style>
    .ipes{
        padding: 5px;
    }
</style>
<body style="background-color: white;">
    <div class="row">
		<div class="index bg-dark col-md-3">
			<?php
                // to add sidebar of admin dashboard
                include('admin.php');
            ?>
		</div>

        <div class="space1 col-md-9">
            <div class="upl1 col-md-9">
            <h2 style="text-align: center;"><b>Edit Order</b></h2>
            <?php 
                // to get orderid 
                $orderid = $_GET['orderid'];
                // to select the order 
                $sql1 = "SELECT *FROM `orders` WHERE `orderid`=$orderid";
                $run1 = mysqli_query($conn2, $sql1);

                while($row = mysqli_fetch_array($run1)){
            ?>

            <!-- form to take new values and show old values  -->
            <!-- old values are displaying using 'value' in input tag  -->
            <form class="row" action="" method="post">
                <fieldset style="border: none;">
                    Order ID: <br>
                    <input class="col-md-12 ipes" type="number" size="30" name="orderid" value=<?php $orderid = $_GET['orderid']; echo $orderid ?>  disabled />
                    <br><br>
                    Product ID: <br>
                    <input class="col-md-12 ipes" type="text" size="30" name="productid" value=<?php echo $row['productid'] ?> disabled />
                    <br><br>
                    Product Name: <br>
                    <input class="col-md-12 ipes" type="text" name="productname" value=<?php echo $row['productname'] ?> disabled/>
                    <br><br>
                    Quantity: <br>
                    <input class="col-md-12 ipes" type="text" name="quantity" value=<?php echo $row['quantity'] ?> disabled/>
                    <br><br>
                    Product Price: <br>
                    <input class="col-md-12 ipes" type="text" name="productprice" value=<?php echo $row['productprice'] ?> disabled/>
                    <br><br>
                    Product Offer Price: <br>
                    <input class="col-md-12 ipes" type="text" name="productoffer" value=<?php echo $row['productoffer'] ?> disabled/>
                    <br><br>
                    Merchant Mail: <br>
                    <input class="col-md-12 ipes" type="text" name="mermail" value=<?php echo $row['mermail'] ?> disabled/>
                    <br><br>
                    User Mail: <br>
                    <input class="col-md-12 ipes" type="text" name="usermail" value=<?php echo $row['usermail'] ?> disabled/>
                    <br><br>
                    Status: <br>
                    <input type="submit" value="accept" name="accept" class="btn btn-primary">
                    <input type="submit" value="preparing" name="preparing" class="btn btn-primary">
                    <input type="submit" value="dispatched" name="dispatched" class="btn btn-primary">
                    <input type="submit" value="delievered" name="delievered" class="btn btn-primary">
                    <input type="submit" value="reject" name="reject" class="btn btn-primary">
                </fieldset>
            </form>

            <?php 
                }
                // if want to change as accept 
                if(isset($_POST['accept'])){         
                    $sql1 = "UPDATE `orders` SET `status`='accept'  WHERE `orderid`='$orderid'";
                    $run1 = mysqli_query($conn2, $sql1);
                    if($run1){
                        ?>  <script>
                                alert("Order Details UPDATED SUCCESSFULLY");                        
                                location.replace("http://localhost/kwykpr/ordermanagementadmin.php");
                            </script>
                        <?php
                    }
                }
                // if want to change as preparing
                if(isset($_POST['preparing'])){         
                    $sql1 = "UPDATE `orders` SET `status`='preparing'  WHERE `orderid`='$orderid'";
                    $run1 = mysqli_query($conn2, $sql1);
                    if($run1){
                        ?>  <script>
                                alert("Order Details UPDATED SUCCESSFULLY");                        
                                location.replace("http://localhost/kwykpr/adminordermanagement.php");
                            </script>
                        <?php
                    }
                }
                // if want to change as dispatched
                if(isset($_POST['dispatched'])){         
                    $sql1 = "UPDATE `orders` SET `status`='dispatched'  WHERE `orderid`='$orderid'";
                    $run1 = mysqli_query($conn2, $sql1);
                    if($run1){
                        ?>  <script>
                                alert("Order Details UPDATED SUCCESSFULLY");                        
                                location.replace("http://localhost/kwykpr/adminordermanagement.php");
                            </script>
                        <?php
                    }
                }
                // if want to change as delivered
                if(isset($_POST['delievered'])){         
                    $sql1 = "UPDATE `orders` SET `status`='delievered'  WHERE `orderid`='$orderid'";
                    $run1 = mysqli_query($conn2, $sql1);
                    if($run1){
                        ?>  <script>
                                alert("Order Details UPDATED SUCCESSFULLY");                        
                                location.replace("http://localhost/kwykpr/adminordermanagement.php");
                            </script>
                        <?php
                    }
                }
                // if want to change as rejected
                if(isset($_POST['reject'])){         
                    $sql1 = "UPDATE `orders` SET `status`='rejected'  WHERE `orderid`='$orderid'";
                    $run1 = mysqli_query($conn2, $sql1);
                    if($run1){
                        ?>  <script>
                                alert("Order Details UPDATED SUCCESSFULLY");                        
                                location.replace("http://localhost/kwykpr/adminordermanagement.php");
                            </script>
                        <?php
                    }
                }
            ?>
            </div>
        </div>
		
	</div>   
</body>
</html> 