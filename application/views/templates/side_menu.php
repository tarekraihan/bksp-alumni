<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url('assets/dist/img/user2-160x160.jpg');?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
     
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <!-- user permission info -->
        <?php if($user_permission): ?>
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Members</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href=""><i class="fa fa-circle-o"></i> New Application List</a></li>
            <li><a href=""><i class="fa fa-circle-o"></i> Existing Member List</a></li>
          </ul>
        </li>
          <?php if(in_array('createUser', $user_permission) || in_array('updateUser', $user_permission) || in_array('viewUser', $user_permission) || in_array('deleteUser', $user_permission)): ?>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-edit"></i> <span>Settings</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <?php if(in_array('createUser', $user_permission)): ?>
                  <li><a href="<?php echo base_url('Controller_Members/create') ?>"><i class="fa fa-circle-o"></i> Create User</a></li>
                <?php endif; ?>
                <?php if(in_array('updateUser', $user_permission) || in_array('viewUser', $user_permission) || in_array('deleteUser', $user_permission)): ?>
                  <li><a href="<?php echo base_url('Controller_Members') ?>"><i class="fa fa-circle-o"></i> User List</a></li>
                <?php endif; ?>
                <?php if(in_array('createGroup', $user_permission)): ?>
                  <li><a href="<?php echo base_url('Controller_Permission/create') ?>"><i class="fa fa-circle-o"></i> Permision Add</a></li>
                <?php endif; ?>
                <?php if(in_array('updateGroup', $user_permission) || in_array('viewGroup', $user_permission) || in_array('deleteGroup', $user_permission)): ?>
                  <li><a href="<?php echo base_url('Controller_Permission') ?>"><i class="fa fa-circle-o"></i> Permision Update</a></li>
                <?php endif; ?>
                
          <?php if(in_array('updateCompany', $user_permission)): ?>
            <li id="companyNav"><a href="<?php echo base_url('Controller_Company/') ?>"><i class="fa fa-info"></i> <span>Conpany Information</span></a></li>
          <?php endif; ?>
              </ul>
            </li>
          <?php endif; ?>
        <?php endif; ?>
        <!-- user permission info -->
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>