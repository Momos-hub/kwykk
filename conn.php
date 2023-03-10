<?php

//Creating Connection
$conn = new mysqli('localhost', 'root', '', 'kwykdb');

//Checking it
if($conn->connect_error)
{
    die("Connection Failed...\n " .$conn->connect_error);
}
?>
