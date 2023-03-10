<?php
// session_start();
include('admin_nav.php');
include('conn.php');
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KWYK | Customers</title>
    <link rel="stylesheet" href="/kwykpr/ordermanage.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <!-- <link rel="stylesheet" href="orderdetail.css"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/9e5fee4591.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


    
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
    float: right !important;
    margin-right: 5px !important;
    font-size: 15px !important;
}

.dropdown-submenu {
  position: relative;
}

.dropdown-submenu .dropdown-menu {
  top: 0;
  left: 100%;
  margin-top: -1px;
}

</style>
<body style="overflow-x:hidden;">
        <div class="row"style="">
        <div class=" " style="width:300px;border-right: 1px solid rgba(0,0,0,.1);height: calc(100vh - 90px);">
                <?php
                   include('admin_side.php');
                   $logid=$_SESSION["log_id"];
                ?>
            </div>  
            <div class="space1 col-md-9" style="margin-top:10px;" id="autodata">
            <div class="form-group col-md-12">
                <form method="post">
                    <input class="button" style="align:right; !important" type="submit" name="Add" value="Add Store">
                </div>
         
</form>
          <?php 
                    if(isset($_POST['Add'])){
                        echo '<script>location.replace("http://localhost/kwykpr/admin/admin_setstore.php");</script>';
                    } 
                    ?>
            <table style="margin-bottom:40px;" class="table-hover">
              <thead>
                <tr>
                  <th scope="col"> Store ID </th>
                  <th scope="col"> Store Name </th>
                  <th scope="col"> Address </th>
                  <th scope="col"> Phone </th>
                  <th scope="col"> Email </th>
                  <!-- <th scope="col"> Servicable </th> -->
                  <th scope="col"> City</th>
                  <th scope="col"> Status</th>
                  <th scope="col"> Action</th>
                </tr>
              </thead>
              <tbody>
              <tr class="class">
                    <?php 
                        $per_page_record = 9;  // Number of entries to show in a page.   
                        // Look for a GET variable page if not found default is 1.        
                        if (isset($_SESSION["page"])){    
                            // $page  = $_GET["page"]; 
                            $page= $_SESSION["page"];  
                            
                        }    
                        else {    
                          $page=1;    
                        }    
                    
                        $start_from = ($page-1) * $per_page_record;      
                // $logid=$_SESSION["log_id"];
     
                
                $query_order = "SELECT * FROM `shop` ORDER BY `shop_id` DESC LIMIT $start_from, $per_page_record";
                
 
                $result_order =  mysqli_query($conn, $query_order);
                
                      while($row_order = mysqli_fetch_assoc($result_order)){
                        $cust_log_id=$row_order['log_id'];
                        // echo $status; 
                ?>
                  <td><?php echo $row_order['shop_id'];?></td>
                  <td><?php echo $row_order['Sname'];?></td>
                  <td><?php echo $row_order['Shopaddr'];?></td>
                  <td><?php echo $row_order['S_Contact'];?></td>
                  <td><?php echo $row_order['semail'];?></td>
                  <td><?php echo $row_order['S_City'];?></td>
                  <td>On/Off</td>
                  <!-- <td>
                     <div class="dropdown">
                         <i class="fa-solid fa-ellipsis"></i>
                         <div class="dropdown-content">
                             <a href="http://localhost/kwykpr/admin/admin_setstore.php?reject=<?= $row_order['shop_id'];?>">Edit</a>
                             <a href="?reject=<?= $row_order['shop_id'];?>">Delete</a>
                         </div>
                     </div>
                   </td> -->
                  <!-- <td><i class="fa-solid fa-ellipsis"></i></td> -->
                 <td>
                 <!-- <div class="container"> -->
                 <div class="dropdown">
                  <button class="button dropdown-toggle" type="button" data-toggle="dropdown"></button>
                  <ul class="dropdown-menu">
                    <li><a tabindex="-1" href="#">Block</a></li>
                    <li><a tabindex="-1" href="#">Delete</a></li>
                    <li class="dropdown-submenu">
                      <a class="test" tabindex="-1" href="#">Edit<span class="caret"></span></a>
                      <ul class="dropdown-menu">
                        <li><a tabindex="-1" href="#">Store details</a></li>
                        <li><a tabindex="-1" href="#">Documents</a></li>
                        <li><a tabindex="-1" href="#">Bank Details</a></li>
                        <li><a tabindex="-1" href="#">Contact Details</a></li>
                      </ul>
                    </li>
                  </ul>
                </div>
              <!-- </div> -->
              <script>
                $(document).ready(function(){
                  $('.dropdown-submenu a.test').on("click", function(e){
                    $(this).next('ul').toggle();
                    e.stopPropagation();
                    e.preventDefault();
                  });
                });
</script>
                      </td>
                </tr>
                <?php
                    }
                ?>
                </tbody>
                </table>
                <center>
                <div class="pagination">
                    <?php  
                    $query = "SELECT COUNT(*) FROM signup";     
                    $rs_result = mysqli_query($conn, $query);     
                    $row = mysqli_fetch_row($rs_result);     
                    $total_records = $row[0];     

                    echo "</br>";     
                    // Number of pages required.   
                    $total_pages = ceil($total_records / $per_page_record);     
                    $pagLink = "";       

                    if($page>=2){
                        echo "<a href='?page=".($page-1)."'>  Prev </a>";   
                    }       
                   
                    for ($i=1; $i<=$total_pages; $i++) {  
                        if ($i == $page) {
                            $pagLink .= "<a class = 'active' href='?page=".$i."'>".$i." </a>";   
                        }
                        else{
                            $pagLink .= "<a href='?page=".$i."'>".$i." </a>";     
                        }   
                    };     
                    echo $pagLink;   

                    if($page<$total_pages){
                        echo "<a href='?page=".($page+1)."'>  Next </a>";   
                    }   
                
                    ?>    
                </div>     
                </center>
  
            </div> 
            
        </div>
        <?php

        if(isset($_GET["reject"]))
          {
                $reject=$_GET["reject"];
                  // print "id=".$protyid ;
                  // echo $sproid;
                  $query = "DELETE FROM shop WHERE `shop`.`shop_id` = $reject";
                  $run = mysqli_query($conn, $query);
                  if($run){
                    echo '<script>swal("Shop Deleted!")
                    .then((value) => {
                      swal(location.replace("http://localhost/kwykpr/admin/stores.php"));
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