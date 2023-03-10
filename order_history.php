<?php
// session_start();
include('conn.php');
include('cart.php');
$logid=$_SESSION["log_id"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/9e5fee4591.js" crossorigin="anonymous"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>

    <link rel="stylesheet" href="shoppage.css">
    <link rel="stylesheet" href="order_history.css">
</head>
<style>
    *{
        font-family: 'Montserrat';
    }
      .swal-text {
  /* border: 1px solid #F0E1A1; */
  display: block;
  margin: 22px;
  text-align: center;
  color: #001428;
}
.swal-button {

  border-radius: 2px;
  background-color: #4BB1DF;
  border: 1px solid #4BB1DF;
  /* text-shadow: 0px -1px 0px rgba(0, 0, 0, 0.3); */
}
.swal-footer{
    text-align:center;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: fixed;
  background-color: #f9f9f9;
  min-width: 50px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 9999;
}


.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
  display: block;
}
</style>
<body style="background-color: #f3f3f3; margin:0;">
    <div id="navbar">
        <ul>
            <li class="nav-item"><i class="fa-solid fa-angle-left"></i><a style="margin:0;padding:0;" href="shoppage.php"></a></li>
            <li><img src="kwyklogo.webp" alt="Kwyk logo" style="text-decoration: none;height: 50px;align-items: center;"></li>
            <!-- <?php echo '<img class="shop-logo" src="data:image;base64,'.base64_encode($row['Shoplogo']).' " alt="">';?> -->
            <!-- <li class="nav-item"><?php echo' <img class="navlogo" src="data:image;base64,'.base64_encode($row['Shoplogo']).' " alt="">';?></li> -->
        <?php
        $logid=$_SESSION["log_id"];
        if(isset($logid) &&!empty($logid)){
        ?>
        <span class="nav-item" style="float:right"><div class="dropdown">
            <i class="fa-regular fa-user"></i><a class="navitem" href="#"><?php echo $_SESSION["name"];?></a>
            <div class="dropdown-content">
                <form method="post">
                    <button class="logout" style="width:90px; border: none;text-align: center;text-decoration: none;cursor: pointer;background-color: #f1f1f1;color: black;" type="submit" name="signout">Logout</button>
                </form>
                <!-- <a href="order_history.php">Orders</a> -->
            </div>
            </div>
        </span>
        <?php
        }
        else{
        ?>
        <span class="nav-item" style="float:right"><i class="fa-regular fa-user"></i><a class="navitem" data-toggle="modal" data-target="#myModal" href="">Login</a></span>
        <?php
        }
        ?><!-- <span class="nav-item" style="float:right"><i class="fa-solid fa-cart-shopping"></i><a class="navitem" href="#">Cart</a></span> -->
        <!-- <span class="nav-item" style="float:right"><i class="fa-solid fa-magnifying-glass"></i><a class="navitem" href="#">Search</a></span> -->
    </ul>
