<?php
  $segmen1=$this->uri->segment(1);
  $segmen2=$this->uri->segment(2);
?>
<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?= base_url();?>aset/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">SIMPEG</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url('upload/'.$session['foto']);?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= ucfirst($session['nama']);?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="<?= base_url('dashboard');?>" class="nav-link <?php if($segmen1=='dashboard'){ echo 'active';}?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Pegawai
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('pegawai');?>" class="nav-link <?php if($segmen1=='pegawai'){ echo 'active';}?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Pegawai</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('pegawai/dokumen');?>" class="nav-link <?php if($segmen1=='pegawai' AND $segmen2=='dokumen'){ echo 'active';}?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dokumen Pegawai</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('pegawai/riwayat');?>" class="nav-link <?php if($segmen1=='pegawai' AND $segmen2=='riwayat'){ echo 'active';}?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Riwayat Kenaikan Pangkat</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Master Data
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('master/golongan');?>" class="nav-link <?php if($segmen1=='master' AND $segmen2=='golongan'){ echo 'active';}?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Golongan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('master/jabatan');?>" class="nav-link <?php if($segmen1=='master' AND $segmen2=='jabatan'){ echo 'active';}?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Jabatan</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('notifikasi');?>" class="nav-link  <?php if($segmen1=='notifikasi'){ echo 'active';}?>">
              <i class="nav-icon fas fa-bell"></i>
              <p>
                Notifikasi
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Akun
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('dashboard/profil');?>" class="nav-link <?php if($segmen1=='dashboard' AND $segmen2=='profil'){ echo 'active';}?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Profil</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('dashboard/ubahpassword');?>" class="nav-link <?php if($segmen1=='dashboard' AND $segmen2=='ubahpassword'){ echo 'active';}?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ubah Password</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('login/logout');?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Logout</p>
                </a>
              </li>
            </ul>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
