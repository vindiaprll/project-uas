<?php 
// session_start();
// include('../koneksi/koneksi.php');
if(isset($_SESSION['id_kategori'])){
    $id_kategori = $_SESSION['id_kategori'];
    $nama_kategori = $_POST['nama_kategori'];

    if(empty($nama_kategori)){
        header("Location:index.php?include=edit-kategori&data=".$id_kategori."&notif=editkosong");
    }else{
	$sql = "update `kategori` set `nama_kategori`='$nama_kategori' 
	where `id_kategori`='$id_kategori'";
	mysqli_query($koneksi,$sql);
	unset($_SESSION['id_kategori']);
	header("Location:index.php?include=kategori&notif=editberhasil");
    }
}
?>
