<!-- To change the shop details from admin side  -->

<?php
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
                // include sidebar of admin dashboard 
                include('admin.php');
            ?>
		</div>

        <div class="space1 col-md-9">
            <div class="upl1 col-md-9">
                <?php
                    // to get email id  
                    $Mail = $_GET['Email'];

                    // to select the shop details 
                    $sql1 = "SELECT *FROM `shopinfo` WHERE `Email` = '$Mail'";
                    $run1 = mysqli_query($conn2, $sql1);

                    while($row = mysqli_fetch_array($run1)){
                ?>

                <!-- form to enterb new values and also shows old entered -->
                <!-- old values are displaying using 'value' in input tag  -->
                <form class="row" action="" method="post">
                    <fieldset>
                
                        <h3 style="text-align: center;"><b>SHOP EDIT FORM</b></h3><br>
                        Mail: <br>
                        <input class="col-md-12 ipes" type="number" size="30" name="Email" placeholder=<?php echo $Mail ?> disabled/>
                        <br><br>
                        License No: <br>
                        <input class="col-md-12 ipes" type="text" size="30" name="licenseno" value=<?php echo $row['shoplicenseno'] ?> disabled/>
                        <br><br>
                        Shop Name: <br>
                        <input class="col-md-12 ipes" type="text" name="shopname" value=<?php echo $row['shopname'] ?> required />
                        <br><br>
                        Shop No: <br>
                        <input class="col-md-12 ipes" type="text" name="shopno" value=<?php echo $row['shopno'] ?> required/>
                        <br><br>
                        Landmark: <br>
                        <input class="col-md-12 ipes" type="text" name="shoplandm" value=<?php echo $row['shoplandm'] ?> required/>
                        <br><br>
                        Area: <br>
                        <input class="col-md-12 ipes" type="text" name="shoparea" value=<?php echo $row['shoparea'] ?> required/>
                        <br><br>
                        Pincode: <br>
                        <input class="col-md-12 ipes" type="text" name="shoppincode" value=<?php echo $row['shoppincode'] ?> required/>
                        <br><br>
                        Link: <br>
                        <input class="col-md-12 ipes" type="text" name="link" value=<?php echo $row['link'] ?> required/>
                        <br><br>
                        <input class="btn btn-primary" type="submit" value="Update" name="update" />
                    </fieldset>
                </form>

                <?php 
                    }
                    // if pressed update 
                    if(isset($_POST['update'])){
                        // to get email id 
                        $Email = $_GET['Email'];

                        // to post new details 
                        $shopname = $_POST['shopname'];
                        $shopno = $_POST['shopno'];
                        $shoplandm = $_POST['shoplandm'];
                        $shoparea = $_POST['shoparea'];
                        $shoppincode = $_POST['shoppincode'];
                        $link = $_POST['link'];

                        // query to update details 
                        $sql1 = "UPDATE `shopinfo` SET `shopname`='$shopname', `shopno`='$shopno', `shoplandm`='$shoplandm', `shoparea`='$shoparea', `shoppincode`='$shoppincode', `link`='$link' WHERE `Email`='$Email'";
                        $run1 = mysqli_query($conn2, $sql1);

                        // if updated successfully 
                        if($run1){
                            ?>
                                <script>
                                    alert("Shop Details UPDATED SUCCESSFULLY");
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