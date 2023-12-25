<?php
$koneksi = mysqli_connect("localhost","root","","uas");
$koneksi->set_charset('utf8mb4');
// cek koneksi
if (!$koneksi){
  die("Error koneksi: " . mysqli_connect_errno());
}
?>
