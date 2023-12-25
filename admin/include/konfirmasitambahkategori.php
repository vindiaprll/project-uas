<?php 
// include('../koneksi/koneksi.php');
$nama_kategori = $_POST['nama_kategori'];
if(empty($nama_kategori)){
	header("Location:index.php?include=tambah-kategori&notif=tambahkosong");
}else{
	$sql = "insert into `kategori` (`nama_kategori`) 
	values ('$nama_kategori')";
	mysqli_query($koneksi,$sql);
    header("Location:index.php?include=kategori&notif=tambahberhasil");		
}
?>
