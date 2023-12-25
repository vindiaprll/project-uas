<?php
session_start();
include('koneksi/koneksi.php');
if(isset($_GET["include"])){
  $include = $_GET["include"];
  if($include=="konfirmasi-login-user"){
    include("include/konfirmasiloginuser.php");
  }else if($include=="signout-user"){
    include("include/signoutuser.php");
  }else if($include=="konfirmasi-tambah-komentar"){
    include("include/konfirmasitambahkomentar.php");
  }
}
?>
<!DOCTYPE html>
<html>
<head>
<?php include("includes/head.php");?>
</head>
<?php
// $id_user = $_SESSION['id_user'];
// $id_berita = $_GET['data'];
// $komentar = $_POST['komentar'];

// insert into ... komentar.. value ($id_user, $id berita...)
//cek ada get include
if(isset($_GET["include"])){
    $include = $_GET["include"];?>
    <!-- cek apakah ada session id admin -->
    </body>
    <?php include("includes/navbar.php"); ?>
    <?php if(isset($_SESSION['id_user'])){
    ?>
          <?php 
          if($include=="kategori"){
            include("include/kategori.php");
          }else if($include=="pencarian"){
            include("include/pencarian.php");
          }else if($include=="detail-berita"){
            include("include/detailberita.php");
          }else if($include=="tag"){
            include("include/tag.php");
          }else if($include=="tambah-tag") {
            include("include/tambahtag.php");
          }else if($include=="edit-tag"){
            include("include/edittag.php");
          }else if($include=="berita"){ 
            include("include/berita.php");
          }else if($include=="tambah-berita"){
            include("include/tambahberita.php");
          }else if($include=="edit-berita"){
            include("include/editberita.php");
          }else if($include=="detail-komentar"){
            include("include/detailkomentar.php");
          }else if($include=="user"){
            include("include/user.php");
          }else if($include=="admin"){
            include("include/admin.php");
          }else if($include=="tambah-admin"){
            include("include/tambahadmin.php");
          }else if($include=="edit-admin"){
            include("include/editadmin.php");
          }else if($include=="detail-admin"){
            include("include/detailadmin.php");
          }else if($include=="tambah-user"){
            include("include/tambahuser.php");
          }else if($include=="edit-profil"){
            include("include/editprofil.php");
          }else if($include=="edit-user"){
            include("include/edituser.php");
          }else if($include=="detail-user"){
            include("include/detailuser.php");
          }else if($include=="ubah-password"){
            include("include/ubahpassword.php");
          }else if($include=="komentar"){
            include("include/komentar.php");
          }else{
            include("include/home.php");
          }
          ?>
        <!-- /.content-wrapper -->
        <?php include("includes/footer.php"); ?>
      <!-- ./wrapper -->
      <script src="js/vue.min.js"></script>
    <?php
  	}else{?>
      <?php
    //pemanggilan halaman form login
      if($include=="kategori"){
            include("include/kategori.php");
          }else if($include=="pencarian"){
            include("include/pencarian.php");
          }else if($include=="detail-berita"){
            include("include/detailberita.php");
          }else if($include=="tag"){
            include("include/tag.php");
          }else if($include=="tambah-tag") {
            include("include/tambahtag.php");
          }else if($include=="edit-tag"){
            include("include/edittag.php");
          }else if($include=="berita"){ 
            include("include/berita.php");
          }else if($include=="tambah-berita"){
            include("include/tambahberita.php");
          }else if($include=="edit-berita"){
            include("include/editberita.php");
          }else if($include=="detail-komentar"){
            include("include/detailkomentar.php");
          }else if($include=="user"){
            include("include/user.php");
          }else if($include=="admin"){
            include("include/admin.php");
          }else if($include=="tambah-admin"){
            include("include/tambahadmin.php");
          }else if($include=="edit-admin"){
            include("include/editadmin.php");
          }else if($include=="detail-admin"){
            include("include/detailadmin.php");
          }else if($include=="tambah-user"){
            include("include/tambahuser.php");
          }else if($include=="edit-profil"){
          include("include/editprofil.php");
          }else if($include=="edit-user"){
            include("include/edituser.php");
          }else if($include=="detail-user"){
            include("include/detailuser.php");
          }else if($include=="ubah-password"){
            include("include/ubahpassword.php");
          }else if($include=="komentar"){
            include("include/komentar.php");
          }else{
            include("include/home.php");
          }
          include("includes/footer.php");
          ?>
        <script src="js/vue.min.js"></script>
        </body>
    <?php
    }
}else{
  if(isset($_SESSION['id_user'])){
  //pemanggilan ke halaman-halaman home jika ada session
  ?><body>
        <?php include("includes/navbar.php"); ?>
        <?php
          //pemanggilan home
          include("include/home.php");
        ?>
        <!-- /.content-wrapper -->
        <?php include("includes/footer.php"); ?>
      <!-- ./wrapper -->
      <script src="js/vue.min.js"></script>
    <?php
  }else{
  //pemanggilan halaman form login
    include("includes/navbar.php");
    include("include/home.php");
    include("includes/footer.php");
  }
  include("includes/script.php")
  ?>
  <script src="js/vue.min.js"></script>
  </body>
  <?php
}?>