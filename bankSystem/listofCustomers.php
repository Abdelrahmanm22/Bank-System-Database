<?php

$co = mysqli_connect("localhost","root","","bank_system");

$selectQuery = "SELECT * FROM `list_of_customers`";
$obj = mysqli_query($co,$selectQuery);//return object

$customers = [];
while($res = mysqli_fetch_assoc($obj)){
    $customers[] = $res;
}
echo '<table border=1>';
    echo '<tr>';
        echo '<th>user_id</th>';
        echo '<th>user_name</th>';
        echo '<th>phone</th>';
        echo '<th>address</th>';
        echo '<th>user_type</th>';
    echo '<tr>';
    foreach($customers as $c){
        echo '<tr>';
        foreach($c as $k=>$v){
            echo '<td>'.$v.'</td>';
        }
        echo '<tr>';
    }
    
        
    
  
echo '</table>';
?>