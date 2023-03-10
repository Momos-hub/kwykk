<?php
// session_start();
// $nm=$_SESSION["name"];
$logid=$_SESSION["log_id"];
// $sname=$_SESSION["S_name"];
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
    font-size: 15px;

}

i{
        font-size:16px;
    }

.btn {
  cursor : pointer
}
a.active{
  background-color: #4bb1df;
  color: white;
  /* color: #4bb1df; */
}</style>
<body>
<?php $activePage = basename($_SERVER['PHP_SELF'], ".php"); ?>
    
    
    <!-- <h4 style="text-align: center; margin: 0px 0px;">Welcome, <?=$nm?>! </h4> -->
    <h4 style="text-align: center; margin: 5px 0px;">Manage your shop  </h4>
    
    
    <h5 class="indlink"><i class="fa-solid fa-store"></i><a class="btn <?= ($activePage == 'setstore') ? 'active':''; ?>" href="setstore.php">Store Details</a></h5>
    <h5 class="indlink"><i class="fa-solid fa-file-arrow-up"></i><a class="btn <?= ($activePage == 'uploaddoc') ? 'active':''; ?>" href="uploaddoc.php">Upload Documents</a></h5>
    
    <h5 class="indlink"><i class="fa-solid fa-bank"></i><a class="btn <?= ($activePage == 'bankdetail') ? 'active':''; ?>" href="bankdetail.php">Bank Details</a></h5>
    <h5 class="indlink"><i class="fa-solid fa-address-book"></i><a class="btn <?= ($activePage == 'contactdetails') ? 'active':''; ?>" href="contactdetails.php">Contact Details</a></h5>
    <h5 class="indlink"><i class="fa-solid fa-clock"></i><a class="btn <?= ($activePage == 'shopconfig') ? 'active':''; ?>" href="shopconfig.php">Shop Timings</a></h5>
    <h5 class="indlink"><i class="fa-solid fa-shop"></i><a class="btn <?= ($activePage == 'ordermanage') ? 'active':''; ?>" href="setmenulist.php">Shop Details</a></h5>



</body>
</html>