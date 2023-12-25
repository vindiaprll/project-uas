<?php
// session_start();
// include('../koneksi/koneksi.php');
if(isset($_GET['data'])){
	$id_berita = $_GET['data'];
	$_SESSION['id_berita']=$id_berita;
	//get data berita
	$sql_m = "SELECT `judul_berita`,`isi_berita`,`daerah`,`id_kategori` FROM `berita` WHERE `id_berita`='$id_berita'";
	$query_m = mysqli_query($koneksi,$sql_m);
	while($data_m = mysqli_fetch_row($query_m)){
		$judul_berita = $data_m[0];
		$isi_berita = $data_m[1];
		$daerah = $data_m[2];
        $id_kategori = $data_m[3];
	}
	//get tag
	$sql_h = "select `id_tag` from `tag_berita` 
        where `id_berita`='$id_berita'";
	$query_h = mysqli_query($koneksi,$sql_h);
	$array_tag = array();
	while($data_h = mysqli_fetch_row($query_h)){
		$id_tag = $data_h[0];
		$array_tag[] = $id_tag;
	} 
}
?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3><i class="fas fa-edit"></i> Edit Data Berita</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php?include=berita">Berita</a></li>
              <li class="breadcrumb-item active">Edit Data Berita</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title"style="margin-top:5px;"><i class="far fa-list-alt"></i> Form Edit Data Berita</h3>
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
          <?php if($_GET['notif']=="editkosong"){?>
            <div class="alert alert-danger" role="alert">Maaf data 
            <?php echo $_GET['jenis'];?> wajib di isi</div>
          <?php }?>
        <?php }?>
      </div>
      <form class="form-horizontal" action="index.php?include=konfirmasi-edit-berita" method="post" enctype="multipart/form-data">
        <div class="card-body">      
            <div class="form-group row">
              <label for="foto" class="col-sm-3 col-form-label">Cover Berita   
              </label>
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
              value="<?php echo $judul_berita;?>">
              </div>
          </div>
          <div class="form-group row">
            <label for="isi_berita" class="col-sm-3 col-form-label">Isi</label>
            <div class="col-sm-7">
            <textarea class="form-control" name="isi_berita" id="editor1" 
            rows="12"><?php echo $isi_berita;?></textarea>
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
                    $sql_k = "SELECT `id_kategori`,`nama_kategori` FROM 
                    `kategori` ORDER BY `nama_kategori`";
                    $query_k = mysqli_query($koneksi, $sql_k);
                    while($data_k = mysqli_fetch_row($query_k)){
                    $id_kat = $data_k[0];
                    $nama_kat = $data_k[1];
                    ?>
                    <option value="<?php echo $id_kat;?>" 
                    <?php if($id_kat==$id_kategori){?>
                    selected <?php }?>><?php echo $nama_kat;?></option>
                    <?php }?>
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
            <input type="checkbox" name="nama_tag[]" value="<?php echo $id_tg;?>"
            <?php if(in_array($id_tg, $array_tag)){?>checked="checked" <?php }?>> 
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
            <button type="submit" class="btn btn-info float-right"><i class="fas 
            fa-save"></i> Simpan</button>
            </div>  
            </div>
            <!-- /.card-footer -->
    </form>
</div>
    <!-- /.card -->
</section>
    <!-- /.content -->