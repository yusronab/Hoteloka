<?php

include('../util/connection.php');

if(isset($_POST['submit'])){
    $id_user = $_POST['id_user'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $updated_at = date('Y-m-d H:i:s');
    include('../util/file.php');

    $select_data = oci_parse($connection, "SELECT * FROM TB_USER WHERE ID_USER='$id_user'");
    oci_execute($select_data);
    $row = oci_fetch_array($select_data);
    $gambar_lama = $row['GAMBAR'];

    $statement = oci_parse($connection,"UPDATE TB_USER SET NAMA='$nama', USERNAME='$username', EMAIL='$email', PASSWORD='$password', UPDATED_AT=TO_DATE('$updated_at','yyyy-mm-dd hh24:mi:ss'), GAMBAR='$upload' WHERE ID_USER='$id_user'");
    $statement2 = oci_parse($connection,"UPDATE TB_USER SET NAMA='$nama', USERNAME='$username', EMAIL='$email', PASSWORD='$password', UPDATED_AT=TO_DATE('$updated_at','yyyy-mm-dd hh24:mi:ss') WHERE ID_USER='$id_user'");

    if(move_uploaded_file($_FILES['gambar']['tmp_name'],$newfile)) {
        if($uploadOk == 1) {
            unlink($file_path.$gambar_lama);
            if(oci_execute($statement)) {
                $_SESSION['message'] = '<div class="alert alert-success" role="alert">Ubah Data User Sukses1</div>';
                header('location:../admin_user.php');
            }  
        }else{
            $_SESSION['message'] = '<div class="alert alert-danger" role="alert">Ubah Data Gagal1</div>';
            header('location:../user_ubah.php');
        }
    }else{
        if(oci_execute($statement2)) {
            $_SESSION['message'] = '<div class="alert alert-success" role="alert">Ubah Data Sukses2</div>';
            header('location:../admin_user.php?');
        }else{
            $_SESSION['message'] = '<div class="alert alert-danger" role="alert">Ubah Data Gagal'.$upload.$newfile.$removeExtension.$uploadOk.'</div>';
            header('location:../user_ubah.php');
        }
    }
}

?>