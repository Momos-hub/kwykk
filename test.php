
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
                         <?php include('storedetails.php'); ?>
                         
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
