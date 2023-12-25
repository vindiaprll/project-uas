<?php 
// session_start();
// include('../koneksi/koneksi.php');
if(isset($_GET['data'])){
	$id_berita = $_GET['data'];
	//gat data berita
  $sql = "SELECT `b`.`id_berita`,`b`.`cover`,`b`.`judul_berita`,`b`.`isi_berita`, `b`.`daerah`,`k`.`nama_kategori`, `a`.`nama`, DATE_FORMAT(`b`.`date`, '%d %M %Y'), `k`.`id_kategori` FROM `berita` `b` 
  INNER JOIN `kategori` `k` ON `b`.`id_kategori`=`k`.`id_kategori` 
  INNER JOIN `admin` `a` ON `b`.`id_admin`= `a`.`id_admin` 
  WHERE `b`.`id_berita`='$id_berita'";
  $query = mysqli_query($koneksi,$sql);
  while($data = mysqli_fetch_row($query)){
    $id_berita = $data[0];
    $cover = $data[1];
    $judul_berita = $data[2];
    $isi_berita = $data[3];
    $daerah = $data[4];
    $nama_kategori = $data[5];
    $nama = $data[6];
    $date = $data[7];
    $id_kategori = $data[8];
  }
}
?>
<body>
<div class="container cf">
        <div class="left_content cf">
            <div class="single_page">
                <ol class="breadcrumb">
                    <li><a href="index.php?include=home">Home /</a></li>
                    <li>Detail Berita</li>
                </ol>
                <h1><?php echo $judul_berita;?></h1>
                <div class="post_commentbox"><i class="fa fa-user"></i><?php echo $nama;?> / <span><i class="fa fa-calendar"></i><?php echo $date;?> / </span> <a href="index.php?include=kategori#<?php echo $nama_kategori;?>"><i class="fa fa-tags"></i><?php echo $nama_kategori;?></a> </div>
                <div class="single_page_content"> <img class="img-center" src="admin/cover/<?php echo $cover;?>" alt="">
                <blockquote><?php echo $isi_berita;?>
                </blockquote>

                <p><b>Tag : </b></p>
                <?php
                      //get tag
                      $sql_h = "SELECT `t`.`nama_tag` from `tag_berita` `tb` inner join `tag` `t`  ON  `tb`.`id_tag` = `t`.`id_tag` where `tb`.`id_berita`='$id_berita'";
                      $query_h = mysqli_query($koneksi,$sql_h);
                      while($data_h = mysqli_fetch_row($query_h)){
                      $nama_tag= $data_h[0];
                      ?>
                      <button class="btn"><?php echo $nama_tag;?></button>
                      <?php }?>
                <!-- tag -->
                <!-- <button class="btn">Joko Widodo</button>
                <button class="btn">KTT G20 Bali</button>
                <button class="btn">Bali</button>
                <button class="btn">Indonesia</button>
                <button class="btn">2022</button>
                <button class="btn">KTT G20 Indonesia 2022</button> -->
                </div>
            </div>  
                <!-- <form action="index.php?include=konfirmasi-tambah-komentar" method="post" enctype="multipart/form-data"> -->
                    <?php 
                    if (isset($_SESSION['id_user'])){
                        if ($_SESSION['id_user']){?>
                        <?php 
                        // session_start();
                        // include('../koneksi/koneksi.php');
                        $id_user = $_SESSION['id_user'];
                        //get profil
                        $sql = "select `id_user` from `user` WHERE `id_user` = '$id_user'";
                        //echo $sql;
                        $query = mysqli_query($koneksi, $sql);
                        while($data = mysqli_fetch_row($query)){
                            $id_user = $data[0];
                        }
                        ?>
                            <form action="index.php?include=konfirmasi-tambah-komentar" method="post" enctype="multipart/form-data">
                                <div class="komen cf">
                                    <input type="hidden" id="id_berita" name="id_berita" value="<?php echo $id_berita;?>">
                                    <textarea name="isi_komentar" id="isi_komentar" value="" placeholder="Komentar..." cols="30" rows="10"></textarea>
                                    <input type="hidden" id="id_user" name="id_user" value="<?php echo $id_user;?>">
                                    <button type="submit">Kirim</button>
                                </div>
                            </form>
                            <?php 
                                //menampilkan data berita
                                $sql_1 = "SELECT `u`.`foto`, `u`.`nama`, `k`.`isi_komentar` from `komentar` `k`
                                INNER JOIN `berita` `b` ON `k`.`id_berita` = `b`.`id_berita`
                                INNER JOIN `user` `u` ON `k`.`id_user` = `u`.`id_user`
                                WHERE `b`.`id_berita` = '$id_berita'";
                                $query_1 = mysqli_query($koneksi,$sql_1);
                                while($data_1 = mysqli_fetch_row($query_1)){
                                    $foto = $data_1[0];
                                    $nama = $data_1[1];
                                    $isi_komentar = $data_1[2];
                            ?>
                                <div class="avatar cf">
                                    <div class="gambar-avatar cf">
                                        <img src="admin/foto/<?php echo $foto;?>" alt="">
                                        <h1><?php echo $nama;?></h1>
                                        <p><?php echo $isi_komentar;?></p>
                                        <hr>
                                    </div>
                                </div>
                            <?php }?>
                            <!-- <div class="avatar cf">
                                <div class="gambar-avatar cf">
                                    <img src="images/vindi.jpg" alt="">
                                    <h1>Vindi Aprilia</h1>
                                    <p>Kerenn banget</p>
                                    <hr>
                                </div>
                            </div> -->
                        <?php }else{?>
                            <!-- <li><a href="include/loginuser.php" class="tbl-signup">Log In</a></li> -->
                            <div class="tulisan-sebelum-login">
                                <h1>LOGIN DULU</h1>
                            </div>
                        <?php }
                    }else{
                        if (isset($_SESSION['id_user'])){?>
                        <?php 
                        // session_start();
                        // include('../koneksi/koneksi.php');
                        $id_use = $_SESSION['id_user'];
                        //get profil
                        $sql = "select `id_user` from `user` WHERE `id_user` = '$id_use'";
                        //echo $sql;
                        $query = mysqli_query($koneksi, $sql);
                        while($data = mysqli_fetch_row($query)){
                            $id_use = $data[0];
                        }
                        ?>
                            <!-- <li><a href="index.php?include=signout-user" class="tbl-signup">Log Out</a></li> -->
                            <form action="index.php?include=konfirmasi-tambah-komentar" method="post" enctype="multipart/form-data">
                                <div class="komen cf">
                                    <textarea name="isi_komentar" id="isi_komentar" value="" placeholder="Komentar..." cols="30" rows="10"></textarea>
                                    <button type="submit">Kirim</button>
                                </div> 
                            </form>
                            <div class="avatar cf">
                                <div class="gambar-avatar cf">
                                    <img src="images/vindi.jpg" alt="">
                                    <h1>Vindi Aprilia</h1>
                                    <p>Kerenn banget</p>
                                    <hr>
                                </div>
                            </div>
                        <?php }else{?>
                            <!-- <li><a href="include/loginuser.php" class="tbl-signup">Log In</a></li> -->
                            <div class="tulisan-sebelum-login">
                                <h1>LOGIN DULU</h1>
                            </div>
                        <?php }
                    }?>
                    <!-- <textarea name="" id="" cols="30" rows="10"></textarea> -->
            <!-- Komen -->
            <!-- <div class="komen cf">
                <input type="text" placeholder="Tulis Komentar">
                <button><a href="login.html">Kirim</a></button>
            </div> 
            <div class="avatar cf">
                <div class="gambar-avatar cf">
                    <img src="images/vindi.jpg" alt="">
                    <h1>Vindi Aprilia</h1>
                    <p>Kerenn banget</p>
                    <hr>
                </div>
                <div class="gambar-avatar cf">
                    <img src="images/melvin.jpg.jpg" alt="">
                    <h1>Melvin Yusuf</h1>
                    <p>Gak nyangka Indonesia sekeren ini</p>
                    <hr>
                </div>
                <div class="gambar-avatar cf">
                    <img src="images/radit.jpg" alt="">
                    <h1>Radithya Z</h1>
                    <p>Bangga dengan Indonesia</p>
                    <hr>
                </div>
            </div> -->
        </div>

        <!-- <aside class="sidebar">
            <div class="widget">
                <div>
                <img class="widget-pict" src="images/food2.jpeg" alt="" width="100%">
                </div>
            
            <h2>Terkait</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi adipisci ipsa nesciunt. Harum dolor est quasi, laudantium exercitationem recusandae corrupti pariatur unde quos doloremque deserunt cumque fugiat perferendis, ea eos.</p>
            <a href="#" class="faq-selengkapnya"> In full</a>
            </div>
        </aside> -->
        

        <div class="related_post cf">
            <h2>Related Post</h2>
            <br>
            <ul>
                <?php 
                  $sql_bt = "SELECT `id_berita`,`judul_berita`, `cover` FROM `berita` WHERE `id_kategori`='$id_kategori' ORDER BY rand() LIMIT 5";
                  $query_bt = mysqli_query($koneksi,$sql_bt);
                  while($data_bt = mysqli_fetch_row($query_bt)){
                    $id_berita_terkait = $data_bt[0];
                    $judul_berita_terkait = $data_bt[1];
                    $cover_terkait = $data_bt[2];
                ?>  
                    <br>
                    <li>
                    <div class="widget">
                        <img class="widget-pict" src="admin/cover/<?php echo $cover_terkait;?>" alt="" width="100%">
                        <h3><a href="index.php?include=detail-berita&data=<?php echo $id_berita_terkait;?>"><?php echo $judul_berita_terkait;?></a></h3>
                    </div>
                    </li>
                    <br>
                <?php }?>
                    <!-- <br>
                    <li>
                    <div class="widget">
                        <div>
                        <img class="widget-pict" src="images/pemilu.jpg" alt="" width="100%">
                        <h3><a href="detailberita.html">Pemilu Segera Dilaksanakan Di Jakarta Utara</a></h3>
                    </div>
                    
                </li>
                <br>
                <li>
                    <div class="widget">
                        <div>
                        <img class="widget-pict" src="images/pemilu2.jpg" alt="" width="100%">
                        </div>
                    <h3><a href="detailberita.html">KNPI pastikan tidak terjebak kepentingan politik praktis</a></h3>
                </li>
                <br>
                <li>
                    <div class="widget">
                        <div>
                        <img class="widget-pict" src="images/pemilu3.jpg" alt="" width="100%">
                        </div>
                    <h3><a href="detailberita.html">MPR: Kepuasan kinerja Jokowi-Ma'ruf naik konsisten pada tahun ketiga</a></h3>
                </li> -->
            </ul>
        </div>
</div>
</body>