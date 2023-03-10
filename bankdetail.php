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
    <link rel="stylesheet" href="bankdetail.css">
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

            <div class="space1 col-md-9">
                <!-- <div class="col-md-9"> -->
                <!-- <div class="space1 col-md-9" style="overflow :scroll; overflow-x: hidden; height:700px; width:100%;"> -->
                    <?php 
                        include('conn.php');//connecting with database
                        $log_id = $_SESSION['log_id'];
                        //query to select data from table 'shopinfo' of a particular login id
                        $sql = "SELECT *FROM `shop` WHERE `log_id`='$log_id'";

                        $run = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_array($run);

                        // $count = mysqli_num_rows($run);//to check if the selected email is exist in database or not 
                        if(isset($row['acctname']) && !empty ($row['acctname'])){
                    ?>
                        <form action="" method="post" enctype="multipart/form-data">
                            <!-- <h3 style="font-family: 'Ubuntu', sans-serif; text-align:center;">Store Details</h3> -->
                            
                <div class="col-md-12" style="overflow :scroll; overflow-x: hidden; height:600px;">
                <h4 align="" style="margin-top:5px;"><b>Update Bank Details</b></h4>
      

          <!-- <div style="font-family: Montserrat;" class="store-details"><br> -->
      
          <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" onsubmit="return validation()" enctype="multipart/form-data" >
          
          <div style="margin: 20px; width: 900px;"  class="form-row">
            <div class="form-group col-md-6">
              <label for="acname">Account Name</label>
              <input name="acctname" type="text" class="form-control acctname" id="acname" value="<?php echo $row['acctname']?>">
              <p><span class="emsg hidden">Please Enter a Valid Account Name</span></p>
            <span id="accname" class="text-danger font-weight-bold"></span>
            <h5 id="acccheck"> </h5>
            </div>
            
            <div class="form-group col-md-6">
              <label for="bnkname">Bank Name</label>
              <input name="bkname" type="text" class="form-control bkname" id="bnkname" value="<?php echo $row['bankname']?>">
              <p><span class="emsg1 hidden">Please Enter a Valid Bank Name</span></p>
              <span id="bkkname" class="text-danger font-weight-bold"></span>
              <h5 id="bankcheck"> </h5>
            </div>
          </div>

          <div style="margin: 20px; width: 900px;"  class="form-row">
            <div class="form-group col-md-6">
              <label for="brnname">Branch Name</label>
              <input name="brname" type="text" class="form-control brname" id="brnname" value="<?php echo $row['branch']?>">
              <p><span class="emsg2 hidden">Please Enter a Valid Branch Name</span></p>
              <span id="brname" class="text-danger font-weight-bold"></span>
              <h5 id="branchcheck"> </h5>
            </div>
           
            <div class="form-group col-md-6">
              <label for="bnk_acc_no">Account Number</label>
              <input name="bkacctno" type="text" class="form-control bkacctno" id="bnk_acc_no" value=<?php echo $row['acctno']?>>
              <p><span class="emsg3 hidden">Please Enter a Valid Account Number</span></p>
              <span id="bkacctno" class="text-danger font-weight-bold"></span>
              <h5 id="numbercheck"> </h5>
            </div>
          </div>

          <div style="margin: 20px; width: 900px;"  class="form-row">
            <div class="form-group col-md-6">
              <label for="ifsccode">IFSC Code</label>
              <input name="ifsc" type="text" class="form-control ifsc" id="ifsccode" value=<?php echo $row['IFSC']?>>
              <p><span class="emsg4 hidden">Please Enter a Valid IFSC Code</span></p>
              <span id="ifsc" class="text-danger font-weight-bold"></span>
              <h5 id="ifsccheck"> </h5>
            </div>
           
            <div class="form-group col-md-6">
              <label for="formFile" class="form-label">Cancelled Cheque (jpeg/png/jpg)</label>
              <input name="canchequeproof" accept="image/png, image/jpeg, image/jpg" class="form-control canchequeproof" type="file" id="formFile">
              <?php echo '<img class="dis_img" onclick="onClick(this)" class="w3-hover-opacity" style="cursor:pointer;" src="data:image;base64,'.base64_encode($row['cancheque']).' " alt="">';?>
              <p><span class="emsg5 hidden">Please Enter a File in (jpeg/png/jpg) Format</span></p>
              <div class="middle" style="margin-top:70px;">
                                        <div class="text">Click to expand</div>
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
                        
                        </div>
                        <div style="margin: 20px;" class="form-row">
                <div class="form-group col-md-9">
                    <input id="save-store" class="button" type="submit" name="update" value="Update" step_number="2">
                    <input id="save-store" class="button" type="submit" name="Next" value="Next" step_number="2">
                </div>
          </div>
            </div>
            
          </div>
                            </div>
          
                        </div>  

                            
                            <?php
                                // }
                            ?>
                            
                        </form>
                        <?php 
                    if(isset($_POST['Next'])){
                        echo '<script>location.replace("http://localhost/kwykpr/contactdetails.php");</script>';
                    } 
                    
                    if(isset($_POST['update']))
                    {
                        $acctname=$_POST['acctname']; 
                        $bkname=$_POST['bkname']; 
                        $brname=$_POST['brname']; 
                        $bkacctno=$_POST['bkacctno']; 
                        $ifsc=$_POST['ifsc']; 
                        $canchequefile = addslashes(file_get_contents($_FILES["canchequeproof"]["tmp_name"]));
                        // $deltype = $_POST['deliverytype'];

                        $log_id=$_SESSION["log_id"];
                        

                        $query = "UPDATE `shop` SET acctname='$acctname', acctno='$bkacctno',bankname='$bkname', branch='$brname',IFSC ='$ifsc',cancheque='$canchequefile' WHERE `log_id` = $log_id";

                        $run = mysqli_query($conn, $query);
                        if($run){?>
                            '<script>
                            
                            swal({
                                icon:"success",
                                title:"Bank Details Updated!"})
                            .then((value) => {
                                swal(location.replace("http://localhost/kwykpr/bankdetail.php"));
                            });
                                </script>'
                        <?php 
                        
                        } 
                        else{
                            ?>
                            <script>swal({
                                icon: "danger",
                                title: "Bank Details not Updated",
                                });
                                </script>
                        <?php
                    }
                    
                }
                ?>

                    <?php
                        }
                        else{
                    ?>
                    <div class=" col-md-9">
                <h4 align=""><b>Bank Details</b></h4>
      

          <div style="font-family: Montserrat;" class="store-details"><br>
      
          <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" onsubmit="return validation()" enctype="multipart/form-data" >
          
          <div style="margin: 20px; width: 900px;"  class="form-row">
            <div class="form-group col-md-6">
              <label for="acname">Account Name</label>
              <input name="acctname" type="text" class="form-control acctname" id="acname" placeholder="Account name" required>
              <p><span class="emsg hidden">Please Enter a Valid Account Name</span></p>
            <span id="accname" class="text-danger font-weight-bold"></span>
            <h5 id="acccheck"> </h5>
            </div>
            
            <div class="form-group col-md-6">
              <label for="bnkname">Bank Name</label>
              <input name="bkname" type="text" class="form-control bkname" id="bnkname" placeholder="Bank name" required>
              <p><span class="emsg1 hidden">Please Enter a Valid Bank Name</span></p>
              <span id="bkkname" class="text-danger font-weight-bold"></span>
              <h5 id="bankcheck"> </h5>
            </div>
          </div>

          <div style="margin: 20px; width: 900px;"  class="form-row">
            <div class="form-group col-md-6">
              <label for="brnname">Branch Name</label>
              <input name="brname" type="text" class="form-control brname" id="brnname" placeholder="Branch name" required>
              <p><span class="emsg2 hidden">Please Enter a Valid Branch Name</span></p>
              <span id="brname" class="text-danger font-weight-bold"></span>
              <h5 id="branchcheck"> </h5>
            </div>
           
            <div class="form-group col-md-6">
              <label for="bnk_acc_no">Account Number</label>
              <input name="bkacctno" type="text" class="form-control bkacctno" id="bnk_acc_no" placeholder="Bank account number" required>
              <p><span class="emsg3 hidden">Please Enter a Valid Account Number</span></p>
              <span id="bkacctno" class="text-danger font-weight-bold"></span>
              <h5 id="numbercheck"> </h5>
            </div>
          </div>

          <div style="margin: 20px; width: 900px;"  class="form-row">
            <div class="form-group col-md-6">
              <label for="ifsccode">IFSC Code</label>
              <input name="ifsc" type="text" class="form-control ifsc" id="ifsccode" placeholder="IFSC code" required>
              <p><span class="emsg4 hidden">Please Enter a Valid IFSC Code</span></p>
              <span id="ifsc" class="text-danger font-weight-bold"></span>
              <h5 id="ifsccheck"> </h5>
            </div>
           
            <div class="form-group col-md-6">
              <label for="formFile" class="form-label">Cancelled Cheque</label>
              <input name="canchequeproof" accept="image/*,.pdf,.docx" class="form-control canchequeproof" type="file" id="formFile" required>
              
              <p><span class="emsg5 hidden">Please Enter a File in Pdf Format</span></p>
            </div>
            </div>
          </div>
            
        
          <script type="text/javascript">
            $(document).ready(function(){

                //validation of account name
                
                $('.acctname').on('keypress keydown keyup',function(){
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

                    //Validation of bank name
                    
                $('.bkname').on('keypress keydown keyup',function(){
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

                    //Validation of branch name
                $('.brname').on('keypress keydown keyup',function(){
                    var $regexname=/^([a-zA-Z ]{2,30})$/;
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
                   

                    //Validation of account number
                $('.bkacctno').on('keypress keydown keyup',function(){
                    var $regexname=/^(\d{9,18})$/;
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
                    

                    //Validation of ifsc code
                $('.ifsc').on('keypress keydown keyup',function(){
                    var $regexname=/^[A-Za-z]{4}[a-zA-Z0-9]{7}$/;
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
                   

            });
            </script>


        

        <div style="margin: 20px;" class="form-row">
                                <div class="form-group col-md-12">
                                    <input id="save-store" class="button" type="submit" name="save" value="Save" step_number="2">
                                    <input id="save-store" class="button" type="submit" name="Next" value="Next" step_number="2">
                                </div>
                            </div>
                            <?php 
                            }
                        ?>
          </form> 
        </div>
        
           <script>
                // Here the value is stored in new variable x 
                function myFunction() {
                var x = document.getElementById("myText").value;
                // document.getElementById("demo").innerHTML = x + ".kwyk.com";
                document.getElementById("myText").value = x + ".kwyk.com";
                const button = document.getElementById('trybtn');

            // ✅ Set the disabled attribute
                button.setAttribute('disabled', '');

            // ✅ Remove the disabled attribute
            // button.removeAttribute('disabled');

                
                }
            </script>

<script>

function validation()
                {
                var name = document.getElementById('acname').value;
                var bnkkname = document.getElementById('bnkname').value;
                var branchname = document.getElementById('brnname').value;
                var bnkaccno = document.getElementById('bnk_acc_no').value;
                var ifsccode = document.getElementById('ifsccode').value;
                 

                
                //Validation of account name
                var regname = /^[a-zA-Z ]{2,50}$/;
                var accname = regname.test(name);
                if (accname==false) 
                {
                    
                    document.getElementById('accname').innerHTML="";
                    return false;
                    
                }
                else
                    {
                        document.getElementById('accname').innerHTML="";
                    }


                 //Validation of bank name

                var regbankname = /^[a-zA-Z ]{2,30}$/;
                var bkkname = regbankname.test(bnkkname);
                if (bkkname==false) 
                {
                    document.getElementById('bkkname').innerHTML="";
                    return false;
                    
                }
                
                else
                    {
                        document.getElementById('bkkname').innerHTML="";
                    }
            
                //Validation of branch name
                var regbranchname = /^[a-zA-Z ]{2,30}$/;
                var brname = regbranchname.test(branchname);
                if (brname==false) 
                {
                    document.getElementById('brname').innerHTML="";
                    return false;
                    
                }
                else{
                        document.getElementById('brname').innerHTML="";
                    }
                
               
                //Validation of account number
                var regaccno = /^(\d{3,16})$/;
                var bkacctno = regaccno.test(bnkaccno);
                if (bkacctno==false) 
                {
                    document.getElementById('bkacctno').innerHTML="";
                    return false;
                    
                }
                else
                    {
                        document.getElementById('bkacctno').innerHTML="";
                    }


                //Validation of ifsc code
                var regifsc = /^[A-Za-z]{4}[a-zA-Z0-9]{7}$/;
                var ifsc = regifsc.test(ifsccode);
                if (ifsc==false) 
                {
                    document.getElementById('ifsc').innerHTML="";
                    return false;
                    
                }
                else
                     {
                        document.getElementById('ifsc').innerHTML="";
                        
                     }


                    }
            </script>

           
            
    <?php 
        if(isset($_POST['save'])){
          $acctname=$_POST['acctname']; 
          $bkname=$_POST['bkname']; 
          $brname=$_POST['brname']; 
          $bkacctno=$_POST['bkacctno']; 
          $ifsc=$_POST['ifsc']; 
          $canchequefile = addslashes(file_get_contents($_FILES["canchequeproof"]["tmp_name"]));
          // $deltype = $_POST['deliverytype'];

          $log_id=$_SESSION["log_id"];
        

          $query = "UPDATE `shop` SET acctname='$acctname', acctno='$bkacctno',bankname='$bkname', branch='$brname',IFSC ='$ifsc',cancheque='$canchequefile' WHERE `log_id` = $log_id";

          $run = mysqli_query($conn, $query);
          if($run){
              echo '<script>
                            
              swal({
                  icon:"success",
                  title:"Bank Details Saved!"})
              .then((value) => {
                  swal(location.replace("http://localhost/kwykpr/bankdetail.php"));
              });
                  </script>';
          }
          else
          { 
              echo '<script>swal({
                icon: "danger",
                title: "Bank Details not Saved",
                });
                </script>';
          }

      }
        
        
    ?>      
      
    </body>
  </html>
                       