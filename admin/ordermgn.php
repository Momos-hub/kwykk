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
    <title>KWYK | Order Management</title>
    <link rel="stylesheet" href="/kwykpr/ordermanage.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script> 
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

  ::-webkit-scrollbar-track {
    background: white; 
  }
   
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

  .open-button { 
    border: none;
    cursor: pointer;
    opacity: 0.8;
    /* position: fixed; */
    border:1px solid black; 
    border-radius:8px;
    right: 28px;
    /* width: 280px; */
  }

  /* The popup form - hidden by default */
  .form-popup {
    display: none;
    position: fixed;
    /* bottom: 0; */
    right: 15px; 
    z-index: 9;
    height:60%;
  }

  /* Add styles to the form container */
  .form-container {
    max-width: 300px;
    padding: 10px;
    background-color: white;
  }

  /* Full-width input fields */
  .form-container {
    width: 100%;
    padding: 15px;
    /* margin: 5px 0 22px 0; */
    border: none;
    height:100%;
    background: #f1f1f1;
  }  

  /* When the inputs get focus, do something */
  .form-container:focus {
    background-color: #ddd;
    outline: none;
  }

  /* Set a style for the submit/login button */
  .form-container .btn {
    background-color: #04AA6D;
    color: white;
    padding: 16px 20px;
    border: none;
    cursor: pointer;
    width: 100%;
    margin-bottom:10px;
    opacity: 0.8;
  }
  
  /* Add a red background color to the cancel button */
  .form-container .cancel {
    background-color: red;
  }

  /* Add some hover effects to buttons */
  .form-container .btn:hover, .open-button:hover {
    opacity: 1;
  }
