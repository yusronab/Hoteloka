<?php

include('../util/connection.php');

if(isset($_POST['submit'])){
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $created_at = date('Y-m-d H:i:s');
    $del_flage = 0;

    include('../util/file.php');

    $statement = oci_parse($connection, "INSERT INTO TB_USER(NAMA, USERNAME, EMAIL, PASSWORD,  CREATED_AT, DEL_FLAGE, GAMBAR) VALUES
    ('$nama','$username', '$email', '$password', to_date('$created_at', 'yyyy-mm-dd hh24:mi:ss'), '$del_flage', '$upload')");
    
    if(!file_exists($newfile)) {
        if($uploadOk == 1) {  
            move_uploaded_file($_FILES['gambar']['tmp_name'],$newfile);
            if(oci_execute($statement)) {
                $_SESSION['message'] = '<div class="alert alert-success" role="alert">Tambah Data User Berhasil</div>';
                header('location:../admin_user.php');
            } else {
                $_SESSION['message'] = '<div class="alert alert-danger" role="alert">Upload Data Gagal / File Bukan Image</div>';
                header('location:../user_tambah.php');
            }
        }else{
            $_SESSION['message'] = '<div class="alert alert-danger" role="alert">Upload Data Gagal / File Bukan Image</div>';
            header('location:../user_tambah.php');
        }
    }else {
        $_SESSION['message'] = '<div class="alert alert-danger" role="alert">File Sudah Ada</div>';
        header('location:../user_tambah.php');
    }

}

?>