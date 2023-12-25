<?php 
// session_start();
// include('../koneksi/koneksi.php');
$id_adm = $_SESSION['id_admin'];
//get profil
$sql = "select `id_admin`, `nama` from `admin` 
where `id_admin`='$id_adm'";
 //echo $sql;
$query = mysqli_query($koneksi, $sql);
while($data = mysqli_fetch_row($query)){
	$id_adm = $data[0];
  $nam = $data[1];
}
?>
    
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3><i class="fas fa-plus"></i> Tambah Berita</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php?include=berita">Berita</a></li>
              <li class="breadcrumb-item active">Tambah Berita</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="card card-success">
      <div class="card-header">
        <h3 class="card-title"style="margin-top:5px;"><i class="far fa-list-alt"></i> Form Tambah Data Berita</h3>
        <div class="card-tools">
          <a href="index.php?include=berita" class="btn btn-sm btn-dark float-right">
          <i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
        </div>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      </br></br>
      <div class="col-sm-10">
          <?php if((!empty($_GET['notif']))&&(!empty($_GET['jenis']))){?>
            <?php if($_GET['notif']=="tambahkosong"){?>
                <div class="alert alert-danger" role="alert">Maaf data 
                <?php echo $_GET['jenis'];?> wajib di isi</div>
            <?php }?>
          <?php }?>
      </div>
      <form class="form-horizontal" action="index.php?include=konfirmasi-tambah-berita" method="post" enctype="multipart/form-data">
        <div class="card-body">          
        <div class="form-group row">
          <label for="cover" class="col-sm-3 col-form-label">Cover Berita </label>
          <div class="col-sm-7">
            <div class="custom-file">
            <input type="file" class="custom-file-input" name="cover" 
              id="customFile">
            <label class="custom-file-label" for="customFile">Choose 
              file</label>
            </div>  
          </div>
      </div>
      <div class="form-group row">
          <label for="judul_berita" class="col-sm-3 col-form-label">Judul Berita</label>
          <div class="col-sm-7">
          <input type="text" class="form-control" name="judul_berita" id="judul_berita" 
          value="">
          </div>
      </div>
      <div class="form-group row">
        <label for="isi_berita" class="col-sm-3 col-form-label">Isi</label>
        <div class="col-sm-7">
          <textarea class="form-control" name="isi_berita" id="editor1" rows="12"></textarea>
        </div>
      </div>     
      <div class="form-group row">
        <label for="daerah" class="col-sm-3 col-form-label">Provinsi</label>
        <div class="col-sm-7">
          <select class="form-control" id="daerah" name="daerah">
          <option value="">- Pilih Provinsi -</option>
          <option value="Jawa Tengah">Jawa Tengah</option>
          <option value="Jawa Timur">Jawa Timur</option>
          <option value="Jawa Barat">Jawa Barat</option>
          </select>
        </div>
      </div>
      <div class="form-group row">
        <label for="nama_kategori" class="col-sm-3 col-form-label">Kategori</label>
        <div class="col-sm-7">
          <select class="form-control" id="nama_kategori" name="nama_kategori">
          <option value="">- Pilih Kategori -</option>
          <?php 
          $sql_k = "SELECT `id_kategori`,`nama_kategori` FROM `kategori` ORDER BY `nama_kategori`";
          $query_k = mysqli_query($koneksi, $sql_k);
          while($data_k = mysqli_fetch_row($query_k)){
                $id_kat = $data_k[0];
                $nama_kat = $data_k[1];
          ?>
          <option value="<?php echo $id_kat;?>"><?php echo $nama_kat;?></option>
          <?php }?>
          </select>
        </div>
      </div>
      <div class="form-group row">
        <label for="nama" class="col-sm-3 col-form-label">Kategori</label>
        <div class="col-sm-7">
          <select class="form-control" id="nama" name="nama">
          <option value="<?php echo $id_adm;?>"><?php echo $nam;?></option>
          </select>
        </div>
      </div>
          <div class="form-group row">
            <label for="nama_tag" class="col-sm-3 col-form-label">Tag</label>
            <div class="col-sm-7">
              <?php 
              $sql_g = "SELECT `id_tag`,`nama_tag` FROM `tag`
                        ORDER BY `nama_tag`";
              $query_g = mysqli_query($koneksi, $sql_g);
                    while($data_g = mysqli_fetch_row($query_g)){
                      $id_tg = $data_g[0];
                      $nama_tg = $data_g[1];
                    ?>
              <input type="checkbox"  name="nama_tag[]" value="<?php echo $id_tg;?>">  
              <?php echo $nama_tg;?> </br>
              <?php }?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /.card-body -->
      <div class="card-footer">
        <div class="col-sm-12">
          <button type="submit" class="btn btn-success float-right">
          <i class="fas fa-plus"></i> Tambah</button>
        </div>  
      </div>
    <!-- /.card-footer -->
    </form>
    </div>
    <!-- /.card -->

    </section>
    <!-- /.content -->