<div class="page-sidebar-wrapper">
    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu   " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            <li class="nav-item <?php if($selectedMenu == 1) {echo 'active';}?>">
                <a href="<?php echo base_url();?>admin/dash" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Dashboard</span>
                </a>
            </li>
            <li class="heading">
                <h3 class="uppercase">Users</h3>
            </li>
            <li class="nav-item  <?php if($selectedMenu == 2) {echo 'active';}?>">
                <a href="<?php echo base_url();?>admin/user/ulist" class="nav-link nav-toggle">
                    <i class="icon-user"></i>
                    <span class="title">User</span>
                </a>
            </li>




            <li class="heading">
                <h3 class="uppercase">Advertisment</h3>
            </li>
            <li class="nav-item  <?php if($selectedMenu == 3) {echo 'active';}?>">
                <a href="<?php echo base_url();?>admin/advertise/manage" class="nav-link nav-toggle">
                    <i class="icon-feed"></i>
                    <span class="title">Management</span>
                </a>
            </li>

            <li class="heading">
                <h3 class="uppercase">Alarm History</h3>
            </li>
            <li class="nav-item  <?php if($selectedMenu == 4) {echo 'active';}?>">
                <a href="<?php echo base_url();?>admin/alarm/history" class="nav-link nav-toggle">
                    <i class="icon-calendar"></i>
                    <span class="title">History</span>
                </a>
            </li>

            <li class="heading">
                <h3 class="uppercase">City Map</h3>
            </li>

            <li class="nav-item  <?php if($selectedMenu == 5) {echo 'active';}?>">
                <a href="<?php echo base_url();?>admin/map/locations" class="nav-link nav-toggle">
                    <i class="icon-map"></i>
                    <span class="title">Locations</span>
                </a>


            </li>

            <li class="nav-item  <?php if($selectedMenu == 6) {echo 'active';}?>">

                <a href="<?php echo base_url();?>admin/map/add" class="nav-link nav-toggle">
                    <i class="icon-pin"></i>
                    <span class="title">Add location</span>
                </a>

            </li>


        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>