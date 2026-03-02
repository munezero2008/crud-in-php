<?php
include"connection.php";

$sql="SELECT * from student";
$result=mysqli_query($conn,$sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>read</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body class="bg-primary">
    <div class="container mt-5">
        
<table class="table table-hover table-bordered table-stripped ">
    
<a href="add.php" class="btn btn-success mb-3 " > Add student</a>
  
    <tr>

        <th class="bg-dark text-light" >SID</th>
        <th class="bg-dark text-light">Firstname</th>
        <th class="bg-dark text-light">Lastname</th>
        <th class="bg-dark text-light">Sex</th>
        <th class="bg-dark text-light">Location</th>
        <th class="bg-dark text-light">Edit</th>
        
        <th class="bg-dark text-light">Delete</th>

    </tr>

    
    
    <?php

    while($rows=mysqli_fetch_assoc($result)){
     ?>
     <tr>
       <td><?php echo  $rows['sid'];?></td>
       <th><?php echo $rows['fname'];?></th>
       <th><?php echo $rows['lname'];?></th>
       <th><?php echo $rows['sex'];?></th>
       <th><?php echo $rows['location'];?></th>

       <th><a href="edit.php?sid=<?php echo $rows['sid'];?>" class="btn btn-primary btn-sm">Edit</a></th>
       
       <th><a href="delete.php?sid=<?php echo $rows['sid'];?>" class="btn btn-danger btn-sm ">Delete</a></th>
</tr>
     <?php
    }

    ?>

</table>
    </div>
</body>
</html>