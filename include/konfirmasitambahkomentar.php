<?php 
   //  include('../koneksi/koneksi.php');
    $id_berita = $_POST['id_berita'];
    $isi_komentar = $_POST['isi_komentar'];
    $id_user = $_POST['id_user'];
 
	$sql = "INSERT INTO `komentar` 
      (`id_berita`,`isi_komentar`,`id_user`)
      VALUES ('$id_berita','$isi_komentar','$id_user')";
      //echo $sql;
	mysqli_query($koneksi,$sql);
 
    header("Location:index.php?include=detail-berita&data=$id_berita");
?>