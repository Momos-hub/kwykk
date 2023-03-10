<?php
session_start();
// $i=1;
// while($i<=5)
// {
    
//     $itemArray=array(
//             'id' => $i,
//             'quantity' => 1,    
//     ); 
    
//     $menu_array['South Indian'.$i]=$itemArray;
//     $i++;

        
// } 
// $menu_array['South Indian']=$itemArray;

$menu_array=$_SESSION['menuarray'];
$keys = array_keys($menu_array);
for($i = 0; $i < count($menu_array); $i++) {
    echo $keys[$i] . "{<br>";
    foreach($menu_array[$keys[$i]] as $key => $value) {
        echo $key . " : " . $value . "<br>";
    }
    echo "}<br>";
}

// if(isset($menu_array['South Indian1'])){
//     echo 'available';
// }
// foreach ($menu_array as $key => $value) {
//     echo "<p>$key: $value <p>";
//     foreach($value as $id => $prod)
//            {
//             echo "<p> $id: $prod <p>";
//            }
// }

// $keys = array_keys($superheroes);
// for($i = 0; $i < count($superheroes); $i++) {
//     echo $keys[$i] . "{<br>";
//     foreach($superheroes[$keys[$i]] as $key => $value) {
//         echo $key . " : " . $value . "<br>";
//     }
//     echo "}<br>";
// }
?> 