<?php

$co = mysqli_connect("localhost","root","","bank_system");

$selectQuery = "SELECT * FROM `employee_info`";
$obj = mysqli_query($co,$selectQuery);//return object

$emp = [];
while($res = mysqli_fetch_assoc($obj)){
    $emp[] = $res;
}
echo '<table border=1>';
    echo '<tr>';
        echo '<th>Employee name</th>';
        echo '<th>salary</th>';
        echo '<th>user_type</th>';
        echo '<th>address</th>';
        echo '<th>phone</th>';
    echo '<tr>';
    foreach($emp as $e){
        echo '<tr>';
        foreach($e as $k=>$v){
            echo '<td>'.$v.'</td>';
        }
        echo '<tr>';
    }
    
        
    
  
echo '</table>';
?>