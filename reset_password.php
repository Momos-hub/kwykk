


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
    height: 350px;
    width: 300px;
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
.signup_password_input{ 
    margin-top: 85px;
}
#lockicon {margin-top:25px;}
.signup_id_input{
    margin-top: 25px;
}

</style>

<body>
    
    <img src="bg.jpg" class="main" height="715vh" width="100%" alt="">
    <div class="containerlogo">
        <img src="logo.png" alt="KWYK Logo" class="logo">
        <!-- <h3 class="tagline1">Delivering City's Best<br>to your Doorstep</h3> -->
        <!-- <h1 class="tagline2">#just<b style="color: #4bb1DF;">kwyk</b>it</h1> -->
    </div>
    
    <form action="" method="post">
        <div class="container">

            <div class="registration_div">
                <h3 class="signup_text"><b>Update Password</b></h3>

                <p> <?php 
                    if(isset($_SESSION['passmsg'])){
                        echo $_SESSION['passmsg']; 
                    }else{
                        echo $_SESSION['passmsg'] = "";
                    }
               
                ?></p>

                <input type="password" class="signup_password_input" name="password" placeholder="New Password" required>
                <i class="fa fa-lock" aria-hidden="true" id="lockicon"></i>

                <input type="text" class="signup_id_input" name="ID" placeholder="ID" required>

                <input class="signup_btn btn btn-primary" type="submit" name="submit" value="update">
  
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

    <?php
   session_start();
   ob_start(); 

    include "conn.php";
    // error_reporting(0);

    //On clicking Submit Button, Process the form.
    if(isset($_POST['submit']))
    {
        
            $id = $_GET['id']; 
            $pass = $_POST['password'];
            

            $updatequery = "UPDATE `emailverif` SET `Password` = ' $pass' WHERE `id` = '$id' ";
            
            $iquery = mysqli_query($conn, $updatequery);
            $conn->close();

            if($iquery){
                ?>
                <script>
                    alert("Your password has been updated successfully!!!!");
                </script>
                <?php
            // header('location:signin.php');
            }
            else
            {
                ?>
                <script>
                alert("Password failed to update...Please try again!!!");
            </script>
            <?php
                // header('location:reset_password.php');
            }

        
        
    
    }
    

?>
</body>
</html>