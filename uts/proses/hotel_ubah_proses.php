<?php

include('../util/connection.php');

if(isset($_POST['submit'])){
    $id_hotel = $_POST['id_hotel'];
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];
    $lokasi = $_POST['lokasi'];
    $updated_at = date('Y-m-d H:i:s');
    include('../util/file.php');

    $select_data = oci_parse($connection, "SELECT * FROM TB_HOTEL WHERE ID_HOTEL='$id_hotel'");
    oci_execute($select_data);
    $row = oci_fetch_array($select_data);
    $gambar_lama = $row['GAMBAR'];

    $statement = oci_parse($connection,"UPDATE TB_HOTEL SET NAMA='$nama', HARGA='$harga', DESKRIPSI='$deskripsi', LOKASI=upper('$lokasi'), UPDATED_AT=TO_DATE('$updated_at','yyyy-mm-dd hh24:mi:ss'), GAMBAR='$upload' WHERE ID_HOTEL='$id_hotel'");
    $statement2 = oci_parse($connection,"UPDATE TB_HOTEL SET NAMA='$nama', HARGA='$harga', DESKRIPSI='$deskripsi', LOKASI=upper('$lokasi'), UPDATED_AT=TO_DATE('$updated_at','yyyy-mm-dd hh24:mi:ss') WHERE ID_HOTEL='$id_hotel'");

    if(move_uploaded_file($_FILES['gambar']['tmp_name'],$newfile)) {
        if($uploadOk == 1) {
            unlink($file_path.$gambar_lama);
            if(oci_execute($statement)) {
                $_SESSION['message'] = '<div class="alert alert-success" role="alert">Ubah Data Sukses1</div>';
                header('location:../admin_hotel.php');
            }  
        }else{
            $_SESSION['message'] = '<div class="alert alert-danger" role="alert">Ubah Data Gagal1</div>';
            header('location:../hotel_ubah.php');
        }
    }else{
        if(oci_execute($statement2)) {
            $_SESSION['message'] = '<div class="alert alert-success" role="alert">Ubah Data Sukses2</div>';
            header('location:../admin_hotel.php?');
        }else{
            $_SESSION['message'] = '<div class="alert alert-danger" role="alert">Ubah Data Gagal'.$upload.$newfile.$removeExtension.$uploadOk.'</div>';
            header('location:../hotel_ubah.php');
        }
    }
}

?>