<?php

include('../util/connection.php');

if(isset($_POST['submit'])){
    $nama = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $lokasi = $_POST['lokasi'];
    $created_at = date('Y-m-d H:i:s');
    $del_flage = 0;

    include('../util/file.php');

    $statement = oci_parse($connection, "INSERT INTO TB_HOTEL(NAMA, GAMBAR, DESKRIPSI, CREATED_AT, DEL_FLAGE, HARGA, LOKASI) VALUES
    ('$nama','$upload', '$deskripsi', to_date('$created_at', 'yyyy-mm-dd hh24:mi:ss'), '$del_flage', '$harga', upper('$lokasi'))");
    
    if(!file_exists($newfile)) {
        if($uploadOk == 1) {  
            move_uploaded_file($_FILES['gambar']['tmp_name'],$newfile);
            if(oci_execute($statement)) {
                $_SESSION['message'] = '<div class="alert alert-success" role="alert">Upload Data Sukses</div>';
                header('location:../admin_hotel.php');
            } else {
                $_SESSION['message'] = '<div class="alert alert-danger" role="alert">Upload Data Gagal / File Bukan Image</div>';
                header('location:../hotel_tambah.php');
            }
        }else{
            $_SESSION['message'] = '<div class="alert alert-danger" role="alert">Upload Data Gagal / File Bukan Image</div>';
            header('location:../hotel_tambah.php');
        }
    }else {
        $_SESSION['message'] = '<div class="alert alert-danger" role="alert">File Sudah Ada</div>';
        header('location:../hotel_tambah.php');
    }

}

?>