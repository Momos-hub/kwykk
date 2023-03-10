<?php
 include "conn.php";
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'chaudhari.punam14@gmail.com';                     //SMTP username
    $mail->Password   = 'Vallabh99';                               //SMTP password
    // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->SMTPSecure = 'ssl'; 
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('chaudhari.punam14@gmail.com', 'kwyk');
    $mail->addAddress('dinesh.banswal@mitwpu.edu.in');     //Add a recipient
    // $mail->addAddress('ellen@example.com');               //Name is optional
    $mail->addReplyTo('no-reply@gmail.com', 'No-reply');
    
    // //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>



<!-- <?php
include "conn.php";
error_reporting(0);

//On clicking Submit Button, Process the form.
if(isset($_POST['submit']))
{
    //Get variables from the form.
    $e = $_POST['eid'];
    
    $email = mysqli_real_escape_string($conn, $_POST['Email']);
    

    $emailquery = " select * from emailverif where email='$e' ";
    $query = mysqli_query($conn,$emailquery);


    $emailcount = mysqli_num_rows($query);

    if($emailcount){

        $userdata = mysqli_fetch_array($query);

        $username = $userdata['Email'];
        $id = $userdata['id'];
        $token = $userdata['token'];

           $subject = "Password Reset";
           $body = "Hii, $username. Click here to reset your Password....Your ID is $id.
           http://localhost/Login/reset_password.php?id=$id ";
           $sender_email = "From:chaudhari.punam14@gmail.com";

           if(mail($e, $subject, $body, $sender_email)){
               ?>
            <script>
            alert("Check your mail to reset your password!!!!");
        </script>
        <?php
            //    header('location:signin.php');
           }else{
               echo "Email sending failed...";
           }
    }else{
        ?>
        <script>
        alert("This Email does not exist...Please enter valid email!!");
    </script>
    <?php
    }
   
}

?> -->




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="signup1.css">
    <script src="https://kit.fontawesome.com/716d860306.js" crossorigin="anonymous"></script>
</head>
<style>
    .container{
    height: 250px;
    width: 500px;
    background-color: #A5D8EF;
    transition: all ls linear;
    border-radius: 20px;
    box-shadow: rgba(0,0,0,0.24) 0px 3px 8px;
    position: absolute;
    top: 320px;
    left: 50%;
    transform: translate(-50%, -50%);
    overflow: hidden;
}

.signup_text{
    position:absolute; 
    top: 45px;
    color: black; 
    transform:translate(-50%, -50%); 
    font-size: 35px; 
    left:50%;
}
.signup_email_input{
    margin-top:35px; 
}
#emailicon {margin-top:35px;}
.signup_btn{margin-top:38px;}
</style>

<body>
    
    <img src="bg.jpg" class="main" height="715vh" width="100%" alt="">
    <div class="containerlogo">
        <img src="logo.png" alt="KWYK Logo" class="logo">
        <!-- <h3 class="tagline1">Delivering City's Best<br>to your Doorstep</h3> -->
        <!-- <h1 class="tagline2">#just<b style="color: #4bb1DF;">kwyk</b>it</h1> -->
    </div>
    
    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
        <div class="container">

            <div class="registration_div">
                <h3  class="signup_text"><b>Enter Email</b></h3>

                <input type="email" class="signup_email_input" name="eid" placeholder="Email" required >
                <i class="fa fa-envelope" arto-hidden="true" id="emailicon"></i>

                <button class="signup_btn" name="submit"><b>Send mail</b> </button>
                 

            
            </div>
        </div>
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script type=text/javascript>
            $('.signup_btn').click(function(){
                Swal.fire({
                    title: 'Login Successful',
                    text: 'Welcome to Kwyk',
                    icon: 'success',
                    confirmButtonText: 'OK'
                })
            });
        </script> -->
    </form>
</body>
</html>