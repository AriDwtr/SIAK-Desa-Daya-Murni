<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <img src="<?= base_url() ?>/assets/dist/banyuasin.png" alt="SIAK" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">SIAK DAYA MURNI</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= $foto == NULL ? base_url() . '/assets/dist/profile_default.png' : base_url() . '/photo/'.$foto ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block" style="color:gray"><?= strtoupper($nama) ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?= route_to('kades.dashboard') ?>" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= route_to('kades.profile') ?>" class="nav-link">
              <i class="nav-icon fas fa-address-card"></i>
              <p>
                My Profile
              </p>
            </a>
          </li>
          <li class="nav-header"><B>MENU LAPORAN</B></li>
          <li class="nav-item">
            <a href="<?= route_to('kades.pegawai') ?>" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Kepegawaian
              </p>
            </a>
          </li>
          <li class="nav-header"><B>MENU PELAYANAN</B></li>
          <li class="nav-item">
            <a href="<?= route_to('kades.pelayanan') ?>" class="nav-link">
              <i class="nav-icon fas fa-concierge-bell"></i>
              <p>
                PELAYANAN
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>