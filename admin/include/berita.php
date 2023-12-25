<?php 
// include('../koneksi/koneksi.php');
if((isset($_GET['aksi']))&&(isset($_GET['data']))){
	 if($_GET['aksi']=='hapus'){
      $id_berita = $_GET['data'];
      //get cover
      $sql_f = "SELECT `cover` FROM `berita` WHERE `id_berita`='$id_berita'";
      $query_f = mysqli_query($koneksi,$sql_f);
      $jumlah_f = mysqli_num_rows($query_f);
      if($jumlah_f>0){
        while($data_f = mysqli_fetch_row($query_f)){
          $cover = $data_f[0];
          //menghapus cover
          unlink("cover/$cover");
        }
      }
 
    //hapus tag berita
    $sql_dh = "delete from `tag_berita` where `id_berita` = '$id_berita'";
    mysqli_query($koneksi,$sql_dh);
    //hapus data berita
    $sql_dm = "delete from `berita` where `id_berita` = '$id_berita'";
    mysqli_query($koneksi,$sql_dm);
  }
}
if (isset($_GET['aksi']) && isset($_POST['katakunci_berita'])) {
  if ($_GET['aksi']=='cari') {
    $_SESSION['katakunci_berita'] = $_POST['katakunci_berita'];
    $katakunci_berita = $_SESSION['katakunci_berita'];
  }
}
if (isset($_SESSION['katakunci_berita'])) {
  $katakunci_berita = $_SESSION['katakunci_berita'];
}
?> 
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3><i class="fas fa-newspaper"></i> Berita</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active"> Berita</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title" style="margin-top:5px;"><i class="fas fa-list-ul"></i> Daftar  berita</h3>
                <div class="card-tools">
                  <a href="index.php?include=tambah-berita" class="btn btn-sm btn-success float-right">
                  <i class="fas fa-plus"></i> Tambah  berita</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <div class="col-md-12">
                  <form method="post" action="index.php?include=berita&aksi=cari">
                    <div class="row">
                        <div class="col-md-4 bottom-10">
                          <input type="text" class="form-control" id="kata_kunci" name="katakunci_berita">
                        </div>
                        <div class="col-md-5 bottom-10">
                          <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                        </div>
                    </div><!-- .row -->
                  </form>
                </div><br>
              <div class="col-sm-12">
              <?php if(!empty($_GET['notif'])){?>
                <?php if($_GET['notif']=="tambahberhasil"){?>
                  <div class="alert alert-success" role="alert">
                  Data Berhasil Ditambahkan</div>
                <?php }else if($_GET['notif']=="editberhasil"){?>
                  <div class="alert alert-success" role="alert">
                  Data Berhasil Diubah</div>
                <?php }else if($_GET['notif']=="hapusberhasil"){?>
                  <div class="alert alert-success" role="alert">
                  Data Berhasil Dihapus</div>
                <?php }?>
              <?php }?>
              </div>
                  <table class="table table-bordered">
                    <thead>                  
                      <tr>
                        <th width="5%">No</th>
                        <th width="30%">Kategori</th>
                        <th width="30%">Judul</th>
                        <th width="20%">Admin</th>
                        <th width="15%"><center>Aksi</center></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $batas = 10;
                      if(!isset($_GET['halaman'])){
                          $posisi = 0;
                          $halaman = 1;
                      }else{
                          $halaman = $_GET['halaman'];
                          $posisi = ($halaman-1) * $batas;
                      } 
                      //menampilkan data berita
                      $sql_b = "SELECT `b`.`id_berita`, `b`.`judul_berita`,     
                            `k`.`nama_kategori`,`a`.`nama` FROM `berita` `b`
                              INNER JOIN `kategori` `k` ON `b`.`id_kategori` = 
                              `k`.`id_kategori` INNER JOIN `admin` `a` ON  
                              `b`.`id_admin` = `a`.`id_admin` ";
                      if (isset($katakunci_berita) && !empty($katakunci_berita)) {
                        $sql_b .= " WHERE `b`.`judul_berita` LIKE '%$katakunci_berita%' || `k`.`nama_kategori` LIKE '%$katakunci_berita%'";
                      }
                      $sql_b.=" ORDER BY `k`.`nama_kategori`, `b`.`judul_berita` limit $posisi, $batas";
                      $query_b = mysqli_query($koneksi,$sql_b);
                      $no = $posisi+1;
                      while($data_b = mysqli_fetch_row($query_b)){
                          $id_berita = $data_b[0];
                          $judul_berita = $data_b[1];
                          $nama_kategori = $data_b[2];
                          $nama = $data_b[3];
                      ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $nama_kategori; ?></td>
                        <td><?php echo $judul_berita; ?></td>
                        <td><?php echo $nama; ?></td>
                        <td align="center">
                          <a href="index.php?include=edit-berita&data=<?php echo $id_berita;?>" class="btn btn-xs btn-info" 
                          title="Edit"><i class="fas fa-edit"></i></a>
                          <a href="index.php?include=detail-berita&data=<?php echo $id_berita;?>" class="btn btn-xs btn-warning" 
                          title="Detail"><i class="fas fa-eye"></i></a>
                          <a href="javascript:if(confirm('Anda yakin ingin menghapus data <?php echo $judul_berita; ?>?')) window.location.href = 'index.php?include=berita&aksi=hapus&data=<?php echo $id_berita;?>&notif=hapusberhasil'"
                          class="btn btn-xs btn-danger"><i class="fas fa-trash" title="Hapus"></i></a>                         
                        </td>
                      </tr>
                      <?php $no++;}?>  
                    </tbody>
                  </table>  
              </div>
              <!-- /.card-body -->
              <?php
                //hitung jumlah semua data 
                $sql_jum = "SELECT `b`.`id_berita`, `b`.`judul_berita`,     
                `k`.`nama_kategori`,`a`.`nama` FROM `berita` `b`
                  INNER JOIN `kategori` `k` ON `b`.`id_kategori` = 
                  `k`.`id_kategori` INNER JOIN `admin` `a` ON  
                  `b`.`id_admin` = `a`.`id_admin` ";  
                if (isset($katakunci_berita)) {
                  $sql_jum .= " WHERE `b`.`judul_berita` LIKE '%$katakunci_berita%' || `k`.`nama_kategori` LIKE '%$katakunci_berita%'";
                }
                $sql_jum .= " ORDER BY `k`.`nama_kategori`, `b`.`judul_berita`";
                $query_jum = mysqli_query($koneksi,$sql_jum);
                $jum_data = mysqli_num_rows($query_jum);
                $jum_halaman = ceil($jum_data/$batas);
              ?>
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                <?php 
                if($jum_halaman==0){
                  //tidak ada halaman
                }else if($jum_halaman==1){
                  echo "<li class='page-item'><a class='page-link'>1</a></li>";
                }else{
                  $sebelum = $halaman-1;
                  $setelah = $halaman+1;
                  if($halaman!=1){
                    echo "<li class='page-item'><a class='page-link' 
                    href='index.php?include=berita&halaman=1'>First</a></li>";
                    echo "<li class='page-item'><a class='page-link' 
                    href='index.php?include=berita&halaman=$sebelum'>«</a></li>";
                  }
                  for($i=1; $i<=$jum_halaman; $i++){
                      if ($i > $halaman - 5 and $i < $halaman + 5 ) {
                        if($i!=$halaman){
                            echo "<li class='page-item'><a class='page-link' 
                            href='index.php?include=berita&halaman=$i'>$i</a></li>";
                        }else{
                            echo "<li class='page-item'><a class='page-link'>$i</a></li>";
                        }
                      }
                  }
                  if($halaman!=$jum_halaman){
                        echo "<li class='page-item'><a class='page-link' 
                        href='index.php?include=berita&halaman=$setelah'>»</a></li>";
                        echo "<li class='page-item'><a class='page-link' 
                        href='index.php?include=berita&halaman=$jum_halaman'>Last</a></li>";
                  }      
                }?>
                </ul>
              </div>
            </div>
            <!-- /.card -->

    </section>
    <!-- /.content -->