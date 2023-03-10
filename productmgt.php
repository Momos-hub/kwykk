<?php
 include('common.php');
 include('conn.php');
 //include('common2.php');
 error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KWYK | Product Mangement</title>
 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">  
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css"> -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css"> -->
 
    <link rel="stylesheet" href="addproduct.css">
    <link rel="stylesheet" href="productmanage.css">
</head>
<style>
    *{
        font-family: 'Montserrat';
    }
    ::-webkit-scrollbar {
        width: 0px;
    }
    .d-flex {
    display: block!important;
}
 .dropbtn {
  background-color: #4BB1DF;
  color: white;
  padding: 12px;
  font-size: 16px !important;
  border: none;
  border-radius: 12px;
  cursor: pointer;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f3f3f3;
  min-width: 100%;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #A5D8EF;}

.dropdown:hover .dropdown-content {
  display: block;
}

.dropdown:hover .dropbtn {
  background-color: #4BB1DF;
}



.button{
    padding: 0.7rem 1.5rem;
    border: 0px solid #001428;
    background-color: #4bb1df !important;
    color: #fff !important;
    border-radius: 5px;
    cursor: pointer;
    float: right !important;
    margin-right: 5px !important;
    font-size: 15px !important;
}


.modal-box{ font-family: 'MONTSERRAT'; }
.show-modal{
    color: #fff;
    background: #4bb1df;
    font-size: 18px;
    font-weight: 600;
    text-transform: capitalize;
    padding: 10px 15px;
    margin: 200px auto 0;
    border: none;
    outline: none;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    display: block;
    transition: all 0.3s ease 0s;
}
.show-modal:hover,
.show-modal:focus{
    color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.4);
    outline: none;
}
.modal-dialog{
    width: 400px;
    margin: 70px auto 0;
}
.modal-dialog{ transform: scale(0.5); }
.modal-dialog{ transform: scale(1); }
.modal-dialog .modal-content{
    /* text-align: center; */
    border: none;
}
.modal-content .close{
    color: #fff;
    background: #4bb1df;
    font-size: 25px;
    font-weight: 400;
    text-shadow: none;
    line-height: 27px;
    height: 25px;
    width: 25px;
    border-radius: 50%;
    overflow: hidden;
    opacity: 1;
    position: absolute;
    left: auto;
    right: 8px;
    top: 8px;
    z-index: 1;
    transition: all 0.3s;
}
.modal-content .close:hover{
    color: #fff;
    box-shadow: 0 0 5px rgba(0,0,0,0.5);
}
.close:focus{ outline: none; }
.modal-body{ padding: 60px 40px 40px !important; }
.modal-body .title{
    color: #4bb1df;
    font-size: 33px;
    font-weight: 700;
    letter-spacing: 1px;
    margin: 0 0 10px;
}
.modal-body .description{
    color: #9A9EA9;
    font-size: 16px;
    margin: 0 0 20px;
}
.modal-body .form-group{
    text-align: left;
    margin-bottom: 20px;
    position: relative;
}
.modal-body .input-icon{
    color: #777;
    font-size: 18px;
    transform: translateY(-50%);
    position: absolute;
    top: 50%;
    left: 20px;
}
.modal-body .form-control{
    font-size: 17px;
    height: 45px;
    width: 100%;
    /* padding: 6px 0 6px 50px; */
    margin: 0 auto;
    border: 2px solid #eee;
    border-radius: 5px;
    box-shadow: none;
    outline: none;
}
.form-control::placeholder{
    color: #AEAFB1;
}
.form-group.checkbox{
    width: 130px;
    margin-top: 0;
    display: inline-block;
}
.form-group.checkbox label{
    color: #9A9EA9;
    font-weight: normal;
}
 
