<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Directory and Upload Files</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
   rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5" >

      <div class="row mb-5">
        <div class="col-6 offset-2">
          <h5>Create Directory and Upload Files</h5>
          <form action="upload.php" method="post" enctype="multipart/form-data">
            <label for="dirname">Folder Name:</label>
            <input type="text" name="dirname" id="dirname" class="form-control" required >
            <br>
            <label for="file">Select File:</label>
            <input type="file" name="file" id="file" class="form-control" required>
            <br>
            <input type="submit" value="Upload" class="btn btn-success" name="btnUpload">
          </form>
        </div>
      </div>
    </div>
</body>
<?php
     $folders = scandir('./');
        foreach ($folders as $folder) {
          if (is_dir($folder) && $folder != '.' && $folder != '..' && $folder !='../' && $folder!='css' ) {
              $files = scandir($folder);
                  foreach ($files as $file) {
                      if (is_file("$folder/$file")) {
                        echo "<span class='col-3 d-block mt-3 ms-5'>
                                  <img src='$folder/$file' class='img-thumbnail d-inline' >
                                  <span class='d-inline'>$file</span>
                                  <button class='btn btn-danger d-block col-12'>Delete</button>
                                </span>";
                        
                      }
                }
              }
        }
?>
</html>