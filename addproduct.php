<?php
//  session_start();
 include('common.php');
 include('conn.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KWYK | Add Product</title>
    <link rel="stylesheet" href="addproduct.css">
    <link rel="stylesheet" href="bankdetail.css">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>
<style>
    
</style>
<body>
<div class="row">
            <div class="index col-md-3" style="border-right: 1px solid rgba(0,0,0,.1);">
                <?php
                    include('common3.php');
                    $log_id=$_SESSION["log_id"];
                ?>
            </div>

            <div class="space1 col-md-9">
                <div class="addprod">
                    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" onsubmit="return validation()" enctype="multipart/form-data">
                     <div style="margin: 20px;" class="box panel">
                     <label for="biz_cat" class="form-label">Select Menu:</label>
                        <select class="" aria-label="" name="Product_Type">
                            <!-- <option selected>Select Product Type</option> -->
    <?php                                 
        
                            

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
                                            
           <option value="<?php echo $recordprodtype_desc["pro_ty_id"] ?>"><?php echo $recordprodtype_desc["ptype_desc"] ?></option>; 
                                
          <?php
                  } 
                }
              }  
            }
                            
          ?> 
                            <!-- <option value="1">South indian</option> -->
                        </select>
                        </div>


                        <!-- <div style="margin: 20px; width: 900px;"  class="form-row"> -->
                         <div class="form-group col-md-6">
                        
                        <label for="">Product Name</label>
                            <input style="width: 700px;" type="text" class="form-control productname" name="productname" id="inputPassword4" placeholder="Product name" name="productname" required="required">
                            <span id="prdname" class="text-danger font-weight-bold"></span>
                            <p><span class="emsgname hidden">Please enter a valid product name</span></p>
                        </div>
        

                        <div style="margin: 20px;" class="box productdesc">
                        <label for="">Product Description</label>
                            <input style="width: 700px;" type="text" class="form-control" id="productdesc" placeholder="Product description" name="productdesc">
                            <p><span class="emsgdesc hidden">Please enter a valid description</span></p>
                        </div>

                        <div style="margin: 20px;" class="box productimage">
                            <label for="">Upload image</label>
                            <input style="width: 700px;"  type="file" multiple class="form-control" name="productimage1" id="formFile" accept="image/png, image/jpeg, image/jpg">
                            <!-- <input style="width: 700px;" name="productimage1" class="form-control" type="file" id="shoppan"> -->

                            <!-- <label for="">Upload image*</label>
                            <input style="width: 700px;" type="file" class="form-control" id="exampleInputFName" aria-describedby="Productnamehelp" name="productimage2" required> -->
                        </div>

                        <!-- <div style="margin: 20px; width: 900px;"  class="form-row"> -->
                         <div class="form-group col-md-6">
                        <label for="">Product Price</label>
                            <input type="text" style="width: 700px;" class="form-control productprice" id="productprice"  aria-describedby="priceHelp" placeholder="Enter price" name="productprice" required>
                            <span id="prdprice" class="text-danger font-weight-bold"></span>
                            <p><span class="emsgprice hidden">Please enter a valid amount</span></p>
                        </div>

                       

                        <section style="margin: 20px;" style="text-align: center;">
                        
                        <!-- <button class="btn btn-primary me-auto" name="Add Product">Add Product</button> -->
                        <input type=submit class="btn btn-primary me-auto" name="AddProduct" value="Add Product">
                    </section>
                    </form>
                </div>
        <!-- </div> -->
                <!-- </div> -->
            </div>
        </div>

        <!-- Validations -->
    <script >
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

        //  $('.productdesc').on('keypress keydown keyup',function(){
        //     var $regexname=/^([a-zA-Z]{3,30})$/;
        //      if (!$(this).val().match($regexname)) {
        //       // there is a mismatch, hence show the error message
        //          $('.emsgdesc').removeClass('hidden');
        //          $('.emsgdesc').show();
        //      }
        //    else{
        //         // else, do not display message
        //         $('.emsgdesc').addClass('hidden');
        //        }
        //  });

         $('.productprice').on('keypress keydown keyup',function(){
            var $regexname=/^(\d*([.,](?=\d{3}))?\d+)+((?!\2)[.,]\d\d)?$/;
             if (!$(this).val().match($regexname)) {
              // there is a mismatch, hence show the error message
                 $('.emsgprice').removeClass('hidden');
                 $('.emsprice').show();
             }
           else{
                // else, do not display message
                $('.emsgprice').addClass('hidden');
               }
         });
});
</script>

<script>

function validation()
       {
       var name = document.getElementById('inputPassword4').value;
       var price = document.getElementById('productprice').value;
       
    //Validation of product name
       var regname = /^(?!\s*$).+$/;
       var prdname = regname.test(name);
       if (prdname==false) 
       {
           
           document.getElementById('prdname').innerHTML="";
           return false;
           
       }
       else
           {
               document.getElementById('prdname').innerHTML="";
           }


    //Validation of product price
       var regmname = /^(\d*([.,](?=\d{3}))?\d+)+((?!\2)[.,]\d\d)?$/;
       var prdprice = regmname.test(price);
       if (prdprice==false) 
       {
           
           document.getElementById('prdprice').innerHTML="";
           return false;
           
       }
       else
           {
               document.getElementById('prdprice').innerHTML="";
           }
       }
       </script>

        <?php

            if(isset($_POST['AddProduct'])){

               

                $producttype_id = $_POST['Product_Type']; 
                $productname = $_POST['productname']; 
                $productdesc = $_POST['productdesc'];
                // echo $productname;
                $file_pr_pic1 = addslashes(file_get_contents($_FILES["productimage1"]["tmp_name"])); 
                // $file_pr_pic2 = addslashes(file_get_contents($_FILES["productimage2"]["name"]));
                
                // print_r($file_pr_pic1);


                $productprice = $_POST['productprice'];

                
               
                $queryS_pro_id="SELECT * FROM shopproduct WHERE pro_ty_id=$producttype_id";

                $search_sp_id= mysqli_query($conn, $queryS_pro_id);

                $record_spid = mysqli_num_rows($search_sp_id);
                 if($record_spid){
                               
                      $recordspid = mysqli_fetch_assoc($search_sp_id);
                 }

                 $S_pid=$recordspid["s_pro_id"];
                //  echo $S_pid;

              $query = "INSERT into product(pr_name,pr_desc,pr_pic,pr_price,s_pro_id) values('$productname', '$productdesc','$file_pr_pic1','$productprice', $S_pid)";
              //$query = "INSERT into product(pr_name,pr_desc,pr_price,S_prod_id) values ('paper dosa', 'delicious',150,4001)";

                $run = mysqli_query($conn, $query);

                if($run){
                    ?>
                    <script>swal({
                    icon: "success",
                    title: "Product added",
                    });
                    </script>
                    <script> location.replace("http://localhost/kwykpr/addproduct.php");</script>
                    <?php
                }

    
            }

        ?>
</body>
</html>