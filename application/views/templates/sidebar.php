<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="<?php echo base_url(); ?>assets/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">E - Vote</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar os-host os-theme-light os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-scrollbar-horizontal-hidden os-host-transition"><div class="os-resize-observer-host observed"><div class="os-resize-observer" style="left: 0px; right: auto;"></div></div><div class="os-size-auto-observer observed" style="height: calc(100% + 1px); float: left;"><div class="os-resize-observer"></div></div><div class="os-content-glue" style="margin: 0px -8px; width: 249px; height: 503px;"></div><div class="os-padding"><div class="os-viewport os-viewport-native-scrollbars-invisible" style="overflow-y: scroll;"><div class="os-content" style="padding: 0px 8px; height: 100%; width: 100%;">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <!-- <img src="<?php echo base_url(); ?>assets/user/profile/<?php echo $user['id']?>.jpg" class="img-circle elevation-2" alt="User Image"> -->
          <img src="<?php echo base_url(); ?><?php echo $user['image']?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">
            <?php echo $user['name']; ?> </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i> 
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <?php if($user['role_id'] == 1): ?>
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>a_dashboard/getUserList" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                User List
                <!--<span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>a_dashboard/getCandidateList" class="nav-link"> 
              <i class="nav-icon fas fa-th"></i>
              <p>
                Candidate List
                <!--<span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>a_dashboard/voting_list" class="nav-link"> 
              <i class="nav-icon fas fa-th"></i>
              <p>
                Vote List
                <!--<span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
          <?php endif ?>
          <?php if($user['role_id'] == 2): ?>
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>u_dashboard/vote_list" class="nav-link"> 
              <i class="nav-icon fas fa-th"></i>
              <p>
                Vote Now
                <!--<span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
          <?php endif ?>
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>u_dashboard/result" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Result
              </p>
            </a>
          </li>
          <?php if($user['role_id'] == 2):?>
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>u_dashboard/profile" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Profile
              </p>
            </a>
          </li>
          <?php endif ?>
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>authentication/logout" class="nav-link" >
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Sign Out
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div></div></div><div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-unusable os-scrollbar-auto-hidden"><div class="os-scrollbar-track"><div class="os-scrollbar-handle" style="width: 100%; transform: translate(0px, 0px);"></div></div></div><div class="os-scrollbar os-scrollbar-vertical os-scrollbar-auto-hidden"><div class="os-scrollbar-track"><div class="os-scrollbar-handle" style="height: 44.5946%; transform: translate(0px, 0px);"></div></div></div><div class="os-scrollbar-corner"></div></div>
    <!-- /.sidebar -->
  </aside>
  