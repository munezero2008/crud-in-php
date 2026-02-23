<?php
include"connection.php";

if(isset($_GET['sid'])){
    $sid=$_GET['sid'];


    $sql="DELETE from student where sid='$sid'";
    $result=mysqli_query($conn,$sql);

    if($result){
        header('location:read.php');
    }
}
?>