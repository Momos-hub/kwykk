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
    <link rel="stylesheet" href="Uploaddoc.css">
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

            <!-- <div class="space1 col-md-9"> -->
                <!-- <div class="upl1 col-md-9"> -->
                <div class="space1 col-md-9" style="overflow :scroll; overflow-x: hidden; height:700px; width:100%;">
                    <?php 
                        include('conn.php');//connecting with database
                        $log_id = $_SESSION['log_id'];
                        //query to select data from table 'shopinfo' of a particular login id
                        $sql = "SELECT *FROM `shop` WHERE `log_id`='$log_id'";

                        $run = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_array($run);
                        $count = mysqli_num_rows($run);//to check if the selected email is exist in database or not 
                        if(isset($row['S_pan']) && !empty ($row['S_pan'])){
                    ?>
                        <form action="" method="post" enctype="multipart/form-data">
                            <!-- <h3 style="font-family: 'Ubuntu', sans-serif; text-align:center;">Store Details</h3> -->
                            
                            
                            <div class="col-md-12">
            <h4 align="center" style="margin-top:5px;"><b>Update Uploaded Documents</b></h4>
                <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" onsubmit="return validation()" enctype="multipart/form-data">
                <div style="font-family: Maastrict;" class="">


                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
                
                <!-- <h5 align="center"><b>Upload Documents</b></h5> -->
                <div style="margin: 20px; width: 900px;"  class="form-row">
                    
                
                <div class="form-group col-md-6">
                         <label for="inputPassword4">PAN No.</label>
                         <input name="shopPANno" type="text" class="form-control shopPANno" id="inputPassword4" required value=<?php echo $row['S_pan']?>>
                         <span id="panno" class="text-danger font-weight-bold"></span>
                         <p><span class="emsg hidden">Please Enter a Valid PAN Number</span></p>
                    </div>
                    
                    
                    <div class="form-group col-md-6">
                        <label for="formFile" class="form-label">PAN Card (jpeg/png/jpg)</label>
                        <input name="shoppan" class="form-control shoppan" accept="image/png, image/jpeg, image/jpg" type="file" id="formFile">
                        <?php echo '<img class="dis_img" onclick="onClick(this)" class="w3-hover-opacity" style="cursor:pointer;" src="data:image;base64,'.base64_encode($row['PanProof']).' " alt="">';?>
                        <div class="middle" style="margin-top:70px;">
                                        <div class="text">Click to expand</div>
                                    </div>
                                </div>
                    </div>
                    </div>
                    <div style="margin: 20px; width: 900px;"  class="form-row">    
                    
                    <div class="form-group col-md-6">
                         <label for="inputPassword4">GSTIN No.</label>
                         <input name="shopGSTno" type="text" class="form-control shopGSTno" id="gstin" required value=<?php echo $row['GSTno']?>>
                         <span id="gstno" class="text-danger font-weight-bold"></span>
                         <p><span class="emsg1 hidden">Please Enter a Valid GSTIN Number</span></p>
                    </div>
                    
                    
                    <div class="form-group col-md-6">
                        <label for="formFile" class="form-label">GSTIN (jpeg/png/jpg)</label>
                        <input name="shopgstproof" class="form-control shopgstproof" accept="image/png, image/jpeg, image/jpg" type="file" id="formFile">
                        <?php echo '<img class="dis_img" onclick="onClick(this)" class="w3-hover-opacity" style="cursor:pointer;" src="data:image;base64,'.base64_encode($row['GSTproof']).' " alt="">';?>
                        <div class="middle" style="margin-top:70px;">
                                        <div class="text">Click to expand</div>
                                    </div>
                                </div>
                    </div>
                    </div>
                    <div style="margin: 20px; width: 900px;"  class="form-row">
                    
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

                    <?php 
                     include('conn.php');
                     $log_id = $_SESSION['log_id'];
                     $sql = "SELECT *FROM `shop` WHERE `log_id`=$log_id";

                     $run = mysqli_query($conn, $sql); 
                                            $record_count = mysqli_fetch_assoc($run);
                                            $cat=$record_count['category_id'];
                                            // echo $cat;

                     if($cat === '2001'){
                    ?>
                    <div class="form-group col-md-6">
                         <label for="inputPassword4">Food License No.</label>
                         <input name="shoplicenseno" type="text" class="form-control shoplicenseno" id="license" required value=<?php echo $row['LincenseNo']?>>
                         <span id="licencseno" class="text-danger font-weight-bold"></span>
                         <p><span class="emsg2 hidden">Please Enter a Valid License Number</span></p>
                    </div>
                    
                    
                    <div class="form-group col-md-6"> 
                        <label for="formFile" class="form-label">Food License (jpeg/png/jpg)</label>
                        <input name="shoplicenseproof" class="form-control shoplicenseproof" accept="image/png, image/jpeg, image/jpg" type="file" id="formFile" required>
                    </div>
                    
                    <div style="margin: 20px;" class="form-row">                      
                        <div class="form-group col-md-12" style="text-align: center">
                            <input  class="button" type="submit" name="update" value="Update">
                            <input id="save-store" class="button" type="submit" name="next" value="Next">
                        </div>
                    
                </div>
                
</div>
                </div>
                <?php
                        if(isset($_POST['Next'])){
                            echo '<script>location.replace("http://localhost/kwykpr/bankdetail.php");</script>';
                        } 
                    
                    if(isset($_POST['update']))
                    {

                        $shopPAN=$_POST['shopPANno'];
                        $PANfile = addslashes(file_get_contents($_FILES["shoppan"]["tmp_name"]));
                        $shopGST=$_POST['shopGSTno'];
                        $GSTfile = addslashes(file_get_contents($_FILES["shopgstproof"]["tmp_name"]));
                        $shoplicenseno = $_POST['shoplicenseno'];
                        $licencefile = addslashes(file_get_contents($_FILES["shoplicenseproof"]["tmp_name"]));
                
                        $log_id=$_SESSION["log_id"];
                
                        $query = "UPDATE `shop` SET S_pan='$shopPAN', PanProof='$PANfile',GSTno='$shopGST', GSTproof='$GSTfile',LincenseNo ='$shoplicenseno', licenseProof='$licencefile' WHERE `log_id` = $log_id";
                
                        $run = mysqli_query($conn, $query);
                        if($run){?>
                            '<script>
                            
                            swal({
                                icon:"success",
                                title:"Document Uploaded!"})
                            .then((value) => {
                                swal(location.replace("http://localhost/kwykpr/uploaddoc.php"));
                            });
                                </script>'
                        <?php 
                        
                        } 
                        else{
                            ?>
                            <script>swal({
                                icon: "danger",
                                title: "Document not Uploaded",
                                });
                                </script>
                        <?php
                    }
                    
                }
                ?>
                            <?php
                                // }
                            ?>
                            
                        </form>
                        <?php
                     }
                     else{
?>
<div style="margin: 20px;" class="form-row">                      
                        <div class="form-group col-md-12" style="text-align: center">
                            <input  class="button" type="submit" name="update" value="Update">
                            <input id="save-store" class="button" type="submit" name="next" value="Next">
                        </div>
                    
                </div>
                        <?php

                        if(isset($_POST['update']))
                    {

                        $shopPAN=$_POST['shopPANno'];
                        $PANfile = addslashes(file_get_contents($_FILES["shoppan"]["tmp_name"]));
                        $shopGST=$_POST['shopGSTno'];
                        $GSTfile = addslashes(file_get_contents($_FILES["shopgstproof"]["tmp_name"]));
                        // $shoplicenseno = $_POST['shoplicenseno'];
                        // $licencefile = addslashes(file_get_contents($_FILES["shoplicenseproof"]["tmp_name"]));
                
                        $log_id=$_SESSION["log_id"];
                
                        $query = "UPDATE `shop` SET S_pan='$shopPAN', PanProof='$PANfile',GSTno='$shopGST', GSTproof='$GSTfile' WHERE `log_id` = $log_id";
                
                        $run = mysqli_query($conn, $query);
                        if($run){?>
                            '<script>
                            
                            swal({
                                icon:"success",
                                title:"Document Uploaded!"})
                            .then((value) => {
                                swal(location.replace("http://localhost/kwykpr/uploaddoc.php"));
                            });
                                </script>'
                        <?php 
                        
                        } 
                        else{
                            ?>
                            <script>swal({
                                icon: "danger",
                                title: "Document not Uploaded",
                                });
                                </script>
                        <?php
                    }
                    
                }
                ?>
                            
                            
                        </form>
                     <!-- ?> -->
<?php
                     }
                     ?>
                    <?php
                        }
                        else{
                    ?>
                        <div class="col-md-9">
            <h4 align="center"><b>Upload Documents</b></h4>
                <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" onsubmit="return validation()" enctype="multipart/form-data">
                <div style="font-family: Maastrict;" class="">


                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
                
                <!-- <h5 align="center"><b>Upload Documents</b></h5> -->
                <div style="margin: 20px; width: 900px;"  class="form-row">
                    
                
                <div class="form-group col-md-6">
                         <label for="inputPassword4">PAN No.</label>
                         <input name="shopPANno" type="text" class="form-control shopPANno" id="inputPassword4" placeholder="PAN No." required>
                         <span id="panno" class="text-danger font-weight-bold"></span>
                         <p><span class="emsg hidden">Please Enter a Valid Pan Number</span></p>
                    </div>
                    
                    
                    <div class="form-group col-md-6">
                        <label for="formFile" class="form-label">PAN Card</label>
                        <input name="shoppan" class="form-control shoppan" accept="image/*,.pdf,.docx" type="file" id="formFile" required>
                        
                    </div>
</div>
<div style="margin: 20px; width: 900px;"  class="form-row">    
                    
                    <div class="form-group col-md-6">
                         <label for="inputPassword4">GSTIN No.</label>
                         <input name="shopGSTno" type="text" class="form-control shopGSTno" id="gstin" placeholder="GSTIN No." required>
                         <span id="gstno" class="text-danger font-weight-bold"></span>
                         <p><span class="emsg1 hidden">Please Enter a Valid GSTIN Number</span></p>
                    </div>
                    
                    
                    <div class="form-group col-md-6">
                        <label for="formFile" class="form-label">GSTIN</label>
                        <input name="shopgstproof" class="form-control shopgstproof" accept="image/*,.pdf,.docx" type="file" id="formFile" required>
                    </div>
</div>
<div style="margin: 20px; width: 900px;"  class="form-row">
                    
<?php 
                     include('conn.php');
                     $log_id = $_SESSION['log_id'];
                     $sql = "SELECT *FROM `shop` WHERE `log_id`=$log_id";

                     $run = mysqli_query($conn, $sql); 
                                            $record_count = mysqli_fetch_assoc($run);
                                            $cat=$record_count['category_id'];
                                            // echo $cat;

                     if($cat === '2001'){
                    ?>
                    <div class="form-group col-md-6">
                         <label for="inputPassword4">Food License No.</label>
                         <input name="shoplicenseno" type="text" class="form-control shoplicenseno" id="license" required value=<?php echo $row['LincenseNo']?>>
                         <span id="licencseno" class="text-danger font-weight-bold"></span>
                         <p><span class="emsg2 hidden">Please Enter a Valid License Number</span></p>
                    </div>
                    
                    
                    <div class="form-group col-md-6"> 
                        <label for="formFile" class="form-label">Food License</label>
                        <input name="shoplicenseproof" class="form-control shoplicenseproof" accept="image/*,.pdf,.docx" type="file" id="formFile" required>
                    </div>
                    <?php
                     }
                     ?>
                    
</div>
                </div>


                <script type="text/javascript">
                $(document).ready(function(){

                //validation of pan number
                
                $('.shopPANno').on('keypress keydown keyup',function(){
                    var $regexname=/^([A-Z]{5}[0-9]{4}[A-Z]{1})$/;
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


                    //Validation of gst number
                    $('.shopGSTno').on('keypress keydown keyup',function(){
                    var $regexname=/^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}$/;
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


                     //Validation of license number
                     $('.shoplicenseno').on('keypress keydown keyup',function(){
                    var $regexname=/^(\d[0-9]{13})$/;
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

                  });
                </script>
                        
                        
                        <div style="margin: 20px;" class="form-row">                      
                        <div class="form-group col-md-12" style="text-align: center">
                            <input  class="button" type="submit" name="upload" value="Upload data">
                            <input id="save-store" class="button" type="submit" name="next" value="Next">
                        </div>
                </div>
                <?php
                            }
                        ?>
                    </form>
                </div>
            </div>
        </div>
                        </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>   
    <script>
    
    function validation()
                {

                var pan = document.getElementById('inputPassword4').value;
                var gst = document.getElementById('gstin').value;
                var licennse = document.getElementById('license').value;
                //var bnkaccno = document.getElementById('bnk_acc_no').value;
                //var ifsccode = document.getElementById('ifsccode').value;
                 



                //Validation of pan no
                var regname = /^([A-Z]{5}[0-9]{4}[A-Z]{1})$/;
                var panno = regname.test(pan);
                if(panno==false) 
                {
                    
                    document.getElementById('panno').innerHTML="";
                    return false;
                    
                }
                else
                    {
                        document.getElementById('panno').innerHTML="";
                    }


                
                //Validation of gstno
                var regname = /^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}$/;
                var gstno = regname.test(gst);
                if(gstno==false) 
                {
                    
                    document.getElementById('gstno').innerHTML="";
                    return false;
                    
                }
                else
                    {
                        document.getElementById('gstno').innerHTML="";
                    }

                //Validation of license no
                var regname = /^(\d[0-9]{13})$/;
                var licencseno = regname.test(licennse);
                if(licencseno==false) 
                {
                    
                    document.getElementById('licencseno').innerHTML="";
                    return false;
                    
                }
                else
                    {
                        document.getElementById('licencseno').innerHTML="";
                    }




                }


        </script> 

<?php

if(isset($_POST['next'])){
    echo '<script>location.replace("http://localhost/kwykpr/bankdetail.php");</script>';
}    

    if(isset($_POST['upload'])){

        if($cat == '2001'){
            $shopPAN=$_POST['shopPANno'];
        $PANfile = addslashes(file_get_contents($_FILES["shoppan"]["tmp_name"]));
        $shopGST=$_POST['shopGSTno'];
        $GSTfile = addslashes(file_get_contents($_FILES["shopgstproof"]["tmp_name"]));
        $shoplicenseno = $_POST['shoplicenseno'];
        $licencefile = addslashes(file_get_contents($_FILES["shoplicenseproof"]["tmp_name"]));
        
        // $deltype = $_POST['deliverytype'];

        $log_id=$_SESSION["log_id"];
        $query = "UPDATE `shop` SET S_pan='$shopPAN', PanProof='$PANfile',GSTno='$shopGST', GSTproof='$GSTfile',LincenseNo ='$shoplicenseno', licenseProof='$licencefile' WHERE `log_id` = $log_id";
        }
        else{
        $shopPAN=$_POST['shopPANno'];
        $PANfile = addslashes(file_get_contents($_FILES["shoppan"]["tmp_name"]));
        $shopGST=$_POST['shopGSTno'];
        $GSTfile = addslashes(file_get_contents($_FILES["shopgstproof"]["tmp_name"]));
        // $shoplicenseno = $_POST['shoplicenseno'];
        // $licencefile = addslashes(file_get_contents($_FILES["shoplicenseproof"]["tmp_name"]));
        
        // $deltype = $_POST['deliverytype'];

        $log_id=$_SESSION["log_id"];
            $query = "UPDATE `shop` SET S_pan='$shopPAN', PanProof='$PANfile',GSTno='$shopGST', GSTproof='$GSTfile' WHERE `log_id` = $log_id";

        }
        $run = mysqli_query($conn, $query);
        
        if($run){
            echo '<script>
                            
            swal("Record Saved!")
            .then((value) => {
                swal(location.replace("http://localhost/kwykpr/uploaddoc.php"));
            });
                </script>';
        }
        else{
            echo '<script>swal({
                icon: "danger",
                title: "Error!",
                });
                </script>';
        }

    }

?>
</body>
</html>