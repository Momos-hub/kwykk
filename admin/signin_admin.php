<?php 
session_start();
include "conn.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Sign in</title>
  <link rel="stylesheet" href="/kwykpr/bank_validation.css">
  <link rel="shortcut icon" href="/kwykpr/White_on_Blue.png" type="image/x-icon">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 <style>
*{
    font-family:'Montserrat';
}    

.modal-box{ font-family: 'MONTSERRAT', sans-serif; }
.modal-dialog{
    width: 400px;
    margin: 40px auto 0;
}
.modal-dialog{ transform: scale(0.5); }
.modal-dialog{ transform: scale(1); }
.modal-dialog .modal-content{
    text-align: center;
    border: none;
}

.modal-content .close:hover{
    color: #fff;
    box-shadow: 0 0 5px rgba(0,0,0,0.5);
}
.close:focus{ outline: none; }
.modal-body{ padding: 40px 40px !important; }
.modal-body .title{
    color: #4bb1df;
    font-size: 33px;
    font-weight: 700;
    letter-spacing: 1px;
}
.modal-body {
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
    padding: 6px 0 6px 50px;
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
.form-group.checkbox input[type=checkbox]{
    margin-left: 0;
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
        padding: 40px 20px 40px !important;
    }
}
body            
{
    background-image:url('/kwykpr/bg.jpg');
    /* background-color:#ebebeb; */background-repeat: no-repeat;
  background-size: 100%;
    
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
  background-color: #4BB1DF;
  border: 1px solid #4BB1DF;
  /* text-shadow: 0px -1px 0px rgba(0, 0, 0, 0.3); */
}
.swal-footer{
    text-align:center;
}
  </style>
</head>
<body>
<?php

//On clicking Submit Button, Process the form.
if(isset($_POST['submit']))
{
    //Get variables from the form.
    $email= $_POST['email'];
    $pwd = $_POST['pwd'];
    // $re_pwd = $_POST['re_pwd'];

    $email_search = "SELECT * FROM `signup` WHERE `Email` = '$email'& log_typeID=101";
    $query_email = mysqli_query($conn, $email_search);

    // if (!empty($email_search) && $query !== true) {
    //     return @mysqli_num_rows($query);
    // }

    $record_count_email = mysqli_num_rows($query_email);

    if($record_count_email){
        $record_email = mysqli_fetch_assoc($query_email);
       
        $db_pass = $record_email['Password'];
       $type = $record_email['log_typeID'];
        
        $pass_verify = password_verify($pwd, $db_pass);
        if($type == 101){
        // echo $pass_verify;
        if($pwd==$db_pass)
        { 
            $_SESSION["name"] = $record_email['Name'];  //retrive from db and store user name in session
            $_SESSION["log_id"] = $record_email['log_id'];

            $logid=$record_email['log_id'];
            // echo '<script> swal({title: "Fill the store details for onboard!!",});</script>'; 
           
?>
            <script>
                swal({
                    title:"Welcome to Admin Dashboard"})
                    .then((value) => {
                        swal(location.replace("http://localhost/kwykpr/admin/ordermanage_admin.php"));
                    });
                </script>;
<?php    
        
        
    }
    else{
        ?>

    <script>
        swal({
            title: "Invalid Password",
        });
    </script>
    
<?php  
        }
    }
    else{
        ?>
        <script>
        swal({
            title:"Login with Admin Credentials",
        });
        </script>;
        <?php
    }
  
    }
    else
    {
?>
    <script>
        swal({
            title: "Email not Registered",
        });
    </script>
<?php         
    }
}

?>
<!-- <img src="bg.jpg" class="main" height="715vh" width="100%" alt=""> -->
  <div class="container">
  <img src="/kwykpr/logo.png" alt="KWYK Logo" class="logo" style="position: absolute;left: 3%;top: 5%;width: 125px;height: 90px;">
    <div class="row">
        <div class="col-md-12">
            <!-- <div class="modal-box"> -->
                <div   id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content clearfix">
                            <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button> -->
                            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" onsubmit="return validation()">

                            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
                            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

                            <div class="modal-body">
                                <h3 class="title" style="margin: 0 0 20px; ">Sign In</h3>  
                                <div class="form-group">
                                    <span class="input-icon"><i class="fas fa-envelope"></i></span>
                                    <input type="email" name="email" class="form-control email" id="useremail" placeholder="Enter Email" required>
                                    <span id="usremail" class="text-danger font-weight-bold"></span>
                                    <p><span class="emsg2 hidden">Please Enter Valid Email</span></p>
                                </div>
                                <div class="form-group">
                                    <span class="input-icon"><i class="fas fa-key"></i></span>
                                    <input type="password" name="pwd" class="form-control pwd" id="pass" placeholder="Password" required>
                                    <span id="userpass" class="text-danger font-weight-bold"></span>
                                    <p><span class="emsg3 hidden">Please Enter Valid Password</span></p>
                                </div>
                                <!-- <a href="" class="forgot-pass">Forgot Password?</a> -->
                                <button  type="submit" name="submit" class="btn" >Sign in</button>
                                <p style="margin-top: 20px;">Not have an account? <a href="signup_admin.php">Signup</a></p>
                            </div>

                            
            
            <script type="text/javascript">
            $(document).ready(function()
            {

         



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
       var userremail = document.getElementById('useremail').value;
       var usrpass = document.getElementById('pass').value;
       
        
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



                            </form>
                        </div>
                    </div>
                </div>
            <!-- </div> -->
        </div>
    </div>
</div>



</body>
</html>