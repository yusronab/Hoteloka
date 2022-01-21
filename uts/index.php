<?php

include('util/connection.php');
if (!$_SESSION['user_login']) {
    header("location: login.php");
}
$statement = oci_parse($connection, "SELECT * FROM TB_HOTEL WHERE DEL_FLAGE = 0");
oci_execute($statement);

$get_data = oci_parse($connection, "SELECT * FROM TB_USER WHERE ID_USER =".$_SESSION['user_id']);
oci_execute($get_data);
$row = oci_fetch_array($get_data);
$_SESSION['user_gambar'] = $row['GAMBAR'];
$_SESSION['user_nama'] = $row['NAMA'];
$_SESSION['user_username'] = $row['USERNAME'];
$_SESSION['user_email'] = $row['EMAIL'];

$ulasan = oci_parse($connection, "SELECT * FROM TB_TRANSAKSI INNER JOIN TB_USER ON TB_USER.ID_USER = TB_TRANSAKSI.ID_USER");
oci_execute($ulasan);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include('util/head.php') ?>
</head>

<body>
  
  <?php include('util/navbar.php'); ?>

  <section>
  <div id="carouselExampleCaptions" class="carousel slide mb-5" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="./assets/Desktop - 8.png" class="d-block w-100" alt="...">
          <div class="carousel-caption">
            <h5>First slide label</h5>
            <p class="d-none d-sm-block d-md-block">Some representative placeholder content for the first slide.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="./assets/Desktop - 9.png" class="d-block w-100" alt="...">
          <div class="carousel-caption">
            <h5>Second slide label</h5>
            <p>Some representative placeholder content for the second slide.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="./assets/Desktop - 7.png" class="d-block w-100" alt="...">
          <div class="carousel-caption">
            <h5>Third slide label</h5>
            <p>Some representative placeholder content for the third slide.</p>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </section>

  <main>
    <section class="section-1">
      <div class="container">
        <form class="custom-form col-md-12 m-auto shadow p-3 mb-5 bg-white rounded" style="width: 70%;" action="pencarian.php" method="POST">
          <div class="form-group">
            <label for="nama_hotel">Nama Hotel</label>
            <input type="text" class="form-control" id="nama_hotel" name="nama_hotel" placeholder="Ketik nama hotel..." autocomplete="off">
          </div>
          <div class="form-row">
            <div class="form-group col-12 col-md-4">
              <label for="inputCity">Check-In</label>
              <input type="date" class="form-control" id="inputCity">
            </div>
            <div class="form-group col-12 col-md-4">
              <label for="inputState">Durasi</label>
              <select id="inputState" class="form-control">
                <option selected>Pilih...</option>
                <option>1 Malam</option>
                <option>2 Malam</option>
                <option>3 Malam</option>
                <option>4 Malam</option>
                <option>5 Malam</option>
                <option>6 Malam</option>
                <option>7 Malam</option>
              </select>
            </div>
            <div class="form-group col-12 col-md-4">
              <label for="inputCity">Check-Out</label>
              <input class="form-control" id="disabledInput" type="text" placeholder="dd/mm/yyyy" disabled>
            </div>
          </div>
          <div class="form-group">
            <label for="lokasi">Lokasi Kota Tujuan atau Hotel</label>
            <input type="text" class="form-control" id="lokasi" name="lokasi" placeholder="Ketik lokasi..." autocomplete="off">
          </div>
          <div class="form-group">
            <label for="harga">Kisaran Harga per Malam</label>
            <input type="number" class="form-control" id="harga" name="harga" placeholder="Ketik batasan harga..." autocomplete="off">
          </div>
          <input type="submit" name="cari" class="btn w-100" value="Cek Ketersediaan" style="background: teal; color: white;">
        </form>
      </div>
    </section>

    <section class="section-2 mt-5 mb-5">
      <div class="container">
        <div class="col-md-12">
          <h3>Daftar Hotel</h3>
          <p>Akomodasi dengan standar protokol kesehatan</p>
          <hr color="black" size="2" width="45%" align="left" class="mb-4">
        </div>
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
          <div class="car-section-2 carousel-inner">
            <div class="carousel-item active">
              <div class="card-deck">
                <?php $no=1; while($no <= 4): ?>
                  <?php $row = oci_fetch_array($statement) ?>
                  <?php if($no > 1): ?>
                    <div class="card d-none d-sm-block d-md-block">
                      <img src="img/<?= $row['GAMBAR']; ?>" class="card-img-top">
                      <div class="hotel-card-body card-body">
                        <h5 class="card-title"><?= $row['NAMA']; ?></h5>
                        <p class="card-text"><?= $row['DESKRIPSI']; ?></p>
                        <p class="text-muted">Rp <?= $row['HARGA']; ?></p>
                        <a href="detail.php?id=<?= $row['ID_HOTEL']; ?>" class="btn" style="background: teal; color: white;">Lihat Detail</a>
                      </div>
                    </div>
                  <?php else: ?>
                    <div class="card">
                      <img src="img/<?= $row['GAMBAR']; ?>" class="card-img-top">
                      <div class="hotel-card-body card-body">
                        <h5 class="card-title"><?= $row['NAMA']; ?></h5>
                        <p class="card-text"><?= $row['DESKRIPSI']; ?></p>
                        <p class="text-muted">Rp <?= $row['HARGA']; ?></p>
                        <a href="detail.php?id=<?= $row['ID_HOTEL']; ?>" class="btn" style="background: teal; color: white;">Lihat Detail</a>
                      </div>
                    </div>
                  <?php endif; $no++; ?>
                <?php endwhile; ?>
              </div>
            </div>
            <div class="carousel-item">
              <div class="card-deck">
                <?php $no=1; while($no <= 4): ?>
                  <?php if($no > 1): ?>
                    <div class="card d-none d-sm-block d-md-block">
                      <img src="img/<?= $row['GAMBAR']; ?>" class="card-img-top">
                      <div class="hotel-card-body card-body">
                        <h5 class="card-title"><?= $row['NAMA']; ?></h5>
                        <p class="card-text"><?= $row['DESKRIPSI']; ?></p>
                        <p class="text-muted">Rp <?= $row['HARGA']; ?></p>
                        <a href="detail.php?id=<?= $row['ID_HOTEL']; ?>" class="btn" style="background: teal; color: white;">Lihat Detail</a>
                      </div>
                    </div>
                  <?php else: ?>
                    <div class="card">
                      <img src="img/<?= $row['GAMBAR']; ?>" class="card-img-top">
                      <div class="hotel-card-body card-body">
                        <h5 class="card-title"><?= $row['NAMA']; ?></h5>
                        <p class="card-text"><?= $row['DESKRIPSI']; ?></p>
                        <p class="text-muted">Rp <?= $row['HARGA']; ?></p>
                        <a href="detail.php?id=<?= $row['ID_HOTEL']; ?>" class="btn" style="background: teal; color: white;">Lihat Detail</a>
                      </div>
                    </div>
                  <?php endif; $no++; ?>
                <?php endwhile; ?>
              </div>
            </div>
          </div>
          <a class="hotel-prev carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="hotel-next carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>

      </div>
    </section>

    <section class="section-3 mt-5 mb-5" id="section-3">
      <div class="container">
        <div class="col-12 col-sm-12 col-md-12">
          <h3>Mengapa harus Hoteloka?</h3>
          <p>Akomodasi dengan standar protokol kesehatan</p>
          <hr color="black" size="2" width="45%" align="left" class="mb-4">
        </div>
        <div class="row">
          <div class="col-12 col-sm-12 col-md-6">
            <div class="card mb-3" style="border: none;">
              <div class="row no-gutters">
                <div class="col-4 col-sm-4 col-md-4">
                  <img src="./assets/why1.png" alt="...">
                </div>
                <div class="col-12 col-sm-8 col-md-8">
                  <div class="card-body">
                    <h5 class="card-title">Berbagai Opsi Pembayaran</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                      incididunt ut labore et dolore magna aliqua.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-12 col-md-6">
            <div class="card mb-3" style="border: none;">
              <div class="row no-gutters">
                <div class="col-12 col-sm-4 col-md-4">
                  <img src="./assets/why2.png" alt="...">
                </div>
                <div class="col-12 col-sm-8 col-md-8">
                  <div class="card-body">
                    <h5 class="card-title">Diskon Khusus</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                      incididunt ut labore et dolore magna aliqua.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12 col-sm-12 col-md-6">
            <div class="card mb-3" style="border: none;">
              <div class="row no-gutters">
                <div class="col-12 col-sm-4 col-md-4">
                  <img src="./assets/why5.png" alt="...">
                </div>
                <div class="col-12 col-sm-8 col-md-8">
                  <div class="card-body">
                    <h5 class="card-title">Ulasan Tamu Nyata</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                      incididunt ut labore et dolore magna aliqua.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-12 col-md-6">
            <div class="card mb-3" style="border: none;">
              <div class="row no-gutters">
                <div class="col-12 col-sm-4 col-md-4">
                  <img src="./assets/why4.png" alt="...">
                </div>
                <div class="col-12 col-sm-8 col-md-8">
                  <div class="card-body">
                    <h5 class="card-title">StayGuarantee</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                      incididunt ut labore et dolore magna aliqua.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="section-4 mt-5 mb-5">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h3>Ulasan Kepuasan Pelanggan Terbaru</h3>
            <p>Akomodasi dengan standar protokol kesehatan</p>
            <hr color="black" size="2" width="45%" align="left" class="mb-4">
          </div>

          <?php $noul=1; while($noul <= 4): ?>
            <?php $row = oci_fetch_array($ulasan) ?>
            <?php if($row['ULASAN'] != NULL): ?>
              <div class="col-12 col-sm-6 col-md-3 text-center">
              <div class="card shadow-sm mb-3 bg-white rounded" style="height: 500px;">
                <div class="card-img-top">
                  <img src="img/<?= $row['GAMBAR']; ?>" class="rounded w-100">
                </div>
                <div class="card-body">
                  <h5><?= $row['NAMA_PESAN'] ?></h5>
                  <hr>
                  <p class="card-text"><?= $row['ULASAN'] ?></p>
                </div>
                <div class="card-footer">
                  <p class="text-black-50">@<?= $row['USERNAME'] ?></p>
                </div>
              </div>
            </div>
            <?php endif; $noul++?>
          <?php endwhile; ?>

        </div>
      </div>
    </section>

  </main>
  
  <?php include('util/footer.php') ?>
  <?php include('util/js.php') ?>

</body>

</html>