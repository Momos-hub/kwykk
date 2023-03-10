<?php
// session_start();
$nm=$_SESSION["name"];
$logid=$_SESSION["log_id"];
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
        i{
            font-size:16px;
        }
        .h5{
            border-bottom: 1px solid rgba(0,0,0,.5);
        }
        a.active{
            background-color: #4bb1df;
            color: white;
            /* color: #4BB1DF; */
        }
    </style>
<body>
<?php $activePage = basename($_SERVER['PHP_SELF'], ".php"); ?>

    <h4 style="text-align: center; margin: 5px 0px;">Manage</h4>
    
    
    <h5 class="indlink"><i class="fa-solid fa-plus-minus"></i><a class="btn <?= ($activePage == 'ordermanage_admin') ? 'active':''; ?>" href="ordermanage_admin.php">Orders</a></h5>
 
    <h5 class="indlink"><i class="fa fa-shopping-cart"></i><a class="btn <?= ($activePage == 'stores') ? 'active':''; ?>" href="stores.php">Stores</a></h5>
        
    <h5 class="indlink"><i class="fa fa-user" aria-hidden="true"></i><a class="btn <?= ($activePage == 'customer_admin') ? 'active':''; ?>" href="customer_admin.php">Customers</a></h5>
    <h5 class="indlink"><i class="fa-solid fa-chart-simple"></i><a class="btn <?= ($activePage == 'ordermanage') ? 'active':''; ?>" href="ordermanage.php">Analytics and report</a></h5>
     

</body>
</html>


