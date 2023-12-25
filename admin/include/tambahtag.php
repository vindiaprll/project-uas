    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3><i class="fas fa-plus"></i> Tambah Tag</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php?include=tag">Tag</a></li>
              <li class="breadcrumb-item active">Tambah Tag</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="card card-success">
      <div class="card-header">
        <h3 class="card-title"style="margin-top:5px;"><i class="far fa-list-alt"></i> Form Tambah Tag</h3>
        <div class="card-tools">
          <a href="index.php?include=tag" class="btn btn-sm btn-dark float-right"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
        </div>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      </br>
      <div class="col-sm-10">
      <?php if(!empty($_GET['notif'])){?>
          <?php if($_GET['notif']=="tambahkosong"){?>
          <div class="alert alert-danger" role="alert">
          Maaf data tag wajib di isi</div>
          <?php }?>
        <?php }?>
      </div>
      <form class="form-horizontal" method="post" action="index.php?include=konfirmasi-tambah-tag">
        <div class="card-body">
          <div class="form-group row">
            <label for="nama_tag" class="col-sm-3 col-form-label">Tag</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" id="nama_tag" value="" name="nama_tag">
            </div>
          </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <div class="col-sm-10">
            <button type="submit" class="btn btn-success float-right"><i class="fas fa-plus"></i> Tambah</button>
          </div>  
        </div>
        <!-- /.card-footer -->
      </form>
    </div>
    <!-- /.card -->

    </section>
    <!-- /.content -->