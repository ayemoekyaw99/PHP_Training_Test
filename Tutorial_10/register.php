<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
  <?php
    session_start();
    require_once 'database.php';
      $errorName = $errorEmail = $errorPassword = $errorAddress = $errorPhone = "";
      $name = $email = $password = $address = $phone = "";
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
       if ($_POST['name'] =="")
      {
        $errorName="Needed to fill";  
      } else {
        $name = $_POST['name'];
      }
      if ($_POST['email'] =="")
      {
        $errorEmail="Needed to fill";  
      } else {
       $email = $_POST['email'];
      }
      if ($_POST['password'] =="")
      {
        $errorPassword="Needed to fill";  
      } else {
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
      }
      if ($_POST['address'] =="")
      {
        $errorAddress="Needed to fill";  
      } else {
        $address = $_POST['address'];
      }
      if ($_POST['phone'] =="")
      {
        $errorPhone="Needed to fill";  
      } else {
        $phone = $_POST['phone'];
      }
      $image='image/default_user.jpg';
      if($name!=null && $email !=null && $password !=null && $address !=null && $phone!=null){
        $sql = "INSERT INTO users (name, email, password, address, phone, image)
            VALUES ('$name', '$email', '$password', '$address', '$phone', '$image')";
          if ($conn->query($sql) === TRUE) {
              echo "Registration successful!";
              header("Location:login.php");
          } else {
              echo "Error: " . $sql . "<br>" . $conn->error;
          } 
      }    
    }
    $conn->close();
  ?>
  <div class="container">
    <div class="row">
      <div class="card w-50 col-6 offset-3 mt-3">
        <div class="card-header">
          <h3>Register</h3>
        </div>
        <div class="card-body">
          <form class="row g-3" method="post">
            <div class="col-12">
              <label for="name" class="form-label">Name</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="name">
              <span class="text-danger"> <?php echo $errorName ?></span>
            </div>
            <div class="col-12">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
              <span class="text-danger"> <?php echo $errorEmail ?></span>
            </div>
            <div class="col-12">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="password">
              <span class="text-danger"> <?php echo $errorPassword ?></span>
            </div>
            <div class="col-12">
              <label for="inputAddress" class="form-label">Address</label>
              <input type="text" class="form-control" id="inputAddress" placeholder="Yangon" name="address">
              <span class="text-danger"> <?php echo $errorAddress ?></span>
            </div>
            <div class="col-12">
              <label for="inputAddress2" class="form-label">Phone</label>
              <input type="text" class="form-control" id="inputAddress2" placeholder="09xxxxxx" name="phone">
              <span class="text-danger"> <?php echo $errorPhone ?></span>
            </div>
            <div class="col-12">
              <button type="submit" class="btn btn-primary col-12" name="btnRegister">Register</button>
            </div>
            <div class="col-12 text-center">
              <a href="login.php" class="btn text-primary">Already have an account?</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>