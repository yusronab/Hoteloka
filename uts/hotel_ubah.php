<?php

include('util/connection.php');
if (!$_SESSION['admin_login']) {
    header("location: login.php");
}
$statement = oci_parse($connection, "SELECT * FROM TB_HOTEL WHERE ID_HOTEL =".$_GET['id']);
oci_execute($statement);
while($row = oci_fetch_array($statement)){
    $id_hotel = $row['ID_HOTEL'];
    $nama = $row['NAMA'];
    $gambar = $row['GAMBAR'];
    $deskripsi = $row['DESKRIPSI'];
    $lokasi = $row['LOKASI'];
    $harga = $row['HARGA'];
}

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
    <link rel="stylesheet" href="css/admin_home.css">
</head>
<body>

    <?php include('util/sidebar.php'); ?>

    <div class="page-content p-5" id="content">
        <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4">
            <i class="bi bi-distribute-vertical mr-2 text-black"></i>
            <small class="text-uppercase font-weight-bold">Toggle</small>
        </button>

        <div class="pt-3">
            <h2>Detail Hotel</h2>
            <div class="card mt-5">
                <form action="proses/hotel_ubah_proses.php" method="POST" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="id_hotel" name="id_hotel" value="<?php echo $id_hotel; ?>" placeholder="contoh" required>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama; ?>" placeholder="Ketik username baru..." required>
                        </div>
                        <div class="form-group">
                            <label for="gambar">Foto</label>
                            <br><img src="img/<?php echo $gambar;?>" class="w-25 rounded img-thumbnail shadow-sm">
                            <input type="file" class="form-control p-2"  style="border:none" id="gambar" name="gambar" placeholder="Pilih file...">
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="number" class="form-control" id="harga" name="harga" value="<?php echo $harga; ?>" placeholder="Ketik harga baru..." required>
                        </div>
                        <div class="form-group">
                            <label for="lokasi">Lokasi</label>
                            <input type="text" class="form-control" id="lokasi" name="lokasi" value="<?php echo $lokasi; ?>" placeholder="Ketik lokasi baru..." required>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="<?php echo $deskripsi; ?>" placeholder="Ketik password baru..." required>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn" onclick="return confirm('Apakah Anda Yakin?')" style="background: teal; color: white;" value="Ubah Data">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php include('util/js.php'); ?>

</body>
</html>