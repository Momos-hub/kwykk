<?php
include('conn.php');
include('cart.php');

// error_reporting(E_ERROR | E_PARSE);
// echo"<pre>";
// print_r($_SESSION);
// echo"<pre>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Details</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/9e5fee4591.js" crossorigin="anonymous"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>

    <link rel="stylesheet" href="payment.css">
    <link rel="shortcut icon" href="White_on_Blue.png" type="image/x-icon">
</head>
<style>
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
    
</style>
<body>
    <?php 
    $logid=$_SESSION["log_id"];
    $shop_id=$_SESSION["sid"];

    $tax=0;
    $total=0;
    $total_quantity=0;
    // $item_price=0;
    // $item_id=0;
    $total_price=0;
    $tip=0;
    foreach ($_SESSION['cart_item'] as $item) { 
        $total_quantity += $item["quantity"];
        // $item_price = $item["pr_price"];
        $total_price += ($item["pr_price"]*$item["quantity"]);   
        // $item_id = $item["pr_id"];
        // echo $item_id, $item_price;
    }
    ?>
    <?php
    if(isset($_GET['tip'])){
        $tip = $_GET['tip'];
    }
    ?>
    <div class="wrapper">
        <div class="payment-heading">
            <p class="title">Payment</p>  
            <hr class="title-bar" style="border-top-color: rgb(75, 177, 223);">      
        </div>
        
        <div class="login-form">
            <div class="payment-card" style="width: 1000px">
                <div class="bill">
                    <i class="fa-solid fa-receipt" style="margin: 14.5px 12px 14.5px 20px;float: left;vertical-align: middle;"></i>
                    <p class="bill-text">Bill Summary</p>
                </div>
                <div class="payment-cart">
                    <?php
                
                 
                $tax += $total_price * (5.0 / 100);
                $total+= ($tax + $total_price +$tip);
                    ?>
                    <div class="pmnt-cart">
                        <div class="pt-name">Subtotal</div>
                        <div class="pt-val">₹<?php echo $total_price;?></div>                   
                    </div>
                    <div>
                        <div class="pmnt-cart">
                            <div class="pt-name">GST @ 5%</div>
                            <div class="pt-val">₹<?php echo $tax;?></div>                            
                        </div>
                    </div> 
                    <div>
                        <div class="pmnt-cart">
                            <div class="pt-name">Delivery Fees</div>
                            <div class="pt-val">₹</div>                            
                        </div>
                    </div>
                     
                    <div>   
                        <div class="pmnt-cart">
                            <div class="pt-name">Tip</div>
                            <div class="pt-val"><?php echo $tip; ?></div>                            
                        </div>
                    </div>
                    <hr class="pmnt-sep">
                    <div class="pmnt-subt">
                        <p class="subt-txt" style="direction: ltr;float: left;color: rgba(0,0,0,0.87);">Total</p>
                        <p class="subt-val" style="color: rgb(75, 177, 223);float: right;">₹<?php echo $total?></p>
                    </div><br><br>
                </div>
                <div>
                    <div class="bill">
                        <div>
                            <i class="fa-solid fa-hand-holding-dollar" style="margin: 14.5px 12px 14.5px 20px;
                            float: left; vertical-align: middle;"></i>
                            <p class="bill-text">Tip</p>
                        </div>
                    </div>
                    <div class="payment-cart">
                        <div style="box-sizing: border-box;">
                            <div class="tip-qty">    
                                <div class="tip-opt" id="" onclick="twenty()">
                                    <span>₹20</span>
                                </div>
                            </div>
                            <div class="tip-qty" onclick="thirty()">    
                                <div class="tip-opt">
                                    <span>₹30</span>
                                </div>
                            </div>
                            <div class="tip-qty" onclick="fifty()">    
                                <div class="tip-opt">
                                    <span>₹50</span>
                                </div>
                            </div>
                            <div class="tip-qty" onclick="hundred()">    
                                <div class="tip-opt">
                                    <span>₹100</span>
                                </div>
                            </div>
                        </div>
                        <div class="tipqty">
                            <div class="row" style="margin-right: -15px;margin-left: -15px;">
                                <form method="get">
                                    <div class="tip-inp">
                                        <input type="text" id="value" placeholder="Enter Tip Amount" name="tip" class="formctr">
                                    </div>
                                    <div class="tip-subt">
                                        <button type="submit" class="subt-btn">Submit</button>
                                        <!-- <button onclick="clickMe()" class="subt-btn">Cancel </button> -->
                                    </div>
                                </form>
                            </div>
                        </div>
                    
                    </div>
                </div>
                
                <div>
                    <div class="bill">
                        <div>
                            <i class="fa-solid fa-tag" style="margin: 14.5px 12px 14.5px 20px;
                            float: left; vertical-align: middle;"></i>
                            <p class="bill-text">Promotion(s)</p>
                            <p class="promo">
                                Add a Promo / Referral Code
                            </p>
                        </div>
                    </div>
                    <div class="payment-cart" style="height: 10px;"></div>

                </div>
                <div>
                    <div class="bill">
                        <div>
                            <i class="fa-solid fa-cash-register" style="margin: 14.5px 12px 14.5px 20px;
                            float: left; vertical-align: middle;"></i>
                            <p class="bill-text">Payment Method</p>
                        </div>
                    </div>
                    <div class="pay-option">
                        <div class="row" style="margin-right: -15px;margin-left: -15px;">
                            <div class="pay-type" style="display: flex;flex-wrap: wrap;float: left;">
                                <div class="repeat">
                                    <button class="pay-btn">
                                        <span>
                                            <div class="pay">
                                                <img class="paytype-img" src="netBanking.png" alt="">
                                                <div class="paytxt">Card/Net Banking/UPI</div>
                                            </div>
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-right: -15px;margin-left: -15px;">
                            <div class="pay-type" style="display: flex;flex-wrap: wrap;float: left;">
                                <div class="repeat">
                                    <button class="pay-btn">
                                        <span>
                                            <div class="pay">
                                                <img class="paytype-img" src="wallet.png" alt="">
                                                <div class="paytxt">Pay Via Wallet </div>
                                            </div>
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <form action="" method="post">
            <button class="process" name="pay">
                <span>Pay 
                    <span>₹ <?php echo $total ?></span>
                </span>
                <div class="processbtn"></div>
            </button>
            </form>
        </div>
    </div>
    
