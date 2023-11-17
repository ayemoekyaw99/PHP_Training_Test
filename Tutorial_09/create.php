<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Post</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
  <?php 
  session_start();
  require_once 'database.php';
  $errorTitle=$errorContent="";
  $title=$content= "";
  if (isset($_POST['btnCreate'])) {
<<<<<<< HEAD
      if ($_POST['title'] =="")
      {
        $errorTitle="Needed to fill";  
      } else {
        $title=$_POST['title'];
      }
      if ($_POST['content'] =="")
      {
        $errorContent="Needed to fill";  
      } else {
        $content=$_POST['content'];
      }
      
      $isPublish=isset($_POST['isPublish']) ? 1 : 0;
      if ($title != null && $content != null) 
      {
        $stmt = $conn->prepare("INSERT INTO posts (title, content, is_published) VALUES (?, ?, ?)");
        $stmt->bind_param("ssi", $title, $content, $isPublish);
        // Execute the statement
        if ($stmt->execute()) {
          $_SESSION['createSuccess'] = true;
          echo "<script>window.location.href = 'index.php';</script>";
        } else {
          echo "Error creating post: " . $stmt->error;
        }
          $stmt->close();
        }
    }
    $conn->close();
  ?>
=======
        if($_POST['title'] ==""){
          $errorTitle="Needed to fill";  
        } else {
            $title=$_POST['title'];
        }
         if ($_POST['content'] ==""){
          $errorContent="Needed to fill";  
        } else {
            $content=$_POST['content'];
        }
        $isPublish=isset($_POST['isPublish']) ? 1 : 0;
        if ($title != null && $content != null) {
          $stmt = $conn->prepare("INSERT INTO posts (title, content, is_published) VALUES (?, ?, ?)");
          $stmt->bind_param("ssi", $title, $content, $isPublish);
          // Execute the statement
          if ($stmt->execute()) {
            $_SESSION['createSuccess'] = true;
            echo "<script>window.location.href = 'index.php';</script>";
          } else {
            echo "Error creating post: " . $stmt->error;
          }
          $stmt->close();
        } 
    }
    $conn->close();
?>
>>>>>>> c2ec224c93bc028ff8aca4414f91f69aa5ac17b2
  <div class="container mt-5">
    <div class="col-6 offset-2">
      <div class="card">
        <div class="card-header">
          <h3>Create Post</h3>
        </div>
        <div class="card-body">
          <form class="row g-3" method="post">
            <div class="col-md-12">
              <label for="title" class="form-label">Title:</label>
<<<<<<< HEAD
              <input type="text" class="form-control" id="title" name="title" placeholder="Enter a title">
=======
              <input type="text" class="form-control" id="title" name="title" placeholder="Enter a title" required>
>>>>>>> c2ec224c93bc028ff8aca4414f91f69aa5ac17b2
              <span class="text-danger"> <?php echo $errorTitle ?></span>
            </div>
            <div class="col-md-12">
              <label for="content" class="form-label">Content:</label>
<<<<<<< HEAD
              <textarea class="form-control" id="content" rows="3" name="content"></textarea>
=======
              <textarea class="form-control" id="content" rows="3" name="content" required></textarea>
>>>>>>> c2ec224c93bc028ff8aca4414f91f69aa5ac17b2
              <span class="text-danger"> <?php echo $errorContent ?></span>
            </div>
            <div class="col-12">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="isPublish" name="isPublish">
                <label class="form-check-label" for="isPublish">
                  Publish:
                </label>
              </div>
            </div>
            <div class="col-12">
              <a href="index.php" class="btn btn-secondary col-3">Back</a>
              <button type="submit" class="btn btn-primary col-3 offset-5" name="btnCreate">Create</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>