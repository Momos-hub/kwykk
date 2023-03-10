<?php
// session_start();
$nm=$_SESSION["name"];
$logid=$_SESSION["log_id"];
// $sname=$_SESSION["S_name"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">

    <title>Document</title>
</head>
    <style>

    
    a.active{
        background-color: #4bb1df;
        color: white;
        /* color: #4BB1DF; */
    }
    i{
        font-size:16px;
    }
    .h5{
        border-bottom: 1px solid rgba(0,0,0,.5);
    }

    *{
    font-family: 'Montserrat';
    }
    </style>
<body>
<?php $activePage = basename($_SERVER['PHP_SELF'], ".php"); ?>

    <!-- <h4 style="text-align: center; margin: 0px 0px;">Welcome, <?=$nm?>! </h4> -->
    <h4 class="indlink" style="text-align: center; margin: 5px 0px;font-family: 'Montserrat';">Manage your shop</h4>
    
    
    <!-- <h5 class="indlink"><i class="fa-solid fa-store"></i><a href="tempstore.php">Store Details</a></h5> -->
    <!-- <h5 class="indlink"><i class="fa-solid fa-file-arrow-up"></i><a href="uploaddoc.php">Upload Documents</a></h5> -->
    
    
    <h5 class="indlink"><i class="fa-solid fa-list-check"></i><a class="btn <?= ($activePage == 'setmenulist') ? 'active':''; ?>" href="setmenulist.php">Set Category</a></h5>
     
    <h5 class="indlink"><i class="fa-solid fa-plus-minus"></i><a class="btn <?= ($activePage == 'productmgt') ? 'active':''; ?>" href="productmgt.php">Manage Product</a></h5>
     
    <h5 class="indlink"><i class="fa-solid fa-binoculars"></i><a class="btn <?= ($activePage == 'storefront') ? 'active':''; ?>" href="storefront.php">Store Front</a></h5>
    <!-- <h5 class="indlink"><i class="fa-solid fa-clock"></i><a class="btn <?= ($activePage == 'shopconfig') ? 'active':''; ?>" href="shopconfig.php">Shop Timings</a></h5> -->
    
    <h5 class="indlink"><i class="fa-solid fa-plus-minus"></i><a class="btn <?= ($activePage == 'ordermanage') ? 'active':''; ?>" href="ordermanage.php">Order Management</a></h5>
     
    <h5 class="indlink"><i class="fa fa-list-alt" aria-hidden="true"></i><a class="btn <?= ($activePage == 'reposum') ? 'active':''; ?>" href="reposum.php">Report & Summary</a></h5>
    <h5 class="indlink"><i class="fa-regular fa-pen-to-square"></i><a class="btn <?= ($activePage == 'setstore') ? 'active':''; ?>" href="setstore.php">Edit Account</a></h5>
     

<!-- <h5 class="indlink"><i class="fa-solid fa-truck-ramp-box"></i><a href="">Integration Choice</a></h5>
<h5 class="indlink"><i class="fa-solid fa-handshake-angle"></i><a href="help.php">Help & Support</a></h5>
<h5 class="indlink"><i class="fa-solid fa-share-nodes"></i><a href="">Promote us</a></h5> -->

</body>
</html>


