<?php
include'connection.php';

if(isset($_GET['sid'])){
    $sid=$_GET['sid'];

    $sql="SELECT * from student where sid='$sid'";
    $result=mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)>0){
        $rows=mysqli_fetch_assoc($result);

        $sid =$rows['sid'];
        $fname=$rows['fname'];
        $lname=$rows['lname'];
        $sex=$rows['sex'];
        $location = $rows['location'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <form action="update.php" method="post">

    <div class="container w-50 mt-5 ">
    <h1 class="text-center mb-5" >Add form</h1>
    <input  type="hidden" name='sid' value="<?php echo $sid;?>">
    <input type="text" name="fname" placeholder="First name" class="form-control mb-3" value="<?php echo$fname;?>" required>
    <input type="text" name="lname" placeholder="Last name" class="form-control mb-3" value="<?php echo$lname;?>" required>
    <input type="text" name="sex" placeholder="sex" class="form-control mb-3" value="<?php echo $sex;?>" required>
    <input type="text" name="location" placeholder="location" class="form-control mb-3" value="<?php echo $location;?>" required>
    <button type="submit"name="edit" value="edit" class='btn btn-dark'>Edit</button>
    </div>
    </form>
</body>
</html>