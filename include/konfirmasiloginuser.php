<?php
    //akses file koneksi database
    include('../koneksi/koneksi.php');
    if (isset($_POST['login'])) {
        $ema = $_POST['email'];
        $pass = $_POST['password'];
        $email = mysqli_real_escape_string($koneksi, $ema);
        $password = mysqli_real_escape_string($koneksi, $pass);
        
        //cek email dan password
        $sql="select `id_user` from `user` 
                where `email`='$email' and 
                `password`='$password'";
        $query = mysqli_query($koneksi, $sql);
        $jumlah = mysqli_num_rows($query);
        if(empty($ema)){             
            header("Location:loginuser.php?login&gagal=emailKosong");
        }else if(empty($pass)){           
            header("Location:loginuser.php?login&gagal=passKosong");
        }else if($jumlah==0){
            header("Location:loginuser.php?login&gagal=emailpassSalah");
        }else{
            session_start();
            while($data = mysqli_fetch_row($query)){
                $id_user = $data[0]; //1
                $_SESSION['id_user'] = $id_user;
                header("Location:../index.php?include=home");
            }   
        }
    }
?>