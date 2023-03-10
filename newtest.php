
<?php
session_start();
include('common.php');
include('conn.php');
// include('common2.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KWYK | Store Setup</title>
    <link rel="stylesheet" href="storedetails.css">
<style>
body {font-family: Arial;}

/* Style the tab */
.tab {
  overflow: hidden;
  /* border: 0px solid #ccc; */
  
  /* background-color: #f1f1f1; */
}

/* Style the buttons inside the tab */
.tab button {
  background-color:white;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 25px;
  text-decoration: none;
  color: #4BB1DF;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}
</style>
</head>
<body>
<!-- <script>
  function setup(){
    alert("hello setup!!");
         //document.getElementById("defaultOpen").disabled=false;
        //  document.getElementById("updocbtn").disabled = true;
        //  document.getElementById("bankbtn").disabled = true;
        //  document.getElementById("compbtn").disabled = true;
  }
  </script> -->
    <div class="row">
            <div class="index bg-dark col-md-3">
                <?php
                    include('common2.php');
                ?>
            </div>
            <div style="width: 1000px; background:white; margin:0px">
                    
                    <!-- Tab links -->
                <div class="tab">
                
  <button id="defaultOpen" class="tablinks" onclick="openCity('setupstore')">1 Setup Store</button>
 <button id="updocbtn" class="tablinks" onclick="openCity('upload')" >2 Upload Documents</button>
  <button id="bankbtn" class="tablinks" onclick="openCity('bank')" >3 Bank Details</button>
  <button id="compbtn" class="tablinks" onclick="openCity('complete')" >4 Process Completed</button>
                </div>
                  <div id="setupstore" class="tabcontent" >
                         <h3>1 Setup Store</h3>
        
        <div class="row">
            <div class="space1 col-lg-12 col-md-12">
                <div class="col-lg-12 col-md-12">
                    <form id="contact_form" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post"
                        enctype="multipart/form-data" target="_blank">
                        <div style="font-family: Montserrat;" align='center' class="store-details">
                            <!-- <h3 align="center"> Fill Store Details </h3> -->
                            <div style="margin: 20px;" class="form-row">
                                <div class="form-group col-md-6" style="margin-bottom:5px;">
                                    <label for="biz_cat" class="form-label">Choose a Business Category: &nbsp</label>
                                    <select name="bizcat" class="form-control" id="biz_cat">
                                        <option value="" disabled selected>Category</option>
                                        <?php
                                            $bizcategory = "SELECT * FROM bizcategory";
                                            $query = mysqli_query($conn, $bizcategory);
                                            $record_count = mysqli_num_rows($query);
                                            
                                            for($i=1;$i<=$record_count;$i++){
                                            $bizcat_row = mysqli_fetch_assoc($query)
                                        ?>           
                    <option value="<?php echo $bizcat_row['category_id'] ?>"><?php echo $bizcat_row["category_type"] ?></option>;
                            
                  <?php
                              //}
                             }
                  ?>
                                    </select>
                                </div>
                            </div>
                            <div style="margin: 20px;" class="form-row">
                                <div class="form-group col-md-6" style="margin-bottom:5px;">
                                    <label for="inputPassword4">Shop Name</label>
                                    <input type="text" name="shopname" class="form-control shopname" placeholder="Name">
                                    <p><span class="emsgname hidden">Please Enter a Valid Name</span></p>
                                </div>

                                <div class="form-group col-md-6" style="margin-bottom:5px;">
                                    <label for="inputEmail4">Shop Email</label>
                                    <input type="email" name="semail" class="form-control semail" id="inputEmail4" placeholder="Email">
                                        <p><span class="emsgmail hidden">Please Enter a Valid Email</span></p>
                                </div>
                            </div>

                            <div style="margin: 20px;" class="form-row">
                                <div class="form-group col-md-6" style="margin-bottom:5px;">
                                    <label for="inputPassword4">Shop City</label>
                                    <input type="text" name="shopcity" class="form-control shopcity" placeholder="City Name">
                                    <p><span class="emsgcity hidden">Please Enter a Valid City</span></p>
                                </div>
                                <div class="form-group col-md-6" style="margin-bottom:5px;">
                                    <label for="inputEmail4">Shop Pincode</label>
                                    <input type="text" name="shoppincode" class="form-control shoppincode" id="inputEmail4"
                                        placeholder="Pincode">
                                        <p><span class="emsgpin hidden">Please Enter a Valid Pincode</span></p>
                                </div>
                            </div>

                            <div style="margin: 20px;" class="form-row">
                                <div class="form-group col-md-6" style="margin-bottom:5px;">
                                    <label for="inputPassword4">Shop Address</label>
                                    <input type="text" name="shopaddr" class="form-control shopaddr" placeholder="Address">
                                    <p><span class="emsgadd hidden">Please Enter a Valid Address</span></p>

                                </div>
                                <div class="form-group col-md-6" style="margin-bottom:5px">
                                    <label for="inputEmail4">Contact</label>
                                    <input type="text" name="shopcontact" class="form-control shopcontact" placeholder="Phone">
                                    <p><span class="emsgcell hidden">Please Enter a Valid Contact Number</span></p>
                                </div>
                            </div>

                            <div style="margin: 20px;" class="form-row">
                                <div class="form-group col-md-6" style="margin-bottom:20px;">
                                    <label for="inputEmail4">Store URL</label>
                                    <div style="display:flex;align-items:center">
                                        <input type="text" name="storeurl" class="form-control storeurl" placeholder='Shop URL'
                                            id="myText" name="url" aria-describedby="basic-addon2">
                                            <p><span class="emsglink hidden">Please Enter a Valid Input for URL</span></p>

                                        <button style="color: black;" id="trybtn" style="border: none;" type="button"
                                            class="btn btn-primary" onclick="myFunction()"><a style="color: black;"
                                                href="#" class="link1">Try Link</a></button>
                                    </div>
                                </div>
                            </div>

                            <div style="margin: 20px;" class="form-row">
                                <div class="form-group col-md-6" style="margin-bottom:5px;">
                                    <label for="formFile" class="form-label">Add Brand Logo (jpeg/png/jpg)</label>
                                    <input class="form-control" name="slogo" type="file" id="formFile" accept="image/png, image/jpeg, image/jpg">
                                </div>
                                <div class="form-group col-md-6" style="margin-bottom:5px;">
                                    <label for="formFile" class="form-label">Add Background Image (jpeg/png/jpg)</label>
                                    <input class="form-control" name="bgimage" type="file" id="formFile" accept="image/png, image/jpeg, image/jpg">
                                </div>
                            </div>
                                <div class="form-group col-md-6" style="margin-bottom:5px;">
                                    <label for="formFile" class="form-label">Add Delivery Banner (jpeg/png/jpg)</label>
                                    <input class="form-control" name="delbaner" type="file" id="formFile" accept="image/png, image/jpeg, image/jpg">
                                </div>
                            <div style="margin: 20px;" class="form-row">
                                <div class="form-group col-md-12">
                                    <input id="save-store" class="btn btn-primary" type="submit" name="save" value="Save" step_number="2">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script>
            // Here the value is stored in new variable x 
            function myFunction() {
                var x = document.getElementById("myText").value;
                // document.getElementById("demo").innerHTML = x + ".kwyk.com";
                document.getElementById("myText").value = x + ".kwyk.com";
                const button = document.getElementById('trybtn');

                // ✅ Set the disabled attribute
                button.setAttribute('disabled', '');

                // ✅ Remove the disabled attribute
                // button.removeAttribute('disabled');
            }
        </script>

    <!-- Validations -->
    <script type="text/javascript">
        $(document).ready(function(){
        $('.shopname').on('keypress keydown keyup',function(){
            var $regexname=/^([a-zA-Z]{3,16})$/;
             if (!$(this).val().match($regexname)) {
              // there is a mismatch, hence show the error message
                 $('.emsgname').removeClass('hidden');
                 $('.emsgname').show();
             }
           else{
                // else, do not display message
                $('.emsgname').addClass('hidden');
               }
         });
         $('.semail').on('keypress keydown keyup',function(){
            var $regexname=/^[a-z0-9]+@[a-z]+\.[a-z]{2,3}/;
             if (!$(this).val().match($regexname)) {
              // there is a mismatch, hence show the error message
                 $('.emsgmail').removeClass('hidden');
                 $('.emsgmail').show();
             }
           else{
                // else, do not display message
                $('.emsgmail').addClass('hidden');
               }
         });
         $('.shopcity').on('keypress keydown keyup',function(){
            var $regexname=/^([a-zA-Z]{3,16})$/;
             if (!$(this).val().match($regexname)) {
              // there is a mismatch, hence show the error message
                 $('.emsgcity').removeClass('hidden');
                 $('.emscity').show();
             }
           else{
                // else, do not display message
                $('.emsgcity').addClass('hidden');
               }
         });
         $('.shoppincode').on('keypress keydown keyup',function(){
            var $regexname=/^(\d{6}|^\d{6})$/;
             if (!$(this).val().match($regexname)) {
              // there is a mismatch, hence show the error message
                 $('.emsgpin').removeClass('hidden');
                 $('.emsgpin').show();
             }
           else{
                // else, do not display message
                $('.emsgpin').addClass('hidden');
               }
         });
         $('.shopaddr').on('keypress keydown keyup',function(){
            var $regexname=/^[a-zA-Z0-9\s,.'-]{3,}$/;
             if (!$(this).val().match($regexname)) {
              // there is a mismatch, hence show the error message
                 $('.emsgadd').removeClass('hidden');
                 $('.emsgadd').show();
             }
           else{
                // else, do not display message
                $('.emsgadd').addClass('hidden');
               }
         });
         $('.shopcontact').on('keypress keydown keyup',function(){
            var $regexname=/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/;
             if (!$(this).val().match($regexname)) {
              // there is a mismatch, hence show the error message
                 $('.emsgcell').removeClass('hidden');
                 $('.emsgcell').show();
             }
           else{
                // else, do not display message
                $('.emsgcell').addClass('hidden');
               }
         });
         $('.storeurl').on('keypress keydown keyup',function(){
            var $regexname=/^[a-zA-Z0-9\s,.'-]{3,}$/;
             if (!$(this).val().match($regexname)) {
              // there is a mismatch, hence show the error message
                 $('.emsglink').removeClass('hidden');
                 $('.emsglink').show();
             }
           else{
                // else, do not display message
                $('.emsglink').addClass('hidden');
               }
         });
});
</script>
        <?php
    if(isset($_POST['save'])){

      $shopname = $_POST['shopname'];
      $semail=$_POST['semail'];
      $shopcity = $_POST['shopcity'];
      $shoppincode = $_POST['shoppincode'];
      $shopaddr = $_POST['shopaddr'];
      $shopcontact = $_POST['shopcontact'];
      
      $bizcategory =$_POST['bizcat'];
      $storeurl=$_POST["storeurl"];   
      
      $slogofile = addslashes(file_get_contents($_FILES["slogo"]["tmp_name"]));
      $bgimagefile = addslashes(file_get_contents($_FILES["bgimage"]["tmp_name"]));
      $delbaner = addslashes(file_get_contents($_FILES["delbaner"]["tmp_name"]));

        $log_id=$_SESSION["log_id"];

        $query = "INSERT into shop(Sname,semail,Shopaddr,S_City,S_Pincode,S_Contact,category_id,log_id,slink,Shoplogo,bkgdimage,del_banner) values ('$shopname','$semail','$shopaddr ','$shopcity', '$shoppincode','$shopcontact',$bizcategory,$log_id,'$storeurl','$slogofile','$bgimagefile','$delbaner')";
        $run = mysqli_query($conn, $query);
        if($run){
           echo '<script> alert("Record save successfully!!")</script>';
    ?>
           
    <?php
        } 
        else{
           echo '<script> alert("Record not inserted!!")</script>';
    }
    
}
?>

                         
                  </div>    
               
                   <div id="upload" class="tabcontent" >
                        <h3>Upload Documents</h3>
                       

                    </div>

                   <div id="bank" class="tabcontent" >
                        <h3>Bank Details</h3>
                        

                   </div>

                    <div id="complete" class="tabcontent" >
                        <h3>Proces Completed</h3>
                        
                    </div> 
                    <!-- <div id="setupstore" class="tabcontent" >
                         <h3>1 Setup Store</h3>
                         <?php //include('storedetails.php');  ?>
                    </div>    
               
                   <div id="upload" class="tabcontent" >
                        <h3>Upload Documents</h3>
                        <?php //include('uploaddoc.php');  ?>

                    </div>

                   <div id="bank" class="tabcontent">
                        <h3>Bank Details</h3>
                        <?php //include('bankdetail.php');  ?>

                   </div>

                    <div id="complete" class="tabcontent">
                        <h3>Proces Completed</h3>
                        <?php //include('shopcontact.php');  ?>
                    </div>  -->
          </div>

    </div>
  
<script>
   function settab(flag){
    if(flag=='setdone'){ 
        alert("Inside settab function!!");
        document.getElementById("updocbtn").disabled = false;
        // document.getElementById("upload").display = "block";
        document.getElementById("defaultOpen").disabled=true;
        document.getElementById("bankbtn").disabled = true;
        document.getElementById("compbtn").disabled = true;
   }
   if(flag=='docdone'){ 
        alert("Inside doctab function!!");
        document.getElementById("updocbtn").disabled = true;
        document.getElementById("defaultOpen").disabled=true;
        document.getElementById("bankbtn").disabled = false;
        document.getElementById("compbtn").disabled = true;
   }
   if(flag=='bankdone'){ 
        alert("Inside banktab function!!");
        document.getElementById("updocbtn").disabled = true;
        document.getElementById("defaultOpen").disabled=true;
        document.getElementById("bankbtn").disabled = true;
        document.getElementById("compbtn").disabled = false;
   }

  }


  function openCity(tabName) {
  var i;
  var x = document.getElementsByClassName("tabcontent");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  document.getElementById(tabName).style.display = "block";
  
  if(tabName=='setupstore')
  {
  document.getElementById("updocbtn").disabled = true;
  document.getElementById("bankbtn").disabled = true;
  document.getElementById("compbtn").disabled = true;
  }
  if(tabName=='upload')
  {
  document.getElementById("defaultOpen").disabled = true;
  document.getElementById("bankbtn").disabled = true;
  document.getElementById("compbtn").disabled = true;
  }
  if(tabName=='bank')
  {
  document.getElementById("defaultOpen").disabled = true;
  document.getElementById("updocbtn").disabled = true;
  document.getElementById("compbtn").disabled = true;
  }
  if(tabName=='complete')
  {
  document.getElementById("defaultOpen").disabled = true;
  document.getElementById("updocbtn").disabled = true;
  document.getElementById("bankbtn").disabled = true;
  }
}

//   function openCity(evt, cityName) {
//   var i, tabcontent, tablinks;
//   tabcontent = document.getElementsByClassName("tabcontent");
//   for (i = 0; i < tabcontent.length; i++) {
//     tabcontent[i].style.display = "none";
//   }
//   tablinks = document.getElementsByClassName("tablinks");
//   for (i = 0; i < tablinks.length; i++) {
//     tablinks[i].className = tablinks[i].className.replace(" active", "");
//   }
//   document.getElementById(cityName).style.display = "block";
//   evt.currentTarget.className += " active";

//   }

// // Get the element with id="defaultOpen" and click on it
// document.getElementById("defaultOpen").click();
</script>
<?php    
    if(isset($_GET['flag'])){
        $flag=$_GET['flag'];
        echo $flag;
      if($flag==="setdone"){ 
       ?>
       
        <script> alert("Inside setGet test!!");
        settab('setdone');
       
        </script>           
    <?php
    }
    else if($flag==="docdone"){ 
        ?>
         <script> alert("Inside doc!!");
         settab('docdone');
          </script>           
     <?php
     }
     else if($flag==="bankdone"){ 
        ?>
         <script> alert("Inside bank!!");
         settab('bankdone');
          </script>           
     <?php
     }
}
?>  
   
</body>
</html> 
