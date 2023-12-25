<body>
<nav>
    <div class="wrapper cf">
        <div class="logo"><a href="index.php?include=home">QuNews</a></div>
        <form method="post" action="index.php?include=pencarian&aksi=cari">
            <div class="search">
                <button class="material-symbols-outlined" type="submit">search</button>
                <input type="text" id="kata_kunci" name="katakunci_berita" placeholder="Cari...">
            </div>
        </form>
        <div class="menu cf">
            <ul>
                <li><a href="index.php?include=home#home">Home</a></li>
                <li><a href="index.php?include=home#about">Tentang Kami</a></li>
                <li><a href="#" >Kategori</a>
                    <ul class = "dropdown">
                <?php 
                //menampilkan data berita
                $sql_2 = "SELECT `id_kategori`, `nama_kategori` FROM `kategori`";
                $query_2 = mysqli_query($koneksi,$sql_2);
                while($data_2 = mysqli_fetch_row($query_2)){
                    $id_kategori = $data_2[0];
                    $nama_kategori = $data_2[1];
                ?> 
                    <!-- <ul class = "dropdown"> -->
                        <li><a href="index.php?include=kategori#<?php echo $nama_kategori;?>"><?php echo $nama_kategori;?></a></li>
                        <br>
                        <!-- <li><a href="index.php?include=kategori#sosial">Sosial</a></li>
                        <li><a href="index.php?include=kategori#finansial">Finansial</a></li>
                        <li><a href="index.php?include=kategori#makanan">Makanan</a></li>
                        <li><a href="index.php?include=kategori#olahraga">Olahraga</a></li> -->
                    <!-- </ul> -->
                <?php }?>
                    </ul>
                <!-- <ul class = "dropdown">
                    <li><a href="index.php?include=kategori#politik">Politik</a></li>
                    <li><a href="index.php?include=kategori#sosial">Sosial</a></li>
                    <li><a href="index.php?include=kategori#finansial">Finansial</a></li>
                    <li><a href="index.php?include=kategori#makanan">Makanan</a></li>
                    <li><a href="index.php?include=kategori#olahraga">Olahraga</a></li>
                </ul> -->
                </li>
                <li><a href="index.php?include=home#contact">Hubungi Kami</a></li>

						<!-- <li><a href="index.php?include=signout-user" class="tbl-signup">Log Out</a></li> -->

						<!-- <li><a href="indexlogin.php?include=login-user" class="tbl-signup">Log In</a></li> -->
                        <!-- <li><a href="include/loginuser.php" class="tbl-signup">Log In</a></li> -->
                    <?php 
                    if (isset($_SESSION['id_user'])){
                        if ($_SESSION['id_user']){?>
                            <li><a href="index.php?include=signout-user" class="tbl-signup">Log Out</a></li>
                        <?php }else{?>
                            <li><a href="include/loginuser.php" class="tbl-signup">Log In</a></li>
                        <?php }
                    }else{
                        if (isset($_SESSION['id_user'])){?>
                            <li><a href="index.php?include=signout-user" class="tbl-signup">Log Out</a></li>
                        <?php }else{?>
                            <li><a href="include/loginuser.php" class="tbl-signup">Log In</a></li>
                        <?php }
                    }?>
            </ul>
        </div>
    </div>
</nav>
</body>