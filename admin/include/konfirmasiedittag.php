<?php 
// session_start();
// include('../koneksi/koneksi.php');
if(isset($_SESSION['id_tag'])){
    $id_tag = $_SESSION['id_tag'];
    $nama_tag = $_POST['nama_tag'];

    if(empty($nama_tag)){
        header("Location:index.php?include=edit-tag&data=".$id_tag."&notif=editkosong");
    }else{
	$sql = "update `tag` set `nama_tag`='$nama_tag' 
	where `id_tag`='$id_tag'";
	mysqli_query($koneksi,$sql);
	unset($_SESSION['id_tag']);
	header("Location:index.php?include=tag&notif=editberhasil");
    }
}
?>