<?php
//  session_start();
 $logid=$_SESSION["log_id"];
 $nm=$_SESSION["name"];
// $snm=$_SESSION["Sname"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
    <style>
    *{
        font-family: 'Montserrat';
        font-weight: bold;
        
    }
    a.active{
  background-color: #4bb1df;
  color: white;
  /* color: #4bb1df; */
}


    </style>
<body>
<?php $activePage = basename($_SERVER['PHP_SELF'], ".php"); ?>
    
    
    <!-- <h4 style="text-align: center; margin: 10px 0px;">Welcome,<?=$nm ?>! </h4> -->
    <h4 style="text-align: center; margin: 10px 0px;">Manage your shop  </h4>
    
    <!-- <h5 class="indlink"><i class="fa-solid fa-list-check"></i><a href="#">Product Management</a></h5>
    <i class=""></i><a href="setmenulist.php">Setup MenuList</a><br>
    <i class=""></i><a href="addproduct.php">Add product as MenuList</a> -->
    <h5 class="indlink"><i class="fa-solid fa-list-check"></i><a class=" <?= ($activePage == 'setmenulist') ? 'active':''; ?>" href="setmenulist.php">Set Category</a></h5>
    <h5 class="indlink"><i class="fa-solid fa-plus-minus"></i><a class=" <?= ($activePage == 'addproduct') ? 'active':''; ?>" href="addproduct.php">Add Product</a></h5>
 
    <!-- <h5 class="indlink"><i class="fa-solid fa-list-check"></i><a href="productmanage.php">Product Management</a></h5> -->
    <h5 class="indlink"><i class="fa-solid fa-binoculars"></i><a class=" <?= ($activePage == 'storefront') ? 'active':''; ?>" href="storefront.php">Store Front</a></h5>
    <h5 class="indlink"><i class="fa-solid fa-file-invoice"></i><a class=" <?= ($activePage == 'ordermanage') ? 'active':''; ?>" href="ordermanage.php">Order Management</a></h5>
    <h5 class="indlink"><i class="fa fa-list-alt" aria-hidden="true"></i><a class=" <?= ($activePage == 'reposum') ? 'active':''; ?>" href="reposum.php">Report & Summary</a></h5>
    <!-- <h5 class="indlink"><i class="fa-solid fa-truck-ramp-box"></i><a class="btn <?= ($activePage == 'ordermanage') ? 'active':''; ?>" href="">Integration Choice</a></h5> -->
    <!-- <h5 class="indlink"><i class="fa-solid fa-handshake-angle"></i><a class="btn <?= ($activePage == 'help') ? 'active':''; ?>"href="help.php">Help & Support</a></h5> -->
    <!-- <h5 class="indlink"><i class="fa-solid fa-share-nodes"></i><a class="btn <?= ($activePage == ' ') ? 'active':''; ?>" href="">Promote us</a></h5> -->
</body>
</html>
