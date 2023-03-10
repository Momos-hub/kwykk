<?php
// session_start();
 include('common.php');
 include('conn.php');
 //include('common2.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KWYK | Set Category</title>
    <link rel="stylesheet" href="addproduct.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
        <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>

        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">   -->

</head>
<style>
* {
  box-sizing: border-box;
  font-family: 'Montserrat';
  /* overflow-x:hidden; */
}

.row {
  display: flex;
  background-color:white;
}

/* Create two equal columns that sits next to each other */
.column {
  flex: 50%;
  padding: 10px;
  
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

::-webkit-scrollbar {
    width: 7px;
  }

  /* Track */
  ::-webkit-scrollbar-track {
    background: white; 
  }
   
  /* Handle */
  ::-webkit-scrollbar-thumb {
    background: white; 
  }
  #success_message {
    display: none;
}

.swal-text {
  /* border: 1px solid #F0E1A1; */
  display: block;
  margin: 22px;
  text-align: center;
  color: #001428;
}
.swal-button {

  border-radius: 2px;
  background-color: #4BB1DF ;
  border: 1px solid #4BB1DF;
  /* text-shadow: 0px -1px 0px rgba(0, 0, 0, 0.3); */
}
.swal-footer{
    text-align:center;
}

strong{
    font-size:15px !important;
}
</style>
<body style="overflow:hidden;">
    <div class="row">   
      <div class=" " style="width:300px;height:100%; border-right: 1px solid rgba(0,0,0,.1); height: calc(100vh - 90px);">
                <?php
                   include('common3.php');
                   $logid=$_SESSION["log_id"];
                ?>
            </div>
        <div class="space1 col-md-9" style="overflow :scroll; overflow-x: hidden; height:700px; width:100%;">
                <div class="addprod">
                <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
                <div style="margin: 20px;" class="">
    <?php     

            $shop_id = "SELECT * FROM shop WHERE log_id =$logid";

            $search_shop = mysqli_query($conn, $shop_id);
            $record_count = mysqli_num_rows($search_shop);
        
            if($record_count){
                $record = mysqli_fetch_assoc($search_shop);
                             
                $shopid= $record['shop_id'];
                $sname=$record['Sname'];
                $bizcategoryid=$record['category_id'];

                $_SESSION["sid"] = $shopid;
                $_SESSION["sname"]=$sname;
                $pro_type= "SELECT * FROM shopproduct WHERE shop_id =$shopid"; 
                $search_prodtype = mysqli_query($conn, $pro_type);

                $record_count2 = mysqli_num_rows($search_prodtype);
                
                $type_desc_List1 = array();
                if($record_count2){
    ?>
                   
                             <h2 style="font-weight:bold" class="menu">Category List of  <?php echo $sname;?></h3><br>
                             <table style="width:70%; border-collapse: collapse" align="center">
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
                        $cat_status= $recordprodtype['cat_status'];
                        // print $cat_status;
                        $pro_type_desc= "SELECT * FROM product_type WHERE pro_ty_id= $prodtyid"; 
                        $desc_prodtype = mysqli_query($conn, $pro_type_desc);

                        $record_count_desc = mysqli_num_rows($desc_prodtype);
                        
                        if($record_count_desc){
                               
                            $recordprodtype_desc = mysqli_fetch_assoc($desc_prodtype);
                            $type_desc_List1[$j]=$recordprodtype_desc["ptype_desc"];
                            $temp=$recordprodtype_desc["pro_ty_id"];
                            
                            // print $temp;
                            $j=$j+1;
    ?>                      
                            <tr >
                            <td><?php echo $i ?></td>
                            <!-- <td><?php echo $recordprodtype_desc["ptype_desc"] ?></td> -->
                            <td>
                                <?php
                                if(isset($_GET["edit"]))
                                {
                                      $protyid=$_GET["edit"];
                                      $_SESSION['id'] = $protyid;
                                      if($temp == $protyid){   
                                ?>
                                <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
                                <input style="background-color:white;" type="text" name="ptype" value="<?php echo $recordprodtype_desc["ptype_desc"];?>">
                                <input type="submit" name="ptypesubmit" hidden>
                                </form>
                                <?php
                                }
                                else{ 
                                    ?>
                                    <!-- <?php echo $recordprodtype_desc["ptype_desc"] ?> -->
                                    <input style="background-color:white; border:none;" disabled type="text" value="<?php echo $recordprodtype_desc["ptype_desc"];?>">
                            <?php } }
                            else{
                            ?>
                                    <input style="background-color:white; border:none;" disabled type="text" value="<?php echo $recordprodtype_desc["ptype_desc"];?>">
                                    <!-- <?php echo $recordprodtype_desc["ptype_desc"] ?> -->

                            <?php
                            }
                            ?>
                            </td>
                            <td>
                    <select style="font-size:15px; border:none; width:100%;" name="cat_status" class="" id="cat_status" onchange="location = this.value;" > 
                    <!-- <option value='<?=$temp ?>'><?php echo $cat_status ?></option>; -->
                     
                    <?php   
                    
                    
                            if($cat_status==='Live')
                            {
                                // echo '<script> alert("Live category!!!!");
                                // </script>';
                    ?>                    
                             
                               <option selected disabled><strong>Live</strong> </option>
                            
                            
                            
                               <option value="http://localhost/kwykpr/setmenulist.php?dis=<?=$temp?>"> <b>Disable</b> </option>

                               <option value="http://localhost/kwykpr/setmenulist.php?edit=<?=$temp?>" id="edit"><strong>Edit</strong></option>
                               <option value="http://localhost/kwykpr/setmenulist.php?del=<?=$temp?>"><strong>Delete</strong></option>
                            
                    <?php
                            }

                            else {
                    ?>
                             <option value="http://localhost/kwykpr/setmenulist.php?liv=<?=$temp?>"> <strong>Live</strong></option>
                            
                           
                            <option selected disabled><b>Disable</b></option>

                            <option value="http://localhost/kwykpr/setmenulist.php?del=<?=$temp?>" style="font-size:15px;"><strong>Delete</strong></option>
                            
                    <?php
                            }
                    ?>  
                            <!-- <td> <div id=<?=$temp.'liv'?>> <a id='<?=$protyid.'liv'?>' href="http://localhost/kwykpr/setmenulist.php?liv=<?=$temp?>" style="color: green" ><strong>Live</strong></a></div></td>
                            
                            <td><div id=<?=$temp.'dis'?>> <a id='<?=$protyid.'dis'?>' href="http://localhost/kwykpr/setmenulist.php?dis=<?=$temp?>" style="color: orange"><b>Disable</b></a></div></td>      -->
                            
                                <!-- <div> <a id="del" href="http://localhost/kwykpr/setmenulist.php?del=<?=$temp?>" style="color: red;"  onclick="return confirm('Are you sure?');"><strong>Delete</strong></a></div> -->
                        </select>
                            </td>
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
                             

         $sid=$_SESSION["sid"];
        //Logic for deleting Category
	          if(isset($_GET["del"]))
	          {
	                $protyid=$_GET["del"];
                    // print "id=".$protyid ;
                    
                    $query = "DELETE FROM shopproduct WHERE pro_ty_id=$protyid ";
                    $run = mysqli_query($conn, $query);
                    if($run){
                        //  echo '<script> alert("Category Deleted from CategoryList!!");
                        //  location.replace("http://localhost/kwykpr/setmenulist.php") </script>';
                        ?>
                        '<script>
                        
                        swal({
                            icon:"success",
                            title:"Category Deleteded Successfully!"})
                        .then((value) => {
                            swal(location.replace("http://localhost/kwykpr/setmenulist.php"));
                        });
                            </script>'
                    <?php    
                       }
                        else{
                            ?>
                            <script>swal({
                                icon: "danger",
                                title: "No one Category Deleted",
                                });
                                </script>
                        <?php
                       }
              }         
        // Logic for editing Category
              //Logic for deleting Category
	        //   if(isset($_GET["edit"]))
	        //   {
	                // $protyid=$_GET["edit"];
                    // $_SESSION['id'] = $protyid;
                    //          $query1="SELECT *FROM product_type WHERE pro_ty_id=$protyid";
                    //              $result = $conn->query($query1);
                    //              if ($result->num_rows > 0) {
                    //                  // OUTPUT DATA OF EACH ROW
                    //                  while($row = $result->fetch_assoc()){
                    //                     ?>
                    <!-- //      <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">              
                    //     <div class="box productname">
                    //     <label for="">Category</label>
                    //         <input style="width: 70px;" type="text" class="form-control" name="productname" value= <?php echo $row['ptype_desc'];?> required="required">
                    //     </div>     
                    //     <section >
                    //     <input type=submit class="btn btn-primary me-auto" name="updat" value="Update">
                    //     </section>
                    //     </form> -->
                                     
                    <?php     
                    // }}}          
                    if(isset($_POST['ptypesubmit'])){ 
                        $protyid=$_SESSION['id'];
                        $ptypename = $_POST['ptype']; 
                        // echo $pr_id;  
                    // UPDATE `shopproduct` SET `s_pro_id`='[value-1]',`pro_ty_id`='[value-2]',`shop_id`='[value-3]',`cat_status`='[value-4]' WHERE 1
                    $query = "UPDATE `product_type` SET `ptype_desc`= '$ptypename' WHERE pro_ty_id= $protyid ";
                    $run = mysqli_query($conn, $query);
                    if($run){
                        // echo '<script> alert("Category Edited from CategoryList!!");
                        // location.replace("http://localhost/kwykpr/setmenulist.php") </script>';
                        ?>
                        '<script>
                        
                        swal({
                            icon:"success",
                            title:"Category Edited Successfully!"})
                        .then((value) => {
                            swal(location.replace("http://localhost/kwykpr/setmenulist.php"));
                        });
                            </script>'
                    <?php    
                        unset($_SESSION['id']);
                               
                       }
                        else{
                            ?>
                            <script>swal({
                                icon: "danger",
                                title: "No one Category Edited",
                                });
                                </script>
                        <?php
                       }
    
         
?>
                               
<?php
               }

            //Logic for disabling Category
              if(isset($_GET["dis"]))
	          {
	            	// Check if any option is selected
		            $protyid=$_GET["dis"];
                    print "id=".$protyid ;
                           
                            $query = "UPDATE shopproduct SET cat_status='Disable' WHERE pro_ty_id=$protyid AND shop_id=$sid";
                            $run = mysqli_query($conn, $query);
                           
                            
                            if($run){
                                ?>   
                               <script>
                                // alert(" selected "+'<?=$protyid .'dis'?>');
                                // document.getElementById('<?=$protyid.'dis'?>').style.visibility = "hidden";
                                // document.getElementById('<?=$protyid.'liv'?>').style.visibility = "visible";
                            //    document.getElementById('<?=$protyid .'dis'?>').disabled = true;
                               </script>
                             <?php 
                                // echo '<script> alert("Category Disabled from CategoryList!!!!");
                                // location.replace("http://localhost/kwykpr/setmenulist.php");</script>';
                                ?>
                                '<script>
                                
                                swal({
                                    icon:"success",
                                    title:"Category Disabled Successfully!"})
                                .then((value) => {
                                    swal(location.replace("http://localhost/kwykpr/setmenulist.php"));
                                });
                                    </script>'
                            <?php  
                            }
                            else{
                                ?>
                                <script>swal({
                                    icon: "danger",
                                    title: "No one Category Disabled",
                                    });
                                    </script>
                            <?php
                            }
                        }
               //Logic for make it live Category
              if(isset($_GET["liv"]))
	          {
	            	// Check if any option is selected
		            $protyid=$_GET["liv"];
                    print "id=".$protyid ;
		               
                            $query = "UPDATE shopproduct SET cat_status='Live' WHERE pro_ty_id=$protyid AND shop_id=$sid";
                            $run = mysqli_query($conn, $query);
                           
                            
                            if($run){
                                ?>   
                               <script>
                                // alert(" selected "+'<?=$protyid.'liv'?>');
                                // document.getElementById('<?=$protyid.'liv'?>').style.cssText="display:none";
                            //    document.getElementById('<?=$protyid.'liv'?>').disabled = true;
                               </script>
                             <?php 
                                // echo '<script> alert("Category Live from CategoryList!!!!");
                                // location.replace("http://localhost/kwykpr/setmenulist.php");</script>';
                                ?>
                                '<script>
                                
                                swal({
                                    icon:"success",
                                    title:"Category Lived now!"})
                                .then((value) => {
                                    swal(location.replace("http://localhost/kwykpr/setmenulist.php"));
                                });
                                    </script>'
                            <?php  
                                
                                
                            }
                            else{
                                ?>
                                <script>swal({
                                    icon: "danger",
                                    title: "No one Category Live",
                                    });
                                    </script>
                            <?php
                            }
                        }         
        ?>
                         </table>   
                    </div>
                    <table style="width:67%; margin-left: 162px;">
                        <tr>
                            <td>
                    <div> <br>  
                    <h4>Select the Category you want to Add: <h4>
                        <div style=" padding-top: 0.35rem; padding-bottom: 1.35rem;">
                        <select class="" aria-label="" name="Product_Menu[]" multiple >
                        <!-- style="text-align: center;"  -->
      <?php              
                        $type_desc_List2 = array(); 
                        $j=1000;  
                        // print "<script>Category id= $bizcategoryid</script>";
                        $query_prlist = "SELECT * FROM product_type WHERE category_id=$bizcategoryid";
   
                        $search_prlist = mysqli_query($conn,  $query_prlist);
                        $record_count_pr = mysqli_num_rows($search_prlist);  
                        
                        for($k = 0; $k<$record_count_pr; $k++){
                            $recordpr = mysqli_fetch_assoc($search_prlist);   
                            if($record_count_pr)
                            {
                                $type_desc_List2[$j]=$recordpr["ptype_desc"];
                                $j=$j+1;
                                if(!in_array($type_desc_List2[$k],$type_desc_List1)){
    ?> 
                            <option value="<?php echo $recordpr["pro_ty_id"] ?>"><?php echo $recordpr["ptype_desc"] ?></option>; 
                    <?php
                             }}  }     
                    ?>   
                        </select>
                    </div>

                        <!-- <h4 class="menu"><h4> -->

                        <div>
                            <input class="button" style="margin-left: 70px; margin-bottom: 10px;" type="submit" name="SetMenu" value="Set Category for your Business"><br><br>
                        </div>
                            </td>
                            <td>
                        <h4 >Enter New Category<h4> 
                    <div>
                            <input type="text" name="Menu_name" id="Menu_name" value=""><br> <br>
                            <input class="button" style="margin-left: 50px;" type="submit" name="AddMenu" value="Add Category"><br>
                    </div>
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
            
            if(isset($_POST["AddMenu"]))
            {
                $newmenu=$_POST["Menu_name"];
                $query_newmenu = "INSERT INTO product_type(ptype_desc,category_id) VALUES ('$newmenu', $bizcategoryid) ";
                // echo '<script> alert("Record save successfully in Product_type!!")</script>'; 
                $run1 = mysqli_query($conn, $query_newmenu);
                if($run1){
                    
                    $querypro_ty_id= "SELECT * FROM product_type WHERE ptype_desc='$newmenu' ";
                    $runproid=mysqli_query($conn, $querypro_ty_id);
                    $record_count_proid = mysqli_num_rows($runproid);
                    if($record_count_proid){
                            $recordproid = mysqli_fetch_assoc($runproid); 
                            $prodid=$recordproid['pro_ty_id'];
                            $query_shopmenu = "INSERT INTO shopproduct(pro_ty_id,shop_id,cat_status) VALUES ($prodid,$shopid,'Live')";
                            $runshopmenu=mysqli_query($conn, $query_shopmenu);
                        if($runshopmenu){
                        // echo '<script> alert("Record save successfully in Shop product!!");
                        // location.replace("http://localhost/kwykpr/setmenulist.php");</script>';
                        ?>
                                '<script>
                                
                                swal({
                                    icon:"success",
                                    title:"Category Added Successfully!"})
                                .then((value) => {
                                    swal(location.replace("http://localhost/kwykpr/setmenulist.php"));
                                });
                                    </script>'
                            <?php  
                     }       
                        else{
                        // echo '<script> alert("Record not inserted in in Shop product!!");
                        // location.replace("http://localhost/kwykpr/setmenulist.php");</script>';
                        ?>
                                <script>swal({
                                    icon: "danger",
                                    title: "No Category Inserted!",
                                    });
                                    </script>
                            <?php
                        }
                }
                        }      
                    
                else{
                    // echo '<script> alert("Record not inserted in in Product_type!!");
                    // location.replace("http://localhost/kwykpr/setmenulist.php");</script>';
                    ?>
                                <script>swal({
                                    icon: "danger",
                                    title: "No Category Inserted!!",
                                    });
                                    </script>
                            <?php
                }

                }            
             // Check if form is submitted successfully
	          if(isset($_POST["SetMenu"]))
	          {
	            	// Check if any option is selected
		            if(isset($_POST["Product_Menu"]))
		            {
			            // Retrieving each selected option
		            	foreach ($_POST['Product_Menu'] as $Menu){
                            print "You selected $Menu<br/>";
                            //print $shopid;
                            try{
                            
                            $query = "INSERT INTO shopproduct(pro_ty_id,shop_id,cat_status) VALUES ($Menu,$shopid,'Live')";
                            $run = mysqli_query($conn, $query);
                           
                            }catch(mysqli_sql_exception $e) { 
                                var_dump($e);
                                exit; 
                             } }
                            if($run){
                                // echo '<script> alert("New Category Added in Category List!!!!");
                                // location.replace("http://localhost/kwykpr/setmenulist.php");</script>';
                                ?>
                                '<script>
                                
                                swal({
                                    icon:"success",
                                    title:"New Category Added Successfully!"})
                                .then((value) => {
                                    swal(location.replace("http://localhost/kwykpr/setmenulist.php"));
                                });
                                    </script>'
                            <?php  
                                
                            }
                            else{
                                // echo "Not Update in Menu List!!";
                                ?>
                                <script>swal({
                                    icon: "danger",
                                    title: "No Category Added in Category_list",
                                    });
                                    </script>
                            <?php
                            }
                    }
                    else
		                  echo "Select an option from List!!";
                          
	            } 
        
        ?>

        <script>
            const paragraph = document.getElementById("edit");
const edit_button = document.getElementById("edit-button");
const end_button = document.getElementById("end-editing");

edit_button.addEventListener("click", function() {
  paragraph.contentEditable = true;
  paragraph.style.backgroundColor = "#dddbdb";
} );

end_button.addEventListener("click", function() {
  paragraph.contentEditable = false;
  paragraph.style.backgroundColor = "#ffe44d";
} )
            </script>
                    
</body>
</html>
