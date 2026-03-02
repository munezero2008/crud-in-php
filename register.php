<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sign up</title>
    <link rel="stylesheet" href="only.css">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class='d-flex justify-content-center align-items-center vh-100'>


        <form action="" method="post" class='shadow w-450 p-3'>
              <h4 class=' text-center fs-'>Create account</h4>
                <?php
                include 'conn.php';
    if(isset($_POST['register'])){
        $fullname=$_POST['fullname'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $passwordHash=password_hash($password,PASSWORD_DEFAULT);

        $error=[];
        if(empty($fullname) || empty($email) || empty($password)){
            $error[]='All field required';
        }
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $error[]='Email is not valid';
        }
        if(strlen($password)<8){
            $error[]='password must be at least 8 character';
        }
        //check duplication email

        $stmt=mysqli_stmt_init($conn);
        $sql="SELECT * from user where email=?";
        mysqli_stmt_prepare($stmt,$sql);
        mysqli_stmt_bind_param($stmt,'s',$email);
        mysqli_stmt_execute($stmt);
        $result=mysqli_stmt_get_result($stmt);

          if(mysqli_num_rows($result)>0){
            $error[]='Email alredy exist';
          }

       
           //show errors

        if(count($error)>0){
         foreach($error as $err){
            echo "<div class='alert alert-danger'>$err</div>";
         }

        }else{

            
            $sql="INSERT into user (fullname,email,password) values(?,?,?)";
            $stmt=mysqli_stmt_init($conn);
            $prepareStmt=mysqli_stmt_prepare($stmt,$sql);
            if($prepareStmt){
                mysqli_stmt_bind_param($stmt,'sss',$fullname,$email, $passwordHash);
                mysqli_stmt_execute($stmt);
                
                echo"<div class='alert alert-success'>You are registered successfully.</div>";
            }
            else{
                  die('somithing went wrong ?').mysqli_error($conn);
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
    ?>
        
        <div>
            
            <input type="text" name="fullname" class='form-control mb-3' placeholder='Full name'>
        </div>
        <div>
          
            <input type="email" name="email" class='form-control mb-3' placeholder='Email'>
        </div>
        <div>
          
            <input type="password" name="password" class='form-control mb-3' placeholder='Password'>
        </div>
        <button name='register' class='btn btn-primary btn-sm'>Register</button>
        <a href="login.php" class='btn btn-success btn-sm'>Login</a>
        </form>
    </div>
</body>
</html>