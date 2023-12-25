<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="dist/img/logoqunews.png" alt="AdminLTE Logo" class="brand-image"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Admin QuNews</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="index.php?include=profil" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Profil
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="index.php?include=berita" class="nav-link">
              <i class="nav-icon fas fa-newspaper"></i>
              <p>
                Berita
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="index.php?include=kategori" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Kategori
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="index.php?include=tag" class="nav-link">
              <i class="nav-icon fas fa-tag"></i>
              <p>
                Tag
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="index.php?include=komentar" class="nav-link">
              <i class="nav-icon fas fa-comment"></i>
              <p>
                Komentar
              </p>
            </a>
          </li>
          <?php 
            if (isset($_SESSION['level'])){
              if ($_SESSION['level']=="Superadmin"){?>
                <li class="nav-item">
                  <a href="index.php?include=user" class="nav-link">
                    <i class="nav-icon fas fa-user-cog"></i>
                    <p>
                      Pengaturan User
                    </p>
                  </a>
                </li>
          <?php }}?>
          <?php 
            if (isset($_SESSION['level'])){
              if ($_SESSION['level']=="Superadmin"){?>
                <li class="nav-item">
                  <a href="index.php?include=admin" class="nav-link">
                    <i class="nav-icon fas fa-user-cog"></i>
                    <p>
                      Pengaturan Admin
                    </p>
                  </a>
                </li>
          <?php }}?>
          <li class="nav-item">
            <a href="index.php?include=ubah-password" class="nav-link">
              <i class="nav-icon fas fa-user-lock"></i>
                <p>
                  Ubah Password
                </p>
              </a>
            </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>