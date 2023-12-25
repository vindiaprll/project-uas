<?php
session_start();
include('../koneksi/koneksi.php');
if(isset($_GET["include"])){
  $include = $_GET["include"];
  if($include=="konfirmasi-login-admin"){
    include("include/konfirmasiloginadmin.php");
  }else if($include=="signout-admin"){
    include("include/signoutadmin.php");
  }else if($include=="konfirmasi-tambah-kategori"){
    include("include/konfirmasitambahkategori.php");
  }else if($include=="konfirmasi-edit-kategori"){
    include("include/konfirmasieditkategori.php");
  }else if($include=="konfirmasi-tambah-tag"){
    include("include/konfirmasitambahtag.php");
  }else if($include=="konfirmasi-edit-tag"){
    include("include/konfirmasiedittag.php");
  }else if($include=="konfirmasi-edit-profil"){
    include("include/konfirmasieditprofil.php");
  }else if($include=="konfirmasi-tambah-berita"){
    include("include/konfirmasitambahberita.php");
  }else if($include=="konfirmasi-edit-berita"){
    include("include/konfirmasieditberita.php");
  }else if($include=="konfirmasi-tambah-user"){
    include("include/konfirmasitambahuser.php");
  }else if($include=="konfirmasi-tambah-admin"){
    include("include/konfirmasitambahadmin.php");
  }else if($include=="konfirmasi-edit-user"){
    include("include/konfirmasiedituser.php");
  }else if($include=="konfirmasi-edit-admin"){
    include("include/konfirmasieditadmin.php");
  }else if($include=="konfirmasi-ubah-password"){
    include("include/konfirmasiubahpassword.php");
  }
}
?>
<!DOCTYPE html>
<html>
<head>
<?php include("includes/head.php");?>
</head>
<?php
// if(isset($_SESSION['id_user'])){
// button log out
// }else{
// button login
// }

// $id_user = $_SESSION['id_user'];
// $id_berita = $_GET['data'];
// $komentar = $_POST['komentar'];

// insert into ... komentar.. value ($id_user, $id berita...)
//cek ada get include
if(isset($_GET["include"])){
    $include = $_GET["include"];
    //cek apakah ada session id admin
    if(isset($_SESSION['id_admin'])){
    ?>
    <body class="hold-transition sidebar-mini layout-fixed">
      <div class="wrapper">
        <?php include("includes/header.php") ?>
        <?php include("includes/sidebar.php") ?>
        <div class="content-wrapper">
          <?php 
          if($include=="kategori"){
            include("include/kategori.php");
          }else if($include=="tambah-kategori"){
            include("include/tambahkategori.php");
          }else if($include=="edit-kategori"){
            include("include/editkategori.php");
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
          }else if($include=="detail-berita"){
            include("include/detailberita.php");
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
            include("include/profil.php");
          }  
          ?>
        </div>
        <!-- /.content-wrapper -->
        <?php include("includes/footer.php") ?>
      </div>
      <!-- ./wrapper -->
      <?php include("includes/script.php") ?>
    </body>
    <?php
  	}else{
    //pemanggilan halaman form login
      include("include/loginadmin.php");
  	}  
}else{
  if(isset($_SESSION['id_admin'])){
  //pemanggilan ke halaman-halaman profil jika ada session
  ?>
  <body class="hold-transition sidebar-mini layout-fixed">
      <div class="wrapper">
        <?php include("includes/header.php") ?>
        <?php include("includes/sidebar.php") ?>
        <div class="content-wrapper">
        <?php
          //pemanggilan profil
          include("include/profil.php");
        ?>
        </div>
        <!-- /.content-wrapper -->
        <?php include("includes/footer.php") ?>
      </div>
      <!-- ./wrapper -->
      <?php include("includes/script.php") ?>
    </body>
    <?php
  }else{
  //pemanggilan halaman form login
    include("include/loginadmin.php");
  } 
}
?>
</html>