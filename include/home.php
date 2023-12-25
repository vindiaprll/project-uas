<body id="home">
<div class="container cf"> 
<!-- Hot News -->
<div class="politik cf">
    <h1>Hot News</h1>
    <hr>
    <?php 
    //menampilkan data berita
    $sql_1 = "SELECT `id_berita`, `judul_berita`, `cover`
    FROM `berita`";
    $sql_1.=" ORDER BY rand() LIMIT 1";
    $query_1 = mysqli_query($koneksi,$sql_1);
    while($data_1 = mysqli_fetch_row($query_1)){
        $id_berita1 = $data_1[0];
        $judul_berita1 = $data_1[1];
        $cover1 = $data_1[2];
?>
    <div class="kanan cf">
        <div>
            <img src="admin/cover/<?php echo $cover1;?>" alt="">
            <h3><a href="index.php?include=detail-berita&data=<?php echo $id_berita1;?>"><?php echo $judul_berita1;?></a></h3>
        </div>
    </div>
<?php }?>
<div class="kiri cf">
<?php 
    //menampilkan data berita
    $sql_4 = "SELECT `id_berita`, `judul_berita`, `cover`
    FROM `berita`";
    if (isset($katakunci_berita) && !empty($katakunci_berita)) {
        $sql_4 .= " WHERE `judul_berita` LIKE '%$katakunci_berita%'";
    }
    $sql_4.=" ORDER BY rand() LIMIT 3";
    $query_4 = mysqli_query($koneksi,$sql_4);
    while($data_4 = mysqli_fetch_row($query_4)){
        $id_berita4 = $data_4[0];
        $judul_berita4 = $data_4[1];
        $cover4 = $data_4[2];
?>
    <div class="gambar cf">
        <img src="admin/cover/<?php echo $cover4;?>" alt="">
        <h3><a href="index.php?include=detail-berita&data=<?php echo $id_berita4;?>"><?php echo $judul_berita4;?></a></h3>
    </div>
<?php }?> 
        <!-- <div class="gambar cf">
            <img src="" alt="">
            <h3><a href="#"></a></h3>
        </div>
        <div class="gambar cf">
            <img src="images/content-hot-3.jpeg" alt="">
            <h3><a href="#">KPK Tetapkan 3 Tersangka Kasus Suap MA, Termasuk Hakim Gazalba Saleh</a></h3>
        </div>
        <div class="gambar cf">
            <img src="images/content-hot-4.jpeg" alt="">
            <h3><a href="#">Update Sebaran Pengungsi Cianjur: 99 Ribu Orang di 449 Titik</a></h3>
        </div> -->
    </div>
    <div class="kiri cf">
    <?php 
    //menampilkan data berita
    $sql_2 = "SELECT `id_berita`, `judul_berita`, `cover`
    FROM `berita`";
    if (isset($katakunci_berita) && !empty($katakunci_berita)) {
        $sql_2 .= " WHERE `judul_berita` LIKE '%$katakunci_berita%'";
    }
    $sql_2.=" ORDER BY rand() LIMIT 3";
    $query_2 = mysqli_query($koneksi,$sql_2);
    while($data_2 = mysqli_fetch_row($query_2)){
        $id_berita2 = $data_2[0];
        $judul_berita2 = $data_2[1];
        $cover2 = $data_2[2];
    ?>
    <div class="gambar cf">
        <img src="admin/cover/<?php echo $cover2;?>" alt="">
        <h3><a href="index.php?include=detail-berita&data=<?php echo $id_berita2;?>"><?php echo $judul_berita2;?></a></h3>
    </div>
<?php }?> 
        <!-- <div class="gambar cf">
            <img src="images/content-hot-6.jpeg" alt="">
            <h3><a href="#">Saksi Ungkap Tangis Sambo: Percuma Saya Bintang 2 Tak Bisa Jaga Istri</a></h3>
        </div>
        <div class="gambar cf">
            <img src="images/content-hot-7.jpeg" alt="">
            <h3><a href="#">Klasemen dan Top Skor Piala Dunia 2022: Brasil Bisa Lolos Malam Ini</a></h3>
        </div>
        <div class="gambar cf">
            <img src="images/content-hot-7.jpeg" alt="">
            <h3><a href="#">Klasemen dan Top Skor Piala Dunia 2022: Brasil Bisa Lolos Malam Ini</a></h3>
        </div> -->
    </div>
</div>
<!-- Akhir Hot News -->

