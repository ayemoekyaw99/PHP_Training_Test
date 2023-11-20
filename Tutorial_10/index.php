  <?php
// Start the session
  session_start();
  if(!isset($_SESSION['user_id'])){
  echo "<div class='row'>
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
    echo "<nav class='navbar navbar-expand-lg bg-body-tertiary h-25'>
            <div class='container-fluid'>
            <a class='navbar-brand' href='index.php'>Home</a>
            <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
              <span class='navbar-toggler-icon'></span>
            </button>
              <div class='collapse navbar-collapse' id='navbarSupportedContent'>
                <ul class='navbar-nav navbar-nav-scroll col-3 offset-9'>
                  <li class='nav-item dropdown'>
                    <a class='nav-link dropdown-toggle' href='#' role='button' data-bs-toggle='dropdown' aria-expanded='false'>";
                    if((($user['image'])=='image/')){
                      echo "<img src='image/default_user.jpg' alt='image' class='img-thumbnail w-50 h-50 >";
                    }else if(isset($user['image'])){
                        echo "<img src='$user[image]' class='img-thumbnail w-50 h-50'>";
                    }
    echo "</a><ul class='dropdown-menu'>
                <li><a class='dropdown-item' href='./profile.php'>Profile</a></li>
                <li><a class='dropdown-item' href='./logout.php'>Logout</a></li>
              </ul>";
    echo "</li></ul></div></div></nav>";
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
    <div class="text-center mt-5">
      <h4>Welcome From My Website</h4>
    </div>
  </body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

  </html>