<?php
session_start();
include('common.php')
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KWYK | Report & Summary</title>
    <link rel="stylesheet" href="help.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
</head>
<body>

    
        <div class="row">
            <div class="index col-md-3">
                <?php
                    include('common3.php')
                ?>
            </div>

            <div class="space1 col-md-9">
                <!-- <div  id="helpbox" style="margin: 10px auto;" class="upl1 col-md-11  row">
                    <div class="col-md-5">
                        <button id="clkbtn1" class="btn btn-primary" onclick="myFunction1()">Approach us</button>
                    </div>
                    <div class="col-md-2">

                    </div>
                    <div  id="complaintbox" class="col-md-5">
                        <button id="clkbtn2" class="btn btn-primary" onclick="myFunction1()">Complaints from Customer</button>
                    </div>
                </div> -->

                <div class="headd">
                    <h4>Approach us</h4>
                </div>
                <form action="" method="post">
                    <div class="helpbox upl1 col-md-11">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Email address</label>
                            <input type="email" name="mailid" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Mobile Number</label>
                            <input type="mbnum" name="mobileno" class="form-control" id="exampleFormControlInput1" placeholder="+91 9876543210">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Complaint</label>
                            <textarea name="comp" class="form-control" id="exampleFormControlTextarea1" placeholder="Describe your complaint here" rows="5"></textarea>
                            <input style="margin: 10px auto;" class="btn btn-primary" name="submit" type="submit"></input>
                        </div>
                    </div>
                </form>

                <?php
                    include('connection.php');

                    if(isset($_POST['submit'])){

                        $mailid = $_POST['mailid'];
                        $mobileno = $_POST['mobileno'];
                        $comp = $_POST['comp'];

                        $query = "INSERT into `complaints` (mailid, mobileno, comp) values ('$mailid', '$mobileno', '$comp')";

                        $run = mysqli_query($conn, $query);

                    }

                ?>


                <div class="headd">
                    <h4>Complaints from customers</h4>
                </div>
                <div class="complaintbox upl1 col-md-11">

                    <table>
                        <tr>
                            <th>Name</th>
                            <th>Mailid</th>
                            <th>Shop name</th>
                            <th>Complaint</th>
                            <th>Action</th>
                        </tr>
                        <?php
                            $sql = "SELECT * FROM `cfc`";
                            $result = mysqli_query($conn, $sql);
    
                            while($row = mysqli_fetch_array($result)){
                        ?>
                        <tr>
                            <form action="" method="post">
                                <?php $ids = $row['id']; ?>
                                <td><?php echo $row['id'];?></td>
                                <td><?php echo $row['name'];?></td>
                                <td><?php echo $row['cmail'];?></td>
                                <td><?php echo $row['shopname'];?></td>
                                <td><?php echo $row['cfccom'];?></td>
                                <td><button class="btn btn-primary" name="delete">Accept</button>
                                <button class="btn btn-danger" name="delete">Delete</button></td>
                            </form>
                            
                        </tr>
                        <?php
                            }
                         ?>
                    </table>
                </div>
            </div>
        </div>

        <?php
            if(isset($_POST['delete'])){
                echo "out";
                $query = "DELETE from `cfc` WHERE id = $ids";
                $data = mysqli_query($conn, $query);
            }
        ?>  
  
   
</body>
</html>