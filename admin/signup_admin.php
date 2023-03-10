<?php
include "conn.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Signup</title>
  <link rel="shortcut icon" href="/kwykpr/White_on_Blue.png" type="image/x-icon">
  <link rel="stylesheet" href="/kwykpr/bank_validation.css">
  
    
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
    margin-top: 20px;
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

// error_reporting(0);

//On clicking Submit Button, Process the form.
if(isset($_POST['submit']))
{
    //Get variables from the form.
    $name=$_POST['name'];
    $mobile = $_POST['mobile'];
    $email= $_POST['email'];
    $pwd = $_POST['pwd'];
    // $re_pwd = $_POST['re_pwd'];

    //Query for Inserting 
    $sql="insert into signup(log_typeID,Name,Mobile,Email,Password) values (101,'$name','$mobile','$email','$pwd')";

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
        $insertquery = "insert into signup(log_typeID,Name,Mobile,Email,Password) values (101,'$name','$mobile','$email','$pwd')";

        $iquery = mysqli_query($conn, $insertquery);
        $conn->close();

        if($iquery)
        {
            ?>
            <script>
                swal({
                    title:"Account created! Sign In to continue"})
                    .then((value) => {
                        swal(location.replace("http://localhost/kwykpr/admin/signin_admin.php"));
                    });
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
<!-- <img src="" class="main" height="715vh" width="100%" alt=""> -->
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
                                <button  type="submit" name="submit" class="btn" >Sign Up</button>
                                <p style="margin-top: 20px;">Already have an account? <a href="signin_admin.php">Sign in</a></p>
                            </div>

                            
            
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
                    var $regexname=/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
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
       var regname = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
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