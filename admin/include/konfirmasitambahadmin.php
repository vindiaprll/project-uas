<?php 
// include('../koneksi/koneksi.php');
$nim = $_POST['nim'];
$nama = $_POST['nama'];
$ema = $_POST['email'];
$pass = $_POST['password'];
$level = $_POST['level'];
$email = mysqli_real_escape_string($koneksi, $ema);
$password = mysqli_real_escape_string($koneksi, $pass);
$lokasi_file = $_FILES['foto']['tmp_name'];
$nama_file = $_FILES['foto']['name'];
$direktori = 'foto/'.$nama_file;

if(empty($nim)){
	header("Location:index.php?include=tambah-admin&notif=tambahnimkosong");
}else if(empty($nama)){
	header("Location:index.php?include=tambah-admin&notif=tambahnamakosong");
}else if(empty($ema)){
	header("Location:index.php?include=tambah-admin&notif=tambahemailkosong");
}else if(empty($pass)){
	header("Location:index.php?include=tambah-admin&notif=tambahpasskosong");
}else if(empty($level)){
	header("Location:index.php?include=tambah-admin&notif=tambahlevelkosong");
}else if(!move_uploaded_file($lokasi_file,$direktori)){
    header("Location:index.php?include=tambah-admin&notif=tambahfotokosong");
}else{
	$sql = "insert into `admin` (`nim`, `nama`, `email`, `password`, `level`, `foto`) 
	values ('$nim', '$nama', '$email', '$password', '$level', '$nama_file')";
	mysqli_query($koneksi,$sql);
header("Location:index.php?include=admin&notif=tambahadminberhasil");	
}
?>