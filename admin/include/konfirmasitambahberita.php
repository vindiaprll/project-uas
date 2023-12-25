<?php 
   //  include('../koneksi/koneksi.php');
    $judul_berita = $_POST['judul_berita'];
    $isi_berita = $_POST['isi_berita'];
    $daerah = $_POST['daerah'];
    $id_kategori = $_POST['nama_kategori'];
    $id_admin = $_POST['nama'];
    $tag = $_POST['nama_tag'];
    $lokasi_file = $_FILES['cover']['tmp_name'];
    $nama_file = $_FILES['cover']['name'];
    $direktori = 'cover/'.$nama_file;
 
   if(empty($id_kategori)){	   
      header("Location:index.php?include=tambah-berita&notif=tambahkosong&
      jenis=kategoriberita");
   }else if(empty($judul_berita)){
	header("Location:index.php?include=tambah-berita&notif=tambahkosong&
      jenis=judul");
   }else if(empty($isi_berita)){	    
      header("Location:index.php?include=tambah-berita&notif=tambahkosong&
      jenis=isi");
   }else if(empty($tag)){
	header("Location:index.php?include=tambah-berita&notif=tambahkosong&
      jenis=tag");
   }else if(!move_uploaded_file($lokasi_file,$direktori)){
      header("Location:index.php?include=tambah-berita&notif=tambahkosong&
      jenis=cover");
   }else{   
	$sql = "INSERT INTO `berita` 
      (`judul_berita`,`isi_berita`,`daerah`,`id_kategori`,
	`id_admin`,`cover`)
      VALUES ('$judul_berita','$isi_berita','$daerah','$id_kategori',
	'$id_admin','$nama_file')";
      //echo $sql;
	mysqli_query($koneksi,$sql);
	$id_berita = mysqli_insert_id($koneksi);
 
	if(!empty($_POST['nama_tag'])){
		foreach($_POST['nama_tag'] as $id_tag){
		   $sql_i = "insert into `tag_berita` (`id_berita`, `id_tag`) 
		   values ('$id_berita', '$id_tag')";
		   mysqli_query($koneksi,$sql_i);
		}
	}
      header("Location:index.php?include=berita&notif=tambahberhasil");
    }
?>