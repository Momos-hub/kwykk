<?php
include('common.php');
include('conn.php');
// session_start();
$logid=$_SESSION["log_id"];
?>
<!--  -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KWYK | Store Setup</title>
    <link rel="stylesheet" href="storedetails.css">
    <link rel="stylesheet" href="setstore.css">
     <link rel="shortcut icon" href="White_on_Blue.png" type="image/x-icon">
     <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
     
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
    <style>
    *{
    font-family: 'Montserrat';
    }
    .form-row {
   
    flex-wrap: nowrap !important;
    
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
::-webkit-scrollbar {
    width: 5px;
  }

  /* Track */
  ::-webkit-scrollbar-track {
    background: white; 
  }
   
  /* Handle */
  ::-webkit-scrollbar-thumb {
    background: #888; 
  }


            /* ::-webkit-scrollbar {
                width: 4px;
            } */
        </style>
</head>
<body>
    <div class="row">
<div style="width:300px;height:100%; border-right: 1px solid rgba(0,0,0,.1); height: calc(100vh - 90px);">
                <?php
                   include('common2.php');
                   $logid=$_SESSION["log_id"];
                ?>
            </div>

            <!-- <div class="space1 col-md-9"> -->
        <div class=" col-md-9">
        <h4 align="" style="margin-top:5px;"><b>Customize Shop Timings</b></h4>
            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
            <div class="store-details"> 
                <!-- <h5 align="center">Shop Configuration</h5> -->
                <div style="margin: 30px;" class="form-row">
                    <label for="inputPassword4">Date wise Availability</label> 
                    <div class="form-group col-md-6 col-lg-10">
                    &nbsp&nbsp&nbsp  <input class="" id="opt1" name="opt1" type="checkbox" onclick="funopt1()" <?php if (isset($opt1) && $opt1=="Everyday") echo "checked";?> value="Everyday">Everyday      
                    <!-- </div> -->
                    <!-- <div class="form-group col-md-6"> -->
                    &nbsp &nbsp &nbsp &nbsp <input class="" id="opt2" name="opt2" type="checkbox" onclick="funopt2()" <?php if (isset($opt2) && $opt2=="Specificdate") echo "checked";?> value="Specificdate">Specific Date <br><br>
                            <div id="datewise" class="content col-md-12" style="display:none;">
                            <!-- <p>Specific date logic </p> -->
                                <label>Start Date </label>
                                    <input type="text" name="startdate"  value="" placeholder="mm/dd/yyyy" />
                                    &nbsp  &nbsp <label>End Date </label>
                                    <input type="text" name="enddate"  value="" placeholder="mm/dd/yyyy" />
                            </div> 
                    </div> 
            </div>
            <div style="margin: 30px;" class="form-row">
                    <label for="inputPassword4">Time wise Availability</label><br>
                    &nbsp  &nbsp  <div class="form-group col-md-6">
                        <input class="collapsible" id="topt1" name="topt1" onclick="tfunopt1()" type="checkbox" <?php if (isset($topt1) && $topt1=="Fulltime") echo "checked";?> value="Fulltime">Full Time      
                    <!-- </div>
                    <div class="form-group col-md-6"> -->
                    &nbsp  &nbsp  &nbsp  &nbsp  <input class="collapsible" id="topt2" name="topt2" onclick="tfunopt2()" type="checkbox" <?php if (isset($topt2) && $topt2=="Specifictime") echo "checked";?> value="Specifictime">Specific Time
                        <br><br>    
                        <div id="timewise" class="content" style="display:none;">
                                <!-- <p>Specific time logic </p> -->
                            <table style="width:100%; border-collapse: collapse" align="center">
                            <tr>
                                <th>Weekday</th>
                                <th>Open All Day</th>
                                <th>Close All Day</th>
                                <th>Specific time</th>
                                <th></th>
                            </tr>
                            <tr>
                                <td align="center">Monday</td>
                                <td align="center"><input type="radio" name="mon" onclick="closeForm()" <?php if (isset($mon) && $mon="Open") echo "checked";?> value="Open"></td>
                                <td align="center"><input type="radio" name="mon" onclick="closeForm()" <?php if (isset($mon) && $mon="Close") echo "checked";?> value="Close"></td>
                                <td align="center"><input type="radio" name="mon"  onclick="openForm('Monday')" <?php if (isset($mon) && $mon="Specific") echo "checked";?> value="Specific"></td>
                                <td align="center" id="mon" hidden><a href="#" >Set Time Slot</a></td>
                            </tr>
                            <tr>
                                <td align="center">Tuesday</td>
                                <td align="center"><input type="radio" name="tue" onclick="closeForm()"></td>
                                <td align="center"><input type="radio" name="tue" onclick="closeForm()"></td>
                                <td align="center"><input type="radio" name="tue" onclick="openForm('Tuesday')"></td>
                                <td align="center" id="tue" hidden><a href="#" >Set Time Slot</a></td>
                            </tr>
                            <tr>
                                <td align="center">Wednesday</td>
                                <td align="center"><input type="radio" name="wed" onclick="closeForm()"></td>
                                <td align="center"><input type="radio" name="wed" onclick="closeForm()"></td>
                                <td align="center"><input type="radio" name="wed" onclick="openForm('Wednesday')"></td>
                                <td align="center" id="wed" hidden><a href="#" >Set Time Slot</a></td>
                            </tr>
                            <tr>
                                <td align="center">Thursday</td>
                                <td align="center"><input type="radio" name="thu" onclick="closeForm()"></td>
                                <td align="center"><input type="radio" name="thu" onclick="closeForm()"></td>
                                <td align="center"><input type="radio" name="thu" onclick="openForm('Thursday')"></td>
                                <td align="center" id="thu" hidden><a href="#">Set Time Slot</a></td>
                            </tr>
                            <tr>
                                <td align="center">Friday</td>
                                <td align="center"><input type="radio" name="fri"  onclick="closeForm()"></td>
                                <td align="center"><input type="radio" name="fri"  onclick="closeForm()"></td>
                                <td align="center"><input type="radio" name="fri"  onclick="openForm('Friday')"></td>
                                <td align="center" id="fri" hidden><a href="#" >Set Time Slot</a></td>
                            </tr>
                            <tr>
                                <td align="center">Saturday</td>
                                <td align="center"><input type="radio" name="sat"  onclick="closeForm()"></td>
                                <td align="center"><input type="radio" name="sat"  onclick="closeForm()"></td>
                                <td align="center"><input type="radio" name="sat" onclick="openForm('Saturday')"></td>
                                <td align="center" id="sat" hidden><a href="#" >Set Time Slot</a></td>
                            </tr>
                            <tr>
                                <td align="center">Sunday</td>
                                <td align="center"><input type="radio" name="sun" onclick="closeForm()"></td>
                                <td align="center"><input type="radio" name="sun" onclick="closeForm()"></td>
                                <td align="center"><input type="radio" name="sun" onclick="openForm('Sunday')"></td>
                                <!-- <td align="center"><input type="radio" name="sun" onclick="setvisible('sun')">set time slot</td> -->
                                <td align="center" id="sun" hidden><a href="#" onclick="openForm('Sunday')">Set Time Slot</a></td>
                            </tr>
                        
                            </table>
                            </div>
                    </div>  
                    <?php
        
              

        $shop_id = "SELECT * FROM shop WHERE log_id = $logid";

        $search_shop = mysqli_query($conn, $shop_id);
        $record_count = mysqli_num_rows($search_shop);
    
        if($record_count){
            $record = mysqli_fetch_assoc($search_shop);
                         
            $shopid= $record['shop_id'];
    ?>                     
    
        <div style="overflow: scroll;overflow-x:hidden;height: 300px;border: 2px solid #eee;padding: 8px; display:none; width:500px" class="formPopup" id="popupForm">
        <!-- action="/action_page.php"  -->
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="formContainer" method="POST" name="timeform" >
            <input type=text name="day" id="day" value="<?php echo $day;?>" disabled style="background-color: white; border:none;">
             <!-- <button name="show">Show</button> -->
             <div style=" font-size:13px;">
                 <h4>Enter the Time Slot</h4>
                 <label for="lstime">
                     <strong>Start Time</strong>
                    </label>
                    <input type="time" id="stime" placeholder="HH:MM" name="stime" required>
                    <label for="letime">
                        <strong>End Time</strong>
                    </label>
                    
                    <input type="time" id="etime" placeholder="HH:MM" name="etime" required>
                    <input type=submit class="signup_btn"  name="addtimeslot" value="+">
                </div>
        <table class="table">
        <thead>
            <tr>
                <th scope="col">Day</th>
                <th scope="col">Start time</th>  
                <th scope="col">End time</th>
                <th scope="col">Action</th> 
             <tr>
        </thead>
        <tbody>
        <?php 
        if(isset($_POST['show']))
        {
            echo '<script>alert "Inside show click";</script>';
            $day=$_POST['day'];
            $_SESSION['day']=$day;
            print "<h3 align=center> Set Time slot for ".$day. "</h3>"; 
            echo '<script>document.getElementById("popupForm").style.display = "block";</script>';
            // echo '<script>document.getElementById("day").value = dayname;</script>';
            

        }    
        $timeslot_query = "SELECT * FROM shop_daytimings WHERE shop_id = $shopid";

        $search_timeslot = mysqli_query($conn, $timeslot_query);
        $record_count = mysqli_num_rows($search_timeslot);
    
        if($record_count){
            for($i=1;$i<=$record_count;$i++){
            $timeslot_record = mysqli_fetch_assoc($search_timeslot);
            $std_id=$timeslot_record["sdt_id"];
            $stime=$timeslot_record["start_time"];
            $etime=$timeslot_record["end_time"];
            $days=$timeslot_record["days"];
            //$day=$_SESSION['day'];
            //if($day==$days)
            {
            // echo $day;
        ?>    
            <tr> <br>
                <td align="center"><?= $days?> </td>
                <td align="center"><?= $stime?> </td>
                <td align="center"><?= $etime?></td>
                <td align="center">
                <div class="form-group col-md-12">
                    <form method="post">
                            <input class="button" type="submit" name="delete" value="Delete">
            </form>
                        </div><td>
                <!-- <td align="center"><a href="shopconfig.php?timeslotid=<?= $std_id ?>"><button class="delete" type="button" style="border:none; background-color:white;"><i id="delete" class="fa fa-trash" style="font-size:18px"></i></button></a></td> -->
            </tr>
        <?php
             } 
        }}
        else{
            echo '<script> alert("No Records!!!");
                                </script>';
        }
        ?>
              
              </tbody>
        </table>
         
        
          <!-- <button type="add" class="btn">+</button> -->
          <p align="right"><button type="button" class="btn cancel" onclick="closeForm()">Close</button></p>
        </form>
    </div>
    <?php
        }
    ?>       
      </div>
</div>
      
<?php 
                     include('conn.php');
                     $log_id = $_SESSION['log_id'];
                     $sql = "SELECT *FROM `shop` WHERE `log_id`=$log_id";

                     $run = mysqli_query($conn, $sql); 
                                            $record_count = mysqli_fetch_assoc($run);

                                            
 $cat=$record_count['category_id'];
                                            // echo $cat;

                     if($cat === '2001' || '2002'){
                    ?>
                    <div style="margin: 30px; width: 700px;">
      <label for="inputPassword4">Processing Time per Order (In minutes)</label>
      &nbsp&nbsp
      <input type="number" min="30" name="processtime" class="" required>
                   
    
    
    </div>

                    <div style="margin: 30px; width: 500px; visibility: hidden;">
                    <label for="inputPassword4">Processing days per Order </label>
                            <input type="text" name="processtime" class="">
                    </div>



                    <?php
                     }

    //                  else
                     
    //    {
    //     ?>
                     <!-- <div style="margin: 30px; width: 500px; visibility: hidden;">
                    <label for="inputPassword4">Processing Time per Order (In working days)</label>
                            <input type="text" name="processtime" class="">
                    </div> -->
                    <!-- <?php
       
    
       ?> -->
                    <!-- </div>   -->
                    

                        <div style="margin: 30px; width: 500px;">
                            <label for="inputPassword4">Delivery Mode</label>
                            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                             <input type="checkbox" name="delmode"  value="" required>Takeaway
                            <!-- <label>Takeaway </label> -->
                            &nbsp&nbsp &nbsp&nbsp&nbsp&nbsp 
                              <input type="checkbox" name="delmode"  value="">Home Delivery
                            <!-- <label>Home Delivery</label>  -->
                        </div> 
                    
                    
                    <div style="margin: 20px;" class="form-row">
                    <form action="" method="post">
                        
                        <div class="form-group col-md-12">
                            <input id="save-store" class="button" type="submit" name="save" value="Save" step_number="2">
                            <input id="save-store" class="button" type="submit" name="Next" value="Next" step_number="2">
                        </div>
                    </form>
                            </div>
        <!-- </div> -->
        
       
        </form>    
        
    </div>    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> 
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />   
    
<script type="text/javascript">

function openForm(dayname) {

        document.getElementById("popupForm").style.display = "block";
        document.getElementById("day").value = dayname;

        // document.forms["timeform"].querySelector('input[name="day"]').value = dayname;
        // document.forms["timeform"]["day"].setAttribute('value', dayname);
        //location.replace("http://localhost/kwykpr/shopconfig.php?dname="+dayname);
         //location.href("http://localhost/kwykpr/shopconfig.php?dname="+dayname);
        // document.writeln(dayname);
        // document.getElementById("scancode").setAttribute('value', dayname);
        
      }
      function closeForm() {
        document.getElementById("popupForm").style.display = "none";
      }

      

$(function() {
  $('input[name="startdate"]').daterangepicker({
    singleDatePicker: true,
    showDropdowns: true,
    minYear: parseInt(moment().format('YYYY')),
    maxYear: parseInt(moment().format('YYYY'))
  }, function(start, end, label) {
    var years = moment().diff(start, 'years');
    
  });
});

$(function() {
  $('input[name="enddate"]').daterangepicker({
    singleDatePicker: true,
    showDropdowns: true,
    minYear: parseInt(moment().format('YYYY')),
    maxYear: parseInt(moment().format('YYYY'))
  }, function(start, end, label) {
    var years = moment().diff(start, 'years');
    
  });
});

function funopt1() {
 var text = document.getElementById("datewise");
    document.getElementById("opt2").checked=false;
    text.style.display = "none";
}
function funopt2() {
    var text = document.getElementById("datewise");
    document.getElementById("opt1").checked=false;
    text.style.display = "block";
}

function tfunopt1() {
    var text = document.getElementById("timewise");
    document.getElementById("topt2").checked=false;
    text.style.display = "none";
    document.getElementById("popupForm").style.display = "none";
}
function tfunopt2() {
 var text = document.getElementById("timewise");
    document.getElementById("topt1").checked=false;
    text.style.display = "block";
}


function setvisible(day){
    document.getElementById(day).removeAttribute("hidden");
}

</script>       
<?php 
                    if(isset($_POST['Next'])){
                        echo '<script>location.replace("http://localhost/kwykpr/setmenulist.php");</script>';
                 ?> <?php  }?>
<?php 
     if(isset($_POST['addtimeslot'])){
        $starttime=$_POST['stime']; 
        $endtime=$_POST['etime']; 
        $log_id=$_SESSION["log_id"];

        $query_timeslot = "INSERT INTO `shop_daytimings`(`shop_id`, `days`, `start_time`, `end_time`) VALUES ($shopid,'$day','$starttime','$endtime')";

       $run = mysqli_query($conn, $query_timeslot);
       if($run){
          echo '<script> alert("Time slot uploaded Successfully! Thank You!! ");
          location.replace("http://localhost/kwykpr/shopconfig.php");</script>';
  
       }
       else{
          echo '<script> alert("Time slot not properly Updated. Try Again ");
          location.replace("http://localhost/kwykpr/shopconfig.php");</script>';
       }

     }
    if(isset($_POST['contact'])){
      $oname=$_POST['oname']; 
      $mgrname=$_POST['mgrname']; 
      $ophone=$_POST['ophone']; 
      $mgrphone=$_POST['mgrphone']; 
      $oemail=$_POST['oemail']; 
      $mgremail=$_POST['mgremail']; 
     
      // $deltype = $_POST['deliverytype'];

      $log_id=$_SESSION["log_id"];

      $query = "UPDATE `shop` SET oname='$oname', mgrname='$mgrname',ocontact='$ophone=', mgrcontact='$mgrphone',oemail ='$oemail',mgremail='$mgremail' WHERE `log_id` = $logid";

      $run = mysqli_query($conn, $query);
      if($run){
          echo '<script> alert("Contact Details uploaded Successfully! Thank You!! ");
          location.replace("http://localhost/kwykpr/contactdetails.php");</script>';
         
      }
      else{
          echo '<script> alert("BankContact Details not properly Updated. Try Again ");
          location.replace("http://localhost/kwykpr/contactdetails.php");</script>';
      }

  }
    
    
?>      

<?php 
    if(isset($_POST['delete'])){
      $day=$_POST['days']; 
      $stime=$_POST['stime']; 
      $etime=$_POST['etime']; 
     

      $log_id=$_SESSION["log_id"];
     

      $query = "DELETE FROM `shop_daytimings` WHERE days='$day' AND start_time='$stime' AND end_time='$etime'";
      $run1 = mysqli_query($conn, $query);
      if($run1){
        echo '<script> alert("delete");</script>';
        
      }
      else{
        echo '<script> alert("error ");</script>';
    }

?>
<?php
  }
?>         
    
  
</body>
</html>