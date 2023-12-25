
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3><i class="fas fa-plus"></i> Tambah Admin</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php?include=admin">Pengaturan Admin</a></li>
              <li class="breadcrumb-item active">Tambah Admin</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="card card-success">
      <div class="card-header">
        <h3 class="card-title"style="margin-top:5px;"><i class="far fa-list-alt"></i> Form Tambah Data Admin</h3>
        <div class="card-tools">
          <a href="index.php?include=admin" class="btn btn-sm btn-dark float-right"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
        </div>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      </br>
      <div class="col-sm-10">
      <?php if(!empty($_GET['notif'])){?>
        <?php if($_GET['notif']=="tambahnimkosong"){?>
        <div class="alert alert-danger" role="alert">NIM Tidak Boleh Kosong</div>
        <?php } else if($_GET['notif']=="tambahnamakosong"){?>
        <div class="alert alert-danger" role="alert">Nama Tidak Boleh Kosong</div>
        <?php } else if($_GET['notif']=="tambahemailkosong"){?>
        <div class="alert alert-danger" role="alert">Email Tidak Boleh Kosong</div>
        <?php } else if($_GET['notif']=="tambahpasskosong"){?>
        <div class="alert alert-danger" role="alert">Password Tidak Boleh Kosong</div>
        <?php } else if($_GET['notif']=="tambahlevelkosong"){?>
        <div class="alert alert-danger" role="alert">Level Tidak Boleh Kosong</div>
        <?php } else if($_GET['notif']=="tambahfotokosong"){?>
        <div class="alert alert-danger" role="alert">Foto Tidak Boleh Kosong</div>
        <?php } ?>
      <?php }?>
      </div>
      <form class="form-horizontal" method="post" action="index.php?include=konfirmasi-tambah-admin" enctype="multipart/form-data">
        <div class="card-body">
          <div class="form-group row">
            <label for="dataadmin" class="col-sm-12 col-form-label"><span class="text-info"><i class="fas fa-user-circle"></i> <u>Data Admin</u></span></label>
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
          <div class="form-group row">
            <label for="nim" class="col-sm-3 col-form-label">NIM</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="nim" id="nim" value="">
            </div>
          </div>
          <div class="form-group row">
            <label for="nama" class="col-sm-3 col-form-label">Nama</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="nama" id="nama" value="">
            </div>
          </div>
          <div class="form-group row">
            <label for="email" class="col-sm-3 col-form-label">Email</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="email" id="email" value="">
            </div>
          </div>
          <div class="form-group row">
            <label for="password" class="col-sm-3 col-form-label">Password</label>
            <div class="col-sm-7">
              <input type="password" class="form-control" name="password" id="password" value="">
            </div>
          </div>
          <div class="form-group row">
            <label for="level" class="col-sm-3 col-form-label">Level</label>
            <div class="col-sm-7">
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

      </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <div class="col-sm-12">
            <button type="submit" class="btn btn-success float-right"><i class="fas fa-plus"></i> Tambah</button>
          </div>  
        </div>
        <!-- /.card-footer -->
      </form>
    </div>
    <!-- /.card -->

    </section>
    <!-- /.content -->