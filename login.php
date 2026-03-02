<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
       <link rel="stylesheet" href="only.css">  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
  <div class='container d-flex justify-content-center align-items-center vh-100 '>
 
    <form action="login.php" method="post" class='shadow w-450 p-3'>
                <?php
                session_start();
     include 'conn.php';
     if(isset($_POST['login'])){

        $email=$_POST['email'];
        $password=$_POST['password'];
        $sql="SELECT * from user where email=?";
        $stmt=mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt,$sql);
        mysqli_stmt_bind_param($stmt,'s',$email);
        mysqli_stmt_execute($stmt);
        $result=mysqli_stmt_get_result($stmt);
        $user=mysqli_fetch_assoc($result);
        if($user){
             if(password_verify($password,$user['password'])){
                $_SESSION['user_id']=$user['user_id'];
                $_SESSION['email']=$user['email'];
                header('location:index.php');
                exit;
             }else{
                  echo"<div class='alert alert-danger'>password does incorrect</div>";
             }
        }else{
            echo"<div class='alert alert-danger'>Email does not match</div>";
        }
        }
    ?>
        <div class='p'>
      <input type="email" placeholder='email' class='form-control mb-3' name='email'>
      </div>
        <div class=''>
      <input type="password" placeholder='password' class='form-control mb-3' name='password'>
      <button class='btn btn-primary btn-sm mb-3' name='login' type='submit'>login</button>
      </div>
    <div class='mb-3 '><p>Don't have an  account <a href="register.php  " '>Register here</a></p></div>
    </form>

  </div>  
</body>
</html>