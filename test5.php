<?php
include('cart.php');
include('conn.php');
include('signup_cust.php');
// include('test5login.php');  
// echo"<pre>";
// print_r($_SESSION);
// echo"<pre>";

$logid=0;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Shop Page</title>
        
        <link rel="stylesheet" href="shoppage.css">
        <link rel="stylesheet" href="bank_validation.css">
    
        <link rel="stylesheet" href="login.css">
    <!-- <link rel="stylesheet" href="customerdash.css"> -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">  

    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/9e5fee4591.js" crossorigin="anonymous"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

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

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 50px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
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
.active{
  /* background-color: #4bb1df; */
  color: #4bb1df !important;
  /* color: #4bb1df; */
}
</style>
 
<body style=" background-color:#f3f3f3 ;"> 
    <?php
            $shopid = 1001;
            //  $logid=$_SESSION["log_id"];
             $sql = "SELECT * FROM `shop`where shop_id =$shopid ";
             $result = mysqli_query($conn, $sql);
             while($row = mysqli_fetch_array($result)){
                //  $shop_id=$row['shop_id'];  
                             
    ?>
                
    <div id="navbar">
        <ul>
            <!-- <li><i class="fa-solid fa-angle-left"></i></li> -->
            <!-- <?php echo '<img class="shop-logo" src="data:image;base64,'.base64_encode($row['Shoplogo']).' " alt="">';?> -->
            <li class="nav-item"><?php echo' <img class="navlogo" src="data:image;base64,'.base64_encode($row['Shoplogo']).' " alt="">';?></li>
            <li class="nav-item"><label for="type"></label>
            <select class="ordertype">
                <option value="Home Delivery">HOME DELIVERY</option>
                <option value="Takeaway">TAKEAWAY</option>
            </select>
        </li>
        <li class="nav-item">
            <input type="text" name="locateme" class="location"><button><i class="fa-solid fa-crosshairs"></i>Locate me</button>
        </li>
        <?php
        $logid=$_SESSION["log_id"];
        if(isset($logid) &&!empty($logid)){
        ?>
        <span class="nav-item" style="float:right"><div class="dropdown">
            <i class="fa-regular fa-user"></i><a class="navitem" href="#"><?php echo $_SESSION["name"];?></a>
            <div class="dropdown-content">
                <form method="post">
                    <button class="logout" style="width:90px; border: none;text-align: center;text-decoration: none;cursor: pointer;background-color: #e7e7e7;color: black;" type="submit" name="signout">Logout</button>
                </form>
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
<?php
if(isset($_POST['signout'])){
    // session_start();
    session_destroy();
    echo '<script>location.replace("http://localhost/kwykpr/test5.php");</script>'; 
    exit();
}
?>
<div class="shopimage">
    <div class="left-content">
        <div class="flex-container">
        
                <div>
                    <?php echo '<img class="shop-logo" src="data:image;base64,'.base64_encode($row['Shoplogo']).' " alt="">';?>
                    <!-- <img class="shop-logo" src="popular.png" alt=""> -->
                </div>
                <div class="right-container">
                    <h4 class="shop-name"><?php echo $row['Sname']; ?></h4>
                    <div class="shoplocation">
                        <a class="shop-location" href="#location"><i class="fa-solid fa-location-dot" style="color: red;"></i><p>Location</p></a>
                    </div>
                    <div class="rating">
                        <a href="#rate"><i class="fa-solid fa-star" style="color: yellow;"></i><p class="">Rate Us</a></p>
                    </div>
                </div>
            </div>
            <?php
                
                ?>
        </div>
        <?php
        //  $sql = "SELECT * FROM `shop` where shop_id =1016 ";
        //  $result = mysqli_query($conn, $sql);
        //  while($row = mysqli_fetch_array($result)){
        //      ?>
        <div class="right-content">
            <?php echo '<img class="right-content" src="data:image;base64,'.base64_encode($row['bkgdimage']).' " alt="">';?>
            <!-- <img class="right-content" src="Web/img/home.jpg" alt=""> -->
        </div>
        <?php
         }
        ?>
    </div>

  
    <div id="banner-footer" class="banner-footer">
        <div class="search-div">
            <form action="test5.php" method="post">
                <input type="text" class="search" name="search" placeholder="Search product">
                <input type="hidden" name="submt">
            </form>
        </div>
        <div>
            <button class="veg">
                <label class="">
                    <input type="checkbox">
                    <span class="checkbox-rectangle">Veg Only</span>
                </label>
            </button>
        </div>                        
    </div>
    
    <div class="grid-container" style="grid-template-columns: 250px 700px 250px;">
        <div class="grid-category">
            <div id="cart-fix" style="background-color: #fff;">
                <div class="row1">Menu</div>
                <div class="row-content">
                    <div class="row-info">
                        <?php
                        $category=0;
                        $pro_type= "SELECT * FROM shopproduct WHERE shop_id = $shopid AND cat_status = 'Live' "; 
                        $search_prodtype = mysqli_query($conn, $pro_type);
                        
                        $record_count2 = mysqli_num_rows($search_prodtype);
                        if($record_count2){
                            $j=0;
                            for($i=1;$i<=$record_count2;$i++){
                                $recordprodtype = mysqli_fetch_assoc($search_prodtype);
                                $prodtyid= $recordprodtype['pro_ty_id'];
                                $pro_type_desc= "SELECT * FROM product_type WHERE pro_ty_id= $prodtyid"; 
                                $desc_prodtype = mysqli_query($conn, $pro_type_desc);
                                
                                $record_count_desc = mysqli_num_rows($desc_prodtype);
                                
                                if($record_count_desc){
                                       
                                    $recordprodtype_desc = mysqli_fetch_assoc($desc_prodtype);
                                    $cat= $recordprodtype_desc['ptype_desc'];

                                    //  $category = $_SESSION["menu"];
                                      
                                  
                                        // $_SESSION["menu"] = $category;
                                    ?>
                                     
                        
                        <div class="row-type">
                            <a class = "na <?= ($category == $recordprodtype_desc['ptype_desc'] ) ? 'active':''; ?>" href="?menu=<?= $recordprodtype_desc['ptype_desc'];?>"><?php echo $recordprodtype_desc['ptype_desc'];?></a>
                        </div>
                        <?php
                        if(isset($_GET['menu'])){
                            $category = $_GET['menu'];
                        }
                                }
                            }
                        }
                        ?>

                        
                    </div>
                </div>
            </div>
        </div>
        <div class="grid-menu" style="text-align: center;">
            <div class="product" style="width: auto; height:10%;">
                <div class="produt-top" style="margin-top: 20px;margin-bottom: 20px;">
                    
                    <?php




$ress= mysqli_query($conn,"select * from product_type where ptype_desc = '$category';");
if($rows=mysqli_fetch_assoc($ress))
{
    $query= mysqli_query($conn,"select * from shopproduct where pro_ty_id =".$rows['pro_ty_id']." ");
    while($rowss=mysqli_fetch_assoc($query)){
        // $shop=$rowss['shop_id'];
        // if($shop == $shopid){
        $query1= mysqli_query($conn,"select * from product where product_status ='Live' and s_pro_id =".$rowss['s_pro_id']." ");
        while($row=mysqli_fetch_assoc($query1)){

            ?>
                    <div class="product-side" style="background-color: #fff;margin: 0 30px;border-radius: 5px;">
                        <div class="product-list">
                            <div class="veg-non-veg">
                                
                                </div>
                                <div class="product-img">
                                    <?php echo '<img class="shop-logo" src="data:image;base64,'.base64_encode($row['pr_pic']).' " alt="">';?>
                            </div>
                            <div class="product-name-main" style="overflow: hidden;padding: 0 0 10px;width: 100%;">
                                <div class="product-name">
                                    <div class="div1">
                                        <span><?php echo $row['pr_name']; ?></span>
                                    </div>
                                </div>
                                <div class="product-price">
                                    <div class="price-text">₹<?php echo $row['pr_price']; ?></div>
                                    <div class="plus">
                                    
                                    <form action="?action=add&pr_id=<?= $row['pr_id']; ?>" method="post">
                                        <input type="text" class="cart-quantity" name="quantity" value="1" size="2">
                                        <button class="cart-minus " type="submit">
                                        <i class="fas fa-plus"></i>
                                        </button>
                                    </form>
                                        <!-- <a href="?action=add&p_id=<?= $row['pr_id']; ?>">
                                            <button class="btn"><i class="fa-solid fa-square-plus"></i></button>
                                        </a> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
            }}
            elseif (isset($_POST['submt'])) {
                    $searchString = mysqli_real_escape_string($conn, ($_POST['search']));
                    if ($searchString === "" || !ctype_alnum($searchString) || $searchString < 3) {
                        // echo "Invalid search string";
                        echo '<script> alert("Enter product");</script>';
                        // exit();
                    }
                    $searchString = "%$searchString%";
                    $sql = "SELECT * FROM product WHERE pr_name LIKE ?";
             
                    $prepared_stmt = $conn->prepare($sql);
                    $prepared_stmt->bind_param('s', $searchString);
                    $prepared_stmt->execute();
                    $result = $prepared_stmt->get_result();
            
                    if ($result->num_rows === 0) {
                        echo '<script> alert("No Product Found");</script>';
                        exit();
            
                    } else {
                        // Process the result(s)
                        while ($row = $result->fetch_assoc()) {
                            
            ?>
            <div class="product-side" style="background-color: #fff;margin: 0 30px;border-radius: 5px;">
            <div class="product-list">
                <div class="veg-non-veg">
                    
                    </div>
                    <div class="product-img">
                        <?php echo '<img class="shop-logo" src="data:image;base64,'.base64_encode($row['pr_pic']).' " alt="">';?>
                </div>
                <div class="product-name-main" style="overflow: hidden;padding: 0 0 10px;width: 100%;">
                    <div class="product-name">
                        <div class="div1">
                            <span><?php echo $row['pr_name']; ?></span>
                        </div>
                    </div>
                    <div class="product-price">
                        <div class="price-text">₹<?php echo $row['pr_price']; ?></div>
                        <div class="plus">
                        
                        <form action="?action=add&pr_id=<?= $row['pr_id']; ?>" method="post">
                            <input type="text" class="cart-quantity" name="quantity" value="1" size="2">
                            <button class="cart-minus " type="submit">
                            <i class="fas fa-plus"></i>
                            </button>
                        </form>
                            <!-- <a href="?action=add&p_id=<?= $row['pr_id']; ?>">
                                <button class="btn"><i class="fa-solid fa-square-plus"></i></button>
                            </a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
          } 
        }  

    }
     
             else{
                $S_pro_query=  mysqli_query($conn,"select * from shopproduct WHERE shop_id =$shopid ");
                while($s_pro_row=mysqli_fetch_assoc($S_pro_query)){
                    $s_pro=$s_pro_row['s_pro_id'];
                    // echo $s_pro;
                    $ress1= mysqli_query($conn,"select * from product where  product_status ='Live' and s_pro_id = $s_pro");
                    while($row=mysqli_fetch_assoc($ress1)){
                    ?>
                    <div class="product-side" style="background-color: #fff;margin: 0 30px;border-radius: 5px;">
                        <div class="product-list">
                            <div class="veg-non-veg">
                                
                                </div>
                                <div class="product-img">
                                    <?php echo '<img class="shop-logo" src="data:image;base64,'.base64_encode($row['pr_pic']).' " alt="">';?>
                            </div>
                            <div class="product-name-main" style="overflow: hidden;padding: 0 0 10px;width: 100%;">
                                <div class="product-name">
                                    <div class="div1">
                                        <span><?php echo $row['pr_name']; ?></span>
                                    </div>
                                </div>
                                <div class="product-price">
                                    <div class="price-text">₹<?php echo $row['pr_price']; ?></div>
                                    <div class="plus">
                                    
                                    <form action="?action=add&pr_id=<?= $row['pr_id']; ?>" method="post">
                                        <input type="text" class="cart-quantity" name="quantity" value="1" size="2">
                                        <button class="cart-minus" type="submit">
                                        <i class="fas fa-plus"></i>
                                        </button>
                                    </form>
                                        <!-- <a href="?action=add&p_id=<?= $row['pr_id']; ?>">
                                            <button class="btn"><i class="fa-solid fa-square-plus"></i></button>
                                        </a> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }

            }
        }
                ?>
                </div>
            </div>
        </div>
        
        
        <?php
           $total_quantity = 0;
           $total_price = 0;
        ?>
        <div class="grid-cart">
            <div id="cart-fix" style="background-color: #fff;">
                <div class="cart">
                    <div class="cart-text">Cart</div>
                    <div id="remove" class="cart-text">
                        <a href="?action=empty"><i  class="fa-regular fa-trash-can"></i></a>    
                    </div>
                </div>
                <!-- <div class="empty-cart"> -->
                    <!-- <span>
                        <img class="emptycart" src="https://www.kwyk.one/en/assets/img/emptyCart.png" alt="">
                    </span>
                    <span>Your Cart Is Empty</span>
                    <span>Add an Item to cart</span> -->
                <!-- <div> -->
            <?php
            if (isset($_SESSION['cart_item']) && !empty($_SESSION['cart_item'])){
                foreach ($_SESSION['cart_item'] as $item) {
                    $item_price = $item['quantity'] * $item['pr_price'];
                    ?>
                        <div class="cart-content">
                            <div class="cart-container" style="justify-content: space-between;">
                                <div class="cart-container">
                                    <div class="cart-name" >
                                        <p class="food-name"><?= $item['pr_name'] ?></p>
                                        <span>₹<?= number_format($item_price, 2) ?></span>
                                    </div>
                                </div>
                                <div class="cart-total" style="display: flex;">
                                    <div class="cart-tot" style="display: flex;justify-content: flex-start;">
                                        <div class="cart-btn" style="display: flex;">
                                            <div class="cart-minus"><a class href="?action=remove&pr_id=<?= $item['pr_id']; ?>">
                                                <i class='fas fa-minus'></i></a>
                                            </div>
                                            <div class="cart-quantity"><?= $item['quantity'] ?></div>
                                            <form action="?action=add&pr_id=<?= $item['pr_id']; ?>" method="post">
                                            <input type="hidden" class="cart-quantity" name="quantity" value="1" size="2">
                                                <button class="cart-minus" type="submit">
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                            </form>
                                            <!-- <div class="cart-plus"><a  href="?action=add&pr_id=<?= $item['pr_id'];?>">
                                                <i class='fas fa-plus-square' style="font-size:24px;"></i></a>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr style="width: 100%; margin: 5px 0; border-top: 1px solid rgba(0,0,0,.1);">
                        <?php
                    $total_quantity += $item["quantity"];
                    $total_price += ($item["pr_price"]*$item["quantity"]);
                }
            }
            else{
                ?>
                <div id="empty-cart">
                    <span>
                        <img class="emptycart" src="https://www.kwyk.one/en/assets/img/emptyCart.png" alt="">
                    </span>
                    <span>Your Cart Is Empty</span>
                    <span>Add an Item to cart</span>
                </div>
                <?php
            }

            if (isset($_SESSION['cart_item']) && !empty($_SESSION['cart_item'])){
                if (isset($_SESSION["log_id"]) && !empty($_SESSION["log_id"])){ 
                ?>
                        <div class="total">
                            <div class="subtotal">
                                <div class="sub" >
                                    <span class="head">Subtotal</span>
                                </div>
                                <div class="sub-text" >
                                    <span class="tail">₹<?= number_format($total_price, ); ?></span>
                                </div>
                            </div>
                            <a  href="order_confirm.php">
                                <button class="total-btn">
                                    <span class="btn-text">Checkout</span>
                                </button>
                                </a>
                        <?php
                            }else{
                        ?>
                        <div class="total">
                            <div class="subtotal">
                                <div class="sub" >
                                    <span class="head">Subtotal</span>
                                </div>
                                <div class="sub-text" >
                                    <span class="tail">₹<?= number_format($total_price, ); ?></span>
                                </div>
                            </div>
                                <button data-toggle="modal" data-target="#myModal" type="submit" class="total-btn">
                                    <span class="btn-text">Checkout</span>
                                </button>
                                 
                                    
                        </div>

                    </div>
                </div>
                <?php
                 }
                }
                ?>
            </div>
        </div>
    </div> 
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

    <!-- <button type="button" class="  " data-toggle="modal" data-target="#myModal">
      Login Form
    </button> -->
  <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="modal-box">
                <!-- Button trigger modal -->
 
                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content clearfix">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
                            <div class="modal-body">
                                <h3 class="title">Sign in</h3>
                                <!-- <p class="description">Login here Using Email & Password</p> -->
                                <div class="form-group">
                                    <span class="input-icon"><i class="fa fa-user"></i></span>
                                    <input type="email" class="form-control" name="eid" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <span class="input-icon"><i class="fas fa-key"></i></span>
                                    <input type="password" class="form-control" name="password" placeholder="Password">
                                </div>
                                <div class="form-group checkbox">
                                    <input type="checkbox">
                                    <label>Remember me</label>
                                </div>
                                <a href="" class="forgot-pass">Forgot Password?</a>
                                <button name="log" class="btnn">Login</button>
                                <p style="margin-top: 20px;">Don't have an account? <a data-toggle="modal" data-target="#exampleModal"data-dismiss="modal" aria-label="Close" >Sign Up</a></p>
                            </div></form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

 

<!-- Modal -->
 
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
       <div class="modal-body"> 
      <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" onsubmit="return validation()">
        <h3 class="title" style="margin: 0 0 20px; ">Sign up</h3>
    <div class="form-group">
        <span class="input-icon"><i class="fa fa-user"></i></span>
        <input type="text" name="name" class="form-control name" id="user" placeholder="Enter Name" required>
        <span id="username" class="text-danger font-weight-bold"></span>
    </div>
    <p class="emsg hidden">Please Enter Valid Name</p> 
    
    
    <div class="form-group">
        <span class="input-icon"><i class="fas fa-mobile"></i></span>
        <input type="text" name="mobile" class="form-control mobile" id="mbl" placeholder="Mobile no." required>
        <span id="mblno" class="text-danger font-weight-bold"></span>
    </div>
    <p class="emsg1 hidden">Please Enter Mobile Number</p>
    <div class="form-group">
        <span class="input-icon"><i class="fas fa-envelope"></i></span>
        <input type="email" name="email" class="form-control email" id="useremail" placeholder="Enter Email" required>
        <span id="usremail" class="text-danger font-weight-bold"></span>
    </div>
    <p class="emsg2 hidden">Please Enter Valid Email</p>
    <div class="form-group">
        <span class="input-icon"><i class="fas fa-key"></i></span>
        <input type="password" name="pwd" class="form-control pwd" id="pass" placeholder="Password" required>
        <span id="userpass" class="text-danger font-weight-bold"></span>
    </div>
    <p class="emsg3 hidden">Use 6 or more characters with a mix of letters, numbers & symbols</p>
    
    
    <div class="form-group " style="font-size:14px;">
        <input type="checkbox" required><label> &nbsp;I agree
        <a  href="https://www.kwyk.store/terms-and-conditions">Terms and Conditions</a></label>
    </div>
    <!-- <a href="" class="forgot-pass">Forgot Password?</a> -->
    <button  type="submit" name="signup" class="btmn" >Sign Up</button>
    <!-- <p style="margin-top: 20px;">Already have an account? <a href="signin.php">Sign in</a></p> -->
    </form>  
    
      </div>
       
    </div>
  </div>
</div>


<?php
if(isset($_POST['log'])){
    $email=$_POST['eid'];
    $password=$_POST['password'];
    $email_search = "SELECT * FROM `signup` WHERE `Email` = '$email'";
    $query = mysqli_query($conn, $email_search);
    $record_count = mysqli_num_rows($query);

    if($record_count){
        $record = mysqli_fetch_assoc($query);
       
        $db_pass = $record['Password'];
        
        // $db_pass = $email_pass['Password'];
        // echo $password,$db_pass;
        $pass_verify = password_verify($password, $db_pass);
        echo $pass_verify;
        if($password==$db_pass)
        {
            echo "Login Successful"; 
            // session_start();
            $_SESSION["name"] = $record['Name'];  //retrive from db and store user name in session
            $_SESSION["log_id"] = $record['log_id'];
            $logid=$record['log_id'];

        }}?>
        <script>
            location.replace("http://localhost/kwykpr/test5.php");
            </script>
        <?php
}

?>

     
    <script>
        
     

       function out(){  
           location.replace("http://localhost/kwykpr/order_confirm.php");
       }
         
         
    </script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script><script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    
    <script type="text/javascript">
            $(document).ready(function()
            {

                //validation of user name
                
                $('.name').on('keypress keydown keyup',function(){
                    var $regexname=/^([a-zA-Z ]{2,30})$/;
                        if (!$(this).val().match($regexname)) {
                        // there is a mismatch, hence show the error message
                            $('.emsg').removeClass('hidden');
                            $('.emsg').show();
                        }
                    else{
                            // else, do not display message
                            $('.emsg').addClass('hidden');
                        }
                    });

                  

                    //Validation of mobile number
                    $('.mobile').on('keypress keydown keyup',function(){
                        var $regexname=/^(\+91[\-\s]?)?[0]?(91)?[789]\d{9}$/;
                            if (!$(this).val().match($regexname)) {
                            // there is a mismatch, hence show the error message
                                $('.emsg1').removeClass('hidden');
                                $('.emsg1').show();
                               
                            }
                        else{
                                // else, do not display message
                                $('.emsg1').addClass('hidden');
                            }
                        });



                        //Validation of email address
                     $('.email').on('keypress keydown keyup',function(){
                    var $regexname=/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
                        if (!$(this).val().match($regexname)) {
                        // there is a mismatch, hence show the error message
                            $('.emsg2').removeClass('hidden');
                            $('.emsg2').show();
                             
                        }
                    else{
                            // else, do not display message
                            $('.emsg2').addClass('hidden');
                        }
                    });


                    //Validation of password
                    $('.pwd').on('keypress keydown keyup',function(){
                    var $regexname=/^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}$/;
                        if (!$(this).val().match($regexname)) {
                        // there is a mismatch, hence show the error message
                            $('.emsg3').removeClass('hidden');
                            $('.emsg3').show();
                            
                        }
                    else{
                            // else, do not display message
                            $('.emsg3').addClass('hidden');
                        }
                    });





                });
                </script>

<script>

function validation()
       {
       var name = document.getElementById('user').value;
       var usermbl = document.getElementById('mbl').value;
       var userremail = document.getElementById('useremail').value;
       var usrpass = document.getElementById('pass').value;
       
        

       
       //Validation of user name
       var regname = /^([a-zA-Z ]{2,30})$/;
       var username = regname.test(name);
       if (username==false) 
       {
           
           document.getElementById('username').innerHTML="";
           return false;
           
       }
       else
           {
               document.getElementById('username').innerHTML="";
           }



       //Validation of mobile number
       var regname = /^(\+91[\-\s]?)?[0]?(91)?[789]\d{9}$/;
       var mblno = regname.test(usermbl);
       if (mblno==false) 
       {
           
           document.getElementById('mblno').innerHTML="";
           return false;
           
       }
       else
           {
               document.getElementById('mblno').innerHTML="";
           }


       //Validation of email address
       var regname = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
       var usremail = regname.test(userremail);
       if (usremail==false) 
       {
           
           document.getElementById('usremail').innerHTML="";
           return false;
           
       }
       else
           {
               document.getElementById('usremail').innerHTML="";
           }
       

       //Validation of password
       var regname = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}$/;
       var userpass = regname.test(usrpass);
       if (userpass==false) 
       {
           
           document.getElementById('userpass').innerHTML="";
           return false;
           
       }
       else
           {
               document.getElementById('userpass').innerHTML="";
           }
       }




       </script>
