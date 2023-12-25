<?php 
// session_start();
// include('../koneksi/koneksi.php');
if(isset($_SESSION['id_berita'])){
    $id_berita = $_SESSION['id_berita'];
    $judul_berita = $_POST['judul_berita'];
    $isi_berita = addslashes($_POST['isi_berita']);
    $daerah = $_POST['daerah'];
    $id_kategori = $_POST['nama_kategori'];
    $tag = $_POST['nama_tag'];
    $lokasi_file = $_FILES['cover']['tmp_name'];
    $nama_file = $_FILES['cover']['name'];
    $direktori = 'cover/'.$nama_file;
 
    //get cover 
    $sql_f = "SELECT `cover` FROM `berita` WHERE `id_berita`='$id_berita'";
    $query_f = mysqli_query($koneksi,$sql_f);
    while($data_f = mysqli_fetch_row($query_f)){
        $cover = $data_f[0];
        //echo $foto;
    }
   
     if(empty($judul_berita)){
	    header("Location:index.php?include=edit-berita&data=$id_berita&notif=editkosong
         &jenis=judulberita");
	}else if(empty($isi_berita)){
	    header("Location:index.php?include=edit-berita&data=$id_berita&notif=editkosong
         &jenis=isiberita");
	}else if(empty($daerah)){
	    header("Location:index.php?include=edit-berita&data=$id_berita&notif=editkosong
         &jenis=daerah");
	}else if(empty($id_kategori)){
	    header("Location:index.php?include=edit-berita&data=$id_berita&notif=editkosong
         &jenis=kategoriberita");
	}else if(empty($tag)){
	    header("Location:index.php?include=edit-berita&data=$id_berita&notif=editkosong
         &jenis=tagkosong");
	}else{
         $lokasi_file = $_FILES['cover']['tmp_name'];
	   $nama_file = $_FILES['cover']['name'];
	   $direktori = 'cover/'.$nama_file;
	   if(move_uploaded_file($lokasi_file,$direktori)){
            if(!empty($cover)){
                unlink("cover/$cover");
            }
	$sql = "UPDATE `berita` set 
     `judul_berita` = '$judul_berita',`isi_berita`='$isi_berita',
	`daerah`='$daerah',`id_kategori`='$id_kategori',`cover`='$nama_file'
	WHERE `id_berita`='$id_berita'";
	mysqli_query($koneksi,$sql);
}else{
	$sql = "UPDATE `berita` set 
     `judul_berita` = '$judul_berita',`isi_berita`='$isi_berita',
	`daerah`='$daerah',`id_kategori`='$id_kategori' WHERE `id_berita`='$id_berita'";
	mysqli_query($koneksi,$sql);
}
//hapus tag
$sql_d = "delete from `tag_berita` where `id_berita`='$id_berita'";
mysqli_query($koneksi,$sql_d);
//tambah tag
if(!empty($_POST['nama_tag'])){
   foreach($_POST['nama_tag'] as $id_tag){
	$sql_i = "insert into `tag_berita` (`id_berita`, `id_tag`) 
	values ('$id_berita', '$id_tag')";
	mysqli_query($koneksi,$sql_i);
	}
}
header("Location:index.php?include=berita&notif=editberhasil");
}
}
 
?>