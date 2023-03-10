<?php
session_start();
include('conn.php');
// $sname=$_SESSION["Sname"];
$logid=$_SESSION["log_id"];

?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->

    <link rel="stylesheet" href="/kwykpr/one.css">
    <link rel="stylesheet" href="/kwykpr/dashboard.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="shortcut icon" href="White_on_Blue.png" type="image/x-icon">
    <script src="https://kit.fontawesome.com/716d860306.js" crossorigin="anonymous"></script>    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </head>
  <style>
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
.navbar{
    margin-bottom: 0 !important;
}
  </style>
  <body>

    <nav class="navbar navbar-expand-lg ">
        <div class="container-fluid ">
            <img class="navlogo" src="\kwykpr\Web\img\Kwyk_white_Transparent.png " alt="">
            <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button> -->
            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="navlink" aria-current="page" href="#"> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp</a>
                </li>
                <li class="nav-item">
                <a class="navlink" aria-current="page" href="#">&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp</a>
                 
                </li>
                
                
    </form>
   
    <!-- <script> -->
        <!-- // function save_status() { -->
            
        <!-- </script> -->
 
                <!-- <li class="">   
                <label class="switch" style="text-align: right; margin: 10px 0px;">
                    <input type="checkbox" name="O_Status" >
                    <span class="switch-label" data-on="On" data-off="Off"></span> 
                     <span class="slider round"></span>
                </label>
                </li>  
                 -->
                <li class="nav-item" style="margin-left: 170px ">
                        
                
                <h4 style="text-align: center; font-size: 20px; margin-left: 170px"><?php echo 'Admin Dashboard' ?> </h4>
               
                </li>
            </ul>
            <form class="d-flex" method="post">
                
                <button class="button" type="submit" name="logout">Logout</button>
            </form>
            </div>
        </div>
    </nav>

     <?php
        include('conn.php');

        if(isset($_POST['logout'])){
            session_start();
            session_destroy();
            echo'<script>
            swal({
                icon:"success",
                title:"Logout Successful"})
            .then((value) => {
                swal(location.replace("http://localhost/kwykpr/admin/signin_admin.php"));
            });
                </script>;';
            exit();
        }

    ?> 

  </body>
</html>