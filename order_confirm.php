<?php
include('conn.php');
include('cart.php');
session_start();
// echo "<prev>";
// print_r($_SESSION);
// echo "<prev>";

$logid=$_SESSION["log_id"];
$url=$_SESSION["surl"];
$sname=$_SESSION["sname"];
//print $sname;
$shopaddr=$_SESSION["saddr"];
$delmode=$_SESSION['delivery_mode'];
print $delmode;
$value = $_POST['value'];
print $value;

// selecting data from signup page using login id 
$query = "SELECT * FROM `signup` WHERE log_id=$logid";
$result = $conn->query($query);

  if ($result->num_rows > 0) 
  {
    while($row = $result->fetch_assoc())
    {
        
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Cart</title> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style2.css">
    <script data-require="jquery@3.1.1" data-semver="3.1.1"src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="script.js"></script> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/9e5fee4591.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="White_on_Blue.png" type="image/x-icon">
</head>
<style>
</style>
<body style="background-color: #F3F3F3;">
    <div class="page"> 
        <div class="navbar"> 
            <img src="kwyklogo.webp" alt="">
        </div> 
        <div class="checkout">
            <p class="hover-underline-animation">Checkout</p>
        </div>
        <div id="info">
            <!-- <a href="#"><i class="fas fa-cart-arrow-down"></i><span></span></a> -->
            <p onclick="replace()" id="delhome" name="home_delivery" class="act active" style=" padding-left: 20px; font-size: large;">HOME DELIVERY</p>
            <p onclick="place()" id="delhome" name="takeaway" class="act" style="padding-left: 20px; font-size: large;">TAKEAWAY</p>
            
        </div> 
        <div class="form">
            <div class="grid-container"> 
                <div class="grid-left">
                    <div id="home" style="display:block">
                    <p style="padding-left: 35px; margin: 16px; font-size: x-large;">Delivery
                        Details</p>

                    <button class="open-button" onclick="openForm()">
                        <i style="font-size: 20px;margin-right: 0.5rem;/* margin-left: 1rem; */color: #4BB1DF;" class="fa fa-map-marker"></i>Add Details 
                    </button>

                    <div class="address">
                        <div class="add">
                            <div style="display: flex; justify-content:space-between ;">
                                <div>
                                    <i class="fa fa-home" aria-hidden="true"></i>
                                    <span>home</span>
                                </div>
                                <div>
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div style="color:#afafaf;font-size: 14px;">
                                <p><?php echo $row['address'];?></p>

                            </div>
                            <div style="position: relative;min-height: 1px;padding-right: 15px;padding-left: 15px;text-align: center;">
                                <button onclick="change()" class="button3" type="button">Deliver Here</button>
                            </div>
                        </div>
                    </div>
                </div>
                    <div id="delhere" style="display:none">
                    <p class="hover-underline-animation" style="padding-left: 35px; font-size: x-large;">Delivery Details</p>
        <div class="pagedel">
            <div class="page2">
                <div class="add">
                    <p style="margin: 0 0 10px;"><?php echo $row['Name'];?> </p>
                </div>
                <div style="margin: 1rem 0  ;" class="add">
                    <p style="margin: 0 0 10px;" class="add2">
                    <?php echo $row['address'];?>
                    </p>
                </div>
            </div>
            <button onclick="change2()" class="open-button" >
                <i style="font-size: 20px;margin-right: 0.5rem;color: #4BB1DF;" class="fa fa-map-marker"></i>Change Details 
            </button>
        </div>
        </div>
                    <div id="take" style="display:none">
                    <p  style="padding-left: 35px; margin: 24px; font-size: x-large;">Customer
                            Details</p>

                        <div style="margin: 30px; width: 700px;" class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Name</label>
                                <input type="text" class="form-control" name="Name" value=<?php echo $row['Name'];
                                    ?> placeholder="Enter Name" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Email</label>
                                <input type="email" class="form-control" name="Email" id="inputEmail4" value=<?php
                                    echo $row['Email']; ?> placeholder="Enter Email" required>
                            </div>
                        </div>

                        <div style="margin: 30px; width: 700px;" class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Address</label>
                                <input type="text" class="form-control" name="Address" autocomplete="on"  value="<?=$sname.", ".$shopaddr;?>" readonly>
                            </div>
                        <div class="form-group col-md-6">
                                <label for="inputEmail4">Phone</label>
                                <input type="text" class="form-control" name="Mobile" value=<?php echo
                                    $row['Mobile']; ?> placeholder="Enter Mobile no" required>
                            </div>
                        </div>
                    </div>
                </div>
             <?php
                }
            } 
            else {
                echo "0 results";
            }
        
            ?> 
                <div class="grid-right">
                    <div class="summary"> 
                        <div class="cart-ready">
                            <span>Cart is Ready</span>
                            <div class="button2">
                                <span>
                                    <a style="color: #4BB1DF;margin-right:8px; font-size:18px;" href="shoppage.php?url=<?= $url?>"><i class="fa-solid fa-rotate-left"></i></a>
                                    <a style="color: #4BB1DF;font-size:18px;" href="?action=empty"><i  class="fa-regular fa-trash-can"></i></a>
                                </span>
                            </div>
                        </div>

                        <?php
                            // $url=$_SESSION["surl"];
                            $sql= "SELECT * FROM `shop` WHERE slink = '$url' ";

                            $result= mysqli_query($conn,$sql);
                            // $row = mysqli_fetch_assoc($result);
                         
                            while($row =mysqli_fetch_array($result))
                            {
                            ?>

                        <div class="summary-pic">
                            <div>
                                <?php echo'<img class="summary-res" src="data:image;base64,'.base64_encode($row['Shoplogo']).'" alt="">';?>
                            </div>
                            <div style="margin-left: 3rem;">
                                <span>
                                    <?php echo $row['Sname'];?>
                                </span>
                            </div>
                        </div>

                        <?php
                            }
                            ?>

                        <div class="summary-items">

                            <?php
                            $tax =0;
                            $item_id=0;
                            $total_quantity = 0;
                            $total_price = 0;
                            $total_payment=0;
                            
                            if (isset($_SESSION['cart_item']) && !empty($_SESSION['cart_item'])){
                                foreach ($_SESSION['cart_item'] as $item) {
                                    $item_price = $item['quantity'] * $item['pr_price'];
                                    $item_id = $item['pr_id'];                                    
                                ?> 
                            <div class="summary2">
                                <div class="pr">
                                    <span>
                                        <?php echo $item['pr_name'];?><br>
                                    </span>
                                    <span>
                                        <?php echo $item_price;?>
                                    </span>
                                </div> 
                                <div class="cart-btn" style="display: flex;">
                                    <!-- <div class="cart-minus"><a href="?action=remove&pr_id=<?= $item['pr_id']; ?>"><i class='fas fa-minus'></i></a> -->
                                    <div class="cart-minus"><a style="color: #4bb14df;" href="?url=<?= $url?>&action=minus&pr_id=<?= $item['pr_id']; ?>&qty=<?= $item['quantity'] ;?>">
                                    <i class='fas fa-minus'></i></a>
                                    </div>
                                    <!-- <div class="cart-quantity"><?= $item['quantity'] ?></div> -->
                                     
                                    <input type="hidden" class="cart-quantity" name="quantity" value="1" size="2">
                                    <div class=" cart-quantity">
                                        <?= $item['quantity']?>
                                    </div>
                                    <div class="cart-minus"><a class href="?url=<?= $url?>&action=plus&pr_id=<?= $item['pr_id']; ?>&qty=<?= $item['quantity'] ;?>">
                                        <!-- <button class="cart-minus" type="submit">  -->
                                            <i class="fas fa-plus"></i></a> 
                                        </div>
                                </div>
                            </div>
                            <?php 
                                $total_quantity += $item["quantity"];
                                $total_price += ($item["pr_price"]*$item["quantity"]);

                        
                        }
                        }
                    // }
                            ?>
                        </div>
                        <?php $tax += $total_price * (5.0 / 100); ?>
                        <div class="summary-subtotal"> 
                            <div class="subtotal-title">Subtotal</div>
                            <div class="subtotal-value final-value" id="basket-subtotal">
                                <i class="fa fa-rupee"></i>
                                <span>
                                    <?php echo $total_price;?>
                                </span>
                            </div>
                            <div class="subtotal-title">GST</div>
                            <div class="subtotal-value final-value" id="basket-subtotal">
                                <i class="fa fa-rupee"></i>
                                <span>
                                    <?php echo $tax;?>
                                </span>
                            </div> 
                            <div class="subtotal-title">Delivery Fees</div>
                            <div class="subtotal-value final-value" id="basket-subtotal"><i class="fa fa-rupee"></i>
                            </div>

                        </div>
                        <?php
                                
                                // }
                                ?>
                        <?php $total_payment += ($tax +$total_price); ?>
                        <div class="summary-total">
                            <div class="total-title">Total</div>
                            <div class="total-value final-value" id="basket-total">
                                <i class="fa fa-rupee">
                                    <?php echo $total_payment;?>
                                </i>
                            </div>
                        </div>
                    </div>

                    <?php
                            // }
                            ?>
                </div> 
            </div>
            <form action="" method="post">
                <button type="submit" name="process" class="mb">Proceed to Pay</button>
            </form>
        </div><br><br>
    </div>
    
