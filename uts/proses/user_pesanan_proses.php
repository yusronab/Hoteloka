<?php

include('../util/connection.php');

if(isset($_POST['batal'])){
    $id_transaksi = $_POST['id_transaksi'];
    $updated_at = date('Y-m-d H:i:s');
    $del_flage_trans = 1;

    $statement = oci_parse($connection,"UPDATE TB_TRANSAKSI SET UPDATED_AT=TO_DATE('$updated_at','yyyy-mm-dd hh24:mi:ss'), DEL_FLAGE_TRANS='$del_flage_trans' WHERE ID_TRANSAKSI='$id_transaksi'");
    if(oci_execute($statement)) {
        $_SESSION['message'] = '<div class="alert alert-success" role="alert">Pemesanan Berhasil Dibatalkan</div>';
        header('location:../user_pemesanan.php');
    } else {
        $_SESSION['message'] = '<div class="alert alert-danger" role="alert">Ubah Data Gagal'.$upload.$newfile.$removeExtension.$uploadOk.'</div>';
        header('location:../user_profil.php');
    }

} elseif(isset($_POST['selesai'])){
    $id_transaksi = $_POST['id_transaksi'];
    $updated_at = date('Y-m-d H:i:s');
    $del_flage_trans = 2;

    $statement = oci_parse($connection,"UPDATE TB_TRANSAKSI SET UPDATED_AT=TO_DATE('$updated_at','yyyy-mm-dd hh24:mi:ss'), DEL_FLAGE_TRANS='$del_flage_trans' WHERE ID_TRANSAKSI='$id_transaksi'");
    if(oci_execute($statement)) {
        $_SESSION['message'] = '<div class="alert alert-success" role="alert">Pemesanan Telah Selesai</div>';
        header('location:../user_pemesanan.php');
    } else {
        $_SESSION['message'] = '<div class="alert alert-danger" role="alert">Ubah Data Gagal'.$upload.$newfile.$removeExtension.$uploadOk.'</div>';
        header('location:../user_profil.php');
    }
} elseif(isset($_POST['kirim'])){
    $id_transaksi = $_POST['id_transaksi'];
    $updated_at = date('Y-m-d H:i:s');
    $ulasan = $_POST['ulasan'];

    $statement = oci_parse($connection,"UPDATE TB_TRANSAKSI SET UPDATED_AT=TO_DATE('$updated_at','yyyy-mm-dd hh24:mi:ss'), ULASAN='$ulasan' WHERE ID_TRANSAKSI='$id_transaksi'");
    if(oci_execute($statement)) {
        $_SESSION['message'] = '<div class="alert alert-success" role="alert">Ulasan Telah Terkirim</div>';
        header('location:../user_pemesanan.php');
    } else {
        $_SESSION['message'] = '<div class="alert alert-danger" role="alert">Ubah Data Gagal'.$upload.$newfile.$removeExtension.$uploadOk.'</div>';
        header('location:../user_profil.php');
    }
}

?>