<?php
        date_default_timezone_set("Asia/Kolkata");
        $date = date("Y:m:d h:i:sa");
        
        // $currentTimestamp = Mage::getModel('core/date')->timestamp(time());
        // echo 'Estimated delivery date ' ;
        // echo $deliverydate = date('l-F-Y', $currentTimestamp);
        // $time= ;
        // $time= strtotime('$date + 20 minute');
       
        if(isset($_POST['pay'])){
            $url=$_SESSION["surl"];
           $submit = "INSERT INTO `orders`(`log_id`, `shop_id`, `prod_count`, `total_amount`, `order_date`, `due_time`) VALUES ('$logid','$shop_id','$total_quantity','$total','$date',ADDTIME(order_date,'00:30:00'))";
           
           if(mysqli_query($conn, $submit)) {
               $last_id = mysqli_insert_id($conn);
            //    echo '<script> alert("Order1 successfully!!")</script>';   

               foreach ($_SESSION['cart_item'] as $item) {      
               for($i = 0; $i<=count($item); $i++){
                $query = "INSERT INTO `order_product`(`order_id`, `pr_id`, `pr_price`,`del_id`,`quantity`) VALUES ('$last_id','$item[pr_id]','$item[pr_price]',6001,'$item[quantity]')";
                }
                if (mysqli_query($conn, $query)){
                    // echo '<script> alert("Order2 successfully!!")</script>'; 
                } else {
                    echo "Error";
                } 
                }

                $bill="INSERT INTO `bill`(`order_id`, `pay_ty_id`, `amount`, `bill_date`) VALUES ('$last_id',7001,'$total','$date')";
                if(mysqli_query($conn, $bill)){
                    ?>
                     <script>
                            swal({
                                icon:"success",
                                title:"Order Placed"})
                            .then((value) => {
                                swal(location.replace("http://localhost/kwykpr/shoppage.php?url=<?=$url; ?>"));
                            });
                                </script>

                    <?php
                    unset($_SESSION['cart_item']);
                }
                else{
                    echo "Error"; 
                }
            } else {
                echo "Error";
            } 
            // echo $last_id;

        }
//             $go = mysqli_query($conn, $submit);
//             if($go){        

                
//             echo '<script> alert("Order Has been Placed")</script>';
// ?>


    <script>
        function twenty(){
            document.getElementById('value').value="20"
        }
        function thirty(){
            document.getElementById('value').value="30"
        }
        function fifty(){
            document.getElementById('value').value="50"
        }
        function hundred(){
            document.getElementById('value').value="100"
        }

    </script>
     
</body>
</html>