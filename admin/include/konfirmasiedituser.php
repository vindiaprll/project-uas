<?php 
if(isset($_SESSION['id_user'])){
	$id_user = $_POST['id_user'];
	$nama = $_POST['nama'];
	$ema = $_POST['email'];
    $pass = $_POST['password'];
    $password = mysqli_real_escape_string($koneksi, $pass);

    //get foto 
    $sql_f = "SELECT `foto` FROM `user` WHERE `id_user`='$id_user'";
    $query_f = mysqli_query($koneksi,$sql_f);
    while($data_f = mysqli_fetch_row($query_f)){
        $foto = $data_f[0];
        //echo $foto;
    }

	if(empty($nama)){
	header("Location:index.php?include=edit-user&notif=editnamakosong");
	}else if(empty($ema)){
	header("Location:index.php?include=edit-user&notif=editemailkosong");
	}else{
        $lokasi_file = $_FILES['foto']['tmp_name'];
		$nama_file = $_FILES['foto']['name'];
		$direktori = 'foto/'.$nama_file;
		if(move_uploaded_file($lokasi_file,$direktori)){
            if(!empty($foto) && !empty($pass)){
                    unlink("foto/$foto");
            }
		$sql = "UPDATE `user` SET `nama`='$nama', `email`='$ema', `password`='$password', `foto`='$nama_file' WHERE `id_user`='$id_user'";
                  //echo $sql;
		mysqli_query($koneksi,$sql);
		}else if(move_uploaded_file($lokasi_file,$direktori)){
			if(!empty($foto) && empty($pass)){
                    unlink("foto/$foto");
			}
		$sql = "UPDATE `user` SET `nama`='$nama', `email`='$ema' WHERE `id_user`='$id_user'";
                  //echo $sql;
		mysqli_query($koneksi,$sql);
		}else if(empty($pass)){
		$sql = "UPDATE `user` SET `nama`='$nama', `email`='$ema', `foto`='$nama_file' WHERE `id_user`='$id_user'";
                  //echo $sql;
		mysqli_query($koneksi,$sql);
		}else{
		$sql = "UPDATE `user` SET `nama`='$nama', `email`='$ema', `password`='$password' WHERE `id_user`='$id_user'";
                  //echo $sql;
		mysqli_query($koneksi,$sql);
		}
    header("Location:index.php?include=user&notif=editberhasil");
	}
}
?>