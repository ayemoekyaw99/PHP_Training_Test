<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <div class="row">
      <form class="row g-3" method="post">
        <div class="col-5 offset-3">
          <label for="name" class="form-label">Name</label>
          <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="col-5 offset-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="col-5 offset-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="col-5 offset-3">
          <label for="inputAddress" class="form-label">Address</label>
          <input type="text" class="form-control" id="inputAddress" placeholder="Yangon" name="address">
        </div>
        <div class="col-5 offset-3">
          <label for="inputAddress2" class="form-label">Phone</label>
          <input type="text" class="form-control" id="inputAddress2" placeholder="09xxxxxx" name="phone">
        </div>
        <div class="col-5 offset-3">
          <button type="submit" class="btn btn-primary" name="btnRegister">Register</button>
        </div>
      </form>
    </div>
  </div>
</body>
<?php
    session_start();
    require_once 'database.php';
   if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $name = $_POST['name'];
      $email = $_POST['email'];
      $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
      $address = $_POST['address'];
      $phone = $_POST['phone'];
      $image='image/default_user.jpg';
      $sql = "INSERT INTO users (name, email, password, address, phone, image)
            VALUES ('$name', '$email', '$password', '$address', '$phone', '$image')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
        header("Location:login.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    }
    $conn->close();
  ?>

</html>