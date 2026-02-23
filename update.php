<?php
include"connection.php";
if(isset($_POST['edit'])){
    $sid=$_POST['sid'];
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $sex=$_POST['sex'];
    $location=$_POST['location'];

    $sql="UPDATE student set fname='$fname',lname='$lname',sex='$sex',location='$location' where sid='$sid'";
    $result=mysqli_query($conn,$sql);

    if($result){
    header('location:read.php');
    exit;
    }
    else{
        echo"error".mysqli_connect_error($conn);
    }
}

?>