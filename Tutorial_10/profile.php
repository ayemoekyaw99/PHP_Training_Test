<?php 
    session_start();
    $userId = $_SESSION['user_id'];
    require_once 'database.php';
    $sql = "SELECT * FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    //print_r ($user['image']);
    if (isset($_POST['btnUpdate'])) {
      $newUsername = $_POST['name'];
      $newEmail = $_POST['email'];
      $userId = $_SESSION['user_id'];
      $imageFolder='image/';
      $oldImage=$user['image'];
      print_r ($user['image']);
      if (isset($_FILES["file"])) {
          $target_dir = $imageFolder;
          $target_file = $target_dir . basename($_FILES["file"]["name"]);

          if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
              echo "File uploaded successfully.";
          } 
      $query = "UPDATE users SET name = '$newUsername', email = '$newEmail', image = '$target_file' WHERE id = $userId";
      $result = $conn->query($query);
      } else {
        $_SESSION["image"]=$user['image'];
        $oldImage=$_SESSION["image"];
        $query2 = "UPDATE users SET name = '$newUsername', email = '$newEmail' image=' $oldImage' WHERE id = $userId";
      $result = $conn->query($query2);
      }
    if ($result) {
        //return true;
        echo "updated";
        header("Location:index.php");
         
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
  <title>Profile Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body class="w-100 h-50">
  <div class=" container mt-5 ">
    <div class="col-8 offset-2">
      <div class="card border-light mb-3">
        <div class=" card-header">
          <h4>My Profile Setting</h4>
        </div>
        <div class="card-body">
          <form action="" method="post" enctype="multipart/form-data">
            <div>
              <?php 
                  if (isset($user['image'])) {
                    echo "<img src='$user[image]' alt='' class='w-25'>";
                  } elseif (($user['image'])=='image/default_user.jpg') {
                   echo "<img src='image/default_user.jpg' alt='' class='w-25'>";
                  }else {
                     echo "<img src='image/default_user.jpg' alt='' class='w-25'>";
                  }
                  if (($user['image'])=='image/') {
                    echo "<img src='image/default_user.jpg' alt='' class='w-25'>";
                  } 
              ?>
              <input type="file" name="file" id="" class="form-control mt-2" value="<?php echo $user['image']; ?>">
            </div>
            <div class="">
              <label for=" name" class="form-label">Name</label>
              <input type="text" class="form-control" id="name" name="name" value="<?php echo $user['name']; ?>" required>
            </div>
            <div class="">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" value="<?php echo $user['email']; ?>" name="email" required>
            </div>
            <div class="col-1 offset-11 mt-2 mb-2">
              <button type="submit" class="btn btn-primary" name="btnUpdate">Update</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>


</html>