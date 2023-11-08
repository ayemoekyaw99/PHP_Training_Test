<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body>
  <div class="container">
    <div class="row">
      <?php if (isset($_SESSION["message"])) { echo $_SESSION["message"]; } ?>
      <form class="row g-3" method="post">
        <div class="col-5 offset-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="col-5 offset-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="col-5 offset-3">
          <a href="forget_password.php" class="btn text-primary">forget password?</a>
        </div>
        <div class="col-5 offset-3">
          <button type="submit" class="btn btn-primary" name="btnLogin">Login</button>
        </div>
      </form>
    </div>
  </div>
</body>
<?php 
session_start();
require_once 'database.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user["password"])) {
        $_SESSION["user_id"] = $user["id"];
        $_SESSION["user_name"]=$user["name"];
        $_SESSION['email']=$user["email"];
        $_SESSION['image']=$user["image"];
        echo "login successful";
        header("Location: index.php");
        exit();
    } else {
       echo "Login failed. Please check your email and password.";
    }
        $_SESSION["user_id"] = $user["id"];
        $_SESSION["user_name"]=$user["name"];
        $_SESSION['email']=$user["email"];
    $stmt->close();
    $conn->close();
}
?>

</html>