.modal-body .forgot-pass{
    color: #001428;
    font-size: 13px;
    text-align: right;
    width: calc(100% - 135px);
    margin: 2px 0;
    display: inline-block;
    vertical-align: top;
    transition: all 0.3s ease 0s;
}
.forgot-pass:hover{
    color: #9A9EA9;
    text-decoration: underline;
}
.modal-content .modal-body .btn{
    background : #4bb1df;
    color:#001428;
    font-size: 16px;
    font-weight: 500;
    letter-spacing: 1px;
    text-transform: uppercase;
    line-height: 38px;
    width: 100%;
    height: 40px;
    padding: 0;
    border: none;
    border-radius: 5px;
    border: none;
    display: inline-block;
    transition: all 0.6s ease 0s;
}
.modal-content .modal-body .btn:hover{
    color: #fff;
    letter-spacing: 2px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
}
.modal-content .modal-body .btn:focus{ outline: none; }
@media only screen and (max-width: 480px){
    .modal-dialog{ width: 95% !important; }
    .modal-content .modal-body{
        padding: 60px 20px 40px !important;
    }
}

*{
    font-family: 'Montserrat';
    }

.dis_img{
    display: flex;
    width: 60px;
    /* height: 17vw; */
    /* position: sticky; top: 0px; */
    margin: 0 auto 20px;
    justify-content: center;
    padding: 0;
    align-items: center;
    margin-top:10px;
    opacity: 1;
    display: block;
    /* height: auto; */
    transition: .5s ease;
    backface-visibility: hidden;
}

.middle {
  transition: .5s ease;
  opacity: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  text-align: center;
}

.form-group:hover .image {
  opacity: 0.3;
}

.form-group:hover .middle {
  opacity: 1;
}

