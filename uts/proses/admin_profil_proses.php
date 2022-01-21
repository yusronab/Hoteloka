<?php

include('../util/connection.php');

if(isset($_POST['submit'])){
    $id_admin = $_POST['id_admin'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $updated_at = date('Y-m-d H:i:s');
    include('../util/file.php');

    $select_data = oci_parse($connection, "SELECT * FROM TB_ADMIN WHERE ID_ADMIN='$id_admin'");
    oci_execute($select_data);
    $row = oci_fetch_array($select_data);
    $gambar_lama = $row['GAMBAR'];

    $statement = oci_parse($connection,"UPDATE TB_ADMIN SET USERNAME='$username', PASSWORD='$password', UPDATED_AT=TO_DATE('$updated_at','yyyy-mm-dd hh24:mi:ss'), GAMBAR='$upload' WHERE ID_ADMIN='$id_admin'");
    $statement2 = oci_parse($connection,"UPDATE TB_ADMIN SET USERNAME='$username', PASSWORD='$password', UPDATED_AT=TO_DATE('$updated_at','yyyy-mm-dd hh24:mi:ss') WHERE ID_ADMIN='$id_admin'");

    if(move_uploaded_file($_FILES['gambar']['tmp_name'],$newfile)) {
        if($uploadOk == 1) {
            unlink($file_path.$gambar_lama);
            if(oci_execute($statement)) {
                $_SESSION['message'] = '<div class="alert alert-success" role="alert">Ubah Data Sukses</div>';
                header('location:../admin_hotel.php');
            }  
        }else{
            $_SESSION['message'] = '<div class="alert alert-danger" role="alert">Ubah Data Gagal1</div>';
            header('location:../admin_profil.php');
        }
    }else{
        if(oci_execute($statement2)) {
            $_SESSION['message'] = '<div class="alert alert-success" role="alert">Ubah Data Sukses</div>';
            header('location:../admin_hotel.php?');
        }else{
            $_SESSION['message'] = '<div class="alert alert-danger" role="alert">Ubah Data Gagal'.$upload.$newfile.$removeExtension.$uploadOk.'</div>';
            header('location:../admin_profil.php');
        }
    }
}

?>