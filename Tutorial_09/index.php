<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Post List</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
   integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
   crossorigin="anonymous">
</head>
<body>
  <div class="container mt-5">
      <a href="create.php" class="btn btn-primary col-1 offset-1">Create</a>
      <a href="graph.php" class="btn btn-primary col-1 offset-1">Graph</a>
  </div>
</body>
<?php 
      require_once 'database.php';
      // Check if the "Delete" button was clicked
      if (isset($_POST['delete'])) {
        $postIdToDelete = $_POST['post_id'];

        $deleteSql = "DELETE FROM posts WHERE id = $postIdToDelete";
        if ($conn->query($deleteSql) === true) {
          echo "<script>alert('Are you sure to delete');</script>";
        } else {
          echo "<script>alert('Error deleting post: " . $conn->error . "');</script>";
        }
      }
      $sql="SELECT * FROM posts";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        echo "<div class='container mt-5'>
                <div class='col-10 offset-1'>
                  <div class='card'>
                    <div class='card-header'>
                      <h3>Post List</h3>
                    </div>";

            echo "<table class='table table-striped'>
                    <thead>
                      <tr>
                        <th scope='col'>ID</th>
                        <th scope='col'>Title</th>
                        <th scope='col'>Content</th>
                        <th scope='col'>Is Published</th>
                        <th scope='col'>Created Date</th>
                        <th scope='col'>Actions</th>
                      </tr>   
                  </thead>";

                  echo "<tbody >";
                  while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>" . $row["id"] . "</td>
                        <td>" . $row["title"] . "</td>
                        <td>" . $row["content"] . "</td>
                        <td>" . ($row["is_published"] ? "Published" : "Unpublished") . "</td>
                        <td>" . $row["created_at"] . "</td>
                        <td>
                              <form method='POST' action=''>
                                  <input type='hidden' name='post_id' value='" . $row["id"] . "'>
                                  <input type='submit' name='delete' value='Delete' class='btn bg-danger text-white'>
                              </form>
                        </td>
                    </tr>";
                }
               echo "</tbody>";
               echo "</table>" ;
               echo "</div>";
               echo "</div>";
    } else {
        echo "No posts found.";
    }
  ?>
</html>