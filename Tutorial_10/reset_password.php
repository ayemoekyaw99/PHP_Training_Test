<?php 
    session_start();

    require_once 'database.php';
    if (isset($_POST['btnConfirm'])) {
      $newEmail = $_POST['email'];
      $newPassword =($_POST['newPassword']);
      $confirmPassword = ($_POST['confirmPassword']);
      $userId = $_SESSION['user_id'];
      if ($newPassword === $confirmPassword) {
        $confirmPassword=password_hash($confirmPassword,PASSWORD_BCRYPT);
        $query = "UPDATE users SET password = '$confirmPassword'  WHERE id = $userId";
        $result = $conn->query($query);
      } else {
        echo "New password and Confrim password must be same";
      }
     
       
    if ($result) {
        //return true;
        echo "updated";
        header("Location:login.php");
         
    } else {
        return false; // Update failed
    }
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reset Password</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
  <div class=" container mt-5 ">
    <div class="col-8 offset-2">
      <div class="card border-light mb-3">
        <div class=" card-header">
          <h4>Reset Password</h4>
        </div>
        <form action="" method="post">
          <div class="card-body">
            <div class="">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="">
              <label for="newPassword" class="form-label">New Password</label>
              <input type="password" class="form-control" id="new" name="newPassword" required>
            </div>
            <div class="">
              <label for="confirmPassword" class="form-label">Confirm Password</label>
              <input type="password" class="form-control" id="conf" name="confirmPassword" required>
            </div>
          </div>
          <div class="card-footer bg-transparent border-secondary">
            <div class="col-1 offset-11 mt-2 mb-2">
              <button type="submit" class="btn btn-primary" name="btnConfirm">Confirm</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>

</html>