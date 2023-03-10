<?php
session_start();
//include('cart.php');
include('conn.php'); 
//$logid=0;
$shop_id;
$logid=$_SESSION["log_id"];


   $queryshop="SELECT * FROM `shop`where log_id =$logid";
   $result_shop = mysqli_query($conn, $queryshop);
   if($row_shop = mysqli_fetch_array($result_shop)){
       $shopid = $row_shop['shop_id'];
       $sname = $row_shop['Sname'];
       $url=$row_shop['slink'];
       //print $sname;
       $shopaddr = $row_shop['Shopaddr'];
       $_SESSION["sid"] = $shopid;
       $_SESSION["sname"] = $sname;
       $_SESSION["saddr"] =$shopaddr;
       $_SESSION["surl"] =$url;
      
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
            <?php 
            echo $sname;
            ?>
        </title>
    <link rel="stylesheet" href="shoppage.css">
    <!-- <link rel="stylesheet" href="bank_validation.css">
    <link rel="stylesheet" href="login.css"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">  
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/9e5fee4591.js" crossorigin="anonymous"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="shortcut icon" href="White_on_Blue.png" type="image/x-icon">

    <script type="text/javascript">
    function FocusOnInput(){
        document.getElementById("prodlist").focus();
    }
    </script>
</head>
<style>
    .checked {
        color: orange;
    }
  
    .swal-text {
        display: block;
        text-align: center;
        margin: 22px;
        color: #001428;
    }

    .swal-button {
        border-radius: 2px;
        border: 1px solid #4BB1DF;
        background-color: #4BB1DF;
    }
    
    .swal-footer{
        text-align:center;
    }

    .dropdown {
        display: inline-block;
        position: relative;
    }

    .dropdown-content {
        position: fixed;
        display: none;
        min-width: 50px;
        background-color: #f9f9f9;
        z-index: 9999;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    }

    .dropdown-content a {
        padding: 12px 16px;
        color: black;
        display: block;
        text-decoration: none;
    }

    .dropdown-content a:hover {background-color: #f1f1f1}

    .dropdown:hover .dropdown-content {
        display: block;
    }

    .cart-content::-webkit-scrollbar {
        width : 3px;
    }
    
    .font{
        font-family: "Eras ITC", "Eras Bold ITC",  sans-serif !important;
    }
</style>
 
<body style=" background-color:#f3f3f3 ;"> 
     
    <div id="navbar">
        <ul>
            <!-- <li><i class="fa-solid fa-angle-left"></i></li> -->
            <!-- <?php echo '<img class="shop-logo" src="data:image;base64,'.base64_encode($row_shop['Shoplogo']).' " alt="">';?> -->
            <li class="nav-item"><?php echo' <img class="navlogo" src="data:image;base64,'.base64_encode($row_shop['Shoplogo']).' " alt="">';?></li>
            <li class="nav-item"><label for="type"></label>
            <select class="ordertype" name="delivery_mode" id="delivery_mode" onchange="location = this.value;" >
           <?php
                if(isset($_SESSION["delmode"]))
                   {
                    $delmode=$_SESSION["delmode"];
                    if($delmode=="Home Delivery")
                     { 
            ?>            
                        <option value="http://localhost/kwykpr/storefront.php?url=<?=$url;?>&delmode=HomeDelivery" selected>Home Delivery</option>
                        <option value="http://localhost/kwykpr/storefront.php?url=<?=$url;?>&delmode=Takeaway">TAKEAWAY</option>
            <?php         
                    }
                     else{
            ?>            
                        <option value="http://localhost/kwykpr/storefront.php?url=<?=$url;?>&delmode=HomeDelivery">Home Delivery </option>
                        <option value="http://localhost/kwykpr/storefront.php?url=<?=$url;?>&delmode=Takeaway" selected>TAKEAWAY</option>
            <?php         
                }
                     
                   }
                   else{

                  
            ?>
            
                <option value="http://localhost/kwykpr/storefront.php?url=<?=$url;?>&delmode=HomeDelivery"> Home Delivery</option>
                <option value="http://localhost/kwykpr/storefront.php?url=<?=$url;?>&delmode=Takeaway">TAKEAWAY</option>
            
            <?php
               }
            ?>
            </select>
            <script>
                                function delivery_mode_click(){
                                    //  window.alert("del_mode"); 
                                  let del_mode = document.getElementById("delivery_mode");
                                  del_mode .dispatchEvent(new Event('change'))
                                //document.write("< a href=myname.php?value="+value_select +">");
                                //let url="order_confirm.php?delmode=";
                                //  window.alert(""+del_mode);
                                //  location.replace("http://localhost/kwykpr/storefront.php?url=<?= $url;?>");
                                //   location.replace("http://localhost/kwykpr/order_confirm.php?delmode="+del_mode.value);
                                //document.write("<a  href="+url+""+del_mode+">");
                                }
            </script>
            <?php
            //  if(isset($_GET["delmode"]))
            //  {
                // $delmode=$_GET["delmode"];
                //     // print $delmode ;
                // $_SESSION["delmode"]=$delmode; 
            ?>    
                <script> 
                // location.replace("http://localhost/kwykpr/storefront.php?url=<?=$url;?>&delmode=<?=$delmode;?>");
                </script>
            <?php    
                
            //  }   
            ?>
        </li>
        <li class="nav-item">
            <input type="text" name="locateme" class="location"><button><i class="fa-solid fa-crosshairs"></i>Locate me</button>
        </li>
        <?php

        $logid=$_SESSION["log_id"];
        if(isset($logid) &&!empty($logid)){
        ?>
        <span class="nav-item" style="float:right"><div class="dropdown">
            <i class="fa-regular fa-user"></i><a class="navitem" href="http://localhost/kwykpr/storefront.php?url=<?=$url;?>"><?php echo $_SESSION["name"];?></a>
            <div class="dropdown-content">
                <form method="post">
                    <button class="logout" style="width:90px; border: none;text-align: center;text-decoration: none;cursor: pointer;background-color: #e7e7e7;color: black;" type="submit" name="signout" disabled>Logout</button>
                </form>
                <a href="order_history.php?url=<?= $url;?>">Orders</a>
            </div>
            </div>
        </span>
        <?php
        }
        else{
        ?>
        <span class="nav-item" style="float:right"><i class="fa-regular fa-user"></i><a class="navitem" data-toggle="modal" data-target="#myModal" href="#myModal">Login</a></span>
        <?php
        }
        ?>
    </ul>
</div>
<?php
if(isset($_POST['signout'])){
    // session_start();
    session_destroy();
    ?>
    
    <script>location.replace("http://localhost/kwykpr/signin_merchant.php");</script>; 
    <?php
    //session_destroy();
    exit();
}
?>
<div class="shopimage">
    <div class="left-content">
        <div class="flex-container">
        
                <div>
                    <?php echo '<img class="shop-logo" src="data:image;base64,'.base64_encode($row_shop['Shoplogo']).' " alt="">';?>
                    <!-- <img class="shop-logo" src="popular.png" alt=""> -->
                </div>
                <div class="right-container">
                    <h4 class="shop-name"><?php echo $row_shop['Sname']; ?></h4>
                    <div class="shoplocation">
                        <a class="shop-location" href="#location"><i class="fa-solid fa-location-dot" style="color: red;"></i><?php echo $row_shop['Shopaddr']; ?></a>
                    </div>
                    <div style="margin-left:10px;">Rating 
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star "></span>
                        <span class="fa fa-star "></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                    </div>
                </div>
            </div>
            <?php
                
                ?>
        </div>
        
        <div class="right-content">
            <?php echo '<img class="right-content" src="data:image;base64,'.base64_encode($row_shop['bkgdimage']).' " alt="">';?>
            <!-- <img class="right-content" src="Web/img/home.jpg" alt=""> -->
        </div>
        
    </div>

  
    <div id="banner-footer" class="banner-footer">
        <div class="search-div">
            <form action="storefront.php?url=<?= $url?>" method="post">
                <input type="text" class="search" name="search" placeholder="Search product">
                <input type="hidden" name="search_submit">
            </form>
        </div>
        
        <?php 
                   
                    $cat=$row_shop['category_id'];
                    $sql_cattype = "SELECT *FROM bizcategory WHERE category_id=$cat";
                        $run_cattype = mysqli_query($conn, $sql_cattype); 
                        $record_cattype = mysqli_fetch_assoc($run_cattype);
                        $cattype=$record_cattype['category_type'];
                        // print $cattype;
                     if($cattype === 'Food'){
                    ?>
            <div class="veg">        
            
                <label>
                    <input type="checkbox" id="veg">
                    <span class="checkbox-rectangle">Veg Only</span>
                </label>&nbsp;&nbsp;
           
                <label >
                    <input type="checkbox" id="nonveg">
                    <span class="checkbox-rectangle">Non-Veg Only</span>
                </label>
                <?php
                     }else if($cattype === 'Electronics'){
                        ?>
                    
                         <label>
                             <input type="checkbox" id="industrial">
                             <span class="checkbox-rectangle">Industrial</span>
                         </label>&nbsp;&nbsp;
                     
                         <label >
                             <input type="checkbox" id="domastics">
                             <span class="checkbox-rectangle">Domestics</span>
                         </label>
                         <?php
                     }
                     ?>
           
        </div>                        
    </div>
    
    <div class="grid-container" style="grid-template-columns: 250px 700px 250px;">
        <div class="grid-category">
            <div id="cart-fix" style="background-color: #fff;">
                <div class="row1">Category</div>
                <div class="row-content">
                    <div class="row-info">
                        <?php
                        
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
                                    if($i==1)
                                    {
                                       
                                        $_SESSION['default_menu'] =$recordprodtype_desc['ptype_desc'];
                                        
                                    }
                                    ?>
                        
                        <div class="row-type">
                            <a class = "na" href="?url=<?= $url?>&menu=<?= $recordprodtype_desc['ptype_desc'];?>"><?php echo $recordprodtype_desc['ptype_desc'];?></a>
                        </div>
                        <?php
                       
                                }
                            }
                        }
                        ?>

                        
                    </div>
                </div>
            </div>
        </div>
      
        <div id="modal01" class="w3-modal" onclick="this.style.display='none'">
            <span class="w3-button w3-hover-red w3-xlarge w3-display-topright">&times;</span>
            <div class="w3-modal-content w3-animate-zoom" style="background-color:transparent ;margin-left:600px;">
            <img id="img01" style="width:30%">
            </div>
        </div>

        <script>
        function onClick(element) {
            document.getElementById("img01").src = element.src;
            document.getElementById("modal01").style.display = "block";
        }
        </script>

        <div class="grid-menu" style="text-align: center;">
            <div class="product" style="width: auto; height:10%;">
                <div class="produt-top" style="margin-top: 20px;margin-bottom: 20px;overflow: auto; height: 500px;">
                    
                    <?php

