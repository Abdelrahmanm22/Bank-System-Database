<?php
session_start();
if($_SERVER['REQUEST_METHOD']=='POST'){
    if(!empty($_POST['employeeID'])){
        $employeeID =  filter_var($_POST['employeeID'],FILTER_SANITIZE_NUMBER_INT);
        $co = mysqli_connect("localhost","root","","bank_system");
        $last_id = $_SESSION['id'];
        $insertQuery = "INSERT INTO `customers`(`customer_id`,`employee_id`) VALUES ($last_id,$employeeID )";
        mysqli_query($co,$insertQuery);
        if(mysqli_affected_rows($co)==1){
            header("LOCATION:index.html");
        }
    }else{
        echo "Field(s) Required..!";
        header('REFRESH:3;URL=index.html');
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add customer</title>
</head>
<body>
    <form action="addCustomer.php" method="post">
        <input type="number" name="employeeID" placeholder="employeeID">
        <input type="submit" value="send employee which adding the customer">
    </form>
</body>
</html>