</style>
<body style="overflow-x:hidden;">
  <div class="row"style="">
    <div class=" " style="width:300px;height:100%; border-right: 1px solid rgba(0,0,0,.1); height:auto;">
      <?php
        include('admin_side.php');
        $logid=$_SESSION["log_id"];
        //    $sname=$_SESSION["S_name"];
      ?>
    </div>
    <div class="space1 col-md-9" style="margin-top:10px;" id="autodata">
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
        </select>
      </label>
      
      <a class="open-button" onclick="openForm()" style="margin-left:75%;"><i class="fa-solid fa-filter"></i></a>
      <div class="form-popup" id="myForm">
        <i class="fa-solid fa-xmark"onclick="closeForm()" style="float: right;margin: 15px;font-size: 17px;cursor: pointer;"></i>
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" class="form-container">
          <div style="font-size:14px;margin:5px;">
            <label>Select City</label>
            <select class="form-select" name="shopname" aria-label="Default select example" style="font-size:14px;">
              <option value="" disabled selected hidden>Select Merchant</option>
              <?php
                $category = "SELECT * FROM shop";
                $query = mysqli_query($conn, $category);
                $record_count = mysqli_num_rows($query);
                
                for($i=1;$i<=$record_count;$i++){
                  $row = mysqli_fetch_assoc($query)
              ?>
              <option value="<?php echo $row['shop_id'] ?>"><?php echo $row["Sname"] ?></option>
              <!-- <option value="1">Pune</option> -->
              <?php
                }
              ?>
            </select>
          </div>
          <div style="font-size:14px;margin:5px;">
            <label>Filter from date</label><br>
              <!-- <form class="form-inline" method="POST" action=""> -->
              <label>Date:</label>
                <input style="font-size:14px;" type="date" class="form-control" placeholder="Start"  name="date1" value="<?php echo isset($_POST['date1']) ? $_POST['date1'] : '' ?>" />
              <label>To</label>
			          <input style="font-size:14px;" type="date" class="form-control" placeholder="End"  name="date2" value="<?php echo isset($_POST['date2']) ? $_POST['date2'] : '' ?>"/>
			          <!-- <button name="search">search </button>  -->
          </div>
          <div style="margin:13px;">
            <button type="submit" name="search" class="button">Apply</button>
            <button type="button" class="button"  onclick="clearForm()">Clear All</button>
          </div>
        </form>
      </div>
      
      <script>
        function openForm() {
          document.getElementById("myForm").style.display = "block";
        }
        
        function closeForm() {
          document.getElementById("myForm").style.display = "none";
         }
        function clearForm() {
           location.replace("http://localhost/kwykpr/admin/ordermgn.php") 
        }
      </script>
      
      <table style="margin-bottom:40px;" class="table-hover">
        <thead>
          <tr>
            <th scope="col"> Order ID </th>
            <th scope="col"> Order Status </th>
            <th scope="col"> Store Name </th>
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
          <tbody>
            <tr class="class">
              <?php 
                $per_page_record = 9;  // Number of entries to show in a page.   
                 if (isset($_SESSION["page"])){    
                   $page= $_SESSION["page"];  
                }    
                else {    
                  $page=1;    
                }    
                
                $start_from = ($page-1) * $per_page_record;      
      
                $status = $_SESSION["status"];
                if($status == "All"){
                  unset($_SESSION['status']);
                  unset($_SESSION["page"]); 
                }
                if(!empty($status)){
                  //   $status=$_GET["stat"];
                  $query_order = "SELECT * FROM `orders` WHERE order_status ='$status' ORDER BY order_id DESC LIMIT $start_from, $per_page_record";
                
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
                else if(isset($_POST['search'])){
                  $date1 = date("Y-m-d", strtotime($_POST['date1']));
                  $date2 = date("Y-m-d", strtotime($_POST['date2']));
                  $name= $_POST['shopname'];
                  $query_order ="SELECT * FROM `orders` WHERE date(`order_date`) BETWEEN '$date1' AND '$date2' AND `shop_id`= '$name'";
                }
                else{
                  $query_order = "SELECT * FROM `orders` ORDER BY order_id DESC LIMIT $start_from, $per_page_record";
                }
              
                $result_order =  mysqli_query($conn, $query_order);
                while($row_order = mysqli_fetch_assoc($result_order)){
                  $cust_log_id=$row_order['log_id'];
                  $status=$row_order['order_status'];
                  $time=$row_order['order_date']; 
                  $orderid=$row_order['order_id'];
                  $shopid=$row_order['shop_id'];
                  // echo $status; 
                ?>
                <script>
                  function get_o_status($status){
                    location.replace("?stat="+$status);
                  }
                </script>   
                
                <td>
                  <a style="font-weight:bold;color: #4bb1df !important;" href="http://localhost/kwykpr/order.php?id=<?= $row_order['order_id'];?>"onclick="centeredPopup(this.href,'myWindow','800','500','yes');return false" data-toggle="tooltip" data-placement="top" title="Order Details">
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
                  <div class="dropdown">
                    <a class="dropbtn"><?php echo $status;?><i style="font-size:11px !important;" class="fa-solid fa-chevron-down"></i></a>
                    <div class="dropdown-content">
                      <a href="?dis=<?=$row_order['order_id'];?>">Dispatch</a>
				            </div>
			            </div>
			
			          <?php
                  }
                  if($status === 'Dispatch'){
                ?>
                  <div class="dropdown">
                    <a class="dropbtn"><?php echo $status;?><i style="font-size:11px !important;" class="fa-solid fa-chevron-down"></i></a>
                    <div class="dropdown-content">
                      <a href="?del=<?=$row_order['order_id'];?>">Delivered</a>
                    </div>
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
                
                <td>
                  <?php
                    $shop="SELECT * FROM shop WHERE shop_id = $shopid";
                    $shopname =  mysqli_query($conn, $shop);
                    while($row = mysqli_fetch_assoc($shopname)){
                      $shop_name=$row['Sname'];
                      echo $shop_name;
                    }
                  ?>
                </td>        

                <td>
                  <?php
                     $query_custdeatils = "SELECT * FROM `signup` WHERE log_id = $cust_log_id";
                     $result_custdetails = $conn->query($query_custdeatils);
                      if ($result_custdetails->num_rows > 0){
                        // OUTPUT DATA OF EACH ROW
                        while($row_custdetails = $result_custdetails->fetch_assoc()){
                  ?>
                
                  <?php echo $row_custdetails['Name']; ?> 
                </td>
                
                <td>
                  <?php echo $row_order['delivery_status']; ?> 
                </td>
                
                <td>
                  <?php echo $row_order['order_date']; ?> 
                </td>

                <td>
                  <?php echo $row_order['due_time']; ?>
                </td>

                <td>
                  <?php
                  $qry="SELECT * FROM bill where order_id = $orderid";
                  $order =  mysqli_query($conn, $qry);
                  while($ord = mysqli_fetch_array($order)){
                    $ordid = $ord['pay_ty_id']; 
                    $bill = "SELECT * FROM  payment_type where pay_ty_id = $ordid";
                    $b = mysqli_query($conn, $bill);
                    while($bi = mysqli_fetch_array($b)){
                      echo $bi['pay_desc'];
                    }
                  }
                  ?>
                </td>
                
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
                
                <td>
                  Completed
                </td>

                <td>
                  00:30:00
                </td>
                        
                <td>
                  <?php
                    $logid=$_SESSION["log_id"];
                    $query_rating = "SELECT * FROM `shop` WHERE log_id=$logid";
                    $result_rating = $conn->query($query_rating);
                    if ($result_rating->num_rows > 0) {
                      // OUTPUT DATA OF EACH ROW
                      while($row_rating = $result_rating->fetch_assoc()){
                  ?>
                    <?php echo $row_rating['S_Rating']; ?>  
                    <?php
                      }
									  }
                    ?>
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
              $query = "SELECT COUNT(*) FROM orders";     
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
                echo "<a href=?page=".($page+1)."'>  Next </a>";   
              }   
  
            ?>    
          </div>     
        </center>
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

  <?php
    if (isset($_GET["page"])) {    
      $page  = $_GET["page"];    
      $_SESSION["page"] = $page;
    }
    
    if(isset($_GET["stat"])){
      $status=$_GET["stat"];
      $_SESSION["status"] = $status;
    }

    if(isset($_GET["dis"])){
      $Dispatched=$_GET["dis"];
      $query = "UPDATE `orders` SET `order_status`='Dispatch' WHERE `order_id` = $Dispatched";
      $run = mysqli_query($conn, $query);
      if($run){
        echo '<script>swal("Product Dispatched")
        .then((value) => {
        swal(location.replace("http://localhost/kwykpr/admin/ordermanage_admin.php"));
        });
        </script>';
      }
      else{
        echo "Error";
      }
    }
    
    if(isset($_GET["del"])){
      $Delivered=$_GET["del"]; 
      $query = "UPDATE `orders` SET `order_status`='Delivered' WHERE `order_id` = $Delivered";
      $run = mysqli_query($conn, $query);
      if($run){
        echo '<script>swal("Order Delivered")
        .then((value) => {
          swal(location.replace("http://localhost/kwykpr/admin/ordermanage_admin.php"));
        });
          </script>';    
      }
      else{
        echo "Error";
      }
    }
    
    if(isset($_GET["accept"])){
      $accept=$_GET["accept"]; 
      $query = "UPDATE `orders` SET `order_status`='Accept' WHERE `order_id` = $accept";
      $run = mysqli_query($conn, $query);
      if($run){
        echo '<script>swal("Order Accepted")
        .then((value) => {
        swal(location.replace("http://localhost/kwykpr/admin/ordermanage_admin.php"));
        });
        </script>';    
      }
      else{
        echo "Error";
      }
    }
    
    if(isset($_GET["reject"])){
      $reject=$_GET["reject"];
      $query = "UPDATE `orders` SET `order_status`='Rejected' WHERE `order_id` = $reject";
      $run = mysqli_query($conn, $query);
      if($run){
        echo '<script>swal("Order Rejected")
        .then((value) => {
        swal(location.replace("http://localhost/kwykpr/admin/ordermanage_admin.php"));
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