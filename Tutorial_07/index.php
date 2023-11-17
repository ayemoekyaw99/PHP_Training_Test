<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Generate QR Code</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
   rel="stylesheet" 
   integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
    crossorigin="anonymous">
</head>
<body>
<div class="container mt-5" >
  <div class="row mb-5">
    <div class="col-6 offset-2">
        <form action="" method="post" enctype="multipart/form-data">
          <div class="card">
            <h5 class="card-header text-center">QR Code Generator</h5>
            <div class="card-body">
            <label for="text">QR Name:</label>
            <input type="text" name="text" id="text" class="form-control" required >
            <input type="submit" value="Generate" class="btn btn-primary col-12 mt-3" name="btnGenerate">
          </div>
        </form>
    </div>
  </div>
</div>

<?php
    include('./libs/qrlib.php');
    if (isset($_POST["btnGenerate"])) {
      if (isset($_POST['text'])) {
        $text = $_POST['text'];
        $filename = $_POST['text'].'.png';
        $imageFolder = 'images/';
        if (!is_dir($imageFolder)) {
            mkdir($imageFolder, 0755, true);
        }
        if (!file_exists($imageFolder.$filename)) {
          QRcode::png($text, $imageFolder.$filename);
          echo "<img src='$imageFolder$filename' alt='QR Code'>";
        } else {
          echo 'File already generated!';
      }
    }
    }
    ?>
    <?php 
       if (isset($_POST["btnGenerate"])) {
        echo"<h3>QR List</h3>";
        $folders = scandir('./');
            foreach ($folders as $folder) {
                if (($folder=='images') && $folder != '.' && $folder != '..' && $folder !='../') {
                    $files = scandir($folder);
                    foreach ($files as $file) {
                        if (is_file("$folder/$file")) {
                            echo "
                                <span class='col-3 d-inline'>
                                  <img src='$folder/$file' class='d-inline'>
                                  <span class='d-inline'>$file</span>
                                </span>"; 
                        }
                    }
                }
            }
       }
    ?>
</body>

</html>