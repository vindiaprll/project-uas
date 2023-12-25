<?php 
// session_start();
// include('../koneksi/koneksi.php');
if(isset($_GET['data'])){
	$id_berita = $_GET['data'];
	//gat data berita
  $sql = "SELECT `b`.`cover`,`b`.`judul_berita`,`b`.`isi_berita`, `b`.`daerah`,`k`.`nama_kategori`, `a`.`nama`, DATE_FORMAT(`b`.`date`, '%d %M %Y') FROM `berita` `b` INNER JOIN `kategori` `k` ON `b`.`id_kategori`=`k`.`id_kategori` INNER JOIN `admin` `a` ON `b`.`id_admin`= `a`.`id_admin` WHERE `b`.`id_berita`='$id_berita'";
  $query = mysqli_query($koneksi,$sql);
  while($data = mysqli_fetch_row($query)){
    $cover = $data[0];
    $judul_berita = $data[1];
    $isi_berita = $data[2];
    $daerah = $data[3];
    $nama_kategori = $data[4];
    $nama = $data[5];
    $date = $data[6];
  }
}
?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3><i class="fas fa-user-tie"></i> Detail Data Berita</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php?include=berita">Berita</a></li>
              <li class="breadcrumb-item active">Detail Data Berita</li>
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
                  <a href="index.php?include=berita" class="btn btn-sm btn-dark float-right">
                  <i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <table class="table table-bordered">
                <tbody>                      
                    <tr>
                      <td><strong>Cover<strong></td>
                      <td><img src="cover/<?php echo $cover;?>" 
                      class="img-fluid" width="200px;"></td>
                    </tr>               
                    <tr>
                        <td width="20%"><strong>Judul Berita<strong></td>
                        <td width="80%"><?php echo $judul_berita;?></td>
                    </tr>                 
                    <tr>
                        <td width="20%"><strong>Isi<strong></td>
                        <td width="80%"><?php echo $isi_berita;?></td>
                    </tr>                 
                    <tr>
                        <td width="20%"><strong>Provinsi<strong></td>
                        <td width="80%"><?php echo $daerah;?></td>
                    </tr>
                    <tr>
                        <td width="20%"><strong>Kategori<strong></td>
                        <td width="80%"><?php echo $nama_kategori;?></td>
                    </tr>
                    <tr>
                        <td width="20%"><strong>Admin<strong></td>
                        <td width="80%"><?php echo $nama;?></td>
                    </tr>
                    <tr>
                        <td width="20%"><strong>Tanggal Dibuat<strong></td>
                        <td width="80%"><?php echo $date;?></td>
                    </tr>
                    <tr>
                        <td><strong>Tag<strong></td>
                        <td>
                        <ul>
                        <?php
                      //get tag
                      $sql_h = "SELECT `t`.`nama_tag` from `tag_berita` `tb` inner join `tag` `t`  ON  `tb`.`id_tag` = `t`.`id_tag` where `tb`.`id_berita`='$id_berita'";
                      $query_h = mysqli_query($koneksi,$sql_h);
                      while($data_h = mysqli_fetch_row($query_h)){
                      $nama_tag= $data_h[0];
                      ?>
                      <li><?php echo $nama_tag;?></li>
                      <?php }?>
                      </ul>
                      </td>
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