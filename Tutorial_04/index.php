<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home Page</title>
  <link rel="stylesheet" href="css/reset.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<?php 
session_start();
if ($_SESSION['email'] =="admin@gmail.com" && $_SESSION['password'] =="admin123") {
 echo "Welcome ". $_SESSION['email'];
} else {
  header("Location:login.php");
}
?>
<form action="logout.php" method="post">
  <button name="btnLogout" class="btn bg-light text-success fs-3 px-3 col-4  d-block shadow mt-3">Logout</button>
</form>
</body>
</html>