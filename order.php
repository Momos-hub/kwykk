<?php
//session_start();
//include('conn.php');
// $sname=$_SESSION["Sname"];

// session_start();
// include('common.php');
include('conn.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="orderdetail.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>

    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/9e5fee4591.js" crossorigin="anonymous"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>
<style>
    *{
        font-family: 'Montserrat';
        font-size:15px;
    }
</style>
 
<body>
<?php
        if(isset($_GET["id"])){
          $orderid= ($_GET["id"]);
          $tax=0;
          $subtotal=0;
          $price=0;
          $orderproduct="SELECT * FROM `orders` WHERE `order_id` = $orderid";
          $result = mysqli_query($conn, $orderproduct);
          while($row = mysqli_fetch_array($result)){
            $status=$row['order_status'];
            $orderid=$row['order_id'];
        ?>
        <div class="modal-body">
        <div class="p" style="padding:0px";>
        <div class="bottom">
            <div class="d-flex">
                <h4 class="order-info d-flex flex-grow-1">
                    <div class="section">
                        #Order
                        <span><?php echo $row['order_id'];?></span>
                    </div>
                    <div class="order-amount">
                        <span>Total Amount:</span>
                        <span style="color:#4bb1df;"><?php echo $row['total_amount'];?></span>
                    </div>
                </h4> 
            </div>
            <div class="detail-cart" style="padding: 20px 20px 10px;">
                <p class="d-flex">
                    <span style="direction: ltr;">Bill Summary</span>
                    <span>
                    <?php
                if($status != 'Rejected'){
                ?>
                <div class="stepper-wrapper">
                    <div class="stepper-item completed">
                        <div class="step-counter"><i  class="fa-solid fa-check"></i></div>
                        <div class="step-name">Order Placed</div>
                    </div>
                    <div class="stepper-item  <?= ($status == 'Accepted' || $status == 'Dispatch' || $status == 'Delivered') ? 'completed':''; ?>">
                        <div class="step-counter"><i class="fa-solid fa-check"></i></div>
                        <div class="step-name">Accepted</div>
                    </div>
                    <div class="stepper-item  <?= ($status == 'Dispatch' || $status == 'Delivered') ? 'completed':''; ?>">
                        <div class="step-counter"><i class="fa-solid fa-check"></i></div>
                        <div class="step-name">Dispatched</div>
                    </div>
                    <div class="stepper-item  <?= ($status == 'Delivered') ? 'completed':''; ?>">
                        <div class="step-counter"><i class="fa-solid fa-check"></i></div>
                        <div class="step-name">Delivered</div>
                    </div>
                </div>
                <?php 
                }
                ?>
                    </span>
                    <!-- <span class="order-status">
                    <?php echo $row['order_status'];?>
                    </span> -->
                </p>
            </div>
            <div class="detail-container d-flex">
            <div class="bill-left" style="flex: 1;">
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-4 order-list-item" style="direction: ltr;">
                        <span class="od-title">
                        <?php echo $row['order_id'];?>
                        </span>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 order-list-item" style="direction: ltr;">
                        <span class="od-title">
                            Store Name
                        </span>
                        <span class="od-val">
                            ABC
                        </span>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 order-list-item" style="direction: ltr;">
                        <span class="od-title">
                            Payment Method
                        </span>
                        <?php
                         $query= mysqli_query($conn,"select * from bill where order_id = $row[order_id]");
                         while($rowss=mysqli_fetch_assoc($query)){
                          $query1= mysqli_query($conn,"select * from payment_type where pay_ty_id =".$rowss['pay_ty_id']." ");
                          while($bill_query=mysqli_fetch_assoc($query1)){

 
                        ?>
                        <span class="od-val">
                        <?php echo $bill_query['pay_desc'];?>
                        </span>
                        <?php
                        } }?>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 order-list-item" style="direction: ltr;">
                        <span class="od-title">
                            Order Time
                        </span>
                        <span class="od-val">
                        <?php echo $row['order_date'];?>
                        </span>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 order-list-item" style="direction: ltr;">
                        <span class="od-title">
                            Scheduled Time
                        </span>
                        <span class="od-val">
                        <?php echo $row['due_time'];?>
                        </span>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 order-list-item" style="direction: ltr;">
                        <span class="od-title">
                            Order Preparation Time
                        </span>
                        <span class="od-val">
                            10 Min
                        </span>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 order-list-item" style="direction: ltr;">
                        <span class="od-title">
                            Delivery Method
                        </span>
                        <span class="od-val">
                            Home Delivery
                        </span>
                    </div>
                </div>
            </div>
            <!-- <div class="bill-right d-flex" style="width: 330px;padding-left: 30px;flex-direction: column!important;">
                <div class="picing-section single-product-loop">
                    <div class="c-order-details">
                        <span style="font-size: 16px;">Total</span>
                        <span style="text-align: right!important; ">₹<?php echo $row['total_amount'];?></span>
                    </div>
                    <div class="c-order-details">
                        <span style="font-size: 16px;">Deilvery Charges</span>
                        <span style="text-align: right!important; ">₹20</span>
                    </div>
                    <div class="c-order-details c-order-total">
                        <span style="font-size: 16px;">Subtotal</span>
                        <span style="text-align: right!important; ">₹<?php echo  $row['total_amount'];?></span>
                    </div>
                </div>
            </div> -->
            </div>
            <section style="padding: 1rem!important;">
                <div class="details" >
                    <p class="d-flex" style="justify-content: space-between!important;">
                        <span style="text-transform: capitalize;font-size: 18px;margin-bottom: 0;padding: 0!important;">
                            Details
                        </span>  
                    </p>
                </div>
                <div class="details-container d-flex">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Category</th>
                            <th scope="col">Product</th>
                            <th scope="col">Description</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total Price</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $query= mysqli_query($conn,"select * from order_product where order_id = ".$row['order_id']." ");
                    while($rowss=mysqli_fetch_assoc($query)){
                        $total_product_price= $rowss['pr_price'] * $rowss['quantity'];
                        $price += $total_product_price;
                        $tax = $price * (5.0 / 100);
                        $subtotal = $price + $tax;
                        $pr= mysqli_query($conn,"select * from `product` where `pr_id` = ".$rowss['pr_id']." ");
                        while($product=mysqli_fetch_assoc($pr)){
                            $sp= $product['s_pro_id'];
                        
                            $spr = "SELECT * FROM `shopproduct`where `s_pro_id` = $sp ";
                            $result = mysqli_query($conn, $spr);
                            while($spo = mysqli_fetch_array($result)){
                                $pro_ty= $spo['pro_ty_id'];

                                $pro = "SELECT * FROM `product_type`where `pro_ty_id` = $pro_ty ";
                                $resul = mysqli_query($conn, $pro);
                                while($pro_ty_id = mysqli_fetch_array($resul)){
                                // echo $pro_ty_id['ptype_desc'];
                                // // $proid = $pro_ty_id['ptype_desc'];
                                // // echo $proid;
                   ?>
                        <tr>
                            <td> <?php echo $pro_ty_id['ptype_desc'];?></td>
                            <td><?php echo $product['pr_name'];?></td>
                            <td><?php echo $product['pr_desc'];?></td>
                            <td>₹<?php echo $product['pr_price']; ?></td>
                            <td><?php echo $rowss ['quantity'];?></td>
                            <td>₹<?php echo $total_product_price;?></td>
                        </tr>
                <?php 
                           
                        } }
                    }}
                            ?> 
                           <tr>
                               <th scope="row"> </th>
                               <td > </td>
                               <td > </td>
                               <td > </td>
                               <th >Total</th>
                               <td >₹<?php echo $price; ?> </td>
                            </tr>
                            <tr>
                                <td style="border-top: none ;" > </td>
                                <td style="border-top: none ;" > </td>
                                <td style="border-top: none ;" > </td>
                                <td style="border-top: none ;" > </td>
                                <th>Tax(5%) </th>
                                <td >₹<?php echo $tax; ?> </td>
                            </tr>
                            <tr>
                                <td style="border-top: none ;" > </td>
                                <td style="border-top: none ;" > </td>
                                <td style="border-top: none ;" > </td>
                                <td style="border-top: none ;" > </td>
                                <th >Subtotal</th>
                                <td >₹<?php echo $subtotal; ?> </td>
                            </tr>
                             
                    </tbody>
                </table>
                </div>
            </section>
        </div>
    </div>
    <?php
        }}
    ?>
</body>
</html>

<!--  
    cat-prod name--desc-price-quant-total

 -->