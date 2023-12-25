<?php
    //akses file koneksi database
    // include('../koneksi/koneksi.php');
    if (isset($_POST['login'])) {
        $ema = $_POST['email'];
        $pass = $_POST['password'];
        $email = mysqli_real_escape_string($koneksi, $ema);
        $password = mysqli_real_escape_string($koneksi, $pass);
        
        //cek email dan password
        $sql="select `id_admin`, `level` from `admin` 
                where `email`='$email' and 
                `password`='$password'";
        $query = mysqli_query($koneksi, $sql);
        $jumlah = mysqli_num_rows($query);
        if(empty($ema)){             
            header("Location:index.php?include=login&gagal=emailKosong");
        }else if(empty($pass)){           
            header("Location:index.php?include=login&gagal=passKosong");
        }else if($jumlah==0){
            header("Location:index.php?include=login&gagal=emailpassSalah");
        }else{
            // session_start();
            //get data
            while($data = mysqli_fetch_row($query)){
                $id_admin = $data[0]; //1
                $level = $data[1]; //superadmin
                $_SESSION['id_admin']=$id_admin;
                $_SESSION['level']=$level;
                header("Location:index.php?include=profil");
            }           
        }
    }
?>
