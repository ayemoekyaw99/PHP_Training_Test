<?php
// Start the session
session_start();
if(!isset($_SESSION['user_id'])){
echo "
<div class='row'>
  <nav class='navbar navbar-expand-lg bg-body-tertiary'>
    <div class='container-fluid'>
      <a class='navbar-brand active' href='index.php'>Home</a>
      <a class='btn btn-primary col-1 offset-8' href='login.php'>Login</a>
      <a class='btn btn-primary col-1' href='register.php'>Register</a>
    </div>
  </nav>
</div>
";
}
// Check if the 'auth' session variable is set and destroy the session
if (isset($_SESSION['user_id'])) {
  $userId = $_SESSION['user_id'];
  require_once 'database.php';
  $sql = "SELECT * FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $_SESSION["image"]=$user['image'];
   echo "
    <div class='row w-100'>
      <nav class='navbar navbar-expand-lg bg-body-tertiary'>
        <div class='container-fluid'>
          <a class='navbar-brand active' href='index.php'>Home</a>";
         
           if((($user['image'])=='image/')){
            echo "<a class='btn  col-1 offset-8' href='profile.php'><img src='image/default_user.jpg' alt='image' class='img-thumbnail w-100 h-50'><span>$user[name]</span></a>";
           }else if(isset($user['image'])){
              echo "<a class='btn  col-1 offset-8' href='profile.php'><img src='$user[image]' class='img-thumbnail w-100 h-50'><span>$user[name]</span></a>";
           }
          // if ($_SESSION["image"]) {
          //    echo "<a class='btn  col-1 offset-8' href='profile.php'><img src='$_SESSION[image]' class='img-thumbnail w-100 h-50'><span>$user[name]</span></a>";
          // }
        echo " <a class='btn btn-primary col-1' href='logout.php'>Logout</a>
</div>
</nav>
</div>";

}
// Prevent caching of this page
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Pragma: no-cache");




?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body>
  <div class="container-fluid mt-3">

    <div class="text-center mt-5">
      <h4>Welcome From My Website</h4>
    </div>
  </div>
</body>

</html>