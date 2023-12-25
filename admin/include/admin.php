<?php 
if((isset($_GET['aksi']))&&(isset($_GET['data']))){
	if($_GET['aksi']=='hapus'){
		$id_admin = $_GET['data'];
		//get foto
          $sql_f = "SELECT `foto` FROM `admin` WHERE `id_admin`='$id_admin'";
          $query_f = mysqli_query($koneksi,$sql_f);
          $jumlah_f = mysqli_num_rows($query_f);
          if($jumlah_f>0){
            while($data_f = mysqli_fetch_row($query_f)){
              $foto = $data_f[0];
              //menghapus foto
              unlink("foto/$foto");
        }
      }
		
		//hapus admin
		$sql_dh = "delete from `admin` where `id_admin` = '$id_admin'";
		mysqli_query($koneksi,$sql_dh);
	}
}
if (isset($_GET['aksi']) && isset($_POST['katakunci_admin'])) {
  if ($_GET['aksi']=='cari') {
    $_SESSION['katakunci_admin'] = $_POST['katakunci_admin'];
    $katakunci_admin = $_SESSION['katakunci_admin'];
  }
}
if (isset($_SESSION['katakunci_admin'])) {
  $katakunci_admin = $_SESSION['katakunci_admin'];
}
?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3><i class="fas fas fa-user-cog"></i> Pengaturan Admin</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active"> Pengaturan Admin</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title" style="margin-top:5px;"><i class="fas fa-list-ul"></i> Daftar Admin</h3>
                <div class="card-tools">
                  <a href="index.php?include=tambah-admin" class="btn btn-sm btn-success float-right">
                  <i class="fas fa-plus"></i> Tambah Admin</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <div class="col-md-12">
                  <form method="POST" action="index.php?include=admin&aksi=cari">
                    <div class="row">
                        <div class="col-md-4 bottom-10">
                          <input type="text" class="form-control" id="kata_kunci" name="katakunci_admin">
                        </div>
                        <div class="col-md-5 bottom-10">
                          <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                        </div>
                    </div><!-- .row -->
                  </form>
                </div><br>
              <div class="col-sm-12">
                <?php if(!empty($_GET['notif'])){?>
                  <?php if($_GET['notif']=="tambahadminberhasil"){?>
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
                        <th width="30%">Nama</th>
                        <th width="30%">Email</th>
                        <th width="20%">Level</th>
                        <th width="15%"><center>Aksi</center></th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                      $batas = 3;
                      if(!isset($_GET['halaman'])){
                          $posisi = 0;
                          $halaman = 1;
                      }else{
                          $halaman = $_GET['halaman'];
                          $posisi = ($halaman-1) * $batas;
                      } 
                      //menampilkan data admin
                      $sql_b = "SELECT `id_admin`, `nama`, `email`, `level` FROM `admin`";
                      if (isset($katakunci_admin) && !empty($katakunci_admin)) {
                        $sql_b .= " WHERE `nama` LIKE '%$katakunci_admin%' OR `email` LIKE '%$katakunci_admin%' OR `level` LIKE '%$katakunci_admin%'";
                      }
                      $sql_b.=" ORDER BY `nama` limit $posisi, $batas";
                      $query_b = mysqli_query($koneksi,$sql_b);
                      $no = $posisi+1;
                      while($data_b = mysqli_fetch_row($query_b)){
                          $id_admin = $data_b[0];
                          $nama = $data_b[1];
                          $email = $data_b[2];
                          $level = $data_b[3];
                      ?>
                    <tr>
                        <td><?php echo $no;?></td>
                        <td><?php echo $nama;?></td>
                        <td><?php echo $email;?></td>
                        <td><?php echo $level;?></td>
                        <td align="center">
                          <a href="index.php?include=edit-admin&data=<?php echo $id_admin;?>" class="btn btn-xs btn-info" title="Edit"><i class="fas fa-edit"></i></a>
                          <a href="index.php?include=detail-admin&data=<?php echo $id_admin;?>" class="btn btn-xs btn-warning" title="Detail"><i class="fas fa-eye"></i></a>
                          <a href="javascript:if(confirm('Anda yakin ingin menghapus data <?php echo $nama; ?>?')) window.location.href = 'index.php?include=admin&aksi=hapus&data=<?php echo $id_admin;?>&notif=hapusberhasil'" class="btn btn-xs btn-danger"><i class="fas fa-trash" title="Hapus"></i></a>                         
                        </td>                                              
                      </tr>  
                      <?php $no++; } ?>                                          
                    </tbody>
                  </table>  
              </div>
              <!-- /.card-body -->
              <?php
                //hitung jumlah semua data 
                $sql_jum = "SELECT `id_admin`, `nama` FROM `admin` ORDER BY `nama`";                                  
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
                    echo "<li class='page-item'><a class='page-link' href='index.php?include=admin&halaman=1'>First</a></li>";
                    echo "<li class='page-item'><a class='page-link' href='index.php?include=admin&halaman=$sebelum'>«</a></li>";
                  }
                  for($i=1; $i<=$jum_halaman; $i++){
                      if ($i > $halaman - 5 and $i < $halaman + 5 ) {
                        if($i!=$halaman){
                            echo "<li class='page-item'><a class='page-link' href='index.php?include=admin&halaman=$i'>$i</a></li>";
                        }else{
                            echo "<li class='page-item'><a class='page-link'>$i</a></li>";
                        }
                      }
                  }
                  if($halaman!=$jum_halaman){
                        echo "<li class='page-item'><a class='page-link' href='index.php?include=admin&halaman=$setelah'>»</a></li>";
                        echo "<li class='page-item'><a class='page-link' href='index.php?include=admin&halaman=$jum_halaman'>Last</a></li>";
                  }      
                }?>
                </ul>
              </div>
            </div>
            <!-- /.card -->

    </section>
    <!-- /.content -->