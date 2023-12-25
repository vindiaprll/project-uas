<?php 
// session_start();
// include('../koneksi/koneksi.php');
if((isset($_GET['aksi']))&&(isset($_GET['data']))){
	if($_GET['aksi']=='hapus'){
		$id_kategori = $_GET['data'];
		//hapus kategori berita
		$sql_dh = "delete from `kategori` where `id_kategori` = '$id_kategori'";
		mysqli_query($koneksi,$sql_dh);
	}
}
if (isset($_GET['aksi']) && isset($_POST['katakunci_kategori'])) {
  if ($_GET['aksi']=='cari') {
    $_SESSION['katakunci_kategori'] = $_POST['katakunci_kategori'];
    $katakunci_kategori = $_SESSION['katakunci_kategori'];
  }
}
if (isset($_SESSION['katakunci_kategori'])) {
  $katakunci_kategori = $_SESSION['katakunci_kategori'];
}
?>


    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3><i class="fas fa-th"></i> Kategori Berita</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active"> Kategori</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title" style="margin-top:5px;"><i class="fas fa-list-ul"></i> Daftar  Kategori Berita</h3>
                <div class="card-tools">
                  <a href="index.php?include=tambah-kategori" class="btn btn-sm btn-success float-right"><i class="fas fa-plus"></i> Tambah Kategori</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <div class="col-md-12">
                  <!-- <form action="index.php?include=kategori" method="post" > -->
                  <form method="post" action="index.php?include=kategori&aksi=cari">
                    <div class="row">
                        <div class="col-md-4 bottom-10">
                          <input type="text" class="form-control" id="kata_kunci" name="katakunci_kategori">
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
                <?php } else if($_GET['notif']=="editberhasil"){?>
                      <div class="alert alert-success" role="alert">
                      Data Berhasil Diubah</div>
                <?php } else if($_GET['notif']=="hapusberhasil"){?>
                      <div class="alert alert-success" role="alert">
                      Data Berhasil Dihapus</div>
                <?php }?>
              <?php }?>
              </div>
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th width="5%">No</th>
                      <th width="80%">Kategori Berita</th>
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

                    $sql_k = "SELECT `id_kategori`,`nama_kategori` FROM `kategori` ";
                    // if (!empty($katakunci_kategori_kategori)){
                    if (isset($katakunci_kategori) && !empty($katakunci_kategori)) {
                        // $sql_k .= " where `nama_kategori` LIKE '%$katakunci_kategori_kategori%' ";
                        $sql_k .= " WHERE `nama_kategori` LIKE '%$katakunci_kategori%' ";
                    } 
                    $sql_k .="ORDER BY `nama_kategori` limit $posisi, $batas";
                    $query_k = mysqli_query($koneksi,$sql_k);
                    $no = $posisi+1;
                    while($data_k = mysqli_fetch_row($query_k)){
                      $id_kategori = $data_k[0];
                      $nama_kategori = $data_k[1];
                    ?>
                    <tr>
                      <td><?php echo $no;?></td>
                      <td><?php echo $nama_kategori;?></td>
                      <td align="center">
                        <a href="index.php?include=edit-kategori&data=<?php echo $id_kategori;?>" class="btn btn-xs btn-info"><i class="fas fa-edit"></i> Edit</a>
                        <a href="javascript:if(confirm('Anda yakin ingin menghapus data <?php echo $nama_kategori; ?>?')) window.location.href = 'index.php?include=kategori&aksi=hapus&data=<?php echo $id_kategori;?>&notif=hapusberhasil'" 
                        class="btn btn-xs btn-danger"><i class="fas fa-trash"></i> Hapus</a>
                      </td>
                    </tr>
                    <?php $no++; }?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <?php
                //hitung jumlah semua data 
                $sql_jum = "SELECT `id_kategori`, `nama_kategori` FROM `kategori`"; 
                // if (!empty($katakunci_kategori_kategori)){
                //     $sql_jum .= " where `nama_kategori` LIKE '%$katakunci_kategori_kategori%' ";
                // } 
                if (isset($katakunci_kategori)) {
                  $sql_jum .= " WHERE `nama_kategori` LIKE '%$katakunci_kategori%' ";
                }
                $sql_jum .= "order by `nama_kategori`";
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
                    href='index.php?include=kategori&halaman=1'>First</a></li>";
                    echo "<li class='page-item'><a class='page-link' 
                    href='index.php?include=kategori&halaman=$sebelum'>«</a></li>";
                  }
                  for($i=1; $i<=$jum_halaman; $i++){
                      if ($i > $halaman - 5 and $i < $halaman + 5 ) {
                        if($i!=$halaman){
                            echo "<li class='page-item'><a class='page-link' 
                            href='index.php?include=kategori&halaman=$i'>$i</a></li>";
                        }else{
                            echo "<li class='page-item'><a class='page-link'>$i</a></li>";
                        }
                      }
                  }
                  if($halaman!=$jum_halaman){
                        echo "<li class='page-item'><a class='page-link' 
                        href='index.php?include=kategori&halaman=$setelah'>»</a></li>";
                        echo "<li class='page-item'><a class='page-link' 
                        href='index.php?include=kategori&halaman=$jum_halaman'>Last</a></li>";
                  }      
                }?>
              </ul>
              </div>
            </div>
            <!-- /.card -->

    </section>
    <!-- /.content -->