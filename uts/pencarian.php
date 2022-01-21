<?php

include('util/connection.php');
if (!$_SESSION['user_login']) {
    header("location: login.php");
}
if ($_POST['cari']){
    $nama_hotel = $_POST['nama_hotel'];
    $lokasi = $_POST['lokasi'];
    $harga = $_POST['harga'];

    $statement = oci_parse($connection, "SELECT * FROM TB_HOTEL WHERE NAMA LIKE '%$nama_hotel%' AND
    LOKASI LIKE upper('%$lokasi%') AND HARGA <=".$harga);
    oci_execute($statement);

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('util/head.php') ?>
</head>
<body>

    <?php include('util/navbar.php'); ?>

    <section>
        <div class="container">
            <div class="col-12 col-sm-12 col-md-12 mt-5 text-center">
                <h2>Hasil Pencarian</h2>
            </div>
            <?php while($row = oci_fetch_array($statement)): ?>
            <div class="card mt-5 mb-5" style="border: 2px solid teal;">
                <form action="proses/user_pesanan_proses.php" method="POST">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">
                                <input type="hidden" class="form-control" id="id_transaksi" name="id_transaksi" value="<?php echo $row['ID_TRANSAKSI']; ?>" placeholder="contoh" required>
                                <h3 class="card-title"><?= $row['NAMA']; ?></h3>
                                <p class="text-muted"><?= $row['HARGA'] ?></p>
                                <p><?= $row['LOKASI']; ?></p>
                                <p><?= $row['DESKRIPSI']; ?></p>
                            </div>
                            <div class="col-md-5">
                                <img src="img/<?= $row['GAMBAR']; ?>" class="w-100">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="detail.php?id=<?= $row['ID_HOTEL']; ?>" class="btn btn-primary">Lihat Detail</a>
                    </div>
                </form>
            </div>
            <?php endwhile; ?>
        </div>
    </section>

    <?php include('util/js.php') ?>

</body>
</html>