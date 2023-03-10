<?php
session_start();
include('conn.php');
$url=$_SESSION['surl'];
// add, remove, empty
if (!empty($_GET['action'])) {
    switch ($_GET['action']) {
        // add product to cart
        case 'add':
            // if (!empty($_POST['quantity'])) {
                $pid = $_GET['pr_id'];
                $cat=$_GET['cat'];
                //print $pid;
                // print $cat;
                $qty=1;
                $query = "SELECT * FROM product WHERE pr_id=$pid";
                $result = mysqli_query($conn, $query);
                while ($product = mysqli_fetch_array($result)) {
                    $itemArray = [
                        $product['pr_id'] => [
                            'pr_name' => $product['pr_name'],
                            'pr_id' => $product['pr_id'],
                            'quantity' => $qty,
                            'pr_price' => $product['pr_price'],
                            
                        ]
                    ];
                    if (isset($_SESSION['cart_item']) &&!empty($_SESSION['cart_item'])) {
                        if (in_array($product['pr_id'], array_keys($_SESSION['cart_item']))) {
                            foreach ($_SESSION['cart_item'] as $key => $value) {
                                if ($product['pr_id'] == $key) {
                                    if (empty($_SESSION['cart_item'][$key]["quantity"])) {
                                        $_SESSION['cart_item'][$key]['quantity'] = 0;
                                    }
                                  //  $_SESSION['cart_item'][$key]['quantity'] += $_POST['quantity'];
                                    $_SESSION['cart_item'][$key]['quantity'] += 1;
                                }
                            }
                        } else {    
                            $_SESSION['cart_item'] += $itemArray;
                        }
                    } else {
                        $_SESSION['cart_item'] = $itemArray;
                    }
                }
                
                
    ?>            
               <script>
                
                location.replace("http://localhost/kwykpr/shoppage.php?url=<?=$url;?>&menu=<?=$cat?>");
            </script>

    <?php            //}
            break;

        case 'minus': 
                $qty=$_GET['qty'];
                //print "in cart".$qty; 
                $pid = $_GET['pr_id'];
                $cat=$_GET['cat'];
                print $cat;
                $query = "SELECT * FROM product WHERE pr_id=" . $pid;
                $result = mysqli_query($conn, $query);
                while ($product = mysqli_fetch_array($result)) {
                    $itemArray = [
                        $product['pr_id'] => [
                            'pr_name' => $product['pr_name'],
                            'pr_id' => $product['pr_id'],
                            'quantity' => $qty,
                            'pr_price' => $product['pr_price'],
                            // 'GST'=>$tax,
                            // 'Subtotal'=>$total_price,
                            // 'image' => $product['image']
                        ]
                    ];
                if (isset($_SESSION['cart_item']) &&!empty($_SESSION['cart_item'])) {
                    if (in_array($pid, array_keys($_SESSION['cart_item']))) {
                        foreach ($_SESSION['cart_item'] as $key => $value) {
                            if ($pid == $key) {
                                if (empty($_SESSION['cart_item'][$key]["quantity"])) 
                                {
                                    $_SESSION['cart_item'][$key]['quantity'] = 0;
                                   
                                }
                                
                                $_SESSION['cart_item'][$key]['quantity'] = $_SESSION['cart_item'][$key]['quantity']-1;
                               
                                //$_SESSION['cart_item'][$key]['quantity'] -= $qty;
                            }
                            if($_SESSION['cart_item'][$key]['quantity']==0){
                                unset($_SESSION['cart_item'][$key]);
                            }
                        }
                    } 
                }

            }
        ?>    
            <script>
                
            location.replace("http://localhost/kwykpr/shoppage.php?url=<?=$url;?>&menu=<?=$cat ?>");
        </script>
        <?php
            break;
            case 'plus':
                $qty=$_GET['qty'];
                //print "in cart".$qty; 
                $pid = $_GET['pr_id'];
                $cat=$_GET['cat'];
                print $cat;
                $query = "SELECT * FROM product WHERE pr_id=" . $pid;
                $result = mysqli_query($conn, $query);
                while ($product = mysqli_fetch_array($result)) {
                    $itemArray = [
                        $product['pr_id'] => [
                            'pr_name' => $product['pr_name'],
                            'pr_id' => $product['pr_id'],
                            'quantity' => $qty,
                            'pr_price' => $product['pr_price'],
                            // 'GST'=>$tax,
                            // 'Subtotal'=>$total_price,
                            // 'image' => $product['image']
                        ]
                    ];
                if (isset($_SESSION['cart_item']) &&!empty($_SESSION['cart_item'])) {
                    if (in_array($pid, array_keys($_SESSION['cart_item']))) {
                        foreach ($_SESSION['cart_item'] as $key => $value) {
                            if ($pid == $key) {
                                if (empty($_SESSION['cart_item'][$key]["quantity"])) {
                                    $_SESSION['cart_item'][$key]['quantity'] = 0;
                                   
                                }
                                $_SESSION['cart_item'][$key]['quantity'] = $_SESSION['cart_item'][$key]['quantity']+1;
                               
                                //$_SESSION['cart_item'][$key]['quantity'] -= $qty;
                            }
                        }
                    } 
                } 
            }
        ?>    
           <script>
                
               location.replace("http://localhost/kwykpr/shoppage.php?url=<?=$url;?>&menu=<?=$cat ?>");
           </script>
        <?php    
            break;
            
        case 'empty':
            unset($_SESSION['cart_item']);
            break;
    }
}


error_reporting(0);



?>