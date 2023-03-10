<?php
 include('common.php');
 include('conn.php');
 //include('common2.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<style>
* {
  box-sizing: border-box;
}

.row {
  display: flex;
}

/* Create two equal columns that sits next to each other */
.column {
  flex: 50%;
  padding: 10px;
  
}
</style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KWYK | Add Menu</title>
    <link rel="stylesheet" href="addproduct.css">
</head>
<body>
    <div class="row">   
      <div class="index bg-dark col-md-3">
                <?php
                   include('merchantOmenu.php');
                   $logid=$_SESSION["log_id"];
                ?>
            </div>
        <div class="space1 col-md-9">
                <div class="addprod">
                <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
                <div style="margin: 20px;" class="box panel">
    <?php     

            $shop_id = "SELECT * FROM shop WHERE log_id =$logid";

            $search_shop = mysqli_query($conn, $shop_id);
            $record_count = mysqli_num_rows($search_shop);
        
            if($record_count){
                $record = mysqli_fetch_assoc($search_shop);
                             
                $shopid= $record['shop_id'];
                $sname=$record['Sname'];
                $bizcategoryid=$record['category_id'];

                $pro_type= "SELECT * FROM shopproduct WHERE shop_id =$shopid"; 
                $search_prodtype = mysqli_query($conn, $pro_type);

                $record_count2 = mysqli_num_rows($search_prodtype);
                
                $type_desc_List1 = array();
                if($record_count2){
    ?>
                   
                             <h4 class="menu">Menu List of  <?php echo $sname;?></h4><br>
                             <table style="width:70%" style= "border-collapse: collapse" align="center">
                                 <tr>
                                 <th>Sr. No.</th>
                                 <th>Category</th>
                                 <th>Category Status</th>
                                 
                                 </tr>   
                               
    <?php 
                    //    $type_desc_List1 = array(); 
                       $j=0;                
                       for($i=1;$i<=$record_count2;$i++){
                        $recordprodtype = mysqli_fetch_assoc($search_prodtype);
                        $prodtyid= $recordprodtype['pro_ty_id'];

                        $pro_type_desc= "SELECT * FROM product_type WHERE pro_ty_id= $prodtyid"; 
                        $desc_prodtype = mysqli_query($conn, $pro_type_desc);

                        $record_count_desc = mysqli_num_rows($desc_prodtype);
                
                        if($record_count_desc){
                               
                            $recordprodtype_desc = mysqli_fetch_assoc($desc_prodtype);
                            $type_desc_List1[$j]=$recordprodtype_desc["ptype_desc"];
                            $j=$j+1;
    ?>                      
                            <tr >
                            <td><?php echo $i ?></td>
                            <td><?php echo $recordprodtype_desc["ptype_desc"] ?></td>
                            <td><input type="radio" id="" name="deletemenu" value=<?php echo $recordprodtype_desc["pro_ty_id"]; ?>>
                                <label for="">Delete</label>
                            </tr>      
        <?php
                  } 
                }
             }  
             else{
                ?>
                 <h4 class=menu>Category List of  <?php echo $sname;?> Not Available</h4><br>
<?php
             }
            }
                             
        ?> 
                         </table>   
                    </div>
                    <table>
                        <tr> 
                            <td> 
                    

                        <!-- <h4 class="menu"><h4> -->

                        <!-- <div>
                            <input class="btn btn-primary" style="margin: 0px;" type="submit" name="SetMenu" value="Set Menu for your Store"><br>
                        </div> -->
                            <!-- </td> -->
                            <!-- <td> -->
                        <!-- <h4 >Enter New Menu<h4>  -->
                    <!-- <div class="center"> -->
                            <!-- <input type="text" name="Menu_name" id="Menu_name" value=""><br> <br> -->
                            <input class="btn btn-primary" style="margin: 20px;" type="submit" name="DeleteMenu" value="Delete Menu"><br>
                    <!-- </div> -->
                            </div>
                            </td> 
                            </tr> 
                    </table>        
                        
                    </form>
                </div>
            </div>
    <!-- </div> -->

        <?php
            //$log_id=1;
            
                
             // Check if form is submitted successfully
	          if(isset($_POST["DeleteMenu"]))
	          {
	            	// Check if any option is selected
		            $protyid=$_POST["deletemenu"];
                    print "id=".$protyid ;
		               
                            $query = "DELETE FROM shopproduct WHERE pro_ty_id=$protyid ";
                            $run = mysqli_query($conn, $query);
                           
                            
                            if($run){
                                echo '<script> alert("Delete Menu from Menu List!!!!");
                                location.replace("http://localhost/kwykpr/deletemenu.php");</script>';
                                
                            }
                            else{
                                echo "Not delete menu from Menu List!!";
                            }
                        }
        ?>
                    
</body>
</html>
