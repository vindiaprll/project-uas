<body>
<!-- <div class="container-lolol"> -->
    <?php 
    //menampilkan data berita
    $sql_1 = "SELECT `id_kategori`,`nama_kategori` FROM `kategori`";
    $query_1 = mysqli_query($koneksi,$sql_1);
    while($data_1 = mysqli_fetch_row($query_1)){
        $id_kategori = $data_1[0];
        $nama_kategori = $data_1[1];
?>      
        <div id="<?php echo $nama_kategori;?>" class="container-lolol">
        <h1><?php echo $nama_kategori;?></h1>
    <?php 
    //menampilkan data berita
    $sql_2 = "SELECT `id_berita`, `cover`, `judul_berita` FROM `berita`
    WHERE `id_kategori`= '$id_kategori'";
    $query_2 = mysqli_query($koneksi,$sql_2);
    while($data_2 = mysqli_fetch_row($query_2)){
        $id_berita = $data_2[0];
        $cover = $data_2[1];
        $judul_berita = $data_2[2];
    ?> 
            <a href="index.php?include=detail-berita&data=<?php echo $id_berita;?>">
                <div class="card-lolol">
                    <img src="admin/cover/<?php echo $cover;?>" alt="">
                <p><?php echo $judul_berita;?></p>
                </div>
            </a>
    <?php }?>
    </div>
<?php }?>
<!-- </div> -->
<!-- <div class="container-lolol">
        <h1 id="politik">POLITIK</h1> -->
        <!-- <a href="">
            <div class="card-lolol">
                <img src="images/content-hot-1.jpeg" alt="">
                <p>Kuat Ma'ruf Ngaku Lihat Rambut Istri Sambo Acak-acakan dan Kasur Berantakan</p>
            </div>
        </a> -->
        <!-- <a href="">
            <div class="card-lolol">
                <img src="images/content-hot-1.jpeg" alt="">
                <p>Kuat Ma'ruf Ngaku Lihat Rambut Istri Sambo Acak-acakan dan Kasur Berantakan</p>
            </div>
        </a>
        <a href="">
            <div class="card-lolol">
                <img src="images/content-hot-1.jpeg" alt="">
                <p>Kuat Ma'ruf Ngaku Lihat Rambut Istri Sambo Acak-acakan dan Kasur Berantakan</p>
            </div>
        </a>
        <a href="">
            <div class="card-lolol">
                <img src="images/content-hot-1.jpeg" alt="">
                <p>Kuat Ma'ruf Ngaku Lihat Rambut Istri Sambo Acak-acakan dan Kasur Berantakan</p>
            </div>
        </a>
        <a href="">
            <div class="card-lolol">
                <img src="images/content-hot-1.jpeg" alt="">
                <p>Kuat Ma'ruf Ngaku Lihat Rambut Istri Sambo Acak-acakan dan Kasur Berantakan</p>
            </div>
        </a>
        <a href="">
            <div class="card-lolol">
                <img src="images/content-hot-1.jpeg" alt="">
                <p>Kuat Ma'ruf Ngaku Lihat Rambut Istri Sambo Acak-acakan dan Kasur Berantakan</p>
            </div>
        </a>
        <a href="">
            <div class="card-lolol">
                <img src="images/content-hot-1.jpeg" alt="">
                <p>Kuat Ma'ruf Ngaku Lihat Rambut Istri Sambo Acak-acakan dan Kasur Berantakan</p>
            </div>
        </a>
        <a href="">
            <div class="card-lolol">
                <img src="images/content-hot-1.jpeg" alt="">
                <p>Kuat Ma'ruf Ngaku Lihat Rambut Istri Sambo Acak-acakan dan Kasur Berantakan</p>
            </div>
        </a>  -->
    <!-- </div> -->
</body>