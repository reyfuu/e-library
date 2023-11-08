<?php ?>
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
                <form id="login_form" class="form_class" method="post">
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
