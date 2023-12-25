<?php 
    if(isset($_SESSION['id_admin'])){
        $id_admin = $_SESSION['id_admin'];
        $pass_lama = $_POST['pass_lama'];
        $password_lama = mysqli_real_escape_string($koneksi, $pass_lama);
        $pass_baru = $_POST['pass_baru'];
        $password_baru = mysqli_real_escape_string($koneksi, $pass_baru);
        $konfirm_pass = $_POST['konfirm_pass'];

        //cek password lama 
        $sql = "SELECT * FROM `admin` WHERE `id_admin` = '$id_admin' AND `password` = '$password_lama' ";
        $query = mysqli_query($koneksi, $sql);
        $count = mysqli_num_rows($query);
        
        if(empty($password_lama)){	   
            header("Location:index.php?include=ubah-password&notif=passlamakosong");
        }else if(empty($password_baru)){
            header("Location:index.php?include=ubah-password&notif=passbarukosong");
        }else if(empty($konfirm_pass)){
            header("Location:index.php?include=ubah-password&notif=passkonfirmkosong");
        }else{
            if($count==1){
                $sql = "update `admin` set `password`='$password_baru' where `id_admin`='$id_admin'";
                mysqli_query($koneksi,$sql);
                header("Location:index.php?include=ubah-password&notif=editberhasil");
            }else {
                header("Location:index.php?include=ubah-password&notif=passsalah");
            }
        }
    }
?>