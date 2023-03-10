<?php
// session_start();
include('admin_nav.php');
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
    <title>KWYK | Merchants</title>
    <link rel="stylesheet" href="admin.css">
     <link rel="shortcut icon" href="White_on_Blue.png" type="image/x-icon">
     <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
     
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
        

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<style>
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
    font-size:15px;
    float: left !important;
    margin-right: 5px !important;
}

        </style>
   </head>
            
        <body>
            <div class="row">
        <div style="width:300px;height:100%; border-right: 1px solid rgba(0,0,0,.1); height: calc(100vh - 90px);">
                <?php
                   include('admin_side.php');
                   $logid=$_SESSION["log_id"];
                ?>
            </div>