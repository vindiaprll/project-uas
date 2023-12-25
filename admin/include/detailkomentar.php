<?php 
// session_start();
// include('../koneksi/koneksi.php');
if(isset($_GET['data'])){
	$id_komentar = $_GET['data'];
	//gat data komentar
  $sql = "SELECT `b`.`judul_berita`,`k`.`isi_komentar`,`u`.`nama` FROM `komentar` `k`
  INNER JOIN `berita` `b` ON `k`.`id_berita` = `b`.`id_berita`
  INNER JOIN `user` `u` ON `k`.`id_user` = `u`.`id_user`
  WHERE `k`.`id_komentar` = '$id_komentar' ";
  $query = mysqli_query($koneksi,$sql);
  while($data = mysqli_fetch_row($query)){
    $judul_berita = $data[0];
    $isi_komentar = $data[1];
    $nama = $data[2];
  }
}
?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3><i class="fas fa-user-tie"></i> Detail Komentar</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php?include=komentar">Komentar</a></li>
              <li class="breadcrumb-item active">Detail Komentar</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
            <div class="card">
              <div class="card-header">
                <div class="card-tools">
                  <a href="index.php?include=komentar" class="btn btn-sm btn-dark float-right">
                  <i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <table class="table table-bordered">
                <tbody>                                    
                    <tr>
                        <td width="20%"><strong>Judul Berita<strong></td>
                        <td width="80%"><?php echo $judul_berita;?></td>
                    </tr>                 
                    <tr>
                        <td width="20%"><strong>Isi<strong></td>
                        <td width="80%"><?php echo $isi_komentar;?></td>
                    </tr>                 
                    <tr>
                        <td width="20%"><strong>Nama User<strong></td>
                        <td width="80%"><?php echo $nama;?></td>
                    </tr>
                  </tbody>
                </table>
  
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">&nbsp;</div>
            </div>
            <!-- /.card -->

    </section>
    <!-- /.content -->