<?php
    date_default_timezone_set("Asia/Kolkata");
    $date = date("d:m:Y h:i:sa");

    if(isset($_POST['process']))
    {
?>        
                <script> 
                location.replace("http://localhost/kwykpr/payment.php?url=<?=$url; ?>");
                </script>
<?php                
        
   
    }


?>
    <?php


if(isset($_POST['sub'])){
    // $name = $_POST['name'];
    // $email = $_POST['email'];
    // $phone = $_POST['phone'];
    $ano = $_POST['ano'];      
    $pno = $_POST['pno'];      
    $landmark = $_POST['landamrk'] ; 

    $address = $ano." ".$pno." ".$landmark;
    // echo $address;        
        $query = "UPDATE `signup` SET `address`='$address' WHERE `log_id` ='$logid'";

        $run = mysqli_query($conn, $query);
        if($run){
           echo '<script> alert("Record save successfully!!")</script>'; 
        ?>
        <?php
        }       
        else{
           echo '<script> alert("Record not inserted!!")</script>';
    }
    
    }
?>
    </div>
    <?php
    $query = "SELECT * FROM `signup` WHERE log_id= $logid ";
    $result = $conn->query($query);

  if ($result->num_rows > 0) 
  {
    while($row = $result->fetch_assoc()){
        
?>

    <div class="form-popup" id="myForm">
        <form action="order_confirm.php" method="post" class="form-container">
            <h3>Add New Details</h3>
    
            <label for="email"><b>Full Name</b></label>
            <input type="text" placeholder="Enter Full Name" value="<?php echo $row['Name'];?>" name="name" required>
    
            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Enter Email" value="<?php echo $row['Email'];?>" name="email" required>
    
            <label for="psw"><b>Phone</b></label>
            <input type="text" placeholder="Enter Phone number" value="<?php echo $row['Mobile'];?>" name="phone" required>
    
    
            <label for="psw"><b>Address</b></label>
            <input type="text" placeholder="Enter Address" name="ano" required>
            
            <label for="psw"><b>Landmark</b></label>
            <input type="text" placeholder="Enter Landmark" name="landmark" required>
    
            <label for="psw"><b>Pin Code</b></label>
            <input type="text" placeholder="Enter Pin Code" name="pno" required>
    
    
            <div>
                <label for="psw"><b>Label for Address </b></label><br>
                <input type="radio" id="home" name="fav_language" value="Home">
                <label for="html">Home</label>
    
                <input type="radio" id="home" name="fav_language" value="Home">
                <label for="work">Work</label>
    
                <input type="radio" id="home" name="fav_language" value="Home">
                <label for="others">Others</label>
            </div><br>
    
            <div style="display:flex ; justify-content: space-between;">
                <button type="submit" name="sub" class="btn1">Save</button>
                <button type="button" class="btn-cancel" onclick="closeForm()">Cancel</button>
            </div>
        </form>
    </div>
    <?php
      }}
      ?>

    <script>
        var header = document.getElementById("info");
        var btns = header.getElementsByClassName("act");
        for (var i = 0; i < btns.length; i++) {
        btns[i].addEventListener("click", function() {
        var current = document.getElementsByClassName("active");
        current[0].className = current[0].className.replace(" active", "");
        this.className += " active";
        });
        }
    </script>
    
<?php $type = "Home"; 
?>
    <script>
        function openForm() {
            document.getElementById("myForm").style.display = "block";
        }
    
        function closeForm() {
            document.getElementById("myForm").style.display = "none";
        }

        function replace() {
            document.getElementById("home").style.display="block";
            document.getElementById("take").style.display="none";
            document.getElementById("delhere").style.display="none";
          
        }
        function place() {   
            document.getElementById("take").style.display="block";
            document.getElementById("home").style.display="none";
            document.getElementById("delhere").style.display="none";
            <?php $type= "take";
            $_SESSION["type"] = $type; ?>
        }
        
        function change() {   
            document.getElementById("delhere").style.display="block";
            document.getElementById("home").style.display="none";
            
        }
        function change2() {   
            document.getElementById("home").style.display="block";
            document.getElementById("delhere").style.display="none";
            
        }
        
    </script> 
    <!-- </form> -->
</body>

</html>