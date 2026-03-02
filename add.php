<?php

include'connection.php';

if(isset($_POST['add'])){

    $sid=$_POST['sid'];
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $sex=$_POST['sex'];
    $lname=$_POST['location'];

    $sql="INSERT into student (fname,lname,sex,location) values('$fname','$lname','$sex','$location')";
    $result=mysqli_query($conn,$sql);

    if($result){
        header('location:read.php');
        exit;
    }
    

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADD</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <form action="" method="post">

    <div class='container w-50'>
         <h1 class="mb-3 text-success ">Add form</h1> 
     <input type="hidden" name="sid">
     <input type="text" name="fname" placeholder="Fisrt name" class="form-control mb-3 border-success" required >
     <input type="text" name="lname" placeholder="Last name" class="form-control mb-3 border-success" required>
     <input type="text" name="sex" placeholder="sex" class="form-control mb-3 border-success" required>
     <input type="text" name='location' placeholder="location" class="form-control mb-3 border-success" required>

     <button type="submit" name="add" class="btn btn-success" value="add">Add</button>


    </div>
    </form>
    
</body>
</html>