/* #a5d8ef1c */
</style>
<body>
    <div class="row">   
    <div class="" style="width:300px;height:100%; border-right: 1px solid rgba(0,0,0,.1); height: calc(100vh - 90px);">
                <?php
                   include('common3.php');
                   $logid=$_SESSION["log_id"];
                ?>
    </div>
        <div class="space1 col-md-9" style="">
                <div class="addprod">
                <div style="margin: 20px;" class="box">

                <button type="button" class="dropbtn" data-toggle="modal" data-target="#myModal">
                    Add Product
                    </button>

                    
        <div class="modal-box">
                <!-- Button trigger modal -->
 
                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content clearfix">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                            <div class="modal-body">
                            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
                            <div style="margin: 20px;" class="box panel">
                                <label for="biz_cat" class="form-label">Select Category:</label>
                                    <select class="" aria-label="" name="Product_Type">
                                    <!-- <option selected>Select Product Type</option> -->
                                    <?php                                 
                                    $log_id=$_SESSION["log_id"];
                                    $shop_id = "SELECT * FROM shop WHERE log_id =$log_id";

                                    $search_shop = mysqli_query($conn, $shop_id);
                                    $record_count = mysqli_num_rows($search_shop);
                                    if($record_count){
                                        $record = mysqli_fetch_assoc($search_shop);
                                        $shopid= $record['shop_id'];
                                        $pro_type= "SELECT * FROM shopproduct WHERE shop_id =$shopid"; 
                                        $search_prodtype = mysqli_query($conn, $pro_type);         
                                        $record_count2 = mysqli_num_rows($search_prodtype);
                                        if($record_count2){
                                            for($i=1;$i<=$record_count2;$i++){
                                                $recordprodtype = mysqli_fetch_assoc($search_prodtype);
                                                $prodtyid= $recordprodtype['pro_ty_id'];

                                                 $pro_type_desc= "SELECT * FROM product_type WHERE pro_ty_id= $prodtyid"; 
                                                 $desc_prodtype = mysqli_query($conn, $pro_type_desc);                           
                                                 $record_count_desc = mysqli_num_rows($desc_prodtype);
                                                 if($record_count_desc){
                                                    $recordprodtype_desc = mysqli_fetch_assoc($desc_prodtype);
                                    ?>     
                                        <option value="<?php echo $recordprodtype_desc["pro_ty_id"] ?>">
                                        <?php echo $recordprodtype_desc["ptype_desc"] 
                                       

                                       
                                       ?></option>; 
                                    <?php
                                                } 
                                            }
                                        }  
                                    }
                                    ?> 
                            <!-- <option value="1">South indian</option> -->
                                    </select>
                            </div>
                            <div class="box productname">
                                <label for="">Product Name*</label>
                                <input type="text" class="form-control" id="productname" placeholder="Product name" name="productname" required="required">
                            </div>
                            <p class="emsgname hidden">Please enter a valid product name</p>
                            
                            <?php 
                            //include('conn.php');
                            $log_id = $_SESSION['log_id'];
                            $sql = "SELECT *FROM `shop` WHERE `log_id`=$log_id";

                            $run = mysqli_query($conn, $sql); 
                            $record_count = mysqli_fetch_assoc($run);
                            $cat=$record_count['category_id'];
                            // echo $cat;
                            if($cat === '2001'){
                            ?>
                            <label for="">Product Category</label>
                            <div class="form-check">
                                <input class="form-check-input" name="chk" type="checkbox" value="veg" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Veg
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="chk" type="checkbox" value="nonveg" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Non-Veg
                                </label>
                            </div>
                            <?php
                            }
                            elseif($cat === '2003'){
                            ?>  
                            <label for="">Product Category</label>
                            <div class="form-check">
                                <input class="form-check-input" name="chk[]" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Industrial
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="chk[]" type="checkbox" value="" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Domestic
                                </label>
                            </div>
                            <?php
                            }
                            ?>
                            <script>
                                $(document).ready(function(){
                                    $('input:checkbox').click(function() {
                                        $('input:checkbox').not(this).prop('checked', false);
                                    });
                                });
                            </script>  
         
                            <div class="box productdesc">
                            <label for="">Product Description</label>
                                <input  type="text" class="form-control" id="productdesc" placeholder="Product description" name="productdesc">
                                <!-- <p><span class="emsgdesc hidden">Please enter a valid description</span></p> -->
                            </div>

                            <div class="box productimage">
                                <label for="">Upload image</label>
                                <input type="file" class="form-control" name="productimage1" id="formFile" accept="image/png, image/jpeg, image/jpg">
                                <!-- <input style="width: 700px;" name="productimage1" class="form-control" type="file" id="shoppan"> -->

                                <!-- <label for="">Upload image*</label>
                                <input style="width: 700px;" type="file" class="form-control" id="exampleInputFName" aria-describedby="Productnamehelp" name="productimage2" required> -->
                            </div>

                            <div class=" box productprice">
                            <label for="">Product Price</label>
                                <input type="number" min="0" class="form-control" id="productprice" aria-describedby="" placeholder="Enter price" name="productprice"  required>
                            </div>
                            <p class="emsgprice hidden">Please enter a valid amount</p>

                            

                             <!-- <script type="text/javascript">
                                $(document).ready(function(){
                                    $('.productname').on('keypress keydown keyup',function(){
                                        var $regexname=/^(?!\s*$).+$/;
                                        if (!$(this).val().match($regexname)) {
                                            // there is a mismatch, hence show the error message
                                            $('.emsgname').removeClass('hidden');
                                            $('.emsgname').show();
                                        }
                                        else{
                                            // else, do not display message
                                            $('.emsgname').addClass('hidden');
                                        }
                                    });

                                    $('.productprice').on('keypress keydown keyup',function(){
                                        var $regexname=/^[0-9]*\d$/;
                                        if (!$(this).val().match($regexname)) {
                                            // there is a mismatch, hence show the error message
                                            $('.emsgprice').removeClass('hidden');
                                            $('.emsgprice').show();
                                        }
                                        else{
                                            // else, do not display message
                                            $('.emsgprice').addClass('hidden'); 
                                        }
                                    });
                                });
                            </script>  -->

                            <section style="text-align: center;">
                                <!-- <button class="btn btn-primary me-auto" name="Add Product">Add Product</button> -->
                                <input type=submit class="btn btn-primary me-auto" name="AddProduct" value="Add Product">
                            </section>
                            </form>
                                 
                        </div>
                    </div>
                </div>
            </div>
        </div>
         
        <?php

            if(isset($_POST['AddProduct'])){
                $producttype_id = $_POST['Product_Type']; 
                $productname = $_POST['productname']; 
                $productdesc = $_POST['productdesc'];
                $prodcat = $_POST['chk'];
                //echo $prodcat;

                // echo $productname;
                $file_pr_pic1 = addslashes(file_get_contents($_FILES["productimage1"]["tmp_name"])); 
                $productprice = $_POST['productprice'];
                $queryS_pro_id="SELECT * FROM shopproduct WHERE pro_ty_id=$producttype_id";
                $search_sp_id= mysqli_query($conn, $queryS_pro_id);
                $record_spid = mysqli_num_rows($search_sp_id);
                if($record_spid){
                    $recordspid = mysqli_fetch_assoc($search_sp_id);
                }
                $S_pid=$recordspid["s_pro_id"];
                //  echo $S_pid;

                $query = "INSERT into product(pr_name,pr_desc,pr_pic,pr_price,GSTper,s_pro_id,product_status,prodcat) values('$productname', '$productdesc','$file_pr_pic1',$productprice,5, $S_pid ,'Live','$prodcat')";
                //$query = "INSERT into product(pr_name,pr_desc,pr_price,S_prod_id) values ('paper dosa', 'delicious',150,4001)";
                //   $query="INSERT INTO product (prodcat) VALUES ('".$checkbox[$i]. "')";  
                $run = mysqli_query($conn, $query);
                if($run){
                ?>
                <script>
                    swal({
                        icon: "success",
                        title: "Product Added Successfully",
                    });
                </script>
                <!-- <script> location.replace("http://localhost/kwykpr/productmanage.php");</script> -->
                <?php
                }
            }
        ?>

            <label for="category" class="form-label">Select Category:</label>
            <select class="" aria-label="" name="Product_Type" onchange="location = this.value;">
                <option selected>--All-- 

               
            </option>
                
              
                
                <?php
                //fetch the shop_id
                $shop_id = "SELECT * FROM shop WHERE log_id =$logid";
                $search_shop = mysqli_query($conn, $shop_id);
                $record_count = mysqli_num_rows($search_shop);
        
                if($record_count){
                    $record = mysqli_fetch_assoc($search_shop);
                    $shopid= $record['shop_id'];
                    $sname=$record['Sname'];
                    $bizcategoryid=$record['category_id'];
                ?>
            
                <?php                                            

                //fetch the categories of product
                $pro_type= "SELECT * FROM shopproduct WHERE shop_id =$shopid"; 
                $search_prodtype = mysqli_query($conn, $pro_type);

                $record_count2 = mysqli_num_rows($search_prodtype);
                
                $type_desc_List1 = array();
                if($record_count2){
                    $j=0;                
                    for($i=1;$i<=$record_count2;$i++){
                        $recordprodtype = mysqli_fetch_assoc($search_prodtype);
                        $prodtyid= $recordprodtype['pro_ty_id'];
                        $sproid=$recordprodtype['s_pro_id'];
   
                        $pro_type_desc= "SELECT * FROM product_type WHERE pro_ty_id= $prodtyid"; 
                        $desc_prodtype = mysqli_query($conn, $pro_type_desc);

                        $record_count_desc = mysqli_num_rows($desc_prodtype);
                
                        if($record_count_desc){
                            $recordprodtype_desc = mysqli_fetch_assoc($desc_prodtype);
                    ?>                      
                
                <option onclick="getcat($prodtyid)" value="http://localhost/kwykpr/productmgt.php?cat=<?php echo $recordprodtype_desc["pro_ty_id"] ?>">
                <?php echo $recordprodtype_desc["ptype_desc"]  ?>
     

            </option>; 
                
                     
    <?php 
                        }
                    }
                }
                
            }
            
            
    ?>
                <script>
                    function getcat(prodtype){
                        location.replace("http://localhost/kwykpr/productmgt.php?cat="+prodtype);
                    }
                </script>    
            </select>
        </div>  
                    <!-- <h4 class="menu">Product List of  <?php //echo $sname;?></h4>
                    <table style="width:70%; border-collapse: collapse" align="center">
                        <tr>
                            <th>Sr. No.</th>
                            <th>Product</th>                    
                        </tr>   -->
        <?php                     
            $j=$j+1;
            if(isset($_GET["cat"])){
        ?>
        
        <p style="font-size: 20px;font-weight: 500;" class="menu">Product List of  <?php echo $sname;?></p>
        <table style="width:100%; align=center">
            <tr>
                <th>Sr. No.</th>
                <th>Product</th>
                <th>Product Image</th>
                <th>Product Price</th>
                <th>Actions</th>
                <!-- <th>Live/Disable</th>-->
            </tr>  
            
            <?php
                //Displaying product List    
                $prod_tyid=$_GET["cat"];
                $products="SELECT * FROM shopproduct WHERE pro_ty_id= $prod_tyid";
                $product_rows = mysqli_query($conn, $products);
                $record_count_product = mysqli_num_rows($product_rows);
                if($record_count_product){
                    for($k=1;$k<=$record_count_product;$k++){
                        $recordproducts = mysqli_fetch_assoc($product_rows);
                        $sproid=$recordproducts["s_pro_id"];
                        $_SESSION["spid"]=$sproid;
                                
                        $sproduct="SELECT * FROM product WHERE s_pro_id= $sproid";
                        $sproduct_rows= mysqli_query($conn, $sproduct);
                        $record_count_sproduct = mysqli_num_rows($sproduct_rows);
                        if($record_count_sproduct){
                            for($p=1;$p<=$record_count_sproduct;$p++){ 
                                $record_sproduct = mysqli_fetch_assoc($sproduct_rows);
                                $temp=$record_sproduct["pr_id"];
                                $product_stat=$record_sproduct["product_status"];  
                                // $record_sproduct["pr_pic"];
                ?>        
                
                
            
            <tr>
                <td><?php echo $p ?></td>
                <td><?php echo $record_sproduct["pr_name"] ?></td>
                <td><?php echo '<img class="dis_img" onclick="onClick(this)" class="w3-hover-opacity" style="cursor:pointer;" src="data:image;base64,'.base64_encode($record_sproduct["pr_pic"]).' " alt="" >';?>
                
                
                <div id="modal01" class="w3-modal" onclick="this.style.display='none'">
                    <span class="w3-button w3-hover-red w3-xlarge w3-display-topright">&times;</span>
                    <div class="w3-modal-content w3-animate-zoom">
                        <img id="img01" style="width:40%">
                    </div>
                </div>



                <style>
                    .w3-modal-content{
                        height:20%;
                        align: center;
                        opacity:100%;
                        margin-top:100px;
                        /* margin-left:600px; */
                        background-color:transparent;
                    }
                </style>
                
                <script>
                function onClick(element) {
                    document.getElementById("img01").src = element.src;
                    document.getElementById("modal01").style.display = "block";
                }
                </script>
                </td>
                <td><?php echo $record_sproduct["pr_price"] ?></td>
                <!-- <select name="product_stat" class="form-control" id="product_stat" onchange="location = this.value;" >  -->
                <td><div class="dropdown">
                        <a class="dropbtn"><?php echo $product_stat;?><i class="fa-solid fa-chevron-down"></i></a>
                        <div class="dropdown-content">
                            <?php
                            if($product_stat==='Live'){
                            ?>
                            <!-- <a href="http://localhost/kwykpr/productmgt.php?liv=<?= $record_sproduct['pr_id'];?>">Live</a> -->
                            <a href="http://localhost/kwykpr/productmgt.php?dis=<?= $record_sproduct['pr_id'];?>">Disable</a>
                            <a href="http://localhost/kwykpr/productmgt.php?edit=<?= $record_sproduct['pr_id'];?>" >Edit</a>
                            <a href="http://localhost/kwykpr/productmgt.php?del=<?= $record_sproduct['pr_id'];?>">Delete</a>
                            <?php
                            }
                            else{
                            ?>
                            <a href="http://localhost/kwykpr/productmgt.php?liv=<?= $record_sproduct['pr_id'];?>">Live</a>
                            <a href="http://localhost/kwykpr/productmgt.php?edit=<?= $record_sproduct['pr_id'];?>">Edit</a>
                            <a href="http://localhost/kwykpr/productmgt.php?del=<?= $record_sproduct['pr_id'];?>">Delete</a>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </td>
                    <?php
                        }
                    ?>  
            </tr>       
            <?php
                }
            }
            }
            }
            ?>
             
             
            <?php
            if(isset($_GET["del"])){
                $sproid=$_GET["del"];
                // print "id=".$protyid ;
                // echo $sproid;
                $query = "DELETE FROM product WHERE pr_id=$sproid";
                $run = mysqli_query($conn, $query);
                if($run){
                    echo '<script> alert("Product Deleted");</script>';
                }
                else{
                    echo "No Product Deleted!!";
                }
            }
            ?>
             
            <?php
               if(isset($_GET["edit"]))
               {
                $prid=$_GET["edit"];
                $_SESSION['id'] = $prid;
                $query1="SELECT * FROM product where pr_id = $prid";
                $result = mysqli_query($conn, $query1);
                while($row = mysqli_fetch_array($result)){
            ?>
                    <div class="modal-body" style="width: 60%; margin-left: 18%;border-radius: 2rem;box-shadow: 0 0 5px rgba(0,0,0,0.5);">
                    <!-- <div class="modal-body"> -->
                        <div class="add">
                             <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" onsubmit="return validation()" enctype="multipart/form-data">              
                            <div class="box productname">
                            <label for="">Product Name*</label>
                                <input type="text" class="form-control" id="productname" name="productname" value= "<?php echo $row['pr_name'];?> " required="required">
                            <!-- <p><span class="emsgname hidden">Please enter a valid product name</span></p> -->
                            </div>
                            <?php 
                                //include('conn.php');
                                $log_id = $_SESSION['log_id'];
                                $sql = "SELECT *FROM `shop` WHERE `log_id`=$log_id";
                                
                                $run = mysqli_query($conn, $sql); 
                                $record_count = mysqli_fetch_assoc($run);
                                $cat=$record_count['category_id'];
                                // echo $cat;
                                if($cat == '2001' || $cat == '2003'){
                                ?>

                            <div class="box prodcat">
                                <label for="">Product Category</label>
                                <input type="text" class="form-control" id="prodcut" value= "<?php echo $row['prodcat'];?>" name="productdesc">
                                <!-- <p><span class="emsgdesc hidden">Please enter a valid description</span></p> -->
                            </div>
                            <?php
                                }
                            ?>

                            <div class="box productdesc">
                            <label for="">Product Description</label>
                                <input   type="text" class="form-control" id="productdesc" value= "<?php echo $row['pr_desc'];?>" name="productdesc">
                                <!-- <p><span class="emsgdesc hidden">Please enter a valid description</span></p> -->
                            </div>
                            <div class="box productimage">
                                <label for="">Upload Product image</label> 
                                <input type="file" class="form-control" name="productimage1" id="formFile" accept="image/png, image/jpeg, image/jpg">
                                <?php echo '<img class="dis_img" onclick="onClick(this)" class="w3-hover-opacity" style="cursor:pointer;" src="data:image;base64,'.base64_encode($row['pr_pic']).' " alt="" >';?>
                                    <div class="middle" style="margin-top:70px;">
                                        <div class="text">Click to expand</div>
                                    </div>
                            </div>
                            <div id="modal01" class="w3-modal" onclick="this.style.display='none'">
                                <span class="w3-button w3-hover-red w3-xlarge w3-display-topright">&times;</span>
                                <div class="w3-modal-content w3-animate-zoom">
                                    <img id="img01" style="width:40%">
                                </div>
                            </div>

                        <style>
                            .w3-modal-content{
                                height:20%;
                                align: center;
                                opacity:100%;
                                margin-top:100px;
                                margin-left:600px;
                                background-color:transparent;
                            }
                        </style>
                        
                        <script>
                            function onClick(element) {
                                document.getElementById("img01").src = element.src;
                                document.getElementById("modal01").style.display = "block";
                            }
                        </script>

                        <!-- <div  class=" box productprice">
                            <label for="">Product Price*</label>
                            <input type="text" class="form-control" id="productprice" aria-describedby="priceHelp" value="<?php echo $row['pr_price'];?>" name="productprice" required>
                            <span id="productprice" class="text-danger font-weight-bold"></span>
                            <p><span class="emsgprice hidden">Please enter a valid amount  </span></p>

                            
                        </div>                     -->
                        <section style= "text-align: center;">
                            <!-- <button class="btn btn-primary me-auto" name="Add Product">Add Product</button> -->
                            <input type=submit style="float:none !important" class="button" name="Update" value="Update">
                            <input id="close"style="float:none !important"  class="button" type="submit" name="close" value="Close">
                        </section>

                    <?php
                        if(isset($_POST['close'])){
                            echo '<script>location.replace("http://localhost/kwykpr/setstore.php");</script>';
                        }
                    ?>

                    <script type="text/javascript">
                        $(document).ready(function(){
                            $('.productprice').on('keypress keydown keyup',function(){
                                var $regexname=/^[0-9]*\d$/;
                                if (!$(this).val().match($regexname)) {
                                    // there is a mismatch, hence show the error message
                                    $('.emsgprice').removeClass('hidden');
                                    $('.emsgprice').show();
                                }
                                else{
                                    // else, do not display message
                                    $('.emsgname').addClass('hidden');
                                }
                            });
                        });

                    </script>


                            </form>
                    
                        </div>         
                    <!-- </div> -->
                    </div>
                <?php
                    }
                }   
                ?>
                </div>
            </div>
        </div> 

    <?php
    // $spid=$_SESSION["spid"];

    if(isset($_POST['Update'])){ 
        $prid=$_SESSION['id'];
        $productname = $_POST['productname']; 
        $productdesc = $_POST['productdesc'];
        $file_pr_pic1 = addslashes(file_get_contents($_FILES["productimage1"]["tmp_name"])); 
        $productprice = $_POST['productprice'];
        // echo $pr_id;
        $updatequery="UPDATE `product` SET  `pr_name`='$productname',`pr_desc`='$productdesc',`pr_pic`='$file_pr_pic1',`pr_price`='$productprice'  WHERE pr_id = $prid";
        $run = mysqli_query($conn, $updatequery);
        if ($run) {
            echo' <script>swal({
                icon: "success",
                title: "Product Updated",
                });
                </script>';
            unset($_SESSION['id']);
        } 
    }

