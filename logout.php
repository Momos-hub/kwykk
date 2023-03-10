<?php
session_start();

session_destroy();
include('common.php');

if(isset($_submit)){
    echo "You are logged out...login again!!!";
     header('location:http://localhost/Login/signin.php');
}

?>