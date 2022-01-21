<?php

include('util/connection.php');
if (!$_SESSION['admin_login']) {
    header("location: login.php");
}
$statement = oci_parse($connection, "SELECT * FROM TB_TRANSAKSI INNER JOIN TB_HOTEL ON TB_TRANSAKSI.ID_HOTEL = TB_HOTEL.ID_HOTEL");
oci_execute($statement);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hoteloka</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./css/admin_home.css">
</head>

<body>

    <?php include('util/sidebar.php'); ?>

    <!-- Page content holder -->
    <div class="page-content p-5 col-md-12" id="content">
        <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4">
            <i class="bi bi-distribute-vertical mr-2 text-black"></i>
            <small class="text-uppercase font-weight-bold">Toggle</small>
        </button>
        <div class="pt-3">
            <h2>Daftar Transaksi</h2>
            <div class="card-mt-5">
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th>No.</th>
                                <th>Tanggal Pemesanan</th>
                                <th>Nama Pemesan</th>
                                <th>Hotel Terpesan</th>
                                <th>Hari</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; while($row = oci_fetch_array($statement)): ?>
                                <tr>
                                    <td class="text-center"><?= $no++; ?></td>
                                    <td><?= $row['CREATED_AT'] ?></td>
                                    <td><?= $row['NAMA_PESAN']; ?></td>
                                    <td><?= $row['NAMA']; ?></td>
                                    <td><?= $row['EMAIL']; ?></td>
                                    <td class="text-center">
                                        <a href="user_ubah.php?id=<?= $row['ID_USER']; ?>" class="btn btn-primary">Ubah</a>
                                        <a href="user_delete.php?id=<?= $row['ID_USER']; ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?')">Hapus</a>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <?php include('util/js.php'); ?>

</body>

</html>