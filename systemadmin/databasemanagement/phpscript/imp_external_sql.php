<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

// Check if file already exists
if (file_exists($target_file)) {
        //unlink($target_file);
        $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 100*500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "sql") {
    echo "Sorry, Only SQL files allowed.";
    $uploadOk = 0;

}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    # code...


    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

?>