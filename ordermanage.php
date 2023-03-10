<?php
// session_start();
include('common.php');
include('conn.php');
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KWYK | Order Management</title>
    <link rel="stylesheet" href="ordermanage.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <!-- <link rel="stylesheet" href="orderdetail.css"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/9e5fee4591.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


    
  </head>
    <style>
    .pagination {   
        display: inline-block;   
    }   
    .pagination a {   
        font-weight:bold;   
        font-size:18px;   
        color: black;   
        float: left;   
        padding: 8px 16px;   
        text-decoration: none;   
        border:1px solid black;   
    }   
    .pagination a.active {   
            background-color: #4BB1DF;   
    }   
    .pagination a:hover:not(.active) {   
        /* background-color: ;    */
    }   
      *{
    font-family: 'Montserrat';
 }
table {
  border-collapse: collapse;
 
}

td, th {
  border:  1px solid rgba(0,0,0,.1);
  text-align: center;
}
.dropbtn {
  background-color: #A5D8EF;
  border: 0.5px solid #001428 !important;
  color: white;
  padding: 8px;
  font-size: 14px !important;
  border: none;
  border-radius: 1rem;
  cursor: pointer;
}

.dropdown {
  position: relative;
  display: inline-block;
  font-size: 11px !important;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f3f3f3;
  min-width: 105px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
  
}

.dropdown-content a {
  color: black;
  font-size: 12px !important;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #A5D8EF;}

.dropdown:hover .dropdown-content {
  display: block;
}

.dropdown:hover .dropbtn {
  background-color: #4BB1DF;
}
a{
  text-decoration: none !important;
  color: #4bb1df;
}

 
.button{
    padding: 0.7rem 1.5rem;
    border: 0px solid #001428;
    background-color: #4bb1df !important;
    color: #fff !important;
    border-radius: 5px;
    cursor: pointer;
    float: left !important;
    margin-right: 5px !important;
}
::-webkit-scrollbar {
    width: 7px;
  }

  /* Track */
  ::-webkit-scrollbar-track {
    background: white; 
  }
   
  /* Handle */
  ::-webkit-scrollbar-thumb {
    background: #888; 
  }
  .button{
    padding: 0.7rem 1.5rem;
    border: 0px solid #001428;
    background-color: #4bb1df !important;
    color: #fff !important;
    border-radius: 5px;
    cursor: pointer;
    float: left !important;
    margin-right: 5px !important;
    font-size: 15px !important;
}

.loader {
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #4bb1df;
  width: 120px;
  height: 120px;
  margin: 250px 450px;
  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 2s linear infinite;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

</style>
<body style="overflow-x:hidden;">
<script>
  $(document).ready(function()
  {
    setInterval(function(){
      $("#autodata").load("ordermanagement.php");
      refresh();
    }, 5000);
  });
</script>
<script>
        $(window).on("load",function(){
          setInterval(() => {
            $(".loader").fadeOut("slower");
          }, 4800);
        });
  </script>
        <div class="row"style="">
          <div class=" " style="width:300px;height:100%; border-right: 1px solid rgba(0,0,0,.1); height:auto;">
                <?php
                   include('common3.php');
                   $logid=$_SESSION["log_id"];
                //    $sname=$_SESSION["S_name"];
                 
                ?>
            </div>

            <!-- <div style="margin: auto;" class="upl1 col-md-11"> -->
              
              <div class="space1 col-md-9" style="margin-top:10px;" id="autodata">
              <div class="loader"></div>
              </div>   
          </div>  

  <script language="javascript">
    var popupWindow = null;
    function centeredPopup(url,winName,w,h,scroll){
      LeftPosition = (screen.width) ? (screen.width-w)/2 : 0;
      TopPosition = (screen.height) ? (screen.height-h)/2 : 0;
      settings ='height='+h+',width='+w+',top='+TopPosition+',left='+LeftPosition+',scrollbars='+scroll+',resizable'popupWindow = window.open(url,winName,settings)
    }
  </script>

                </div>
                </div>
                 
            <!-- </div> -->
        <!-- </div> -->
  <?php
   if (isset($_GET["page"])) {    
    $page  = $_GET["page"];    
    $_SESSION["page"] = $page;
  }
if(isset($_GET["stat"])){
  $status=$_GET["stat"];
  $_SESSION["status"] = $status;

}
if(isset($_GET["dis"]))
{
      $Dispatched=$_GET["dis"];
        // print "id=".$protyid ;
        // echo $sproid;
        $query = "UPDATE `orders` SET `order_status`='Dispatch' WHERE `order_id` = $Dispatched";
        $run = mysqli_query($conn, $query);
        if($run){
          echo '<script>swal("Product Dispatched")
          .then((value) => {
            swal(location.replace("http://localhost/kwykpr/ordermanage.php"));
          });
            </script>';
        }
         else{
             echo "Error";
        }
}
if(isset($_GET["del"]))
{
      $Delivered=$_GET["del"];
        // print "id=".$protyid ;
        // echo $sproid;
        $query = "UPDATE `orders` SET `order_status`='Delivered' WHERE `order_id` = $Delivered";
        $run = mysqli_query($conn, $query);
        if($run){
          echo '<script>swal("Order Delivered")
          .then((value) => {
            swal(location.replace("http://localhost/kwykpr/ordermanage.php"));
          });
            </script>';    
        }
         else{
             echo "Error";
        }
}
if(isset($_GET["accept"]))
{
      $accept=$_GET["accept"];
        // print "id=".$protyid ;
        // echo $sproid;
        $query = "UPDATE `orders` SET `order_status`='Accept' WHERE `order_id` = $accept";
        $run = mysqli_query($conn, $query);
        if($run){
          echo '<script>swal("Order Accepted")
          .then((value) => {
            swal(location.replace("http://localhost/kwykpr/ordermanage.php"));
          });
            </script>';    
        }
         else{
             echo "Error";
        }
}
if(isset($_GET["reject"]))
{
      $reject=$_GET["reject"];
        // print "id=".$protyid ;
        // echo $sproid;
        $query = "UPDATE `orders` SET `order_status`='Rejected' WHERE `order_id` = $reject";
        $run = mysqli_query($conn, $query);
        if($run){
          echo '<script> swal("Order Rejected")
          .then((value) => {
            swal(location.replace("http://localhost/kwykpr/ordermanage.php"));
          });
            </script>';    
        }
         else{
             echo "Error";
        }
}
  ?>

</body>
</html>