?> 
        </table>   
    </div>
    </form>
    </div>
    </div>
     
<?php
    if(isset($_GET["liv"])){
        $pid=$_GET["liv"];
        // print "id=".$protyid ;
        // echo $sproid;
        $check="SELECT * FROM `product` WHERE pr_id= $pid";
        $run = mysqli_query($conn, $check);
        $record = mysqli_fetch_assoc($run);
        $productstatus= $record['product_status'];
        // echo $productstatus;
        if($productstatus === 'Live'){
            echo '<script> alert("Product is Already Live");</script>';                   
        }
        else{
            $query = "UPDATE `product` SET  `product_status`='Live' WHERE pr_id =$pid ";
            $run = mysqli_query($conn, $query);
            if($run){
                echo '<script> alert("Product is Live");</script>';                   
            }
        }
    }


    if(isset($_GET["dis"])){
        $pid=$_GET["dis"];
        // print "id=".$protyid ;
        // echo $sproid;
        $check="SELECT * FROM `product` WHERE pr_id= $pid ";
        $run = mysqli_query($conn, $check);
        $record = mysqli_fetch_assoc($run);
        $productstatus= $record['product_status'];
        // echo $productstatus;
        if($productstatus === 'Disable'){
            echo '<script> alert("Product is Already Disabled");</script>';                   
        }
        else{
            $query = "UPDATE `product` SET  `product_status`='Disable' WHERE pr_id =$pid";
            $run = mysqli_query($conn, $query);
            if($run){
                echo '<script> alert("Product Disabled");</script>';                   
                    
               
            }
        }
    }
?>  


 
            
</body>
</html> 
