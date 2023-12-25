<?php 
if(isset($_GET['data'])){
	$id_admin = $_GET['data'];
	
    //get data admin
	$sql_d = "SELECT `id_admin`, `nim`, `nama`, `email`, `password`, `level` FROM `admin` WHERE `id_admin` = '$id_admin'";
    $query_d = mysqli_query($koneksi,$sql_d);
    while($data_d = mysqli_fetch_row($query_d)){
        $id_admin= $data_d[0];
        $nim= $data_d[1];
        $nama= $data_d[2];
        $email= $data_d[3];
        $pass= $data_d[4];
        $level= $data_d[5];
    }
}
?>

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3><i class="fas fa-edit"></i> Edit Data Admin</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php?include=admin">Pengaturan Admin</a></li>
              <li class="breadcrumb-item active">Edit Data Admin</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title"style="margin-top:5px;"><i class="far fa-list-alt"></i> Form Edit Data Admin</h3>
        <div class="card-tools">
          <a href="index.php?include=admin" class="btn btn-sm btn-dark float-right"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
        </div>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      </br>
      <?php if(!empty($_GET['notif'])){?>
      <?php if($_GET['notif']=="editnimkosong"){?>
      <div class="alert alert-danger" role="alert">
      Maaf data nim wajib di isi</div>
      <?php }?>
        <?php if($_GET['notif']=="editnamakosong"){?>
      <div class="alert alert-danger" role="alert">
      Maaf data nama wajib di isi</div>
      <?php }?>
        <?php if($_GET['notif']=="editemailkosong"){?>
      <div class="alert alert-danger" role="alert">
      Maaf data email wajib di isi</div>
      <?php }?>
      <?php }?>

      <form class="form-horizontal" method="post" action="index.php?include=konfirmasi-edit-admin" enctype="multipart/form-data">
      <div class="card-body">
          <div class="form-group row">
            <label for="foto" class="col-sm-12 col-form-label"><span class="text-info"><i class="fas fa-user-circle"></i> <u>Data Admin</u></span></label>
          </div>
          
          <div class="form-group row">
            <label for="foto" class="col-sm-3 col-form-label">Foto </label>
            <div class="col-sm-7">
              <div class="custom-file">
                <input type="file" class="custom-file-input" name="foto" id="customFile">
                <label class="custom-file-label" for="customFile">Choose file</label>
              </div>  
            </div>
          </div>
          <input type="hidden" name="id_admin" value="<?php echo $id_admin;?>">
          <div class="form-group row">
            <label for="nim" class="col-sm-3 col-form-label">NIM</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="nim" id="nim" value="<?php echo $nim;?>">
            </div>
          </div>
          <div class="form-group row">
            <label for="nama" class="col-sm-3 col-form-label">Nama</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="nama" id="nama" value="<?php echo $nama;?>">
            </div>
          </div>
          <div class="form-group row">
            <label for="email" class="col-sm-3 col-form-label">Email</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="email" id="email" value="<?php echo $email;?>">
            </div>
          </div>
          <div class="form-group row">
            <label for="password" class="col-sm-3 col-form-label">Password</label>
            <div class="col-sm-7">
              <input type="password" class="form-control" name="password" id="password" value="">
              <span class="text-danger" style="font-weight:lighter;font-size:12px">
               *Jangan diisi jika tidak ingin mengubah password</span>
            </div>
          </div>
          <div class="form-group row">
            <label for="level" class="col-sm-3 col-form-label">Level</label>
            <div class="col-sm-7">
              <select class="form-control" id="jurusan" name="level">
                <option value="Superadmin">Superadmin</option>
                <option value="Admin">Admin</option>
              </select>
            </div>
          </div>

          </div>
        </div>

      </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <div class="col-sm-12">
            <button type="submit" class="btn btn-info float-right"><i class="fas fa-save"></i> Simpan</button>
          </div>  
        </div>
        <!-- /.card-footer -->
      </form>
    </div>
    <!-- /.card -->

    </section>