<?php 
if(isset($_SESSION['id_admin'])){
	$id_admin = $_POST['id_admin'];
	$nim = $_POST['nim'];
	$nama = $_POST['nama'];
	$ema = $_POST['email'];
    $pass = $_POST['password'];
    $level = $_POST['level'];
    $password = mysqli_real_escape_string($koneksi, $pass);

    //get foto 
    $sql_f = "SELECT `foto` FROM `admin` WHERE `id_admin`='$id_admin'";
    $query_f = mysqli_query($koneksi,$sql_f);
    while($data_f = mysqli_fetch_row($query_f)){
        $foto = $data_f[0];
        //echo $foto;
    }

	if(empty($nim)){
	header("Location:index.php?include=edit-admin&notif=editnimkosong");
	}else if(empty($nama)){
	header("Location:index.php?include=edit-admin&notif=editnamakosong");
	}else if(empty($ema)){
	header("Location:index.php?include=edit-admin&notif=editemailkosong");
	}else{
        $lokasi_file = $_FILES['foto']['tmp_name'];
		$nama_file = $_FILES['foto']['name'];
		$direktori = 'foto/'.$nama_file;
		if(move_uploaded_file($lokasi_file,$direktori)){
            if(!empty($foto) && !empty($pass)){
                    unlink("foto/$foto");
            }
		$sql = "UPDATE `admin` SET `nim`='$nim', `nama`='$nama', `email`='$ema', `password`='$password', `level`='$level', `foto`='$nama_file' WHERE `id_admin`='$id_admin'";
                  //echo $sql;
		mysqli_query($koneksi,$sql);
		}else if(move_uploaded_file($lokasi_file,$direktori)){
			if(!empty($foto) && empty($pass)){
                    unlink("foto/$foto");
			}
		$sql = "UPDATE `admin` SET `nim`='$nim', `nama`='$nama', `email`='$ema', `level`='$level' WHERE `id_admin`='$id_admin'";
                  //echo $sql;
		mysqli_query($koneksi,$sql);
		}else if(empty($pass)){
		$sql = "UPDATE `admin` SET `nim`='$nim', `nama`='$nama', `email`='$ema', `level`='$level', `foto` = '$nama_file' WHERE `id_admin`='$id_admin'";
                  //echo $sql;
		mysqli_query($koneksi,$sql);
		}else{
		$sql = "UPDATE `admin` SET `nim`='$nim', `nama`='$nama', `email`='$ema', `password`='$password', `level`='$level' WHERE `id_admin`='$id_admin'";
                  //echo $sql;
		mysqli_query($koneksi,$sql);
		}
    header("Location:index.php?include=admin&notif=editberhasil");
	}
}

?>