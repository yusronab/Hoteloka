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

$get_data = oci_parse($connection, "SELECT * FROM TB_TRANSAKSI 
INNER JOIN TB_USER ON TB_USER.ID_USER = TB_TRANSAKSI.ID_USER WHERE TB_TRANSAKSI.ID_HOTEL =".$_GET['id']);
oci_execute($get_data);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('util/head.php') ?>
    <script src="https://kit.fontawesome.com/f9355065a6.js" crossorigin="anonymous"></script>
</head>

<body>
    
    <?php include('util/navbar.php') ?>

    <main>

        <section class="section-1-detail">
            <div class="container mt-5 mb-5">
                <nav aria-label="breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php" class="bc text-decoration-none"><i
                                    class="fas fa-home"></i><span class="ml-2">Home</span></a></li>
                        <li class="breadcrumb-item"><a href="#" class="bc text-decoration-none">Detail</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo $nama; ?></li>
                    </ul>
                </nav>
            </div>
        </section>

        <section class="section-2-detail">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h3><?php echo $nama; ?></h3>
                        <a href="#" class="hotel-sec-2 text-decoration-none">Hotel</a>
                        <span class="detail-rating fas fa-star"></span>
                        <span class="detail-rating fas fa-star"></span>
                        <span class="detail-rating fas fa-star"></span>
                        <span class="detail-rating fas fa-star"></span>
                        <span class="detail-rating fas fa-star"></span>
                        <p class="text-black-50 mt-2">
                            <i class="fas fa-map-marker-alt"></i>
                            <span class="ml-1"><?php echo $deskripsi; ?></span>
                        </p>
                        <p class="">
                            <i class="detail-shield fas fa-shield-virus"></i>
                            <span class="ml-1">Semua Staff telah melakukan Vaksinansi COVID-19</span>
                        </p>
                        <hr color="black" size="2" align="left" class="mb-4">
                    </div>
                </div>
            </div>
        </section>

        <section class="sectio-3-detail">
            <div class="container mb-5">
                <div class="row">
                    <div class="col-md-8">
                    <img src="img/<?php echo $gambar;?>" class="w-100 img-detail">
                    </div>
                    <div class="col-md-4">
                        <div class="column">
                            <img src="img/<?php echo $gambar;?>" class="w-100 img-detail">
                            <img src="img/<?php echo $gambar;?>" class="w-100 img-detail mt-3">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-4-detail">
            <div class="container mb-5">
                <div class="row">
                    <div class="col-md-8">
                        <h4>Hoteloka</h4>
                        <h5 style="color: teal;"><i class="fas fa-door-open"></i><span class="ml-2">9.0 Exellent</span>
                        </h5>
                        <p>12.345 Ulasan Kepuasan Pelanggan</p>
                    </div>
                    <div class="col-md-4 text-right">
                        <p>Harga kamar per malam mulai dari</p>
                        <h4 style="color: orangered;">Rp <?php echo $harga; ?></h4>
                        <a href="#section-8-detail" class="btn-room-detail btn w-75" role="button">Pilih Sekarang</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-6-detail mb-5">
            <div class="container">
                <h4>Fasilitas</h4>
                <div class="row-6-detail row">
                    <div class="col-6 col-sm-4 col-md-2 text-center">
                        <div class="column">
                            <i class="fas fa-fan"></i>
                            <p>Full AC</p>
                        </div>
                    </div>
                    <div class="col-6 col-sm-4 col-md-2 text-center">
                        <div class="column">
                            <i class="fas fa-utensils"></i>
                            <p>Restoran</p>
                        </div>
                    </div>
                    <div class="col-6 col-sm-4 col-md-2 text-center">
                        <div class="column">
                            <i class="fas fa-clock"></i>
                            <p>Pelayanan 24 jam</p>
                        </div>
                    </div>
                    <div class="col-6 col-sm-4 col-md-2 text-center">
                        <div class="column">
                            <i class="fas fa-parking"></i>
                            <p>Parkir</p>
                        </div>
                    </div>
                    <div class="col-6 col-sm-4 col-md-2 text-center">
                        <div class="column">
                            <i class="fas fa-wifi"></i>
                            <p>WiFi</p>
                        </div>
                    </div>
                    <div class="col-6 col-sm-4 col-md-2 text-center">
                        <div class="column">
                            <i class="fas fa-dungeon"></i>
                            <p>Lift</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-7-detail mb-5">
            <div class="container">
                <h4>Informasi Lokasi</h4>
                <p class="text-black-50">
                    <i class="fas fa-map-marker-alt"></i>
                    <span class="ml-1"><?php echo $deskripsi; ?></span>
                <div class="map-7-detail embed-responsive embed-responsive-21by9">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.990468872705!2d106.82160871430929!3d-6.131982061827132!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6a1e016b08ab39%3A0x2e435cee060c0367!2sALEXIS%20HOTEL!5e0!3m2!1sid!2sid!4v1635547878245!5m2!1sid!2sid"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
                </p>
                <div class="row mt-4">
                    <div class="col-12 col-sm-6 col-md-6">
                        <h5>Tempat Terdekat</h5>
                        <div class="col-md-12 mt-3">
                            <div class="column">
                                <div class="row">
                                    <div class="col-8 col-sm-8 col-md-8">
                                        <p><i class="icon-rest fas fa-utensils"></i><span class="ml-3">Gokana
                                                Ramen</span></p>
                                    </div>
                                    <div class="col-4 col-sm-4 col-md-4 text-right">
                                        <p>52m</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-8 col-sm-8 col-md-8">
                                        <p><i class="icon-bag fas fa-shopping-bag"></i><span class="ml-3">ITC Mangga
                                                Dua</span></p>
                                    </div>
                                    <div class="col-4 col-sm-4 col-md-4 text-right">
                                        <p>428m</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-8 col-sm-8 col-md-8">
                                        <p><i class="icon-hospital fas fa-clinic-medical"></i><span class="ml-3">MH.
                                                Tamrin Hospital</span></p>
                                    </div>
                                    <div class="col-4 col-sm-4 col-md-4 text-right">
                                        <p>197m</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-8 col-sm-8 col-md-8">
                                        <p><i class="icon-bank fas fa-hand-holding-usd"></i><span class="ml-3">Bank
                                                Indonesia Jakarta</span></p>
                                    </div>
                                    <div class="col-4 col-sm-4 col-md-4 text-right">
                                        <p>750m</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6">
                        <h5>Populer di Daerah</h5>
                        <div class="col-md-12 mt-3">
                            <div class="column">
                                <div class="row">
                                    <div class="col-8 col-sm-8 col-md-8">
                                        <p><i class="icon-bank fas fa-tree"></i><span class="ml-3">Taman Impian Jaya
                                                Ancol</span></p>
                                    </div>
                                    <div class="col-4 col-sm-4 col-md-4 text-right">
                                        <p>52m</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-8 col-sm-8 col-md-8">
                                        <p><i class="icon-museum fas fa-palette"></i><span class="ml-3">Museum Sejarah
                                                Jakarta</span></p>
                                    </div>
                                    <div class="col-4 col-sm-4 col-md-4 text-right">
                                        <p>428m</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-8 col-sm-8 col-md-8">
                                        <p><i class="icon-rest fas fa-subway"></i><span class="ml-3">Stasiun Jakarta
                                                Kota</span></p>
                                    </div>
                                    <div class="col-4 col-sm-4 col-md-4 text-right">
                                        <p>197m</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-8 col-sm-8 col-md-8">
                                        <p><i class="icon-museum fas fa-palette"></i><span class="ml-3">Museum
                                                Mandiri</span></p>
                                    </div>
                                    <div class="col-4 col-sm-4 col-md-4 text-right">
                                        <p>750m</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="section section-8-detail mb-5" id="section-8-detail" style="background-color: rgb(243, 243, 243);">
            <div class="container pt-5 pb-5">
                <div class="wrapper-8-detail p-3">
                    <h4>Luxury</h4>
                    <div class="row row-cols-1 row-cols-md-2">
                        <div class="col-md-4">
                            <div class="card shadow-sm rounded mb-3">
                                <img src="./assets/Desktop - 11.png" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <p class="card-text"><i class="fas fa-ruler"></i><span class="ml-2">30.0 m^2</span></p>
                                    <p class="card-8-detail card-text">Pembuat Kopi / Teh</p>
                                    <p class="card-8-detail card-text">Penyejuk Ruangan (AC)</p>
                                    <p class="card-8-detail card-text">Bathtup</p>
                                    <button type="button" class="btn-8-detail btn w-100" data-toggle="modal"
                                        data-target="#exampleModalDetail">Lihat Detail Kamar</button>
                                    <div class="modal fade" id="exampleModalDetail" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-xl modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Detail Kamar Luxury
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="card" style="border: none;">
                                                        <div class="row no-gutters">
                                                            <div class="col-md-8">
                                                                <img src="img/<?php echo $gambar;?>" class="w-100">
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="card-body">
                                                                    <h6 class="card-title">Informasi Kamar</h6>
                                                                    <p class="card-text"><i class="fas fa-bed"></i><span class="ml-2">1 Tempat Tidur Kembar</span></p>
                                                                    <p class="card-text"><i class="fas fa-user-friends"></i><span class="ml-2">2 Tamu</span></p>
                                                                    <p class="card-text"><i class="fas fa-ruler"></i><span class="ml-2">30.0 m^2</span></p>
                                                                    <hr size="1" color="black">
                                                                    <h6 class="card-title">Tentang Ruangan Ini</h6>
                                                                    <p class="p-0">1. Tamu harus menunjukkan 2 Sertifikat VaksinasiND atau surat tes SWAB yang Diperlukan.</p>
                                                                    <p class="p-0">2. Karena Pandemi Covid -19 Sarapan Prasmanan / A
                                                                        la carte kami akan diinformasikan pada saat check-in. 3. Kolam renang tutup selama Pembatasan Sosial Berskala Besar (PPKM)</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <p class="text-muted">mulai dari<span class="ml-1 mr-1" style="color: orangered;">Rp512.000</span>/kamar/malam</p>
                                                    <button type="button" class="btn-8-detail btn"data-dismiss="modal">Lihat Pilihan Kamar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card shadow-sm rounded">
                                <div class="card-body">
                                    <h5 class="card-title">Kamar Twinbed Luxury Hanya "sertifikat Surat Tes Swab/pcr
                                        Ke-2 yang Diperlukan"</h5>
                                    <p class="card-text">
                                        <i class="fas fa-bed"></i>
                                        <span class="ml-2">1 Tempat Tidur Kembar</span>
                                        <i class="fas fa-user-friends ml-5"></i>
                                        <span class="ml-2">2 Tamu</span>
                                        <hr size="1" color="black">
                                    </p>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p class="text-secondary"><i class="fas fa-utensils"></i><span
                                                    class="ml-2">Tanpa Sarapan</span></p>
                                            <p class="text-success"><i class="fas fa-wifi"></i><span
                                                    class="ml-2">WiFi</span></p>
                                            <p class="text-success"><i class="fas fa-smoking"></i><span
                                                    class="ml-2">Bebas Rokok</span></p>
                                        </div>
                                        <div class="col-md-4">
                                            <p class="text-success"><i class="fas fa-clipboard-list"></i><span
                                                    class="ml-2">Pembatalan Gratis</span></p>
                                            <p class="text-success"><i class="fas fa-calendar-alt"></i><span
                                                    class="ml-2">Ubah Jadwal</span></p>
                                        </div>
                                        <div class="col-md-4 text-right">
                                            <h4 style="color: orangered;">Rp512.000</h4>
                                            <p class="text-muted">/kamar/malam</p>
                                            <p class="text-primary">Termasuk pajak</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <p><i class="fas fa-tags"></i><span class="ml-2">Cicilan tersedia untuk
                                                    pemengang kartu kredit</span></p>
                                        </div>
                                        <div class="col-md-4 text-right">
                                            <a href="./booking.php?id=<?= $id_hotel; ?>" class="btn-room-detail btn" role="button">Pesan
                                                Sekarang</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card shadow-sm rounded mt-3">
                                <div class="card-body">
                                    <h5 class="card-title">Kamar Twinbed Luxury With Breakfast Hanya "sertifikat Surat
                                        Tes Swab/pcr Ke-2 yang Diperlukan"</h5>
                                    <p class="card-text">
                                        <i class="fas fa-bed"></i>
                                        <span class="ml-2">1 Tempat Tidur Kembar</span>
                                        <i class="fas fa-user-friends ml-5"></i>
                                        <span class="ml-2">2 Tamu</span>
                                        <hr size="1" color="black">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p class="text-success"><i class="fas fa-utensils"></i><span
                                                    class="ml-2">Sarapan Gratis</span></p>
                                            <p class="text-success"><i class="fas fa-wifi"></i><span
                                                    class="ml-2">WiFi</span></p>
                                            <p class="text-success"><i class="fas fa-smoking"></i><span
                                                    class="ml-2">Bebas Rokok</span></p>
                                        </div>
                                        <div class="col-md-4">
                                            <p class="text-success"><i class="fas fa-clipboard-list"></i><span
                                                    class="ml-2">Pembatalan Gratis</span></p>
                                            <p class="text-success"><i class="fas fa-calendar-alt"></i><span
                                                    class="ml-2">Ubah Jadwal</span></p>
                                        </div>
                                        <div class="col-md-4 text-right">
                                            <h4 style="color: orangered;">Rp600.000</h4>
                                            <p class="text-muted">/kamar/malam</p>
                                            <p class="text-primary">Termasuk pajak</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <p><i class="fas fa-tags"></i><span class="ml-2">Cicilan tersedia untuk
                                                    pemengang kartu kredit</span></p>
                                        </div>
                                        <div class="col-md-4 text-right">
                                            <a href="./booking.php?id=<?= $id_hotel; ?>" class="btn-room-detail btn" role="button">Pesan
                                                Sekarang</a>
                                        </div>
                                    </div>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="section-9-detail mb-5">
            <div class="container">
                <h4>Ulasan oleh pengguna Hoteloka</h4>
                <p>Berdasarkan<span class="ml-2 mr-2" style="font-weight: 500;">12.345</span>review</p>
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-6">
                        <div class="row" style="color: teal;">
                            <div class="col-12 col-sm-12 col-md-3">
                                <h6>Kebersihan</h6>
                            </div>
                            <div class="col-12 col-sm-12 col-md-9">
                                <span class="fas fa-star"></span>
                                <span class="fas fa-star"></span>
                                <span class="fas fa-star"></span>
                                <span class="fas fa-star"></span>
                                <span class="fas fa-star-half-alt"></span>
                            </div>
                        </div>
                        <div class="row" style="color: teal;">
                            <div class="col-12 col-sm-6 col-md-3">
                                <h6>Kenyamanan</h6>
                            </div>
                            <div class="col-12 col-sm-12 col-md-9">
                                <span class="fas fa-star"></span>
                                <span class="fas fa-star"></span>
                                <span class="fas fa-star"></span>
                                <span class="fas fa-star"></span>
                                <span class="far fa-star"></span>
                            </div>
                        </div>
                        <div class="row" style="color: teal;">
                            <div class="col-12 col-sm-6 col-md-3">
                                <h6>Makanan</h6>
                            </div>
                            <div class="col-12 col-sm-12 col-md-9">
                                <span class="fas fa-star"></span>
                                <span class="fas fa-star"></span>
                                <span class="fas fa-star"></span>
                                <span class="fas fa-star"></span>
                                <span class="far fa-star"></span>
                            </div>
                        </div>
                        <div class="row" style="color: teal;">
                            <div class="col-12 col-sm-6 col-md-3">
                                <h6>Tempat</h6>
                            </div>
                            <div class="col-12 col-sm-12 col-md-9">
                                <span class="fas fa-star"></span>
                                <span class="fas fa-star"></span>
                                <span class="fas fa-star"></span>
                                <span class="fas fa-star"></span>
                                <span class="fas fa-star"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6">
                        <div class="row" style="color: teal;">
                            <div class="col-12 col-sm-12 col-md-3">
                                <h6>Fantastis</h6>
                            </div>
                            <div class="col-12 col-sm-12 col-md-9">
                                <div class="progress">
                                    <div class="progress-detail progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                  </div>
                            </div>
                        </div>
                        <div class="row" style="color: teal;">
                            <div class="col-12 col-sm-12 col-md-3">
                                <h6>Bagus Sekali</h6>
                            </div>
                            <div class="col-12 col-sm-12 col-md-9">
                                <div class="progress">
                                    <div class="progress-detail progress-bar" role="progressbar" style="width: 52%;" aria-valuenow="52" aria-valuemin="0" aria-valuemax="100">52%</div>
                                  </div>
                            </div>
                        </div>
                        <div class="row" style="color: teal;">
                            <div class="col-12 col-sm-12 col-md-3">
                                <h6>Memuaskan</h6>
                            </div>
                            <div class="col-12 col-sm-12 col-md-9">
                                <div class="progress">
                                    <div class="progress-detail progress-bar" role="progressbar" style="width: 23%;" aria-valuenow="23" aria-valuemin="0" aria-valuemax="100">23%</div>
                                  </div>
                            </div>
                        </div>
                        <div class="row" style="color: teal;">
                            <div class="col-12 col-sm-12 col-md-3">
                                <h6>Jelek</h6>
                            </div>
                            <div class="col-12 col-sm-12 col-md-9">
                                <div class="progress">
                                    <div class="progress-detail progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                                  </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <?php while($row = oci_fetch_array($get_data)): ?>
                        <?php if($row['ULASAN'] != NULL): ?>
                            <div class="col-md-6 mt-4">
                                <div class="media p-2" style="border: teal solid 1px; border-radius: 5px;">
                                    <img src="img/<?= $row['GAMBAR']; ?>" class="mr-3 rounded w-25">
                                    <div class="media-body">
                                        <h5 class="mt-2"><?= $row['NAMA_PESAN'] ?></h5>
                                        <p><?= $row['ULASAN'] ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endwhile; ?>
                </div>
                <div class="alert alert-primary mt-5" role="alert">
                    Anda mungkin perlu menunjukkan hasil tes negatif COVID-19 (PCR/antigen swab) saat check-in di akomodasi. Silakan hubungi hotel untuk informasi lebih lanjut sebelum kedatangan Anda.
                </div>
            </div>
        </section>

    </main>

    <?php include('util/footer.php') ?>
    <?php include('util/js.php') ?>
    
</body>

</html>