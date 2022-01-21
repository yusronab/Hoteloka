<header>
        <div class="container p-0">
            <nav class="navbar navbar-expand-lg navbar-dark">
                <a class="navbar-brand" href="index.php" style="color: white;"><span class="mr-2">Hoteloka</span><i
                        class="bi bi-door-open-fill"></i></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php" style="color: white;">Home</a>
                        </li>
                        <li class="nav-item custom-nav">
                            <a class="nav-link" href="#" style="color: white;">About</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white;">
                                <?php echo $_SESSION['user_nama']?>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a href="user_profil.php" class="dropdown-item"><i class="bi bi-person-circle mr-2 fa-fw"></i>Profile</a>
                                <a href="user_pemesanan.php" class="dropdown-item"><i class="bi bi-receipt mr-2 fa-fw"></i>Daftar Pemesanan</a>
                                <div class="dropdown-divider"></div>
                                <a href="proses/logout_proses.php" class="dropdown-item" onclick="return confirm('apakah yakin?');"><i class="bi bi-box-arrow-right mr-2 fa-fw"></i>Logout</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" style="color: white;">FAQ</a>
                        </li>
                    </ul>
                </div>
            </nav>
    </div>
</header>