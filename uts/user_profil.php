<?php

include('util/connection.php');
if (!$_SESSION['user_login']) {
    header("location: login.php");
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
            <div class="col-md-12 mt-5 text-center">
                <h2>Profil <?php echo $_SESSION['user_nama']; ?></h2>
                <?php if(!empty($_SESSION['message'])){
                    echo $_SESSION['message'];
                    $_SESSION['message'] = null;
                }
                ?>
            </div>
            <div class="card mt-5 mb-5">
                <form action="proses/user_profil_proses.php" method="POST" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="gambar">Foto Profil</label>
                                    <br><img src="img/<?php echo $_SESSION['user_gambar'];?>" class=" rounded img-thumbnail shadow-sm">
                                    <input type="file" class="form-control p-2"  style="border:none" id="gambar" name="gambar" placeholder="Pilih file...">
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <input type="hidden" class="form-control" id="id_user" name="id_user" value="<?php echo $_SESSION['user_id']; ?>" placeholder="contoh" required>
                                    <label for="nama">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $_SESSION['user_nama']; ?>" placeholder="Ketik nama lengkap..." required>
                                </div>
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" id="username" name="username" value="<?php echo $_SESSION['user_username']; ?>" placeholder="Ketik username..." required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" id="email" name="email" value="<?php echo $_SESSION['user_email']; ?>" placeholder="Ketik email..." required>
                                </div>
                                <div class="col-md-12 text-center">
                                    <input type="submit" name="submit" class="btn w-50 mt-3" onclick="return confirm('Apakah Anda Yakin?')" style="background: teal; color: white;" value="Simpan">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <?php include('util/js.php') ?>

</body>
</html>