<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dirname = $_POST["dirname"];

    if (!file_exists($dirname)) {
        mkdir($dirname, 0777, true);
    }

    if (isset($_FILES["file"])) {
        $target_dir = $dirname . '/';
        $target_file = $target_dir . basename($_FILES["file"]["name"]);

        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            echo "File uploaded successfully.";
        } else {
            echo "Error uploading file.";
        }
    } else {
        echo "No file selected for upload.";
    }
}
?>                                                                                                                                                                        
