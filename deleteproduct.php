<?php
 include('common.php');
 include('conn.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KWYK | Delete Product</title>
    <link rel="stylesheet" href="addproduct.css">
</head>
<body>
<div class="row">
            <div class="index bg-dark col-md-3">
                <?php
                    include('common2.php');
                    $pr_id=$_GET['pro_id'];

                    $query_pr_name="SELECT * FROM product WHERE pr_id=$pr_id";
                    $search_prnm=mysqli_query($conn, $query_pr_name);

                    $record_prnm = mysqli_num_rows($search_prnm);
                     if($record_prnm){
                               
                      $record_pr_name = mysqli_fetch_assoc($search_prnm);
                     }
                     $del_prname=$record_pr_name['pr_name'];
                ?>
            </div>

            <div class="space1 col-md-9">
                <div class="addprod">
                    <form method="post" enctype="multipart/form-data">

                        <div style="margin: 20px;" class="box productid">
                            <input style="width: 500px;" type="text" class="form-control" id="exampleInputFName" aria-describedby="Productnamehelp" placeholder="<?php echo  $record_pr_name['pr_name'] ?>" name="productid" disabled>
                        </div>

                        <!-- <div style="margin: 20px;" class="box form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" required>
                            <label class="form-check-label" for="flexCheckDefault">
                                Agree Terms & Conditions
                            </label>
                        </div> -->

                        <section style="margin: 20px;" style="text-align: center;"><button class="btn btn-primary me-auto" name="delete">Delete</button></section>
                    </form>
                </div>
            </div>
        </div>

        <?php
            

            if(isset($_POST['delete'])){
                // $rn = $_POST['productid'];
                $query = "DELETE from product WHERE pr_id = $pr_id";
                $data = mysqli_query($conn, $query);
                if($data)
                {
                    echo '<script> alert ("Product Deleted") </script>';
                    
                }
        ?>
        <script> location.replace("http://localhost/kwykpr/productmanage.php")</script>';
        <?php  
                }        

           
        ?>
</body>
</html>