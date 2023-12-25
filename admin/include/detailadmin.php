<?php 
// session_start();
// include('../koneksi/koneksi.php');
if(isset($_GET['data'])){
	$id_admin = $_GET['data'];
	//gat data admin
  $sql = "SELECT `foto`, `nim`, `nama`, `email`, `level` FROM `admin` WHERE `id_admin`='$id_admin'";
  $query = mysqli_query($koneksi,$sql);
  while($data = mysqli_fetch_row($query)){
    $foto = $data[0];
    $nim = $data[1];
    $nama = $data[2];
    $email = $data[3];
    $level = $data[4];
  }
}
?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3><i class="fas fa-user-tie"></i> Detail Data Admin</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php?include=admin">Pengaturan Admin</a></li>
              <li class="breadcrumb-item active">Detail Data Admin</li>
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
                  <a href="index.php?include=admin" class="btn btn-sm btn-dark float-right">
                  <i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                    <tbody>  
                      <tr>
                        <td colspan="2"><i class="fas fa-user-circle"></i> <strong>Data Admin<strong></td>
                      </tr>                      
                      <tr>
                        <td><strong>Foto Admin<strong></td>
                        <td><img src="foto/<?php echo $foto?>" class="img-fluid" width="200px;"></td>
                      </tr>       
                      <tr>
                        <td width="20%"><strong>NIM<strong></td>
                        <td width="80%"><?php echo $nim?></td>
                      </tr>     
                      <tr>
                        <td width="20%"><strong>Nama<strong></td>
                        <td width="80%"><?php echo $nama?></td>
                      </tr>                 
                      <tr>
                        <td width="20%"><strong>Email<strong></td>
                        <td width="80%"><?php echo $email?></td>
                      </tr>          
                      <tr>
                        <td width="20%"><strong>Level<strong></td>
                        <td width="80%"><?php echo $level?></td>
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