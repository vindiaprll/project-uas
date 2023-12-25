<?php 
include('../koneksi/koneksi.php');
$nama = $_POST['nama'];
$ema = $_POST['email'];
$pass = $_POST['password'];
$foto = $_POST['foto'];
$email = mysqli_real_escape_string($koneksi, $ema);
$password = mysqli_real_escape_string($koneksi, $pass);

if(empty($nama)){
	header("Location:register.php?notif=tambahnamakosong");
}else if(empty($ema)){
	header("Location:register.php?notif=tambahemailkosong");
}else if(empty($pass)){
	header("Location:register.php?notif=tambahpasskosong");
}else{
	$sql = "insert into `user` (`nama`, `email`, `password`, `foto`) 
	values ('$nama', '$email', '$password', '$foto')";
	mysqli_query($koneksi,$sql);
header("Location:loginuser.php");	
}
?>