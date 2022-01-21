<?php

include('../util/connection.php');

if(isset($_POST['submit'])){
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $created_at = date('Y-m-d H:i:s');
    $del_flage = 0;
    $statement = oci_parse($connection, "INSERT INTO TB_USER(NAMA, USERNAME, EMAIL, PASSWORD, CREATED_AT, DEL_FLAGE) VALUES
    ('$nama','$username', '$email', '$password', to_date('$created_at', 'yyyy-mm-dd hh24:mi:ss'), '$del_flage')");
    if(oci_execute($statement)){
        $_SESSION['message'] = '<div style="color: teal;">Registrasi Berhasil<span style="color: teal; float: right; cursor: pointer;" onclick="this.parentElement.style.display="none";">&times;</span></div>';
        header("location:../login.php");
    } else {
        $_SESSION['message'] = '<div style="color: red;">Registrasi Berhasil<span style="color: red; float: right; cursor: pointer;" onclick="this.parentElement.style.display="none";">&times;</span></div>';
        header("location:../login.php");
    }
}

?>