if(isset($_GET['menu'])){
    $category = $_GET['menu'];
    $qty=1;

$record_prodcat= mysqli_query($conn,"select * from product_type where ptype_desc = '$category';");
if($rows_prodcat=mysqli_fetch_assoc($record_prodcat))
{
    
    $query= mysqli_query($conn,"select * from shopproduct where pro_ty_id =".$rows_prodcat['pro_ty_id']." and shop_id=$shopid ");
    while($rowss=mysqli_fetch_assoc($query)){
        
        $query1= mysqli_query($conn,"select * from product where product_status ='Live' and s_pro_id =".$rowss['s_pro_id']." ");
        while($row=mysqli_fetch_assoc($query1)){
     
            ?>     
                    <div class="product-side" style="background-color: #fff;margin: 0 30px;border-radius: 5px;">
                        <div class="product-list">
                            <?php
                                if($row['prodcat'] == 'veg'){
                            ?>
                            <div class="veg-non-veg">
                                <i class="fa-solid fa-circle" style="border: 1px solid green;color:green;"></i>  
                            </div>
                            <?php
                                }elseif($row['prodcat'] == 'nonveg'){
                            ?>
                            <div class="veg-non-veg">
                                <i class="fa-solid fa-circle" style="border: 1px solid brown;color:brown;"></i>  
                            </div>
                            <?php
                                }
                            ?>
                                <div class="product-img">
                                    <?php echo '<img class="shop-logo" onclick="onClick(this)"  src="data:image;base64,'.base64_encode($row['pr_pic']).' " alt="">';?>
                            </div>
                            <div class="product-name-main" style="overflow: hidden;padding: 0 0 10px;width: 100%;">
                                <div class="product-name">
                                    <div class="div1">
                                        <span><?php echo $row['pr_name']; ?></span>
                                    </div>
                                </div>
                                <div class="product-price">
                                    <div class="price-text">₹<?php echo $row['pr_price']; ?></div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
        }
                    }
            }
           
        }
            elseif (isset($_POST['search_submit'])) {
                    $searchString = mysqli_real_escape_string($conn, ($_POST['search']));
                    if ($searchString === "" || !ctype_alnum($searchString) || $searchString < 3) {
                        // echo "Invalid search string";
                        //echo '<script> alert("Enter product");</script>';
                        // exit();
                    }
                    $searchString = "%$searchString%";

                    // $sql = "SELECT * FROM product WHERE pr_name LIKE ? AND s_pro_id=(SELECT * FROM shopproduct WHERE shop_id=$shopid UNION ALL)";

                    $sql = "SELECT * FROM product WHERE s_pro_id IN (SELECT s_pro_id from shopproduct WHERE shop_id = $shopid) AND  pr_name LIKE ?"; 

             
                    $prepared_stmt = $conn->prepare($sql);
                    $prepared_stmt->bind_param('s', $searchString);
                    $prepared_stmt->execute();
                    $result = $prepared_stmt->get_result();
            
                    if ($result->num_rows === 0) {
                        ?>
                        <script>
                                 swal({
                                     icon: "error",
                                     title: "Product not Available!!",
                                 });
                     
                        </script>
                             <?php
                        exit();
            
                    } else {
                        // Process the result(s)
                        while ($row = $result->fetch_assoc()) {
                            
            ?>
            <div class="product-side" style="background-color: #fff;margin: 0 30px;border-radius: 5px;">
            <div id="prodlist" class="product-list">
                <?php
                    if($row['prodcat'] == 'veg'){
                ?>
                <div class="veg-non-veg">
                    <i class="fa-solid fa-circle" style="border: 1px solid green;color:green;"></i>  
                </div>
                <?php
                    }elseif($row['prodcat'] == 'nonveg'){
                ?>
                <div class="veg-non-veg">
                    <i class="fa-solid fa-circle" style="border: 1px solid brown;color:brown;"></i>  
                </div>
                <?php
                    }
                ?>
                    <div class="product-img">
                        <?php echo '<img class="shop-logo" onclick="onClick(this)"  src="data:image;base64,'.base64_encode($row['pr_pic']).' " alt="">';?>
                </div>
                <div class="product-name-main" style="overflow: hidden;padding: 0 0 10px;width: 100%;">
                    <div class="product-name">
                        <div class="div1">
                            <span><?php echo $row['pr_name']; ?></span>
                        </div>
                    </div>
                    <div class="product-price">
                        <div class="price-text">₹<?php echo $row['pr_price']; ?></div>
                       
                    </div>
                </div>
            </div>
        </div>

        <?php
          } 
        }  

    }
     
    else{

            $category = $_SESSION['default_menu'];
            if (isset($_SESSION['menuarray']) &&!empty($_SESSION['menuarray'])) {
                $menu_array =$_SESSION['menuarray'];
                if (in_array($category, array_keys($_SESSION['menuarray']))) {
                    foreach ($menu_array as $key => $value) { 
                        
                        // print $menu_array[$key]['quantity'];
                        // print $menu_array[$key]['id'];
                           
                        }  
                    }
                }
                

$record_prodcat= mysqli_query($conn,"select * from product_type where ptype_desc = '$category';");
if($rows_prodcat=mysqli_fetch_assoc($record_prodcat))
{
   
    $query= mysqli_query($conn,"select * from shopproduct where pro_ty_id =".$rows_prodcat['pro_ty_id']." and shop_id=$shopid ");
    while($rowss=mysqli_fetch_assoc($query)){
         
        $query1= mysqli_query($conn,"select * from product where product_status ='Live' and s_pro_id =".$rowss['s_pro_id']." ");
        while($row=mysqli_fetch_assoc($query1)){

          
            ?>
            
                    <div class="product-side" style="background-color: #fff;margin: 0 30px;border-radius: 5px;">
                        <div class="product-list">
                            <?php
                            if($row['prodcat'] == 'veg'){
                            
                            ?>
                            <div class="veg-non-veg">
                                <i class="fa-solid fa-circle" style="border: 1px solid green;color:green;"></i>  
                            </div>
                            <?php
                            }elseif($row['prodcat'] == 'nonveg'){
                                ?>
                                <div class="veg-non-veg">
                                <i class="fa-solid fa-circle" style="border: 1px solid brown;color:brown;"></i>  
                                </div>
                                <?php
                            }
                            ?>
                            <div class="product-img">
                                <?php echo '<img class="shop-logo" onclick="onClick(this)"  src="data:image;base64,'.base64_encode($row['pr_pic']).' " alt="">';?>
                            </div>
                            <div class="product-name-main" style="overflow: hidden;padding: 0 0 10px;width: 100%;">
                                <div class="product-name">
                                    <div class="div1">
                                        <span><?php echo $row['pr_name']; ?></span>
                                    </div>
                                </div>
                                <div class="product-price">
                                    <div class="price-text">₹<?php echo $row['pr_price']; ?></div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    
                
                    <?php
        }

                    }
            }
  
        }
                ?>
                </div>
            </div>
        
        </div>
        
        <div class="grid-cart">
        <div id="cart-fix" style="background-color: #fff;">
                <div class="cart">
                    <div class="cart-text">Cart</div>
                    <div id="remove" class="cart-text">
                        <a href="?url=<?= $url?>&action=empty"><i  class="fa-regular fa-trash-can"></i></a>    
                    </div>
                    </div>
                
                    <div class="cart-content">
                        <div id="empty-cart">
                            <span>Your Cart Empty</span>
                                <span>
                                <img class="emptycart" src="Web\emptyCart.png" alt="">
                                </span>
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
                </div>
                <div class="footer-center">
                    <h3>About us</h3>
                    <p><?php echo $row['aboutus'] ?></p>
                </div>
                <div class="footer-right">
                    <h3>Contact us</h3>
                    <p><i class="fa-brands fa-whatsapp"></i><?php echo $row['S_Contact']; ?></p>
                    <p><i class="fa-solid fa-envelope-open"></i><?php echo $row['semail'];?></p>
                    <p><i class="fa-solid fa-store"></i><?php echo $row['Shopaddr']; ?></p>
                    <div class="follow">Follow us on 
                        <a href="<?php echo $row['facebook'] ?>" target="_blank"><img style="width: 40px;height: 40px;" src="Web\img\png\008-facebook.png" alt=""></a>
                        <a href="<?php echo $row['instagram'] ?>" target="_blank"><img style="width: 40px;height: 40px;" src="Web\img\png\011-instagram.png" alt=""></a>
                        <a href="<?php echo $row['twitter'] ?>" target="_blank"><img style="width: 40px;height: 40px;" src="Web\img\png\001-twitter.png" alt=""></a>
                    </div>
                </div>
            
            
            <div class="footer-bottom" style="border-top: 1px solid whitesmoke">
                <div style="text-align: left;">
                    <center>© <?php echo $row['Sname']?>. All Right Reserved. </center>
                </div>
                <div style="text-align: right;">
                    <a style="color: aliceblue;" href="https://www.kwyk.store">Powered by: <b class="font" style="color: #4bb1df;">Kwyk</b></a>

                </div>
            </div>
            <?php
            }
            ?>
        </footer>
    </div>

    