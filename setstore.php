
<?php
// session_start();
include('common.php');
include('conn.php');
//  echo"<pre>";
// print_r($_SESSION);
// echo"<pre>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KWYK | Store Setup</title>
    <link rel="stylesheet" href="storedetails.css">
    <link rel="stylesheet" href="setstore.css">
     <link rel="shortcut icon" href="White_on_Blue.png" type="image/x-icon">
     <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
     <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
     
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
        

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <style>
             
            #success_message {
                display: none;
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
  background-color: #4BB1DF ;
  border: 1px solid #4BB1DF;
  /* text-shadow: 0px -1px 0px rgba(0, 0, 0, 0.3); */
}
.swal-footer{
    text-align:center;
}


            ::-webkit-scrollbar {
                width: 0px;
            }

input[type="text"] {
    height: 40px;
    font-size: 15px;
}

input[type="file"] {
    height: 40px;
    font-size: 15px;
}

input,
input::placeholder {
    font-size: 15px;
}
*{
    font-family: 'Montserrat';
    }


    .dis_img{
    display: flex;
    width: 10%;
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

        </style>
   </head>
            
        <body>
            <div class="row">
        <div style="width:300px;height:100%; border-right: 1px solid rgba(0,0,0,.1); height: calc(100vh - 90px);">
                <?php
                   include('common2.php');
                   $logid=$_SESSION["log_id"];
                ?>
            </div>

            <!-- <div class="space1 col-md-9"> -->
                <!-- <div class=" col-md-9"> -->
                <div class="space1 col-md-9" style="overflow :scroll; overflow-x: hidden; height:700px; width:100%;">
                    <?php 
                        include('conn.php');//connecting with database
                        $log_id = $_SESSION['log_id'];
                        //query to select data from table 'shopinfo' of a particular login id
                        $sql = "SELECT *FROM `shop` WHERE `log_id`='$log_id'";

                        $run = mysqli_query($conn, $sql);

                        $count = mysqli_num_rows($run);//to check if the selected email is exist in database or not 
                        if($count == 1){
                    ?>
                        <form action="" method="post" enctype="multipart/form-data">
                            <!-- <h3 style="font-family: 'Ubuntu', sans-serif; text-align:center;">Store Details</h3> -->
                            
                            <?php
                                include('connection.php');//connecting with database
                                $log_id = $_SESSION['log_id'];
                                //query to select data from shopinfo of a particular email
                                $sql = "SELECT * FROM `shop` WHERE `log_id` = '$log_id'";
                                $result = mysqli_query($conn, $sql);

                                while($row = mysqli_fetch_array($result)){
                                        $cat_id=$row['category_id'];
                            ?>
                            <div class=" col-md-12" style="overflow :scroll; overflow-x: hidden; height:600px; width:100%;">
                    <h4 align="center" style="margin-top:5px;"><b>Update Store Details</b></h4>
                    <form id="contact_form" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" onsubmit="return validation()" enctype="multipart/form-data" >
                        <div class="store-details">
                            <!-- <h3 align="center"> Fill Store Details </h3> -->
                            <div style="margin: 20px;" class="form-row">
                                <div class="form-group col-md-6" style="margin-bottom:5px; height:40px">
                                    <label for="biz_cat" class="form-label">Selected Business Category: &nbsp</label>
                                    <select name="bizcat" class="form-control" id="biz_cat" style="height: 40px; font-size: 15px;">
                                    <!-- <option value="none" >Select an Option</option> -->
                                    <?php 
                                    $bizcategory = "SELECT * FROM bizcategory where category_id=$cat_id";
                                    $query = mysqli_query($conn, $bizcategory);
                                    $record_count = mysqli_num_rows($query);
                                    $bizcat_row = mysqli_fetch_assoc($query);
                                    ?>
                                        <option value="" disabled selected id="cat_name"><?php echo $bizcat_row["category_type"];?></option>
                                        <?php
                                            // $bizcategory = "SELECT * FROM bizcategory";
                                            // $query = mysqli_query($conn, $bizcategory);
                                            // $record_count = mysqli_num_rows($query);
                                            
                                            // for($i=1;$i<=$record_count;$i++){
                                            // $bizcat_row = mysqli_fetch_assoc($query)
                                        ?>           
                <!-- <option value="<?php echo $bizcat_row['category_id'] ?>"><?php echo $bizcat_row["category_type"] ?></option>; -->
                            
                  <?php
                            //   }
                            //  }
                  ?>
                                    </select>
                                </div>
                  <?php
                                        if($bizcat_row["category_type"]=="Food"){
                  ?>              
                               <div>
            
                                    <label>
                                        <input type="checkbox" id="veg">
                                        <span class="checkbox-rectangle">Veg Only</span>
                                    </label>&nbsp;&nbsp;
                                    <label >
                                        <input type="checkbox" id="nonveg">
                                        <span class="checkbox-rectangle">Non-Veg Only</span>
                                    </label>
                                </div>   
                  <?php
                             }
                            
                  ?>         
                            </div>
                            <div style="margin: 20px;" class="form-row">
                                <div class="form-group col-md-6" style="margin-bottom:5px; margin-top: 15px;">
                                    <label for="inputPassword4">Shop Name</label>
                                    <input type="text" name="shopname" class="form-control shopname" id="sname" value="<?php echo $row['Sname']?>">
                                    <span id="ssname" class="text-danger font-weight-bold"></span>
                                    <p><span class="emsgname hidden">Please Enter a Valid Store Name</span></p>
                                </div>

                                <div class="form-group col-md-6" style="margin-bottom:5px; margin-top: 15px;">
                                    <label for="inputEmail4">Shop Email</label>
                                    <input type="text" name="semail" class="form-control semail" id="semail" required value=<?php echo $row['semail']?>>
                                    <span id="shopemail" class="text-danger font-weight-bold"></span>
                                        <p><span class="emsgmail hidden">Please Enter a Valid Email</span></p>
                                </div>
                            </div>

                            <div style="margin: 20px;" class="form-row">
                                <div class="form-group col-md-6" style="margin-bottom:5px;">
                                    <label for="inputPassword4">Store City</label>
                                    <input type="text" name="shopcity" class="form-control shopcity" id="scity" required value=<?php echo $row['S_City']?>>
                                    <span id="shopcity" class="text-danger font-weight-bold"></span>
                                    <p><span class="emsgcity hidden">Please Enter a Valid City</span></p>
                                </div>
                                <div class="form-group col-md-6" style="margin-bottom:5px;">
                                    <label for="inputEmail4">Store Pincode</label>
                                    <input type="text" name="shoppincode" class="form-control shoppincode" id="spincode" required value=<?php echo $row['S_Pincode']?>>
                                    <span id="shopcode" class="text-danger font-weight-bold"></span>
                                        <p><span class="emsgpin hidden">Please Enter a Valid Pincode</span></p>
                                </div>
                            </div>

                            <div style="margin: 20px;" class="form-row">
                                <div class="form-group col-md-6" style="margin-bottom:5px;">
                                    <label for="inputPassword4">Store Address</label>
                                    <input type="text" name="shopaddr" class="form-control shopaddr" id="saddress" required value="<?php echo $row['Shopaddr']?>">
                                    <span id="shopadd" class="text-danger font-weight-bold"></span>
                                    <p><span class="emsgadd hidden">Please Enter a Valid Address</span></p>

                                </div>
                                <div class="form-group col-md-6" style="margin-bottom:5px">
                                    <label for="inputEmail4">Contact</label>
                                    <input type="text" name="shopcontact" class="form-control shopcontact" id="scontact" required value=<?php echo $row['S_Contact']?>>
                                    <span id="shopcon" class="text-danger font-weight-bold"></span>
                                    <p><span class="emsgcell hidden">Please Enter a Valid Contact Number</span></p>
                                </div>
                            </div>

                            <div style="margin: 20px;" class="form-row">
                                <div class="form-group col-md-6" style="margin-bottom:20px;">
                                    <label for="inputEmail4">Store URL</label>
                                    <div style="display:flex;align-items:center">
                                        <input type="text" name="storeurl" class="form-control storeurl" id="myText" name="url" aria-describedby="basic-addon2" required value=<?php echo $row['slink']?>>
                                        <span id="shopurl" class="text-danger font-weight-bold"></span>
                                            <p><span class="emsglink hidden">Please Enter a Valid Web name for URL</span></p>

                                            <button id="button" style="border: px solid #001428; margin:2px; height: 40px" type="button"
                                            class="button" onclick="myFunction()">
                                            <a style="color: #fff !important; font-size: 15px;" href="#" class="link1" id="link1">Link</a></button>
                                    </div>
                                </div>
                            </div>

                            <div style="margin: 20px;" class="form-row">
                                <div class="form-group col-md-6" style="margin-bottom:5px;">
                                    <label for="formFile" class="form-label">Brand Logo (jpeg/png/jpg)</label>
                                    <input class="form-control" name="slogo" type="file" id="formFile" accept="image/png, image/jpeg, image/jpg">
                                    <?php echo '<img class="dis_img" onclick="onClick(this)" class="w3-hover-opacity" style="cursor:pointer;" src="data:image;base64,'.base64_encode($row['Shoplogo']).' " alt="" >';?>
                                    <div class="middle" style="margin-top:70px;">
                                        <div class="text" >Click to expand</div>
                                    </div>
                                </div>
                                <div class="form-group col-md-6" style="margin-bottom:5px;">
                                    <label for="formFile" class="form-label">Store Banner (jpeg/png/jpg)</label>
                                    <input class="form-control" name="bgimage" type="file" id="formFile" accept="image/png, image/jpeg, image/jpg">
                                    <?php echo '<img class="dis_img" onclick="onClick(this)" class="w3-hover-opacity" style="cursor:pointer;" src="data:image;base64,'.base64_encode($row['bkgdimage']).' " alt="">';?>
                                    <div class="middle" style="margin-top:70px;">
                                        <div class="text">Click to expand</div>
                                    </div>
                                </div>
                            </div>
                                <div class="form-group col-md-6" style="margin-bottom:5px; margin-left:9px">
                                    <label for="formFile" class="form-label">Delivery Banner (jpeg/png/jpg)</label>
                                    <input class="form-control" name="delbaner" type="file" id="formFile" accept="image/png, image/jpeg, image/jpg">
                                    <?php echo '<img class="dis_img" onclick="onClick(this)" class="w3-hover-opacity" style="cursor:pointer;" src="data:image;base64,'.base64_encode($row['del_banner']).' " alt="">';?>
                                <div class="middle" style="margin-top:70px;">
                                    <div class="text">Click to expand</div>
                                </div>
                                </div>
                        </div>
                            <div id="modal01" class="w3-modal" onclick="this.style.display='none'">
                                <span class="w3-button w3-hover-red w3-xlarge w3-display-topright">&times;</span>
                                <div class="w3-modal-content w3-animate-zoom">
                                    <img id="img01" style="width:50%">
                                </div>
                            </div>
                            <style>
                                .w3-modal-content{
                                    height:80%;
                                    align: center;
                                    opacity:100%;
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
                        <div style="margin: 40px;" class="form-row">
                                <div class="form-group col-md-12">
                                     <input id="save-store" class="button" type="submit" name="update" value="Update" step_number="2">
                                    <input id="save-store" class="button" type="submit" name="Next" value="Next" step_number="2">
                                </div>
                            </div>
                            <script type="text/javascript">
                            $(document).ready(function(){
                            $('.shopname').on('keypress keydown keyup',function(){
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
                            
                            
                            $('.semail').on('keypress keydown keyup',function(){
                                var $regexname=/^[a-z0-9]+@[a-z]+\.[a-z]{2,3}/;
                                if (!$(this).val().match($regexname)) {
                                // there is a mismatch, hence show the error message
                                    $('.emsgmail').removeClass('hidden');
                                    $('.emsgmail').show();
                                }
                            else{
                                    // else, do not display message
                                    $('.emsgmail').addClass('hidden');
                                }
                            });
                            
                            
                            
                            $('.shopcity').on('keypress keydown keyup',function(){
                                var $regexname=/^([a-zA-Z]{2,30})$/;
                                if (!$(this).val().match($regexname)) {
                                // there is a mismatch, hence show the error message
                                    $('.emsgcity').removeClass('hidden');
                                    $('.emscity').show();
                                }
                            else{
                                    // else, do not display message
                                    $('.emsgcity').addClass('hidden');
                                }
                            });
                            
                            
                            $('.shoppincode').on('keypress keydown keyup',function(){
                                var $regexname=/^(\d{6}|^\d{6})$/;
                                if (!$(this).val().match($regexname)) {
                                // there is a mismatch, hence show the error message
                                    $('.emsgpin').removeClass('hidden');
                                    $('.emsgpin').show();
                                }
                            else{
                                    // else, do not display message
                                    $('.emsgpin').addClass('hidden');
                                }
                            });
                            
                            
                            
                            $('.shopaddr').on('keypress keydown keyup',function(){
                                var $regexname=/^[a-zA-Z0-9\s,.'-/]{3,}$/;
                                if (!$(this).val().match($regexname)) {
                                // there is a mismatch, hence show the error message
                                    $('.emsgadd').removeClass('hidden');
                                    $('.emsgadd').show();
                                }
                            else{
                                    // else, do not display message
                                    $('.emsgadd').addClass('hidden');
                                }
                            });
                            
                            
                            $('.shopcontact').on('keypress keydown keyup',function(){
                                var $regexname=/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/;
                                if (!$(this).val().match($regexname)) {
                                // there is a mismatch, hence show the error message
                                    $('.emsgcell').removeClass('hidden');
                                    $('.emsgcell').show();
                                }
                            else{
                                    // else, do not display message
                                    $('.emsgcell').addClass('hidden');
                                }
                            });
                            
                            
                            $('.storeurl').on('keypress keydown keyup',function(){

                                var $regexname=/^[a-zA-Z0-9\s,.'-]{3,}$/;

                                //var $regexname=/^[a-zA-Z0-9][a-zA-Z0-9-]{1,61}[a-zA-Z0-9]\.[a-zA-Z]{2,}$/;

                                if (!$(this).val().match($regexname)) {
                                // there is a mismatch, hence show the error message
                                    $('.emsglink').removeClass('hidden');
                                    $('.emsglink').show();
                                }
                            else{
                                    // else, do not display message
                                    $('.emsglink').addClass('hidden');
                                }
                            });
                        });
                    </script>


                        <script>

                        function validation()
                        {
                        var name = document.getElementById('sname').value;
                        var email = document.getElementById('semail').value;
                        var city = document.getElementById('scity').value;
                        var pincode = document.getElementById('spincode').value;
                        var address = document.getElementById('saddress').value;
                        var contact = document.getElementById('scontact').value;
                        var url = document.getElementById('myText').value;
                        
                            
                    //Validation of user name
                        var regname = /^(?!\s*$).+$/;
                        var ssname = regname.test(name);
                        if (ssname==false) 
                        {
                            
                            document.getElementById('ssname').innerHTML="Please Enter Store name";
                            return false;
                            
                        }
                        else
                            {
                                document.getElementById('ssname').innerHTML="";
                            }


                        //Validation of email address
                        var regname = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
                        var shopemail = regname.test(email);
                        if(shopemail==false) 
                        {
                            
                            document.getElementById('shopemail').innerHTML="";
                            return false;
                            
                        }
                        else
                            {
                                document.getElementById('shopemail').innerHTML="";
                            }

                        //Validation of shop city
                        var regname = /^([a-zA-Z ]{2,30})$/;
                        var shopcity = regname.test(city);
                        if (shopcity==false) 
                        {
                            
                            document.getElementById('shopcity').innerHTML="";
                            return false;
                            
                        }
                        else
                            {
                                document.getElementById('shopcity').innerHTML="";
                            }



                        //Validation of shop pin code
                        var regname = /^(\d{6}|^\d{6})$/;
                        var shopcode = regname.test(pincode);
                        if (shopcode==false) 
                        {
                            
                            document.getElementById('shopcode').innerHTML="";
                            return false;
                            
                        }
                        else
                            {
                                document.getElementById('shopcode').innerHTML="";
                            }


                        //Validation of shop address
                        var regname = /^[a-zA-Z0-9\s,.'-/]{3,}$/;
                        var shopadd = regname.test(address);
                        if (shopadd==false) 
                        {
                            
                            document.getElementById('shopadd').innerHTML="";
                            return false;
                            
                        }
                        else
                            {
                                document.getElementById('shopadd').innerHTML="";
                            }


                        //Validation of shop contact
                        var regname = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/;
                        var shopcon = regname.test(contact);
                        if (shopcon==false) 
                        {
                            
                            document.getElementById('shopcon').innerHTML="";
                            return false;
                            
                        }
                        else
                            {
                                document.getElementById('shopcon').innerHTML="";
                            }


                        //Validation of url

                        var regname = /^[a-zA-Z0-9\s,.'-]{3,}$/;
                        //var regname = /^[a-zA-Z0-9][a-zA-Z0-9-]{1,61}[a-zA-Z0-9]\.[a-zA-Z]{2,}$/;
                        var shopurl = regname.test(url);
                        if (shopurl==false) 
                        {
                            
                            document.getElementById('shopurl').innerHTML="";
                            return false;
                            
                        }
                        else
                            {
                                document.getElementById('shopurl').innerHTML="";
                            }
                            }
                            </script>
                                            <?php
                        if(isset($_POST['Next'])){
                            echo '<script>location.replace("http://localhost/kwykpr/uploaddoc.php");</script>';
                        } 
                    
                    if(isset($_POST['update']))
                    {

                    $shopname = $_POST['shopname'];
                    $semail=$_POST['semail'];
                    $shopcity = $_POST['shopcity'];
                    $shoppincode = $_POST['shoppincode'];
                    $shopaddr = $_POST['shopaddr'];
                    $shopcontact = $_POST['shopcontact'];
                    
                    $bizcategory_id =$row['category_id'];
                    $storeurl=$_POST["storeurl"];   
                    $shop_id=$row["shop_id"];
                    
                    $slogofile = addslashes(file_get_contents($_FILES["slogo"]["tmp_name"]));
                    $bgimagefile = addslashes(file_get_contents($_FILES["bgimage"]["tmp_name"]));
                    $delbaner = addslashes(file_get_contents($_FILES["delbaner"]["tmp_name"]));

                        $log_id=$_SESSION["log_id"];

                        
                        $query = "UPDATE `shop` SET `Sname`='$shopname',`semail`='$semail',`Shopaddr`='$shopaddr',`S_City`='$shopcity',`S_Pincode`='$shoppincode',`S_Contact`='$shopcontact',`category_id`=$bizcategory_id,`slink`='$storeurl',`Shoplogo`='$slogofile',`bkgdimage`='$bgimagefile',`del_banner`='$delbaner' WHERE `shop_id`= $shop_id";
                        $run = mysqli_query($conn, $query);
                        if($run){?>
                            <script>
                            
                            swal({
                                icon:"success",
                                title:"Account Updated!"})
                            .then((value) => {
                                swal(location.replace("http://localhost/kwykpr/setstore.php"));
                            });
                                </script>;
                        <?php 
                        // echo '<script>location.replace("http://localhost/kwykpr/storedetails1.php");</script>';
                        
                        } 
                        else{
                            ?>
                            <script>swal({
                                icon: "danger",
                                title: "Account not updated",
                                });
                                </script>
                        <?php
                    }
                    
                }
                ?>

                            <?php
                                }
                            ?>
                            
                        </form>

                    <?php
                        }
                        else{
                    ?>
                        <div class=" col-md-12" style="overflow :scroll; overflow-x: hidden; height:600px;">
                    <h4 align="center"><b>Store Details</b></h4>
                    <form id="contact_form" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" onsubmit="return validation()" enctype="multipart/form-data" >
                        <div class="store-details">
                            <!-- <h3 align="center"> Fill Store Details </h3> -->
                            <div style="margin: 20px;" class="form-row">
                                <div class="form-group col-md-6" style="margin-bottom:5px; height:40px">
                                    <label for="biz_cat" class="form-label">Choose a Business Category: &nbsp</label>
                                    <select name="bizcat" class="form-control" id="biz_cat" style="height: 40px; font-size: 15px;">
                                        <!-- <option value="" disabled selected id="cat_name" >Category</option> -->
                                        <option value="none" selected disabled hidden>Select an Option</option>
                                        <?php
                                            $bizcategory = "SELECT * FROM bizcategory";
                                            $query = mysqli_query($conn, $bizcategory);
                                            $record_count = mysqli_num_rows($query);
                                            
                                            for($i=1;$i<=$record_count;$i++){
                                            $bizcat_row = mysqli_fetch_assoc($query)
                                        ?>           
                <option value="<?php echo $bizcat_row['category_id'] ?>"><?php echo $bizcat_row["category_type"] ?></option>;
                            
                  <?php
                              //}
                             }
                  ?>
                                    </select>
                                    
                                    <!-- <button type="button" class="btn btn-outline-primary">Confirm</button> -->

                                    <p style="color:red; font-size:12px">Category once selected cannot be Modified!!</p>
                                </div>

                               
                               
                                <p id="p"></p><br><br>

                                    <!-- document.getElementById("biz_cat"').value = 'Food' -->
                                    <script>
                                      const selectElem = document.getElementById('biz_cat')
                                      const pElem = document.getElementById('p')
                                      

                                      // When a new <option> is selected
                                    //selectElem.addEventListener('change', () => {
                                        //const index = selectElem.selectedIndex;
                                        // Add that data to the <p>
                                       //     pElem.textContent = `selectedIndex: ${index}`;
                                    //})






                                    
                                    </script> 
                                    
                                
                               <div>
                                
                                    &nbsp;&nbsp;&nbsp;&nbsp;<label>
                                    <br><br> <input type="checkbox" id="veg">
                                        <span class="checkbox-rectangle">Veg Only</span>
                                    </label>&nbsp;&nbsp;&nbsp;
                                    <label >
                                        <input type="checkbox" id="nonveg">
                                        <span class="checkbox-rectangle">Non-Veg Only</span>
                                    </label>
                                </div>

                            </div><br>
                            <div style="margin: 20px;" class="form-row">
                                <div class="form-group col-md-6" style="margin-bottom:5px; margin-top: 15px;">
                                    <label for="inputPassword4">Store Name</label>
                                    <input type="text" name="shopname" class="form-control shopname" id="sname" placeholder="Name">
                                    <span id="ssname" class="text-danger font-weight-bold"></span>
                                    <p><span class="emsgname hidden">Please Enter a Valid Store Name</span></p>
                                </div>

                                <div class="form-group col-md-6" style="margin-bottom:5px; margin-top: 15px;">
                                    <label for="inputEmail4">Store Email</label>
                                    <input type="text" name="semail" class="form-control semail" id="semail" placeholder="Email" required>
                                    <span id="shopemail" class="text-danger font-weight-bold"></span>
                                        <p><span class="emsgmail hidden">Please Enter a Valid Email</span></p>
                                </div>
                            </div>

                            <div style="margin: 20px;" class="form-row">
                                <div class="form-group col-md-6" style="margin-bottom:5px;">
                                    <label for="inputPassword4">Store City</label>
                                    <input type="text" name="shopcity" class="form-control shopcity" id="scity" placeholder="City Name" required>
                                    <span id="shopcity" class="text-danger font-weight-bold"></span>
                                    <p><span class="emsgcity hidden">Please Enter a Valid City</span></p>
                                </div>
                                <div class="form-group col-md-6" style="margin-bottom:5px;">
                                    <label for="inputEmail4">Store Pincode</label>
                                    <input type="text" name="shoppincode" class="form-control shoppincode" id="spincode" placeholder="Pincode" required>
                                    <span id="shopcode" class="text-danger font-weight-bold"></span>
                                        <p><span class="emsgpin hidden">Please Enter a Valid Pincode</span></p>
                                </div>
                            </div>

                            <div style="margin: 20px;" class="form-row">
                                <div class="form-group col-md-6" style="margin-bottom:5px;">
                                    <label for="inputPassword4">Store Address</label>
                                    <input type="text" name="shopaddr" class="form-control shopaddr" id="saddress" placeholder="Address" required>
                                    <span id="shopadd" class="text-danger font-weight-bold"></span>
                                    <p><span class="emsgadd hidden">Please Enter a Valid Address</span></p>

                                </div>
                                <div class="form-group col-md-6" style="margin-bottom:5px">
                                    <label for="inputEmail4">Contact</label>
                                    <input type="text" name="shopcontact" class="form-control shopcontact" id="scontact" placeholder="Phone" required>
                                    <span id="shopcon" class="text-danger font-weight-bold"></span>
                                    <p><span class="emsgcell hidden">Please Enter a Valid Contact Number</span></p>
                                </div>
                            </div>

                            <div style="margin: 20px;" class="form-row">
                                <div class="form-group col-md-6" style="margin-bottom:20px;">
                                    <label for="inputEmail4">Store URL</label>
                                    <div style="display:flex;align-items:center">
                                        <input type="text" name="storeurl" class="form-control storeurl" placeholder='Shop URL' id="myText" name="url" aria-describedby="basic-addon2" required>
                                        <span id="shopurl" class="text-danger font-weight-bold"></span>
                                            <p><span class="emsglink hidden">Please Enter a Valid Web name for URL</span></p>

                                            <button id="button" style="border: px solid #001428; margin:2px; height: 40px" type="button"
                                            class="button" onclick="myFunction()">
                                            <a style="color: #fff !important; font-size: 15px;" href="#" class="link1" id="link1">Link</a></button>
                                    </div>
                                </div>
                            </div>

                            <div style="margin: 20px;" class="form-row">
                                <div class="form-group col-md-6" style="margin-bottom:5px;">
                                    <label for="formFile" class="form-label">Add Brand Logo (jpeg/png/jpg)</label>
                                    <input class="form-control" name="slogo" type="file" id="formFile" accept="image/png, image/jpeg, image/jpg">
                                </div>
                                <div class="form-group col-md-6" style="margin-bottom:5px;">
                                    <label for="formFile" class="form-label">Add Store Banner (jpeg/png/jpg)</label>
                                    <input class="form-control" name="bgimage" type="file" id="formFile" accept="image/png, image/jpeg, image/jpg">
                                </div>
                            </div>
                                <div class="form-group col-md-6" style="margin-bottom:5px; margin-left:9px">
                                    <label for="formFile" class="form-label">Add Delivery Banner (jpeg/png/jpg)</label>
                                    <input class="form-control" name="delbaner" type="file" id="formFile" accept="image/png, image/jpeg, image/jpg">
                                </div>
                        </div>
                        <div class="form-group col-md-6"></div>
                        
                        <div style="margin: 40px;" class="form-row">
                                <div class="form-group col-md-12">
                                    <input id="save-store" class="button" type="submit" name="save" value="Save" step_number="2">
                                </div>
                            </div>

                        <?php
                            }
                        ?>
                        
                        </form>
                        </div>
            </div>
        <!-- </div> -->
        <script>
            // Here the value is stored in new variable x 
            function myFunction() {
                var x = document.getElementById("myText").value;
                // document.getElementById("demo").innerHTML = x + ".kwyk.com";
                document.getElementById("myText").value = x + ".kwyk.com";
                const button = document.getElementById('button');

                // ✅ Set the disabled attribute
                button.setAttribute('disabled', '');

                // ✅ Remove the disabled attribute
                // button.removeAttribute('disabled');
            }
        </script>

    <!-- Validations -->
    <script type="text/javascript">
        $(document).ready(function(){
        $('.shopname').on('keypress keydown keyup',function(){
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
         
         
         $('.semail').on('keypress keydown keyup',function(){
            var $regexname=/^[a-z0-9]+@[a-z]+\.[a-z]{2,3}/;
             if (!$(this).val().match($regexname)) {
              // there is a mismatch, hence show the error message
                 $('.emsgmail').removeClass('hidden');
                 $('.emsgmail').show();
             }
           else{
                // else, do not display message
                $('.emsgmail').addClass('hidden');
               }
         });
         
         
         
         $('.shopcity').on('keypress keydown keyup',function(){
            var $regexname=/^([a-zA-Z]{2,30})$/;
             if (!$(this).val().match($regexname)) {
              // there is a mismatch, hence show the error message
                 $('.emsgcity').removeClass('hidden');
                 $('.emscity').show();
             }
           else{
                // else, do not display message
                $('.emsgcity').addClass('hidden');
               }
         });
         
         
         $('.shoppincode').on('keypress keydown keyup',function(){
            var $regexname=/^(\d{6}|^\d{6})$/;
             if (!$(this).val().match($regexname)) {
              // there is a mismatch, hence show the error message
                 $('.emsgpin').removeClass('hidden');
                 $('.emsgpin').show();
             }
           else{
                // else, do not display message
                $('.emsgpin').addClass('hidden');
               }
         });
         
         
         
         $('.shopaddr').on('keypress keydown keyup',function(){
            var $regexname=/^[a-zA-Z0-9\s,.'-/]{3,}$/;
             if (!$(this).val().match($regexname)) {
              // there is a mismatch, hence show the error message
                 $('.emsgadd').removeClass('hidden');
                 $('.emsgadd').show();
             }
           else{
                // else, do not display message
                $('.emsgadd').addClass('hidden');
               }
         });
         
         
         $('.shopcontact').on('keypress keydown keyup',function(){
            var $regexname=/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/;
             if (!$(this).val().match($regexname)) {
              // there is a mismatch, hence show the error message
                 $('.emsgcell').removeClass('hidden');
                 $('.emsgcell').show();
             }
           else{
                // else, do not display message
                $('.emsgcell').addClass('hidden');
               }
         });
         
         
         $('.storeurl').on('keypress keydown keyup',function(){

            var $regexname=/^[a-zA-Z0-9\s,.'-]{3,}$/;

            //var $regexname=/^[a-zA-Z0-9][a-zA-Z0-9-]{1,61}[a-zA-Z0-9]\.[a-zA-Z]{2,}$/;

             if (!$(this).val().match($regexname)) {
              // there is a mismatch, hence show the error message
                 $('.emsglink').removeClass('hidden');
                 $('.emsglink').show();
             }
           else{
                // else, do not display message
                $('.emsglink').addClass('hidden');
               }
         });
    });
   </script>


    <script>

    function validation()
       {
       var name = document.getElementById('sname').value;
       var email = document.getElementById('semail').value;
       var city = document.getElementById('scity').value;
       var pincode = document.getElementById('spincode').value;
       var address = document.getElementById('saddress').value;
       var contact = document.getElementById('scontact').value;
       var url = document.getElementById('myText').value;
       
        
   //Validation of user name
       var regname = /^(?!\s*$).+$/;
       var ssname = regname.test(name);
       if (ssname==false) 
       {
           
           document.getElementById('ssname').innerHTML="Please enter Store name";
           return false;
           
       }
       else
           {
               document.getElementById('ssname').innerHTML="";
           }


    //Validation of email address
       var regname = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
       var shopemail = regname.test(email);
       if(shopemail==false) 
       {
           
           document.getElementById('shopemail').innerHTML="";
           return false;
           
       }
       else
           {
               document.getElementById('shopemail').innerHTML="";
           }

    //Validation of shop city
       var regname = /^([a-zA-Z ]{2,30})$/;
       var shopcity = regname.test(city);
       if (shopcity==false) 
       {
           
           document.getElementById('shopcity').innerHTML="";
           return false;
           
       }
       else
           {
               document.getElementById('shopcity').innerHTML="";
           }



    //Validation of shop pin code
       var regname = /^(\d{6}|^\d{6})$/;
       var shopcode = regname.test(pincode);
       if (shopcode==false) 
       {
           
           document.getElementById('shopcode').innerHTML="";
           return false;
           
       }
       else
           {
               document.getElementById('shopcode').innerHTML="";
           }


    //Validation of shop address
       var regname = /^[a-zA-Z0-9\s,.'-/]{3,}$/;
       var shopadd = regname.test(address);
       if (shopadd==false) 
       {
           
           document.getElementById('shopadd').innerHTML="";
           return false;
           
       }
       else
           {
               document.getElementById('shopadd').innerHTML="";
           }


    //Validation of shop contact
       var regname = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/;
       var shopcon = regname.test(contact);
       if (shopcon==false) 
       {
           
           document.getElementById('shopcon').innerHTML="";
           return false;
           
       }
       else
           {
               document.getElementById('shopcon').innerHTML="";
           }


    //Validation of url

       var regname = /^[a-zA-Z0-9\s,.'-]{3,}$/;
       //var regname = /^[a-zA-Z0-9][a-zA-Z0-9-]{1,61}[a-zA-Z0-9]\.[a-zA-Z]{2,}$/;
       var shopurl = regname.test(url);
       if (shopurl==false) 
       {
           
           document.getElementById('shopurl').innerHTML="";
           return false;
           
       }
       else
           {
               document.getElementById('shopurl').innerHTML="";
           }
        }
        </script>

<?php
        if(isset($_POST['Next'])){
            echo '<script>location.replace("http://localhost/kwykpr/uploaddoc.php");</script>';
        } 
      
      if(isset($_POST['save']))
      {

      $shopname = $_POST['shopname'];
      $semail=$_POST['semail'];
      $shopcity = $_POST['shopcity'];
      $shoppincode = $_POST['shoppincode'];
      $shopaddr = $_POST['shopaddr'];
      $shopcontact = $_POST['shopcontact'];
      
      $bizcategory =$_POST['bizcat'];
      $storeurl=$_POST["storeurl"];   
      
      $slogofile = addslashes(file_get_contents($_FILES["slogo"]["tmp_name"]));
      $bgimagefile = addslashes(file_get_contents($_FILES["bgimage"]["tmp_name"]));
      $delbaner = addslashes(file_get_contents($_FILES["delbaner"]["tmp_name"]));

        $log_id=$_SESSION["log_id"];

        
        $query = "INSERT into shop(Sname,semail,Shopaddr,S_City,S_Pincode,S_Contact,category_id,log_id,slink,Shoplogo,bkgdimage,del_banner) values ('$shopname','$semail','$shopaddr ','$shopcity', '$shoppincode','$shopcontact',$bizcategory,$log_id,'$storeurl','$slogofile','$bgimagefile','$delbaner')";
        $run = mysqli_query($conn, $query);
        if($run){?>
            <script>
                            
                            swal({
                                icon:"success",
                                title:"Account updated!"})
                            .then((value) => {
                                swal(location.replace("http://localhost/kwykpr/setstore.php"));
                            });
                                </script>
        <?php 
        } 
        else{
            ?>
            <script>swal({
                icon: "danger",
                title: "Account not inserted",
                });
                </script>
        <?php
    }
    
}
?>

</body>
</html>
