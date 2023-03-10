
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
    $sql="insert into signup(log_typeID,Name,Mobile,Email,Password) values (102,'$name','$mobile','$email','$pwd')";

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
        $insertquery = "insert into signup(log_typeID,Name,Mobile,Email,Password) values (102,'$name','$mobile','$email','$pwd')";

        $iquery = mysqli_query($conn, $insertquery);
        $conn->close();

        if($iquery)
        {
            ?>
            <script>
                
                alert("Account Created Successfully!");
                location.replace("http://localhost/kwykpr/signin.php")
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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
    <link rel="stylesheet" href="signup.css">
    <script src="https://kit.fontawesome.com/716d860306.js" crossorigin="anonymous"></script>
</head>

<body>
    
    <img src="bg.jpg" class="main" height="715vh" width="100%" alt="">
    <div class="containerlogo">
        <img src="logo.png" alt="KWYK Logo" class="logo">
        <!-- <h3 class="tagline1">Delivering City's Best<br>to your Doorstep</h3> -->
        <!-- <h1 class="tagline2">#just<b style="color: #4bb1DF;">kwyk</b>it</h1> -->
    </div>
    
    <form name="myform" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" onsubmit="return validateform()">
        <div class="container">

            <div class="registration_div">
                <h3 class="signup_text"><b>Sign Up</b></h3>

                <!-- <input type="text" class="signup_username_input" name="name" placeholder="Name" required>
                <i class="fa fa-user" aria-hidden="true" id="usericon"></i>

                <input type="text" class="signup_mobile_input" name="mobile" placeholder="Mobile No." required>
                <i class="fa fa-mobile" aria-hidden="true" id="mobileicon"></i>

                <input type="email" class="signup_email_input" name="email" placeholder="Email" required >
                <i class="fa fa-envelope" arto-hidden="true" id="emailicon"></i>

                <input type="password" id="pass" class="signup_password_input" name="pwd" placeholder="Password" required>
                <i class="fa fa-lock" aria-hidden="true" id="lockicon"></i> -->

                <input type="text" class="ip" class="signup_username_input" name="name" placeholder="Name" required>
                <i class="fa fa-user" aria-hidden="true" id="usericon"></i>

                <input type="text" class="ip" id="mbno" class="signup_mobile_input" name="mobile" placeholder="Mobile No." required>
                <i class="fa fa-mobile" aria-hidden="true" id="mobileicon"></i>

                <input type="email" class="ip" id="mail" name="email" placeholder="Email" required >
                <i class="fa fa-envelope" arto-hidden="true" id="emailicon"></i>

                <input type="password" class="ip" id="pass" name="pwd" placeholder="Password" required>
                <i class="fa fa-lock" aria-hidden="true" id="lockicon"></i>

               
                <!-- <input type="checkbox" id="exampleCheck1" required>
                <label for="exampleCheck1">Agree to all terms and condition*</label> -->
                
                <div class="tandd" style="margin: 20px;" class="box form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" required>
                    <label class="form-check-label" for="flexCheckDefault">
                        <a class="tdl" href="https://www.kwyk.store/terms-and-conditions">Agree Terms and Conditions</a>
                    </label>
                </div>

                <input type=submit class="signup_btn"  name="submit" value="Signup">

                 <h3 class="already_accounttext">Already have an account? <span class="signin_now" ><a href="http://localhost/kwykpr/signin.php" >Sign In</a></span></h3>

                <h5 class="social_text2"><b>Follow us</b> </h5>

                <div class="facebook2"><a href="http://www.facebook.com/Kwyk.One/" target="_blank" class="iconc"><i class="fa fa-facebook" aria-hidden="true"></i></a></div>
                <div class="twitter2"><a href="http://twitter.com/kwyk_one" target="_blank" class="iconc"><i class="fa fa-twitter" aria-hidden="true"></i></a></div>
                <div class="instagram2"><a href="http://www.instagram.com/kwyk.one/" target="_blank" class="iconc"><i class="fa fa-instagram" aria-hidden="true"></i></a></div>

            
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        
        <script type="text/javascript">
        
        function validateform(){ 
                // alert("Passwords do not match.");
              var password = document.myform.pwd.value;
              
              var confirmPassword = document.getElementById('re_pass').value;
              
              if (password != confirmPassword) {
                  alert("Passwords do not match.");
                  return false;
        
                  }
               return true;
              }
            // $('.signup_btn').click(function(){
                
            //     var password = document.myform.pwd.value;
            //   alert("Passwords ".password);
            //     alert("Inside : Passwords do not match.");
            //     Swal.fire({
            //         title: 'Login Successful',
            //         text: 'Welcome to Kwyk',
            //         icon: 'success',
            //         confirmButtonText: 'OK'
            //     })
            // });
        </script>
    </form>
</body>
</html>