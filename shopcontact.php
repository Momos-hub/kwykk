<?php
// include('common.php');
include('conn.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KWYK | Store Details</title>
    <link rel="stylesheet" href="storedetails.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

    
        <div class="row">
            <!-- <div class="index bg-dark col-md-3"> -->
                <?php
                    // include('common2.php');
                    // include('conn.php');
                    $logid=$_SESSION["log_id"];
              

    $logid_search = "SELECT * FROM `shop` WHERE `log_id` = $logid";
    $query = mysqli_query($conn, $logid_search);

    // if (!empty($email_search) && $query !== true) {
    //     return @mysqli_num_rows($query);
    // }

    $record_count = mysqli_num_rows($query);

    if($record_count){
        echo '<script type="text/javascript">';
            echo ' alert("Shop Already Exits with Current User")';  
            echo ' location.replace("http://localhost/kwykpr/signin.php")';
            echo '</script>';
          
    }
                ?>
            </div>

            <div class="space1 col-md-11">
                <div class="upl1 col-md-11">
                    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
                    
                        <div class="mb-3">
                            <label for="biz_cat" class="form-label">Choose a Business Category:</label>
                            <select name="bizcat" id="biz_cat">
                        <?php
                            $bizcategory = "SELECT * FROM bizcategory";
                            $query = mysqli_query($conn, $bizcategory);
                            $record_count = mysqli_num_rows($query);
                            
                            for($i=1;$i<=$record_count;$i++){
                                $bizcat_row = mysqli_fetch_assoc($query)
                        ?>           
                <option value="<?php echo $bizcat_row["category_id"] ?>"><?php echo $bizcat_row["category_type"] ?></option>;
                            
                        <?php
                              //}
                             }
                        ?>            
                                </select>
                            
                        </div>    
      <div style="font-family: Maastrict;" class="store-details">
      <h5> Fill Shop Details </h3>
      <form action="">
        <div style="margin: 20px; width: 500px;" class="form-row">
          <div class="form-group col-md-6">
            <label for="inputPassword4">Shop Name</label>
            <input type="text" class="form-control" placeholder="Name">
          </div>
          <div class="form-group col-md-6">
            <label for="inputEmail4">Shop Email</label>
            <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
          </div>
        </div>

      <div style="margin: 20px; width: 500px;"  class="form-row">
        <div class="form-group col-md-6">
          <label for="inputPassword4">Shop Address</label>
          <input type="text" class="form-control" placeholder="Address">
        </div>
        <div class="form-group col-md-6">
          <label for="inputEmail4">Contact</label>
          <input type="text" class="form-control" placeholder="Phone">
        </div>
      </div>

      <div style="margin: 20px; width: 500px;" class="input-group mb-3">
        <input type="text" class="form-control" placeholder='Shop URL' id="myText" size=37 name="url" aria-describedby="basic-addon2">
        <button style="color: black;" id="trybtn" style="border: none;" type="button" class="btn btn-primary" onclick="myFunction()"><a style="color: black;" href="#" class="link1">Try Link</a></button>
      </div>

      <div style="margin: 20px; width: 500px;"  class="form-row">
        <div class="form-group col-md-6">
        <label for="formFile" class="form-label">Add Brand Logo</label>
        <input class="form-control" type="file" id="formFile">
        </div>
        <div class="form-group col-md-6">
        <label for="formFile" class="form-label">Add Background Image</label>
        <input class="form-control" type="file" id="formFile">
        </div>
        <div class="form-group col-md-6">
        <label for="formFile" class="form-label">Add Delivery Banner</label>
        <input class="form-control" type="file" id="formFile">
        </div>
      </div>
      <h5>Documents</h3>
      <div style="margin: 20px; width: 500px;"  class="form-row">
        <div class="form-group col-md-6">
        <label for="formFile" class="form-label">Aadhar Card</label>
        <input class="form-control" type="file" id="formFile">
        </div>
        <div class="form-group col-md-6">
        <label for="formFile" class="form-label">PAN Card</label>
        <input class="form-control" type="file" id="formFile">
        </div>
        <div class="form-group col-md-6">
        <label for="formFile" class="form-label">Business Registration</label>
        <input class="form-control" type="file" id="formFile">
        </div>
        <div class="form-group col-md-6">
        <label for="formFile" class="form-label">Cancelled Cheque</label>
        <input class="form-control" type="file" id="formFile">
        </div>
        <div class="form-group col-md-6">
        <label for="formFile" class="form-label">Food Licence</label>
        <input class="form-control" type="file" id="formFile">
        </div>
      </div>
      <h5>Bank Details</h3>
      <div style="margin: 20px; width: 500px;"  class="form-row">
        <div class="form-group col-md-6">
          <label for="inputPassword4">Account Name</label>
          <input type="text" class="form-control" placeholder="Ac. no.">
        </div>
        <div class="form-group col-md-6">
          <label for="inputEmail4">Bank Name</label>
          <input type="text" class="form-control" placeholder="Bank name">
        </div>
        <div class="form-group col-md-6">
          <label for="inputEmail4">Account no.</label>
          <input type="text" class="form-control" placeholder="Bank Account Number">
        </div>
        <div class="form-group col-md-6">
          <label for="inputEmail4">IFSC Code</label>
          <input type="text" class="form-control" placeholder="IFSC code">
        </div>
      </div>
      
      <h5>Contact Details</h5>
      <div style="margin: 20px; width: 500px;"  class="form-row">
        <div class="form-group col-md-6">
          <label for="inputPassword4">Owner Name</label>
          <input type="text" class="form-control" placeholder="Owner's Name">
        </div>
        <div class="form-group col-md-6">
          <label for="inputEmail4">Manager Name</label>
          <input type="text" class="form-control" placeholder="Manager's Name">
        </div>
        <div class="form-group col-md-6">
          <label for="inputEmail4">Owner Phone no.</label>
          <input type="text" class="form-control" placeholder="Owner's no.">
        </div>
        <div class="form-group col-md-6">
          <label for="inputEmail4">Manger Phone no.</label>
          <input type="text" class="form-control" placeholder="Manager's no.">
        </div>
        <div class="form-group col-md-6">
          <label for="inputEmail4">Owner's Email</label>
          <input type="email" class="form-control" id="inputEmail4" placeholder="Owner's mail id">
        </div>
        <div class="form-group col-md-6">
          <label for="inputEmail4">Manager Email</label>
          <input type="email" class="form-control" id="inputEmail4" placeholder="Manager's mail id" >
        </div>
      </div>

      <!-- <select style="margin: 20px; width: 500px;" class="form-group col-md-6">
        <option selected>Select Business category</option>
        <option value="1">Food</option>
        <option value="2">Grocery</option>
        <option value="3">Electronics</option>
        <option value="3">Fashion</option>
      </select> -->

      <section style="margin: 20px;" style="text-align: center;"><button class="btn btn-primary me-auto" name="update">Submit</button></section>
      </form>
    <!-- </div>            -->
    
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
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        
<?php 
    if(isset($_POST['save'])){

        $shopname = $_POST['shopname'];
        $shopaddr = $_POST['shopaddr'];
        // $shopland = $_POST['shoplandm'];
        // $shoparea = $_POST['shoparea'];
        $shopcity = $_POST['shopcity'];
        $shoppincode = $_POST['shoppincode'];
        $shopcontact = $_POST['shopcontact1'];
        $shopcontact .=", ". $_POST['shopcontact2'];
        $bizcategory =$_POST['bizcat'];
        $storeurl=$_POST["storeurl"];
        echo $storeurl;

        $log_id=$_SESSION["log_id"];

        $query = "INSERT into shop(Sname,Shopaddr,S_City,S_Pincode,S_Contact,category_id,log_id,S_Appl_status) values ('$shopname','$shopaddr ','$shopcity', '$shoppincode','$shopcontact',$bizcategory,$log_id,'Pending')";
        $run = mysqli_query($conn, $query);
        if($run){
           echo '<script> alert("Record save successfully!!")</script>'; 
    ?>
           <script>
                location.replace("http://localhost/kwykpr/test.php");
                document.getElementById("updocbtn").disabled = false;
            </script>
    <?php
        }       
        else{
           echo '<script> alert("Record not inserted!!")</script>';
    }
    
    }
?>      
  
</body>
</html>