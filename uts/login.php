<?php

include('util/connection.php');
if(isset($_SESSION['admin_login'])){
    header("location:admin_hotel.php");
} elseif(isset($_SESSION['user_login'])){
    header("location:index.php");
}
$pesan = null;
if(isset($_GET['pesan'])){
    if($_GET['pesan'] == "gagal"){
        $pesan = '<div style="color: red;">Username dan password tidak cocok<span style="color: red; float: right; cursor: pointer;" onclick="this.parentElement.style.display="none";">&times;</span></div>';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hoteloka</title>
    <link rel="stylesheet" href="./css/login.css">
</head>
<body>
    <div class="container">
        <div class="red-bg">
            <div class="box login">
                <h2>Sudah punya akun?</h2>
                <button class="login-btn">Login</button>
            </div>
            <div class="box register">
                <h2>Belum punya akun?</h2>
                <button class="register-btn">Register</button>
            </div>
        </div>
        <div class="form-box">
            <div class="form login-form">
                <form action="proses/login_proses.php" method="POST">
                    <?php echo $pesan; ?>
                    <?php if(!empty($_SESSION['message'])){
                        echo $_SESSION['message'];
                        $_SESSION['message'] = null;
                    } ?>
                    <h3>Login</h3>
                    <input type="text" id="username" name="username" placeholder="username" autocomplete="off" autofocus>
                    <input type="password" id="password" name="password" placeholder="password" autocomplete="off" autofocus>
                    <input type="submit" name="login" value="Login">
                    <a href="#" class="forget">Forget password</a>
                </form>
            </div>
            <div class="form register-form">
                <form action="proses/register_proses.php" method="POST">
                    <h3>Register</h3>
                    <input type="text" id="nama" name="nama" placeholder="nama">
                    <input type="text" id="username" name="username" placeholder="username">
                    <input type="email" id="email" name="email" placeholder="email">
                    <input type="password" id="password" name="password" placeholder="password">
                    <input type="submit" name="submit" value="Register">
                </form>
            </div>
        </div>
    </div>
    
    <script>
        const login_btn = document.querySelector('.login-btn');
        const reg_btn = document.querySelector('.register-btn');
        const form_box = document.querySelector('.form-box');
        const body = document.querySelector('body');

        reg_btn.onclick = function(){
            form_box.classList.add('active')
            body.classList.add('active')
        }
        login_btn.onclick = function(){
            form_box.classList.remove('active')
            body.classList.remove('active')
        }
    </script>
</body>
</html>