<!-- Latest Post -->
<div class="latest-post cf">
    <div class="latest-post-kanan">
    <h1>Latest Post</h1>
    <hr>
    <?php 
    //menampilkan data berita
    $sql_3 = "SELECT `id_berita`, `judul_berita`, `cover`
    FROM `berita`";
    if (isset($katakunci_berita) && !empty($katakunci_berita)) {
        $sql_3 .= " WHERE `judul_berita` LIKE '%$katakunci_berita%'";
    }
    $sql_3.=" ORDER BY DATE DESC LIMIT 4";
    $query_3 = mysqli_query($koneksi,$sql_3);
    while($data_3 = mysqli_fetch_row($query_3)){
        $id_berita3 = $data_3[0];
        $judul_berita3 = $data_3[1];
        $cover3 = $data_3[2];
    ?>
    <div class="gambar cf">
        <img src="admin/cover/<?php echo $cover3; ?>" alt="">
        <h3><a href="index.php?include=detail-berita&data=<?php echo $id_berita3;?>"><?php echo $judul_berita3;?></a></h3>
    </div>
<?php }?> 
        <!-- <div class="gambar cf">
            <img src="images/content-hot-6.jpeg" alt="">
            <h3><a href="#">Saksi Ungkap Tangis Sambo: Percuma Saya Bintang 2 Tak Bisa Jaga Istri</a></h3>
        </div>
        <div class="gambar cf">
            <img src="images/content-hot-7.jpeg" alt="">
            <h3><a href="#">Klasemen dan Top Skor Piala Dunia 2022: Brasil Bisa Lolos Malam Ini</a></h3>
        </div>
        <div class="gambar cf">
            <img src="images/content-hot-2.jpeg" alt="">
            <h3><a href="#">Prabowo dan Puan Respons soal Capres Rambut Putih versi Jokowi</a></h3>
        </div>
        <div class="gambar cf">
            <img src="images/content-hot-3.jpeg" alt="">
            <h3><a href="#">KPK Tetapkan 3 Tersangka Kasus Suap MA, Termasuk Hakim Gazalba Saleh</a></h3>
        </div> -->
    </div>
    <div class="popular-post cf">
        <h1>Popular post</h1>
        <hr>
        <ol>
        <?php 
    //menampilkan data berita
    $sql_5 = "SELECT `id_berita`, `judul_berita`
    FROM `berita`";
    if (isset($katakunci_berita) && !empty($katakunci_berita)) {
        $sql_5 .= " WHERE `judul_berita` LIKE '%$katakunci_berita%'";
    }
    $sql_5.=" ORDER BY rand() LIMIT 7";
    $query_5 = mysqli_query($koneksi,$sql_5);
    while($data_5 = mysqli_fetch_row($query_5)){
        $id_berita5 = $data_5[0];
        $judul_berita5 = $data_5[1];
    ?>
    <li><p><a href="index.php?include=detail-berita&data=<?php echo $id_berita5;?>" ><?php echo $judul_berita5;?></a></p></li>
<?php }?> 
            <!-- <li><p><a href="#" >Minta Penerapan Kenaikan Upah Ditunda, Pengusaha Beralasan Demi Cegah PHK Massal</a></p></li>
            <li><p><a href="#" >Sebut Harga Tiket Kereta Cepat Terlampau Murah, Ekonom: Jadi Beban Berkepanjangan</a></p></li>
            <li><p><a href="#" >Prediksi Penduduk IKN 2045 1,9 Juta Jiwa, Bappenas: Kawasan Perkotaan 100 Jiwa per Hektare</a></p></li>
            <li><p><a href="#" >Dampak Perubahan Iklim, 9 Kota di Dunia Ini Terancam Tenggelam pada 2050</a></p></li>
            <li><p><a href="#" >Bersiap Libur Akhir Tahun? Jangan Lupa Vaksin Booster dan Protokol Kesehatan</a></p></li>
            <li><p><a href="#" >5 Agenda Menarik Akhir Pekan Ini di Yogyakarta, Dari Festival Musik Sampai Balapan Kuda</a></p></li>
            <li><p><a href="#" >Bersiap Libur Akhir Tahun? Jangan Lupa Vaksin Booster dan Protokol Kesehatan</a></p></li> -->
        </ol>
    </div>
</div>

<!-- About -->
<div class="about cf" id="about">
    <div class="kolom-kiri cf">
        <p class="deskripsi">#TentangKami</p>
        <h2>Tentang Kami</h2>
        <p class="isi"><b>QuNews</b> adalah salah satu pionir media website di Indonesia yang hadir pada November 2022 dengan nama QuNews Website.
            <br><br>Mulanya, QuNews Website  yang diakses dengan alamat QuNews.co.id menampilkan berita dari berbagai macam detailberita mulai dari 
            olahraga, politik, kuliner, dan lain sebagainya.
            Dengan hadirnya QuNews Website, para pembaca harian QuNews terutama di Indonesia dapat menikmati harian QuNews hari itu juga, 
            tidak perlu menunggu beberapa hari seperti biasanya. 
        </p>
        <!-- <a href=""  class="tbl-pink">Pelajari lebih lanjut</a> -->
    </div>
    <div class="kolom-kanan cf">
        <img src="images/berita.png" alt="">
    </div>
</div>

<!-- Akhir About -->
</div>
</body>