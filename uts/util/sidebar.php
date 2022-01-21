<div class="vertical-nav" id="sidebar">
    <div class="py-4 px-3 mb-4 bg-light">
        <div class="media d-flex align-items-center">
            <img loading="lazy" src="img/<?php echo $_SESSION['admin_gambar']?>" alt="..." width="80" height="80"
                class="mr-3 rounded-circle img-thumbnail shadow-sm">
            <div class="media-body">
                <h4 class="m-0">Hoteloka</h4>
                <p class="font-weight-normal text-muted mb-0">Administrator</p>
            </div>
        </div>
    </div>

    <p class="text-white font-weight-bold text-uppercase px-3 small pb-4 mb-0">Dashboard</p>

    <ul class="nav flex-column mb-0">
        <li class="nav-item">
            <a href="admin_hotel.php" class="nav-link"><i class="bi bi-shop mr-2 text-black fa-fw"></i>Hotel</a>
        </li>
        <li class="nav-item">
            <a href="admin_user.php" class="nav-link"><i class="bi bi-people-fill mr-2 fa-fw"></i>User</a>
        </li>
        <li class="nav-item">
            <a href="admin_transaksi.php" class="nav-link"><i class="bi bi-credit-card mr-2 fa-fw"></i>Transaksi</a>
        </li>
    </ul>

    <p class="text-white font-weight-bold text-uppercase px-3 small py-4 mb-0">Pengaturan</p>

    <ul class="nav flex-column mb-0">
        <li class="nav-item">
            <a href="admin_profil.php" class="nav-link"><i class="bi bi-person-circle mr-2 fa-fw"></i>Profile</a>
        </li>
        <li class="nav-item">
            <a href="proses/logout_proses.php" class="nav-link" onclick="return confirm('apakah yakin?');"><i class="bi bi-box-arrow-right mr-2 fa-fw"></i>Logout</a>
        </li>
    </ul>
</div>