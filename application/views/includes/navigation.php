<?php $page = $this->uri->segment(2);
?>
 <div class="col-sm-2 col-md-1 sidebar">
          <ul class="nav nav-sidebar">
            <li <?php if ($page == "dashboard" || $page == ''){ echo "class='active'";} ?> >
              <a href="<?php echo base_url() ?>index.php/admin/dashboard">
                <div class="nav-icon"><span class="icon-home"></span></span></div>
                <div class="nav-title">Dashboard</div>
              </a>
            </li>
            <li <?php if ($page == "settings"){ echo "class='active'";} ?>>
              <a href="<?php echo base_url() ?>index.php/admin/settings">
                <div class="nav-icon"><span class="icon-tools"></span></div>
                <div class="nav-title">Account Setting</div>
              </a>
            </li>
            <li <?php if ($page == "profiles"){ echo "class='active'";} ?>>
              <a href="<?php echo base_url() ?>index.php/admin/profiles">
                <div class="nav-icon"><span class="icon-user"></span></div>
                <div class="nav-title">Profile</div>
              </a>
            </li>
            <li <?php if ($page == "bookings"){ echo "class='active'";} ?>>
              <a href="<?php echo base_url() ?>index.php/admin/bookings">
                <div class="nav-icon"><span class="icon-user"></span></div>
                <div class="nav-title">Bookings</div>
              </a>
            </li>
            <li <?php if ($page == "access"){ echo "class='active'";} ?>>
              <a href="<?php echo base_url() ?>index.php/admin/access">
                <div class="nav-icon"><span class="icon-switch"></span></div>
                <div class="nav-title">Bookings</div>
              </a>
            </li>
          </ul>
</div>
