<?php

include('util/connection.php');
if (!$_SESSION['user_login']) {
    header("location: login.php");
}
$id_user = $_SESSION['user_id'];
$get_data = oci_parse($connection, "SELECT * FROM TB_TRANSAKSI 
INNER JOIN TB_HOTEL ON TB_HOTEL.ID_HOTEL = TB_TRANSAKSI.ID_HOTEL WHERE TB_TRANSAKSI.ID_USER ='$id_user' ORDER BY TB_TRANSAKSI.ID_TRANSAKSI DESC");
oci_execute($get_data);

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
                <h2>Riwayat Pemesanan <?php echo $_SESSION['user_nama']; ?></h2>
                <?php if(!empty($_SESSION['message'])){
                    echo $_SESSION['message'];
                    $_SESSION['message'] = null;
                }
                ?>
            </div>
            <?php while($row = oci_fetch_array($get_data)): ?>
                <?php if($row['DEL_FLAGE_TRANS'] == 0): ?>
                    <div class="card mt-5 mb-5" style="border: 2px solid teal;">
                        <form action="proses/user_pesanan_proses.php" method="POST">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-7">
                                        <input type="hidden" class="form-control" id="id_transaksi" name="id_transaksi" value="<?php echo $row['ID_TRANSAKSI']; ?>" placeholder="contoh" required>
                                        <h3 class="card-title"><?= $row['NAMA']; ?></h3>
                                        <p class="text-muted">Tanggal Pemesanan: <?= $row['CREATED_AT'] ?></p>
                                        <p>Nama Pemesan: <?= $row['NAMA_PESAN']; ?></p>
                                        <p>Check-In: <?= $row['CHECKIN']; ?></p>
                                        <p>Check-In: <?= $row['CHECKOUT']; ?></p>
                                        <p class="card-title" style="color: teal; font-weight:bold;"><i class="bi bi-info-circle-fill mr-2 fa-fw"></i>Segera Selesaikan Pemesanan</p>
                                    </div>
                                    <div class="col-md-5 text-right">
                                        <input type="submit" name="batal" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin?')" value="Batalkan Pemesanan">
                                        <input type="submit" name="selesai" class="btn btn-primary" onclick="return confirm('Apakah Anda Yakin?')" value="Selesai">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                <?php elseif($row['DEL_FLAGE_TRANS'] == 1): ?>
                    <div class="card mt-5 mb-5">
                        <form action="proses/user_pesanan_proses.php" method="POST">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-7">
                                        <input type="hidden" class="form-control" id="id_transaksi" name="id_transaksi" value="<?php echo $row['ID_TRANSAKSI']; ?>" placeholder="contoh" required>
                                        <h3 class="card-title"><?= $row['NAMA']; ?></h3>
                                        <p class="text-muted">Tanggal Pemesanan: <?= $row['CREATED_AT'] ?></p>
                                        <p>Nama Pemesan: <?= $row['NAMA_PESAN']; ?></p>
                                        <p>Check-In: <?= $row['CHECKIN']; ?></p>
                                        <p>Check-In: <?= $row['CHECKOUT']; ?></p>
                                        <p class="text-danger">Pemesanan Telah Dibatalkan</p>
                                    </div>
                                    <div class="col-md-5 text-right">
                                        <input type="submit" name="selesai" class="btn btn-primary" onclick="return confirm('Apakah Anda Yakin?')" value="Selesai">
                                        <!-- modal -->
                                        <div class="modal fade" id="staticBackdrop1" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">Bagaimana dengan Hotel ini?</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="ulasan" name="ulasan" placeholder="Ketik sesuatu disini..." required>
                                                        <p class="mt-3 mb-3 text-muted">Ulasan Anda Sebelumnya</p>
                                                        <p style="border: 1px solid teal; border-radius: 5px;" class="p-2"><i><?= $row['ULASAN']; ?></i></p>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="submit" name="hapus_ulasan" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin?')" value="Hapus Ulasan">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                    <input type="submit" name="kirim" class="btn btn-success" onclick="return confirm('Apakah Anda Yakin?')" value="Kirim Ulasan">
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end -->
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="card-footer">
                            <button class="btn btn-secondary w-100" data-toggle="modal" data-target="#staticBackdrop1">Beri Ulasan</button>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="card mt-5 mb-5">
                        <form action="proses/user_pesanan_proses.php" method="POST">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-7">
                                        <input type="hidden" class="form-control" id="id_transaksi" name="id_transaksi" value="<?php echo $row['ID_TRANSAKSI']; ?>" placeholder="contoh" required>
                                        <h3 class="card-title"><?= $row['NAMA']; ?></h3>
                                        <p class="text-muted">Tanggal Pemesanan: <?= $row['CREATED_AT'] ?></p>
                                        <p>Nama Pemesan: <?= $row['NAMA_PESAN']; ?></p>
                                        <p>Check-In: <?= $row['CHECKIN']; ?></p>
                                        <p>Check-In: <?= $row['CHECKOUT']; ?></p>
                                        <p class="text-primary">Pemesanan Telah Selesai</p>
                                    </div>
                                    <!-- modal -->
                                    <div class="modal fade" id="staticBackdrop2" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Bagaimana dengan Hotel ini?</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="ulasan" name="ulasan" placeholder="Ketik sesuatu disini..." required>
                                                    <p class="mt-3 mb-3 text-muted text-right">Ulasan Anda Sebelumnya</p>
                                                    <p style="border: 1px solid teal; border-radius: 5px;" class="p-2 text-right"><i><?= $row['ULASAN']; ?></i></p>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <input type="submit" name="hapus_ulasan" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin?')" value="Hapus Ulasan">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                <input type="submit" name="kirim" class="btn btn-success" onclick="return confirm('Apakah Anda Yakin?')" value="Kirim Ulasan">
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end -->
                                </div>
                            </div>
                        </form>
                        <div class="card-footer">
                            <button class="btn btn-secondary w-100" data-toggle="modal" data-target="#staticBackdrop2">Beri Ulasan</button>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endwhile; ?>
        </div>
    </section>

    <?php include('util/js.php') ?>

</body>
</html>