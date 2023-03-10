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
  <link rel="stylesheet" href="customer_admin.css">
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
  .form-select{
    font-size:14px;
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
            <div class="space1 col-md-9" style="margin-top:10px;">
            <div class="topnav">
                <a><button type="submit" class="button">Add Money to Wallet</button></a>
                <a><button type="submit" class="button">Deduct Money from Wallet</button></a>
                <a onclick="openForm()" style="float: right;padding-left: 0;">
                  <button class="filter">
                    <i style="color:#4bb1df !important;" class="fa-solid fa-filter"></i>
                  </button>
                </a>
                <div class="search-container" style="margin-top:2px;">
                    <form action="customer_admin.php" method="post">
                        <input type="text" placeholder="Search" name="search">
                        <button type="submit" name="find" style="margin-top:14px;"><i class="fa fa-search"></i></button>
                    </form>
                </div>
            </div>
            
            <div class="form-popup" id="myForm">
                <form action="/action_page.php" class="form-container">
                <div style="font-size:14px;margin:5px;">
                  <label>Select City</label>
                  <select class="form-select" aria-label="Default select example">
                    <option value="" disabled selected hidden>Select City</option>
                    <option value="1">Pune</option>
                    <option value="2">Mumbai</option>
                  </select>
                </div>
                <div style="font-size:14px;margin:5px;">
                  <label>Last Used Platform</label>
                  <select class="form-select" aria-label="Default select example">
                    <option value="" disabled selected hidden>Last Used Platform</option>
                    <option value="1">Android</option>
                    <option value="2">IOS</option>
                  </select>
                </div>
                <div style="margin:13px;">
                  <button type="submit" class="button">Apply</button>
                  <button type="button" class="button" onclick="closeForm()">Cancel</button>
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
            </script>
            <table style="margin-bottom:40px;" class="table-hover">
              <thead>
                <tr>
                  <th scope="col"> ID </th>
                  <th scope="col"> Name </th>
                  <th scope="col"> Email </th>
                  <th scope="col"> Phone </th>
                  <th scope="col"> Last Used Platform </th>
                  <th scope="col"> Kwyk Wallet </th>
                  <th scope="col"> Actions</th>
                </tr>
              </thead>
              <tbody>
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
     
                
                 
                 
                      if(isset($_POST['find'])) {
                      $searchString = mysqli_real_escape_string($conn, ($_POST['search']));
                      if ($searchString === "" || $searchString < 3) {
                        // echo "Invalid search string";
                      ?>
                          <script>
                             swal({
                                icon:"warning",
                                title:"Invalid"})
                            .then((value) => {
                                swal(location.replace("http://localhost/kwykpr/admin/customer_admin.php"));
                            });
                          </script>;
                      <?php    // exit();
                      }
                      $searchString = "%$searchString%";
                      $sql = "SELECT * FROM signup WHERE log_typeID = 103 AND Email LIKE ?";
               
                      $prepared_stmt = $conn->prepare($sql);
                      $prepared_stmt->bind_param('s', $searchString);
                      $prepared_stmt->execute();
                      $result = $prepared_stmt->get_result();
              
                      if ($result->num_rows === 0) {
                        ?>
                        <script>
                           swal({
                                icon:"warning",
                                title:"Not Record Found"})
                            .then((value) => {
                                swal(location.replace("http://localhost/kwykpr/admin/customer_admin.php"));
                            });
                        </script>
                        <?php
                          exit();
              
                      } else {
                          // Process the result(s)
                          while ($row_order = $result->fetch_assoc()) {
                              
?>
                <tr class="class">
                  <td><?php echo $row_order['log_id'];?></td>
                  <td><?php echo $row_order['Name'];?></td>
                  <td><?php echo $row_order['Email'];?></td>
                  <td><?php echo $row_order['Mobile'];?></td>
                  <td></td>
                  <td>₹0.00</td>
                  <td>
                    <div class="dropdown">
                        <i class="fa-solid fa-ellipsis"></i>
                        <div class="dropdown-content">
                            <a href="#">KWYK Wallet</a>
                            <a href="#">Gift Card</a>
                        </div>
                    </div>
                  </td>
                 
                </tr>
                    <?php
                  }}}
                  else{
                    $query_order = "SELECT * FROM `signup`WHERE `log_typeID` =103 ORDER BY `log_id` DESC LIMIT $start_from, $per_page_record";
                    $result_order =  mysqli_query($conn, $query_order);
                 
                       while($row_order = mysqli_fetch_assoc($result_order)){
                         $cust_log_id=$row_order['log_id'];
                         // echo $status; 
                 ?>
               <tr class="class">
                   <td><?php echo $row_order['log_id'];?></td>
                   <td><?php echo $row_order['Name'];?></td>
                   <td><?php echo $row_order['Email'];?></td>
                   <td><?php echo $row_order['Mobile'];?></td>
                   <td></td>
                   <td>₹0.00</td>
                   <td>
                     <div class="dropdown">
                         <i class="fa-solid fa-ellipsis"></i>
                         <div class="dropdown-content">
                             <a href="#">KWYK Wallet</a>
                             <a href="#">Gift Card</a>
                         </div>
                     </div>
                   </td>
                  
                 </tr>
                 <?php } }
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
</body>
</html>