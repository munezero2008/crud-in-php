<?php
session_start();

if(!isset($_SESSION['user_id'])){
    header('location:login.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>user dashboard</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
    
</head>
<body>
   <div class='container'>
<h1>welcome to dashboard</h1>
<a href="logout.php" class='btn btn-warning btn-sm'>logout</a>
   </div> 
</body>
</html>