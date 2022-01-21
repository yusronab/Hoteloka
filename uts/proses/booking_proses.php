<?php

include('../util/connection.php');

if(isset($_POST['submit'])){
    $id_hotel = $_POST['id_hotel'];
    $id_user = $_POST['id_user'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $no_hp = $_POST['no_hp'];
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];
    $created_at = date('Y-m-d H:i:s');
    $del_flage = 0;

    $statement = oci_parse($connection, "INSERT INTO TB_TRANSAKSI(CREATED_AT, ID_USER, ID_HOTEL, CHECKOUT, CHECKIN, NAMA_PESAN, DEL_FLAGE_TRANS, NO_HP, EMAIL) VALUES
    (to_date('$created_at', 'yyyy-mm-dd hh24:mi:ss'),'$id_user', '$id_hotel', to_date('$checkout', 'yyyy-mm-dd hh24:mi:ss'), to_date('$checkin', 'yyyy-mm-dd hh24:mi:ss'), '$nama','$del_flage','$no_hp','$email')");
    
    if(oci_execute($statement)){
        $_SESSION['message'] = '<div class="alert alert-success" role="alert">Berhasil Menambahkan Data</div>';
        header("location:../index.php");
    } else {
        $_SESSION['message'] = '<div class="alert alert-danger" role="alert">Gagal Menambahkan Data</div>';
        header("location:../booking.php");
    }

}

?>