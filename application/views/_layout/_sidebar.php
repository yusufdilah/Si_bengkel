<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo base_url(); ?>assets/img/profil1.jpg" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $this->session->userdata('nama'); ?></p>
        <!-- Status -->
        <a href="<?php echo base_url(); ?>assets/#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu">
      <li class="header">LIST MENU</li>
      <!-- Optionally, you can add icons to the links -->

      <li <?php if ($page == 'home') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('Home'); ?>">
          <i class="fa fa-home"></i>
          <span>Home</span>
        </a>
      </li>
      
     <li <?php if ($page == 'kategori_services') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('Kategori_service'); ?>">
          <i class="fa fa-user"></i>
          <span>Booking Service</span>
        </a>
      </li>   

      <li <?php if ($page == 'kategori_services') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('Kategori_service'); ?>">
          <i class="fa fa-user"></i>
          <span>Kategori Service</span>
        </a>
      </li>

      

      
    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>