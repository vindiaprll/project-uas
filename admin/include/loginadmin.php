<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/stylelogin.css">
</head>
<body>
    <div class="container-login">
            <h1>Login Admin</h1>
            <div class="mulai-login">
            <p class="teksstart-login">Masukan Email dan Password anda</p>
        <!-- <span class="text-danger">Maaf Username dan Password Anda Salah</span> -->
        <?php if(!empty($_GET['gagal'])){?>
            <?php if($_GET['gagal']=="emailKosong"){?>
                <p class="alert-login">Maaf Email Tidak Boleh Kosong</p>
            <?php } else if($_GET['gagal']=="passKosong"){?>
                <p class="alert-login">Maaf Password Tidak Boleh Kosong</p>
            <?php } else {?>
                <p class="alert-login">Maaf Email dan Password Anda Salah</p>
            <?php }?>
        <?php }?>
        <form action="index.php?include=konfirmasi-login-admin" method="post">
            <div class="input-login">
                <input type="text" name="email" id="" placeholder="Email">
                <br>
                <input type="password" name="password" id="" placeholder="Password">
                <br>
            </div>
            <div class="button-login">
                <button id="button" type="submit" name="login" value="login">Log In</button>
            </div>
        </form>
    </div>
</body>
</html>