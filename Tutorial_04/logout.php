<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Logout Page</title>
  <link rel="stylesheet" href=".css/reset.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
</body>
<form action="" method="post">
  <button  name="btnLogin" class="btn bg-light text-success fs-3 px-3 col-4  d-block shadow mt-3">Login</button>
</form>
<?php  
session_start();
if (isset($_POST['btnLogout'])){
    unset($_SESSION['email']);  //or session_destory();
    echo " successful logout";
};
if (isset($_POST['btnLogin'])){
  header("Location:login.php");
}
?>
</html>