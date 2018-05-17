<?php
 
// Hàm điều hướng trang
class Redirect {
    public function __construct($url = null) {
        if ($url)
        {
            echo '<script>location.href="'.$url.'";</script>';
        }
    }
}

class UploadImage {
    private $check;
    public function get_check() {
        return $this->check;
    }
    public function __construct($name = null) {
        $target_dir = "../images/";
        $target_file = $target_dir . basename($_FILES[$name]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES[$name]["tmp_name"]);
            if($check !== false) {
                echo "File ".basename($_FILES[$name]["name"]). " is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File " .basename($_FILES[$name]["name"])." is not an image.";
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file " .basename($_FILES[$name]["name"])." already exists.";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES[$name]["size"] > 5000000) {
            echo "Sorry, your file ".basename($_FILES[$name]["name"]). " is too large.";
            // print_r($_FILES[$name]["size"]);
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
            echo "Sorry, your file ".basename($_FILES[$name]["name"]). " was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES[$name]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES[$name]["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file ".basename($_FILES[$name]["name"]). " ";
            }
        }
        if($uploadOk == 0 ){
            $this->check = $uploadOk;
        } else {
            $this->check = $target_file;
        }
    }
}


 
?>