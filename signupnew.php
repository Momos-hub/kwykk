
<?php
include "conn.php";
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
    $sql="insert into signup(log_typeID,Name,Mobile,Email,Password) values (103,'$name','$mobile','$email','$pwd')";

    //Executing it.

    // if ($result == TRUE)
    // {
    // }
    // else{
    //     echo "Error" .$sql."<br>".$conn->error;

    // }
    

    $emailquery = " select * from signup where Email='$email' ";
    $query = mysqli_query($conn,$emailquery);


    $emailcount = mysqli_num_rows($query);

    if($emailcount>0){
        ?>
       <script>
                alert("Email already exists please enter another email id!!!!");
            </script>
            <?php
        exit();
    }
    else{
        $insertquery = "insert into signup(log_typeID,Name,Mobile,Email,Password) values (103,'$name','$mobile','$email','$pwd')";

        $iquery = mysqli_query($conn, $insertquery);
        $conn->close();

        if($iquery)
        {
            ?>
            <script>
                
                alert("Account Created Successfully!");
                // location.replace("http://localhost/kwykpr/signin.php")
            </script>
            <?php
        }
        else
        {
            ?>
            <script>
                alert("Account not Inserted");
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

<!DOCTYPE html>
<html lang="en">
<head>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">  
 <style>
.modal-box{ font-family: 'MONTSERRAT', sans-serif; }
.modal-dialog{
    width: 400px;
    margin: 70px auto 0;
}
.modal-dialog{ transform: scale(0.5); }
.modal-dialog{ transform: scale(1); }
.modal-dialog .modal-content{
    text-align: center;
    border: none;
}
.modal-content .close{
    color: #fff;
    /* background: #4bb1df; */
    /* background-image: url("Web_login_bg.jpg"); */
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

  </style>
</head>
<body style=" background: #A5D8EF;">
     
  <div class="container">
    <div class="row">
        <div class="col-md-12">
            <!-- <div class="modal-box"> -->
                <div   id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content clearfix">
                            <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button> -->
                            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
                            <div class="modal-body">
                                <h3 class="title" style="margin: 0 0 20px; ">Sign up</h3>
                                <div class="form-group">
                                    <span class="input-icon"><i class="fa fa-user"></i></span>
                                    <input type="text" name="name" class="form-control" placeholder="Enter Name" required>
                                </div>
                                <div class="form-group">
                                    <span class="input-icon"><i class="fas fa-mobile"></i></span>
                                    <input type="text" name="mobile" class="form-control" placeholder="Mobile no." required>
                                </div>
                                <div class="form-group">
                                    <span class="input-icon"><i class="fas fa-envelope"></i></span>
                                    <input type="email" name="email" class="form-control" placeholder="Enter Email" required>
                                </div>
                                <div class="form-group">
                                    <span class="input-icon"><i class="fas fa-key"></i></span>
                                    <input type="password" name="pwd" class="form-control" placeholder="Password" required>
                                </div>
                                <div class="form-group checkbox">
                                    <input type="checkbox">
                                    <label>Remamber me</label>
                                </div>
                                <!-- <a href="" class="forgot-pass">Forgot Password?</a> -->
                                <button  type="submit" name="submit" class="btn">Sign Up</button>
                                <p style="margin-top: 20px;">Already have an account? <a href="/signup.html">Sign in</a></p>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            <!-- </div> -->
        </div>
    </div>
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script><script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</body>
</html>