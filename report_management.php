<?php
// include('common.php');
session_start();
include('conn.php');
$logid=$_SESSION["log_id"];
?>
<html lang="en">
<head>
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
/* .class{
    background-color:grey;
} */
</style>
<body>
<label  style="font-size:15px;">Order Status
                <!-- <select name="orders" id="order" onchange="location = this.value;"> -->
                <select name="orders" id="order" onchange="window.location = this.options[this.selectedIndex].value">
                <!-- document.getElementById("mySelect").value -->
                  <!-- <option value="ordermanage.php">All</option> -->
                  <option onclick="get_o_status($status)" value="?stat=All">All</option>
                  <!-- <option value="confirmed">Confirmed</option>  -->
                  <option onclick="get_o_status($status)" value="?stat=Accept">Confirmed</option>
                   <!-- <option value="dispatched">Dispatched</option> -->
                  <option onclick="get_o_status($status)" value="?stat=Dispatch">Dispatch</option>
                  <!-- <option value="delivered">Delivered</option> -->
                  <option onclick="get_o_status($status)" value="?stat=Delivered">Delivered</option>
                  <!-- <option value="cancelled">Cancelled</option> -->
                  <option onclick="get_o_status($status)" value="?stat=Rejected">Rejected</option>

                  <?php                   
            
       
            //fetch the shop_id
            $shop_id = "SELECT * FROM shop WHERE log_id =$logid";
            $shopid=0;
            $search_shop = mysqli_query($conn, $shop_id);
            $record_count = mysqli_num_rows($search_shop);
        
            if($record_count){
                $record = mysqli_fetch_assoc($search_shop);
                             
                $shopid= $record['shop_id'];
                //print $shopid;
            }
    ?>                      
                </select>
                
              </label>

              
              <a style="margin-left:8px;border:1px solid black; border-radius:8px;" href="ordermanage.php">
                <i class="fa-solid fa-rotate-right"></i>
              </a>
	
              <table style="margin-bottom:40px;">
              <thead>
                  <tbody>
                  <tr>
                    <th scope="col"> Order ID </th>
                    <th scope="col"> Order Status </th>
                    <th scope="col"> Customer </th>
                    <th scope="col"> Delivery Mode </th>
                    <th scope="col"> Order Time </th>
                    <th scope="col"> Scheduled Time </th>
                    <th scope="col"> Payment Method </th>
                    <th scope="col"> Address </th>
                    <th scope="col"> Amount </th>
                    <th scope="col"> Payment Status </th>
                    <th scope="col"> Order Prepration Time(In Minutes) </th>
                    <th scope="col"> Rating </th>
                   </tr>
                </thead>
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
     
                $status = $_SESSION["status"];
                  if($status == "All"){
                    unset($_SESSION['status']);
                    unset($_SESSION["page"]); 
                  }
                if(!empty($status)){
                    //   $status=$_GET["stat"];
                    $query_order = "SELECT * FROM `orders` wHERE shop_id= $shopid AND order_status ='$status' ORDER BY order_id DESC LIMIT $start_from, $per_page_record";
                  
                    
                  if($status=="Accept"){
                  ?>
                <script>
                  var order_statId = document.getElementById("order");
                  
                  order_statId.options[1].selected = true;
                </script>
                <?php 
                  } 
                  else if($status=="Dispatch"){
                    ?>
                <script>
                  var order_statId = document.getElementById("order");
                  
                  order_statId.options[2].selected = true;
                </script>
                <?php 
                  }
                  else if($status=="Delivered"){
                    ?>
                <script>
                  var order_statId = document.getElementById("order");
                  
                  order_statId.options[3].selected = true;
                </script>
                <?php 
                  }
                  else if($status=="Rejected"){
                    ?>
                <script>
                  var order_statId = document.getElementById("order");
                  
                  order_statId.options[4].selected = true;
                </script>
                <?php 
                  }
                }  
                
                else{
                   
                  $query_order = "SELECT * FROM `orders` wHERE shop_id= $shopid ORDER BY order_id DESC LIMIT $start_from, $per_page_record";
                }

                // $query1 = "SELECT * FROM `shop` WHERE shop_id='1001'";
                
                  
                // FETCHING DATA FROM DATABASE
                $result_order =  mysqli_query($conn, $query_order);
                // $record_count = mysqli_num_rows($result_order);
                
                  // if ($record_count) 
                  // {
                  //   for($i=1;$i<=$record_count;$i++)
                  //   {
                      while($row_order = mysqli_fetch_assoc($result_order)){
                        
                        
                        // OUTPUT DATA OF EACH ROW
                        
                        $cust_log_id=$row_order['log_id'];
                        $status=$row_order['order_status'];
                        $time=$row_order['order_date'];
                        // echo $status; 
                ?>
                <script>
                    function get_o_status($status){
                        location.replace("?stat="+$status);
                    }
                </script>   
                <td>
                  <a href="http://localhost/kwykpr/order.php?id=<?= $row_order['order_id'];?>"onclick="centeredPopup(this.href,'myWindow','800','500','yes');return false">
                  <!-- <a data-toggle="modal" data-target="#myModal"> -->
                    <?php echo $row_order['order_id']; ?> 
                      </a>
                </td>
                <?php
                if($status===''){
                  ?>
                  <td style="width:700px;">
                  <div style="display:flex justify-content: center;">
                    <a href="?accept=<?= $row_order['order_id'];?>">
                      <i style="font-size:18px;color:green !important;" class="fa-solid fa-check"></i>
                    </a>
                    <a href="?reject=<?= $row_order['order_id'];?>">
                      <i style="font-size:18px; color:red !important;" class="fa-solid fa-xmark"></i>
                    </a>
                  </div>
                  </td>
                 <?php
                }
                else{
                 ?>
                  <td style=" width:700px;">
                  <?php
                   if($status==='Accept'){
                  ?>
                  <!-- <div class="dropdown">
                  <a class="dropbtn"><?php echo $status;?><i style="font-size:11px !important;" class="fa-solid fa-chevron-down"></i></a>
                  <div class="dropdown-content">
                  <a href="?dis=<?=$row_order['order_id'];?>">Dispatch</a>
				</div>
			</div> -->
            <div class="dropdown">
                  <a  style=" background-color: white;color: #4BB1DF !important;"><?php echo $status;?></a>
                  <div class="dropdown-content"></div>
				</div>    
			
			<?php
                }
                if($status === 'Dispatch'){
                  ?>
                  <!-- <div class="dropdown">
                  <a class="dropbtn"><?php echo $status;?><i style="font-size:11px !important;" class="fa-solid fa-chevron-down"></i></a>
                  <div class="dropdown-content">
                    <a href="?del=<?=$row_order['order_id'];?>">Delivered</a>
                    </div>
				          </div> -->

                <div class="dropdown">
                  <a  style=" background-color: white;color: orange !important;"><?php echo $status;?></a>
                  <div class="dropdown-content"></div>
				</div>
                <?php  
                }if($status === 'Delivered') {
                ?>
                <div class="dropdown">
                  <a  style=" background-color: white;color: green !important;"><?php echo $status;?></a>
                  <div class="dropdown-content"></div>
					      </div>
              <?php 
              }
              if($status === 'Rejected'){
				      ?>
                <div class="dropdown">
                  <a  style=" background-color: white;color: red !important;"><?php echo $status;?></a>
                  <div class="dropdown-content"></div>
					      </div>
              <?php
              } 
              ?>

              </td>
                <?php
                }
                ?>
                        
                <td><?php
                //print $cust_log_id;
                $query_custdeatils = "SELECT * FROM `signup` WHERE log_id = $cust_log_id";
                // $query1 = "SELECT * FROM `shop` WHERE shop_id='1001'";
                // FETCHING DATA FROM DATABASE
                $result_custdetails = $conn->query($query_custdeatils);
                
                  if ($result_custdetails->num_rows > 0) 
                  {
                      // OUTPUT DATA OF EACH ROW
                      while($row_custdetails = $result_custdetails->fetch_assoc())
                      {
                        
                ?>
                <?php echo $row_custdetails['Name']; ?> 
                      <?php?>
                </td>
                
                <td>
                <?php echo $row_order['delivery_status']; ?> 
                </td>
                
                <td>
					<?php echo $row_order['order_date']; ?> 
                <?php?>
                </td>
                <td><?php echo $row_order['due_time']; ?> </td>
                <td></td>
                
                <td>
					<?php echo $row_custdetails['address']; ?> 
                <?php
                      }
                    }
                    ?>
                </td>
                 
                <td>
            <?php echo$row_order['total_amount']; ?> 
                </td>
                
                <td></td>
                <td>00:30:00</td>
                        
                <td><?php

                   //query for shop rating
                   

                      $logid=$_SESSION["log_id"];
                      $query_rating = "SELECT * FROM `shop` WHERE log_id=$logid";
                    // $query1 = "SELECT * FROM `shop` WHERE shop_id='1001'";


                      // FETCHING DATA FROM DATABASE for rating
                      $result_rating = $conn->query($query_rating);

                       if ($result_rating->num_rows > 0) 
                         {
                         // OUTPUT DATA OF EACH ROW
                         while($row_rating = $result_rating->fetch_assoc())
                          {
      
                             ?>
                           <?php echo $row_rating['S_Rating']; ?> </h4>
                                 <?php
                                      }
									}
                                    
                                    ?>
                  </td>
                  </tr>
                  <?php
                      }
                      
                      // }}
                      
                      ?>
                  </tbody>
                  </table>
                  <center>
                  <div class="pagination">    
      <?php  
        $query = "SELECT COUNT(*) FROM orders WHERE shop_id=$shopid";     
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
          else  {   
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
 
 <script language="javascript">
 var popupWindow = null;
 function centeredPopup(url,winName,w,h,scroll){
 LeftPosition = (screen.width) ? (screen.width-w)/2 : 0;
 TopPosition = (screen.height) ? (screen.height-h)/2 : 0;
 settings =
 'height='+h+',width='+w+',top='+TopPosition+',left='+LeftPosition+',scrollbars='+scroll+',resizable'
 popupWindow = window.open(url,winName,settings)
 }
 </script>
  
   <?php
 
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
           echo '<script>swal("Order Rejected")
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