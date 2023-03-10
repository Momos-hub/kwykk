<!-- This is navbar of admin  -->

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">    

    <!-- CSS Link -->
    <link rel="stylesheet" href="one.css">
    <link rel="stylesheet" href="dashboard.css">
    <!-- <link rel="stylesheet" href="uploaddoc.css"> -->

    <!-- Font link -->
    <link rel="pre ect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">
    
    <!-- <title>KWYK | Dashboard</title> -->

    <!-- Favicon -->
    <link rel="shortcut icon" href="White_on_Blue.png" type="image/x-icon">
  </head>
  <body>

    <script src="https://kit.fontawesome.com/716d860306.js" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid bg-dark">
            <img class="navlogo" src="kwyklogo.webp" alt="">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="navlink" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="navlink active" aria-current="page" href="">Dashboard</a>
                </li>
        
                <!-- <li class="nav-item">
                    <a class="navlink" href="#">About us</a>
                </li>
                <li class="nav-item">
                    <a class="navlink" href="#">Partner with us</a>
                </li> -->
            </ul>
            <form class="d-flex" method="post">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-primary" type="submit">Search</button>
                <button class="btn btn-primary" type="submit" name="logout">Logout</button>
            </form>
            </div>
        </div>
    </nav>

   
<?php
if(isset($_POST['logout'])){
    ?>
        <script>location.replace("http://localhost/kwykpr/adminsignin.php");</script>
    <?php
}
?>

    

    
  </body>
</html>
