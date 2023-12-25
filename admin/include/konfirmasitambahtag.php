<?php 
// include('../koneksi/koneksi.php');
$nama_tag = $_POST['nama_tag'];
if(empty($nama_tag)){
	header("Location:index.php?include=tambah-tag&notif=tambahkosong");
}else{
	$sql = "insert into `tag` (`nama_tag`) 
	values ('$nama_tag')";
	mysqli_query($koneksi,$sql);
    header("Location:index.php?include=tag&notif=tambahberhasil");		
}
?>