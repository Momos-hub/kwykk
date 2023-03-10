<!-- This is the backend code to delete the merchant -->

<?php
// to connect with database
include('conn.php');

//If the 'RollNo' vAriable is set, We know we have to edit the Record.
if (isset($_GET['Email']))
{
    // to get merchant mail from which he/she logged in 
    $merchant_mail=$_GET['Email'];

    //Delete Query
    $sql="DELETE FROM `shopinfo` WHERE `Email`='$merchant_mail'"; 
    //Execution
    $result = $conn->query($sql);

    // if deletion get successfull 
    if($result)
    {
        echo "Record Deleted Successfully.";
        ?>
        <script>
            location.replace("adminmerchantmanagement.php");
        </script>

        <?php
    }
    else{
        echo "ERROR" .$sql."<br>".$conn->error;
    }
}
?>