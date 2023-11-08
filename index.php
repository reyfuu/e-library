<?php

include 'connect.php';

if(isset($_POST['submit'])){

    $username=$_POST['username'];
    $password=$_POST['password'];

    $result= mysqli_query($koneksi, "select* from login where username='$username' and password='$password'");

    $check= mysqli_num_rows($result);
    if($check> 0){
        $_SESSION['username']= ['username'];
        header("Location:dashboard.php");
    }
    else{
        echo "<script>
            alert('username / password yang anda masukkan salah');
        </script>";
    }


} 



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-library</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body>
<div class="container mt-5 pt-5">

    <div class="row">

        <div class="col-12 col-sm-8 col-md-6 m-auto">
            <div class="card">
                <div class="card-body">
                <form id="login_form" class="form_class" method="post" action="index.php">
                <h4>Login</h4>
                <br>
                <label>Username:</label>
                <input class="form-control my-3 py-2" name="username" type="text" placeholder="Username" autofocus>
                <label>Password:</label>
                <input id="pass" class="form-control my-3 py-2" name="password" type="password" placeholder="Password">
                <div class="text-center">
                <button class="btn btn-success" name="submit" value="Login" type="submit" form="login_form" onclick="return validarLogin()">Login</button>
                </div>
                </div>


                </form>
                </div>
            </div>

        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" ></script>
</body>
</html>
