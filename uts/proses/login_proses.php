<?php

include('../util/connection.php');
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $statement_admin = oci_parse($connection, "SELECT * FROM TB_ADMIN WHERE USERNAME='$username' and PASSWORD='$password'");
    oci_execute($statement_admin);
    $row = oci_fetch_array($statement_admin);

    $statement_user = oci_parse($connection, "SELECT * FROM TB_USER WHERE USERNAME='$username' and PASSWORD='$password'");
    oci_execute($statement_user);
    $row_user = oci_fetch_array($statement_user);

    $cek_admin = oci_num_rows($statement_admin);
    $cek_user = oci_num_rows($statement_user);

    if($cek_admin > 0){
        $_SESSION['admin_id'] = $row['ID_ADMIN'];
        $_SESSION['admin_username'] = $row['USERNAME'];
        $_SESSION['admin_gambar'] = $row['GAMBAR'];
        $_SESSION['admin_password'] = $row['PASSWORD'];
        $_SESSION['admin_login'] = true;
        header("location:../admin_hotel.php");
    } elseif($cek_user > 0){
        $_SESSION['user_id'] = $row_user['ID_USER'];
        $_SESSION['user_nama'] = $row_user['NAMA'];
        $_SESSION['user_username'] = $row_user['USERNAME'];
        $_SESSION['user_email'] = $row_user['EMAIL'];
        $_SESSION['user_gambar'] = $row_user['GAMBAR'];
        $_SESSION['user_login'] = true;
        header("location:../index.php");
    } else {
        header("location:../login.php?pesan=gagal3.$cek_user.$username.$password.");
    }

} else {
    die("Akses Dilarang...");
}

?>