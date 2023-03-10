<?php
// session_start();
include('admin_nav.php');
include('conn.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KWYK | Store Setup</title>
    <link rel="stylesheet" href="bankdetail.css">
    <link rel="stylesheet" href="setstore.css">
     <link rel="shortcut icon" href="White_on_Blue.png" type="image/x-icon">
     <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
     
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

    .button{
    padding: 0.7rem 1.5rem;
    border: 0px solid #001428;
    background-color: #4bb1df !important;
    color: #fff !important;
    border-radius: 5px;
    cursor: pointer;
    float: left !important;
    margin-right: 5px !important;
}

        </style>
   </head>
            
        <body>
            <div class="row">
        <div style="width:300px;height:100%; border-right: 1px solid rgba(0,0,0,.1); height: calc(100vh - 90px);">
                <?php
                   include('admin_side.php');
                   $logid=$_SESSION["log_id"];
                ?>
            </div>

            <!-- <div class="space1 col-md-9"> -->
                <!-- <div class="upl1 col-md-9"> -->
                <div class="space1 col-md-9" style="overflow :scroll; overflow-x: hidden; height:700px; width:100%;">
                    <?php 
                        //connecting with database
                        $log_id = $_SESSION['log_id'];
                        //query to select data from table 'shopinfo' of a particular login id
                        $run = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_array($run);
                        $count = mysqli_num_rows($run);//to check if the selected email is exist in database or not 
                        
                        if(isset($_GET["reject"])){
                            $reject=$_GET["reject"];
                            $sql = "SELECT *FROM `shop` WHERE `shop_id`=$reject";
                    ?>
        <div class="col-md-12">                    
            <div style="font-family: Montserrat;" class="store-details">          
                <form action="" method="post" enctype="multipart/form-data">
                    <h4 style="margin-top:5px;"><b>Update Contact Details</b></h4>
                            <!-- <h3 style="font-family: 'Ubuntu', sans-serif; text-align:center;">Store Details</h3> -->
            
                            
          <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" onsubmit="return validation()" method="post" enctype="multipart/form-data">
            
                <div style="margin: 30px;"  class="form-row">
                     <div class="form-group col-md-6">
                          <label for="inputPassword4">Owner Name</label>
                          <input name="oname" type="text" class="form-control oname" id="own" value="<?php echo $row['oname']?>">
                          <span id="ownname" class="text-danger font-weight-bold"></span>
                          <p><span class="emsg hidden">Please Enter a Valid Owner Name</span></p>
                      </div>
                     
                     
                      <div class="form-group col-md-6">
                          <label for="inputEmail4">Manager Name</label>
                          <input name="mgrname" type="text" class="form-control mgrname" id="manager" value="<?php echo $row['mgrname']?>">
                          <span id="mname" class="text-danger font-weight-bold"></span>
                          <p><span class="emsg1 hidden">Please Enter a Valid Manager Name</span></p>
                      </div>
                      
                      
                      <div class="form-group col-md-6">
                          <label for="inputEmail4">Owner Phone no.</label>
                          <input name="ophone"type="text" class="form-control ophone" id="ombl" value=<?php echo $row['ocontact']?>>
                          <span id="ownmbl" class="text-danger font-weight-bold"></span>
                          <p><span class="emsg2 hidden">Please Enter a Valid Mobile Number</span></p>
                      </div>
                      
                      
                      <div class="form-group col-md-6">
                          <label for="inputEmail4">Manger Phone no.</label>
                          <input name="mgrphone"type="text" class="form-control mgrphone" id="mmbl" value=<?php echo $row['mgrcontact']?>>
                          <span id="mgrmbl" class="text-danger font-weight-bold"></span>
                          <p><span class="emsg3 hidden">Please Enter a Valid Mobile Number</span></p>
                      </div>
                      
                      
                      <div class="form-group col-md-6">
                          <label for="inputEmail4">Owner's Email</label>
                          <input name="oemail" type="text" class="form-control oemail" id="ownmail" value=<?php echo $row['oemail']?>>
                          <span id="ownemail" class="text-danger font-weight-bold"></span>
                          <p><span class="emsg4 hidden">Please Enter a Valid Email Address</span></p>
                      </div>
                     
                     
                      <div class="form-group col-md-6">
                          <label for="inputEmail4">Manager Email</label>
                          <input name="mgremail" type="text" class="form-control mgremail" id="mgrmail" value=<?php echo $row['mgremail']?>>
                          <span id="manageremail" class="text-danger font-weight-bold"></span>
                          <p><span class="emsgmg hidden">Please Enter a Valid Email Address</span></p>
                      </div>

                      <div>
                      <h4 style="margin-top:5px;"><b>Social Media Links (if any)</b></h4></div>
                      <div class="form-group col-md-6"></div>

                      <div class="form-group col-md-6">
                          <label for="inputEmail4">Facebook</label>
                          <input name="facebook" type="text" class="form-control" id="facebook" value=<?php echo $row['facebook']?>>
                          <!-- <span id="ownemail" class="text-danger font-weight-bold"></span> -->
                      </div>

                      <div class="form-group col-md-6">
                          <label for="inputEmail4">Instagram</label>
                          <input name="instagram" type="text" class="form-control" id="instagram" value=<?php echo $row['instagram']?>>
                          <!-- <span id="ownemail" class="text-danger font-weight-bold"></span> -->
                      </div>
                     
                      <div class="form-group col-md-6">
                          <label for="inputEmail4">Twitter</label>
                          <input name="twitter" type="text" class="form-control" id="twitter" value=<?php echo $row['twitter']?>>
                          <!-- <span id="ownemail" class="text-danger font-weight-bold"></span> -->
                      </div>

                      <div class="form-group col-md-6">
                          <label for="inputEmail4">LinkedIn</label>
                          <input name="linkedin" type="text" class="form-control" id="linkedin" value=<?php echo $row['linkedin']?>>
                          <!-- <span id="ownemail" class="text-danger font-weight-bold"></span> -->
                      </div>

                      <div class="form-group col-md-6">
                          <label for="inputEmail4">About Us (Write your shop description)</label>
                          <textarea name="aboutus" rows="2" style="height:100px; font-size:15px;" class="form-control"><?php echo $row['aboutus']?></textarea>
                          
                        
                          <!-- <span id="ownemail" class="text-danger font-weight-bold"></span> -->
                      </div>
                      <div class="form-group col-md-6"></div>
                     
                      <div class="mb-3" align="center">
                          <input  class="button" type="submit" name="update" value="Update">
                          <input id="save-store" class="button" type="submit" name="Next" value="Next" step_number="2">
                      </div>
                  </div>
                  <script type="text/javascript">
            $(document).ready(function(){

                //validation of owner name
                
                $('.oname').on('keypress keydown keyup',function(){
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

                   
                    //Validation of manager name
                    $('.mgrname').on('keypress keydown keyup',function(){
                    var $regexname=/^([a-zA-Z ]{2,30})$/;
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

                
                    //Validation of owner mobile number
                    $('.ophone').on('keypress keydown keyup',function(){
                        var $regexname=/^(\+91[\-\s]?)?[0]?(91)?[789]\d{9}$/;
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


                    //Validation of manager mobile number
                    $('.mgrphone').on('keypress keydown keyup',function(){
                    var $regexname=/^(\+91[\-\s]?)?[0]?(91)?[789]\d{9}$/;
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

                     
                    //Validation of owner email address
                     $('.oemail').on('keypress keydown keyup',function(){
                    var $regexname=/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
                        if (!$(this).val().match($regexname)) {
                        // there is a mismatch, hence show the error message
                            $('.emsg4').removeClass('hidden');
                            $('.emsg4').show();
                        }
                    else{
                            // else, do not display message
                            $('.emsg4').addClass('hidden');
                        }
                    });


                     //Validation of owner email address
                     $('.mgremail').on('keypress keydown keyup',function(){
                    var $regexname=/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
                        if (!$(this).val().match($regexname)) {
                        // there is a mismatch, hence show the error message
                            $('.emsgmg').removeClass('hidden');
                            $('.emsgmg').show();
                        }
                    else{
                            // else, do not display message
                            $('.emsgmg').addClass('hidden');
                        }
                    });

                 });

              </script>

<script>
                    function validation() {
                        var oname = document.getElementById('own').value;
                        var mgrname = document.getElementById('manager').value;
                        var omobile = document.getElementById('ombl').value;
                        var mmobile = document.getElementById('mmbl').value;
                        var oemail = document.getElementById('ownmail').value;
                        var memail = document.getElementById('mgrmail').value;

                        //Validation of user name
                        var regname = /^([a-zA-Z ]{2,30})$/;
                        var ownname = regname.test(oname);
                        if (ownname == false) {

                            document.getElementById('ownname').innerHTML = "";
                            return false;

                        } else {
                            document.getElementById('ownname').innerHTML = "";
                        }


                        //Validation of manager name
                        var regmname = /^([a-zA-Z ]{2,30})$/;
                        var mname = regmname.test(mgrname);
                        if (mname == false) {

                            document.getElementById('mname').innerHTML = "";
                            return false;

                        } else {
                            document.getElementById('mname').innerHTML = "";
                        }



                        //Validation of owner mobile number
                        var regname = /^(\+91[\-\s]?)?[0]?(91)?[789]\d{9}$/;
                        var ownmbl = regname.test(omobile);
                        if (ownmbl == false) {

                            document.getElementById('ownmbl').innerHTML = "";
                            return false;

                        } else {
                            document.getElementById('ownmbl').innerHTML = "";
                        }



                        //Validation of manager mobile number
                        var regname = /^(\+91[\-\s]?)?[0]?(91)?[789]\d{9}$/;
                        var mgrmbl = regname.test(mmobile);
                        if (mgrmbl == false) {

                            document.getElementById('mgrmbl').innerHTML = "";
                            return false;

                        } else {
                            document.getElementById('mgrmbl').innerHTML = "";
                        }


                        //Validation of email address
                        var regname = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
                        var ownemail = regname.test(oemail);
                        if (ownemail == false) {

                            document.getElementById('ownemail').innerHTML = "";
                            return false;

                        } else {
                            document.getElementById('ownemail').innerHTML = "";
                        }


                        //Validation of manager email address
                        var regname = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
                        var manageremail = regname.test(memail);
                        if (manageremail == false) {

                            document.getElementById('manageremail').innerHTML = "";
                            return false;

                        } else {
                            document.getElementById('manageremail').innerHTML = "";
                        }
                    }
                </script>
                    <?php 
                    if(isset($_POST['Next'])){
                        echo '<script>location.replace("http://localhost/kwykpr/admin/stores.php");</script>';
                    }
                    if(isset($_POST['update']))
                    {
                    $oname=$_POST['oname']; 
                    $mgrname=$_POST['mgrname']; 
                    $ophone=$_POST['ophone']; 
                    $mgrphone=$_POST['mgrphone']; 
                    $oemail=$_POST['oemail']; 
                    $mgremail=$_POST['mgremail']; 
                    $facebook=$_POST['facebook'];
                    $instagram=$_POST['instagram'];
                    $twitter=$_POST['twitter'];
                    $linkedin=$_POST['linkedin'];
                    $aboutus=$_POST['aboutus'];
                    
                    // $deltype = $_POST['deliverytype'];

                    $log_id=$_SESSION["log_id"];
                    

                    $query = "UPDATE `shop` SET oname='$oname', mgrname='$mgrname',ocontact='$ophone', mgrcontact='$mgrphone',oemail ='$oemail',mgremail='$mgremail', facebook='$facebook', instagram='$instagram', twitter='$twitter', linkedin='$linkedin', aboutus='$aboutus' WHERE `log_id` = $log_id";

                    $run = mysqli_query($conn, $query);
                    if($run){?>
                        '<script>
                            
                            swal({
                                icon:"success",
                                title:"Record updated!"})
                            .then((value) => {
                                swal(location.replace("http://localhost/kwykpr/admin/admin_contactdetails.php"));
                            });
                                </script>'
                    <?php 
                    
                    } 
                    else{
                        ?>
                        <script>swal({
                            icon: "danger",
                            title: "Record not updated",
                            });
                            </script>
                    <?php
                }
                
            }
            ?>
                            
                            
                        </form>
        </div>

                    <?php
                        }
                        else{
                    ?>
        <div style="font-family: Montserrat;" class="store-details"><br>
        <h4 style="margin-top:5px;"><b>Contact Details</b></h4>
          <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" onsubmit="return validation()" method="post" enctype="multipart/form-data">
                
                <div style="margin: 20px;"  class="form-row">
                     <div class="form-group col-md-6">
                          <label for="inputPassword4">Owner Name</label>
                          <input name="oname" type="text" class="form-control oname" id="own" placeholder="Owner's Name" required>
                          <span id="ownname" class="text-danger font-weight-bold"></span>
                          <p><span class="emsg hidden">Please Enter a Valid Owner Name</span></p>
                      </div>
                     
                     
                      <div class="form-group col-md-6">
                          <label for="inputEmail4">Manager Name</label>
                          <input name="mgrname" type="text" class="form-control mgrname" id="manager" placeholder="Manager's Name" required>
                          <span id="mname" class="text-danger font-weight-bold"></span>
                          <p><span class="emsg1 hidden">Please Enter a Valid Manager Name</span></p>
                      </div>
                      
                      
                      <div class="form-group col-md-6">
                          <label for="inputEmail4">Owner Phone no.</label>
                          <input name="ophone"type="text" class="form-control ophone" id="ombl" placeholder="Owner's no." required>
                          <span id="ownmbl" class="text-danger font-weight-bold"></span>
                          <p><span class="emsg2 hidden">Please Enter a Valid Mobile Number</span></p>
                      </div>
                      
                      
                      <div class="form-group col-md-6">
                          <label for="inputEmail4">Manger Phone no.</label>
                          <input name="mgrphone"type="text" class="form-control mgrphone" id="mmbl" placeholder="Manager's no." required>
                          <span id="mgrmbl" class="text-danger font-weight-bold"></span>
                          <p><span class="emsg3 hidden">Please Enter a Valid Mobile Number</span></p>
                      </div>
                      
                      
                      <div class="form-group col-md-6">
                          <label for="inputEmail4">Owner's Email</label>
                          <input name="oemail" type="text" class="form-control oemail" id="ownmail" placeholder="Owner's mail id" required>
                          <span id="ownemail" class="text-danger font-weight-bold"></span>
                          <p><span class="emsg4 hidden">Please Enter a Valid Email Address</span></p>
                      </div>
                     
                     
                      <div class="form-group col-md-6">
                          <label for="inputEmail4">Manager Email</label>
                          <input name="mgremail" type="text" class="form-control mgremail" id="mgrmail" placeholder="Manager's mail id" required>
                          <span id="manageremail" class="text-danger font-weight-bold"></span>
                          <p><span class="emsgmg hidden">Please Enter a Valid Email Address</span></p>
                      </div>

                      <div>
                      <h4 style="margin-top:5px;"><b>Social Media Links (if any)</b></h4></div>
                      <div class="form-group col-md-6"></div>

                      <div class="form-group col-md-6">
                          <label for="inputEmail4">Facebook</label>
                          <input name="facebook" type="text" class="form-control facebook" id="facebook" placeholder="Facebook Profile Link">
                          <!-- <span id="ownemail" class="text-danger font-weight-bold"></span> -->
                      </div>

                      <div class="form-group col-md-6">
                          <label for="inputEmail4">Instagram</label>
                          <input name="instagram" type="text" class="form-control instagram" id="instagram" placeholder="Instagram Page Link">
                          <!-- <span id="ownemail" class="text-danger font-weight-bold"></span> -->
                      </div>
                     
                      <div class="form-group col-md-6">
                          <label for="inputEmail4">Twitter</label>
                          <input name="twitter" type="text" class="form-control twitter" id="twitter" placeholder="Twitter Handle">
                          <!-- <span id="ownemail" class="text-danger font-weight-bold"></span> -->
                      </div>

                      <div class="form-group col-md-6">
                          <label for="inputEmail4">LinkedIn</label>
                          <input name="linkedin" id="linkedin" type="text" class="form-control linkedin" placeholder="LinkedIn Profile Link">
                          <!-- <span id="ownemail" class="text-danger font-weight-bold"></span> -->
                      </div>
                     
                      <div class="form-group col-md-6">
                          <label for="inputEmail4">About Your Shop (Write a brief description about your shop)</label>
                          <textarea style="font-size:15px; height:100px;" name="aboutus" type="text" class="form-control" id="aboutus" placeholder="About Us"></textarea>
                        
                          <!-- <span id="ownemail" class="text-danger font-weight-bold"></span> -->
                      </div>
                      <div class="form-group col-md-6"></div>
                     
                      <div style="margin: 20px;" class="form-row">
                                <div class="form-group col-md-12">
                                    <input id="save-store" class="button" type="submit" name="save" value="Save" step_number="2">
                                    <input id="save-store" class="button" type="submit" name="Next" value="Next" step_number="2">
                                </div>
                            </div>
                  <script type="text/javascript">
            $(document).ready(function(){

                //validation of owner name
                
                $('.oname').on('keypress keydown keyup',function(){
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

                   
                    //Validation of manager name
                    $('.mgrname').on('keypress keydown keyup',function(){
                    var $regexname=/^([a-zA-Z ]{2,30})$/;
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

                
                    //Validation of owner mobile number
                    $('.ophone').on('keypress keydown keyup',function(){
                        var $regexname=/^(\+91[\-\s]?)?[0]?(91)?[789]\d{9}$/;
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


                    //Validation of manager mobile number
                    $('.mgrphone').on('keypress keydown keyup',function(){
                    var $regexname=/^(\+91[\-\s]?)?[0]?(91)?[789]\d{9}$/;
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

                     
                    //Validation of owner email address
                     $('.oemail').on('keypress keydown keyup',function(){
                    var $regexname=/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
                        if (!$(this).val().match($regexname)) {
                        // there is a mismatch, hence show the error message
                            $('.emsg4').removeClass('hidden');
                            $('.emsg4').show();
                        }
                    else{
                            // else, do not display message
                            $('.emsg4').addClass('hidden');
                        }
                    });


                     //Validation of owner email address
                     $('.mgremail').on('keypress keydown keyup',function(){
                    var $regexname=/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
                        if (!$(this).val().match($regexname)) {
                        // there is a mismatch, hence show the error message
                            $('.emsgmg').removeClass('hidden');
                            $('.emsgmg').show();
                        }
                    else{
                            // else, do not display message
                            $('.emsgmg').addClass('hidden');
                        }
                    });

                 });

              </script>

<script>
                    function validation() {
                        var oname = document.getElementById('own').value;
                        var mgrname = document.getElementById('manager').value;
                        var omobile = document.getElementById('ombl').value;
                        var mmobile = document.getElementById('mmbl').value;
                        var oemail = document.getElementById('ownmail').value;
                        var memail = document.getElementById('mgrmail').value;

                        //Validation of user name
                        var regname = /^([a-zA-Z ]{2,30})$/;
                        var ownname = regname.test(oname);
                        if (ownname == false) {

                            document.getElementById('ownname').innerHTML = "";
                            return false;

                        } else {
                            document.getElementById('ownname').innerHTML = "";
                        }


                        //Validation of manager name
                        var regmname = /^([a-zA-Z ]{2,30})$/;
                        var mname = regmname.test(mgrname);
                        if (mname == false) {

                            document.getElementById('mname').innerHTML = "";
                            return false;

                        } else {
                            document.getElementById('mname').innerHTML = "";
                        }



                        //Validation of owner mobile number
                        var regname = /^(\+91[\-\s]?)?[0]?(91)?[789]\d{9}$/;
                        var ownmbl = regname.test(omobile);
                        if (ownmbl == false) {

                            document.getElementById('ownmbl').innerHTML = "";
                            return false;

                        } else {
                            document.getElementById('ownmbl').innerHTML = "";
                        }



                        //Validation of manager mobile number
                        var regname = /^(\+91[\-\s]?)?[0]?(91)?[789]\d{9}$/;
                        var mgrmbl = regname.test(mmobile);
                        if (mgrmbl == false) {

                            document.getElementById('mgrmbl').innerHTML = "";
                            return false;

                        } else {
                            document.getElementById('mgrmbl').innerHTML = "";
                        }


                        //Validation of email address
                        var regname = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
                        var ownemail = regname.test(oemail);
                        if (ownemail == false) {

                            document.getElementById('ownemail').innerHTML = "";
                            return false;

                        } else {
                            document.getElementById('ownemail').innerHTML = "";
                        }


                        //Validation of manager email address
                        var regname = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
                        var manageremail = regname.test(memail);
                        if (manageremail == false) {

                            document.getElementById('manageremail').innerHTML = "";
                            return false;

                        } else {
                            document.getElementById('manageremail').innerHTML = "";
                        }

                        //    // //Validation of password
                        //    var regname = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}$/;
                        //    var userpass = regname.test(usrpass);
                        //    if (userpass==false) 
                        //    {

                        //        document.getElementById('userpass').innerHTML="invalid";
                        //        return false;

                        //    }
                        //    else
                        //        {
                        //            document.getElementById('userpass').innerHTML="";
                        //        }
                    }
                </script>
                <?php
                            }
                        ?>

            </form>
        
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

           
           <?php 
    if(isset($_POST['save'])){
      $oname=$_POST['oname']; 
      $mgrname=$_POST['mgrname']; 
      $ophone=$_POST['ophone']; 
      $mgrphone=$_POST['mgrphone']; 
      $oemail=$_POST['oemail']; 
      $mgremail=$_POST['mgremail']; 
      $facebook=$_POST['facebook'];
      $instagram=$_POST['instagram'];
      $twitter=$_POST['twitter'];
      $linkedin=$_POST['linkedin'];
      $aboutus=$_POST['aboutus'];
     
      // $deltype = $_POST['deliverytype'];

      $log_id=$_SESSION["log_id"];
     

      $query = "UPDATE `shop` SET oname='$oname', mgrname='$mgrname',ocontact='$ophone', mgrcontact='$mgrphone',oemail ='$oemail',mgremail='$mgremail', facebook='$facebook', instagram='$instagram', twitter='$twitter', linkedin='$linkedin', aboutus='$aboutus' WHERE `log_id` = $log_id";

      $run = mysqli_query($conn, $query);
      if($run){
          echo '<script>
                            
          swal({
              icon:"success",
              title:"Record updated!"})
          .then((value) => {
              swal(location.replace("http://localhost/kwykpr/admin/admin_contactdetails.php"));
          });
              </script>';
         
      }
      else{
          echo '<script>swal({
            icon: "danger",
            title: "Record not updated",
            });
            </script>';
      }

  }
    
?>         
    
      
</body>
</html>