<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link rel="stylesheet" href=".css/reset.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<div class="container mt-5">
        <div class="row">
            <div class="col-5 ">
            <h3>Please login your email & password</h3>
                <form action="" method="post">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" required placeholder="admin@gmail.com">
                <label for="password">Password</label>
                <input type="password" name="password" id="password"class="form-control" required>
                <button  name="btnLogin" class="btn bg-light text-success fs-3 px-3 col-12 shadow mt-3">Login</button>
                </form>
            </div>
        </div>
    </div>
</body>
<?php 
    if (isset($_POST['btnLogin'])) {
        $userEmail = $_POST['email'];
        $userPassword = $_POST['password'];
        session_start();
        $_SESSION['email'] = $userEmail;
        $_SESSION['password'] = $userPassword;
        if ($_SESSION['email'] =="admin@gmail.com" && $_SESSION['password'] =="admin123") {
            header("Location:index.php");
        } else {
            echo "Login Fail email must be admin@gmail.com && password must be admin123";
        }
    }
?>
</html>