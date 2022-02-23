<?php
    function fileupload (string $key) {
        $basepath = DOC_ROOT . "/public";
        $target_dir = "/img/uploads/";
        $target_file = $basepath . $target_dir . basename($_FILES["$key"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        
        // Check if file already exists
        if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
        }
        
        // Check file size
        if ($_FILES["$key"]["size"] > 500000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
        }
        
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
        }
        
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
        if (move_uploaded_file($_FILES["$key"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["$key"]["name"])). " has been uploaded.";
            return $target_dir . basename( $_FILES[$key]["name"]);
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
        }
    }

?>