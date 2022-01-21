<?php
$file_path = "../img/";
$removeExtension = explode('.',basename($_FILES['gambar']['name']));
$newfile = ($file_path .date('m-d-Y_H-i-s').".$removeExtension[1]");
$upload = (date('m-d-Y_H-i-s').".$removeExtension[1]");
$uploadOk = 1;
$imageFileType = pathinfo($newfile,PATHINFO_EXTENSION);
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "webp" ) {
    echo "Hanya File JPG, JPEG, WEBP, PNG & GIF Yang Diperbolehkan.";
    $uploadOk = 0;
}
?>