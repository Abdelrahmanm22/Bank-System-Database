<?php
session_start();
if($_SERVER['REQUEST_METHOD']=='POST'){
    

    if(!empty($_POST['username']) && !empty($_POST['phone']) && !empty($_POST['address']) && !empty($_POST['userType'])){
        $username = filter_var($_POST['username'],FILTER_SANITIZE_STRING);
        $phone = filter_var($_POST['phone'],FILTER_SANITIZE_STRING);
        $address = filter_var($_POST['address'],FILTER_SANITIZE_STRING);
        $userType = filter_var($_POST['userType'],FILTER_SANITIZE_STRING);
        

        $co = mysqli_connect("localhost","root","","bank_system");
        $insertQuery = "INSERT INTO `users`(`user_name`, `phone`, `address`, `user_type`) VALUES ('$username ','$phone','$address ','$userType')";
        mysqli_query($co,$insertQuery);

        if(mysqli_affected_rows($co)==1){
            echo "A user has been added";
            // header('REFRESH:5;URL=index.html');
        }else{
            echo "A user has not been added";
            header('REFRESH:5;URL=index.html');
        }
        $_SESSION['id']=$co->insert_id;
        if($userType=='admin'){
            $last_id=$_SESSION['id'];
            mysqli_query($co,"INSERT INTO `admins`(`admin_id`) VALUES ($last_id)");
        }elseif($userType=='employee'){
            header("LOCATION:addSalary.php");
        }else if($userType=='customer'){
            header("LOCATION:addCustomer.php");
        }
    }
    else{
        echo "Field(s) Required..!";
        header('REFRESH:3;URL=index.html');
    }
}
?>


