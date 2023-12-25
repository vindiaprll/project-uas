<?php
if (isset($_GET['aksi']) && isset($_POST['katakunci_berita'])) {
  if ($_GET['aksi']=='cari') {
    $_SESSION['katakunci_berita'] = $_POST['katakunci_berita'];
    $katakunci_berita = $_SESSION['katakunci_berita'];
  }
}
if (isset($_SESSION['katakunci_berita'])) {
  $katakunci_berita = $_SESSION['katakunci_berita'];
}
?> 
<body>
<div class="container cf">
    <div class="pencarian cf">
        <h1>Hasil pencarian: "<?php echo $katakunci_berita;?>"</h1>
        <hr>
        <div class="content-pencarian cf">
        <br>
        <?php 
            //menampilkan data berita
            $sql_4 = "SELECT `b`.`id_berita`, `b`.`cover`, `b`.`judul_berita`, `k`.`nama_kategori`, DATE_FORMAT(`b`.`date`, '%d %M %Y')
            FROM `berita` `b`
            INNER JOIN `kategori` `k` ON `b`.`id_kategori` = `k`.`id_kategori`";
            if (isset($katakunci_berita) && !empty($katakunci_berita)) {
                $sql_4 .= " WHERE `b`.`judul_berita` LIKE '%$katakunci_berita%' || `k`.`nama_kategori` LIKE '%$katakunci_berita%'";
            }
            $sql_4.=" ORDER BY `b`.`judul_berita`, `k`.`nama_kategori`";
            $query_4 = mysqli_query($koneksi,$sql_4);
            while($data_4 = mysqli_fetch_row($query_4)){
                $id_berita = $data_4[0];
                $cover = $data_4[1];
                $judul_berita = $data_4[2];
                $nama_kategori = $data_4[3];
                $date = $data_4[4];
        ?>
            <div class="card-content cf">
                <img src="admin/cover/<?php echo $cover;?>" alt="">
                <h3><a href="index.php?include=detail-berita&data=<?php echo $id_berita;?>"><?php echo $judul_berita;?></a></h3>
                <div class="tag">
                    <h5><?php echo $nama_kategori;?></h5>
                </div>
                <h4><?php echo $date;?></h4>
            </div>
            <br>
        <?php }?> 
            <!-- <div class="card-content cf">
                <img src="https://images.solopos.com/2022/12/perempat-final-piala-dunia-2022.jpg?_gl=1*1f11vqo*_ga*NDU1MDQ1MjQ1LjE2NzA1NDk0MTE.*_ga_N48JD3Q0D2*MTY3MDU0OTQxMC4xLjEuMTY3MDU0OTQ1NS4xNS4wLjA." alt="">
                <h3><a href="detailberita.html">Jadwal Piala Dunia 2022 Malam Ini: Kroasia vs Brasil, Belanda vs Argentina</a></h3>
                <div class="tag">
                    <h5>Olahraga</h5>
                </div>
                <h4>06 Desember 2002</h4>
            </div> -->
            <!-- <div class="card-content cf">
                <img src="https://akcdn.detik.net.id/visual/2022/12/06/brasil-vs-korea-selatan-di-piala-dunia-2022_169.jpeg?w=650" alt="">
                <h3><a href="">Kroasia vs Brasil: Lemahkan Neymar, Tim Samba Akan Terkapar</a></h3>
                <div class="tag">
                    <h5>Olahraga</h5>
                </div>
                <h4>06 Desember 2002</h4>
            </div>
            <br>
            <div class="card-content cf">
                <img src="https://akcdn.detik.net.id/visual/2022/12/07/ronaldo-jadi-cadangan-di-portugal-vs-swiss-6_169.jpeg?w=650" alt="">
                <h3><a href="">Top 3 Sports: Ronaldo Buka Suara, Baggott vs Leicester di Piala FA</a></h3>
                <div class="tag">
                    <h5>Olahraga</h5>
                </div>
                <h4>06 Desember 2002</h4></h4>
            </div>
            <br>
            <div class="card-content cf">
                <img src="https://akcdn.detik.net.id/visual/2022/11/09/brentford-vs-gillingham-2_169.jpeg?w=650" alt="">
                <h3><a href="">Piala FA Pamer Gol Sundulan Fantastis Elkan Baggott</a></h3>
                <div class="tag">
                    <h5>Olahraga</h5>
                </div>
                <h4>06 Desember 2002</h4>
            </div>
            <div class="card-content cf">
                <img src="https://akcdn.detik.net.id/visual/2022/12/04/soccer-worldcup-arg-ausreport-6_169.jpeg?w=650" alt="">
                <h3><a href="">3 Alasan Messi Bakal Bantu Argentina Hancurkan Belanda</a></h3>
                <div class="tag">
                    <h5>Olahraga</h5>
                </div>
                <h4>06 Desember 2002</h4>
            </div> -->
        </div>
        <br>
        <!-- <div class="pagination cf">
            <div class="text-pagination">
              <div class="custom-pagination">
                <a href="#">1</a>
                <span>2</span>
                <a href="#">3</a>
                <a href="#">4</a>
                <a href="#">5</a>
              </div>
            </div>
        </div> -->
    

    </div>
    
</div>
</body>