<?php
if(isset($_POST['signup']))
{
    //Get variables from the form.
    $name=$_POST['name'];
    $mobile = $_POST['mobile'];
    $email= $_POST['email'];
    $pwd = $_POST['pwd'];
    // $re_pwd = $_POST['re_pwd'];

    //Query for Inserting 
    $sql="insert into signup(log_typeID,Name,Mobile,Email,Password) values (103,'$name','$mobile','$email','$pwd')";

    //Executing it.

    // if ($result == TRUE)
    // {
    // }
    // else{
    //     echo "Error" .$sql."<br>".$conn->error;

    // }
    

    $emailquery = " select * from signup where Email='$email' ";
    $mobilequery = " select * from signup where Mobile='$mobile' ";

    $query = mysqli_query($conn,$emailquery,);
    $mob = mysqli_query($conn,$mobilequery,);


    $emailcount = mysqli_num_rows($query);
    $mobilecount = mysqli_num_rows($mob);

    if($emailcount>0 ){
        ?>
       <script>
                swal({
                    icon: "error",
                    title: "Email already exists please enter another email id!!!!",

                });
                // location.replace("http://localhost/kwykpr/signup_temp.php");
                

            </script>
            <?php
        
    }
    elseif($mobilecount>0){
        ?>
       <script>
                swal({
                    icon: "error",
                    title: "Mobile no already exists please enter another Mobile no.!!!!",

                });
                // location.replace("http://localhost/kwykpr/signup_temp.php");               

            </script>
            <?php
         
    }
    else{
        $insertquery = "insert into signup(log_typeID,Name,Mobile,Email,Password) values (103,'$name','$mobile','$email','$pwd')";

        $iquery = mysqli_query($conn, $insertquery);
        $conn->close();

        if($iquery)
        {
            ?>
            <script>
                swal({
                    icon: "success",
                    title: "Account Created Successfully",

                });
                location.replace("http://localhost/kwykpr/test5.php");
            </script>
            <?php
        }
        else
        {
            ?>
            <script>
                swal({
                    icon: "success",
                    title: "Account not Inserted",

                });
            </script>
            <?php
        }
        ?>
        <!-- <script>
            
            alert("Inserted Successfully");
        </script> -->
        <?php
  
    }
}

?>

</body>
</html>