</div>
<div class="main-c row" style="height: auto;min-height: calc(100vh - 180px);padding-bottom: 20px;">
    <div class="container">
        <div class="col-xs-12">
            <div class="col-xs-7">
                <div class="heading" style="float:right;">
                    <p class="title text-capitalize">Orders</p>
                    <hr style="border-top-color: rgb(75, 177, 223);margin: 0 auto;width: 50px;">
                </div>
            </div>
            <div class="col-xs-5" style="padding: 0;">
                <div class="heading" style="display: flex;float: right;">
                    <form action="order_history.php" method="post">
                        <input class="search-input-bar search-input" name="order" style="min-width: 246px; border-radius: 5px; border: 1px solid rgb(229, 229, 229); padding: 5px; direction: ltr;"placeholder="Orders Id">
                        <i class="fa fa-search" style="position: relative;right: 28px;"></i>
                        <input type="submit" hidden>
                    </form>
                    <a href="order_history.php"><i class="fa-solid fa-rotate-right"></i></a>
                    <span>
                        <div>
                            <select class="chk-input selectbox" placeholder="Select" style="padding: 3px 5px 5px 5px;border: 1px solid #e5e5e5;border-radius: 5px;">
                                <option class="ng-tns-c57-14" selected="" value="0">All</option>
                                <option class="ng-tns-c57-14" >Confirmed</option>
                                <option class="ng-tns-c57-14" >Ordered</option>
                                <option class="ng-tns-c57-14" >Dispatched</option>
                                <option class="ng-tns-c57-14" >Delivered</option>
                                <option class="ng-tns-c57-14" >Cancelled</option>
                                <option class="ng-tns-c57-14" >Rejected</option>
                            </select>
                        </div>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="container Order center-c d" style="background-color:white;overflow: scroll;height: 500px;">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#Order Id</th>
                <th scope="col">Status</th>
                <th scope="col">Store Name</th>
                <th scope="col">Order Time</th>
                <th scope="col">Amount</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
                <?php
            if(isset($_POST['order'])) {
                      $searchString = mysqli_real_escape_string($conn, ($_POST['order']));
                      if ($searchString === "" || $searchString < 3) {
                        // echo "Invalid search string";
                      ?>
                          <script>
                             swal({
                                icon:"warning",
                                title:"Invalid"})
                            .then((value) => {
                                swal(location.replace("http://localhost/kwykpr/admin/customer_admin.php"));
                            });
                          </script>;
                      <?php    // exit();
                      }
                      $searchString = "%$searchString%";
                      $sql = "SELECT * FROM `orders` WHERE `log_id` = $logid AND `order_id` LIKE ?";
               
                      $prepared_stmt = $conn->prepare($sql);
                      $prepared_stmt->bind_param('s', $searchString);
                      $prepared_stmt->execute();
                      $result = $prepared_stmt->get_result();
              
                      if ($result->num_rows === 0) {
                        ?>
                        <script>
                           swal({
                                icon:"warning",
                                title:"Not Record Found"})
                            .then((value) => {
                                swal(location.replace("http://localhost/kwykpr/admin/customer_admin.php"));
                            });
                        </script>
                        <?php
                          exit();
              
                      } else {
                          // Process the result(s)
                          while ($row_order = $result->fetch_assoc()) {
                            $cust_log_id=$row_order['log_id'];
                            $status=$row_order['order_status'];
                            $shopid=$row_order['shop_id'];
                        ?>
                         <tr>
                <td scope="row" > 
                    <a style="color:#4bb1df; font-weight:bold;" href="http://localhost/kwykpr/order.php?id=<?= $row_order['order_id'];?>"onclick="centeredPopup(this.href,'myWindow','800','500','yes');return false">
                    <?php echo $row_order['order_id']; ?> 
                    </a>
                </td>
                <td scope="row"><?php echo $row_order['order_status'];?></td>
                <?php 
                $shop ="SELECT * FROM `shop` WHERE `shop_id` =$shopid";
                    $result = mysqli_query($conn,$shop);
                    while($row=mysqli_fetch_assoc($result)){
                        
                ?>
                <td scope="row"><?php echo $row['Sname'];?></td>
                <?php } ?>
                <td scope="row"><?php echo $row_order['order_date'];?></td>
                <td scope="row"><?php echo $row_order['total_amount'];?></td>
                <td scope="row"> 
                
                </td>
            </tr>
                        <?php
                            // echo $order;
                          }}
                        }else{          
            $query_order = "SELECT * FROM `orders`WHERE `log_id` = $logid ORDER BY order_id DESC";
            $result_order =  mysqli_query($conn, $query_order);
            while($row_order = mysqli_fetch_assoc($result_order)){
                    $cust_log_id=$row_order['log_id'];
                    $shopid=$row_order['shop_id'];
                    $status=$row_order['order_status'];
                ?>
              <tr>
                <td scope="row" > 
                    <a style="color:#4bb1df; font-weight:bold;" href="http://localhost/kwykpr/order.php?id=<?= $row_order['order_id'];?>"onclick="centeredPopup(this.href,'myWindow','800','500','yes');return false">
                    <?php echo $row_order['order_id']; ?> 
                    </a>
                </td>
                <td scope="row"><?php echo $row_order['order_status'];?></td>
                <?php 
                $shop ="SELECT * FROM `shop` WHERE `shop_id` =$shopid";
                    $result = mysqli_query($conn,$shop);
                    while($row=mysqli_fetch_assoc($result)){
                ?>
                <td scope="row"><?php echo $row['Sname'];?></td>
                <?php } ?>
                <td scope="row"><?php echo $row_order['order_date'];?></td>
                <td scope="row"><?php echo $row_order['total_amount'];?></td>
                <td scope="row"> 
                
                </td>
            </tr>
            <?php
            } 
        }
            ?>
        </tbody>
    </table>
    </div>        
</div>
<div id="footer">
    <footer class="footer">
    <?php
        $sql = "SELECT * FROM `shop`where shop_id =$shopid";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_array($result)){
    ?>
        <div class="footer-left">
                <?php echo '<img class="footer-img" src="data:image;base64,'.base64_encode($row['Shoplogo']).' " alt="">';?>
            <div class="follow">Follow us on 
                <a href="#" class="fa fa-facebook"></a>
                <a href="#" class="fa fa-instagram"></a>
                <a href="#" class="fa fa-twitter"></a>
            </div>
        </div>
        <div class="footer-center">
            <h3>About US</h3>
            <p><?php echo $row['aboutus'] ?></p>
        </div>
        <div class="footer-right">
            <h3>CONTACT US</h3>
            <p><i class="fa-brands fa-whatsapp"></i><?php echo $row['S_Contact']; ?></p>
            <p><i class="fa-solid fa-envelope-open"></i><?php echo $row['semail'];?></p>
            <p><i class="fa-solid fa-store"></i><?php echo $row['Shopaddr']; ?></p>
        </div>
        
        <hr style="border-top: 1px solid whitesmoke">
        <div class="footer-bottom">
            <div style="text-align: left;">
                <center >Copyright © <?php echo $row['Sname']?>. All Right Reserved</center>
            </div>
            <div style="text-align: right;">
                <a style="color: aliceblue;" href="https://www.kwyk.one/en/">Powered by:<b style="color: aqua;">KWYK</b></a>

            </div>
        </div>
        <?php
        }
        ?>
    </footer>
</div>
<script language="javascript">
var popupWindow = null;
function centeredPopup(url,winName,w,h,scroll){
LeftPosition = (screen.width) ? (screen.width-w)/2 : 0;
TopPosition = (screen.height) ? (screen.height-h)/2 : 0;
settings =
'height='+h+',width='+w+',top='+TopPosition+',left='+LeftPosition+',scrollbars='+scroll+',resizable'
popupWindow = window.open(url,winName,settings)
}
</script>
</body>
</html>