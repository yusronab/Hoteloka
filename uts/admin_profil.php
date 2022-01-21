<?php

include('util/connection.php');
if (!$_SESSION['admin_login']) {
    header("location: login.php");
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
    <link rel="stylesheet" href="./css/admin_home.css">
</head>

<body>

    <?php include('util/sidebar.php'); ?>

    <!-- Page content holder -->
    <div class="page-content p-5" id="content">
        <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4">
            <i class="bi bi-distribute-vertical mr-2 text-black"></i>
            <small class="text-uppercase font-weight-bold">Toggle</small>
        </button>

        <div class="pt-3">
            <h2>Profil Administrator</h2>
            <?php if(!empty($_SESSION['message'])){
                    echo $_SESSION['message'];
                    $_SESSION['message'] = null;
                }
            ?>
            <div class="card mt-5">
                <form action="./proses/admin_profil_proses.php" method="POST" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="id_admin" name="id_admin" value="<?php echo $_SESSION['admin_id']; ?>" placeholder="contoh" required>
                        </div>
                        <div class="form-group">
                            <label for="gambar">Foto Profil</label>
                            <br><img src="img/<?php echo $_SESSION['admin_gambar']?>" class="w-25 rounded-circle img-thumbnail shadow-sm">
                            <input type="file" class="form-control p-2"  style="border:none" id="gambar" name="gambar" placeholder="Pilih file...">
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" value="<?php echo $_SESSION['admin_username']; ?>" placeholder="Ketik username baru..." required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="text" class="form-control" id="password" name="password" value="<?php echo $_SESSION['admin_password']; ?>" placeholder="Ketik password baru..." required>
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