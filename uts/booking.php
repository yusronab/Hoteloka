<?php

include('util/connection.php');
if (!$_SESSION['user_login']) {
    header("location: login.php");
}
$statement = oci_parse($connection, "SELECT * FROM TB_HOTEL WHERE ID_HOTEL =".$_GET['id']);
oci_execute($statement);
while($row = oci_fetch_array($statement)){
    $id_hotel = $row['ID_HOTEL'];
    $nama = $row['NAMA'];
    $gambar = $row['GAMBAR'];
    $deskripsi = $row['DESKRIPSI'];
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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="./css/style.css">
  <script src="https://kit.fontawesome.com/f9355065a6.js" crossorigin="anonymous"></script>
</head>

<body class="body-booking">

  <header style="background-color: white;">
    <div class="container p-0">
      <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="index.php" style="color: black;"><span class="mr-2">Hoteloka</span><i
            class="fas fa-door-open"></i></a>
      </nav>
    </div>
  </header>

  <main>
    <section class="section-1-booking">
      <div class="container mt-5 mb-3">
        <div class="row">
          <div class="col-md-12">
            <h3>Hotel Booking</h3>
            <p>Isi form dibawah untuk Pemesanan</p>
            <h5 class="mt-5">Informasi Anda</h5>
          </div>
        </div>
      </div>
    </section>

    <section class="section-2-booking">
      <div class="container">
        <div class="row row-cols-1 row-cols-md-2">
          <div class="col-md-8">
            <div class="card shadow rounded mb-3">
              <div class="card-body">
                <form action="proses/booking_proses.php" method="POST">
                  <div class="form-group">
                    <!-- id hotel dan id user -->
                    <input type="text" class="form-control" id="id_hotel" name="id_hotel" value="<?php echo $id_hotel; ?>" placeholder="contoh" required>
                    <input type="text" class="form-control" id="id_user" name="id_user" value="<?php echo $_SESSION['user_id']; ?>" placeholder="contoh" required>
                    <!-- lainnya -->
                    <label for="nama" style="font-weight: 500;">Nama Pemesan</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Hoteloka">
                    <small id="passwordHelpInline" class="text-muted">
                      Sesuai seperti pada Passport atau KTP (tanpa title maupun karakter unik)
                    </small>
                  </div>
                  <div class="form-group">
                    <label for="email" style="font-weight: 500;">Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="hoteloka@gmail.com">
                  </div>
                  <div class="form-row">
                    <div class="form-group col-12 col-md-6">
                      <label for="checkin">Check-In</label>
                      <input type="date" class="form-control" id="checkin" name="checkin">
                    </div>
                    <div class="form-group col-12 col-md-6">
                      <label for="checkout">Check-Out</label>
                      <input class="form-control" id="checkout" name="checkout" type="date" placeholder="dd/mm/yyyy">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="no_hp" style="font-weight: 500;">Nomor Handphone</label>
                    <input type="number" class="form-control" id="no_hp" name="no_hp" placeholder="089812345678">
                  </div>
                  <div class="form-group">
                    <p>Dengan mengklik tombol ini, Anda mengakui bahwa Anda telah membaca dan menyetujui Syarat
                      & Ketentuan, dan Kebijakan Privasi Hoteloka.</p>
                    <input type="submit" name="submit" class="btn" onclick="return confirm('Apakah Anda Yakin?')" style="background: teal; color: white;" value="Lanjut Pembayaran">
                  </div>
                </form>
              </div>

            </div>

          </div>
          <div class="col-md-4">
            <div class="card shadow rounded">
              <div class="card-body">
                <h5><i class="fas fa-hotel"></i><span class="ml-2">
                    <?php echo $nama; ?>
                  </span></h5>
                <div class="row pt-3">
                  <div class="col-md-4">
                    <p class="text-muted">Check-in</p>
                  </div>
                  <div class="col-md-8 p-0">
                    <p>Senin, 8 Nov 2021, dari 14:00</p>
                  </div>
                  <div class="col-md-4">
                    <p class="text-muted">Check-out</p>
                  </div>
                  <div class="col-md-8 p-0">
                    <p>Selasa, 9 Nov 2021, Sebelum 12:00</p>
                  </div>
                </div>
                <h6>(1x) Kamar Twinbed Luxury Hanya "sertifikat Surat Tes Swab atau Swab/ PCR ke-2 yang Diperlukan"</h6>
                <div class="row">
                  <div class="col-md-6">
                    <small class="text-muted">Tamu per kamar</small>
                  </div>
                  <div class="col-md-6">
                    <small>2 Tamu</small>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <small class="text-muted">Jenis tempat tidur</small>
                  </div>
                  <div class="col-md-6">
                    <small>1 tempat tidur kembar</small>
                  </div>
                </div>
                <hr size="1" color="teal">
                <div class="row pt-3">
                  <div class="col-md-6">
                    <img src="img/<?php echo $gambar;?>" class="w-100 rounded ">
                  </div>
                  <div class="col-md-6">
                    <p class="text-secondary"><i class="fas fa-utensils"></i><span class="ml-2">Tanpa Sarapan</span>
                    </p>
                    <p class="text-success"><i class="fas fa-wifi"></i><span class="ml-2">WiFi</span>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="section-3-booking mb-5">
      <div class="container">
        <h5 class="mt-5">Permintaan Khusus</h5>
        <div class="col-md-8 shadow p-3 mb-5 bg-white rounded">
          <div class="alert alert-secondary" role="alert">
            Punya permintaan khusus? Tanyakan, dan properti akan melakukan yang terbaik untuk memenuhi keinginan Anda.
            (Perhatikan bahwa permintaan khusus tidak dijamin dan dapat dikenakan biaya)
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="custom-control custom-checkbox mt-2">
                <input type="checkbox" class="custom-control-input" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">Ruang Bebas Rokok</label>
              </div>
              <div class="custom-control custom-checkbox mt-3">
                <input type="checkbox" class="custom-control-input" id="customCheck2">
                <label class="custom-control-label" for="customCheck2">Lantai Tinggi (Lt.3+)</label>
              </div>
              <div class="custom-control custom-checkbox mt-3">
                <input type="checkbox" class="custom-control-input" id="customCheck3">
                <label class="custom-control-label" for="customCheck3" data-toggle="collapse" href="#collapseExampleCin"
                  role="button" aria-expanded="false" aria-controls="collapseExample">Waktu Check-in</label>
                <div class="collapse" id="collapseExampleCin">
                  <div class="card card-body p-0 w-75 mt-2" style="border: none;">
                    <div class="form-group">
                      <input class="form-control" type="time">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="custom-control custom-checkbox mt-2">
                <input type="checkbox" class="custom-control-input" id="customCheck5">
                <label class="custom-control-label" for="customCheck5">Kamar Penghubung</label>
              </div>
              <div class="custom-control custom-checkbox mt-3">
                <input type="checkbox" class="custom-control-input" id="customCheck6">
                <label class="custom-control-label" for="customCheck6">Lantai Rendah (Lt.3-)</label>
              </div>
              <div class="custom-control custom-checkbox mt-3">
                <input type="checkbox" class="custom-control-input" id="customCheck7">
                <label class="custom-control-label" for="customCheck7" data-toggle="collapse"
                  href="#collapseExampleCout" role="button" aria-expanded="false" aria-controls="collapseExample">Waktu
                  Check-out</label>
                <div class="collapse" id="collapseExampleCout">
                  <div class="card card-body p-0 w-75 mt-2" style="border: none;">
                    <div class="form-group">
                      <input class="form-control" type="time">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="custom-control custom-checkbox mt-3">
                <input type="checkbox" class="custom-control-input" id="customCheck4">
                <label class="custom-control-label" for="customCheck4" data-toggle="collapse"
                  href="#collapseExampleLain" role="button" aria-expanded="false"
                  aria-controls="collapseExample">Lainnya</label>
              </div>
              <div class="collapse" id="collapseExampleLain">
                <div class="card card-body" style="border: none;">
                  <div class="form-group">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                      placeholder="0-100"></textarea>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="section-4-booking mb-5">
      <div class="container">
        <h5 class="mt-5">Asuransi untuk Anda</h5>
        <div class="col-md-8 shadow p-3 mb-5 bg-white rounded">
          <div class="custom-control custom-checkbox mt-2">
            <input type="checkbox" class="custom-control-input" id="customCheckCovid">
            <label class="custom-control-label" for="customCheckCovid">Asuransi COVID-19 Hotel</label>
          </div>
          <small>Dapatkan perlindungan COVID-19 yang komprehensif yang mencakup rawat inap, biaya pemeriksaan medis
            (termasuk Rapid atau PCR Swab Test), dan banyak lagi.</small>
          <hr width="25%" size="1" color="teal" align="left">
          <p><i class="fas fa-check text-success"></i><span class="ml-2">Cakupan hingga Rp 2.000.000 untuk rawat inap
              akibat COVID-19</span></p>
          <p><i class="fas fa-check text-success"></i><span class="ml-2">Cakupan hingga Rp 500.000 untuk biaya medical
              check up</span></p>
          <p><i class="fas fa-check text-success"></i><span class="ml-2">Santunan Rp 10.000.000 untuk kematian akibat
              COVID-19</span></p>
          <div class="col-md-12 text-right">
            <h5>Rp 20.000</h5>
          </div>
        </div>
      </div>
    </section>

    <section class="section-5-booking mb-5">
      <div class="container">
        <h5 class="mt-5">Detail Harga</h5>
        <div class="col-md-8 shadow p-3 mb-5 bg-white rounded">
          <div class="row">
            <div class="col-md-9">
              <p>(1x) Kamar Twinbed Luxury Hanya "sertifikat Surat Tes Swab/PCR Ke-2/ PCR yang Diperlukan" (1 malam)</p>
            </div>
            <div class="col-md-3 text-right">
              <p>Rp 495.868</p>
            </div>
            <div class="col-md-9">
              <p>Pajak dan biaya lain</p>
            </div>
            <div class="col-md-3 text-right">
              <p>Rp 104.132</p>
            </div>
            <div class="col-md-9">
              <p>Asuransi COVID-19 Hotel</p>
            </div>
            <div class="col-md-3 text-right">
              <p>Rp 20.000</p>
            </div>
          </div>
          <hr color="teal" size="1">
          <div class="row">
            <div class="col-md-9">
              <h5>Total Pembayaran</h5>
            </div>
            <div class="col-md-3 text-right">
              <h5>Rp 620.000</h5>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

  <footer>

  </footer>

  <?php include('util/js.php') ?>

</body>

</html>